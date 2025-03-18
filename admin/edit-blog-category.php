<?php
session_start();

// Check if session variables exist
if(isset($_SESSION['user_id']) && isset($_SESSION['email'])) {
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



        <li class="nav-item">
          <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
            <i class="icon-layout menu-icon"></i>
            <span class="menu-title">Brands</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="ui-basic">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="add-brand.php">Add A Brand</a></li>
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
          <a class="nav-link" data-toggle="collapse" href="#blog-elements" aria-expanded="false" aria-controls="blog-elements">
            <i class="icon-columns menu-icon"></i>
            <span class="menu-title">Blog</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="blog-elements">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"><a class="nav-link" href="add-blog-category.php">Add a Category</a></li>
              <li class="nav-item"><a class="nav-link" href="all-blog-category-list.php"> Manage Category</a></li>
              <li class="nav-item"><a class="nav-link" href="add-single-blog-post.php"> Add New Post</a></li>
              <li class="nav-item"><a class="nav-link" href="all-blog-post.php"> Manage Posts</a></li>
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
            .img-fluid{
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
            .validation-error{
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
                            <?php
                              include('./codes/db.php');
                if (isset($_POST['editcat'])) {
                    $edit_id =   $_POST['edit_id'];
                    $query = "SELECT * FROM category WHERE id = '$edit_id'";
                   
                    $result = $db->query( $query);
                }
                ?>
                                <h4 class="card-title">  Add Category </h4>
                                <p class="card-description">
                                    <!-- Basic form layout -->
                                </p>
                                <form id="create-category" action="update-action.php" method="POST">
    <?php foreach ($result as $row): ?>
        <div class="form-group">
            <p>Category Name</p>
            <input type="text"  class="form-control" value="<?php echo $row['cat_name']; ?>" name="cat_name" id="catName" aria-describedby="emailHelp">
            <div id="catNameError" class="validation-error"></div>
        </div>
        <div class="form-group">
            <p>Category URL</p>
            <input type="text"  name="car_url" value="<?php echo $row['slug']; ?>" class="form-control" id="caturl" pattern="^[a-zA-Z0-9\-]+$" title="URL should only contain letters, numbers, and hyphens.">
            <div id="catUrlError" class="validation-error"></div>
        </div>
        <div class="form-group">
            <p>Meta Title</p>
            <input type="text" class="form-control" value="<?php echo $row['meta_title']; ?>" name="meta_title" id="metaTitle">
            <div id="metaTitleError" class="validation-error"></div>
        </div>
        <div class="form-group">
            <p>Meta Description</p>
            <textarea class="form-control" name="meta_description" id="metaDescription" rows="3"><?php echo $row['meta_description']; ?></textarea>
            <div id="metaDescriptionError" class="validation-error"></div>
        </div>
        <input type="hidden" name="updateid" class="form-control" value="<?php echo $row['id']; ?>">
        <button type="submit" name="update_cat" class="btn btn-success">Update</button>
    <?php endforeach; ?>
</form>

                            </div>
                        </div>
                    </div>




                </div>
            </div>

      

            <?php include('inc/footer.php') ?>

            <script>
    document.getElementById('create-category').addEventListener('submit', function(e) {
    // Resetting error messages
    let errors = document.querySelectorAll('.validation-error');
    errors.forEach(function(error) {
        error.textContent = '';
    });

    // Getting the form values
    let catName = document.getElementById('catName').value.trim();
    let catUrl = document.getElementById('caturl').value;
    let metaTitle = document.getElementById('metaTitle').value.trim();
    let metaDescription = document.getElementById('metaDescription').value.trim();

    // Category Name validation
    if (catName === '' || catName.length > 150) {
        e.preventDefault();
        document.getElementById('catNameError').textContent = 'Category name is required and should not exceed 150 characters.';
    }

    // Category URL validation
    if (catUrl === '') {
        e.preventDefault();
        document.getElementById('catUrlError').textContent = 'Category URL is required.';
    } else if (!/^[a-z0-9\-]+$/.test(catUrl) || /-{2,}/.test(catUrl)) {
        e.preventDefault();
        document.getElementById('catUrlError').textContent = 'Invalid URL format.';
    }

    // Meta Title validation
    if (metaTitle === '' || metaTitle.length > 150) {
        e.preventDefault();
        document.getElementById('metaTitleError').textContent = 'Meta title is required and should not exceed 150 characters.';
    }

    // Meta Description validation
    if (metaDescription.length > 300) {
        e.preventDefault();
        document.getElementById('metaDescriptionError').textContent = 'Meta description should not exceed 300 characters.';
    }
});

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



            