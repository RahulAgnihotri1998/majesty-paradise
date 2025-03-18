<?php require_once "../database.php";
session_start();

if (!isset($_SESSION['user_id']) ) {
    // If user is not logged in, redirect to login page
    header("Location: admin-login.php");
    exit();
}




if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["selected_images"]) && is_array($_POST["selected_images"])) {
        foreach ($_POST["selected_images"] as $imageId) {
            $imageId = mysqli_real_escape_string($conn, $imageId);

            // Get image information from database based on ID
            $imageQuery = "SELECT name FROM uploaded_images WHERE id = '$imageId'";
            $imageResult = mysqli_query($conn, $imageQuery);

            if ($imageResult && mysqli_num_rows($imageResult) > 0) {
                $imageRow = mysqli_fetch_assoc($imageResult);
                $imageName = $imageRow['name'];

                // Delete image file from path
                $uploadDir = "../assets/images/others/";
                $imagePath = $uploadDir . $imageName;
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }

                // Delete image record from database based on ID
                $deleteQuery = "DELETE FROM uploaded_images WHERE id = '$imageId'";
                mysqli_query($conn, $deleteQuery);
            }
        }
    }
}


$query = "SELECT * FROM uploaded_images"; // Assuming 'uploaded_images' is your table name
$result = mysqli_query($conn, $query);
$uploadDir = "../assets/images/others/";
?>

<!doctype html>
<html class="no-js" lang="en">


<!-- Mirrored from axilthemes.com/demo/template/keystroke/blog.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 30 Apr 2020 15:44:19 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Add Images To Show In Gallery</title>
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
   input[type="checkbox"], input[type="radio"] {
    opacity: 10;
    position: initial;
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
                Add Image For Gallery Page
                <p id="messages"></p>
            </div>
            <div class="card-body">
            
            <form id="deleteForm" method="POST" action="">
                        <div class="image-grid">
                            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                                <div class="image-box">
                                    <label>
                                        <input type="checkbox" name="selected_images[]" value="<?php echo $row['id']; ?>">
                                        <img src="<?php echo $uploadDir . $row['name']; ?>" alt="Image">
                                    </label>
                                </div>
                            <?php } ?>
                        </div>
                        <button type="button" class="btn btn-danger" id="deleteButton">Delete Selected</button>
                    </form>




        </div>
        <div class="card">
        <div class="card-header pb-0">

        </div>
        <form id="imageUploadForm" enctype="multipart/form-data" action="upload.php">
          <div class="card-body">
        
            <div class="row">
              <div class="col-md-12">
                        <div class="form-group">
  <p for="imageInput">Upload Images</p>
  <input class="form-control" type="file" name="images[]" id="imageInput" multiple accept="image/*">
  <small id="imageError" class="error-msg" style="color: red; display: none;">Please select at least one image.</small>
</div>
              </div>
            </div>
            <div class="row mt-2">
              <div class="col-md-12">
                <button type="submit" id="submitButton" class="btn btn-primary">Upload Images</button>
              </div>
            </div>
          </div>
        </form>

        <div id="imagePreview" class="mt-4">



        </div>

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

#sidebar {
    min-width: 250px;
    max-width: 250px;
    background: #702FFF;
    color: #fff;
    transition: all 0.3s;
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
<style>
    /* Add your styles here */
    .image-grid {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
    }
    .image-box {
        width: calc(25% - 10px);
        margin-bottom: 20px;
        padding: 10px;
        border: 1px solid #ccc;
        text-align: center;
    }
    .image-box img {
        max-width: 100%;
        max-height: 100px;
        margin-bottom: 10px;
    }
    .preview-image {
    max-width: 100px;
    max-height: 100px;
    margin: 5px;
  }
</style>

 
<script>
  document.addEventListener("DOMContentLoaded", function() {
    const imageInput = document.getElementById("imageInput");
    const imagePreview = document.getElementById("imagePreview");

    imageInput.addEventListener("change", function() {
      imagePreview.innerHTML = ""; // Clear existing preview

      const files = imageInput.files;
      for (let i = 0; i < files.length; i++) {
        const img = document.createElement("img");
        img.src = URL.createObjectURL(files[i]);
        img.className = "preview-image";
        imagePreview.appendChild(img);
      }
    });
  });


  
</script>
<script>



// Function to create checkbox
function createCheckbox(imagePath) {
    const checkbox = document.createElement("input");
    checkbox.type = "checkbox";
    checkbox.className = "image-checkbox"; // Add a class for selecting images
    checkbox.value = imagePath;
    checkbox.addEventListener("change", toggleDeleteButton); // Update delete button on checkbox change
    return checkbox;
}


document.addEventListener("DOMContentLoaded", function() {
  const imageUploadForm = document.getElementById("imageUploadForm");
  const uploadButton = imageUploadForm.querySelector('button[type="submit"]');

  imageUploadForm.addEventListener("submit", function(event) {
    event.preventDefault(); // Prevent form submission from reloading the page


      // Check if at least one image is selected
      if (imageInput.files.length === 0) {
      imageError.style.display = "block"; // Show the error message
      return; // Prevent further processing
    } else {
      imageError.style.display = "none"; // Hide the error message
    }
    // Change button text to "Submitting" and disable the button
    uploadButton.textContent = "Submitting...";
    uploadButton.disabled = true; // Prevent form submission from reloading the page

 

    const formData = new FormData(imageUploadForm);
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "upload.php", true);
    xhr.onreadystatechange = function() {
      if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status === 200) {
          // Handle successful upload
          const response = JSON.parse(xhr.responseText);
          if (response.success) {
            // Change button text to "Image Upload Successful"
            uploadButton.textContent = "Image Upload Successful";
            setTimeout(function() {
                    location.reload();
                }, 500);
          } else {
            // Handle error cases
            if (response.message) {
              // Display error message from the response
              console.error("Image upload failed:", response.message);
              uploadButton.textContent = response.message; // Set the button text to the error message
            } else {
              console.error("Image upload failed.");
              uploadButton.textContent = "Upload Image"; // Reset button text
            }
            // Enable the button
            uploadButton.disabled = false;
          }
        } else {
          // Handle request error
          console.error("Request error:", xhr.statusText);
          // Change button text back to "Upload Image" and enable the button
          uploadButton.textContent = "Upload Image";
          uploadButton.disabled = false;
        }
      }
    };
    xhr.send(formData);
  });


});


 

  // Function to delete an image

</script>


<script>
    document.addEventListener("DOMContentLoaded", function() {
        const deleteButton = document.getElementById("deleteButton");
        const deleteForm = document.getElementById("deleteForm");

        deleteButton.addEventListener("click", function() {
            const selectedImages = deleteForm.querySelectorAll("input[name='selected_images[]']:checked");
            if (selectedImages.length > 0) {
                const confirmDelete = confirm("Are you sure you want to delete the selected images?");
                if (confirmDelete) {
                    deleteForm.submit();
                }
            } else {
                alert("Please select images to delete.");
            }
        });
    });
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