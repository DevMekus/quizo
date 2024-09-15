# **Quizo - Quiz Application API**

This is a **Flask-based RESTful API** for a quiz application with user authentication and admin management. The API allows users to participate in quizzes, view results, and manage their profile, while admins can create and manage quizzes and questions.

---

## **Table of Contents**

- [Features](#features)
- [Technologies Used](#technologies-used)
- [API Structure](#api-structure)
- [Setup Instructions](#setup-instructions)
- [Running the Application](#running-the-application)
- [Endpoints](#endpoints)
  - [Authentication Endpoints](#authentication-endpoints)
  - [User Endpoints](#user-endpoints)
  - [Quiz Endpoints](#quiz-endpoints)
  - [Admin Endpoints](#admin-endpoints)
- [Frontend Structure](#frontend-structure)
- [License](#license)

---

## **Features**

- **User Registration/Login**: Users can register, log in, and retrieve tokens for authentication.
- **Admin Dashboard**: Admins can create, update, and delete quizzes and questions.
- **Quiz Participation**: Users can take quizzes and view their results.
- **Quiz Management**: Admins can manage quizzes and questions from the admin dashboard.
- **Quiz History**: Users can view their past quizzes and results.
- **Role-based Access Control**: Role differentiation between admin and user.

---

## **Technologies Used**

- **Backend**: Flask, SQLAlchemy, Flask-JWT-Extended (for authentication)
- **Frontend**: JavaScript (Fetch API for sending HTTP requests)
- **Database**: SQLite (can be switched to PostgreSQL, MySQL, etc.)
- **Authentication**: JSON Web Tokens (JWT)
- **Environment Management**: Flask environment variables and configuration

---

## **API Structure**

The API is divided into endpoints for:

- **User**: For user authentication, registration, and profile management.
- **Admin**: Administer quizzes, questions, and users.
- **Quiz**: Handling quiz creation, participation, and results.

---

## **Setup Instructions**

### 1. **Clone the Repository**

```bash
git clone https://github.com/your-repo/quiz-application.git
cd quiz-application
```

### 2. **Create a Virtual Environment**

```bash
python3 -m venv venv
source venv/bin/activate  # For Windows: venv\Scripts\activate
```

### 3. **Install Dependencies**

```bash
pip install -r requirements.txt
```

### 4. **Set Up the Database**

```bash
flask db init
flask db migrate
flask db upgrade
```

### 5. **Set Environment Variables**

Create a `.env` file in the root directory and set the following environment variables:

```plaintext
FLASK_APP=app.py
FLASK_ENV=development
SECRET_KEY=your_secret_key
JWT_SECRET_KEY=your_jwt_secret_key
DATABASE_URL=sqlite:///quiz.db  # Use your preferred database URL
```

### 6. **Run the Application**

```bash
flask run
```

The application will be available at `http://127.0.0.1:5000/`.

---

## **Running the Application**

After setup, you can start the application by running:

```bash
python app.py
```

To access the admin interface or use the API, you can send HTTP requests from your frontend or tools like Postman. For example, to log in as an admin or user:

```bash
POST http://localhost:5000/auth/login
```

---

## **Endpoints**

### **Authentication Endpoints**

| Method | Endpoint         | Description                           |
| ------ | ---------------- | ------------------------------------- |
| POST   | `/auth/register` | Register a new user.                  |
| POST   | `/auth/login`    | Log in a user and return a JWT token. |

### **User Endpoints**

| Method | Endpoint              | Description                        |
| ------ | --------------------- | ---------------------------------- |
| GET    | `/users/me`           | Get the current user's profile.    |
| PUT    | `/users/me`           | Update user profile information.   |
| GET    | `/users/quiz-history` | Get the quiz history for the user. |

### **Quiz Endpoints**

| Method | Endpoint                     | Description                                 |
| ------ | ---------------------------- | ------------------------------------------- |
| GET    | `/quizzes`                   | Retrieve all available quizzes for users.   |
| GET    | `/quizzes/<quiz_id>`         | Retrieve a specific quiz.                   |
| POST   | `/quizzes/<quiz_id>/submit`  | Submit answers for a quiz.                  |
| GET    | `/quizzes/<quiz_id>/results` | Retrieve quiz results for the current user. |

### **Admin Endpoints**

| Method | Endpoint                             | Description              |
| ------ | ------------------------------------ | ------------------------ |
| POST   | `/admin/quizzes`                     | Create a new quiz.       |
| PUT    | `/admin/quizzes/<quiz_id>`           | Update a quiz.           |
| DELETE | `/admin/quizzes/<quiz_id>`           | Delete a quiz.           |
| POST   | `/admin/quizzes/<quiz_id>/questions` | Add questions to a quiz. |
| PUT    | `/admin/questions/<question_id>`     | Update a question.       |
| DELETE | `/admin/questions/<question_id>`     | Delete a question.       |

---

## **Frontend Structure**

You can integrate the API with a JavaScript frontend using `fetch` or Axios to send HTTP requests. Here’s an example of sending a request to log in:

```javascript
fetch("http://localhost:5000/auth/login", {
  method: "POST",
  headers: {
    "Content-Type": "application/json",
  },
  body: JSON.stringify({
    username: "user1",
    password: "password123",
  }),
})
  .then((response) => response.json())
  .then((data) => {
    console.log(data);
    // Store the token or handle the response
  });
```

---

## **License**

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for details.

---

Feel free to extend and modify the application based on your project needs!

---

This `README.md` file covers the full setup process, endpoint descriptions, and example requests for your quiz application project. You can customize it further depending on any specific changes you make to the API or frontend integration.
