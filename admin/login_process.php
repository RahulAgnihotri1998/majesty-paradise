<?php
session_start();
require_once "../database.php"; // Include your database connection

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $password = $_POST["password"];

    // Perform login verification using SQL (plain text passwords)
    $query = "SELECT * FROM login WHERE email = '$email' AND password = '$password' LIMIT 1";
    $result = mysqli_query($conn, $query);

    if ($result) {
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            
            // Set session variables
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['email'] = $row['email'];
            
            echo "Login successful! Redirecting...";
        } else {
            echo "Login failed. Please check your credentials.";
        }
    } else {
        echo "Database query error: " . mysqli_error($conn);
    }
}
?>

