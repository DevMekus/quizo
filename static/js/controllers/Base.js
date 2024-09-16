export default class Base {
  static pageUrl = location.href;
  static appUrl = "http://localhost/quizo/";
  static token = sessionStorage.getItem("token")
    ? JSON.parse(sessionStorage.getItem("token"))
    : [];
  static apiUrl = "http://127.0.0.1:5000/";
}
