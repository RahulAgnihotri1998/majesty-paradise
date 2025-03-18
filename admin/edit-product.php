<?php
session_start();


include('inc/header.php') ?>




<div class="container-scroller">
    <style>
        select.form-control,
        select.asColorPicker-input,
        .dataTables_wrapper select,
        .jsgrid .jsgrid-table .jsgrid-filter-row select,
        .select2-container--default select.select2-selection--single,
        .select2-container--default .select2-selection--single select.select2-search__field,
        select.typeahead,
        select.tt-query,
        select.tt-hint {
            padding: .4375rem .75rem;
            border: 0;
            outline: 1px solid #CED4DA;
            color: #1b0000;
        }
        .cke_notification_warning{
display: none !important;
        }
    </style>
    <?php include('inc/nav.php') ?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_settings-panel.html -->
        <?php include('sidebar.php') ?>
        <!-- partial -->
        <!-- partial:partials/_sidebar.html -->
    
        <?php
        // Assuming you have already established a database connection
        include('./codes/db.php');
        // Check if the product ID is provided in the URL
        if (isset($_GET['id'])) {
            // Sanitize the input to prevent SQL injection
            $productId = $db->real_escape_string($_GET['id']);

            // SQL query to select product details by ID
            $sql = "SELECT * FROM products WHERE id = '$productId'";

            // Execute the query
            $result = $db->query($sql);

            // Check if the query was successful
            if ($result->num_rows > 0) {
                // Fetch product details
                $row = $result->fetch_assoc();
                $title = $row['title']; // Use 'title' instead of 'tour_title'
                $id = $row['id'];
                $url = $row['url'];
                $duration = $row['duration'];
                $numberOfPersons = $row['number_of_persons'];
                $totalCost = $row['total_cost'];
                $highlights = $row['highlights'];
                $selectedServices = $row['services']; // Use 'services' instead of 'included_services'
                $metaTitle = $row['meta_title'];
                $metaDescription = $row['meta_description'];
                $additionalCode = $row['additional_code'];
                $mainImage = $row['main_image'];
                $status = $row['status'];
                $longDescription = $row['long_description'];
                $applications = $row['applications'];
                $selectedBrandId = $row['brand_id'];


                ?>
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
                                            <label for="exampleInputTitle">Package Title</label>
                                            <input type="text" class="form-control" oninput="generateUrlAndMetaTitle()"
                                                id="exampleInputTitle" placeholder="Title " value="<?php echo $title; ?>">
                                            <input type="hidden" name="id" id="product_id" value="<?php echo $id; ?>">
                                            <div id="titleError" class="error-message"></div> <!-- Error div -->
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputURL">URL</label>
                                            <input type="text" class="form-control" id="exampleInputURL" placeholder="URL"
                                                value="<?php echo $url; ?>">
                                            <div id="urlError" class="error-message"></div> <!-- Error div -->
                                        </div>
                                        <!-- Other form fields for Add Product Form -->
                                        <div class="form-group">
                                            <label for="exampleInputMetaTitle">Meta Title</label>
                                            <input type="text" class="form-control" id="exampleInputMetaTitle"
                                                placeholder="Meta Title" value="<?php echo $metaTitle; ?>">
                                            <div id="metaTitleError" class="error-message"></div> <!-- Error div -->
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputMetaDescription">Meta Description</label>
                                            <input type="text" class="form-control" id="exampleInputMetaDescription"
                                                placeholder="Meta Description" value="<?php echo $metaDescription; ?>">
                                            <div id="metaDescriptionError" class="error-message"></div> <!-- Error div -->
                                        </div>
                                        <?php
                                     
                                       // Assuming $selectedServices is your JSON string from the database
                                       echo $selectedServices; // Debugging purpose, remove later
                                       $selectedServices = json_decode($selectedServices, true);
                                       
                                       // Ensure $selectedServices is an array with the correct structure
                                       if (!is_array($selectedServices)) {
                                           $selectedServices = [];
                                       }
                                       
                                       // Initialize the structure if it's not there
                                       $selectedServices = array_merge([
                                           'mealPlan' => [],
                                           'transport' => [],
                                           'hotel' => [],
                                           'pickupDrop' => [],
                                           'flights' => [],
                                           'entryFees' => [],
                                           'others' => []
                                       ], $selectedServices);
                                       
                                       ?>
                                        <!-- Meal Plan -->
                                        <!-- Services (Custom Input) -->
                                        <div class="form-group">
                                            <label>Services</label>
                                            <textarea class="form-control mt-2" id="customIncludedServices" name="custom_services"
                                                placeholder="Add Other Inclusions"><?php echo isset($customServices) ? htmlspecialchars($customServices) : ''; ?></textarea>
                                        </div>

                                            <!-- Meal Plan -->
                                            <!-- Meal Plan -->
                                        <div class="form-group">
                                            <label>Meal Plan</label>
                                            <?php foreach (['Breakfast', 'Lunch', 'Dinner', 'All Meals'] as $meal): ?>
                                            <div>
                                                <input type="checkbox" id="mealPlan<?php echo ucfirst($meal); ?>" name="services[mealPlan][]" value="<?php echo $meal; ?>"
                                                    <?php echo in_array($meal, $selectedServices['mealPlan']) ? 'checked' : ''; ?>>
                                                <label for="mealPlan<?php echo ucfirst($meal); ?>"><?php echo $meal; ?></label>
                                            </div>
                                            <?php endforeach; ?>
                                        </div>

                                            <!-- Transport -->
                                           <!-- Transport -->
                            <div class="form-group">
                                <label>Transport</label>
                                <?php foreach (['(SEDEN) NON A/C', 'Government Taxes/VAT/ Service Charges', 'Cab for sightseeing', 'Sightseeing'] as $transport): ?>
                                <div>
                                    <input type="checkbox" id="transport<?php echo str_replace(' ', '', $transport); ?>" name="services[transport][]" value="<?php echo $transport; ?>"
                                        <?php echo in_array($transport, $selectedServices['transport']) ? 'checked' : ''; ?>>
                                    <label for="transport<?php echo str_replace(' ', '', $transport); ?>"><?php echo $transport; ?></label>
                                </div>
                                <?php endforeach; ?>
                            </div>

                                            <!-- Hotel -->
                                            <div class="form-group">
    <label>Hotel</label>
    <?php foreach (['One room', '3 Star hotel'] as $hotel): ?>
    <div>
        <input type="checkbox" id="hotel<?php echo str_replace(' ', '', $hotel); ?>" name="services[hotel][]" value="<?php echo $hotel; ?>"
            <?php echo in_array($hotel, $selectedServices['hotel']) ? 'checked' : ''; ?>>
        <label for="hotel<?php echo str_replace(' ', '', $hotel); ?>"><?php echo $hotel; ?></label>
    </div>
    <?php endforeach; ?>
</div>
                                            <!-- Others -->
                                        <!-- Others -->
<div class="form-group">
    <label>Others</label>
    <?php foreach (['Assistance on arrival', 'Welcome drink on arrival at hotel', 'Other non A/C cars', 'Other inclusions'] as $other): ?>
    <div>
        <input type="checkbox" id="others<?php echo str_replace(' ', '', $other); ?>" name="services[others][]" value="<?php echo $other; ?>"
            <?php echo in_array($other, $selectedServices['others']) ? 'checked' : ''; ?>>
        <label for="others<?php echo str_replace(' ', '', $other); ?>"><?php echo $other; ?></label>
    </div>
    <?php endforeach; ?>
</div>

                                        <div class="form-group">
                                            <label for="exampleInputAdditionalCode">Additional Code</label>
                                            <textarea class="form-control" id="exampleInputAdditionalCode"
                                                placeholder="Additional Code"><?php echo $additionalCode; ?></textarea>
                                            <div id="additionalCodeError" class="error-message"></div> <!-- Error div -->
                                        </div>
                                        <div class="form-group">
                                            <label for="duration">Duration (Days/Nights)</label>
                                            <input type="text" class="form-control" id="duration" placeholder="Duration"
                                                value="<?php echo $duration; ?>">
                                            <div id="durationError" class="error-message"></div>
                                        </div>
                                        <div class="form-group">
                                            <label for="numberOfPersons">Number of Persons</label>
                                            <input type="number" class="form-control" id="numberOfPersons"
                                                placeholder="Number of Persons" value="<?php echo $numberOfPersons; ?>">
                                            <div id="numberOfPersonsError" class="error-message"></div>
                                        </div>
                                        <div class="form-group">
                                            <label for="totalCost">Total Cost</label>
                                            <input type="number" class="form-control" id="totalCost" placeholder="Total Cost"
                                                value="<?php echo $totalCost; ?>">
                                            <div id="totalCostError" class="error-message"></div>
                                        </div>
                                        <div class="form-group">
                                            <label for="highlights">Highlights</label>
                                            <textarea class="form-control" id="highlights"
                                                placeholder="Highlights"><?php echo $highlights; ?></textarea>
                                            <div id="highlightsError" class="error-message"></div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                          
                            
                            <style>
                                .gallery-image-container {
                                    display: inline-block;
                                    position: relative;
                                    margin-right: 10px;
                                }

                                .gallery-image {
                                    width: 100px;
                                    height: 100px;
                                    object-fit: cover;
                                }

                                .delete-button {
                                    position: absolute;
                                    top: 5px;
                                    right: 5px;
                                    background-color: red;
                                    color: white;
                                    border: none;
                                    border-radius: 50%;
                                    width: 20px;
                                    height: 20px;
                                    cursor: pointer;
                                    font-size: 12px;
                                    line-height: 1;
                                }

                                .gallery-image-container {
                                    display: flex !important;
                                    flex-direction: row !important;
                                    flex-wrap: wrap !important;
                                }
                            </style>
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
                                            <input type="file" name="img[]" class="file-upload-default" id="mainImageUpload"
                                                accept=".png, .jpg, .jpeg, .webp">
                                            <div class="input-group col-xs-12">
                                                <input type="text" class="form-control file-upload-info"
                                                    value="<?php echo $mainImage; ?>" disabled placeholder="Upload Image">
                                                <span class="input-group-append">
                                                    <button class="file-upload-browse btn btn-primary"
                                                        id="mainImageUploadButton" type="button">Upload</button>
                                                </span>
                                            </div>
                                            <img id="mainImagePreview" src="#" alt="Main Product Image Preview"
                                                style="display: none; max-width: 100px; height: 100px;">
                                            <div id="mainImageError" class="error-message"></div> <!-- Error div -->
                                        </div>
                                        <div class="gallery-image-container">
                                            <?php
                                            // Assuming you have already established a database connection
                                    
                                            // Check if the product ID is set
                                            if (isset($_GET['id'])) {
                                                // Sanitize the product ID to prevent SQL injection
                                                $productId = $db->real_escape_string($_GET['id']);

                                                // SQL query to select gallery images for the given product ID
                                                $sql = "SELECT id, image_url FROM gallery_images WHERE product_id = '$productId'";

                                                // Execute the query
                                                $result = $db->query($sql);

                                                // Check if the query was successful
                                                if ($result) {
                                                    // Initialize an empty array to store gallery image URLs
                                                    $galleryImages = [];

                                                    // Fetch gallery images and store them in the array
                                                    while ($row = $result->fetch_assoc()) {
                                                        $imageId = $row['id'];
                                                        $imagePath = "./codes/" . $row['image_url'];
                                                        // Append HTML for each image along with the checkbox
                                                        echo '<div class="gallery-image-container" id="gallery-image-container">';
                                                        echo '<div class="gallery-image">';
                                                        echo '<input type="checkbox" name="selectedImages[]" value="' . $imageId . '" class="image-checkbox">';
                                                        echo '<img src="' . $imagePath . '" alt="Gallery Image" style="height: 100px; width: 100px;">';
                                                        echo '</div>';
                                                        echo '</div>';
                                                    }
                                                    // Add a delete button after all images
                                                    echo '<button class="btn btn-primary mr-2 mb-4" style="
                                                                    margin-top: 39px;
                                                                
                                                                " id="deleteImagesButton">Delete Selected Images</button>';
                                                } else {
                                                    // Handle query error
                                                    echo "Error executing SQL query: " . $db->error;
                                                }
                                            } else {
                                                // Handle missing product ID
                                                echo "Product ID is missing.";
                                            }
                                            ?>
                                        </div>
                                        <div class="form-group">
                                            <!-- Additional image upload section -->
                                            <div class="additional-images-upload">
                                                <label for="additionalImagesUpload">Upload Additional Images</label>
                                                <input type="file" class="form-control file-upload-info "
                                                    name="additionalImages[]" id="additionalImagesUpload"
                                                    accept=".png, .jpg, .jpeg, .webp" multiple>
                                                <div id="additionalImagesPreview" style="display: flex; flex-wrap: wrap;"></div>
                                            </div>
                                        </div>

                                        <script>
                                            // Function to handle additional image upload and preview
                                            document.getElementById('additionalImagesUpload').addEventListener('change', function () {
                                                var previewContainer = document.getElementById('additionalImagesPreview');
                                                previewContainer.innerHTML = ''; // Clear previous previews

                                                var files = this.files;
                                                for (var i = 0; i < files.length; i++) {
                                                    var file = files[i];
                                                    var reader = new FileReader();
                                                    reader.onload = function (event) {
                                                        var imgElement = document.createElement('img');
                                                        imgElement.src = event.target.result;
                                                        imgElement.alt = 'Uploaded Image';
                                                        imgElement.style.height = '100px';
                                                        imgElement.style.width = '100px';
                                                        imgElement.style.marginRight = '10px';

                                                        var removeButton = document.createElement('button');
                                                        removeButton.textContent = 'Remove';
                                                        removeButton.addEventListener('click', function () {
                                                            this.parentNode.remove(); // Remove the image preview when the remove button is clicked
                                                        });

                                                        var previewDiv = document.createElement('div');
                                                        previewDiv.appendChild(imgElement);
                                                        previewDiv.appendChild(removeButton);
                                                        previewContainer.appendChild(previewDiv);
                                                    };
                                                    reader.readAsDataURL(file);
                                                }
                                            });
                                        </script>








                                        <?php
                                        include('./codes/db.php');

                                        // Assuming $selectedBrandId is fetched from the database or from any other source
                                

                                        // Fetch brand data from the database
                                        $sql = "SELECT id, name FROM brand"; // Adjust table name if necessary
                                        $result = $db->query($sql);

                                        // Initialize an empty array to store brand data
                                        $brands = array();

                                        // Check if there are any results
                                        if ($result->num_rows > 0) {
                                            // Loop through each row and store brand data in the $brands array
                                            while ($row = $result->fetch_assoc()) {
                                                $brands[] = $row;
                                            }
                                        }
                                        ?>

                                        <!-- Select Brand -->
                                        <!-- Error div for Select Brand -->
                                        <div class="form-group">
                                            <label for="brandSelect">Select Brand</label>
                                            <select class="form-control form-control-lg" id="brandSelect" name="brand_id">
                                                <option value="">Select Brand</option>
                                                <?php
                                                // Assuming $brands is an array containing brand data fetched from the database
                                                foreach ($brands as $brand) {
                                                    // Check if the current brand ID matches the selected brand ID
                                                    $isSelected = ($brand['id'] == $selectedBrandId) ? 'selected' : '';
                                                    echo "<option value='{$brand['id']}' $isSelected>{$brand['name']}</option>";
                                                }
                                                ?>
                                            </select>
                                            <div id="brandError" class="error-message"></div> <!-- Error div -->
                                        </div>

                                        <script>
                                            document.addEventListener('DOMContentLoaded', function () {
                                                // Set the selected option based on the currently selected brand ID
                                                var selectedBrandId = "<?php echo $selectedBrandId; ?>";
                                                if (selectedBrandId) {
                                                    $('#brandSelect').val(selectedBrandId);
                                                }
                                            });
                                        </script>

                                        <style>
                                            /* Style for the container */


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
                                            <textarea class="form-control" id="editor1"
                                                placeholder="Long Description"><?php echo isset($longDescription) ? $longDescription : ''; ?></textarea>
                                            <div id="longDescriptionError" class="error-message"></div> <!-- Error div -->
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputApplications">Applications</label>
                                            <textarea class="form-control" id="editor2"
                                                placeholder="Applications"><?php echo isset($applications) ? $applications : ''; ?></textarea>
                                            <div id="applicationsError" class="error-message"></div> <!-- Error div -->
                                        </div>
                                        <div class="text-center">
                                            <button type="button" class="btn btn-primary mr-2 mb-4"
                                                onclick="submitForms()">Save</button>
                                            <button class="btn btn-light mb-4">Cancel</button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </form>

                    </div>
                    <?php
            } else {
                echo "Product not found.";
            }
        } else {
            echo "Product ID not provided.";
        }
        ?>

<script src="https://cdn.ckeditor.com/4.7.3/full/ckeditor.js"></script>
<script>
    // Initialize CKEditor for both editors
    CKEDITOR.replace('editor1');
    CKEDITOR.replace('editor2');

    // URL and meta title generation
    function generateUrlAndMetaTitle() {
        const titleInput = document.getElementById("exampleInputTitle");
        const urlInput = document.getElementById("exampleInputURL");
        
        if (!titleInput || !urlInput) return;

        let title = titleInput.value.trim();
        urlInput.value = title
            .toLowerCase()
            .replace(/[^a-z0-9\s-]/g, '') // Remove non-alphanumeric except space and hyphen
            .replace(/\s+/g, '-')         // Replace spaces with hyphens
            .replace(/-+/g, '-')           // Replace multiple hyphens with one
            .replace(/^-+|-+$/g, '');     // Remove hyphens at start/end
    }

    // URL sanitization (this function seems unused in the form, but kept for completeness)
    function convertToUrl() {
        const urlInput = document.getElementById("exampleInputURL");
        if (!urlInput) return;

        let url = urlInput.value
            .replace(/^[ -]+|[ -]+$/g, '') // Trim leading/trailing spaces and hyphens
            .replace(/[ -]+/g, '-')         // Replace spaces or multiple hyphens with single hyphen
            .replace(/_/g, '-')             // Replace underscores with hyphens
            .toLowerCase()
            .replace(/[^a-z0-9-]/g, '')     // Keep only alphanumeric characters and hyphens
            .replace(/-+/g, '-');           // Again, replace multiple hyphens with one

        urlInput.value = url;
    }

    // Image upload button event listener
    const fileInput = document.getElementById('mainImageUpload');
    const fileUploadButton = document.getElementById('mainImageUploadButton');
    if (fileUploadButton && fileInput) {
        fileUploadButton.addEventListener('click', () => fileInput.click());
    }

    // Form validation
    function validateForm() {
        console.log("Validating form...");
        resetErrorMessages();
        const fields = [
            { id: 'exampleInputTitle', errorId: 'titleError', message: 'Title is required.' },
            { id: 'exampleInputURL', errorId: 'urlError', message: 'URL is required.' },
            { id: 'exampleInputMetaTitle', errorId: 'metaTitleError', message: 'Meta Title is required.' },
            { id: 'exampleInputMetaDescription', errorId: 'metaDescriptionError', message: 'Meta Description is required.' },
            { id: 'exampleInputAdditionalCode', errorId: 'additionalCodeError', message: 'Additional Code is required.' },
            { id: 'duration', errorId: 'durationError', message: 'Duration is required.' },
            { id: 'numberOfPersons', errorId: 'numberOfPersonsError', message: 'Number of Persons is required.' },
            { id: 'totalCost', errorId: 'totalCostError', message: 'Total Cost is required.' },
            { id: 'highlights', errorId: 'highlightsError', message: 'Highlights are required.' },
            { id: 'mainImageUpload', errorId: 'mainImageError', message: 'Main Product Image is required.', 
              checkFiles: true, existingImageName: document.querySelector('.file-upload-info').value },
            { id: 'brandSelect', errorId: 'brandError', message: 'Brand selection is required.' },
            { id: 'exampleFormControlSelect2', errorId: 'statusError', message: 'Status selection is required.' },
        ];

        for (const field of fields) {
            const input = document.getElementById(field.id);
            if (field.id === 'mainImageUpload') {
                if (input.files.length === 0 && !field.existingImageName) {
                    console.log(`Validation failed for field: ${field.id}`);
                    displayErrorMessage(field.errorId, field.message);
                    return false;
                }
            } else if (!input || (field.checkFiles ? input.files.length === 0 : input.value.trim() === '')) {
                console.log(`Validation failed for field: ${field.id}`);
                displayErrorMessage(field.errorId, field.message);
                return false;
            }
        }

        const editors = ['editor1', 'editor2'];
        for (const editorId of editors) {
            const content = CKEDITOR.instances[editorId].getData().trim();
            if (content === '') {
                console.log(`Validation failed for editor: ${editorId}`);
                displayErrorMessage(`${editorId === 'editor1' ? 'longDescription' : 'applications'}Error`, `${editorId === 'editor1' ? 'Long Description' : 'Applications'} are required.`);
                return false;
            }
        }

        console.log("Form validation passed.");
        return true;
    }

    // Error message handling
    function displayErrorMessage(id, message) {
        const errorDiv = document.getElementById(id);
        if (errorDiv) errorDiv.innerText = message;
    }

    function resetErrorMessages() {
        document.querySelectorAll('.error-message').forEach(div => div.innerText = '');
    }

    // Form submission
    function submitForms() {
        console.log("submitForms function called");
        if (!validateForm()) return;

        let formData = new FormData();
        ['exampleInputTitle', 'product_id', 'exampleInputURL', 'exampleInputMetaTitle', 'exampleInputMetaDescription', 'exampleInputAdditionalCode', 'duration', 'numberOfPersons', 'totalCost', 'highlights', 'brandSelect', 'exampleFormControlSelect2'].forEach(id => {
            formData.append(id === 'brandSelect' ? 'brandId' : id, document.getElementById(id).value);
        });

        // Services
        const services = {
            'mealPlan': [],
            'transport': [],
            'hotel': [],
            'pickupDrop': [],
            'flights': [],
            'entryFees': [],
            'others': []
        };
        Object.keys(services).forEach(category => {
            document.querySelectorAll(`input[name="services[${category}][]"]:checked`).forEach(cb => {
                services[category].push(cb.value);
            });
        });
        formData.append('services', JSON.stringify(services));

        const mainImage = document.getElementById('mainImageUpload').files[0];
        if (mainImage) {
            formData.append('mainImage', mainImage);
        } else {
            const existingImageName = document.querySelector('.file-upload-info').value;
            formData.append('mainImageName', existingImageName);
        }

        const additionalImages = document.getElementById('additionalImagesUpload').files;
        Array.from(additionalImages).forEach(file => formData.append('galleryImages[]', file));

        ['editor1', 'editor2'].forEach((editorId, index) => {
            formData.append(index === 0 ? 'longDescription' : 'applications', CKEDITOR.instances[editorId].getData());
        });

        const xhr = new XMLHttpRequest();
        xhr.open('POST', './codes/edit-product.php');
        xhr.onload = function() {
            const response = JSON.parse(this.responseText);
            const swalOptions = {
                text: response.success ? 'Form submitted successfully!' : `Form submission failed: ${response.message}`,
                icon: response.success ? 'success' : 'error',
                confirmButtonText: 'Ok, got it!'
            };
            Swal.fire(swalOptions).then(() => {
                if (response.success) {
                    // Redirect or perform other actions here
                }
            });
        };
        xhr.onerror = () => Swal.fire({ text: 'Request failed', icon: 'error', confirmButtonText: 'Ok, got it!' });
        xhr.send(formData);
    }

    // Image preview
    if (fileInput) {
        fileInput.addEventListener('change', function() {
            if (this.files[0]) {
                const reader = new FileReader();
                reader.onload = e => {
                    const imgPreview = document.getElementById('mainImagePreview');
                    if (imgPreview) {
                        imgPreview.src = e.target.result;
                        imgPreview.style.display = 'block';
                    }
                };
                reader.readAsDataURL(this.files[0]);
            }
        });
    }

    // Delete selected images
    document.addEventListener('DOMContentLoaded', () => {
        const deleteButton = document.getElementById('deleteImagesButton');
        if (deleteButton) {
            deleteButton.addEventListener('click', event => {
                event.preventDefault();
                const selectedImages = Array.from(document.querySelectorAll('.image-checkbox:checked'));
                const imageIds = selectedImages.map(checkbox => {
                    checkbox.closest('.gallery-image-container').remove();
                    return checkbox.value;
                });

                const xhr = new XMLHttpRequest();
                xhr.open('POST', 'codes/delete-images.php');
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xhr.onload = () => {
                    const response = JSON.parse(xhr.responseText);
                    Swal.fire({
                        text: response.success ? 'Images deleted successfully!' : `Failed to delete images: ${response.message}`,
                        icon: response.success ? 'success' : 'error',
                        confirmButtonText: 'Ok, got it!'
                    });
                };
                xhr.send(`selectedImageIds=${encodeURIComponent(imageIds.join(','))}`);
            });
        }
    });
</script>

            <?php include('inc/footer.php') ?>