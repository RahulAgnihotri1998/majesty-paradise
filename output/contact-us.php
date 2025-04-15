<?php include('header.php') ?>

<?php include('nav.php') ?>

<style>
    /* Container styling */

    /* Progress Bar */
    .progress-bar {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        margin: 40px 0;
        padding: 15px 20px;
        user-select: none;
        background: linear-gradient(135deg, #ffffff, #f0f5ff);
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        max-width: 800px;
        margin-left: auto;
        margin-right: auto;
    }

    .progress-bar .step {
        display: flex;
        flex-direction: column;
        align-items: center;
        position: relative;
        width: 33.33%;
    }

    .progress-bar .step p {
        font-size: 16px;
        font-weight: 600;
        color: #666;
        margin: 0 0 10px 0;
        font-family: Arial, sans-serif;
        transition: color 0.3s ease;
    }

    .progress-bar .step .bullet {
        width: 80px;
        height: 80px;
        border: 2px solid #ddd;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
        background: #fff;
        position: relative;
        z-index: 1;
    }

    .progress-bar .step .bullet.active {
        border-color: rgb(243, 123, 12);
        background: rgb(243, 123, 12);
        box-shadow: 0 0 10px rgba(102, 126, 234, 0.5);
    }

    .progress-bar .step .bullet span {
        color: #999;
        font-weight: bold;
        font-size: 14px;
    }

    .progress-bar .step .bullet.active span {
        color: #fff;
    }

    .progress-bar .step:not(:last-child)::after {
        content: '';
        position: absolute;
        top: 72px;
        left: 50%;
        width: calc(100% - 30px);
        height: 2px;
        background: #ddd;
        z-index: 0;
    }

    .progress-bar .step:has(+ .step .bullet.active)::after {
        background: rgb(243, 123, 12);
    }

    .progress-bar .step:hover p {
        color: rgb(243, 123, 12);
    }

    /* Form Styling */
    .form {
        margin-top: 30px;
        padding: 50px 20px;

    }

    .form .page {
        display: none;
    }

    .form .page.active {
        display: block;
        animation: fadeIn 0.3s ease-in;
    }

    .form .page .title {
        font-size: 26px;
        font-weight: 700;
        margin-bottom: 25px;
        color: #fff;
        font-family: Arial, sans-serif;
    }

    .form .page .field {
        width: 100%;
        margin-bottom: 20px;
    }

    .form .page .field label {
        display: block;
        font-size: 14px;
        font-weight: 500;
        margin-bottom: 8px;
        color: #fff;
        font-family: Arial, sans-serif;
        text-align: left;
    }

    .form .page .field input,
    .form .page .field select,
    .form .page .field textarea {
        width: 100%;
        padding: 12px;
        border-radius: 8px;
        border: 1px solid #ddd;
        outline: none;
        font-size: 14px;
        background: #fafafa;
        transition: all 0.3s ease;
        box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.05);
    }

    .form .page .field input:focus,
    .form .page .field select:focus,
    .form .page .field textarea:focus {
        border-color: rgb(243, 123, 12);
        box-shadow: 0 0 5px rgba(102, 126, 234, 0.3);
        background: #fff;
    }

    .form .page .btns {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 15px;
        margin-top: 30px;
    }

    .form .page .btns button {
        padding: 12px 24px;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        font-size: 14px;
        font-weight: 500;
        transition: all 0.3s ease;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .form .page .btns .prev {
        background: #94a3b8;
        color: #fff;
    }

    .form .page .btns .next,
    .form .page .btns .submit {
        background: rgb(243, 123, 12);
        color: #fff;
    }

    .form .page .btns button:hover {
        opacity: 0.9;
        transform: translateY(-2px);
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
    }

    /* Alert Styling */
    .alert {
        padding: 12px;
        border-radius: 8px;
        margin-bottom: 15px;
        display: none;
        font-size: 14px;
        font-weight: 500;
    }

    .alert.error {
        background: #fee2e2;
        color: #dc2626;
        border: 1px solid #fecaca;
        display: block;
    }

    .alert.success {
        background: #dcfce7;
        color: #16a34a;
        border: 1px solid #bbf7d0;
        display: block;
    }

    /* Animation */
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(10px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Media Queries */
    @media (max-width: 480px) {
        .container {
            padding: 10px;
        }

        .progress-bar {
            padding: 10px;
            margin: 20px 0;
        }

        .progress-bar .step p {
            font-size: 14px;
        }

        .form .page .btns {
            flex-direction: column-reverse;
            gap: 10px;
        }

        .form .page .btns button {
            width: 100%;
            padding: 12px;
        }

        .form .page .title {
            font-size: 22px;
        }
    }

    .container1 {
        /* Parallax background with gradient overlay */
        background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),
            url('https://images.unsplash.com/photo-1595815771614-ade9d652a65d?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        /* Key for parallax effect */

        /* Full viewport height */
        width: 100%;
        position: relative;
    }

    /* Optional: Adding some foreground content to demonstrate scrolling */
    .content1 {
        height: 150vh;
        /* Extra height to enable scrolling */
        color: white;
        text-align: center;
        padding-top: 20vh;
        font-family: Arial, sans-serif;
    }
    .bg-title {
            background-color: #f5e0c3 !important;
        }
        @media (max-width: 767px) {
    .header-layout1 .logo-bg {
       
        height: 99px;
    }
}
</style>
<div bis_skin_checked="1" class="breadcumb-wrapper background-image" style='background-image: url("assets/img/bg/breadcumb-bg.jpg");'>
<div bis_skin_checked="1" class="container">
<div bis_skin_checked="1" class="breadcumb-content">
<h1 class="breadcumb-title">Contact Us</h1>
<ul class="breadcumb-menu">
<li><a bis_skin_checked="1" href="home-travel.html">Home</a></li>
<li>Contact Us</li>
</ul>
</div>
</div>
</div>
<div class="space">
<div class="container">
<div class="title-area text-center"><span class="sub-title">Get In Touch</span>
<h2 class="sec-title">Our Contact Information</h2>
</div>
<div class="row gy-4 justify-content-center">
<div class="col-xl-4 col-lg-6">
<div class="about-contact-grid style2">
<div class="about-contact-icon"><img alt="" src="assets/img/icon/location-dot2.svg"/></div>
<div class="about-contact-details">
<h6 class="box-title">Our Address</h6>
<p class="about-contact-details-text">Karanagar,Srinagar</p>
<p class="about-contact-details-text">Near National School,190010</p>
</div>
</div>
</div>
<div class="col-xl-4 col-lg-6">
<div class="about-contact-grid">
<div class="about-contact-icon"><img alt="" src="assets/img/icon/call.svg"/></div>
<div class="about-contact-details">
<h6 class="box-title">Phone Number</h6>
<p class="about-contact-details-text"><a href="tel:01234567890">+91 9103618159</a></p>
<p class="about-contact-details-text"><a href="https://wa.me/9103618159">+91 9103618159</a></p>
</div>
</div>
</div>
<div class="col-xl-4 col-lg-6">
<div class="about-contact-grid">
<div class="about-contact-icon"><img alt="" src="assets/img/icon/mail.svg"/></div>
<div class="about-contact-details">
<h6 class="box-title">Email Address</h6>
<p class="about-contact-details-text"><a href="mailto:support@majestyparadise.com">support@majestyparadise.com</a></p>
<p class="about-contact-details-text"><a href="majestyparadise01@gmail.com">majestyparadise01@gmail.com</a></p>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="container1">
<div class="container">
<div class="content1">
<div class="progress-bar">
<div class="step">
<p>Step 1</p>
<div class="bullet active">
<img alt="guest-male--v3" height="94" src="optimized_images\guest-male-v3.webp" width="94">
</img></div>
</div>
<div class="step">
<p>Step 2</p>
<div class="bullet">
<img alt="family--v2" height="80" src="optimized_images\family-v2.webp" width="80">
</img></div>
</div>
<div class="step">
<p>Step 3</p>
<div class="bullet">
<img alt="airport" height="100" src="optimized_images\airport.webp" width="100">
</img></div>
</div>
</div>
<div class="form" id="enquiryForm">
<!-- Step 1: Personal Information -->
<div class="page active" id="page1">
<div class="title">Personal Information</div>
<div class="alert" id="alert1"></div>
<div class="row">
<div class="col-md-6">
<div class="field">
<label>First Name</label>
<input name="first_name" placeholder="Enter your first name" required="" type="text"/>
</div>
</div>
<div class="col-md-6">
<div class="field">
<label>Last Name</label>
<input name="last_name" placeholder="Enter your last name" required="" type="text"/>
</div>
</div>
<div class="col-md-6">
<div class="field">
<label>Your Email</label>
<input name="email" placeholder="Enter your email" required="" type="email"/>
</div>
</div>
<div class="col-md-6">
<div class="field">
<label>Mobile Number</label>
<input name="mobile" placeholder="Enter your mobile number" required="" type="tel"/>
</div>
</div>
<div class="col-md-6">
<div class="field">
<label>Alternate Mobile Number</label>
<input name="alternate_mobile" placeholder="Enter alternate mobile number" type="tel"/>
</div>
</div>
<div class="col-md-6">
<div class="field">
<label>Package Name</label>
<select name="package_name" required="">
<option value="">Select package</option>
                            <?php
                            include('./admin/codes/db.php'); // Include database connection

                            // Fetch all active packages
                            $packagesQuery = $db->query("SELECT title, url FROM products WHERE status = 'active'");
                            $packages = [];
                            if ($packagesQuery->num_rows > 0) {
                                while ($row = $packagesQuery->fetch_assoc()) {
                                    $packages[] = $row;
                                }
                            }

                            // Get the URL parameter from the query string
                            $selectedUrl = isset($_GET['url']) ? $_GET['url'] : null;

                            // Populate dropdown with packages
                            foreach ($packages as $package) {
                                $selected = ($selectedUrl === $package['url']) ? 'selected' : '';
                                echo '<option value="' . htmlspecialchars($package['url']) . '" ' . $selected . '>' 
                                     . htmlspecialchars($package['title']) . '</option>';
                            }
                            ?>
                        </select>
</div>
</div>
</div>
<div class="btns">
<button class="next" id="next1">Next</button>
</div>
</div>
<!-- Step 2: Travel Party Details -->
<div class="page" id="page2">
<div class="title">Travel Party Details</div>
<div class="alert" id="alert2"></div>
<div class="row">
<div class="col-md-6">
<div class="field">
<label>Total Person(s)</label>
<input min="1" name="total_persons" placeholder="Total number of travelers" required="" type="number"/>
</div>
</div>
<div class="col-md-6">
<div class="field">
<label>Adult(s) - Male</label>
<input min="0" name="adult_male" placeholder="Number of male adults" required="" type="number"/>
</div>
</div>
<div class="col-md-6">
<div class="field">
<label>Adult(s) - Female</label>
<input min="0" name="adult_female" placeholder="Number of female adults" required="" type="number"/>
</div>
</div>
<div class="col-md-6">
<div class="field">
<label>Children(s) - Male</label>
<input min="0" name="children_male" placeholder="Number of male children" required="" type="number"/>
</div>
</div>
<div class="col-md-6">
<div class="field">
<label>Children(s) - Female</label>
<input min="0" name="children_female" placeholder="Number of female children" required="" type="number"/>
</div>
</div>
</div>
<div class="btns">
<button class="prev" id="prev1">Previous</button>
<button class="next" id="next2">Next</button>
</div>
</div>
<!-- Step 3: Travel Details -->
<div class="page" id="page3">
<div class="title">Travel Details</div>
<div class="alert" id="alert3"></div>
<div class="row">
<div class="col-md-6">
<div class="field">
<label>Approx. Date of Traveling</label>
<input name="travel_date" required="" type="date"/>
</div>
</div>
<div class="col-md-6">
<div class="field">
<label>No. of Days</label>
<input min="1" name="num_days" placeholder="Number of days" required="" type="number"/>
</div>
</div>
<div class="col-md-6">
<div class="field">
<label>Your Message</label>
<textarea name="message" placeholder="Enter your message or special requirements"></textarea>
</div>
</div>
<div class="col-md-6">
<div class="field">
<label>Travel Ticket Booked?</label>
<select name="ticket_booked" required="">
<option value="">Select option</option>
<option value="yes">Yes</option>
<option value="no">No</option>
</select>
</div>
</div>
<div class="col-md-6">
<div class="field">
<label>Customize Package?</label>
<select name="customize_package" required="">
<option value="">Select option</option>
<option value="yes">Yes</option>
<option value="no">No</option>
</select>
</div>
</div>
</div>
<div class="btns">
<button class="prev" id="prev2">Previous</button>
<button class="submit" id="submitForm">Submit</button>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="contact-map style2"> <iframe allowfullscreen="" height="450" loading="lazy" referrerpolicy="no-referrer-when-downgrade" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d13217.834398511986!2d74.78194785879904!3d34.083390392155636!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x38e18ff7f5539477%3A0xeec97d2207bed740!2sSrinagar%20190010!5e0!3m2!1sen!2sin!4v1723567059056!5m2!1sen!2sin" style="border:0;" width="600"></iframe> </div>
<script>
   document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("pujaBookingForm").addEventListener("submit", function (event) {
        event.preventDefault();
        let isValid = true;
        
        // Clear previous error messages
        document.querySelectorAll(".error-message").forEach(el => el.remove());
        
        // Validate Name
        let nameField = document.getElementById("name");
        if (nameField.value.trim() === "") {
            showError(nameField, "Please enter your name.");
            isValid = false;
        }
        
        // Validate Email
        let emailField = document.getElementById("email");
        if (emailField.value.trim() === "" || !validateEmail(emailField.value)) {
            showError(emailField, "Please enter a valid email address.");
            isValid = false;
        }
        
        // Validate Phone
        let phoneField = document.getElementById("phone");
        if (phoneField.value.trim() === "" || !validatePhone(phoneField.value)) {
            showError(phoneField, "Please enter a valid 10-digit phone number.");
            isValid = false;
        }
        
        // Validate Puja Type
        let pujaTypeField = document.getElementById("pujaType");
        if (pujaTypeField.value.trim() === "") {
            showError(pujaTypeField, "Please select a puja type.");
            isValid = false;
        }
        
        // Validate Date
        let dateField = document.getElementById("date");
        if (dateField.value.trim() === "") {
            showError(dateField, "Please select a date.");
            isValid = false;
        }
        
        if (isValid) {
            this.submit();
        }
    });
    
    function showError(inputElement, message) {
        let errorDiv = document.createElement("div");
        errorDiv.className = "error-message";
        errorDiv.style.color = "red";
        errorDiv.style.fontSize = "0.9em";
        errorDiv.innerText = message;
        
        inputElement.parentNode.appendChild(errorDiv);
    }
    
    function validateEmail(email) {
        let re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return re.test(email);
    }
    
    function validatePhone(phone) {
        let re = /^\d{10}$/;
        return re.test(phone);
    }
});

</script>
<?php include('footer.php') ?>