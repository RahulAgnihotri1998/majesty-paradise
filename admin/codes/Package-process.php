<?php
// Include the database configuration file
include('db.php');

// Function to handle file upload
function uploadFile($file) {
    // Specify the directory where the file will be uploaded
    $uploadDirectory = 'uploads/'; // Change this to your desired upload directory
    
    // Check if the file was uploaded without errors
    if ($file['error'] == UPLOAD_ERR_OK) {
        // Generate a unique filename to avoid overwriting existing files
        $fileName = uniqid() . '_' . basename($file['name']);
        $targetFilePath = $uploadDirectory . $fileName;

        // Move the uploaded file to the specified directory
        if (move_uploaded_file($file['tmp_name'], $targetFilePath)) {
            // File upload successful, return the path to the uploaded file
            return $targetFilePath;
        } else {
            // File upload failed, return false
            return false;
        }
    } else {
        // File upload failed, return false
        return false;
    }
}

// Check if the request is a POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the form data
    $title = $_POST['title'];
    $url = $_POST['url'];
    $description = $_POST['description'];
    $longDescription = $_POST['longDescription'];
    $status = $_POST['status'];

    // Handle file uploads
    $logoPath = '';
    $featuredImagePath = '';
    $descriptionImagePath = '';

    // Upload logo if provided
    if (!empty($_FILES['logo']['name'])) {
        $logoPath = uploadFile($_FILES['logo']);
        if ($logoPath === false) {
            // File upload failed
            $response = array(
                'success' => false,
                'message' => 'Error uploading logo file.'
            );
            header('Content-Type: application/json');
            echo json_encode($response);
            exit; // Stop further execution
        }
    }

    // Upload featured image if provided
    if (!empty($_FILES['featuredImage']['name'])) {
        $featuredImagePath = uploadFile($_FILES['featuredImage']);
        if ($featuredImagePath === false) {
            // File upload failed
            $response = array(
                'success' => false,
                'message' => 'Error uploading featured image file.'
            );
            header('Content-Type: application/json');
            echo json_encode($response);
            exit; // Stop further execution
        }
    }

    // Upload description image if provided
    if (!empty($_FILES['descriptionImage']['name'])) {
        $descriptionImagePath = uploadFile($_FILES['descriptionImage']);
        if ($descriptionImagePath === false) {
            // File upload failed
            $response = array(
                'success' => false,
                'message' => 'Error uploading description image file.'
            );
            header('Content-Type: application/json');
            echo json_encode($response);
            exit; // Stop further execution
        }
    }

    // Check if a brand with the same name or URL already exists
    $checkSql = "SELECT COUNT(*) AS total FROM brand WHERE name = '$title' OR url = '$url'";
    $checkResult = $db->query($checkSql);
    $row = $checkResult->fetch_assoc();
    if ($row['total'] > 0) {
        // Brand with the same name or URL already exists, return error message
        $response = array(
            'success' => false,
            'message' => 'Brand with the same name or URL already exists.'
        );

        // Send JSON response
        header('Content-Type: application/json');
        echo json_encode($response);
        exit; // Stop further execution
    }

    // Prepare and execute the SQL statement to insert data into the brand table
     $sql = "INSERT INTO brand (name, url, description, longDescription, logo, featuredImage, descriptionImage, status, created_at, updated_at) 
            VALUES ('$title', '$url', '$description', '$longDescription', '$logoPath', '$featuredImagePath', '$descriptionImagePath', '$status', NOW(), NOW())";

    if ($db->query($sql) === TRUE) {
        // If insertion is successful, return success message
        $response = array(
            'success' => true,
            'message' => 'Brand added successfully.'
        );
    } else {
        // If insertion fails, return error message
        $response = array(
            'success' => false,
            'message' => 'Error adding brand: ' . $db->error
        );
    }

    // Send JSON response
    header('Content-Type: application/json');
    echo json_encode($response);
} else {
    // If request method is not POST, return error message
    $response = array(
        'success' => false,
        'message' => 'Invalid request method.'
    );

    // Send JSON response
    header('Content-Type: application/json');
    echo json_encode($response);
}
?>
