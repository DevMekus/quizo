 # Database models for User, Admin, Quiz, etc.
from db import db
from werkzeug.security import generate_password_hash, check_password_hash
import datetime

class UserModel(db.Model):
    __tablename__ = 'users'
    
    id = db.Column(db.Integer, primary_key=True)
    username = db.Column(db.String(80), unique=True, nullable=False)
    email = db.Column(db.String(80), unique=True, nullable=False)
    password = db.Column(db.String(120), nullable=False)
    role = db.Column(db.String(10), default='user')
    
    def set_password(self, password):
        self.password = generate_password_hash(self.password, password)
    
    def check_password(self, password):
        return check_password_hash(self.password, password)



    