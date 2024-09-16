from flask import request, jsonify
from db import db
from models import QuestionModel


def get_All_question():   
    questions = QuestionModel.query.order_by(QuestionModel.id.desc()).all()
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
    data = request.get_json()
    
    #check if question exist by title
    new_question = QuestionModel(question=data['question'],
                                 optionA=data['optionA'],
                                 optionB=data['optionB'],
                                 optionC=data['optionC'],
                                 optionCorrect=data['optionCorrect'],
                                 quiz_id=data['quiz_id'])
    db.session.add(new_question)
    db.session.commit()
    return jsonify({'message':'A new question Created','status':'success'}),201

def get_question(quiz_id):
    question = QuestionModel.query.filter_by(quiz_id=quiz_id).first()
    if not question:
        return jsonify({'message':'QUestion not found','status':'error'}), 404
    return jsonify({
        'id':question.id,
        'Question':question.question,
        'CorrectAnswer':question.optionCorrect,
        'status':'success'
    })

def update_question():
    pass

def delete_question(question_id):
    question = QuestionModel.query.filter_by(id=question_id).first()
    if not question:
        return jsonify({'message': 'Question not found', 'status': 'error'}), 404
    try:
        # Delete the quiz from the database
        db.session.delete(question)
        db.session.commit()
        return jsonify({'message': 'question deleted successfully', 'status': 'success'}), 200
    except Exception as e:
        db.session.rollback()
        return jsonify({'message': 'Failed to delete question', 'status': 'error', 'error': str(e)}), 500