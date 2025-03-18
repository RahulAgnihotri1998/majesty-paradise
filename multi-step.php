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
</style>
</style>

<body>
    <div class="breadcumb-wrapper background-image"
        style="background-image: url(&quot;assets/img/bg/breadcumb-bg.jpg&quot;);" bis_skin_checked="1">
        <div class="container" bis_skin_checked="1">
            <div class="breadcumb-content" bis_skin_checked="1">
                <h1 class="breadcumb-title">Contact Us</h1>
                <ul class="breadcumb-menu">
                    <li><a href="home-travel.html" bis_skin_checked="1">Home</a></li>
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
                        <div class="about-contact-icon"><img src="assets/img/icon/location-dot2.svg" alt=""></div>
                        <div class="about-contact-details">
                            <h6 class="box-title">Our Address</h6>
                            <p class="about-contact-details-text">2690 Hiltona Street Victoria</p>
                            <p class="about-contact-details-text">Road, New York, Canada</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6">
                    <div class="about-contact-grid">
                        <div class="about-contact-icon"><img src="assets/img/icon/call.svg" alt=""></div>
                        <div class="about-contact-details">
                            <h6 class="box-title">Phone Number</h6>
                            <p class="about-contact-details-text"><a href="tel:01234567890">+01 234 567 890</a></p>
                            <p class="about-contact-details-text"><a href="tel:01234567890">+09 876 543 210</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6">
                    <div class="about-contact-grid">
                        <div class="about-contact-icon"><img src="assets/img/icon/mail.svg" alt=""></div>
                        <div class="about-contact-details">
                            <h6 class="box-title">Email Address</h6>
                            <p class="about-contact-details-text"><a
                                    href="mailto:mailinfo00@tourm.com">mailinfo00@tourm.com</a></p>
                            <p class="about-contact-details-text"><a
                                    href="mailto:support24@tourm.com">support24@tourm.com</a></p>
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
            <p>Personal Info</p>
            <div class="bullet active">
              <img width="94" height="94" src="https://img.icons8.com/3d-fluency/94/guest-male--v3.png" alt="guest-male--v3" />
            </div>
          </div>
          <div class="step">
            <p>Travel Party</p>
            <div class="bullet">
              <img width="80" height="80" src="https://img.icons8.com/officel/80/family--v2.png" alt="family--v2" />
            </div>
          </div>
          <div class="step">
            <p>Travel Details</p>
            <div class="bullet">
              <img width="100" height="100" src="https://img.icons8.com/bubbles/100/airport.png" alt="airport" />
            </div>
          </div>
        </div>
        <div class="form">
          <!-- Step 1: Personal Information -->
          <div class="page active">
            <div class="title">Personal Information</div>
            <div class="alert"></div>
            <div class="row">
              <div class="col-md-6">
                <div class="field">
                  <label>First Name</label>
                  <input type="text" name="first_name" required placeholder="Enter your first name">
                </div>
              </div>
              <div class="col-md-6">
                <div class="field">
                  <label>Last Name</label>
                  <input type="text" name="last_name" required placeholder="Enter your last name">
                </div>
              </div>
              <div class="col-md-6">
                <div class="field">
                  <label>Your Email</label>
                  <input type="email" name="email" required placeholder="Enter your email">
                </div>
              </div>
              <div class="col-md-6">
                <div class="field">
                  <label>Mobile Number</label>
                  <input type="tel" name="mobile" required placeholder="Enter your mobile number">
                </div>
              </div>
              <div class="col-md-6">
                <div class="field">
                  <label>Alternate Mobile Number</label>
                  <input type="tel" name="alternate_mobile" placeholder="Enter alternate mobile number">
                </div>
              </div>
            </div>
            <div class="btns">
              <button class="next">Next</button>
            </div>
          </div>

          <!-- Step 2: Travel Party Details -->
          <div class="page">
            <div class="title">Travel Party Details</div>
            <div class="alert"></div>
            <div class="field">
              <label>Total Person(s)</label>
              <input type="number" name="total_persons" required min="1" placeholder="Total number of travelers">
            </div>
            <div class="field">
              <label>Adult(s) - Male</label>
              <input type="number" name="adult_male" required min="0" placeholder="Number of male adults">
            </div>
            <div class="field">
              <label>Adult(s) - Female</label>
              <input type="number" name="adult_female" required min="0" placeholder="Number of female adults">
            </div>
            <div class="field">
              <label>Children(s) - Male</label>
              <input type="number" name="children_male" required min="0" placeholder="Number of male children">
            </div>
            <div class="field">
              <label>Children(s) - Female</label>
              <input type="number" name="children_female" required min="0" placeholder="Number of female children">
            </div>
            <div class="btns">
              <button class="prev">Previous</button>
              <button class="next">Next</button>
            </div>
          </div>

          <!-- Step 3: Travel Details -->
          <div class="page">
            <div class="title">Travel Details</div>
            <div class="alert"></div>
            <div class="field">
              <label>Approx. Date of Traveling</label>
              <input type="date" name="travel_date" required>
            </div>
            <div class="field">
              <label>No. of Days</label>
              <input type="number" name="num_days" required min="1" placeholder="Number of days">
            </div>
            <div class="field">
              <label>Your Message</label>
              <textarea name="message" placeholder="Enter your message or special requirements"></textarea>
            </div>
            <div class="field">
              <label>Travel Ticket Booked?</label>
              <select name="ticket_booked" required>
                <option value="">Select option</option>
                <option value="yes">Yes</option>
                <option value="no">No</option>
              </select>
            </div>
            <div class="field">
              <label>Customize Package?</label>
              <select name="customize_package" required>
                <option value="">Select option</option>
                <option value="yes">Yes</option>
                <option value="no">No</option>
              </select>
            </div>
            <div class="btns">
              <button class="prev">Previous</button>
              <button class="submit">Submit</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


    <div class="contact-map style2"> <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d13217.834398511986!2d74.78194785879904!3d34.083390392155636!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x38e18ff7f5539477%3A0xeec97d2207bed740!2sSrinagar%20190010!5e0!3m2!1sen!2sin!4v1723567059056!5m2!1sen!2sin"
            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe> </div>
    <script>
        const pages = document.querySelectorAll('.page');
        const progressSteps = document.querySelectorAll('.step');

        let currentPage = 0;

        function showPage(pageIndex) {
            pages.forEach((page, index) => {
                page.classList.remove('active');
                if (index === pageIndex) {
                    page.classList.add('active');
                }
            });

            progressSteps.forEach((step, index) => {
                const bullet = step.querySelector('.bullet');
                if (index <= pageIndex) {
                    bullet.classList.add('active');
                } else {
                    bullet.classList.remove('active');
                }
            });
        }

        function validatePage(page) {
            const fields = page.querySelectorAll('[required]');
            const alert = page.querySelector('.alert');
            let isValid = true;

            fields.forEach(field => {
                if (!field.value.trim()) {
                    isValid = false;
                }
            });

            if (!isValid) {
                alert.textContent = 'Please fill in all required fields.';
                alert.className = 'alert error';
                return false;
            }

            if (alert) {
                alert.style.display = 'none';
            }
            return true;
        }

        document.querySelectorAll('.next').forEach(button => {
            button.addEventListener('click', () => {
                if (validatePage(pages[currentPage])) {
                    currentPage++;
                    showPage(currentPage);
                }
            });
        });

        document.querySelectorAll('.prev').forEach(button => {
            button.addEventListener('click', () => {
                currentPage--;
                showPage(currentPage);
            });
        });

        document.querySelector('.submit').addEventListener('click', () => {
            if (validatePage(pages[currentPage])) {
                const formData = new FormData(document.querySelector('.form'));
                const data = Object.fromEntries(formData);

                // Here you would typically send the data to your server
                console.log('Form submitted:', data);

                const alert = pages[currentPage].querySelector('.alert');
                alert.textContent = 'Form submitted successfully!';
                alert.className = 'alert success';

                // Disable all form inputs and buttons after submission
                document.querySelectorAll('input, select, textarea, button').forEach(element => {
                    element.disabled = true;
                });
            }
        });
    </script>
    <?php include('footer.php') ?>