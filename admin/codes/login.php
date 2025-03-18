<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
session_start();
require_once 'db.php'; // Include your database connection

header('Content-Type: application/json'); // Set response content type to JSON

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email =  $_POST["email"];
    $password = $_POST["password"];

    // Query the database to retrieve the hashed password for the user
    $query = "SELECT * FROM login WHERE email = '$email' LIMIT 1";
    $result = mysqli_query($db, $query);

    if ($result) {
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            $storedPassword = $row['password'];

            // Verify the provided password against the stored hashed password
            if (password_verify($password, $storedPassword)) {
                // Set session variables
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['email'] = $row['email'];
                echo json_encode(array('success' => true, 'message' => 'Login successful! Redirecting...'));
            } else {
                echo json_encode(array('success' => false, 'message' => 'Login failed. Please check your credentials.'));
            }
        } else {
            echo json_encode(array('success' => false, 'message' => 'Login failed. Please check your credentials.'));
        }
    } else {
        echo json_encode(array('success' => false, 'message' => 'Database query error: ' . mysqli_error($db)));
    }
}
?>
