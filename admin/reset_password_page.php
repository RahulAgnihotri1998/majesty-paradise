<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>SSF Admin Login</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 
    <link rel="stylesheet" href="../assets/css/vendor/bootstrap.min.css">

    <link rel="stylesheet" href="../assets/css/plugins/font-awesome.css">

</head>
<style>
 .error-msg {
        color: red;
        display: none;
    }
.page-wrappper{
    width:30%;
    margin:50px auto;
    
}

.card-login{
    box-shadow: 2px 7px 17px -2px rgb(16 134 255 / 42%);
    padding:20px 4px 20px 4px;
    border-radius:15px;
    border:none;
}

.bk-button {
    height: 47px;
    background: linear-gradient(to right, #02a2cd 0%, #369cf4 63%);
    border: none;
    width: 100%;
    color: #fff;
    font-weight: 400;
    border-radius: 7px;
    transition: all 0.3s;
}

.btn-btn-gradient {
    box-shadow: 0px 20px 20px -17px rgb(16 168 255 / 99%);
}

</style>

<body>
        <main class="page-wrappper">
            <div class="card card-login">

          
                <h4 class="text-center">Admin Login</h4>
            <div class="card-body">
            <h4 class="font-weight-bolder">Enter New Password</h4>
            <p class="mb-0">Enter your email to reset your password</p>
        </div>
        <div class="card-body">
        <div id="loginResult"></div>
        <?php
if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["token"])) {
    $token = $_GET["token"];
    
    // Check the token in the reset_tokens table and validate its expiration
    
    // Initialize variables for password validation
    $password = $new_password = "";
    $password_error = $new_password_error = "";

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        // Validate the new password
        if (empty($_POST["new_password"])) {
            $new_password_error = "New password is required";
        } elseif (strlen($_POST["new_password"]) < 8) {
            $new_password_error = "Password must be at least 8 characters long";
        } else {
            $new_password = $_POST["new_password"];
        }
        
        // Other validation checks for the password can be added here
        
        // If all validations pass, proceed to reset password logic
        if (empty($new_password_error)) {
            // Perform the password reset logic
            
            // Redirect to a success page or display a success message
        }
    }

    // Display the password reset form
    echo '<form method="post" action="reset_password_process.php">';
    echo '<input class="form-control" type="hidden" name="token" value="' . $token . '">';
    echo '<input class="form-control" type="password" name="new_password" placeholder="New Password">';
    if (!empty($new_password_error)) {
        echo '<p style="color: red;">' . $new_password_error . '</p>';
    }
    echo '<button class="btn btn-primary mt-2" type="submit">Reset Password</button>';
    echo '</form>';
}
?>

        </div>
            <?php if (isset($_GET['reset_success']) && $_GET['reset_success'] == 1) {
  echo '<p>Invalid token or token Exprired .</p>';
} ?>
        <div class="card-footer text-center pt-0 px-lg-2 px-1">
      
    </div>
        </div>
        <div class="card-footer text-center pt-0 px-lg-2 px-1">
          
        </div>
            </div>
            </div>
            
       
  

        </main>





    <script>
    const email = document.getElementById('email');
    const password = document.getElementById('password');
    const emailError = document.getElementById('emailError');
    const passwordError = document.getElementById('passwordError');
    const signInButton = document.getElementById('signInButton');

    email.addEventListener('input', function () {
        emailError.style.display = 'none';
    });

    // password.addEventListener('input', function () {
    //     passwordError.style.display = 'none';
    // });

    signInButton.addEventListener('click', function () {
        let hasError = false;

        if (!email.value || !/^\S+@\S+\.\S+$/.test(email.value)) {
            emailError.style.display = 'block';
            hasError = true;
        }

        // if (!password.value) {
        //     passwordError.style.display = 'block';
        //     hasError = true;
        // }

        if (hasError) {
            event.preventDefault();
        }
    });


    
</script>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $("#loginForm").submit(function(event) {
        event.preventDefault(); // Prevent the form from submitting normally
        
        var formData = $(this).serialize(); // Serialize the form data
        
        // Send an AJAX request to login_process.php
        $.ajax({
            type: "POST",
            url: "login_process.php",
            data: formData,
            success: function(response) {
                $("#loginResult").html(response);
                // Check if the response indicates a successful login
                if (response.includes("Login successful")) {
                    // Redirect to index.php after a short delay (e.g., 2 seconds)
                    setTimeout(function() {
                        window.location.href = "index.php";
                    }, 2000); // 2000 milliseconds = 2 seconds
                }
            }
        });
    });
});
</script>
    <!-- Bootstrap JS -->
    <script src="../assets/js/vendor/bootstrap.min.js"></script>
</body>
</html>