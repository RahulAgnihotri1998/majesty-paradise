<?php
require_once "../database.php"; // Include your database connection

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $token = mysqli_real_escape_string($conn, $_POST["token"]);
    $newPassword = $_POST["new_password"];

    // Check the token in the reset_tokens table and validate its expiration
    $query = "SELECT email FROM login WHERE reset_token = ? AND reset_token_expiry > NOW()";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "s", $token);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($result && mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        $email = $row['email'];
        $updateQuery = "UPDATE login SET password = ? WHERE email = ?";
        $updateStmt = mysqli_prepare($conn, $updateQuery);
        mysqli_stmt_bind_param($updateStmt, "ss", $newPassword, $email);
        mysqli_stmt_execute($updateStmt);
    
        // Clear the reset token and expiration in the login table
        $clearTokenQuery = "UPDATE login SET reset_token = NULL, reset_token_expiry = NULL WHERE email = ?";
        $clearTokenStmt = mysqli_prepare($conn, $clearTokenQuery);
        mysqli_stmt_bind_param($clearTokenStmt, "s", $email);
        mysqli_stmt_execute($clearTokenStmt);

       // Redirect the user to the login page
       header("Location: admin-login.php?reset_success=1");
       exit();
    } else {
        header("Location: reset_password_page.php?reset_success=1");
    }
}
?>

