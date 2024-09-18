 # Quiz business logic
from flask import request, jsonify
from datetime import datetime
from db import db
from models import ResultModel, QuizModel, QuestionModel


def create_quiz():
    data = request.get_json()
    title = data.get('title')
    description = data.get('description')
    
    #check if quiz Exists
    quiz = QuizModel.query.filter_by(title=title).first()
    if quiz:
        return jsonify({'message':'Quiz already exist','status':'error'}), 409
    
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
        
        # Delete all the result in database with quiz_id
        results = ResultModel.query.filter_by(quiz_id=quiz_id).all()
        if results:
            db.session.delete(results)
            db.session.commit()
        
        #delete questions with the quiz ID
        questions = QuestionModel.query.filter_by(quiz_id=quiz_id).all()
        if results:
            db.session.delete(questions)
            db.session.commit()
               
        return jsonify({'message': 'Quiz deleted successfully', 'status': 'success'}), 200
    except Exception as e:
        db.session.rollback()
        return jsonify({'message': 'Failed to delete quiz', 'status': 'error', 'error': str(e)}), 500

#Handling the Controllers of the quiz Results
def quiz_results():
    results = ResultModel.query.order_by(ResultModel.id.desc()).all()
    resultList = [{'id':result.id, 
                 'userid':result.user_id, 
                 'quiz_id':result.quiz_id, 
                 'score':result.score} for result in results]
    return jsonify(resultList)

def create_result():
    data = request.get_json()    
    new_result = ResultModel(quiz_id=data['quiz_id'], user_id=data['userid'], score=data['score'])    
    db.session.add(new_result)
    db.session.commit()
    
    return jsonify({'message': 'Quiz completed.', 'status': 'success'}), 201

def delete_result(result_id):
    result = ResultModel.query.filter_by(id=result_id).first()
    if not result:
        return jsonify({'message': 'Result not found', 'status': 'error'}), 404
    try:
        # Delete the quiz from the database
        db.session.delete(result)
        db.session.commit()
        return jsonify({'message': 'Result deleted successfully', 'status': 'success'}), 200
    except Exception as e:
        db.session.rollback()
        return jsonify({'message': 'Failed to delete result', 'status': 'error', 'error': str(e)}), 500