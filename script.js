document.addEventListener("DOMContentLoaded", () => {
    const loginForm = document.getElementById("loginForm");
    const registerForm = document.getElementById("registerForm");
  
    if (loginForm) {
      loginForm.addEventListener("submit", function (event) {
        event.preventDefault();
        // Assuming login is successful
        window.location.href = "index.html";
      });
    }
  
    if (registerForm) {
      registerForm.addEventListener("submit", function (event) {
        event.preventDefault();
        // Assuming registration is successful
        window.location.href = "login.html";
      });
    }
  });
  