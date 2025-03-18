<?php
// Include the database configuration file
include('db.php');
$destinationDirectory = 'product-image/'; // Replace with the actual path

// Check if the request is a POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Define an array to store validation errors
    $errors = array();

    // Validate required fields
    $requiredFields = array(
        'title', 'url', 'metaTitle', 'metaDescription', 'additionalCode', 'status', 
        'longDescription', 'applications', 'duration', 'numberOfPersons', 'totalCost', 'highlights'
    );
    foreach ($requiredFields as $field) {
        if (empty($_POST[$field])) {
            $errors[] = ucfirst($field) . ' is required.';
        }
    }

    // Check if any validation errors occurred
    if (empty($errors)) {
        // Get the form data
        $title = $db->real_escape_string($_POST['title']);
        $url = $db->real_escape_string($_POST['url']);
        $metaTitle = $db->real_escape_string($_POST['metaTitle']);
        $metaDescription = $db->real_escape_string($_POST['metaDescription']);
        $additionalCode = $db->real_escape_string($_POST['additionalCode']);
        $status = ($_POST['status'] == 'Published') ? 'active' : 'inactive'; // Mapping status
        $longDescription = $db->real_escape_string($_POST['longDescription']);
        $applications = $db->real_escape_string($_POST['applications']);
        $duration = $db->real_escape_string($_POST['duration']);
        $numberOfPersons = intval($_POST['numberOfPersons']);
        $totalCost = floatval($_POST['totalCost']);
        $highlights = $db->real_escape_string($_POST['highlights']);
        
        // Handle selectedPackages for brand_id
        $brandId = intval($_POST['selectedPackages']); // Assuming selectedPackages is a single value for brand_id

        // Handle services input as JSON
        var_dump($_POST['services']);
        $servicesJson = $db->real_escape_string($_POST['services']); // Services are already JSON

        // Handle file uploads
        $mainImage = uploadFile('mainImage');
        $galleryImages = array();

        if (isset($_FILES['galleryImages'])) {
            foreach ($_FILES['galleryImages']['name'] as $key => $file_name) {
                $file_tmp = $_FILES['galleryImages']['tmp_name'][$key];
                $file_error = $_FILES['galleryImages']['error'][$key];

                if ($file_error === UPLOAD_ERR_OK) {
                    $target_file = $destinationDirectory . basename($file_name);
                    if (move_uploaded_file($file_tmp, $target_file)) {
                        $galleryImages[] = $target_file;
                    } else {
                        $errors[] = 'Failed to move uploaded file: ' . $file_name;
                    }
                } else {
                    $errors[] = 'Error uploading file: ' . $file_name;
                }
            }
        }

        // Check if any validation errors occurred during file upload
        if (empty($errors)) {
            // Prepare SQL statement for inserting product details
           echo  $sql = "INSERT INTO products (
                title, url, meta_title, meta_description, additional_code, main_image, 
                status, long_description, applications, duration, number_of_persons, 
                total_cost, highlights, services, brand_id
            ) VALUES (
                '$title', '$url', '$metaTitle', '$metaDescription', '$additionalCode', 
                '$mainImage', '$status', '$longDescription', '$applications', 
                '$duration', '$numberOfPersons', '$totalCost', '$highlights', '$servicesJson', '$brandId'
            )";

            // Execute the statement to insert product details
            if ($db->query($sql) === TRUE) {
                // Get the last inserted product ID
                $lastProductId = $db->insert_id;

                // Insert gallery images into the database
                foreach ($galleryImages as $image) {
                    $insertImageSql = "INSERT INTO gallery_images (product_id, image_url) VALUES ('$lastProductId', '$image')";
                    $db->query($insertImageSql);
                }

                // Success
                $response = array(
                    'success' => true,
                    'message' => 'Product data received and saved to the database successfully.'
                );
            } else {
                // Error
                $errors[] = 'Error saving the product data to the database: ' . $db->error;
            }
        }
    }

    // If validation errors occurred, send an error response
    if (!empty($errors)) {
        $response = array(
            'success' => false,
            'errors' => $errors
        );
    }

    // Send a JSON response
    header('Content-Type: application/json');
    echo json_encode($response);
} else {
    // Handle non-POST requests if necessary
    http_response_code(405); // Method Not Allowed
    echo json_encode(array('error' => 'Invalid request method.'));
}

function uploadFile($inputName) {
    global $destinationDirectory;

    $fileName = basename($_FILES[$inputName]['name']);
    $targetFile = $destinationDirectory . $fileName;
    $uploadOk = 1;

    // Check file size (adjust as needed)
    if ($_FILES[$inputName]['size'] > 5000000) {
        $uploadOk = 0;
    }

    // Allow certain file formats (adjust as needed)
    $allowedFileTypes = array('jpg', 'jpeg', 'png', 'gif', 'webp');
    $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    if (!in_array($fileType, $allowedFileTypes)) {
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        return false;
    } else {
        // If everything is ok, try to upload the file
        if (move_uploaded_file($_FILES[$inputName]['tmp_name'], $targetFile)) {
            return $targetFile;
        } else {
            return false;
        }
    }
}
?>