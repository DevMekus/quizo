export default class Base {
  static pageUrl = location.href;
  static appUrl = "http://localhost/quizo/";
  static token = sessionStorage.getItem("token")
    ? JSON.parse(sessionStorage.getItem("token"))
    : [];
  static apiUrl = "http://127.0.0.1:5000/";

  static async getUsers() {
    let users = null;
    await fetchData(`${Base.apiUrl}users/all`).then((data) => {
      users = data;
      return data;
    });

    return users;
  }

  static async getQuiz() {
    let quiz = null;
    await fetchData(`${Base.apiUrl}quiz/all`).then((data) => {
      quiz = data;
      return data;
    });

    return quiz;
  }
}
