<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Admin Login</title>
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
            <!-- <?php if(isset($_SESSION['error'])){
                ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $_SESSION['error'];?>
                </div>
                <?php
            }
                ?> -->
                <h4 class="text-center">Admin Login</h4>
            <div class="card-body">
            <div id="loginResult"></div>
            <form role="form" id="loginForm" action="login_process.php" method="post">
                <div class="mb-3">
                <input type="text" class="form-control form-control-lg" name="email" id="email" placeholder="Email" aria-label="Email">

                    <small class="error-msg" id="emailError">Invalid email</small>
                </div>
                <div class="mb-3">
                    <input type="password" class="form-control form-control-lg" name="password" id="password" placeholder="Password" aria-label="Password">
                    <small class="error-msg" id="passwordError">Password is required</small>
                </div>
              
                <div class="text-center">
                    <button type="submit" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0" id="signInButton">Sign in</button>
                </div>
            </form>
        </div>
        <div class="card-footer text-center pt-0 px-lg-2 px-1">
            <p class="mb-4 text-sm mx-auto">
                Reset password  ?
                <a href="reset_email.php" class="text-primary text-gradient font-weight-bold" id="resetPasswordLink">Reset Password</a>


            </p>
        </div>
            </div>
            </div>
            
       
  

        </main>





<!--    <script>-->
<!--    const email = document.getElementById('email');-->
<!--    const password = document.getElementById('password');-->
<!--    const emailError = document.getElementById('emailError');-->
<!--    const passwordError = document.getElementById('passwordError');-->
<!--    const signInButton = document.getElementById('signInButton');-->

<!--    email.addEventListener('input', function () {-->
<!--        emailError.style.display = 'none';-->
<!--    });-->

<!--    password.addEventListener('input', function () {-->
<!--        passwordError.style.display = 'none';-->
<!--    });-->

<!--    signInButton.addEventListener('click', function () {-->
<!--        let hasError = false;-->

<!--        if (!email.value || !/^\S+@\S+\.\S+$/.test(email.value)) {-->
<!--            emailError.style.display = 'block';-->
<!--            hasError = true;-->
<!--        }-->

<!--        if (!password.value) {-->
<!--            passwordError.style.display = 'block';-->
<!--            hasError = true;-->
<!--        }-->

<!--        if (hasError) {-->
<!--            event.preventDefault();-->
<!--        }-->
<!--    });-->


    
<!--</script>-->


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