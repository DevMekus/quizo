import Base from "./Base.js";
import Utility from "../Utility.js";
import Application from "./Application.js";
const utils = new Utility();

/**Monitors the routes and run special functions */
export default class RouteCrawler {
  static userData = null;
  /**
   * Quiz Routes and functions
   */
  get_all_quiz() {
    if (
      Base.pageUrl.includes("/dashboard/") ||
      Base.pageUrl.includes("/admin/")
    ) {
      fetchData(`${Base.apiUrl}quiz/all`).then((data) => {
        if (data.length == 0 && Base.pageUrl.includes("questionmanager.php")) {
          const addQBtn = document.querySelector(".addQBtn");
          if (addQBtn) {
            addQBtn.disabled = true;

            addQBtn.addEventListener("click", (e) => {
              e.preventDefault();
              const data = {
                status: "error",
                message: "You cannot add a question. Create a quiz first.",
              };

              utils.feedback(data);
            });
          }
        }
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
            <div class="page-title-con">
                <h4 class="page-title">Manage Quiz</h4>
                <p class="page-description">Listing all available quizzes and filter them by title or date</p>
            </div>
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
         <div class="bg-grey page-padding">
               <h3 class="color-red">Quiz Not Found!</h3>
              <p class="page-description">We do not have quiz available for students.</p>
         </div>
        `;
      }
      htmlUi.innerHTML = display;
      Application.delete_quiz();
    }
  }

  async display_quiz_card(quizzes = null) {
    if (quizzes != null && Base.pageUrl.includes("/dashboard/quiz.php")) {
      let display = ``;
      let htmlUi = document.querySelector(".quiz-container");

      const questions = await Base.getQuizQuestion();

      if (htmlUi && quizzes.length > 0) {
        quizzes.forEach((quiz) => {
          let count = 0;
          if (questions != null || questions.length != 0) {
            questions.forEach((question) => {
              if (question.quiz_id == quiz.id) {
                count++;
              }
            });
          }

          display += `
            <div class="quiz-wrap">
                    <h5 class="title">${quiz.title}</h5>
                    <p class="description">${quiz.description}</p>
                    <div class="mt-10">
                      <table class="table table-hover">
                      <thead>
                      <tr>
                        <th></th>
                        <th></th>
                      </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>Questions</td>
                          <td>${count}</td>
                        </tr>
                        <tr>
                          <td>Difficulty</td>
                          <td>Easy</td>
                        </tr>
                      </tbody>
                      </table>
                      </div>
                                         
                    <div class="bottom">
                        <a href="take-quiz.php?id=${quiz.id}" class="button button-primary radius-5">Take Quiz <i class="fas fa-arrow-right"></i></a>
                    </div>              
              </div>
          `;
        });
      } else {
        display += `
          <div class="bg-grey page-padding">
            <h3 class="color-red">Quiz not available!</h3>
            <p class="page-description">You have no quiz available at the moment.</p>
          </div>
        `;
      }
      htmlUi.innerHTML = display;
      Application.delete_quiz();
    }
  }

  async countQuizQuestion(id) {
    const questions = await Base.getQuizQuestion();
    let count = 0;

    if (questions != null || questions.length != 0) {
      questions.forEach((question) => {
        if (question.quiz_id == id) {
          count++;
        }
      });
    }

    return count;
  }

  get_all_questions() {
    if (
      Base.pageUrl.includes("/dashboard/") ||
      Base.pageUrl.includes("/admin/")
    ) {
      fetchData(`${Base.apiUrl}questions/all`).then((data) => {
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
         <div class="page-title-con">
              <h4 class="page-title">Manage Quiz Questions</h4>
              <p class="page-description">Listing all available quizzes questions</p>
          </div>
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
        <div class="bg-grey page-padding">
          <h3 class="color-red">Quiz Question Not Found!</h3>
          <p class="page-description">You have no quiz questions set at the moment.</p>
          </div>
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
                      <input class="form-check-input option" data-option=${question.id} value="${question.optionA}" type="radio" name="${question.id}" id="${question.optionA}">
                      <label class="form-check-label" for="${question.optionA}">
                          ${question.optionA}
                      </label>
                  </div>
                  <div class="form-check">
                      <input class="form-check-input option" data-option=${question.id} value="${question.optionB}" type="radio" name="${question.id}" id="${question.optionB}">
                      <label class="form-check-label" for="${question.optionB}">
                          ${question.optionB}
                      </label>
                  </div>
                  <div class="form-check">
                      <input class="form-check-input option" data-option=${question.id} type="radio" value="${question.optionC}" name="${question.id}" id="${question.optionC}">
                      <label class="form-check-label" for="${question.optionC}">
                          ${question.optionC}
                      </label>
                  </div>
                  
                  <input type='hidden' class="correctOption" data-option=${question.id} value="${question.optionCorrect}" name="optionCorrect" />
                 
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

  userName() {
    const username = document.querySelector(".username");
    if (username) {
      const base = Base.token;
      username.innerText = base["username"];
    }
  }

  getQuizResults() {
    if (
      Base.pageUrl.includes("/dashboard/quiz-result.php") ||
      Base.pageUrl.includes("/admin/quiz-result.php")
    ) {
      fetchData(`${Base.apiUrl}quiz/results`).then((data) => {
        this.display_result_table(data);
      });
    }
  }

  async display_result_table(results = null) {
    if (results != null) {
      let display = ``;
      let htmlUi = document.querySelector(".r_table");

      if (htmlUi && results.length > 0) {
        const page = htmlUi.getAttribute("data-page");
        display += `
         <div class="page-title-con">
            <h4 class="page-title">Quiz Results</h4>
            <p class="page-description">Listing all available quiz results</p>
        </div>
            <table class="table table-hover">
                <thead>
                    <tr class="tableHead">
                         <th scope="col">#</th>`;
        if (page == "admin") {
          display += `<th scope="col">Student</th>`;
        }
        display += `
                          <th scope="col">Quiz</th>
                          <th scope="col">Score</th>`;
        if (page == "admin") {
          display += `<th scope="col"></th>`;
        }
        display += `  
                    </tr>
                </thead>
                <tbody>
        `;
        const users = await Base.getUsers();
        const quizzes = await Base.getQuiz();

        results.forEach((result) => {
          if (result.userid == Base.token["id"]) {
            display += `
            <tr class="pointer trow">
                <th scope="row">${result.id}</th>`;
            if (page == "admin") {
              let userName = null;
              if (users != null) {
                users.forEach((user) => {
                  if ((user.id = result.userid)) {
                    userName = user.username;
                  }
                });
              }
              display += `<th scope="col">${userName}</th>`;
            }
            let quizName = null;
            if (quizzes != null) {
              quizzes.forEach((quiz) => {
                if (quiz.id == result.quiz_id) {
                  quizName = quiz.title;
                }
              });
            }
            display += `
                <td>${quizName}</td>
                <td>${result.score}</td>`;
            if (page == "admin") {
              display += `
                <td>
                <button class="btn button-danger btn-sm delResult" data-id="${result.id}"><i class="fas fa-times"></i></button>
                </td>`;
            }
            display += `              
            </tr>
        `;
          }
        });
        display += `
        </tbody>
        </table>
      `;
      } else {
        display += `
          <div class="bg-grey page-padding">
              <h3 class="color-red">Results not available!</h3>
              <p class="page-description">You have no quiz results at the moment.</p>
          </div>
        `;
      }
      htmlUi.innerHTML = display;
      Application.delete_result();
    }
  }

  async display_users_table() {
    if (Base.pageUrl.includes("/admin/users.php")) {
      let display = ``;
      let htmlUi = document.querySelector(".u_table");
      const users = await Base.getUsers();

      if (htmlUi && users != null && users.length != 0) {
        display += `
            <table class="table table-hover">
                <thead>
                    <tr class="tableHead">
                        <th scope="col">#</th>;      
                        <th scope="col">Username</th>
                        <th scope="col">Email Address</th>
                        <th scope="col"></th>                         
                    </tr>
                </thead>
                <tbody>
        `;
        users.forEach((user) => {
          display += `
          <tr>
              <th scope="row" class="text-center">${user.id}</th>
              <td class="text-center">${user.username}</td>
              <td class="text-center">${user.email}</td>  
              <td class="text-center">
                <button class="btn btn-sm btn-danger delUser" data-id=${user.id}>
                  <i class="fas fa-trash"></i>
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
          <div class="page-padding bg-grey">
            <h3 class="color-red">User Account Not Found!</h3>
            <p class="page-description">There are no registered user at the moment</p>
          </div>
        `;
      }
      htmlUi.innerHTML = display;
      Application.delete_user();
    }
  }
}
