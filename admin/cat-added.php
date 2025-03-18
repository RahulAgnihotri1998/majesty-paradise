<?php
session_start();

require_once "../database.php";
$metadescription = '';
$catname = mysqli_real_escape_string($conn, $_POST['cat_name']);
$cat_url = mysqli_real_escape_string($conn, $_POST['cat_url']);
$metatitle = mysqli_real_escape_string($conn, $_POST['meta_title']);
$metadescription = mysqli_real_escape_string($conn, $_POST['meta_description']);

$sql_u = "SELECT * FROM category WHERE slug ='$cat_url'";
$sql_catname_check = "SELECT * FROM category WHERE cat_name = '$catname'";
$res_catname_check_query = mysqli_query($conn, $sql_catname_check);
$res_u = mysqli_query($conn, $sql_u);

if (mysqli_num_rows($res_u) > 0) {
    $cat_error = "URL already Exist";
    echo $cat_error;
} elseif (mysqli_num_rows($res_catname_check_query) > 0) {
    echo "Category Name Already Exists";
} else {
    $sql = "INSERT INTO category (cat_name, slug, meta_title, meta_description)
            VALUES ('$catname', '$cat_url', '$metatitle', '$metadescription')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "Category created Successfully";
    } else {
        echo "Some Unknown Error Occured While Category Creation";
    }
}
?>
