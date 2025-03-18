<?php
 session_start();
require_once "../database.php";
if(isset($_POST['add-post'])){

    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $article = mysqli_real_escape_string($conn, $_POST['article']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $slug = mysqli_real_escape_string($conn, $_POST['slug']);
    $meta_title = mysqli_real_escape_string($conn, $_POST['meta_title']);
    $alt_text = mysqli_real_escape_string($conn, $_POST['alt_text']);
    $filename = $_FILES["image"]["name"];
    $tempname = $_FILES["image"]["tmp_name"];    
    $folder = "../assets/images/blog/".$filename;

    
    // Extract file extension
    $file_extension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
    
    // Check if the file extension is one of the allowed types
    $allowed_extensions = array("jpeg", "jpg", "png", "webp");
    if (in_array($file_extension, $allowed_extensions)) {
        if (move_uploaded_file($tempname, $folder)) {
            $msg = "Image uploaded successfully";
        } else {
            $msg = "Failed to upload image";
        }
    } else {
        $msg = "Invalid file format. Can be updated in JPEG, JPG, PNG, WebP format only.";
    }
  // $tags_array = array();
  // $tags = $_POST['tags'];
  // if(!empty($_POST['tags'])){
  //   foreach ($_POST['tags'] as $tags) {
  //     $tags_array[] = $tags;
  // }

  // }

 $check_existing_article = "SELECT * FROM article WHERE slug = '$slug'";
  $check_article = mysqli_query($conn, $check_existing_article);
  if(mysqli_num_rows($check_article) > 0){
    // print_r($check_article);
    // echo "bfdbfd";
    $_SESSION['status'] = "Url already exist";
    header('Location: add-single-blog-post.php');
  }
  else{

    $meta_desc = mysqli_real_escape_string($conn, $_POST['meta_desc']);
    $query = "INSERT INTO article(title, article, category, slug, meta_title, meta_desc, featuredimage, alt_text) VALUES ('$title', '$article', '$category', '$slug', '$meta_title', '$meta_desc', '$filename', '$alt_text')";
    $status = mysqli_query($conn, $query);
    // print_r($status);
    if($status){
      $last_id = mysqli_insert_id($conn);
     
     
     $_SESSION['status'] = "Added Successfully";
    header('Location: add-single-blog-post.php');
    }
  }


}


if(isset($_POST['update-post'])){
  $id = mysqli_real_escape_string($conn, $_POST['postid']);
  $title = mysqli_real_escape_string($conn, $_POST['title']);
  $article = mysqli_real_escape_string($conn, $_POST['article']);
  $category = mysqli_real_escape_string($conn, $_POST['category']);
  $alt_text = mysqli_real_escape_string($conn, $_POST['alt_text']); // Retrieve alt text from form
  $tags_array = array();
  $tags = $_POST['tags'];
  if(!empty($_POST['tags'])){
    foreach ($_POST['tags'] as $tags) {
      $tags_array[] = $tags;
  }

  }
 
  $slug = mysqli_real_escape_string($conn, $_POST['slug']);
    $meta_title = mysqli_real_escape_string($conn, $_POST['meta_title']);
  $filename = $_FILES["image"]["name"];
  $tempname = $_FILES["image"]["tmp_name"];    
  $folder = "../assets/images/blog/".$filename;
  if (move_uploaded_file($tempname, $folder))  {
    $msg = "Image uploaded successfully";
}else{
    $msg = "Failed to upload image";
}
$check_existing_article = "SELECT * FROM article WHERE slug = '$slug' AND id != '$id'";
$check_article = mysqli_query($conn, $check_existing_article);
if(mysqli_num_rows($check_article) > 0){
  // print_r($check_article);
  // echo "bfdbfd";
  $_SESSION['status'] = "Url already exist";
  header('Location: all-blog-post.php');
}
else{
  $meta_desc = mysqli_real_escape_string($conn, $_POST['meta_desc']);
  $query = "UPDATE article SET title ='$title',article ='$article',category ='$category',slug = '$slug',meta_title ='$meta_title',meta_desc = '$meta_desc'";
   if(!empty($filename)){
   $query .= ",featuredimage = '$filename'";
   }
   $query .= ", alt_text = '$alt_text'"; // Include alt text in the query
  $query .= " WHERE id ='$id'";
  $status=mysqli_query($conn,$query);
  if($status){
    $arrlength = count($tags_array);
    $sql_delete_tag = "DELETE FROM product_tags WHERE post_id = '$id'";
    $delete_tags=mysqli_query($conn,$sql_delete_tag);
    for ($x = 0; $x < $arrlength; $x++) {
     
        $sql_tags = "INSERT INTO product_tags (post_id, tag_id) VALUES ('$id' , '$tags_array[$x]')";
        $inserttags=mysqli_query($conn,$sql_tags);
    }
  $_SESSION['status'] = "Updated Successfully";
  header('Location: all-blog-post.php');
  }
  else{
    $_SESSION['status'] = "Some Error occured";
    header('Location: all-blog-post.php');
  }
}

}

if(isset($_POST['add-tag'])){
  $tag_name = mysqli_real_escape_string($conn, $_POST['tag_name']);
  $slug = mysqli_real_escape_string($conn, $_POST['slug']);
  $check_existing_tags = "SELECT * FROM tags WHERE url = '$slug'";
  $check_tags = mysqli_query($conn, $check_existing_tags);
  if(mysqli_num_rows($check_tags) > 0){
    // print_r($check_article);
    // echo "bfdbfd";
    $_SESSION['status'] = "Tag already exist";
    header('Location: tags.php');
  }
  else{
 $query = "INSERT INTO tags (name, url) VALUES ('$tag_name' , '$slug')";
  $status = mysqli_query($conn,$query);
  if($status){
    $_SESSION['status'] = "Added Successfully";
    header('Location: tags.php');
  }
  else{
    $_SESSION['status'] = "Some Error Occured";
    header('Location: tags.php');
  }
}
}

if(isset($_POST['update-tag'])){
  $id = mysqli_real_escape_string($conn,$_POST['tagid']);
  $tag_name = mysqli_real_escape_string($conn, $_POST['tag_name']);
  $slug = mysqli_real_escape_string($conn, $_POST['slug']);
 $query = "UPDATE tags SET name='$tag_name', url = '$slug' WHERE id = '$id'";
  $status = mysqli_query($conn,$query);
  if($status){
    $_SESSION['status'] = "Updated Successfully";
    header('Location: tags.php');
  }
  else{
    $_SESSION['status'] = "Some Error Occured";
    header('Location: tags.php');
  }
}


if(isset($_POST['deletetag'])){
  $id = mysqli_real_escape_string($conn,$_POST['delete_id']);

 $query = "DELETE FROM tags WHERE id = '$id'";
  $status = mysqli_query($conn,$query);
  if($status){
    $_SESSION['status'] = "Deleted Successfully";
    header('Location: tags.php');
  }
  else{
    $_SESSION['status'] = "Some Error Occured";
    header('Location: tags.php');
  }
}

if(isset($_POST['deletecomment'])){
  $id = mysqli_real_escape_string($conn,$_POST['delete_id']);
  $query = "DELETE FROM comments WHERE id = '$id'";
  $status = mysqli_query($conn,$query);
  if($status){
    $_SESSION['status'] = "Deleted Successfully";
    header('Location: comments.php');
  }
  else{
    $_SESSION['status'] = "Some Error Occured";
    header('Location: comments.php');
  }
}
?>