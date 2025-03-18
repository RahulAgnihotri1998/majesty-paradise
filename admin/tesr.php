<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>MLA Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="vendors/feather/feather.css">
    <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" type="text/css" href="js/select.dataTables.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="css/vertical-layout-light/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="https://www.mlagroup.com/img/favicon.png" />


    <!-- Select2 CSS -->
    <link rel="stylesheet" href="
https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.5.0/semantic.min.css" integrity="sha512-KXol4x3sVoO+8ZsWPFI/r5KBVB/ssCGB5tsv2nVOKwLg33wTFP3fmnXa47FdSVIshVTgsYk/1734xSk9aFIa4A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.ckeditor.com/4.7.3/full/ckeditor.js"></script>



</head>

<body>



    <div class="container-scroller">

        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo mr-5" href="index.html"><img src="https://www.mlagroup.com/img/logo-header-default.png" class="mr-2" alt="logo" /></a>
                <a class="navbar-brand brand-logo-mini" href="index.html"><img src="images/logo-mini.svg" alt="logo" /></a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="icon-menu"></span>
                </button>
                <ul class="navbar-nav mr-lg-2">
                    <!-- <li class="nav-item nav-search d-none d-lg-block">
            <div class="input-group">
              <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
                <span class="input-group-text" id="search">
                  <i class="icon-search"></i>
                </span>
              </div>
              <input type="text" class="form-control" id="navbar-search-input" placeholder="Search now"
                aria-label="search" aria-describedby="search">
            </div>
          </li> -->
                </ul>
                <ul class="navbar-nav navbar-nav-right">

                    <li class="nav-item nav-profile dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                            <img src="images/faces/face28.jpg" alt="profile" />
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                            <!-- <a class="dropdown-item">
                <i class="ti-settings text-primary"></i>
                Settings
              </a> -->
                            <a class="dropdown-item">
                                <i class="ti-power-off text-primary"></i>
                                Logout
                            </a>
                        </div>
                    </li>
                    <!-- <li class="nav-item nav-settings d-none d-lg-flex">
            <a class="nav-link" href="#">
              <i class="icon-ellipsis"></i>
            </a>
          </li> -->
                </ul>
                <!-- <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="icon-menu"></span>
            </button> -->
            </div>
     
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
                            <small class="settings-heading border-top-0 mb-3 pt-0 border-bottom-0 pb-0 pr-3 font-weight-normal">See
                                All</small>
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
                                        <!-- <li class="nav-item">
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
                            </li> -->

                </ul>
            </nav>

      </nav> <!-- partial -->

            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <form class="row" id="addProductForm">
                        <!-- Left column -->
                        <div class="col-md-7 grid-margin stretch-card">
                            <!-- Add Product Form -->
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Add Product Form</h4>
                                    <p class="card-description">
                                        <!-- Basic form layout -->
                                    </p>
                                    <div class="form-group">
                                        <label for="exampleInputTitle">Title</label>
                                        <input type="text" class="form-control" oninput="generateUrlAndMetaTitle()" id="exampleInputTitle" placeholder="Title">
                                        <div id="titleError" class="error-message"></div> <!-- Error div -->
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputURL">URL</label>
                                        <input type="text" class="form-control" id="exampleInputURL" placeholder="URL">
                                        <div id="urlError" class="error-message"></div> <!-- Error div -->
                                    </div>
                                    <!-- Other form fields for Add Product Form -->
                                    <div class="form-group">
                                        <label for="exampleInputMetaTitle">Meta Title</label>
                                        <input type="text" class="form-control" id="exampleInputMetaTitle" placeholder="Meta Title">
                                        <div id="metaTitleError" class="error-message"></div> <!-- Error div -->
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputMetaDescription">Meta Description</label>
                                        <input type="text" class="form-control" id="exampleInputMetaDescription" placeholder="Meta Description">
                                        <div id="metaDescriptionError" class="error-message"></div> <!-- Error div -->
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputAdditionalCode">Additional Code</label>
                                        <textarea class="form-control" id="exampleInputAdditionalCode" placeholder="Additional Code"></textarea>
                                        <div id="additionalCodeError" class="error-message"></div> <!-- Error div -->
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Right column -->
                        <div class="col-md-5 grid-margin stretch-card">
                            <!-- Other forms and fields -->
                            <div class="card">
                                <div class="card-body">
                                    <!-- Main Product Image Upload -->
                                    <!-- Error div for Main Product Image Upload -->
                                    <!-- HTML structure -->
                                    <div class="form-group">
                                        <label>Main Product Image Upload</label>
                                        <input type="file" name="img[]" class="file-upload-default" id="mainImageUpload" accept=".png, .jpg, .jpeg, .webp">
                                        <div class="input-group col-xs-12">
                                            <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                                            <span class="input-group-append">
                                                <button class="file-upload-browse btn btn-primary" id="mainImageUploadButton" type="button">Upload</button>
                                            </span>
                                        </div>

                                        <img id="mainImagePreview" src="#" alt="Main Product Image Preview" style="display: none; max-width: 100px; height: 100px;">
                                    </div>


                                    <!-- Gallery Images Upload -->
                                    <div class="form-group">
                                        <label>Gallery Images Upload</label>
                                        <input type="file" name="galleryImages[]" id="galleryImagesUpload" class="file-upload-default" accept=".png, .jpg, .jpeg, .webp" multiple onchange="previewGalleryImages()">
                                        <div class="input-group col-xs-12">
                                            <input type="text" class="form-control file-upload-info" placeholder="Upload Image" readonly>
                                            <span class="input-group-append">
                                                <button class="file-upload-browse btn btn-primary" id="galleryImagesUploadButton" type="button">Upload</button>
                                            </span>
                                        </div>
                                        <div id="galleryImagesPreview" style="display: none;">
                                            <!-- Gallery image previews will be displayed here -->
                                        </div>
                                    </div>

                                    <!-- Select Brand -->
                                    <!-- Error div for Select Brand -->
                                    <div class="form-group">
                                        <label for="brandSelect">Select Brand</label>
                                        <select class="form-control form-control-lg" id="brandSelect" name="brand_id">
                                            <option value="">Select Brand</option>
                                            <option value='1'>testing1</option>
                                            <option value='2'>testing</option>
                                            <option value='3'>testing</option>
                                            <option value='4'>testing11</option>
                                            <option value='5'>testing123</option>
                                        </select>
                                        <div id="brandError" class="error-message"></div> <!-- Error div -->
                                    </div>
                                    <style>
                                        /* Style for the container */
                                        .product-prefix-container {}

                                        /* Style for the selected values input */
                                        .selected-values {
                                            width: 100%;
                                            padding: 8px;
                                            border: 1px solid #ccc;
                                            border-radius: 4px;
                                            cursor: pointer;
                                        }

                                        /* Style for the dropdown content */
                                        .dropdown-content {
                                            display: none;
                                            position: absolute;
                                            background-color: #f9f9f9;
                                            min-width: 160px;
                                            overflow-y: auto;
                                            max-height: 150px;
                                            border: 1px solid #ddd;
                                            border-radius: 4px;
                                            z-index: 1;
                                        }

                                        /* Style for the dropdown content when shown */
                                        .show {
                                            display: block;
                                        }

                                        /* Style for the checkboxes and labels */
                                        .dropdown-content input[type="checkbox"] {
                                            margin: 4px 0;
                                        }

                                        .dropdown-content label {
                                            margin-left: 8px;
                                        }

                                        .error-message {
                                            color: red;
                                        }
                                    </style>

                                    <!-- Select Product -->
                                    <div class="form-group">
                                        <label for="productSelect">Select Product</label>
                                        <select class=" ui fluid search dropdown" multiple>
                                            <option value='1'>testing</option>
                                            <option value='2'>testing</option>
                                            <option value='3'>testing1</option>
                                            <option value='4'>testing1</option>
                                            <option value='5'>testing1</option>
                                            <option value='6'>testing1</option>
                                            <option value='7'>testing1</option>
                                            <option value='8'>testing1</option>
                                            <option value='9'>testing123</option>
                                            <option value='10'>testing123</option>
                                            <option value='11'>testing123</option>
                                            <option value='12'>testing123assd</option>
                                            <option value='13'>testing123assd</option>
                                            <option value='14'>testing123assd</option>
                                            <option value='15'>testing123assd</option>
                                            <option value='16'>testing123assd</option>
                                            <option value='17'>testing123assd</option>
                                            <option value='18'>filesgalleryimages</option>
                                            <option value='19'>filesgalleryimages</option>
                                            <option value='20'>filesgalleryimages</option>
                                            <option value='21'>filesgalleryimages</option>
                                            <option value='22'>filesgalleryimages</option>
                                            <option value='23'>filesgalleryimages</option>
                                            <option value='24'>filesgalleryimages</option>
                                            <option value='25'>filesgalleryimages</option>
                                            <option value='26'>filesgalleryimages</option>
                                            <option value='27'>filesgalleryimages</option>
                                            <option value='28'>filesgalleryimages</option>
                                            <option value='29'>filesgalleryimages</option>
                                            <option value='30'>testing123adfsadfasf</option>
                                            <option value='31'>testing123adfsadfasf</option>
                                            <option value='32'>testing123adfsadfasf</option>
                                            <option value='33'>testing123adfsadfasf</option>
                                            <option value='34'>testing1ascscascasc</option>
                                            <option value='35'>testing1ascscascasc</option>
                                            <option value='36'></option>
                                            <option value='37'></option>
                                            <option value='38'></option>
                                            <option value='39'></option>
                                            <option value='40'></option>
                                            <option value='41'>Hydrated Calcium Silicate1</option>
                                            <option value='42'></option>
                                            <option value='43'></option>
                                            <option value='44'></option>
                                        </select>
                                        <input type="text" class="selected-values form-control" placeholder="Selected Products">
                                        <div id="productError" class="error-message"></div> <!-- Error div -->
                                    </div>

                                    <!-- Status -->
                                    <!-- Error div for Status -->
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect2">Status</label>
                                        <select class="form-control form-control-lg" id="exampleFormControlSelect2">
                                            <option>Unpublished</option>
                                            <option>Published</option>
                                        </select>
                                        <div id="statusError" class="error-message"></div> <!-- Error div -->
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Bottom column -->
                        <div class="col-md-12 grid-margin stretch-card">
                            <!-- Long Description and Applications -->
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputLongDescription">Long Description</label>
                                        <textarea class="form-control" id="editor1" placeholder="Long Description"></textarea>
                                        <div id="longDescriptionError" class="error-message"></div> <!-- Error div -->
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputApplications">Applications</label>
                                        <textarea class="form-control" id="editor2" placeholder="Applications"></textarea>
                                        <div id="applicationsError" class="error-message"></div> <!-- Error div -->
                                    </div>
                                    <div class="text-center">
                                        <button type="button" class="btn btn-primary mr-2 mb-4" onclick="submitForms()">Save</button>
                                        <button class="btn btn-light mb-4">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>

                <script>
                    //   ClassicEditor.create(document.querySelector('#editor1'));
                    CKEDITOR.replace('editor1');
                    CKEDITOR.replace('editor2');

                    function generateUrlAndMetaTitle() {
                        // Get the course name input field and its value
                        const courseNameInput = document.getElementById("exampleInputTitle");
                        const courseName = courseNameInput.value.trim();

                        // Remove special characters and convert spaces to hyphens
                        const formattedName = courseName
                            .toLowerCase() // Convert to lowercase
                            .replace(/[^a-zA-Z0-9\s-]/g, "") // Remove special characters except hyphen and spaces
                            .replace(/\s+/g, "-"); // Convert spaces to hyphens

                        // Replace consecutive hyphens with a single hyphen
                        const finalFormattedName = formattedName.replace(/-+/g, "-");

                        // Remove hyphens at the beginning and end
                        const trimmedName = finalFormattedName.replace(/^-+|-+$/g, "");

                        // Set the course URL input field
                        const courseUrlInput = document.getElementById("exampleInputURL");
                        courseUrlInput.value = trimmedName;
                    }

                    function convertTourl() {
                        var slugElement = document.getElementById("exampleInputURL");
                        var inputValue = slugElement.value;

                        // Remove leading and trailing spaces and hyphens
                        inputValue = inputValue.replace(/^[ -]+|[ -]+$/g, '');

                        // Replace consecutive spaces and hyphens with a single hyphen
                        inputValue = inputValue.replace(/[ -]+/g, '-');

                        // Replace underscores (_) with hyphens (-)
                        inputValue = inputValue.replace(/_/g, '-');

                        // Convert to lowercase, remove special characters except hyphens, and trim leading/trailing hyphens
                        var sanitizedValue = inputValue.toLowerCase().replace(/[^\w-]+/g, '').trim();

                        slugElement.value = sanitizedValue;
                    }
                </script>
                <script>
                    // Function to preview gallery images
                    function previewGalleryImages() {
                        const galleryImagesInput = document.getElementById('galleryImagesUpload');
                        const galleryImagesPreview = document.getElementById('galleryImagesPreview');

                        // Clear previous previews
                        galleryImagesPreview.innerHTML = '';

                        // Loop through selected files and create image previews
                        for (let i = 0; i < galleryImagesInput.files.length; i++) {
                            const file = galleryImagesInput.files[i];
                            const reader = new FileReader();

                            // Create new image element
                            const imgElement = document.createElement('img');
                            imgElement.classList.add('preview-image');
                            imgElement.file = file;

                            // Add image source once it's loaded
                            reader.onload = function(e) {
                                imgElement.src = e.target.result;
                            };

                            // Read image file as data URL
                            reader.readAsDataURL(file);

                            // Append image element to gallery preview container
                            galleryImagesPreview.appendChild(imgElement);
                        }

                        // Display the gallery preview container
                        galleryImagesPreview.style.display = 'block';
                    }

                    // Get the file upload button for the gallery images by its ID
                    const galleryImagesUploadButton = document.getElementById('galleryImagesUploadButton');

                    // Add event listener to the file upload button
                    galleryImagesUploadButton.addEventListener('click', function() {
                        // Trigger click event on file input field
                        document.getElementById('galleryImagesUpload').click();
                    });

                    // Get the file input field and file upload button by their IDs
                    const fileInput = document.getElementById('mainImageUpload');
                    const fileUploadButton = document.getElementById('mainImageUploadButton');

                    // Add event listener to the file upload button
                    fileUploadButton.addEventListener('click', function() {
                        fileInput.click(); // Trigger click event on file input field
                    });

                    // Function to validate the form fields
                    function validateForm() {
                        // Reset error messages
                        resetErrorMessages();

                        // Get form elements
                        var titleInput = document.getElementById('exampleInputTitle');
                        var urlInput = document.getElementById('exampleInputURL');
                        var metaTitleInput = document.getElementById('exampleInputMetaTitle');
                        var metaDescriptionInput = document.getElementById('exampleInputMetaDescription');
                        var additionalCodeInput = document.getElementById('exampleInputAdditionalCode');
                        var mainImageInput = document.querySelector('input[name="img[]"]');
                        var galleryImageInput = document.querySelectorAll('input[name="img[]"]')[1];
                        var brandSelect = document.getElementById('exampleFormControlSelect1');
                        var statusSelect = document.getElementById('exampleFormControlSelect2');


                        // Validate title
                        if (titleInput.value.trim() === '') {
                            displayErrorMessage('titleError', 'Title is required.');
                            return false;
                        }

                        // Validate URL
                        if (urlInput.value.trim() === '') {
                            displayErrorMessage('urlError', 'URL is required.');
                            return false;
                        }

                        // Validate meta title
                        if (metaTitleInput.value.trim() === '') {
                            displayErrorMessage('metaTitleError', 'Meta Title is required.');
                            return false;
                        }

                        // Validate meta description
                        if (metaDescriptionInput.value.trim() === '') {
                            displayErrorMessage('metaDescriptionError', 'Meta Description is required.');
                            return false;
                        }

                        // Validate additional code
                        if (additionalCodeInput.value.trim() === '') {
                            displayErrorMessage('additionalCodeError', 'Additional Code is required.');
                            return false;
                        }

                        // Validate main product image
                        if (mainImageInput.files.length === 0) {
                            displayErrorMessage('mainImageError', 'Main Product Image is required.');
                            return false;
                        }

                        // Validate gallery images
                        if (galleryImageInput.files.length === 0) {
                            displayErrorMessage('galleryImageError', 'Gallery Images are required.');
                            return false;
                        }

                        // Validate brand selection
                        if (brandSelect.value.trim() === '') {
                            displayErrorMessage('brandError', 'Brand selection is required.');
                            return false;
                        }

                        // Validate status selection
                        if (statusSelect.value.trim() === '') {
                            displayErrorMessage('statusError', 'Status selection is required.');
                            return false;
                        }

                        // Validate long description
                        if (longDescriptionInput.value.trim() === '') {
                            displayErrorMessage('longDescriptionError', 'Long Description is required.');
                            return false;
                        }

                        // Validate applications
                        if (applicationsInput.value.trim() === '') {
                            displayErrorMessage('applicationsError', 'Applications are required.');
                            return false;
                        }

                        // If all validations pass, return true
                        return true;
                    }

                    // Function to display error messages
                    function displayErrorMessage(id, message) {
                        var errorDiv = document.getElementById(id);
                        errorDiv.innerText = message;
                    }

                    // Function to reset error messages
                    function resetErrorMessages() {
                        var errorDivs = document.querySelectorAll('.error-message');
                        errorDivs.forEach(function(div) {
                            div.innerText = '';
                        });
                    }

                    // Function to submit the form
                    // Function to submit the form
                    function submitForms() {
                        // Validate the form
                        if (!validateForm()) {
                            // If validation passes, prepare form data
                            var formData = new FormData();
                            formData.append('title', document.getElementById('exampleInputTitle').value);
                            formData.append('url', document.getElementById('exampleInputURL').value);
                            formData.append('metaTitle', document.getElementById('exampleInputMetaTitle').value);
                            formData.append('metaDescription', document.getElementById('exampleInputMetaDescription').value);
                            formData.append('additionalCode', document.getElementById('exampleInputAdditionalCode').value);
                            formData.append('mainImage', document.getElementById('mainImageUpload').files[0]);
                            var files = document.getElementById('galleryImagesUpload').files;
                            for (var i = 0; i < files.length; i++) {
                                formData.append('galleryImages[]', files[i]);
                            }
                            formData.append('brandId', document.getElementById('brandSelect').value);
                            formData.append('status', document.getElementById('exampleFormControlSelect2').value);
                            formData.append('longDescription', CKEDITOR.instances['editor1'].getData());
                            formData.append('applications', CKEDITOR.instances['editor1'].getData());

                            // Event listener for the checkboxes to update selected values
                            // Append selected checkbox values to form data
                            var selectedValues = [];
                            var checkboxes = document.querySelectorAll('.product-checkbox:checked');
                            checkboxes.forEach(function(checkbox) {
                                selectedValues.push(checkbox.value);
                            });
                            formData.append('selectedProducts', selectedValues.join(','));

                            // Perform AJAX request
                            var xhr = new XMLHttpRequest();
                            xhr.open('POST', './codes/add-product.php'); // Adjust the endpoint URL
                            xhr.onload = function() {
                                if (xhr.status === 200) {
                                    // Handle successful response
                                    var response = JSON.parse(xhr.responseText);
                                    if (response.success) {
                                        // Show success message using SweetAlert
                                        Swal.fire({
                                            text: 'Form submitted successfully!',
                                            icon: 'success',
                                            confirmButtonText: 'Ok, got it!'
                                        }).then(function() {
                                            // Redirect or perform other actions as needed
                                        });
                                    } else {
                                        // Show error message using SweetAlert
                                        Swal.fire({
                                            text: 'Form submission failed: ' + response.message,
                                            icon: 'error',
                                            confirmButtonText: 'Ok, got it!'
                                        });
                                    }
                                } else {
                                    // Show error message using SweetAlert
                                    Swal.fire({
                                        text: 'Error: ' + xhr.statusText,
                                        icon: 'error',
                                        confirmButtonText: 'Ok, got it!'
                                    });
                                }
                            };
                            xhr.onerror = function() {
                                // Show error message using SweetAlert
                                Swal.fire({
                                    text: 'Request failed',
                                    icon: 'error',
                                    confirmButtonText: 'Ok, got it!'
                                });
                            };
                            xhr.send(formData);

                        }

                    }
                    // Function to handle file input change event
                    document.getElementById('mainImageUpload').addEventListener('change', function() {
                        var file = this.files[0];
                        if (file) {
                            var reader = new FileReader();
                            reader.onload = function(event) {
                                var imgPreview = document.getElementById('mainImagePreview');
                                imgPreview.src = event.target.result;
                                imgPreview.style.display = 'block';
                            };
                            reader.readAsDataURL(file);
                        }
                    });
                </script>




                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                <footer class="footer">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2024 MLA group<a href="https://www.bootstrapdash.com/" target="_blank"></a> </span>
                        <!-- <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="ti-heart text-danger ml-1"></i></span> -->
                    </div>

                </footer>
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <!-- plugins:js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="vendors/chart.js/Chart.min.js"></script>
    <script src="vendors/datatables.net/jquery.dataTables.js"></script>
    <script src="vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
    <script src="js/dataTables.select.min.js"></script>

    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="js/off-canvas.js"></script>
    <script src="js/hoverable-collapse.js"></script>
    <script src="js/template.js"></script>
    <script src="js/settings.js"></script>
    <script src="js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="js/dashboard.js"></script>
    <script src="js/Chart.roundedBarCharts.js"></script>
    <!-- Select2 JavaScript -->
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- SweetAlert CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="
https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.5.0/semantic.min.js" integrity="sha512-Xo0Jh8MsOn72LGV8kU5LsclG7SUzJsWGhXbWcYs2MAmChkQzwiW/yTQwdJ8w6UA9C6EVG18GHb/TrYpYCjyAQw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        $('.ui.fluid.dropdown')
            .dropdown({

            });
    </script>


    <!-- End custom js for this page-->
</body>

</html>