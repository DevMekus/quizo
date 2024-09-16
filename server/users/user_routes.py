 # User endpoints (e.g., profile, quizzes taken)
from flask import Blueprint
from users.user_controller import get_profile, update_user

user_blueprint = Blueprint('users', __name__)
user_blueprint.route('/me', methods=['GET'])(get_profile)
user_blueprint.route('/update', methods=['PATCH'])(update_user)