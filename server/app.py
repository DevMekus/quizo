# Main application entry point
from flask import Flask
from db import  db
from auth.auth_routes import auth_blueprint
from users.user_routes import user_blueprint
from admin.admin_routes import admin_blueprint
from quizzes.quiz_routes import quiz_blueprint

app = Flask(__name__)
app.config.from_object('config.Config')

db.init_app(app)

app.register_blueprint(auth_blueprint, url_prefix='/auth')
app.register_blueprint(user_blueprint, url_prefix='/users')
app.register_blueprint(admin_blueprint, url_prefix='/admin')
app.register_blueprint(quiz_blueprint, url_prefix='/quizzes')

if __name__ == '__main__':
  app.run(debug=True)