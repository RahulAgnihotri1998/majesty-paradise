<?php

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
          <a class="nav-link active" id="todo-tab" data-toggle="tab" href="#todo-section" role="tab"
            aria-controls="todo-section" aria-expanded="true">TO DO LIST</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="chats-tab" data-toggle="tab" href="#chats-section" role="tab"
            aria-controls="chats-section">CHATS</a>
        </li>
      </ul>
      <div class="tab-content" id="setting-content">
        <div class="tab-pane fade show active scroll-wrapper" id="todo-section" role="tabpanel"
          aria-labelledby="todo-section">
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
          <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false"
            aria-controls="form-elements">
            <i class="icon-columns menu-icon"></i>
            <span class="menu-title">Packages</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="form-elements">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"><a class="nav-link" href="add-Packages.php">Add A Package</a></li>
              <li class="nav-item"><a class="nav-link" href="manage-Packages.php">Manage Packages</a></li>
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
    <!-- partial -->
    <div class="main-panel">
      <div class="content-wrapper">
        <form class="row" id="addPackageForm">
          <!-- Left column -->
          <div class="col-md-7 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Add Tour Package</h4>
                <p class="card-description">Basic form layout</p>

                <!-- Tour Name -->
                <div class="form-group">
                  <label for="tourName">Tour Name</label>
                  <input type="text" class="form-control" id="tourName" placeholder="Enter Tour Name">
                  <div id="tourNameError" class="error-message"></div>
                </div>
                

                <!-- Duration -->
                <div class="form-group">
                  <label for="duration">Duration (Days/Nights)</label>
                  <input type="number" class="form-control" id="duration" placeholder="Enter Duration">
                  <div id="durationError" class="error-message"></div>
                </div>

                <!-- Number of Persons -->
                <div class="form-group">
                  <label for="numberOfPersons">Number of Persons</label>
                  <input type="number" class="form-control" id="numberOfPersons" placeholder="Enter Number of Persons">
                  <div id="numberOfPersonsError" class="error-message"></div>
                </div>

                <!-- Total Cost -->
                <div class="form-group">
                  <label for="totalCost">Total Cost</label>
                  <input type="number" class="form-control" id="totalCost" placeholder="Enter Total Cost">
                  <div id="totalCostError" class="error-message"></div>
                </div>

                <!-- Highlights -->
                <div class="form-group">
                  <label for="highlights">Highlights</label>
                  <textarea class="form-control" id="highlights" placeholder="Enter Key Attractions"></textarea>
                  <div id="highlightsError" class="error-message"></div>
                </div>

                <!-- Included Services -->
              
                <!-- Transport Options -->
                <div class="form-group">
                  <label for="transportOptions">Transport Options</label>
                  <select class="form-control" id="transportOptions" multiple>
                    <option value="Flight">Flight</option>
                    <option value="Bus">Bus</option>
                    <option value="Train">Train</option>
                    <option value="Car">Car</option>
                  </select>
                  <div id="transportOptionsError" class="error-message"></div>
                </div>

                <!-- Accommodation -->
                <div class="form-group">
                  <label for="accommodation">Accommodation</label>
                  <textarea class="form-control" id="accommodation"
                    placeholder="Enter Accommodation Details"></textarea>
                  <div id="accommodationError" class="error-message"></div>
                </div>

                <!-- Additional Services -->
                <div class="form-group">
                  <label for="additionalServices">Additional Services</label>
                  <textarea class="form-control" id="additionalServices" placeholder="Enter Optional Extras"></textarea>
                  <div id="additionalServicesError" class="error-message"></div>
                </div>

                <!-- Itinerary -->
                <div class="form-group">
                  <label for="itinerary">Itinerary</label>
                  <textarea class="form-control" id="itinerary"
                    placeholder="Enter Detailed Plan for Each Day"></textarea>
                  <div id="itineraryError" class="error-message"></div>
                </div>

                <!-- Save and Cancel Buttons -->
                <div class="text-center">
                  <button type="button" class="btn btn-primary mr-2 mb-4" onclick="submitForms()">Save</button>
                  <button class="btn btn-light mb-4">Cancel</button>
                </div>
              </div>
            </div>
          </div>
        </form>

      </div>
      <style>
        .preview-image {
          height: 100px !important;
          width: 100px !important;
        }
      </style>
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
            reader.onload = function (e) {
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
        galleryImagesUploadButton.addEventListener('click', function () {
          // Trigger click event on file input field
          document.getElementById('galleryImagesUpload').click();
        });

        // Get the file input field and file upload button by their IDs
        const fileInput = document.getElementById('mainImageUpload');
        const fileUploadButton = document.getElementById('mainImageUploadButton');

        // Add event listener to the file upload button
        fileUploadButton.addEventListener('click', function () {
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
          // var brandSelect = document.getElementById('exampleFormControlSelect1');
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


          // // Validate brand selection
          // if (brandSelect.value.trim() === '') {
          //   displayErrorMessage('brandError', 'Brand selection is required.');
          //   return false;
          // }

          // Validate status selection
          if (statusSelect.value.trim() === '') {
            displayErrorMessage('statusError', 'Status selection is required.');
            return false;
          }

          // Validate long description
          // if (longDescriptionInput.value.trim() === '') {
          //   displayErrorMessage('longDescriptionError', 'Long Description is required.');
          //   return false;
          // }

          // // Validate applications
          // if (applicationsInput.value.trim() === '') {
          //   displayErrorMessage('applicationsError', 'Applications are required.');
          //   return false;
          // }

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
          errorDivs.forEach(function (div) {
            div.innerText = '';
          });
        }

        // Function to submit the form
        // Function to submit the form
        function submitForms() {
          // Validate the form

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

          // Append selected values from the dropdown to form data
          // Get the selected values from the Semantic UI dropdown
          var selectedValues = [];
          var labelElements = document.querySelectorAll('.ui.label.transition.visible');

          labelElements.forEach(function (label) {
            selectedValues.push(label.getAttribute('data-value'));
          });

          // Append the selected values to the form data
          formData.append('selectedPackages', selectedValues.join(','));



          // Perform AJAX request
          var xhr = new XMLHttpRequest();
          xhr.open('POST', './codes/add-Package.php'); // Adjust the endpoint URL
          xhr.onload = function () {
            if (xhr.status === 200) {
              // Handle successful response
              var response = JSON.parse(xhr.responseText);
              if (response.success) {
                // Show success message using SweetAlert
                Swal.fire({
                  text: 'Form submitted successfully!',
                  icon: 'success',
                  confirmButtonText: 'Ok, got it!'
                }).then(function () {
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
          xhr.onerror = function () {
            // Show error message using SweetAlert
            Swal.fire({
              text: 'Request failed',
              icon: 'error',
              confirmButtonText: 'Ok, got it!'
            });
          };
          xhr.send(formData);

        }


        // Function to handle file input change event
        document.getElementById('mainImageUpload').addEventListener('change', function () {
          var file = this.files[0];
          if (file) {
            var reader = new FileReader();
            reader.onload = function (event) {
              var imgPreview = document.getElementById('mainImagePreview');
              imgPreview.src = event.target.result;
              imgPreview.style.display = 'block';
            };
            reader.readAsDataURL(file);
          }
        });
      </script>




      <?php include('inc/footer.php') ?>