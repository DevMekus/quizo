 # Quiz endpoints (e.g., take quiz, list quizzes)
from flask import Blueprint
from quizzes.quiz_controller import create_quiz, list_quizzes, get_quiz

quiz_blueprint = Blueprint('quiz',__name__)
quiz_blueprint.route('/quiz',methods=['GET'])(list_quizzes)
quiz_blueprint.route('/quiz/<int: quiz_id>', methods=['GET'])(get_quiz)
quiz_blueprint.route('/quiz', methods=['POST'])(create_quiz)
