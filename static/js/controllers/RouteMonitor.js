import Base from "./Base.js";
import Utility from "../Utility.js";
const utils = new Utility();

/**Monitors the routes and run special functions */
export default class RouteCrawler {
  get_user_quiz() {
    if (Base.pageUrl.includes("/dashboard/")) {
      const token = Base.token;
      console.log(token);
      console.log(token["token"]);
      fetchData(`${Base.apiUrl}quiz/quiz`, {}).then((data) => {
        console.log(data);
      });
    }
  }

  userQuiz(quiz=null){
    let total =0
    const userid = Base.token['id']
    
    if(quiz!=null){
      quiz.forEach(item => {
       
      });
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
