<?php

include('inc/header.php') ?>




<div class="container-scroller">

  <?php include('inc/nav.php') ?>
  <!-- partial -->
  <div class="container-fluid page-body-wrapper">
    <!-- partial:partials/_settings-panel.html -->
   <?php include('sidebar.php') ?>
    <!-- partial -->
    <div class="main-panel">
      <div class="content-wrapper">
        <form class="row" id="addPackageForm">
          <!-- Left column -->
          <div class="col-md-7 grid-margin stretch-card">
            <!-- Add Package Form -->
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Add Pacakge Form</h4>
                <p class="card-description">
                  <!-- Basic form layout -->
                </p>
                <div class="form-group">
                  <label for="exampleInputTitle">Tour Title</label>
                  <input type="text" class="form-control" oninput="generateUrlAndMetaTitle()" id="exampleInputTitle"
                    placeholder="Title">
                  <div id="titleError" class="error-message"></div> <!-- Error div -->
                </div>
                <div class="form-group">
                  <label for="exampleInputURL">URL</label>
                  <input type="text" class="form-control" id="exampleInputURL" placeholder="URL">
                  <div id="urlError" class="error-message"></div> <!-- Error div -->
                </div>
                <div class="form-group">
                  <label for="duration">Duration (Days/Nights)</label>
                  <input type="number" class="form-control" id="duration" placeholder="Enter Duration">
                  <div id="durationError" class="error-message"></div> <!-- Error div -->
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

                <div class="form-group">
                  <label>Services</label>
                  <textarea class="form-control mt-2" id="customIncludedServices"
                    placeholder="Add Other Inclusions"></textarea>
                  <div id="includedServicesError" class="error-message"></div>
                </div>

                <!-- Meal Plan -->
                <div class="form-group">
                  <label>Meal Plan</label>
                  <div>
                    <input type="checkbox" id="mealPlanBreakfast" value="Breakfast">
                    <label for="mealPlanBreakfast">Breakfast</label>
                  </div>
                  <div>
                    <input type="checkbox" id="mealPlanLunch" value="Lunch">
                    <label for="mealPlanLunch">Lunch</label>
                  </div>
                  <div>
                    <input type="checkbox" id="mealPlanDinner" value="Dinner">
                    <label for="mealPlanDinner">Dinner</label>
                  </div>
                  <div>
                    <input type="checkbox" id="mealPlanAllMeals" value="All Meals">
                    <label for="mealPlanAllMeals">All Meals</label>
                  </div>
                  <div id="mealPlanError" class="error-message"></div>
                </div>

                <!-- Transport -->
                <div class="form-group">
                  <label>Transport</label>
                  <div>
                    <input type="checkbox" id="transportSEDEN" value="(SEDEN) NON A/C">
                    <label for="transportSEDEN">(SEDEN) NON A/C</label>
                  </div>
                  <div>
                    <input type="checkbox" id="transportTaxes" value="Government Taxes/VAT/ Service Charges">
                    <label for="transportTaxes">Government Taxes/VAT/ Service Charges</label>
                  </div>
                  <div>
                    <input type="checkbox" id="transportCab" value="Cab for sightseeing">
                    <label for="transportCab">Cab for sightseeing</label>
                  </div>
                  <div>
                    <input type="checkbox" id="transportSightseeing" value="Sightseeing">
                    <label for="transportSightseeing">Sightseeing</label>
                  </div>
                  <div id="transportError" class="error-message"></div>
                </div>

                <!-- Hotel -->
                <div class="form-group">
                  <label>Hotel</label>
                  <div>
                    <input type="checkbox" id="hotelRoom" value="One room">
                    <label for="hotelRoom">One room</label>
                  </div>
                  <div>
                    <input type="checkbox" id="hotelStar" value="3 Star hotel">
                    <label for="hotelStar">3 Star hotel</label>
                  </div>
                  <div id="hotelError" class="error-message"></div>
                </div>

                <!-- Airport/Railway Station Pickup/Drop -->
                <div class="form-group">
                  <label>Airport/Railway Station Pickup/Drop</label>
                  <div>
                    <input type="checkbox" id="pickupArrival" value="Arrival">
                    <label for="pickupArrival">Arrival</label>
                  </div>
                  <div>
                    <input type="checkbox" id="pickupDeparture" value="Departure">
                    <label for="pickupDeparture">Departure</label>
                  </div>
                  <div id="pickupDropError" class="error-message"></div>
                </div>

                <!-- Flights -->
                <div class="form-group">
                  <label>Flights</label>
                  <div>
                    <input type="checkbox" id="flights" value="Flight">
                    <label for="flights">Flight</label>
                  </div>
                  <div id="flightsError" class="error-message"></div>
                </div>

                <!-- Entry Fee Charges -->
                <div class="form-group">
                  <label>Entry Fee Charges</label>
                  <div>
                    <input type="checkbox" id="entryFees" value="Other entry fees">
                    <label for="entryFees">Other entry fees</label>
                  </div>
                  <div id="entryFeesError" class="error-message"></div>
                </div>

                <!-- Others -->
                <div class="form-group">
                  <label>Others</label>
                  <div>
                    <input type="checkbox" id="othersAssistance" value="Assistance on arrival">
                    <label for="othersAssistance">Assistance on arrival</label>
                  </div>
                  <div>
                    <input type="checkbox" id="othersDrink" value="Welcome drink on arrival at hotel">
                    <label for="othersDrink">Welcome drink on arrival at hotel</label>
                  </div>
                  <div>
                    <input type="checkbox" id="othersNonAC" value="Other non A/C cars">
                    <label for="othersNonAC">Other non A/C cars</label>
                  </div>
                  <div>
                    <input type="checkbox" id="othersInclusions" value="Other inclusions">
                    <label for="othersInclusions">Other inclusions</label>
                  </div>
                  <div id="othersError" class="error-message"></div>
                </div>

                <!-- Other form fields for Add Package Form -->
                <div class="form-group">
                  <label for="exampleInputMetaTitle">Meta Title</label>
                  <input type="text" class="form-control" id="exampleInputMetaTitle" placeholder="Meta Title">
                  <div id="metaTitleError" class="error-message"></div> <!-- Error div -->
                </div>
                <div class="form-group">
                  <label for="exampleInputMetaDescription">Meta Description</label>
                  <input type="text" class="form-control" id="exampleInputMetaDescription"
                    placeholder="Meta Description">
                  <div id="metaDescriptionError" class="error-message"></div> <!-- Error div -->
                </div>
                <div class="form-group">
                  <label for="exampleInputAdditionalCode">Additional Code</label>
                  <textarea class="form-control" id="exampleInputAdditionalCode"
                    placeholder="Additional Code"></textarea>
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
                <!-- Main Package Image Upload -->
                <!-- Error div for Main Package Image Upload -->
                <!-- HTML structure -->
                <div class="form-group">
                  <label>Main Package Image Upload</label>
                  <input type="file" name="img[]" class="file-upload-default" id="mainImageUpload"
                    accept=".png, .jpg, .jpeg, .webp">
                  <div class="input-group col-xs-12">
                    <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                    <span class="input-group-append">
                      <button class="file-upload-browse btn btn-primary" id="mainImageUploadButton"
                        type="button">Upload</button>
                    </span>
                  </div>

                  <img id="mainImagePreview" src="#" alt="Main Package Image Preview"
                    style="display: none; max-width: 100px; height: 100px;">
                </div>


                <!-- Gallery Images Upload -->
                <div class="form-group">
                  <label>Gallery Images Upload</label>
                  <input type="file" name="galleryImages[]" id="galleryImagesUpload" class="file-upload-default"
                    accept=".png, .jpg, .jpeg, .webp" multiple onchange="previewGalleryImages()">
                  <div class="input-group col-xs-12">
                    <input type="text" class="form-control file-upload-info" placeholder="Upload Image" readonly>
                    <span class="input-group-append">
                      <button class="file-upload-browse btn btn-primary" id="galleryImagesUploadButton"
                        type="button">Upload</button>
                    </span>
                  </div>
                  <div id="galleryImagesPreview" style="display: none;">
                    <!-- Gallery image previews will be displayed here -->
                  </div>
                </div>


                <!-- Select Brand -->
                <!-- Error div for Select Brand -->

                <style>
                <h4 class="card-title">Add Package Form</h4>
                  .Package-prefix-container {}

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
                <?php
                // Include database connection
                include('./codes/db.php');

                // Fetch Package data from the database
                echo $sql = "SELECT id, name FROM brand";

                $result = $db->query($sql);

                // Initialize an empty array to store Package data
                $Packages = array();

                // Check if there are any results
                if ($result->num_rows > 0) {
                  // Loop through each row and store Package data in the $Packages array
                  while ($row = $result->fetch_assoc()) {
                    $Packages[] = $row;
                  }
                }
                ?>

                <!-- Select Package -->
                <div class="form-group">
                  <label for="PackageSelect">Select Package</label>
                  <select class=" ui fluid search dropdown" multiple>
                    <?php
                    // Assuming $Packages is an array containing Package data fetched from the database
                    foreach ($Packages as $Package) {
                      echo "<option value='{$Package['id']}'>{$Package['name']}</option>";
                    }
                    ?>
                  </select>
                  <input type="text" class="selected-values form-control" placeholder="Selected Packages">
                  <div id="PackageError" class="error-message"></div> <!-- Error div -->
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
                  <label for="exampleInputLongDescription">Iternary</label>
                  <textarea class="form-control" id="editor1" placeholder="Long Description"></textarea>
                  <div id="longDescriptionError" class="error-message"></div> <!-- Error div -->
                </div>
                <div class="form-group">
                  <label for="exampleInputApplications">Other Details</label>
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

        // Function to reset error messages
        function resetErrorMessages() {
          const errorMessages = document.querySelectorAll('.error-message');
          errorMessages.forEach(errorMessage => {
            errorMessage.textContent = '';
          });
        }

        // Function to display error messages
        function displayErrorMessage(errorId, message) {
          const errorElement = document.getElementById(errorId);
          if (errorElement) {
            errorElement.textContent = message;
          }
        }

        // Function to validate the form fields
        function validateForm() {
          resetErrorMessages();

          // Validate all required fields
          const requiredFields = [
            { id: 'exampleInputTitle', errorId: 'titleError', message: 'Title is required.' },
            { id: 'exampleInputURL', errorId: 'urlError', message: 'URL is required.' },
            { id: 'duration', errorId: 'durationError', message: 'Duration is required.' },
            { id: 'numberOfPersons', errorId: 'numberOfPersonsError', message: 'Number of persons is required.' },
            { id: 'totalCost', errorId: 'totalCostError', message: 'Total cost is required.' },
            { id: 'highlights', errorId: 'highlightsError', message: 'Highlights are required.' },
            { id: 'exampleInputMetaTitle', errorId: 'metaTitleError', message: 'Meta title is required.' },
            { id: 'exampleInputMetaDescription', errorId: 'metaDescriptionError', message: 'Meta description is required.' },
            { id: 'exampleInputAdditionalCode', errorId: 'additionalCodeError', message: 'Additional code is required.' },
            { id: 'exampleFormControlSelect2', errorId: 'statusError', message: 'Status is required.' },
          ];

          for (const field of requiredFields) {
            const input = document.getElementById(field.id);
            if (!input || input.value.trim() === '') {
              displayErrorMessage(field.errorId, field.message);
              return false;
            }
          }

          // Validate CKEditor fields
          const editor1Content = CKEDITOR.instances['editor1'].getData().trim();
          const editor2Content = CKEDITOR.instances['editor2'].getData().trim();

          if (editor1Content === '') {
            displayErrorMessage('longDescriptionError', 'Iternary is required.');
            return false;
          }

          if (editor2Content === '') {
            displayErrorMessage('applicationsError', 'Other details are required.');
            return false;
          }

          return true;
        }


        // Function to submit the form
        // Function to submit the form
        function submitForms() {
  if (!validateForm()) {
    return; // Stop if validation fails
  }

  const formData = new FormData();

  // Append all required fields
  formData.append('title', document.getElementById('exampleInputTitle').value);
  formData.append('url', document.getElementById('exampleInputURL').value);
  formData.append('duration', document.getElementById('duration').value);
  formData.append('numberOfPersons', document.getElementById('numberOfPersons').value);
  formData.append('totalCost', document.getElementById('totalCost').value);
  formData.append('highlights', document.getElementById('highlights').value);
  formData.append('metaTitle', document.getElementById('exampleInputMetaTitle').value);
  formData.append('metaDescription', document.getElementById('exampleInputMetaDescription').value);
  formData.append('additionalCode', document.getElementById('exampleInputAdditionalCode').value);
  formData.append('status', document.getElementById('exampleFormControlSelect2').value);

  // Append file uploads
  formData.append('mainImage', document.getElementById('mainImageUpload').files[0]);

  const galleryFiles = document.getElementById('galleryImagesUpload').files;
  for (let i = 0; i < galleryFiles.length; i++) {
    formData.append('galleryImages[]', galleryFiles[i]);
  }

  // Append CKEditor data
  formData.append('longDescription', CKEDITOR.instances['editor1'].getData());
  formData.append('applications', CKEDITOR.instances['editor2'].getData());

  // Append selected packages
  const selectedPackages = Array.from(document.querySelectorAll('.ui.label.transition.visible'))
    .map(label => label.getAttribute('data-value'))
    .join(',');
  formData.append('selectedPackages', selectedPackages);

  // Create services JSON
  let services = {
    'mealPlan': [],
    'transport': [],
    'hotel': [],
    'pickupDrop': [],
    'flights': [],
    'entryFees': [],
    'others': []
  };

  // Populate services object
  ['mealPlan', 'transport', 'hotel', 'pickupDrop', 'flights', 'entryFees', 'others'].forEach(serviceType => {
    document.querySelectorAll(`input[type="checkbox"][id^="${serviceType}"]:checked`).forEach(cb => {
      services[serviceType].push(cb.value);
    });
  });

  // Append services JSON to FormData
  formData.append('services', JSON.stringify(services));

  // Perform AJAX request
  const xhr = new XMLHttpRequest();
  xhr.open('POST', './codes/add-Package.php');
  xhr.onload = function () {
    if (xhr.status === 200) {
      const response = JSON.parse(xhr.responseText);
      if (response.success) {
        Swal.fire({
          text: 'Form submitted successfully!',
          icon: 'success',
          confirmButtonText: 'Ok, got it!'
        }).then(() => {
          // Redirect or reset form
        });
      } else {
        Swal.fire({
          text: 'Form submission failed: ' + response.message,
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