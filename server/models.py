 # Database models for User, Admin, Quiz, etc.
from db import db
from werkzeug.security import generate_password_hash, check_password_hash


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


class QuizModel(db.Model):
    __tablename__ = 'quizzes'
    
    id = db.Column(db.Integer, primary_key=True)
    title = db.Column(db.String(120), nullable=False)
    description = db.Column(db.Text, nullable=True)
    # questions = db.relationship('QuestionModel', backref='quiz', lazy=True)


class QuestionModel(db.Model):
    __tablename__ = 'questions'
    
    id = db.Column(db.Integer, primary_key=True)
    question = db.Column(db.String(255), nullable=False)
    optionA = db.Column(db.String(100), nullable=False)
    optionB = db.Column(db.String(100), nullable=False)
    optionC = db.Column(db.String(100), nullable=False)
    optionCorrect = db.Column(db.String(2), nullable=False)
    quiz_id = db.Column(db.String(11),nullable=False)
    # quiz_id = db.Column(db.Integer, db.ForeignKey('quizzes.id'), nullable=False)

class LogModel(db.Model):
     __tablename__ = 'logs'
     id = db.Column(db.Integer, primary_key=True)
     user_id = db.Column(db.Integer, db.ForeignKey('users.id'), nullable=False)
     message = db.Column(db.String(80), nullable=False)

class ResultModel(db.Model):
    __tablename__ = 'results'
     
    id = db.Column(db.Integer, primary_key=True)
    quiz_id = db.Column(db.String(11),nullable=False)
    user_id = db.Column(db.String(11),nullable=False)
    score = db.Column(db.String(11),nullable=False)
    

class AdminModel(db.Model):
    __tablename__ = 'controls'
    
    id = db.Column(db.Integer, primary_key=True)
    username = db.Column(db.String(80), unique=True, nullable=False)
    email = db.Column(db.String(80), unique=True, nullable=False)
    password = db.Column(db.String(120), nullable=False)
    role = db.Column(db.String(10), default='admin')
    
    def set_password(self, password):
        self.password = generate_password_hash(self.password, password)
    
    def check_password(self, password):
        return check_password_hash(self.password, password)
       