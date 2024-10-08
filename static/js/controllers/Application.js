import Base from "./Base.js";
import Utility from "../Utility.js";
const utils = new Utility();
export default class Application {
  register() {
    const register = document.querySelector(".register");

    if (register) {
      register.addEventListener("submit", (e) => {
        e.preventDefault();

        postData(
          `${Base.apiUrl}auth/register`,
          JSON.stringify(utils.formData_to_Object(new FormData(register)))
        ).then((response) => {
          utils.feedback(response);
        });
      });
    }
  }

  login() {
    const loginForm = document.querySelector(".login_form");

    if (loginForm) {
      loginForm.addEventListener("submit", (e) => {
        e.preventDefault();

        postData(
          `${Base.apiUrl}auth/login`,
          JSON.stringify(utils.formData_to_Object(new FormData(loginForm)))
        ).then((response) => {
          utils.feedback(response);
          response["status"] == "success" ? this.setSession(response) : "";
        });
      });
    }
  }

  setSession(response = null) {
    if (response != null) {
      if (response["status"] == "success") {
        this.phpSession(response);
      }
    }
  }

  phpSession(response = null) {
    if (response != null) {
      const userid = response.id;
      const role = response.role;
      fetchData(
        `${Base.appUrl}configs/usersession.php?
            session=${userid}&role=${role}`
      ).then((session) => {
        utils.feedback(session);
        if (session["status"] == "success") {
          this.setToken(response);
          role == "user"
            ? (location.href = `${Base.appUrl}dashboard/index.php`)
            : (location.href = `${Base.appUrl}admin/index.php`);
        } else {
          /**Session failed */
          utils.feedback(session);
        }
      });
    }
  }

  setToken(response = null) {
    if (response != null) {
      if (response["status"] == "success") {
        sessionStorage.setItem("token", JSON.stringify(response));
      }
    }
  }

  newQuiz() {
    const newQuiz = document.querySelector(".newQuiz");
    const res = document.querySelector(".res");

    if (newQuiz && res) {
      newQuiz.addEventListener("submit", (e) => {
        e.preventDefault();
        postData(
          `${Base.apiUrl}quiz/quiz`,
          JSON.stringify(utils.formData_to_Object(new FormData(newQuiz)))
        ).then((response) => {
          utils.feedback(response);
          res.innerHTML = ``;
          res.innerHTML = `  
           <div class="alert alert-${
             response["status"] == "success" ? "success" : "danger"
           } alert-dismissible fade show" role="alert">
                <p class="">${response["message"]}.</p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
                 `;

          setTimeout(() => {
            location.reload();
          }, 1500);
        });
      });
    }
  }

  static delete_quiz() {
    const quizDel = document.querySelectorAll(".quizDel");

    if (quizDel) {
      for (let i = 0; i < quizDel.length; i++) {
        quizDel[i].addEventListener("click", () => {
          const id = quizDel[i].getAttribute("data-id");
          console.log("cicking to delete " + id);
          if (confirm("Do you wish to continue?")) {
            deleteData(`${Base.apiUrl}quiz/quiz/${id}`).then((response) => {
              utils.feedback(response);
              console.log(response);
              setTimeout(() => {
                location.reload();
              }, 1500);
            });
          }
        });
      }
    }
  }

  newQuestion() {
    const newQuestion = document.querySelector(".newQuestion");

    if (newQuestion) {
      newQuestion.addEventListener("submit", (e) => {
        e.preventDefault();

        postData(
          `${Base.apiUrl}questions/question`,
          JSON.stringify(utils.formData_to_Object(new FormData(newQuestion)))
        ).then((response) => {
          utils.feedback(response);

          setTimeout(() => {
            location.reload();
          }, 1500);
        });
      });
    }
  }

  static delete_question() {
    const quizDel = document.querySelectorAll(".qDel");

    if (quizDel) {
      for (let i = 0; i < quizDel.length; i++) {
        quizDel[i].addEventListener("click", () => {
          const id = quizDel[i].getAttribute("data-id");

          if (confirm("Do you wish to continue?")) {
            deleteData(`${Base.apiUrl}questions/question/${id}`).then(
              (response) => {
                utils.feedback(response);

                setTimeout(() => {
                  location.reload();
                }, 1500);
              }
            );
          }
        });
      }
    }
  }

  submitQuiz() {
    const quizForm = document.getElementById("quiz-form");
    const scoreBoard = document.querySelector(".score-board");
    const url = new URL(window.location.href);
    const params = new URLSearchParams(url.search);
    const quiz_id = params.get("id");

    if (quizForm) {
      quizForm.addEventListener("submit", (e) => {
        e.preventDefault();
        const quizID = document.querySelector(".data-wrappings");
        const questions = document.querySelectorAll(".quiz-question");
        let totalQuestions = questions.length;
        let correctAnswers = 0;

        if (questions) {
          for (let i = 0; i < questions.length; i++) {
            const currentQuestion =
              questions[i].getAttribute("data-question-id");
            const correctOptions = document.querySelectorAll(".correctOption");
            const options = document.querySelectorAll(".option");

            if (correctOptions && options) {
              for (let j = 0; j < options.length; j++) {
                for (let k = 0; k < correctOptions.length; k++) {
                  if (
                    (options[j].getAttribute("data-option") ==
                      correctOptions[k].getAttribute("data-option")) ==
                    currentQuestion
                  ) {
                    if (
                      options[j].checked &&
                      options[j].value == correctOptions[k].value
                    ) {
                      correctAnswers++;
                    }
                  }
                }
              }
            }
          }
        }
        scoreBoard.innerHTML = ``;
        scoreBoard.innerHTML = `
          <div class="card">
                <div class="card-body">
                    <h5>Score</h5>
                    <p class="page-description">Your score on quiz</p>
                    <h1>${correctAnswers}/${totalQuestions}</h1>
                </div>
            </div>
        `;
        const data = {
          quiz_id: quiz_id,
          userid: Base.token["id"],
          score: correctAnswers,
        };
        console.log(data);
        postData(`${Base.apiUrl}quiz/result`, JSON.stringify(data)).then(
          (response) => {
            utils.feedback(response);
          }
        );
      });
    }
  }

  // submitQuiz() {
  //   const quizForm = document.getElementById("quiz-form");
  //   const scoreBoard = document.querySelector(".score-board");
  //   const url = new URL(window.location.href);
  //   const params = new URLSearchParams(url.search);
  //   const quiz_id = params.get("id");

  //   if (quizForm) {
  //     quizForm.addEventListener("submit", function (event) {
  //       event.preventDefault();

  //       let totalQuestions = document.querySelectorAll(".quiz-question").length;
  //       let correctAnswers = 0;

  //       document
  //         .querySelectorAll(".quiz-question")
  //         .forEach((questionDiv, index) => {
  //           const questionNumber = index + 1;

  //           const selectedOption = document.querySelector(
  //             `input[name="question${questionNumber}"]:checked`
  //           );

  //           const correctAnswer = document.querySelector(
  //             `input[name="optionCorrect${questionNumber}"]`
  //           );

  //           if (correctAnswer) {
  //             correctAnswer = correctAnswer.value;
  //           }

  //           if (selectedOption && selectedOption.value === correctAnswer) {
  //             correctAnswers++;
  //           }
  //         });

  //       scoreBoard.innerHTML = ``;
  //       scoreBoard.innerHTML = `
  //         <div class="card">
  //               <div class="card-body">
  //                   <h5>Score</h5>
  //                   <p class="page-description">Your score on quiz</p>
  //                   <h1>${correctAnswers}/${totalQuestions}</h1>
  //               </div>
  //           </div>
  //       `;
  //       const data = {
  //         quiz_id: quiz_id,
  //         userid: Base.token["id"],
  //         score: correctAnswers,
  //       };
  //       console.log(data);
  //       postData(`${Base.apiUrl}quiz/result`, JSON.stringify(data)).then(
  //         (response) => {
  //           utils.feedback(response);
  //         }
  //       );
  //     });
  //   }
  // }

  static delete_result() {
    const delResult = document.querySelectorAll(".delResult");

    if (delResult) {
      for (let i = 0; i < delResult.length; i++) {
        delResult[i].addEventListener("click", () => {
          const id = delResult[i].getAttribute("data-id");

          if (confirm("Do you wish to continue?")) {
            deleteData(`${Base.apiUrl}quiz/result/${id}`).then((response) => {
              utils.feedback(response);
              setTimeout(() => {
                location.reload();
              }, 1500);
            });
          }
        });
      }
    }
  }

  static delete_user() {
    const delUser = document.querySelectorAll(".delUser");

    if (delUser) {
      for (let i = 0; i < delUser.length; i++) {
        delUser[i].addEventListener("click", () => {
          if (confirm("Do you wish to continue?")) {
            const id = delUser[i].getAttribute("data-id");
            deleteData(`${Base.apiUrl}users/user/${id}`).then((response) => {
              utils.feedback(response);
              console.log(response);
              setTimeout(() => {
                location.reload();
              }, 1500);
            });
          }
        });
      }
    }
  }

  openSideBar() {
    const toggleBtn = document.querySelector(".toggleSide");
    const sideBar = document.querySelector(".sidebar");

    if (toggleBtn) {
      toggleBtn.addEventListener("click", () => {
        sideBar.classList.add("show-sidebar");
      });
    }
  }

  closeSideBar() {
    const closeBtn = document.querySelector(".closebtn");
    const sideBar = document.querySelector(".sidebar");

    if (closeBtn) {
      closeBtn.addEventListener("click", () => {
        sideBar.classList.remove("show-sidebar");
      });
    }
  }

  logout() {
    const logout = document.querySelector(".logout");
    if (logout) {
      logout.addEventListener("click", () => {
        if (confirm("Do you wish to logout?")) {
          fetchData(`${Base.appUrl}configs/usersession.php?logout=y`).then(
            (response) => {
              utils.feedback(response);
              if (response["status"] == "success") {
                window.location.href = `${Base.appUrl}auth/login.php?feedback=Logout successful&alert=s`;
              }
            }
          );
        }
      });
    }
  }
}
