<?php



include('inc/header.php') ?>




<div class="container-scroller">

    <?php include('inc/nav.php') ?>
    <!-- partial -->

    <div class="container-fluid page-body-wrapper">
       <?php  include('sidebar.php') ?>
        <style>
            #image-preview {
                position: relative;
            }

            .img-fluid {
                height: 100px;
                width: 100px;
            }


            .preview-container {
                position: relative;
                display: inline-block;
            }

            .preview-container img {
                display: block;
                max-width: 100%;
                height: auto;
            }

            .preview-container .close-btn {
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

            .close-btn {
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
                                <h4 class="card-title">Add A Package</h4>
                                <p class="card-description">
                                    <!-- Basic form layout -->
                                </p>
                                <form id="PackageForm" class="forms-sample">
                                    <!-- Existing fields -->
                                    <div class="form-group">
                                        <label for="exampleInputTitle">Title</label>
                                        <input type="text" class="form-control" id="exampleInputTitle"
                                            oninput="generateUrlAndMetaTitle()" placeholder="Title" required>
                                        <div id="titleError" class="error-message"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputURL">URL</label>
                                        <input type="text" class="form-control" onchange="convertTourl()"
                                            id="exampleInputURL" placeholder="URL" required>
                                        <div id="urlError" class="error-message"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputStatus">Status</label>
                                        <select class="form-control" id="exampleInputStatus" required>
                                            <option value="">Select Status</option>
                                            <option value="active">Published</option>
                                           
                                            <option value="Inactive">inactive</option>
                                        </select>
                                        <div id="statusError" class="error-message"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputLongDescription">Description</label>
                                        <textarea class="form-control" id="editor1" placeholder="Description"
                                            required></textarea>
                                        <div id="descriptionError" class="error-message"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputLongDescription">Long Description</label>
                                        <textarea class="form-control" id="editor2"
                                            placeholder="Long Description"></textarea>
                                        <div id="longDescriptionError" class="error-message"></div>
                                    </div>
                                    <!-- Package Logo Upload -->
                                    <div class="form-group">
                                        <label for="logo">Package Logo Upload</label>
                                        <input type="file" name="logo" id="logo" class="file-upload-default"
                                            accept=".png, .jpg, .jpeg, .webp">
                                        <div class="input-group col-xs-12">
                                            <input type="text" class="form-control file-upload-info" disabled
                                                placeholder="Upload Logo">
                                            <span class="input-group-append">
                                                <button class="file-upload-browse btn btn-primary" type="button"
                                                    id="logoUpload">Upload</button>
                                            </span>
                                        </div>
                                        <div id="logoPreview" class="mt-2"></div>
                                    </div>

                                    <!-- Featured Image Upload -->
                                    <div class="form-group">
                                        <label for="featuredImage">Featured Image Upload</label>
                                        <input type="file" name="featuredImage" id="featuredImage"
                                            class="file-upload-default" accept=".png, .jpg, .jpeg, .webp">
                                        <div class="input-group col-xs-12">
                                            <input type="text" class="form-control file-upload-info" disabled
                                                placeholder="Upload Featured Image">
                                            <span class="input-group-append">
                                                <button class="file-upload-browse btn btn-primary" type="button"
                                                    id="featuredImageUpload">Upload</button>
                                            </span>
                                        </div>
                                        <div id="featuredImagePreview" class="mt-2"></div>
                                    </div>

                                    <!-- Description Image Upload -->
                                    <div class="form-group">
                                        <label for="descriptionImage">Description Image Upload</label>
                                        <input type="file" name="descriptionImage" id="descriptionImage"
                                            class="file-upload-default" accept=".png, .jpg, .jpeg, .webp">
                                        <div class="input-group col-xs-12">
                                            <input type="text" class="form-control file-upload-info" disabled
                                                placeholder="Upload Description Image">
                                            <span class="input-group-append">
                                                <button class="file-upload-browse btn btn-primary" type="button"
                                                    id="descriptionImageUpload">Upload</button>
                                            </span>
                                        </div>
                                        <div id="descriptionImagePreview" class="mt-2"></div>
                                    </div>


                                    <div>
                                        <button type="submit" class="btn btn-primary mr-2 mb-4">Submit</button>
                                        <button type="button" class="btn btn-light mb-4"
                                            id="cancelButton">Cancel</button>
                                    </div>
                                </form>



                            </div>
                        </div>
                    </div>




                </div>
            </div>

            <script>

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
                document.addEventListener('DOMContentLoaded', function () {
                    var PackageForm = document.getElementById('PackageForm');
                    var titleInput = document.getElementById('exampleInputTitle');
                    var urlInput = document.getElementById('exampleInputURL');
                    var descriptionInput = document.getElementById('editor1');
                    var longDescriptionInput = document.getElementById('editor2');
                    var cancelButton = document.getElementById('cancelButton');
                    var titleError = document.getElementById('titleError');
                    var urlError = document.getElementById('urlError');
                    var descriptionError = document.getElementById('descriptionError');
                    var longDescriptionError = document.getElementById('longDescriptionError');
                    var statusInput = document.getElementById('exampleInputStatus');
                    var logoInput = document.getElementById('logo');
                    var featuredImageInput = document.getElementById('featuredImage');
                    var descriptionImageInput = document.getElementById('descriptionImage');
                    var logoPreviewContainer = document.getElementById('logoPreview');
                    var featuredImagePreviewContainer = document.getElementById('featuredImagePreview');
                    var descriptionImagePreviewContainer = document.getElementById('descriptionImagePreview');

                    // Handle status input change
                    statusInput.addEventListener('change', function () {
                        var status = statusInput.value;
                        console.log('Status:', status);
                    });

                    // Handle file upload button clicks
                    document.getElementById('logoUpload').addEventListener('click', function () {
                        logoInput.click(); // Trigger click event on logo file input
                    });

                    document.getElementById('featuredImageUpload').addEventListener('click', function () {
                        featuredImageInput.click(); // Trigger click event on featured image file input
                    });

                    document.getElementById('descriptionImageUpload').addEventListener('click', function () {
                        descriptionImageInput.click(); // Trigger click event on description image file input
                    });

                    // Handle form submission
                    PackageForm.addEventListener('submit', function (event) {
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
                        formData.append('title', titleInput.value);

                        formData.append('url', urlInput.value);
                        formData.append('description', descriptionInput.value);
                        formData.append('status', statusInput.value);
                        formData.append('longDescription', CKEDITOR.instances['editor2'].getData());

                        // Append the files
                        formData.append('logo', logoInput.files[0] || null);
                        formData.append('featuredImage', featuredImageInput.files[0] || null);
                        formData.append('descriptionImage', descriptionImageInput.files[0] || null);

                        // Create an XMLHttpRequest object
                        var xhr = new XMLHttpRequest();
                        xhr.open('POST', './codes/Package-process.php');
                        xhr.onload = function () {
                            if (xhr.status === 200) {
                                var response = JSON.parse(xhr.responseText);
                                if (response.success) {
                                    Swal.fire({
                                        text: response.message,
                                        icon: 'success',
                                        confirmButtonText: 'Ok, got it!'
                                    }).then(function () {
                                        window.location.href = 'index.php';
                                    });
                                } else {
                                    Swal.fire({
                                        text: response.message,
                                        icon: 'error',
                                        confirmButtonText: 'Ok, got it!'
                                    });
                                }
                            } else {
                                Swal.fire({
                                    text: 'Error: ' + xhr.statusText,
                                    icon: 'error',
                                    confirmButtonText: 'Ok, got it!'
                                });
                            }
                        };
                        xhr.onerror = function () {
                            Swal.fire({
                                text: 'Request failed',
                                icon: 'error',
                                confirmButtonText: 'Ok, got it!'
                            });
                        };
                        xhr.send(formData);
                    });

                    // Handle cancel button click
                    cancelButton.addEventListener('click', function () {
                        window.location.href = 'index.php'; // Example redirect
                    });

                    // Preview for logo upload
                    logoInput.addEventListener('change', function () {
                        previewImage(this, logoPreviewContainer);
                    });

                    // Preview for featured image upload
                    featuredImageInput.addEventListener('change', function () {
                        previewImage(this, featuredImagePreviewContainer);
                    });

                    // Preview for description image upload
                    descriptionImageInput.addEventListener('change', function () {
                        previewImage(this, descriptionImagePreviewContainer);
                    });

                    // Function to handle image preview
                    function previewImage(input, previewContainer) {
                        const file = input.files[0];
                        if (file) {
                            const reader = new FileReader();
                            reader.onload = function () {
                                const img = document.createElement('img');
                                img.src = reader.result;
                                img.className = 'img-fluid';
                                const closeBtn = document.createElement('span');
                                closeBtn.className = 'close-btn';
                                closeBtn.innerHTML = '&times;';
                                closeBtn.addEventListener('click', function () {
                                    previewContainer.innerHTML = '';
                                    input.value = '';
                                });
                                previewContainer.innerHTML = '';
                                previewContainer.appendChild(img);
                                previewContainer.appendChild(closeBtn);
                            }
                            reader.readAsDataURL(file);
                        } else {
                            previewContainer.innerHTML = '';
                        }
                    }
                });

            </script>

            <?php include('inc/footer.php') ?>