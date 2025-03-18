<?php
// Assuming you have already established a database connection
include('db.php');
// Check if the selected image IDs are provided in the request
if (isset($_POST['selectedImageIds'])) {
    // Sanitize and process the selected image IDs
    $selectedImageIds = explode(',', $_POST['selectedImageIds']);
    $selectedImageIds = array_map('intval', $selectedImageIds); // Convert string IDs to integers
    $selectedImageIds = array_filter($selectedImageIds); // Remove empty or non-numeric values

    if (!empty($selectedImageIds)) {
        // Construct the SQL query to delete images
        $placeholders = implode(',', array_fill(0, count($selectedImageIds), '?'));
        $sql = "DELETE FROM gallery_images WHERE id IN ($placeholders)";

        // Prepare the SQL statement
        $stmt = $db->prepare($sql);
        if ($stmt) {
            // Bind the image IDs as parameters
            $types = str_repeat('i', count($selectedImageIds)); // 'i' represents integer type
            $stmt->bind_param($types, ...$selectedImageIds);

            // Execute the statement
            if ($stmt->execute()) {
                // Image deletion successful
                $response = [
                    'success' => true,
                    'message' => 'Selected images deleted successfully.'
                ];
                echo json_encode($response);
                exit;
            } else {
                // Error executing SQL statement
                $response = [
                    'success' => false,
                    'message' => 'Failed to delete images. Please try again later.'
                ];
                echo json_encode($response);
                exit;
            }
        }
    }
}

// If execution reaches here, there was an issue with the request or deletion process
$response = [
    'success' => false,
    'message' => 'Invalid request or no images selected for deletion.'
];
echo json_encode($response);
exit;
?>
