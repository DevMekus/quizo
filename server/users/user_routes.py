 # User endpoints (e.g., profile, quizzes taken)
from flask import Blueprint
from users.user_controller import get_profile, update_user, getUsers

user_blueprint = Blueprint('users', __name__)
user_blueprint.route('/user', methods=['GET'])(get_profile)
user_blueprint.route('/all', methods=['GET'])(getUsers)
user_blueprint.route('/update', methods=['PATCH'])(update_user)