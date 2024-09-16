# Configuration file (e.g., for database, secret keys)
import os

class Config:
    SECRET_KEY = os.getenv('SECRET_KEY') or 'supersecretkey'
    SQLALCHEMY_DATABASE_URI = 'sqlite:///quiz_app.db'
    SQLALCHEMY_TRACK_MODIFICATIONS = False