export default class Utility {
  formData_to_Object(formData) {
    const formObject = {};

    formData.forEach((value, key) => {
      formObject[key] = value;
    });

    return formObject;
  }

  timeAgo(phpTimestamp) {
    const now = new Date();
    const timestamp = new Date(phpTimestamp * 1000); // Convert PHP timestamp to milliseconds
    const secondsPast = (now - timestamp) / 1000;

    if (secondsPast < 60) {
      return `${Math.floor(secondsPast)} seconds ago`;
    } else if (secondsPast < 3600) {
      return `${Math.floor(secondsPast / 60)} minutes ago`;
    } else if (secondsPast < 86400) {
      return `${Math.floor(secondsPast / 3600)} hours ago`;
    } else if (secondsPast < 2592000) {
      return `${Math.floor(secondsPast / 86400)} days ago`;
    } else if (secondsPast < 31536000) {
      return `${Math.floor(secondsPast / 2592000)} months ago`;
    } else {
      return `${Math.floor(secondsPast / 31536000)} years ago`;
    }
  }

  feedback(response = null) {
    const feedback = document.querySelectorAll(".feedback");

    if (feedback && response != null) {
      for (let i = 0; i < feedback.length; i++) {
        feedback[i].innerHTML = ``;
        feedback[i].innerHTML = `

         <div class="alert alert-${
           response["status"] ? "success" : "danger"
         } alert-dismissible fade show" role="alert">
              <p class="">${response["message"]}.</p>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
               `;
      }
    }
  }
}
