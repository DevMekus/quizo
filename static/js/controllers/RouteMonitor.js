import Base from "./Base.js";
import Utility from "../Utility.js";
import Application from "./Application.js";
const utils = new Utility();

/**Monitors the routes and run special functions */
export default class RouteCrawler {
  /**
   * Quiz Routes and functions
   */
  get_all_quiz() {
    if (
      Base.pageUrl.includes("/dashboard/") ||
      Base.pageUrl.includes("/admin/")
    ) {
      fetchData(`${Base.apiUrl}quiz/all`).then((data) => {
        console.log(data);
        this.countQuiz(data);
        this.display_quiz_table(data);
        this.display_quiz_card(data);
        this.quizSelect(data);
      });
    }
  }

  quizSelect(quizzes = null) {
    let htmlUi = document.querySelector(".quiz_select");
    let display = ``;
    if (quizzes != null) {
      if (htmlUi && Base.pageUrl.includes("/addQuestion.php")) {
        if (quizzes.length > 0) {
          display += `
          <label for="title">Quiz</label>
          <select name="quiz_id" class="form-ctr">
          `;
          quizzes.forEach((quiz) => {
            display += `
            <option value="${quiz.id}">${quiz.title}</option>
            `;
          });
          display += `
          </select>
          `;
        }
        htmlUi.innerHTML = display;
      }
    }
  }

  display_quiz_table(quizzes = null) {
    if (quizzes != null && Base.pageUrl.includes("/admin/quizmanager.php")) {
      let display = ``;
      let htmlUi = document.querySelector(".quiz_table");

      if (htmlUi && quizzes.length > 0) {
        display += `
            <table class="table table-hover">
                <thead>
                    <tr class="tableHead">
                        <th scope="col">#</th>
                        <th scope="col">Quiz</th>
                        <th scope="col">Question</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
        `;
        quizzes.forEach((quiz) => {
          display += `
              <tr class="pointer trow">
                  <th scope="row">${quiz.id}</th>
                  <td>${quiz.title}</td>
                  <td>${quiz.description}</td>
                  <td>
                      <button class="btn btn-primary btn-sm click-effect" data-bs-toggle="modal" data-bs-target="#editQuestion" data-id=${quiz.id}>
                          <i class="fas fa-edit"></i>
                      </button>
                      <button class="btn btn-danger btn-sm click-effect quizDel" data-id=${quiz.id}>
                          <i class="fas fa-times"></i>
                      </button>
                  </td>
              </tr>
          `;
        });
        display += `
          </tbody>
          </table>
        `;
      } else {
        display += `
          <h5>No Quiz Available</h5>
          <p>We do not have quiz available for students.</p>
        `;
      }
      htmlUi.innerHTML = display;
      Application.delete_quiz();
    }
  }

  display_quiz_card(quizzes = null) {
    if (quizzes != null && Base.pageUrl.includes("/dashboard/quiz.php")) {
      let display = ``;
      let htmlUi = document.querySelector(".quiz-container");

      if (htmlUi && quizzes.length > 0) {
        quizzes.forEach((quiz) => {
          display += `
            <div class="quiz-wrap">
                    <h5 class="title">${quiz.title}</h5>
                    <p class="description">${quiz.description}</p>
                    <ul>
                        <li>Questions: 20</li>
                        <li>Level: Easy</li>
                    </ul>
                    <div class="bottom">
                        <a href="take-quiz.php?id=${quiz.id}" class="button button-primary radius-5">Take Quiz</a>
                    </div>              
              </div>
          `;
        });
      } else {
        display += `
          <h5>No Quiz Available</h5>
          <p>We do not have quiz available for students.</p>
        `;
      }
      htmlUi.innerHTML = display;
      Application.delete_quiz();
    }
  }

  countQuizQuestion(quiz_id, questions) {
    return 0;
  }

  get_all_questions() {
    if (
      Base.pageUrl.includes("/dashboard/") ||
      Base.pageUrl.includes("/admin/")
    ) {
      fetchData(`${Base.apiUrl}questions/all`).then((data) => {
        console.log(data);
        this.display_question_table(data);
        this.display_quiz_questions(data);
      });
    }
  }

  display_question_table(questions = null) {
    if (
      questions != null &&
      Base.pageUrl.includes("/admin/questionmanager.php")
    ) {
      let display = ``;
      let htmlUi = document.querySelector(".q_table");

      if (htmlUi && questions.length > 0) {
        display += `
            <table class="table table-hover">
                <thead>
                    <tr class="tableHead">
                        <th scope="col">#</th>
                          <th scope="col">Quiz Id</th>
                          <th scope="col">Question</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
        `;
        questions.forEach((question) => {
          display += `
              <tr class="pointer trow">
                  <th scope="row">${question.id}</th>
                  <td>${question.quiz_id}</td>
                  <td>${question.question}</td>
                  <td>
                      <button class="btn btn-primary btn-sm click-effect" data-bs-toggle="modal" data-bs-target="#editQuestion" data-id=${question.id}>
                          <i class="fas fa-edit"></i>
                      </button>
                      <button class="btn btn-danger btn-sm click-effect qDel" data-id=${question.id}>
                          <i class="fas fa-times"></i>
                      </button>
                  </td>
              </tr>
          `;
        });
        display += `
        </tbody>
        </table>
      `;
      } else {
        display += `
          <h5>No Questions Available</h5>
          <p>We do not have questions available for students.</p>
        `;
      }
      htmlUi.innerHTML = display;
      Application.delete_question();
    }
  }

  display_quiz_questions(questions = null) {
    if (
      questions != null &&
      Base.pageUrl.includes("/dashboard/take-quiz.php")
    ) {
      const url = new URL(window.location.href);
      const params = new URLSearchParams(url.search);
      const quiz_id = params.get("id");
      let htmlUi = document.querySelector(".q_table");
      let display = ``;
      let counter = 0;
      display += `<div class="data-wrappings" data-quiz="${quiz_id}">`;
      questions.forEach((question) => {
        if (question.quiz_id == quiz_id) {
          counter++;

          display += `
               <div class="quiz-question" data-question-id="${question.id}">
                  <h5 class="title">(${counter}) ${question.question}</h5>
                  <div class="form-check">
                      <input class="form-check-input" value="${question.optionA}" type="radio" name="${question.id}" id="${question.optionA}">
                      <label class="form-check-label" for="${question.optionA}">
                          ${question.optionA}
                      </label>
                  </div>
                  <div class="form-check">
                      <input class="form-check-input" value="${question.optionB}" type="radio" name="${question.id}" id="${question.optionB}">
                      <label class="form-check-label" for="${question.optionB}">
                          ${question.optionB}
                      </label>
                  </div>
                  <div class="form-check">
                      <input class="form-check-input" type="radio" value="${question.optionC}" name="${question.id}" id="${question.optionC}">
                      <label class="form-check-label" for="${question.optionC}">
                          ${question.optionC}
                      </label>
                  </div>
                  <input type='hidden' value="${question.optionCorrect}" name="optionCorrect" />
                 
              </div>
          `;
        }
      });
      display += `</div>`;
      htmlUi.innerHTML = display;
    }
  }

  getUsers() {
    if (Base.pageUrl.includes("/admin/")) {
      fetchData(`${Base.apiUrl}users/all`, {}).then((data) => {
        this.countUsers(data);
      });
    }
  }

  countQuiz(quiz = null) {
    if (quiz != null) {
      let total = 0;
      total = quiz.length;
      const quizCount = document.querySelector(".quizCount");
      if (quizCount) {
        quizCount.innerText = total;
      }
    }
  }

  countUsers(users = null) {
    if (users != null) {
      let total = 0;
      total = users.length;
      const userCount = document.querySelector(".userCount");
      if (userCount) {
        userCount.innerText = total;
      }
    }
  }

  userQuiz(quiz = null) {
    let total = 0;
    const userid = Base.token["id"];

    if (quiz != null) {
      quiz.forEach((item) => {});
    }
  }

  userName() {
    const username = document.querySelector(".username");
    if (username) {
      const base = Base.token;
      username.innerText = base["username"];
    }
  }

  getQuiz() {}
}
