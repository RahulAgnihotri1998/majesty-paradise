<?php require_once "../database.php";
session_start();

if (!isset($_SESSION['user_id']) ) {
    // If user is not logged in, redirect to login page
    header("Location: admin-login.php");
    exit();
}

?>
<!doctype html>
<html class="no-js" lang="en">


<!-- Mirrored from axilthemes.com/demo/template/keystroke/blog.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 30 Apr 2020 15:44:19 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
      <title>Admin Dashboard ||InteriorDesignerKanpur</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="../assets/images/favicon.png">
    <!-- CSS
	============================================ -->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/css/vendor/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/plugins/slick.css">
    <link rel="stylesheet" href="../assets/css/plugins/font-awesome.css">
    <link rel="stylesheet" href="../assets/css/plugins/plugins.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<style>
   #messages{
     color:red;
   }
   .validation-error{
    color:red;
   }
</style>

<body>
<div class="main-content">
<div class="wrapper">
        <!-- Sidebar  -->
        <?php include "sidebar.php"?>

        <!-- Page Content  -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-left"></i>
                        <span></span>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="#">Comments</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Page</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Page</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Page</a>
                            </li>
                        </ul> -->
                    </div>
                </div>
            </nav>
            <div class="card">
            <div class="card-header">
                Create Category
                <p id="messages"></p>
            </div>
            <div class="card-body">
            
            <form id="create-category">
            <div class="form-group">
        <p>Category Name</p>
        <input type="text"  class="form-control" name="cat_name" id="catName" aria-describedby="catNameError">
        <div id="catNameError" class="validation-error"></div>
    </div>
    <div class="form-group">
        <p>Category URL</p>
        <input type="text"  name="cat_url" class="form-control" id="caturl" aria-describedby="catUrlError">
        <div id="catUrlError" class="validation-error"></div>
    </div>
    <div class="form-group">
        <p>Meta Title</p>
        <input type="text" class="form-control" name="meta_title" id="metaTitle">
        <div id="metaTitleError" class="validation-error"></div>
    </div>
    <div class="form-group">
        <p>Meta Description</p>
        <textarea class="form-control" name="meta_description" id="metaDescription" rows="3"></textarea>
        <div id="metaDescriptionError" class="validation-error"></div>
    </div>
    <button type="submit" name="create-cat" class="btn btn-success">Create Category</button>
</form>




        </div>
    </div>
          
        </div>
        
    </div>
    
    </div>


    <style>



a,
a:hover,
a:focus {
    color: inherit;
    text-decoration: none;
    transition: all 0.3s;
}

.navbar {
    padding: 15px 10px;
    background: #fff;
    border: none;
    border-radius: 0;
    margin-bottom: 40px;
    box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1);
}

.navbar-btn {
    box-shadow: none;
    outline: none !important;
    border: none;
}

.line {
    width: 100%;
    height: 1px;
    border-bottom: 1px dashed #ddd;
    margin: 40px 0;
}

/* ---------------------------------------------------
    SIDEBAR STYLE
----------------------------------------------------- */

.wrapper {
    display: flex;
    width: 100%;
    align-items: stretch;
}



#sidebar.active {
    margin-left: -250px;
}

#sidebar .sidebar-header {
    padding: 20px;
    background: #ffffff;
}

#sidebar ul.components {
    padding: 20px 0;
    border-bottom: 1px solid #47748b;
}

#sidebar ul p {
    color: #fff;
    padding: 10px;
}

#sidebar ul li a {
    padding: 10px;
    font-size: 1.1em;
    display: block;
}

#sidebar ul li a:hover {
    color: #7386D5;
    background: #fff;
}

#sidebar ul li.active>a,
a[aria-expanded="true"] {
    color: #fff;
    background: #6d7fcc;
}

a[data-toggle="collapse"] {
    position: relative;
}

.dropdown-toggle::after {
    display: block;
    position: absolute;
    top: 50%;
    right: 20px;
    transform: translateY(-50%);
}

ul ul a {
    font-size: 0.9em !important;
    padding-left: 30px !important;
    background: #6d7fcc;
}

ul.CTAs {
    padding: 20px;
}

ul.CTAs a {
    text-align: center;
    font-size: 0.9em !important;
    display: block;
    border-radius: 5px;
    margin-bottom: 5px;
}

a.download {
    background: #fff;
    color: #7386D5;
}

a.article,
a.article:hover {
    background: #6d7fcc !important;
    color: #fff !important;
}

/* ---------------------------------------------------
    CONTENT STYLE
----------------------------------------------------- */

#content {
    width: 100%;
    padding: 20px;
    min-height: 100vh;
    transition: all 0.3s;
}

/* ---------------------------------------------------
    MEDIAQUERIES
----------------------------------------------------- */

@media (max-width: 768px) {
    #sidebar {
        margin-left: -250px;
    }
    #sidebar.active {
        margin-left: 0;
    }
    #sidebarCollapse span {
        display: none;
    }
}
    </style>


    <script>
    $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
   
                $("#create-category").submit(function(e) {
                    e.preventDefault();


        // Reset error messages
        $(".validation-error").text("");

// Get input values
var categoryName = $("#catName").val().trim();
var catUrl = $("#caturl").val();
var metaTitle = $("#metaTitle").val();
var metaDescription = $("#metaDescription").val();  // Assuming you have a field named metaDescription

// Perform validation and display error messages
if (categoryName === "" || categoryName.length > 150) {
    $("#catNameError").text("Category name is required and should be less than 150 characters.");
}

if (catUrl === ""|| catUrl.length > 150) {
    $("#catUrlError").text("Category URL is required and should be less than 150 characters.");
} else if (!/^[a-z0-9\-]+$/.test(catUrl) || /-{2,}/.test(catUrl)) {
    $("#catUrlError").text("Invalid characters in URL. Only lowercase letters, numbers, and single hyphens are allowed.");
}

if (metaTitle === "" || metaTitle.length > 150) {
    $("#metaTitleError").text("Meta title is required and should be less than 150 characters.");
}

if (metaDescription.length > 300) {
    $("#metaDescriptionError").text("Meta description should be less than 300 characters.");
}

// If there are validation errors, return
if ($(".validation-error").text() !== "") {
    return;
}

// Continue with AJAX call (as you already have)








                    $.ajax( {
                     
                        url: "cat-added.php",
                        method: "post",
                        cache:false,
                        contentType:false,
                        processData:false,
                        data: new FormData(this),
                       
                  
                        success: function(strMessage) {
                        //    console.log(strMessage);
                            if(strMessage == 'Category created Successfully'){
                                $('#messages').text(strMessage);
                                $('#create-category').trigger("reset");
                            }
                            else{
                                 $('#messages').text(strMessage); 
                            }
                        }
                    });
                });
            });
   
    </script>
 <script>
 function changeUrlAndMetaTitle() {
    var categoryName = document.getElementById("catName").value.trim();
    var catUrlInput = document.getElementById("caturl");
    var metaTitleInput = document.getElementById("metaTitle");

    // Remove special characters and convert spaces to hyphens
    var url = categoryName.replace(/[^a-zA-Z0-9\s]/g, "").replace(/\s+/g, "-").toLowerCase();
    catUrlInput.value = url;

    // Set meta title same as the category name
    metaTitleInput.value = categoryName;
}

// Attach the function to the category name input field's input event
document.getElementById("catName").addEventListener("input", changeUrlAndMetaTitle);




</script>




    <!-- JS
============================================ -->

    <!-- Modernizer JS -->
    <script src="../assets/js/vendor/modernizr.min.js"></script>
    <!-- jQuery JS -->
    <script src="../assets/js/vendor/jquery.js"></script>
    <!-- Bootstrap JS -->
    <script src="../assets/js/vendor/bootstrap.min.js"></script>
    <script src="../assets/js/waypoints.min.js"></script>
    <script src="../assets/js/wow.js"></script>
    <script src="../assets/js/counterup.js"></script>
    <script src="../assets/js/imagesloaded.js"></script>
    <script src="../assets/js/isotope.js"></script>
    <script src="../assets/js/tilt.js"></script>
    <script src="../assets/js/anime.js"></script>
    <script src="../assets/js/tweenmax.js"></script>
    <script src="../assets/js/slipting.js"></script>
    <script src="../assets/js/scrollmagic.js"></script>
    <script src="../assets/js/addindicators.js"></script>
    <script src="../assets/js/slick.js"></script>
    <script src="../assets/js/youtube.js"></script>
    <script src="../assets/js/countdown.js"></script>
    <script src="../assets/js/scrollup.js"></script>
    <script src="../assets/js/stickysidebar.js"></script>
    <script src="../assets/js/contactform.js"></script>
    <!-- Plugins JS -->
    <script src="../assets/js/plugins/plugins.min.js"></script>
    <!-- Main JS -->
    <script src="../assets/js/main.js"></script>

</body>


<!-- Mirrored from axilthemes.com/demo/template/keystroke/blog.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 30 Apr 2020 15:44:26 GMT -->
</html>