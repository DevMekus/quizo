 # Admin endpoints
from flask import Blueprint
from admin.admin_controller import admin_only

admin_blueprint = Blueprint('logs',__name__)
admin_blueprint.route('/log', methods=['GET'])(admin_only)