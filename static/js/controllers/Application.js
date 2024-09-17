import Base from "./Base.js";
import Utility from "../Utility.js";
const utils = new Utility();
export default class Application {
  login() {
    const loginForm = document.querySelector(".login_form");

    if (loginForm) {
      loginForm.addEventListener("submit", (e) => {
        e.preventDefault();

        postData(
          `${Base.apiUrl}auth/login`,
          JSON.stringify(utils.formData_to_Object(new FormData(loginForm)))
        ).then((response) => {
          console.log(response);
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

    if (newQuiz) {
      newQuiz.addEventListener("submit", (e) => {
        e.preventDefault();
        postData(
          `${Base.apiUrl}quiz/quiz`,
          JSON.stringify(utils.formData_to_Object(new FormData(newQuiz)))
        ).then((response) => {
          utils.feedback(response);
          console.log(response);
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
          console.log(response);
          // setTimeout(() => {
          //   location.reload();
          // }, 1500);
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
                console.log(response);
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
    if (quizForm) {
      quizForm.addEventListener("submit", function (event) {
        event.preventDefault();

        let totalQuestions = document.querySelectorAll(".quiz-question").length;
        let correctAnswers = 0;

        document
          .querySelectorAll(".quiz-question")
          .forEach((questionDiv, index) => {
            const questionNumber = index + 1;

            const selectedOption = document.querySelector(
              `input[name="question${questionNumber}"]:checked`
            );

            const correctAnswer = document.querySelector(
              `input[name="optionCorrect${questionNumber}"]`
            );
            
            if (correctAnswer) {
              correctAnswer.value;
            }

            if (selectedOption && selectedOption.value === correctAnswer) {
              correctAnswers++;
            }
          });

        alert(`You got ${correctAnswers} out of ${totalQuestions} correct.`);
      });
    }
  }
}
