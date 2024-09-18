 # User business logic
from flask import jsonify
from models import UserModel, ResultModel
from flask_cors import cross_origin
from db import db

def get_profile():
    pass
    

@cross_origin(origin='http://localhost')
def getUsers():
    users = UserModel.query.all()
    userList = [{'id':user.id, 'username':user.username, 'email':user.email} for user in users]
    return jsonify(userList)
    

def update_user(user_id):
    pass

def delete_user(user_id):
    user = UserModel.query.filter_by(id=user_id).first()
    if not user:
        return jsonify({'message': 'User not found', 'status': 'error'}), 404
    try:       
        db.session.delete(user)
        db.session.commit()
       
        #delete all the result for that user
        results = ResultModel.query.filter_by(user_id=user_id).all()
        if results:
            db.session.delete(results)
            db.session.commit()
                        
        return jsonify({'message': 'User data deleted successfully', 'status': 'success'}), 200
    except Exception as e:
        db.session.rollback()
        return jsonify({'message': 'Failed to delete user', 'status': 'error', 'error': str(e)}), 500