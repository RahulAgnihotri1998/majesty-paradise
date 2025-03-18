<?php
// Include the database configuration file
include('./codes/db.php');

// Check if the product ID is provided in the URL
if(isset($_GET['id'])) {
    // Get the product ID from the URL parameter
    $productId = $_GET['id'];

    // Prepare and execute the SQL statement to delete the product from the database
    $sql = "DELETE FROM products WHERE id = '$productId'";
    if ($db->query($sql) === TRUE) {
        header('Location: manage-products.php');
        // If deletion is successful, return success message
        $response = array(
            'success' => true,
            'message' => 'Product deleted successfully.'
        );
    } else {
        // If deletion fails, return error message
        $response = array(
            'success' => false,
            'message' => 'Error deleting product: ' . $db->error
        );
    }

    // Send JSON response
    header('Content-Type: application/json');
    echo json_encode($response);
} else {
    // If product ID is not provided, return error message
    $response = array(
        'success' => false,
        'message' => 'Product ID not provided.'
    );

    // Send JSON response
    header('Content-Type: application/json');
    echo json_encode($response);
}
?>
