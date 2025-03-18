<?php
require_once "../database.php"; // Include your database connection



if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $uploadDir = "../assets/images/others/";

    if (!is_dir($uploadDir)) {
        mkdir($uploadDir);
    }

    $uploadedImages = array();
    $errors = array(); // Create an array to store error messages

    foreach ($_FILES["images"]["error"] as $key => $error) {
        if ($error === UPLOAD_ERR_OK) {
            $tmpName = $_FILES["images"]["tmp_name"][$key];
            $name = basename($_FILES["images"]["name"][$key]);

            // Limit file size to 1MB
            if ($_FILES["images"]["size"][$key] <= 1024 * 1024) {
                move_uploaded_file($tmpName, $uploadDir . $name);
                $uploadedImages[] = $uploadDir . $name;

                // Store image information in the database using a simple query
            $insertQuery = "INSERT INTO uploaded_images (name, path) VALUES ('$name', '$uploadDir$name')";
                $conn->query($insertQuery);
            } else {
                $errors[] = "File '$name' exceeds the maximum size limit of 1MB.";
            }
        }
    }

    if (!empty($errors)) {
        echo json_encode(array("success" => false, "message" => $errors));
    } else {
        echo json_encode(array("success" => true, "message" => "Images uploaded successfully."));
    }
} elseif ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["action"]) && $_GET["action"] === "delete") {
    $imagePath = $_GET["path"];
    if (file_exists($imagePath)) {
        unlink($imagePath);
        
        // Delete image record from the database using a simple query
        $deleteQuery = "DELETE FROM uploaded_images WHERE path = '$imagePath'";
        $conn->query($deleteQuery);
        
        echo json_encode(array("success" => true, "message" => "Image deleted successfully."));
    } else {
        echo json_encode(array("success" => false, "message" => "Image not found."));
    }
}


?>
