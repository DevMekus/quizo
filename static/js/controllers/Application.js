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
}
