<?php require_once "../database.php";
session_start();

if (!isset($_SESSION['user_id']) ) {
    // If user is not logged in, redirect to login page
    header("Location: login.php");
    exit();
}

?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Add New Post </title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
       <link rel="icon" type="image/x-icon" href="img/fav.png">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css" rel="stylesheet" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>

    <script src="https://cdn.ckeditor.com/4.7.3/full/ckeditor.js"></script>
    <script src=
"https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.js">
    </script>

</head>

<body>

<style>
    .validation-error{
        color: red;
    }
</style>
    <div class="main-content">
        <div class="wrapper">
            <!-- Sidebar  -->
            <?php include "sidebar.php" ?>

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

                        </div>
                    </div>
                </nav>
                <div class="card">
                    <div class="card-header">
                        Add Blog Post
                        <?php
                        if (isset($_SESSION['status'])) {
                        ?>
                            <div class="alert alert-success">
                                <?php echo $_SESSION['status']; ?>
                            </div>
                        <?php
                        }

                        unset($_SESSION['status']);

                        ?>
                    </div>
                    <div class="card-body">

                        <form id="create-category" action="admin_action.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
        <label for="title">Title</label>
        <input type="text"  class="form-control" id="title" name="title">
        <div class="validation-error" id="titleError"></div>
    </div>
    <div class="form-group">
        <label for="posturl">URL</label>
        <input type="text" id="posturl"  class="form-control" name="slug">
        <div class="validation-error" id="urlError"></div>
    </div>
    <div class="form-group">
        <?php
        $query = "SELECT * FROM category";
        $result = mysqli_query($conn, $query);
        ?>
        <select class="form-control" name="category" id="categorySelect" >
            <option value="">--Select Category--</option>
            <?php
            foreach ($result as $row) {
            ?>
                <option value="<?php echo $row['id'] ?>"><?php echo $row['cat_name'] ?></option>
            <?php
            }
            ?>
        </select>
        <div class="validation-error" id="categoryError"></div>
    </div>
    <div class="form-group">
    <label for="summernote">Post</label>
    <textarea required name="article" id="summernote"> </textarea>
    <div class="validation-error" id="bodyError"></div>
</div>
<div class="form-group">
    <!-- <label for="exampleInputPassword1">Featured Image</label> -->
    <input type="file" name="image" id="yourImageInputId" placeholder="Choose Featured image">
    <div class="validation-error" id="imageError"></div>
</div>
<div class="form-group">
    <!-- <label for="exampleInputPassword1">Featured Image</label> -->
   
    <input type="text" class="form-control" name="alt_text" id="altTextInputId" placeholder="Enter Alt Text" aria-label="Enter Alt Text">
    <div class="validation-error" id="imageError"></div>
</div>


<div class="form-group">
    <label class="form-check-label" for="metaTitle">Meta Title</label>
    <input type="text" class="form-control"  id="metaTitle" name="meta_title" maxlength="150">
    <div class="validation-error" id="metaTitleError"></div>
</div>

<div class="form-group">
    <label class="form-check-label" for="exampleCheck1">Meta Description</label>
    <textarea class="form-control" name="meta_desc" ></textarea>
    <div class="validation-error" id="metaDescriptionError"></div>
</div>
                         
                            
                            <button type="submit" name="add-post" class="btn btn-success">Create Post</button>
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
        $(document).ready(function() {
            $('#sidebarCollapse').on('click', function() {
                $('#sidebar').toggleClass('active');
            });

            // $("#create-category").submit(function(e) {
            //     e.preventDefault();
            //     $.ajax( {
            //         <!--insert.php calls the PHP file-->
            //         url: "admin_action.php",
            //         method: "post",
            //         cache:false,
            //         contentType:false,
            //         processData:false,
            //         data: new FormData(this),
            //         dataType: "text",

            //         success: function(strMessage) {
            //             location.reload();
            //             $("#create-category").reset();


            //         }
            //     });
            // });



        });

  
        CKEDITOR.replace('summernote', {

            height: 300,

            filebrowserUploadUrl: "textedit.php"
        });
        $('.ui.fluid.dropdown')
            .dropdown({
                maxSelections: 3
            });
    </script>
<script>
// Function to transform input values
function transformInputValue(inputValue) {
    var url = inputValue
        .replace(/[^a-zA-Z0-9\s]/g, "")
        .replace(/\s+/g, " ")
        .replace(/^\s+|\s+$/g, "")
        .replace(/\s+/g, "-")
        .replace(/-+/g, "-")
        .trim()
        .toLowerCase(); // Convert to lowercase
    return url;
}

function updateFields() {
    var titleInput = document.getElementById("title").value;
    var urlInput = document.getElementById("posturl");
    var metaTitleInput = document.getElementById("metaTitle");

    var url = transformInputValue(titleInput);
    urlInput.value = url;
    metaTitleInput.value = titleInput;
}

// Attach the function to the title input field's input event
document.getElementById("title").addEventListener("input", updateFields);

document.getElementById("create-category").addEventListener("submit", function(e) {
    var title = document.getElementById("title").value.trim();
    var url = document.getElementById("posturl").value.trim();
    var category = document.getElementById("categorySelect").value;
    var bodyContent = CKEDITOR.instances['summernote'].getData();
var body = bodyContent.trim(); // Using Summernote's method
    var image = document.querySelector("input[name='image']").files[0];
    var metaTitle = document.getElementById("metaTitle").value.trim();
    var metaDescription = document.querySelector("textarea[name='meta_desc']").value.trim();
    var imageInput = document.getElementById("yourImageInputId"); // Replace 'yourImageInputId' with the actual ID of your image input field

    // Reset error messages for meta title and description
    document.getElementById("metaTitleError").textContent = "";
    document.getElementById("metaDescriptionError").textContent = "";
    // Reset error messages
    document.getElementById("titleError").textContent = "";
    document.getElementById("urlError").textContent = "";
    document.getElementById("categoryError").textContent = "";
    // We'll need an error container for the body and image
    // Assuming they are placed similarly to the other error containers in your HTML
    document.getElementById("bodyError").textContent = "";
    document.getElementById("imageError").textContent = "";
    

    var hasValidationErrors = false;


    if (metaTitle === "" || metaTitle.length > 150) {
        document.getElementById("metaTitleError").textContent = "Meta title is required and should not exceed 150 characters.";
        hasValidationErrors = true;
    }

    if (metaDescription.length > 300) {
        document.getElementById("metaDescriptionError").textContent = "Meta description should not exceed 300 characters.";
        hasValidationErrors = true;
    }

    if (category === "") {
        document.getElementById("categoryError").textContent = "Category is required.";
        hasValidationErrors = true;
    }
    if (title === "") {
        document.getElementById("titleError").textContent = "Title is required.";
        hasValidationErrors = true;
    }
    if (!/^[a-zA-Z0-9\-]+$/.test(url)) {
        document.getElementById("urlError").textContent = "Invalid characters in URL.";
        hasValidationErrors = true;
    }
    if (body === "" || body === "<p><br></p>") {
    document.getElementById("bodyError").textContent = "Post body cannot be empty.";
    hasValidationErrors = true;
}
if (!imageInput.files.length) {
    document.getElementById("imageError").textContent = "Image is required.";
    hasValidationErrors = true;
} else {
    var fileName = imageInput.files[0].name;
    var validExtensions = ["jpeg", "jpg", "png", "webp"];
    var fileExtension = fileName.split('.').pop().toLowerCase();
    
    if (!validExtensions.includes(fileExtension)) {
        document.getElementById("imageError").textContent = "Invalid file format. Can be updated in JPEG, JPG, PNG, WebP format only.";
        hasValidationErrors = true;
    }
}

    if (hasValidationErrors) {
        e.preventDefault(); // Prevent form submission
    }
});

</script>

    <script src="summernote-image-attributes-master/summernote-image-attributes.js"></script>
    <script src="summernote-image-attributes-master/lang/es-ES.js"></script>


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
    <!-- <script src="../assets/js/contactform.js"></script> -->
    <!-- Plugins JS -->
    <script src="../assets/js/plugins/plugins.min.js"></script>
    <!-- Main JS -->
    <script src="../assets/js/main.js"></script>

</body>


<!-- Mirrored from axilthemes.com/demo/template/keystroke/blog.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 30 Apr 2020 15:44:26 GMT -->

</html>