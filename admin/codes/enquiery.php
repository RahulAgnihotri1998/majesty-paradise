<?php
// Include your database connection code or require_once('db_connection.php');
include('db.php');
// Check if it's a POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Assuming you have a function to sanitize and validate inputs
    $enqueriesId = filter_input(INPUT_POST, 'enqueries_id', FILTER_VALIDATE_INT);
    $newUserStatus = filter_input(INPUT_POST, 'newUserStatus');

    if ($enqueriesId === false || $newUserStatus === false || empty($newUserStatus)) {
        // Invalid input, handle the error accordingly
        $response = array(
            'success' => false,
            'message' => 'Invalid input data.'
        );
    } else {
        // Update the enqueries status in the 'enqueriess' table
        // Assuming $db is your database connection
        $updateQuery = "UPDATE enqueries SET status = ? WHERE id = ?";
        $updateStmt = $db->prepare($updateQuery);
        $updateStmt->bind_param('si', $newUserStatus, $enqueriesId);
        
        if ($updateStmt->execute()) {
            // Success
            $response = array(
                'success' => true,
                'message' => 'enqueries status updated successfully.'
            );
        } else {
            // Error
            $response = array(
                'success' => false,
                'message' => 'Error updating enqueries status: ' . $updateStmt->error
            );
        }

        $updateStmt->close();
    }

    // Send a JSON response
    header('Content-Type: application/json');
    echo json_encode($response);
} else {
    // Handle non-POST requests if necessary
    http_response_code(405); // Method Not Allowed
    echo json_encode(array('error' => 'Invalid request method.'));
}
?>
