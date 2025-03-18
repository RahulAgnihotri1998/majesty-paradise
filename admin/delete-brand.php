<?php
// Include the database configuration file
include('./codes/db.php');

// Check if the brand ID is provided in the URL
if(isset($_GET['id'])) {
    // Get the brand ID from the URL parameter
    $brandId = $_GET['id'];

    // Prepare and execute the SQL statement to delete the brand from the database
    $sql = "DELETE FROM brand WHERE id = '$brandId'";
    if ($db->query($sql) === TRUE) {
        // If deletion is successful, redirect the user to the manage-brands page
        header('Location: manage-brands.php');
        exit(); // Stop further execution
    } else {
        // If deletion fails, return error message
        $response = array(
            'success' => false,
            'message' => 'Error deleting brand: ' . $db->error
        );
    }

    // Send JSON response
    header('Content-Type: application/json');
    echo json_encode($response);
} else {
    // If brand ID is not provided, return error message
    $response = array(
        'success' => false,
        'message' => 'Brand ID not provided.'
    );

    // Send JSON response
    header('Content-Type: application/json');
    echo json_encode($response);
}
?>
