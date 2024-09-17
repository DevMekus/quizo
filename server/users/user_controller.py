 # User business logic
from flask import jsonify
from models import UserModel
from flask_cors import cross_origin


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
    pass