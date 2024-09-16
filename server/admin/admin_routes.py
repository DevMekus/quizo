 # Admin endpoints
from flask import Blueprint
from admin.admin_controller import admin_only

admin_blueprint = Blueprint('admin',__name__)
admin_blueprint.route('/admin', methods=['GET'])(admin_only)