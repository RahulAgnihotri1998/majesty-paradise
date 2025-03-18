<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
session_start();
require_once "../../database.php";
if (isset($_POST['add_user'])) {
    $username = validateInput($_POST['username']);
    $designation = validateInput($_POST['designation']);
    $description = validateInput($_POST['description']);
    $role_as = validateInput($_POST['role_as']);
    $facebook_link = validateInput($_POST['facebook_link']);
    $instagram_link = validateInput($_POST['instagram_link']);
    $linkdin_link = validateInput($_POST['linkdin_link']);
    $target_dir = "../upload/userimg/";
    $target_file = $target_dir . basename($_FILES["userimage"]["name"]);
    if($_FILES["userimage"]["name"] != ''){
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $check = getimagesize($_FILES["userimage"]["tmp_name"]);
    if ($check !== false) {
        $_SESSION['status'] = "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        $_SESSION['status'] = "File is not an image.";
        $uploadOk = 0;
    }
    if (file_exists($target_file)) {
        $uploadOk = 0;
        $_SESSION['status'] = "Sorry, file already exists.";
        header('Location:../add-user.php');
        exit(0);
    }

    if ($_FILES["userimage"]["size"] > 5000000) {
        $_SESSION['status'] = "Sorry, your file is too large.";
        header('Location:../add-user.php');
        exit(0);
        $uploadOk = 0;
    }

    // Allow certain file formats
    if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"
    ) {
        $_SESSION['status'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        header('Location:../add-user.php');
        exit(0);
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        $_SESSION['status'] = "Sorry, your file was not uploaded.";
        header('Location:../add-user.php');
        exit(0);
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["userimage"]["tmp_name"], $target_file)) {
         $imagename =  htmlspecialchars(basename($_FILES["userimage"]["name"]));
        } else {
            $_SESSION['status'] = "Sorry, there was an error uploading your file.";
            header('Location:../add-user.php');
            exit(0);
        }
    }
}

 $sql = "INSERT INTO user (username, userimg,designation,description,role_as,facebook_link,instagram_link,linkdin_link)
     VALUES ('$username','$imagename', '$designation', '$description', '$role_as', '$facebook_link', '$instagram_link', '$linkdin_link')";
    $result = mysqli_query($conn, $sql);
  
    if ($result) {
        $_SESSION['status'] = "Added Succesfully";
        header('Location:../add-user.php');
        exit(0);
    } else {
        $_SESSION['status'] = "Some Error Occured";
        header('Location:../add-user.php');
        exit(0);
    }
}

if(isset($_POST['deleteuser'])){
    $userid = validateInput($_POST['userid']);
    $sql = "DELETE FROM user WHERE id = '$userid'";
    $result = mysqli_query($conn, $sql);
    if($result){
        $_SESSION['status'] = "Deleted Successfully";
        header('Location:../add-user.php');
        exit(0);
    }
    else{
        $_SESSION['status'] = "Some Error Occured";
        header('Location:../add-user.php');
        exit(0);
    }
}


if (isset($_POST['update_user'])) {
    $username = validateInput($_POST['username']);
    $designation = validateInput($_POST['designation']);
    $description = validateInput($_POST['description']);
    $role_as = validateInput($_POST['role_as']);
    $facebook_link = validateInput($_POST['facebook_link']);
    $instagram_link = validateInput($_POST['instagram_link']);
    $linkdin_link = validateInput($_POST['linkdin_link']);
    $userid = validateInput($_POST['userid']);
    $target_dir = "../upload/userimg/";
    $target_file = $target_dir . basename($_FILES["userimage"]["name"]);
    if($_FILES["userimage"]["name"] != ''){
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $check = getimagesize($_FILES["userimage"]["tmp_name"]);
    if ($check !== false) {
        $_SESSION['status'] = "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        $_SESSION['status'] = "File is not an image.";
        $uploadOk = 0;
    }
    if (file_exists($target_file)) {
        $uploadOk = 0;
        $_SESSION['status'] = "Sorry, file already exists.";
        header('Location:../add-user.php');
        exit(0);
    }

    if ($_FILES["userimage"]["size"] > 5000000) {
        $_SESSION['status'] = "Sorry, your file is too large.";
        header('Location:../add-user.php');
        exit(0);
        $uploadOk = 0;
    }

    // Allow certain file formats
    if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"
    ) {
        $_SESSION['status'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        header('Location:../add-user.php');
        exit(0);
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        $_SESSION['status'] = "Sorry, your file was not uploaded.";
        header('Location:../add-user.php');
        exit(0);
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["userimage"]["tmp_name"], $target_file)) {
         $imagename =  htmlspecialchars(basename($_FILES["userimage"]["name"]));
        } else {
            $_SESSION['status'] = "Sorry, there was an error uploading your file.";
            header('Location:../add-user.php');
            exit(0);
        }
    }
}
if($_FILES["userimage"]["name"] != ''){
 $sql = "UPDATE user SET username ='$username', userimg ='$imagename',designation = '$designation',description ='$description',role_as ='$role_as',facebook_link ='$facebook_link',instagram_link ='$instagram_link',linkdin_link = '$linkdin_link' WHERE id = '$userid'";
    $result = mysqli_query($conn, $sql);
}
else{
    $sql = "UPDATE user SET username ='$username',designation = '$designation',description ='$description',role_as ='$role_as',facebook_link ='$facebook_link',instagram_link ='$instagram_link',linkdin_link = '$linkdin_link' WHERE id = '$userid'";
    $result = mysqli_query($conn, $sql);
}
  
    if ($result) {
        $_SESSION['status'] = "Updated Succesfully";
        header('Location:../add-user.php');
        exit(0);
    } else {
        $_SESSION['status'] = "Some Error Occured";
        header('Location:../add-user.php');
        exit(0);
    }
}

function validateInput($input)
{
    global $conn;
    return mysqli_real_escape_string($conn, $input);
}

?>
