 # Admin business logic
from flask import jsonify
from auth.auth_controller import token_required

@token_required
def admin_only(current_user):
    if current_user.role !='admin':
        return jsonify({'message':'Admins only','status':'error'}),403
    return jsonify({'message':'Welcome admin','status':'success'})