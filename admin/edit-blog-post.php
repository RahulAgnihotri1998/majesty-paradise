<?php
session_start();

// Check if session variables exist
if (isset($_SESSION['user_id']) && isset($_SESSION['email'])) {
    // Session variables exist, user is logged in
    $user_id = $_SESSION['user_id'];
    $email = $_SESSION['email'];

    // You can use $user_id and $email in your code as needed
} else {
    // Session variables don't exist, user is not logged in
    // Redirect to login page or handle accordingly
    header("Location: login.php");
    exit; // Ensure script execution stops after redirection
}

include('inc/header.php') ?>




<div class="container-scroller">

    <?php include('inc/nav.php') ?>
    <!-- partial -->

    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_settings-panel.html -->
        <div class="theme-setting-wrapper">
            <div id="settings-trigger"><i class="ti-settings"></i></div>
            <div id="theme-settings" class="settings-panel">
                <i class="settings-close ti-close"></i>
                <p class="settings-heading">SIDEBAR SKINS</p>
                <div class="sidebar-bg-options selected" id="sidebar-light-theme">
                    <div class="img-ss rounded-circle bg-light border mr-3"></div>Light
                </div>
                <div class="sidebar-bg-options" id="sidebar-dark-theme">
                    <div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark
                </div>
                <p class="settings-heading mt-2">HEADER SKINS</p>
                <div class="color-tiles mx-0 px-4">
                    <div class="tiles success"></div>
                    <div class="tiles warning"></div>
                    <div class="tiles danger"></div>
                    <div class="tiles info"></div>
                    <div class="tiles dark"></div>
                    <div class="tiles default"></div>
                </div>
            </div>
        </div>
        <div id="right-sidebar" class="settings-panel">
            <i class="settings-close ti-close"></i>
            <ul class="nav nav-tabs border-top" id="setting-panel" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="todo-tab" data-toggle="tab" href="#todo-section" role="tab" aria-controls="todo-section" aria-expanded="true">TO DO LIST</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="chats-tab" data-toggle="tab" href="#chats-section" role="tab" aria-controls="chats-section">CHATS</a>
                </li>
            </ul>
            <div class="tab-content" id="setting-content">
                <div class="tab-pane fade show active scroll-wrapper" id="todo-section" role="tabpanel" aria-labelledby="todo-section">
                    <div class="add-items d-flex px-3 mb-0">
                        <form class="form w-100">
                            <div class="form-group d-flex">
                                <input type="text" class="form-control todo-list-input" placeholder="Add To-do">
                                <button type="submit" class="add btn btn-primary todo-list-add-btn" id="add-task">Add</button>
                            </div>
                        </form>
                    </div>
                    <div class="list-wrapper px-3">
                        <ul class="d-flex flex-column-reverse todo-list">
                            <li>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="checkbox" type="checkbox">
                                        Team review meeting at 3.00 PM
                                    </label>
                                </div>
                                <i class="remove ti-close"></i>
                            </li>
                            <li>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="checkbox" type="checkbox">
                                        Prepare for presentation
                                    </label>
                                </div>
                                <i class="remove ti-close"></i>
                            </li>
                            <li>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="checkbox" type="checkbox">
                                        Resolve all the low priority tickets due today
                                    </label>
                                </div>
                                <i class="remove ti-close"></i>
                            </li>
                            <li class="completed">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="checkbox" type="checkbox" checked>
                                        Schedule meeting for next week
                                    </label>
                                </div>
                                <i class="remove ti-close"></i>
                            </li>
                            <li class="completed">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="checkbox" type="checkbox" checked>
                                        Project review
                                    </label>
                                </div>
                                <i class="remove ti-close"></i>
                            </li>
                        </ul>
                    </div>
                    <h4 class="px-3 text-muted mt-5 font-weight-light mb-0">Events</h4>
                    <div class="events pt-4 px-3">
                        <div class="wrapper d-flex mb-2">
                            <i class="ti-control-record text-primary mr-2"></i>
                            <span>Feb 11 2018</span>
                        </div>
                        <p class="mb-0 font-weight-thin text-gray">Creating component page build a js</p>
                        <p class="text-gray mb-0">The total number of sessions</p>
                    </div>
                    <div class="events pt-4 px-3">
                        <div class="wrapper d-flex mb-2">
                            <i class="ti-control-record text-primary mr-2"></i>
                            <span>Feb 7 2018</span>
                        </div>
                        <p class="mb-0 font-weight-thin text-gray">Meeting with Alisa</p>
                        <p class="text-gray mb-0 ">Call Sarah Graves</p>
                    </div>
                </div>
                <!-- To do section tab ends -->
                <div class="tab-pane fade" id="chats-section" role="tabpanel" aria-labelledby="chats-section">
                    <div class="d-flex align-items-center justify-content-between border-bottom">
                        <p class="settings-heading border-top-0 mb-3 pl-3 pt-0 border-bottom-0 pb-0">Friends</p>
                        <small class="settings-heading border-top-0 mb-3 pt-0 border-bottom-0 pb-0 pr-3 font-weight-normal">See All</small>
                    </div>
                    <ul class="chat-list">
                        <li class="list active">
                            <div class="profile"><img src="images/faces/face1.jpg" alt="image"><span class="online"></span></div>
                            <div class="info">
                                <p>Thomas Douglas</p>
                                <p>Available</p>
                            </div>
                            <small class="text-muted my-auto">19 min</small>
                        </li>
                        <li class="list">
                            <div class="profile"><img src="images/faces/face2.jpg" alt="image"><span class="offline"></span></div>
                            <div class="info">
                                <div class="wrapper d-flex">
                                    <p>Catherine</p>
                                </div>
                                <p>Away</p>
                            </div>
                            <div class="badge badge-success badge-pill my-auto mx-2">4</div>
                            <small class="text-muted my-auto">23 min</small>
                        </li>
                        <li class="list">
                            <div class="profile"><img src="images/faces/face3.jpg" alt="image"><span class="online"></span></div>
                            <div class="info">
                                <p>Daniel Russell</p>
                                <p>Available</p>
                            </div>
                            <small class="text-muted my-auto">14 min</small>
                        </li>
                        <li class="list">
                            <div class="profile"><img src="images/faces/face4.jpg" alt="image"><span class="offline"></span></div>
                            <div class="info">
                                <p>James Richardson</p>
                                <p>Away</p>
                            </div>
                            <small class="text-muted my-auto">2 min</small>
                        </li>
                        <li class="list">
                            <div class="profile"><img src="images/faces/face5.jpg" alt="image"><span class="online"></span></div>
                            <div class="info">
                                <p>Madeline Kennedy</p>
                                <p>Available</p>
                            </div>
                            <small class="text-muted my-auto">5 min</small>
                        </li>
                        <li class="list">
                            <div class="profile"><img src="images/faces/face6.jpg" alt="image"><span class="online"></span></div>
                            <div class="info">
                                <p>Sarah Graves</p>
                                <p>Available</p>
                            </div>
                            <small class="text-muted my-auto">47 min</small>
                        </li>
                    </ul>
                </div>
                <!-- chat tab ends -->
            </div>
        </div>
        <!-- partial -->
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">
                        <i class="icon-grid menu-icon"></i>
                        <span class="menu-title">Dashboard</span>
                    </a>
                </li>

                <!-- <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#ui-basics" aria-expanded="false" aria-controls="ui-basic">
                        <i class="icon-layout menu-icon"></i>
                        <span class="menu-title">Categories</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="ui-basics">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link" href="add-category.html">Add A Category</a></li>
                            <li class="nav-item"> <a class="nav-link" href="manage-categories.html">Manage Categories</a></li>

                        </ul>
                    </div>
                </li> -->

                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                        <i class="icon-layout menu-icon"></i>
                        <span class="menu-title">Brands</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="ui-basic">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link" href="add-brands.php">Add A Brand</a></li>
                            <li class="nav-item"> <a class="nav-link" href="manage-brands.php">Manage Brands</a></li>

                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
                        <i class="icon-columns menu-icon"></i>
                        <span class="menu-title">Products</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="form-elements">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"><a class="nav-link" href="add-products.php">Add A Product</a></li>
                            <li class="nav-item"><a class="nav-link" href="manage-products.php">Manage Products</a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
                        <i class="icon-bar-graph menu-icon"></i>
                        <span class="menu-title">Enqueries</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="charts">
                        <ul class="nav flex-column sub-menu">

                            <li class="nav-item"> <a class="nav-link" href="enqueries.php">Manage Enqueries</a></li>
                        </ul>
                    </div>
                </li>

            </ul>
        </nav>
        <style>
            #image-preview {
                position: relative;
            }

            .img-fluid {
                height: 100px;
                width: 100px;
            }

            .close-btn {
                position: absolute;
                top: 10px;
                right: 10px;
                font-size: 20px;
                font-weight: bold;
                color: #fff;
                background-color: #dc3545;
                border-radius: 50%;
                width: 24px;
                height: 24px;
                display: flex;
                justify-content: center;
                align-items: center;
                cursor: pointer;
            }

            .validation-error {
                color: red;
            }
        </style>
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="row">
                    <div class="col-md-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Add A Post</h4>
                                <p class="card-description">
                                    <!-- Basic form layout -->
                                </p>
                                <?php
                                  include('./codes/db.php');
                                if (isset($_POST['editpost'])) {
                                    $id =  $_POST['edit_id'];
                                    $query = "SELECT * FROM article WHERE id = '$id'";
                                    $result = $db->query( $query);
                                }
                                foreach ($result as $rows) {
                                ?>

                                    <form id="create-category" action="admin_action.php" method="POST" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="">Title</label>
                                            <input type="text" class="form-control" value="<?php echo $rows['title'] ?>" name="title" id="title" aria-describedby="emailHelp">
                                            <input type="text" hidden class="form-control" value="<?php echo $rows['id'] ?>" name="postid">
                                            <div class="validation-error" id="titleError"></div>
                                        </div>
                                        <div class="form-group">
                                            <label for="">URL</label>
                                            <input type="text" class="form-control" value="<?php echo $rows['slug'] ?>" name="slug" id="posturl" aria-describedby="emailHelp" title="URL ">

                                            <div class="validation-error" id="urlError"></div>

                                        </div>
                                        <div class="form-group">

                                        <?php
// Assuming $rows['category'] is already fetched from the previous query
$category_id = $rows['category'];
$query = "SELECT * FROM category";
$result = $db->query($query);

if ($result) {
    ?>
    <select class="form-control" name="category" id="" required>
        <option value="">--Select Category--</option>
        <?php
        while ($rowcat = $result->fetch_assoc()) {
            ?>
            <option value="<?php echo $rowcat['id'] ?>" <?php if ($rowcat['id'] == $category_id) {
                                                            echo "selected";
                                                        } ?>><?php echo $rowcat['cat_name'] ?></option>
            <?php
        }
        ?>
    </select>
    <?php
} else {
    echo "Error fetching categories: " . $db->error;
}
?>

                                            </select>
                                            <div class="validation-error" id="categoryError"></div>

                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Post</label>
                                            <textarea name="article" id="summernote"><?php echo $rows['article'] ?> </textarea>
                                            <div class="validation-error" id="postError"></div>

                                        </div>
                                        <div class="form-group">
                                            <!-- <label for="exampleInputPassword1">Featured Image</label> -->
                                            <input type="file" name="image" id="yourImageInputId" placeholder="Choose Featured image">
                                            <div class="card img-box">
                                                <img style="width:70px; height:70px;" src="../assets/images/blog/<?php echo $rows['featuredimage'] ?>" alt="">
                                            </div>
                                            <div class="validation-error" id="imageError"></div>
                                        </div>

                                        <div class="form-group">
                                            <label for="altTextInputId">Alt Text</label>
                                            <input type="text" class="form-control" name="alt_text" id="altTextInputId" value="<?php echo $rows['alt_text'] ?>" placeholder="Enter Alt Text">
                                            <!-- Replace $rows['alt_text'] with the appropriate PHP variable to display the current alt text value -->
                                            <!-- If alt text is not available, leave the value attribute empty -->
                                        </div>

                                        <div class="form-group">
                                            <label class="form-check-label" for="metaTitle">Meta Title</label>
                                            <input type="text" class="form-control" value="<?php echo $rows['meta_title'] ?>" id="metaTitle" name="meta_title">
                                            <div class="validation-error" id="metaTitleError"></div>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-check-label" for="metaDescription">Meta Description</label>
                                            <textarea class="form-control" name="meta_desc"><?php echo $rows['meta_desc'] ?>

</textarea>
                                            <div class="validation-error" id="metaDescError"></div>
                                        </div>


                                        <button type="submit" name="update-post" class="btn btn-success">Update Post</button>
                                    </form>
                                <?php
                                }
                                ?>

                            </div>
                        </div>
                    </div>




                </div>
            </div>


            <?php include('inc/footer.php') ?>

            <script>



document.getElementById("create-category").addEventListener("submit", function(e) {
    var title = document.getElementById("title").value.trim();
    var url = document.getElementById("posturl").value.trim();
    var metaTitle = document.getElementById("metaTitle").value.trim();
    var metaDescription = document.querySelector("textarea[name='meta_desc']").value.trim();
    var postContent = document.querySelector("textarea[name='article']").value.trim();
    var imageInput = document.querySelector("input[name='image']");
    var category = document.querySelector("select[name='category']").value;

    // Reset error messages
    document.getElementById("titleError").textContent = "";
    document.getElementById("urlError").textContent = "";
    document.getElementById("metaTitleError").textContent = "";
    document.getElementById("metaDescError").textContent = "";
    document.getElementById("postError").textContent = "";
    document.getElementById("imageError").textContent = "";
    document.getElementById("categoryError").textContent = "";

    var hasValidationErrors = false;


    var postContent = CKEDITOR.instances['summernote'].getData().trim();

// Post content validation
if (postContent === "") {
    document.getElementById("postError").textContent = "Post content is required.";
    hasValidationErrors = true;
} 
    // Title validation
    if (title === "") {
        document.getElementById("titleError").textContent = "Title is required.";
        hasValidationErrors = true;
    }

    // URL validation
    if (!/^[a-zA-Z0-9\-]+$/.test(url)) {
        document.getElementById("urlError").textContent = "Invalid characters in URL. Only letters, numbers, and hyphens are allowed.";
        hasValidationErrors = true;
    }

    // Meta title validation
    if (metaTitle === "" || metaTitle.length > 150) {
        document.getElementById("metaTitleError").textContent = "Meta title is required and should not exceed 150 characters.";
        hasValidationErrors = true;
    }

    // Meta description validation
    if (metaDescription.length > 300) {
        document.getElementById("metaDescError").textContent = "Meta description should not exceed 300 characters.";
        hasValidationErrors = true;
    }

    // Post content validation
    if (postContent === "") {
        document.getElementById("postError").textContent = "Post content is required.";
        hasValidationErrors = true;
    }

    // Image validation (only if it's the creation form, not the edit form)
    if (imageInput.files.length) {
    var fileName = imageInput.files[0].name;
    var validExtensions = ["jpeg", "jpg", "png", "webp"];
    var fileExtension = fileName.split('.').pop().toLowerCase();
    
    if (!validExtensions.includes(fileExtension)) {
        document.getElementById("imageError").textContent = "Invalid file format. Can be updated in JPEG, JPG, PNG, WebP format only.";
        hasValidationErrors = true;
    }
}

    // Category validation
    if (category === "") {
        document.getElementById("categoryError").textContent = "Please select a category.";
        hasValidationErrors = true;
    }

    // Prevent form submission if there are validation errors
    if (hasValidationErrors) {
        e.preventDefault();
    }
});



  function transformInputValue(inputValue) {
    // Remove special characters and convert spaces to hyphens
    var url = inputValue
        .replace(/[^a-zA-Z0-9\s]/g, "") // Remove special characters
        .replace(/\s+/g, " ") // Convert multiple spaces to a single space
        .replace(/^\s+|\s+$/g, "") // Trim leading and trailing spaces
        .replace(/\s+/g, "-") // Convert spaces to hyphens
        .replace(/-+/g, "-") // Convert multiple hyphens to a single hyphen
        .trim()
        .toLowerCase(); // Convert to lowercase// Trim leading and trailing hyphens
    return url;
}

   function updateFields() {
    var titleInput = document.getElementById("title").value;
    var urlInput = document.getElementById("posturl");
    var metaTitleInput = document.getElementById("metaTitle");

    var url = transformInputValue(titleInput);

    urlInput.value = url;

    // Set meta title same as the title
    metaTitleInput.value = titleInput;
}

// Attach the function to the title input field's input event
document.getElementById("title").addEventListener("input", updateFields);

</script>

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

            filebrowserUploadUrl: "upload"
        });
        $('.ui.fluid.dropdown')
            .dropdown({
                maxSelections: 3
            });
    </script>