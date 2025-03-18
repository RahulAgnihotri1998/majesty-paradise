<?php 
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
            // File upload failed
            return false;
        }
    } else {
        // File upload failed
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
    $brand_id = $_POST['brand_id'];

    // Check for name uniqueness excluding the current brand being edited
    $sqlCheckNameExistence = "SELECT id FROM brand WHERE name = '$title' AND id != $brand_id";
    $resultCheckNameExistence = $db->query($sqlCheckNameExistence);

    if ($resultCheckNameExistence->num_rows > 0) {
        // A brand with the same name already exists
        $response = array(
            'success' => false,
            'message' => 'A brand with the same name already exists.'
        );
        header('Content-Type: application/json');
        echo json_encode($response);
        exit;
    }

    // Check for URL uniqueness excluding the current brand being edited
    $sqlCheckUrlExistence = "SELECT id FROM brand WHERE url = '$url' AND id != $brand_id";
    $resultCheckUrlExistence = $db->query($sqlCheckUrlExistence);

    if ($resultCheckUrlExistence->num_rows > 0) {
        // A brand with the same URL already exists
        $response = array(
            'success' => false,
            'message' => 'A brand with the same URL already exists.'
        );
        header('Content-Type: application/json');
        echo json_encode($response);
        exit;
    }

    // Initialize variables to store file paths
    $logoPath = '';
    $featuredImagePath = '';
    $descriptionImagePath = '';

    // Handle logo file upload if a new file is provided
    if (!empty($_FILES['logo']['name']) && $_FILES['logo']['error'] !== UPLOAD_ERR_NO_FILE) {
        $logoPath = uploadFile($_FILES['logo']);
        if ($logoPath === false) {
            // File upload failed
            $response = array(
                'success' => false,
                'message' => 'Error uploading logo file.'
            );
            header('Content-Type: application/json');
            echo json_encode($response);
            exit;
        }
    }

    // Handle featured image upload if a new file is provided
    if (!empty($_FILES['featuredImage']['name']) && $_FILES['featuredImage']['error'] !== UPLOAD_ERR_NO_FILE) {
        $featuredImagePath = uploadFile($_FILES['featuredImage']);
        if ($featuredImagePath === false) {
            // File upload failed
            $response = array(
                'success' => false,
                'message' => 'Error uploading featured image file.'
            );
            header('Content-Type: application/json');
            echo json_encode($response);
            exit;
        }
    }

    // Handle description image upload if a new file is provided
    if (!empty($_FILES['descriptionImage']['name']) && $_FILES['descriptionImage']['error'] !== UPLOAD_ERR_NO_FILE) {
        $descriptionImagePath = uploadFile($_FILES['descriptionImage']);
        if ($descriptionImagePath === false) {
            // File upload failed
            $response = array(
                'success' => false,
                'message' => 'Error uploading description image file.'
            );
            header('Content-Type: application/json');
            echo json_encode($response);
            exit;
        }
    }

    // Prepare SQL statement for updating brand data
    $sql = "UPDATE brand SET 
            name = '$title', 
            url = '$url', 
            description = '$description', 
            longDescription = '$longDescription', 
            status = '$status'";

    // Add logo to the query if a new logo file is uploaded
    if (!empty($logoPath)) {
        $sql .= ", logo = '$logoPath'";
    }

    // Add featured image to the query if a new featured image file is uploaded
    if (!empty($featuredImagePath)) {
        $sql .= ", featuredImage = '$featuredImagePath'";
    }

    // Add description image to the query if a new description image file is uploaded
    if (!empty($descriptionImagePath)) {
        $sql .= ", descriptionImage = '$descriptionImagePath'";
    }

    // Append WHERE clause to specify the brand being updated
    $sql .= " WHERE id = $brand_id";

    // Execute the update query
    if ($db->query($sql) === TRUE) {
        // If update is successful, return success message
        $response = array(
            'success' => true,
            'message' => 'Brand updated successfully.'
        );
    } else {
        // If update fails, return error message
        $response = array(
            'success' => false,
            'message' => 'Error updating brand: ' . $db->error
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
    header('Content-Type: application/json');
    echo json_encode($response);
}
?>
