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
        <?php include('sidebar.php') ?>
        <style>
            #image-preview {
                position: relative;
            }



            .image-preview {
                position: relative;
                display: inline-block;
            }

            .preview-image {
                max-width: 150px;
                max-height: 150px;
                object-fit: cover;
                border: 1px solid #ddd;
                padding: 5px;
                border-radius: 4px;
            }

            .close-btn {
                position: absolute;
                top: -5px;
                right: -5px;
                background-color: #ff0000;
                color: #ffffff;
                border-radius: 50%;
                width: 20px;
                height: 20px;
                text-align: center;
                line-height: 18px;
                cursor: pointer;
                font-size: 18px;
            }
        </style>
        <!-- partial -->
        <div class="main-panel">



            <div class="content-wrapper">
                <div class="row">
                    <div class="col-md-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Add A Package category</h4>
                                <p class="card-description">
                                    <!-- Basic form layout -->
                                </p>

                                <?php
                                // Include the database configuration file
                                include('./codes/db.php');

                                // Check if the ID parameter exists in the URL
                                if (isset($_GET['id'])) {
                                    // Get the ID from the URL
                                    $brandId = $_GET['id'];

                                    // Prepare and execute the SQL statement to fetch brand data by ID
                                    $sql = "SELECT * FROM brand WHERE id = '$brandId'";
                                    $result = $db->query($sql);

                                    // Check if the query was successful and brand data exists
                                    if ($result && $result->num_rows > 0) {
                                        // Fetch the brand data
                                        $brandData = $result->fetch_assoc();
                                    }
                                }
                                ?>

                                <form id="brandForm" class="forms-sample">
                                    <!-- Hidden input field for brand ID -->
                                    <div class="form-group">
                                        <input type="hidden" name="brand_id" id="brand_id" value="<?php echo $brandId; ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputTitle">Title</label>
                                        <input type="text" class="form-control" id="exampleInputTitle" oninput="generateUrlAndMetaTitle()" value="<?php echo isset($brandData['name']) ? $brandData['name'] : ''; ?>" placeholder="Title" required>
                                        <div id="titleError" class="error-message"></div>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputURL">URL</label>
                                        <input type="text" class="form-control" onchange="convertTourl()" value="<?php echo isset($brandData['url']) ? $brandData['url'] : ''; ?>" id="exampleInputURL" placeholder="URL" required>
                                        <div id="urlError" class="error-message"></div>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputStatus">Status</label>
                                        <select class="form-control" id="exampleInputStatus">
                                            <option value="">Select Status</option>
                                            <option value="Published" <?php echo isset($brandData['status']) && $brandData['status'] == 'Published' ? 'selected' : ''; ?>>Published</option>
                                            <option value="Draft" <?php echo isset($brandData['status']) && $brandData['status'] == 'Draft' ? 'selected' : ''; ?>>Draft</option>
                                            <option value="Archived" <?php echo isset($brandData['status']) && $brandData['status'] == 'Archived' ? 'selected' : ''; ?>>Archived</option>
                                        </select>
                                        <div id="statusError" class="error-message"></div>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputLongDescription">Description</label>
                                        <textarea class="form-control" id="editor1" placeholder="Description" required><?php echo isset($brandData['description']) ? $brandData['description'] : ''; ?></textarea>
                                        <div id="descriptionError" class="error-message"></div>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputLongDescription">Long Description</label>
                                        <textarea class="form-control" id="editor2" placeholder="Long Description"><?php echo isset($brandData['longDescription']) ? $brandData['longDescription'] : ''; ?></textarea>
                                        <div id="longDescriptionError" class="error-message"></div>
                                    </div>

                                    <div class="form-group">
                                        <label for="logo">Package Logo Upload</label>
                                        <input type="file" name="logo" id="logo" class="file-upload-default" accept=".png, .jpg, .jpeg, .webp">
                                        <div class="input-group col-xs-12">
                                            <input type="text" class="form-control file-upload-info" value="<?php echo isset($brandData['logo']) ? $brandData['logo'] : ''; ?>" disabled placeholder="Upload Image">
                                            <span class="input-group-append">
                                                <button class="file-upload-browse btn btn-primary" type="button" id="logoUpload">Upload</button>
                                            </span>
                                        </div>
                                        <div id="image-preview" class="image-preview mt-2">
                                            <?php if (isset($brandData['logo'])): ?>
                                                <img src="./codes/<?php echo $brandData['logo']; ?>" alt="Brand Logo" class="img-fluid preview-image">
                                                <span class="close-btn">&times;</span>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="featuredImage">Featured Image Upload</label>
                                        <input type="file" name="featuredImage" id="featuredImage" class="file-upload-default" accept=".png, .jpg, .jpeg, .webp">
                                        <div class="input-group col-xs-12">
                                            <input type="text" class="form-control file-upload-info" value="<?php echo isset($brandData['featuredImage']) ? $brandData['featuredImage'] : ''; ?>" disabled placeholder="Upload Featured Image">
                                            <span class="input-group-append">
                                                <button class="file-upload-browse btn btn-primary" id="featuredImageUpload" type="button">Upload</button>
                                            </span>
                                        </div>
                                        <div id="featured-image-preview" class="image-preview mt-2">
                                            <?php if (isset($brandData['featuredImage'])): ?>
                                                <img src="./codes/<?php echo $brandData['featuredImage']; ?>" alt="Featured Image" class="img-fluid preview-image">
                                                <span class="close-btn">&times;</span>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="descriptionImage">Description Image Upload</label>
                                        <input type="file" name="descriptionImage" id="descriptionImage" class="file-upload-default" accept=".png, .jpg, .jpeg, .webp">
                                        <div class="input-group col-xs-12">
                                            <input type="text" class="form-control file-upload-info" value="<?php echo isset($brandData['descriptionImage']) ? $brandData['descriptionImage'] : ''; ?>" disabled placeholder="Upload Description Image">
                                            <span class="input-group-append">
                                                <button class="file-upload-browse btn btn-primary" type="button" id="descriptionImageUpload">Upload</button>
                                            </span>
                                        </div>
                                        <div id="description-image-preview" class="image-preview mt-2">
                                            <?php if (isset($brandData['descriptionImage'])): ?>
                                                <img src="./codes/<?php echo $brandData['descriptionImage']; ?>" alt="Description Image" class="img-fluid preview-image">
                                                <span class="close-btn">&times;</span>
                                            <?php endif; ?>
                                        </div>
                                    </div>



                                    <div>
                                        <button type="submit" class="btn btn-primary mr-2 mb-4">Submit</button>
                                        <button type="button" class="btn btn-light mb-4" id="cancelButton">Cancel</button>
                                    </div>
                                </form>




                            </div>
                        </div>
                    </div>




                </div>
            </div>

            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    // Get all close buttons
                    var closeButtons = document.querySelectorAll('.close-btn');

                    // Loop through each close button and add an event listener
                    closeButtons.forEach(function(closeButton) {
                        closeButton.addEventListener('click', function() {
                            // Find the corresponding image preview container
                            var imagePreview = this.parentNode;

                            // Remove the image from the preview
                            var img = imagePreview.querySelector('img');
                            if (img) {
                                img.remove();
                            }

                            // Clear the corresponding file input field
                            var fileInput = imagePreview.previousElementSibling.querySelector('input[type="file"]');
                            if (fileInput) {
                                fileInput.value = ''; // Clear the file input
                            }

                            // Clear the text input that shows the file name
                            var textInput = imagePreview.previousElementSibling.querySelector('input.file-upload-info');
                            if (textInput) {
                                textInput.value = ''; // Clear the text input
                            }
                        });
                    });
                });


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
                document.addEventListener('DOMContentLoaded', function() {
                    var brandForm = document.getElementById('brandForm');
                    var titleInput = document.getElementById('exampleInputTitle');
                    var urlInput = document.getElementById('exampleInputURL');
                    var descriptionInput = document.getElementById('editor1');
                    var longDescriptionInput = document.getElementById('editor2');
                    var cancelButton = document.getElementById('cancelButton');
                    var titleError = document.getElementById('titleError');
                    var urlError = document.getElementById('urlError');
                    var descriptionError = document.getElementById('descriptionError');
                    var longDescriptionError = document.getElementById('longDescriptionError');
                    var fileInput = document.querySelector('input[type="file"]');
                    var fileUploadButton = document.querySelector('.file-upload-browse');

                    var statusInput = document.getElementById('exampleInputStatus');
                    var featuredImageInput = document.getElementById('featuredImage');
                    var descriptionImageInput = document.getElementById('descriptionImage');

                    // Handle status input change
                    statusInput.addEventListener('change', function() {
                        var status = statusInput.value;
                        console.log('Status:', status);
                    });

                    // Handle file upload button click for logo
                    fileUploadButton.addEventListener('click', function() {
                        fileInput.click(); // Trigger click event on file input field
                    });

                    // Handle file upload button click for featured image
                    document.getElementById('featuredImageUpload').addEventListener('click', function() {
                        featuredImageInput.click(); // Trigger click event on featured image file input
                    });

                    // Handle file upload button click for description image
                    document.getElementById('descriptionImageUpload').addEventListener('click', function() {
                        descriptionImageInput.click(); // Trigger click event on description image file input
                    });

                    // Handle form submission
                    brandForm.addEventListener('submit', function(event) {
                        event.preventDefault(); // Prevent default form submission

                        // Clear previous error messages
                        titleError.textContent = '';
                        urlError.textContent = '';
                        descriptionError.textContent = '';
                        longDescriptionError.textContent = '';

                        // Validate form fields
                        if (!titleInput.value.trim()) {
                            titleError.textContent = 'Title is required';
                            return;
                        }

                        if (!urlInput.value.trim()) {
                            urlError.textContent = 'URL is required';
                            return;
                        }

                        if (!descriptionInput.value.trim()) {
                            descriptionError.textContent = 'Description is required';
                            return;
                        }

                        if (!longDescriptionInput.value.trim()) {
                            longDescriptionError.textContent = 'Long Description is required';
                            return;
                        }

                        // Create a new FormData object
                        var formData = new FormData();

                        // Append form fields to the FormData object
                        formData.append('title', titleInput.value);
                        formData.append('brand_id', document.getElementById('brand_id').value);
                        formData.append('url', urlInput.value);
                        formData.append('description', descriptionInput.value);
                        formData.append('status', statusInput.value);
                        formData.append('longDescription', CKEDITOR.instances['editor2'].getData());

                        // Append the files
                        formData.append('logo', fileInput.files[0] || null);
                        formData.append('featuredImage', featuredImageInput.files[0] || null);
                        formData.append('descriptionImage', descriptionImageInput.files[0] || null);

                        // Create an XMLHttpRequest object
                        var xhr = new XMLHttpRequest();
                        xhr.open('POST', './codes/edit-brand-process.php');
                        xhr.onload = function() {
                            if (xhr.status === 200) {
                                // Handle successful response
                                var response = JSON.parse(xhr.responseText);
                                if (response.success) {
                                    // Show success message using SweetAlert
                                    Swal.fire({
                                        text: response.message,
                                        icon: 'success',
                                        confirmButtonText: 'Ok, got it!'
                                    }).then(function() {
                                        window.location.href = 'index.php';
                                    });
                                } else {
                                    // Show error message using SweetAlert
                                    Swal.fire({
                                        text: response.message,
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
                    });

                    // Handle cancel button click
                    cancelButton.addEventListener('click', function() {
                        window.location.href = 'index.php'; // Example redirect
                    });

                    // Preview for logo upload
                    const logoInput = document.getElementById('logo');
                    const logoPreviewContainer = document.getElementById('image-preview');
                    logoInput.addEventListener('change', function() {
                        const file = this.files[0];
                        if (file) {
                            const reader = new FileReader();
                            reader.onload = function() {
                                const img = document.createElement('img');
                                img.src = reader.result;
                                img.className = 'img-fluid';
                                const closeBtn = document.createElement('span');
                                closeBtn.className = 'close-btn';
                                closeBtn.innerHTML = '&times;';
                                closeBtn.addEventListener('click', function() {
                                    logoPreviewContainer.innerHTML = '';
                                    logoInput.value = '';
                                });
                                logoPreviewContainer.innerHTML = '';
                                logoPreviewContainer.appendChild(img);
                                logoPreviewContainer.appendChild(closeBtn);
                            }
                            reader.readAsDataURL(file);
                        } else {
                            logoPreviewContainer.innerHTML = '';
                        }
                    });

                    // Preview for featured image upload
                    const featuredImagePreviewContainer = document.getElementById('featured-image-preview');
                    featuredImageInput.addEventListener('change', function() {
                        const file = this.files[0];
                        if (file) {
                            const reader = new FileReader();
                            reader.onload = function() {
                                const img = document.createElement('img');
                                img.src = reader.result;
                                img.className = 'img-fluid';
                                const closeBtn = document.createElement('span');
                                closeBtn.className = 'close-btn';
                                closeBtn.innerHTML = '&times;';
                                closeBtn.addEventListener('click', function() {
                                    featuredImagePreviewContainer.innerHTML = '';
                                    featuredImageInput.value = '';
                                });
                                featuredImagePreviewContainer.innerHTML = '';
                                featuredImagePreviewContainer.appendChild(img);
                                featuredImagePreviewContainer.appendChild(closeBtn);
                            }
                            reader.readAsDataURL(file);
                        } else {
                            featuredImagePreviewContainer.innerHTML = '';
                        }
                    });

                    // Preview for description image upload
                    const descriptionImagePreviewContainer = document.getElementById('description-image-preview');
                    descriptionImageInput.addEventListener('change', function() {
                        const file = this.files[0];
                        if (file) {
                            const reader = new FileReader();
                            reader.onload = function() {
                                const img = document.createElement('img');
                                img.src = reader.result;
                                img.className = 'img-fluid';
                                const closeBtn = document.createElement('span');
                                closeBtn.className = 'close-btn';
                                closeBtn.innerHTML = '&times;';
                                closeBtn.addEventListener('click', function() {
                                    descriptionImagePreviewContainer.innerHTML = '';
                                    descriptionImageInput.value = '';
                                });
                                descriptionImagePreviewContainer.innerHTML = '';
                                descriptionImagePreviewContainer.appendChild(img);
                                descriptionImagePreviewContainer.appendChild(closeBtn);
                            }
                            reader.readAsDataURL(file);
                        } else {
                            descriptionImagePreviewContainer.innerHTML = '';
                        }
                    });
                });
            </script>

            <?php include('inc/footer.php') ?>