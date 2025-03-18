
<?php
session_start();

// Check if session variables exist
if(isset($_SESSION['user_id']) && isset($_SESSION['email'])) {
    // Session variables exist, user is already logged in
    header("Location: index.php"); // Redirect to profile page
    exit; // Ensure script execution stops after redirection
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>MLA Admin Login</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/feather/feather.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  <!-- endinject -->
 <link rel="shortcut icon" href="https://www.mlagroup.com/img/favicon.png" />
</head>
<?php include('./codes/db.php') ?>
<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <img style="height: 60px; object-fit: contain;" src="./images/MajestyParadise-logo-HD-Transparent.png" alt="logo">
              </div>
              <h4>Hello! let's get started</h4>
              <h6 class="font-weight-light">Sign in to continue.</h6>
              <form id="loginForm" class="pt-3">
    <div class="form-group">
        <input type="email" class="form-control form-control-lg" id="email" name="email" placeholder="Username" required>
        <div id="emailError" class="error-message"></div>
    </div>
    <div class="form-group">
        <input type="password" class="form-control form-control-lg" id="password" name="password" placeholder="Password" required>
        <div id="passwordError" class="error-message"></div>
    </div>
    <div class="mt-3">
        <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">SIGN IN</button>
    </div>
    <div id="loginMessage"></div>
</form>

            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>

  <script>
document.addEventListener('DOMContentLoaded', function() {
    var loginForm = document.getElementById('loginForm');
    var emailInput = document.getElementById('email');
    var passwordInput = document.getElementById('password');
    var loginMessage = document.getElementById('loginMessage');

    loginForm.addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent default form submission

        // Clear previous error messages
        loginMessage.textContent = '';

        // Validate email and password
        if (!emailInput.value.trim()) {
            loginMessage.textContent = 'Email is required';
            return;
        }

        if (!passwordInput.value.trim()) {
            loginMessage.textContent = 'Password is required';
            return;
        }

        // Submit form data via AJAX
        var formData = new FormData(loginForm);
        var xhr = new XMLHttpRequest();
        xhr.open('POST', './codes/login.php');
        xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest'); // Set header to indicate AJAX request
        xhr.onload = function() {
            if (xhr.status === 200) {
                // Parse JSON response
                var response = JSON.parse(xhr.responseText);
                if (response.success) {
                    loginMessage.textContent = response.message;
                    // Redirect or perform other actions
                    window.location.href = 'index.php';
                } else {
                    loginMessage.textContent = response.message;
                }
            } else {
                loginMessage.textContent = 'Error: ' + xhr.statusText;
            }
        };
        xhr.onerror = function() {
            loginMessage.textContent = 'Request failed';
        };
        xhr.send(formData);
    });
});

  </script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <!-- endinject -->
</body>

</html>
