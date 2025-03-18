<?php
session_start();
ob_start();
require_once "../database.php";

if (isset($_POST['update_cat'])) {
    $id = mysqli_real_escape_string($conn, $_POST['updateid']);
    $catname = mysqli_real_escape_string($conn, $_POST['cat_name']);
    $cattitle = mysqli_real_escape_string($conn, $_POST['meta_title']);
    $car_url = mysqli_real_escape_string($conn, $_POST['car_url']);
    $metadescription = mysqli_real_escape_string($conn, $_POST['meta_description']);

    $sql_url_check = "SELECT * FROM category WHERE slug = '$car_url' AND id != '$id'";
    $sql_catname_check = "SELECT * FROM category WHERE cat_name = '$catname' AND id != '$id'";

    $res_url_check = mysqli_query($conn, $sql_url_check);
    $res_catname_check = mysqli_query($conn, $sql_catname_check);

    if (mysqli_num_rows($res_url_check) > 0) {
        $_SESSION['status'] = "URL Already Exists";
    } elseif (mysqli_num_rows($res_catname_check) > 0) {
        $_SESSION['status'] = "Category Name Already Exists";
    } else {
        $query = "UPDATE category SET cat_name = '$catname', meta_title = '$cattitle', slug = '$car_url',  meta_description = '$metadescription' WHERE id ='$id'";
        $updatecat = mysqli_query($conn, $query);

        if ($updatecat) {
            $_SESSION['status'] = "Updated Successfully";
        } else {
            $_SESSION['status'] = "Something Went Wrong";
        }
    }

    header("Location: categories.php");
    exit(); // Important to exit after a header location
}



if (isset($_POST['deletecat'])) {
    require_once "../database.php";
    
    $id = mysqli_real_escape_string($conn, $_POST['delete_id']);
    
    // First, delete all articles associated with the category
    $sql_article = "DELETE FROM article WHERE category_id='$id'";
    $deleteArticle = mysqli_query($conn, $sql_article);
    
    // Then, delete the category
    $sql_category = "DELETE FROM category WHERE id='$id'";
    $deletecat = mysqli_query($conn, $sql_category);
    
    session_start(); // Start the session before using $_SESSION variable

    if ($deletecat) {
        $_SESSION['status'] = "Category and associated articles Deleted Successfully";
        header("Location: categories.php");
        exit(); // Important to exit after a header location
    } else {
        echo "Error";
    }
}
?>