from flask import request, jsonify
from db import db
from models import QuestionModel


def get_All_question():
    questions = QuestionModel.query.all()
    questionList = [{'id':question.id, 
                     'question':question.question, 
                     'optionA':question.optionA,
                     'optionB':question.optionB,
                     'optionC':question.optionC,
                     'optionCorrect':question.optionCorrect,
                     'quiz_id':question.quiz_id,
                     } for question in questions]
    return jsonify(questionList)
    

def create_question():
    pass

def get_question():
    pass

def update_question():
    pass

def delete_question():
    pass