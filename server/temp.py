#Authentication Controller
from flask import request, jsonify
from models import UserModel
from db import db
from werkzeug.security import generate_password_hash, check_password_hash
import jwt
import datetime
from functools import wraps
from flask import current_app as app


def token_required(f):
    @wraps(f)
    def decorated(*args, **kwargs):
        token = request.headers.get('Authorization')
        if not token:
            return jsonify({'message':'Token is missing','status':'error'}), 403
        
        try:
            token = token.split(" ")[1]
            data = jwt.decode(token, app.config['SECRET_KEY'], algorithms=['HS256'])
            current_user = UserModel.query.filter_by(id=data['id']).first()
        except:
            return jsonify({'message':'Token is invalid','status':'error'}), 403
        return f(current_user, *args, **kwargs)
    return decorated

def register():
    data = request.get_json()
    username = data.get('username')
    password = data.get('password')
    email = data.get('email')
    
    if not username or not password or not email:
        return jsonify({'message':'Missing data','status':'error'}),400
    
    hashed_password = generate_password_hash(password)
    new_user = UserModel(username=username, email=email, password=hashed_password)
    
    db.session.add(new_user)
    db.session.commit()
    
    return jsonify({'message':'User registered successfully','status':'success'}),201


def login():
    data = request.get_json()     
    
    user = UserModel.query.filter_by(email=data['email']).first()
   
    if not user or not check_password_hash(user.password, data['password']):
        return jsonify({'message': 'Account not found','status':'error'}),401
    
    # token = jwt.encode({
    #     'id': user.id,
    #     'exp': datetime.datetime.utcnow()+datetime.timedelta(minutes=30)
    # },app.config['SECRET_KEY'], algorithm='HS256')
    
    return jsonify(
                    {                        
                        'id':user.id,
                        'status':'success',
                        'role':user.role,
                        'username':user.username,
                        'email':user.email
                    }
                   ),200