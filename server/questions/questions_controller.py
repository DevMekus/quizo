from flask import request, jsonify
from db import db
from models import QuestionModel


def get_question():
    questions = QuestionModel.query.all()
    questionList = [{'id':quiz.id, 'title':quiz.title, 'description':quiz.description} for question in questions]
    return jsonify(questionList)
    pass

def create_question():
    pass

def update_question():
    pass

def delete_question():
    pass