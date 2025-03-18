<?php
require 'vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
require_once "../database.php";

// echo 'hello';
$email = mysqli_real_escape_string($conn, $_POST["email"]);

// Check if the email exists in the database
$email_check_query = "SELECT email FROM login WHERE email = ?";
$stmt_check = mysqli_prepare($conn, $email_check_query);
mysqli_stmt_bind_param($stmt_check, "s", $email);
mysqli_stmt_execute($stmt_check);
mysqli_stmt_store_result($stmt_check);
$rowCount = mysqli_stmt_num_rows($stmt_check);
mysqli_stmt_close($stmt_check);

if ($rowCount > 0) {
   
    // Generate a random reset token
    $token = bin2hex(random_bytes(32));

    // Store the token and its expiry in the login table
    $expiry = date('Y-m-d H:i:s', strtotime('+1 day'));
   $query = "UPDATE login SET reset_token = ?, reset_token_expiry = ? WHERE email = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "sss", $token, $expiry, $email);
    mysqli_stmt_execute($stmt);

    // Send reset email with PHPMailer
    $url = BASE_URL; // Replace with your actual domain
    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'bornwithcode@gmail.com'; // Your Gmail email address
    $mail->Password = 'zkywrebkuhzuppxj'; // Your Gmail password or app-specific password
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    $mail->setFrom('bornwithcode@gmail.com', 'Your Name');
    $mail->addAddress($email); // Use $email here

    $mail->Subject = 'Password Reset';
    $mail->Body = "Click the following link to reset your password: $url/blog-admin/admin/reset_password_page.php?token=$token";

    if ($mail->send()) {
        // Reset email sent successfully
        header("Location: reset_email.php?success=1");
        exit();
    } else {
        // Error sending reset email
        header("Location: reset_email.php?success=0");
        exit();
    }
} else {
    // Email does not exist in the database
    header("Location: reset_email.php?success=2");
    exit();
}


?>
