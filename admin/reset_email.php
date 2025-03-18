<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title> Admin Login</title>
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

            <?php
$success = isset($_GET['success']) ? $_GET['success'] : null;

if ($success === '1') {
    echo '<p style="color: green;">Reset email sent successfully, check your email</p>';
} elseif ($success === '0') {
    echo '<p style="color: red;">Error sending reset email.</p>';
} elseif ($success === '2') {
    echo '<p style="color: red;">Email doesnt exist.</p>';
}


// Display your HTML content for the reset_email.php page
// ...
?>
          
                <h4 class="text-center">Admin Login</h4>
            <div class="card-body">
            <h4 class="font-weight-bolder">Reset Password</h4>
            <p class="mb-0">Enter your email to reset your password</p>
        </div>
        <div class="card-body">
        <div id="loginResult"></div>
        <form role="form" id="resetForm" action="reset_password.php" method="post">
                    <div class="mb-3">
                        <input type="email" class="form-control form-control-lg" name="email" placeholder="Email" aria-label="Email">
                        <small class="error-msg" id="emailError">Invalid email</small>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0" id="resetButton">Send Reset Email</button>
                    </div>
                </form>
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



    <!-- Bootstrap JS -->
    <script src="../assets/js/vendor/bootstrap.min.js"></script>
</body>
</html>