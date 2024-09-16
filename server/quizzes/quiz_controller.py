 # Quiz business logic
from flask import request, jsonify
from db import db
from models import QuestionModel, QuizModel
# from auth.auth_controller import token_required



def create_quiz():
    data = request.get_json()
    title = data.get('title')
    description = data.get('description')
    #check if quiz Exists
    new_quiz = QuizModel(title=title, description=description)
    db.session.add(new_quiz)
    db.session.commit()
    
    return jsonify({'message':'Quiz created successfully',
                    'status':'success'}),201

# @token_required
def list_quizzes():    
    quizzes = QuizModel.query.order_by(QuizModel.id.desc()).all()
    quizList = [{'id':quiz.id, 'title':quiz.title, 'description':quiz.description} for quiz in quizzes]
    return jsonify(quizList)

# @token_required
def get_quiz(quiz_id):
    quiz = QuizModel.query.filter_by(id=quiz_id).first()
    if not quiz:
        return jsonify({'message':'Quiz not found','status':'error'}), 404
    return jsonify({
        'id':quiz.id,
        'title':quiz.title,
        'description':quiz.description,
        'status':'success'
    })

def delete_quiz(quiz_id):
    quiz = QuizModel.query.filter_by(id=quiz_id).first()
    if not quiz:
        return jsonify({'message': 'Quiz not found', 'status': 'error'}), 404
    try:
        # Delete the quiz from the database
        db.session.delete(quiz)
        db.session.commit()
        return jsonify({'message': 'Quiz deleted successfully', 'status': 'success'}), 200
    except Exception as e:
        db.session.rollback()
        return jsonify({'message': 'Failed to delete quiz', 'status': 'error', 'error': str(e)}), 500
