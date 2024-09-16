 # Quiz endpoints (e.g., take quiz, list quizzes)
from flask import Blueprint
from questions.questions_controller import get_All_question, create_question, delete_question, get_question

question_blueprint = Blueprint('questions',__name__)
question_blueprint.route('/all',methods=['GET'])(get_All_question)
question_blueprint.route('/question/<quiz_id>', methods=['GET'])(get_question)
question_blueprint.route('/question/<question_id>', methods=['DELETE'])(delete_question)
question_blueprint.route('/question', methods=['POST'])(create_question)
