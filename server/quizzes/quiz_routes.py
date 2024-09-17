 # Quiz endpoints (e.g., take quiz, list quizzes)
from flask import Blueprint
from quizzes.quiz_controller import create_quiz, list_quizzes, get_quiz, delete_quiz, quiz_results,create_result

quiz_blueprint = Blueprint('quizzes',__name__)
quiz_blueprint.route('/all',methods=['GET'])(list_quizzes)
quiz_blueprint.route('/results',methods=['GET'])(quiz_results)
quiz_blueprint.route('/quiz/<quiz_id>', methods=['GET'])(get_quiz)
quiz_blueprint.route('/quiz/<quiz_id>', methods=['DELETE'])(delete_quiz)
quiz_blueprint.route('/quiz', methods=['POST'])(create_quiz)
quiz_blueprint.route('/result', methods=['POST'])(create_result)
