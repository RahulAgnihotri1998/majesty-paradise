<?php
include('db.php');
$destinationDirectory = 'product-image/';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errors = array();

    // Log incoming data
    error_log("POST Data: " . json_encode($_POST));
    error_log("FILES Data: " . json_encode($_FILES));

    $fieldMapping = [
        'exampleInputTitle' => 'title',
        'exampleInputURL' => 'url',
        'exampleInputMetaTitle' => 'metaTitle',
        'exampleInputMetaDescription' => 'metaDescription',
        'exampleInputAdditionalCode' => 'additionalCode',
        'exampleFormControlSelect2' => 'status',
        'brandId' => 'brandId'
    ];
    $requiredFields = array('title', 'url', 'metaTitle', 'metaDescription', 'additionalCode', 'status', 
        'longDescription', 'applications', 'duration', 'numberOfPersons', 'totalCost', 'highlights');
    foreach ($requiredFields as $field) {
        $frontendField = array_search($field, $fieldMapping) ?: $field;
        if (empty($_POST[$frontendField])) {
            $errors[] = ucfirst($field) . ' is required.';
        }
    }

    error_log("Validation Errors: " . json_encode($errors));

    if (empty($errors)) {
        $productId = $db->real_escape_string($_POST['product_id']);
        $title = $db->real_escape_string($_POST['exampleInputTitle']);
        $url = $db->real_escape_string($_POST['exampleInputURL']);
        $metaTitle = $db->real_escape_string($_POST['exampleInputMetaTitle']);
        $metaDescription = $db->real_escape_string($_POST['exampleInputMetaDescription']);
        $additionalCode = $db->real_escape_string($_POST['exampleInputAdditionalCode']);
        $status = ($_POST['exampleFormControlSelect2'] == 'Published') ? 'active' : 'inactive';
        $longDescription = $db->real_escape_string($_POST['longDescription']);
        $applications = $db->real_escape_string($_POST['applications']);
        $duration = $db->real_escape_string($_POST['duration']);
        $numberOfPersons = intval($_POST['numberOfPersons']);
        $totalCost = floatval($_POST['totalCost']);
        $highlights = $db->real_escape_string($_POST['highlights']);
        $brandId = intval($_POST['brandId']);
        $servicesJson = $db->real_escape_string($_POST['services']);

        $mainImage = '';
        if (!empty($_FILES['mainImage']['name'])) {
            error_log("Main Image Upload Attempt: " . $_FILES['mainImage']['name']);
            $mainImage = uploadFile('mainImage');
            if ($mainImage === false) {
                $errors[] = 'Failed to upload the main image.';
                error_log("Upload Failed: " . $_FILES['mainImage']['error']);
            } else {
                error_log("Uploaded Main Image Path: " . $mainImage);
            }
        } else if (isset($_POST['mainImageName'])) {
            $mainImage = $_POST['mainImageName'];
            error_log("Using existing mainImageName: " . $mainImage);
        } else {
            $mainImageQuery = "SELECT main_image FROM products WHERE id = '$productId'";
            $mainImageResult = $db->query($mainImageQuery);
            if ($mainImageResult && $mainImageResult->num_rows > 0) {
                $mainImageRow = $mainImageResult->fetch_assoc();
                $mainImage = $mainImageRow['main_image'];
                error_log("Fetched from DB: " . $mainImage);
            } else {
                error_log("No existing main image found for product ID: " . $productId);
            }
        }

        error_log("Main Image Before Query: " . $mainImage);

        if (empty($errors)) {
            $sql = "UPDATE products SET
                title = '$title',
                url = '$url',
                meta_title = '$metaTitle',
                meta_description = '$metaDescription',
                additional_code = '$additionalCode',
                status = '$status',
                long_description = '$longDescription',
                applications = '$applications',
                duration = '$duration',
                number_of_persons = '$numberOfPersons',
                total_cost = '$totalCost',
                highlights = '$highlights',
                brand_id = '$brandId',
                services = '$servicesJson',
                main_image = '$mainImage'
                WHERE id = '$productId'";
            error_log("SQL Query: " . $sql);

            if ($db->query($sql) === TRUE) {
                error_log("Update successful");
                $response = array('success' => true, 'message' => 'Product data updated successfully.');
            } else {
                $errors[] = 'Error updating product: ' . $db->error;
                error_log("Update failed: " . $db->error);
            }
        }
    }

    if (!empty($errors)) {
        $response = array('success' => false, 'errors' => $errors);
    }

    error_log("Final Response: " . json_encode($response));
    header('Content-Type: application/json');
    echo json_encode($response);
} else {
    http_response_code(405);
    $response = array('error' => 'Invalid request method.');
    echo json_encode($response);
}

function uploadFile($inputName) {
    global $destinationDirectory;
    if (!isset($_FILES[$inputName]) || $_FILES[$inputName]['error'] === UPLOAD_ERR_NO_FILE) {
        error_log("No file uploaded for $inputName");
        return false;
    }
    $fileName = basename($_FILES[$inputName]['name']);
    $targetFile = $destinationDirectory . time() . '_' . $fileName;
    if (move_uploaded_file($_FILES[$inputName]['tmp_name'], $targetFile)) {
        error_log("File moved to: " . $targetFile);
        return $targetFile;
    }
    error_log("Failed to move file: " . $_FILES[$inputName]['error']);
    return false;
}
?>