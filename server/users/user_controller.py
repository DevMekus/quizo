 # User business logic
from flask import jsonify
from models import UserModel
from flask_cors import cross_origin

# @token_required
def get_profile():
    pass
    # return jsonify({
    #     'id': current_user.id,
    #     'username':current_user.username,
    #     'email': current_user.email,
    #     'role':current_user.role
    # })

@cross_origin(origin='http://localhost')
def getUsers():
    users = UserModel.query.all()
    userList = [{'id':user.id, 'username':user.username, 'email':user.email} for user in users]
    return jsonify(userList)
    

#Update user profile
# @token_required
def update_user(current_user):
    pass