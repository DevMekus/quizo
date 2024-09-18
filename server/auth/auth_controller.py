#Authentication Controller
from flask import request, jsonify
from models import UserModel, AdminModel
from db import db
from werkzeug.security import generate_password_hash, check_password_hash
from flask import current_app as app


def register():
    data = request.get_json()
    username = data.get('username')
    password = data.get('password')
    email = data.get('email')
    role = data.get('role')
    
    if not username or not password or not email:
        return jsonify({'message':'Missing data','status':'error'}),400
    
    hashed_password = generate_password_hash(password)
    if role=='user':
        new_user = UserModel(username=username, email=email, password=hashed_password)
    else:
        new_user = AdminModel(username=username, email=email, password=hashed_password)
    
    db.session.add(new_user)
    db.session.commit()
    
    return jsonify({'message':'User registered successfully. Login now','status':'success'}),201

    
def login():
     data = request.get_json()   
     user = checkUserLogin(data)
     if not user:
         user = checkAdminLogin(data)
         if not user:
            return jsonify({'message': 'Account not found','status':'error'}),401
     return jsonify({                        
                        'id':user.id,
                        'status':'success',
                        'role':user.role,
                        'username':user.username,
                        'email':user.email
                    }),200
             

def checkUserLogin(data):
    user = UserModel.query.filter_by(email=data['email']).first()   
    if not user or not check_password_hash(user.password, data['password']):
        return False
    return user

def checkAdminLogin( data):
    admin = AdminModel.query.filter_by(email=data['email']).first()   
    if not admin or not check_password_hash(admin.password, data['password']):
        return False
    return admin
    
    
    