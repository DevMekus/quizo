 # User business logic
from flask import jsonify
# from auth.auth_controller import token_required

# @token_required
def get_profile(current_user):
    return jsonify({
        'id': current_user.id,
        'username':current_user.username,
        'email': current_user.email,
        'role':current_user.role
    })

#Update user profile
# @token_required
def update_user(current_user):
    pass