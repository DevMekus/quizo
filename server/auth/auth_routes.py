#Adding the Authentication Routes
from flask import Blueprint
from auth.auth_controller import register,login

auth_blueprint = Blueprint('auth',__name__)

auth_blueprint.route('/register', methods=['POST'])(register)
auth_blueprint.route('/login', methods=['POST'])(login)