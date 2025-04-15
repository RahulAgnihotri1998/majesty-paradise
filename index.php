<?php include_once('header.php'); ?>

<body>
    <?php include_once('nav.php'); ?>


    <style>
        .hero-style3 {
            padding: 85px 0 97px 0;
        }

        .hero3-swiper-custom {
            position: relative;
            right: 0;
            bottom: -186px;
            min-width: 424px;
            height: 110px;
            background-color: #00000033;
            z-index: 99;
        }

        .tour-tabs .th-btn:hover,
        .tour-tabs .th-btn.active {}

        .tour-tabs.style3 .th-btn {
            background: #f5e0c3;
            border: 1px solid #e1e4e6;
            border-radius: 48px;
            padding: 15px 24px;
            color: #000000;
        }

        .th-btn {
            background-color: #d24f16;
        }

        .th-btn:before {
            content: "";
            width: 0;
            height: 100%;
            border-radius: 30em;
            position: absolute;
            top: 0;
            left: -5%;
            background-color: #d24f16;
        }

        .th-btn.style3 {
            background-color: #d24f16;
        }

        .footer-layout2 .about-text {
            color: #000000;
            font-weight: 300;
            margin-bottom: 22px;
        }

        .footer-layout2 .footer-widget.widget_nav_menu a:not(:hover) {
            color: #000000;
        }

        .footer-layout2 .footer-widget .widget_title {
            color: #000000;
        }

        .footer-layout2 .info-box_text .icon {
            color: #000000;
            background-color: rgb(29 0 0 / 52%);
        }

        .info-box_text a {
            color: black;
        }

        .info-box_text p {
            color: black;
        }

        .bg-title {
            background-color: #f5e0c3 !important;
        }

        select,
        .form-control,
        .form-select,
        textarea,
        input {
            height: 56px;
            padding: 0 25px 0 25px;
            padding-right: 50px;
            border: 1px solid #000000;
            color: #000000;
            background-color: var(--white-color);
            font-size: 14px;
            width: 100%;
            font-family: var(--body-font);
            font-weight: 400;
            border-radius: 8px;
            -webkit-transition: 0.4sease-in-out;
            transition: 0.4sease-in-out;
        }

        .footer-layout2 .th-social a {
            --icon-size: 40px;
            background-color: rgba(255, 255, 255, 0.2);
            color: #000000;
            margin-right: 10px;
        }

        .accordion-card {

            background-color: #f5e0c3;

        }

        @media only screen and (max-width: 767px) {
            .hero3-swiper-custom {
                position: relative;
                right: 0;
                bottom: 0px;
                min-width: 335px;
                height: 110px;
                background-color: #d25118;
                z-index: 99;
            }

            .header-layout1 .sticky-wrapper .menu-area {
                padding: 4px 0;
            }

            .header-layout1 .logo-bg {
                width: 64%;
            }
        }

        .title-area .sub-title,
        .title-area .sec-title {
            transition: all 0.3s ease;

        }

        .title-area .sub-title:hover,
        .title-area .sec-title:hover {
            color: #FF5722;
            /* Choose your hover color */
            text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.3);
            transform: scale(1.02);
            /* Slight zoom effect */
        }
    </style>
    <div class="hero-3" id="hero">
        <div class="swiper hero-slider-3 swiper-fade swiper-initialized swiper-horizontal swiper-watch-progress swiper-backface-hidden"
            id="heroSlide3">
            <div aria-live="off" class="swiper-wrapper" id="swiper-wrapper-106672a4a3b4c9814"
                style="transition-duration: 0ms; transition-delay: 0ms;">
                <div aria-label="1 / 5" class="swiper-slide" data-swiper-slide-index="0" role="group"
                    style="width: 1519px; opacity: 1; transform: translate3d(0px, 0px, 0px); transition-duration: 0ms;">
                    <div class="hero-inner">
                        <div class="th-hero-bg background-image"
                            style='background-image: url("assets/img/destination/product-1.webp");'></div>
                        <div class="container">
                            <div class="hero-style3">
                                <h1 class="hero-title slideinleft" data-ani="slideinleft" data-ani-delay="0.2s"
                                    style="animation-delay: 0.2s;">discover The world with our guide</h1>
                                <p class="hero-text slideinleft" data-ani="slideinleft" data-ani-delay="0.4s"
                                    style="animation-delay: 0.4s;">magesty an international travel management company
                                    with
                                    25 years of experience, specializing in business and maritime travel.</p>
                                <div class="btn-group slideinup" data-ani="slideinup" data-ani-delay="0.6s"
                                    style="animation-delay: 0.6s;"><a class="th-btn style2 th-icon"
                                        href="about-us.php">Explore Tours</a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div aria-label="2 / 5" class="swiper-slide" data-swiper-slide-index="1" role="group"
                    style="width: 1519px; opacity: 1; transform: translate3d(-1519px, 0px, 0px); transition-duration: 0ms;">
                    <div class="hero-inner">
                        <div class="th-hero-bg background-image"
                            style='background-image: url("assets/img/destination/prodcut-2.webp");'></div>
                        <div class="container">
                            <div class="hero-style3">
                                <h1 class="hero-title slideinleft" data-ani="slideinleft" data-ani-delay="0.2s"
                                    style="animation-delay: 0.2s;">discover The world best destination</h1>
                                <p class="hero-text slideinleft" data-ani="slideinleft" data-ani-delay="0.4s"
                                    style="animation-delay: 0.4s;">magesty an international travel management company
                                    with
                                    25 years of experience, specializing in business and maritime travel.</p>
                                <div class="btn-group slideinup" data-ani="slideinup" data-ani-delay="0.6s"
                                    style="animation-delay: 0.6s;"><a class="th-btn style2 th-icon"
                                        href="about-us.php">Explore Tours</a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div aria-label="3 / 5" class="swiper-slide swiper-slide-prev" data-swiper-slide-index="2" role="group"
                    style="width: 1519px; opacity: 1; transform: translate3d(-3038px, 0px, 0px); transition-duration: 0ms;">
                    <div class="hero-inner">
                        <div class="th-hero-bg background-image"
                            style='background-image: url("assets/img/destination/product-1.webp");'></div>
                        <div class="container">
                            <div class="hero-style3">
                                <h1 class="hero-title slideinleft" data-ani="slideinleft" data-ani-delay="0.2s"
                                    style="animation-delay: 0.2s;">Capture Wonder Of The World</h1>
                                <p class="hero-text slideinleft" data-ani="slideinleft" data-ani-delay="0.4s"
                                    style="animation-delay: 0.4s;">magesty an international travel management company
                                    with
                                    25 years of experience, specializing in business and maritime travel.</p>
                                <div class="btn-group slideinup" data-ani="slideinup" data-ani-delay="0.6s"
                                    style="animation-delay: 0.6s;"><a class="th-btn style2 th-icon"
                                        href="about-us.php">Explore Tours</a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div aria-label="4 / 5" class="swiper-slide swiper-slide-visible swiper-slide-active"
                    data-swiper-slide-index="3" role="group"
                    style="width: 1519px; opacity: 1; transform: translate3d(-4557px, 0px, 0px); transition-duration: 0ms;">
                    <div class="hero-inner">
                        <div class="th-hero-bg background-image"
                            style='background-image: url("assets/img/destination/product-3.webp");'></div>
                        <div class="container">
                            <div class="hero-style3">
                                <h1 class="hero-title slideinleft" data-ani="slideinleft" data-ani-delay="0.2s"
                                    style="animation-delay: 0.2s;">Explore the world with magesty</h1>
                                <p class="hero-text slideinleft" data-ani="slideinleft" data-ani-delay="0.4s"
                                    style="animation-delay: 0.4s;">magesty an international travel management company
                                    with
                                    25 years of experience, specializing in business and maritime travel.</p>
                                <div class="btn-group slideinup" data-ani="slideinup" data-ani-delay="0.6s"
                                    style="animation-delay: 0.6s;"><a class="th-btn style2 th-icon"
                                        href="about-us.php">Explore Tours</a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div aria-label="5 / 5" class="swiper-slide swiper-slide-next" data-swiper-slide-index="4" role="group"
                    style="width: 1519px; opacity: 0; transform: translate3d(-6076px, 0px, 0px); transition-duration: 0ms;">
                    <div class="hero-inner">
                        <div class="th-hero-bg background-image"
                            style='background-image: url("assets/img/destination/product-3.webp");'></div>
                        <div class="container">
                            <div class="hero-style3">
                                <h1 class="hero-title slideinleft" data-ani="slideinleft" data-ani-delay="0.2s"
                                    style="animation-delay: 0.2s;">Travel experience with magesty</h1>
                                <p class="hero-text slideinleft" data-ani="slideinleft" data-ani-delay="0.4s"
                                    style="animation-delay: 0.4s;">magesty an international travel management company
                                    with
                                    25 years of experience, specializing in business and maritime travel.</p>
                                <div class="btn-group slideinup" data-ani="slideinup" data-ani-delay="0.6s"
                                    style="animation-delay: 0.6s;"><a class="th-btn style2 th-icon"
                                        href="about-us.php">Explore Tours</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><span aria-atomic="true" aria-live="assertive" class="swiper-notification"></span>
        </div>
        <div class="hero3-wrapper">
            <div class="container">
                <div class="row justify-content-center align-items-end flex-row-reverse">
                    <div class="col-lg-8">
                        <div class="hero3-swiper-custom"><button aria-controls="swiper-wrapper-106672a4a3b4c9814"
                                aria-label="Next slide" class="swiper-button-next" data-slider-prev="#heroSlide3"
                                tabindex="0"><img alt="" src="assets/img/icon/hero-arrow-right.svg" /></button>
                            <button aria-controls="swiper-wrapper-106672a4a3b4c9814" aria-label="Previous slide"
                                class="swiper-button-prev" data-slider-next="#heroSlide3" tabindex="0"><img alt=""
                                    src="assets/img/icon/hero-arrow-left.svg" /></button>
                        </div>
                        <div
                            class="swiper hero3Thumbs swiper-initialized swiper-horizontal swiper-free-mode swiper-watch-progress swiper-backface-hidden swiper-thumbs">
                            <div aria-live="polite" class="swiper-wrapper" id="swiper-wrapper-34f729a47a09297e"
                                style="transform: translate3d(-1302px, 0px, 0px); transition-duration: 0ms; transition-delay: 0ms;">
                                <div aria-label="1 / 5" class="swiper-slide" role="group"
                                    style="width: 424px; margin-right: 10px;">
                                </div>
                                <div aria-label="2 / 5" class="swiper-slide" role="group"
                                    style="width: 424px; margin-right: 10px;">
                                </div>
                                <div aria-label="3 / 5" class="swiper-slide swiper-slide-prev" role="group"
                                    style="width: 424px; margin-right: 10px;">
                                </div>
                                <div aria-label="4 / 5"
                                    class="swiper-slide swiper-slide-thumb-active swiper-slide-visible swiper-slide-active"
                                    role="group" style="width: 424px; margin-right: 10px;">
                                </div>
                                <div aria-label="5 / 5" class="swiper-slide swiper-slide-next" role="group"
                                    style="width: 424px; margin-right: 10px;">
                                </div>
                            </div><span aria-atomic="true" aria-live="assertive" class="swiper-notification"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="scroll-down"><a class="scroll-wrap" href="#destination-sec"><span><img alt=""
                        src="assets/img/icon/down-arrow.svg" /></span>Scroll Down</a></div>
    </div>
    <div class="about-area position-relative overflow-hidden space-top" id="about-sec">
        <div class="container">
            <div class="row">
                <div class="col-xl-6">
                    <div class="title-area mb-20">
                        <span class="sub-title style1">Who We Are</span>
                        <h2 class="sec-title mb-20">Why Majesty Paradise is Your Kashmir Gateway</h2>
                        <p class="sec-text mb-50">Hey, we’re Majesty Paradise Tour and Travel—a Srinagar crew obsessed
                            with showing off Kashmir’s jaw-dropping beauty. We’re not just another travel agency; we’re
                            locals who live and breathe this place. From snowy Gulmarg slopes to Pahalgam’s quiet
                            valleys, we’ve got Kashmir tour packages that hit all the sweet spots. Whether you’re
                            chasing adventure tours in Kashmir or dreaming up a honeymoon package in Kashmir, we’re here
                            to make it happen—your way, no fluff.</p>
                    </div>
                    <div class="img-box7">
                        <div class="img1 global-img"><img alt="Kashmir Valley" src="optimized_images\about71.webp" />
                        </div>
                        <div class="img2 global-img"><img alt="Srinagar Houseboat"
                                src="optimized_images\about72.webp" /></div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="img-box8">
                        <div class="img3 global-img"><img alt="Dal Lake Shikara"
                                src="optimized_images\free-photo-of-a-boat-on-a-lake.webp" /></div>
                        <div class="about-item-wrap">
                            <div class="about-item">
                                <div class="about-item_img"><img alt="" src="assets/img/icon/map3.svg" /></div>
                                <div class="about-item_centent">
                                    <h5 class="box-title">Unique Kashmir Trips</h5>
                                    <p class="about-item_text">We dig into spots like Gurez Valley—stuff you won’t find
                                        on every Jammu Kashmir holiday package. It’s your trip, your rules.</p>
                                </div>
                            </div>
                            <div class="about-item">
                                <div class="about-item_img"><img alt="" src="assets/img/icon/guide.svg" /></div>
                                <div class="about-item_centent">
                                    <h5 class="box-title">Local Guides, Real Vibes</h5>
                                    <p class="about-item_text">Our Srinagar travel agency crew knows the backroads and
                                        the best shikara guy. You’re not just a tourist—you’re with family.</p>
                                </div>
                            </div>
                        </div>
                        <div class="mt-35"><a class="th-btn style3 th-icon" href="about.html">Learn More</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- tour area -->
    <div class="destination-area position-relative overflow-hidden">
        <div class="container">
            <div class="title-area text-center"><span class="sub-title">Top Destination</span>
                <h2 class="sec-title">Popular Destination</h2>
            </div>
            <div class="swiper th-slider destination-slider slider-drag-wrap swiper-coverflow swiper-3d swiper-initialized swiper-horizontal swiper-watch-progress"
                data-slider-options='{"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":"2"},"992":{"slidesPerView":"3"},"1200":{"slidesPerView":"3"}},"effect":"coverflow","coverflowEffect":{"rotate":"0","stretch":"95","depth":"212","modifier":"1"},"centeredSlides":"true"}'
                id="aboutSlider1">
                <div aria-live="off" class="swiper-wrapper" id="swiper-wrapper-1053999d2630f8ac1"
                    style="transition-duration: 0ms; transform: translate3d(-1792px, 0px, 0px); transition-delay: 0ms;">
                    <div aria-label="3 / 10" class="swiper-slide" data-swiper-slide-index="2" role="group"
                        style="width: 424px; transition-duration: 0ms; transform: translate3d(501.887px, 0px, -1120px) rotateX(0deg) rotateY(0deg) scale(1); z-index: -4; margin-right: 24px;">
                        <div class="destination-box gsap-cursor">
                            <div class="destination-img"><img alt="destination image"
                                    src="optimized_images\free-photo-of-wooden-bench-on-hill-in-winter-mountains-landscape.webp" />
                                <div class="destination-content">
                                    <div class="media-left">
                                        <h4 class="box-title"><a href="contact-us.php">Pahalgam</a></h4><span
                                            class="destination-subtitle">25 Listing</span>
                                    </div>
                                    <div class=""><a class="th-btn style2 th-icon" href="contact-us.php">Book Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide-shadow-left swiper-slide-shadow-coverflow"
                            style="opacity: 5.28302; transition-duration: 0ms;"></div>
                        <div class="swiper-slide-shadow-right swiper-slide-shadow-coverflow"
                            style="opacity: 0; transition-duration: 0ms;"></div>
                    </div>
                    <div aria-label="4 / 10" class="swiper-slide" data-swiper-slide-index="3" role="group"
                        style="width: 424px; transition-duration: 0ms; transform: translate3d(401.509px, 0px, -896px) rotateX(0deg) rotateY(0deg) scale(1); z-index: -3; margin-right: 24px;">
                        <div class="destination-box gsap-cursor">
                            <div class="destination-img"><img alt="destination image"
                                    src="optimized_images\free-photo-of-serene-snowy-landscape-in-gulmarg-kashmir.webp" />
                                <div class="destination-content">
                                    <div class="media-left">
                                        <h4 class="box-title"><a href="contact-us.php">Shrinagar</a></h4><span
                                            class="destination-subtitle">28 Listing</span>
                                    </div>
                                    <div class=""><a class="th-btn style2 th-icon" href="contact-us.php">Book Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide-shadow-left swiper-slide-shadow-coverflow"
                            style="opacity: 4.22642; transition-duration: 0ms;"></div>
                        <div class="swiper-slide-shadow-right swiper-slide-shadow-coverflow"
                            style="opacity: 0; transition-duration: 0ms;"></div>
                    </div>
                    <div aria-label="5 / 10" class="swiper-slide" data-swiper-slide-index="4" role="group"
                        style="width: 424px; transition-duration: 0ms; transform: translate3d(301.132px, 0px, -672px) rotateX(0deg) rotateY(0deg) scale(1); z-index: -2; margin-right: 24px;">
                        <div class="destination-box gsap-cursor">
                            <div class="destination-img"><img alt="destination image"
                                    src="optimized_images\pexels-photo-10775022.webp" />
                                <div class="destination-content">
                                    <div class="media-left">
                                        <h4 class="box-title"><a href="contact-us.php">Laddkah</a></h4><span
                                            class="destination-subtitle">30 Listing</span>
                                    </div>
                                    <div class=""><a class="th-btn style2 th-icon" href="contact-us.php">Book Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide-shadow-left swiper-slide-shadow-coverflow"
                            style="opacity: 3.16981; transition-duration: 0ms;"></div>
                        <div class="swiper-slide-shadow-right swiper-slide-shadow-coverflow"
                            style="opacity: 0; transition-duration: 0ms;"></div>
                    </div>
                    <div aria-label="6 / 10" class="swiper-slide" data-swiper-slide-index="5" role="group"
                        style="width: 424px; transition-duration: 0ms; transform: translate3d(200.755px, 0px, -448px) rotateX(0deg) rotateY(0deg) scale(1); z-index: -1; margin-right: 24px;">
                        <div class="destination-box gsap-cursor">
                            <div class="destination-img"><img alt="destination image"
                                    src="optimized_images\free-photo-of-a-house-sits-on-a-hillside-next-to-a-river.webp" />
                                <div class="destination-content">
                                    <div class="media-left">
                                        <h4 class="box-title"><a href="contact-us.php">Sonmarg</a></h4><span
                                            class="destination-subtitle">15 Listing</span>
                                    </div>
                                    <div class=""><a class="th-btn style2 th-icon" href="contact-us.php">Book Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide-shadow-left swiper-slide-shadow-coverflow"
                            style="opacity: 2.11321; transition-duration: 0ms;"></div>
                        <div class="swiper-slide-shadow-right swiper-slide-shadow-coverflow"
                            style="opacity: 0; transition-duration: 0ms;"></div>
                    </div>
                    <div aria-label="7 / 10" class="swiper-slide swiper-slide-visible swiper-slide-prev"
                        data-swiper-slide-index="6" role="group"
                        style="width: 424px; transition-duration: 0ms; transform: translate3d(100.377px, 0px, -224px) rotateX(0deg) rotateY(0deg) scale(1); z-index: 0; margin-right: 24px;">
                        <div class="destination-box gsap-cursor">
                            <div class="destination-img"><img alt="destination image"
                                    src="optimized_images\free-photo-of-person-standing-on-river-bank-in-snow.webp" />
                                <div class="destination-content">
                                    <div class="media-left">
                                        <h4 class="box-title"><a href="contact-us.php">Pahalgham</a></h4><span
                                            class="destination-subtitle">22 Listing</span>
                                    </div>
                                    <div class=""><a class="th-btn style2 th-icon" href="contact-us.php">Book Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide-shadow-left swiper-slide-shadow-coverflow"
                            style="opacity: 1.0566; transition-duration: 0ms;"></div>
                        <div class="swiper-slide-shadow-right swiper-slide-shadow-coverflow"
                            style="opacity: 0; transition-duration: 0ms;"></div>
                    </div>
                    <div aria-label="8 / 10" class="swiper-slide swiper-slide-visible swiper-slide-active"
                        data-swiper-slide-index="7" role="group"
                        style="width: 424px; transition-duration: 0ms; transform: translate3d(0px, 0px, 0px) rotateX(0deg) rotateY(0deg) scale(1); z-index: 1; margin-right: 24px;">
                        <div class="destination-box gsap-cursor">
                            <div class="destination-img"><img alt="destination image"
                                    src="optimized_images\pexels-photo-14374498.webp" />
                                <div class="destination-content">
                                    <div class="media-left">
                                        <h4 class="box-title"><a href="contact-us.php">Gulmarg</a></h4><span
                                            class="destination-subtitle">25 Listing</span>
                                    </div>
                                    <div class=""><a class="th-btn style2 th-icon" href="contact-us.php">Book Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide-shadow-left swiper-slide-shadow-coverflow"
                            style="opacity: 0; transition-duration: 0ms;"></div>
                        <div class="swiper-slide-shadow-right swiper-slide-shadow-coverflow"
                            style="opacity: 0; transition-duration: 0ms;"></div>
                    </div>
                    <div aria-label="9 / 10" class="swiper-slide swiper-slide-visible swiper-slide-next"
                        data-swiper-slide-index="8" role="group"
                        style="width: 424px; transition-duration: 0ms; transform: translate3d(-100.377px, 0px, -224px) rotateX(0deg) rotateY(0deg) scale(1); z-index: 0; margin-right: 24px;">
                        <div class="destination-box gsap-cursor">
                            <div class="destination-img"><img alt="destination image"
                                    src="optimized_images\pexels-photo-10945248.webp" />
                                <div class="destination-content">
                                    <div class="media-left">
                                        <h4 class="box-title"><a href="contact-us.php">Shri Nagar</a></h4><span
                                            class="destination-subtitle">28 Listing</span>
                                    </div>
                                    <div class=""><a class="th-btn style2 th-icon" href="contact-us.php">Book Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide-shadow-left swiper-slide-shadow-coverflow"
                            style="opacity: 0; transition-duration: 0ms;"></div>
                        <div class="swiper-slide-shadow-right swiper-slide-shadow-coverflow"
                            style="opacity: 1.0566; transition-duration: 0ms;"></div>
                    </div>
                    <div aria-label="10 / 10" class="swiper-slide" data-swiper-slide-index="9" role="group"
                        style="width: 424px; transition-duration: 0ms; transform: translate3d(-200.755px, 0px, -448px) rotateX(0deg) rotateY(0deg) scale(1); z-index: -1; margin-right: 24px;">
                        <div class="destination-box gsap-cursor">
                            <div class="destination-img"><img alt="destination image"
                                    src="optimized_images\pexels-photo-10794251.webp" />
                                <div class="destination-content">
                                    <div class="media-left">
                                        <h4 class="box-title"><a href="contact-us.php">Pahalgam</a></h4><span
                                            class="destination-subtitle">30 Listing</span>
                                    </div>
                                    <div class=""><a class="th-btn style2 th-icon" href="contact-us.php">Book Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide-shadow-left swiper-slide-shadow-coverflow"
                            style="opacity: 0; transition-duration: 0ms;"></div>
                        <div class="swiper-slide-shadow-right swiper-slide-shadow-coverflow"
                            style="opacity: 2.11321; transition-duration: 0ms;"></div>
                    </div>
                    <div aria-label="1 / 10" class="swiper-slide" data-swiper-slide-index="0" role="group"
                        style="width: 424px; transition-duration: 0ms; transform: translate3d(-301.132px, 0px, -672px) rotateX(0deg) rotateY(0deg) scale(1); z-index: -2; margin-right: 24px;">
                        <div class="destination-box gsap-cursor">
                            <div class="destination-img"><img alt="destination image"
                                    src="optimized_images\pexels-photo-13927123.webp" />
                                <div class="destination-content">
                                    <div class="media-left">
                                        <h4 class="box-title"><a href="contact-us.php">Gulmarg</a></h4><span
                                            class="destination-subtitle">15 Listing</span>
                                    </div>
                                    <div class=""><a class="th-btn style2 th-icon" href="contact-us.php">Book Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide-shadow-left swiper-slide-shadow-coverflow"
                            style="opacity: 0; transition-duration: 0ms;"></div>
                        <div class="swiper-slide-shadow-right swiper-slide-shadow-coverflow"
                            style="opacity: 3.16981; transition-duration: 0ms;"></div>
                    </div>
                    <div aria-label="2 / 10" class="swiper-slide" data-swiper-slide-index="1" role="group"
                        style="width: 424px; transition-duration: 0ms; transform: translate3d(-401.509px, 0px, -896px) rotateX(0deg) rotateY(0deg) scale(1); z-index: -3; margin-right: 24px;">
                        <div class="destination-box gsap-cursor">
                            <div class="destination-img"><img alt="destination image"
                                    src="optimized_images\free-photo-of-vehicles-on-road-in-winter.webp" />
                                <div class="destination-content">
                                    <div class="media-left">
                                        <h4 class="box-title"><a href="contact-us.php">Laddkah</a></h4><span
                                            class="destination-subtitle">22 Listing</span>
                                    </div>
                                    <div class=""><a class="th-btn style2 th-icon" href="contact-us.php">Book Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide-shadow-left swiper-slide-shadow-coverflow"
                            style="opacity: 0; transition-duration: 0ms;"></div>
                        <div class="swiper-slide-shadow-right swiper-slide-shadow-coverflow"
                            style="opacity: 4.22642; transition-duration: 0ms;"></div>
                    </div>
                </div><span aria-atomic="true" aria-live="assertive" class="swiper-notification"></span>
            </div>
        </div>
    </div>
    <!-- our category -->
    <?php
    include('./admin/codes/db.php');

    // Define dummy image path
    $dummyImage = 'assets/img/tour/dummy-image.jpg';

    // Fetch all active categories
    $categoryQuery = $db->query("SELECT id, name, url FROM brand WHERE status = 'active'");
    $categories = [];
    while ($row = $categoryQuery->fetch_assoc()) {
        $categories[] = $row;
    }
    ?>

    <section class="category-area2 bg-top-center position-relative overflow-hidden space space-extra-bottom">
        <div class="container th-container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="title-area text-center">
                        <span class="sub-title">Tour Activity</span>
                        <h2 class="sec-title bend-text">Our Tour Package Ensures A Seamless And Memorable Adventure</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <!-- Category Tabs -->
            <div class="nav nav-tabs tour-tabs style3" id="nav-tab" role="tablist">
                <?php foreach ($categories as $index => $category): ?>
                    <button class="nav-link th-btn &lt;?= $index === 0 ? 'active' : '' ?&gt;"
                        data-bs-target="#nav-cat&lt;?= $category['id'] ?&gt;" data-bs-toggle="tab"
                        id="nav-cat&lt;?= $category['id'] ?&gt;-tab" type="button">
                        <?= htmlspecialchars($category['name']) ?>
                    </button>
                <?php endforeach; ?>
            </div>
            <!-- Tab Content with Sliders -->
            <div class="tab-content" id="nav-tabContent">
                <?php foreach ($categories as $index => $category): ?>
                    <?php
                    // Fetch products for this category
                    $productQuery = $db->prepare("SELECT * FROM products WHERE status = 'active' AND brand_id = ?");
                    $productQuery->bind_param('i', $category['id']);
                    $productQuery->execute();
                    $productResult = $productQuery->get_result();
                    ?>
                    <div class="tab-pane fade &lt;?= $index === 0 ? 'show active' : '' ?&gt;"
                        id="nav-cat&lt;?= $category['id'] ?&gt;" role="tabpanel">
                        <div class="slider-area tour-slider slider-drag-wrap">
                            <div class="swiper categorySlider6 swiper-initialized swiper-horizontal"
                                id="categorySlider&lt;?= $category['id'] ?&gt;">
                                <div aria-live="polite" class="swiper-wrapper">
                                    <?php if ($productResult->num_rows > 0): ?>
                                        <?php while ($product = $productResult->fetch_assoc()): ?>
                                            <div class="swiper-slide" role="group">
                                                <div class="category-card style4 single2">
                                                    <div class="box-img global-img">
                                                        <img alt="&lt;?= htmlspecialchars($product['title']) ?&gt;"
                                                            src="&lt;?= !empty($product['main_image']) ? 'admin/codes/' . htmlspecialchars($product['main_image']) : Base_url . $dummyImage ?&gt;" />
                                                    </div>
                                                    <div class="box-wrapp">
                                                        <div class="box-content">
                                                            <h3 class="box-title">
                                                                <a
                                                                    href="package-details.php?url=&lt;?= htmlspecialchars($product['url']) ?&gt;">
                                                                    <?= htmlspecialchars($product['title']) ?>
                                                                </a>
                                                            </h3>
                                                            <p class="box-text">
                                                                <i class="fa-light fa-clock"></i>
                                                                <?= htmlspecialchars($product['duration']) ?> |
                                                                ₹<?= number_format($product['total_cost'], 2) ?>
                                                            </p>
                                                        </div>
                                                        <div class="icon-btn">
                                                            <i class="fa-solid fa-arrow-up-right"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endwhile; ?>
                                    <?php else: ?>
                                        <div class="swiper-slide" role="group">
                                            <div class="category-card style4 single2">
                                                <div class="box-content">
                                                    <p class="box-text">No products available in this category.</p>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <!-- Slider Controls -->
                                <div class="th-swiper-custom">
                                    <button class="slider-arrow slider-prev"
                                        data-slider-prev="#categorySlider&lt;?= $category['id'] ?&gt;">
                                        <img alt="" src="assets/img/icon/right-arrow.svg" />
                                    </button>
                                    <div
                                        class="swiper-pagination swiper-pagination-progressbar swiper-pagination-horizontal">
                                        <span class="swiper-pagination-progressbar-fill"></span>
                                    </div>
                                    <button class="slider-arrow slider-next"
                                        data-slider-next="#categorySlider&lt;?= $category['id'] ?&gt;">
                                        <img alt="" src="assets/img/icon/left-arrow.svg" />
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <!-- Add Swiper JS initialization if not already present -->
    <section class="testi-area7 bg-smoke overflow-hidden space background-image shape-mockup-wrap" id="testi-sec"
        style="background-image: url('assets/img/bg/map.png');">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6">
                    <div class="title-area mb-40">
                        <span class="sub-title">Testimonials</span>
                        <h2 class="sec-title">What Our Travelers Say</h2>
                    </div>
                    <div class="swiper th-slider testiSlide5 swiper-initialized swiper-horizontal swiper-backface-hidden"
                        data-slider-options='{"effect":"slide","loop":false,"thumbs":{"swiper":".testi-grid2-thumb"}}'
                        id="testiSlide7">
                        <div aria-live="off" class="swiper-wrapper" id="swiper-wrapper-5944d83fab10baeab"
                            style="transition-duration: 0ms; transform: translate3d(-672px, 0px, 0px); transition-delay: 0ms;">
                            <div aria-label="1 / 6" class="swiper-slide swiper-slide-prev" role="group"
                                style="width: 648px; margin-right: 24px;">
                                <div class="testi-grid2">
                                    <div class="box-content">
                                        <p class="box-text">"Kashmir honeymoon with Majesty Paradise? Total
                                            game-changer. That Dal Lake houseboat vibe and Gulmarg snow had us hooked.
                                            They sorted everything—made our first days as a couple unreal."</p>
                                        <h6 class="box-title">Priya Sharma</h6>
                                        <span class="box-desig">Honeymooner</span>
                                        <div class="box-review">
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div aria-label="2 / 6" class="swiper-slide swiper-slide-active" role="group"
                                style="width: 648px; margin-right: 24px;">
                                <div class="testi-grid2">
                                    <div class="box-content">
                                        <p class="box-text">"Family trip with Majesty Paradise was a blast. Kids flipped
                                            for the Srinagar shikara ride, and Pahalgam trekking? Wow. Cheap, no
                                            headaches, and stuck in our heads forever."</p>
                                        <h6 class="box-title">Rahul Kapoor</h6>
                                        <span class="box-desig">Family Traveler</span>
                                        <div class="box-review">
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div aria-label="3 / 6" class="swiper-slide swiper-slide-next" role="group"
                                style="width: 648px; margin-right: 24px;">
                                <div class="testi-grid2">
                                    <div class="box-content">
                                        <p class="box-text">"Adventure’s my jam, and Majesty Paradise nailed it. Gulmarg
                                            skiing was nuts, and that Gurez Valley trek? Next level. Their local
                                            know-how’s what sealed the deal."</p>
                                        <h6 class="box-title">Vikram Singh</h6>
                                        <span class="box-desig">Adventure Seeker</span>
                                        <div class="box-review">
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div aria-label="4 / 6" class="swiper-slide" role="group"
                                style="width: 648px; margin-right: 24px;">
                                <div class="testi-grid2">
                                    <div class="box-content">
                                        <p class="box-text">"Grabbed their 5-day Kashmir deal—total steal. Sonmarg
                                            meadows were chill, Srinagar markets buzzing. They’ve got an eye for the
                                            good stuff, no doubt."</p>
                                        <h6 class="box-title">Aisha Khan</h6>
                                        <span class="box-desig">Solo Traveler</span>
                                        <div class="box-review">
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div aria-label="5 / 6" class="swiper-slide" role="group"
                                style="width: 648px; margin-right: 24px;">
                                <div class="testi-grid2">
                                    <div class="box-content">
                                        <p class="box-text">"Tweaked a winter package with Majesty Paradise—blew me
                                            away. Pahalgam’s snow was unreal, and the cozy setup? Spot on. Kashmir
                                            adventure, no fuss."</p>
                                        <h6 class="box-title">Neha Patel</h6>
                                        <span class="box-desig">Nature Lover</span>
                                        <div class="box-review">
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div aria-label="6 / 6" class="swiper-slide" role="group"
                                style="width: 648px; margin-right: 24px;">
                                <div class="testi-grid2">
                                    <div class="box-content">
                                        <p class="box-text">"Group trip to Kashmir was wild with Majesty Paradise. Dal
                                            Lake, Gulmarg, top-notch guides—covered all the bases. Tell your crew to
                                            book with them."</p>
                                        <h6 class="box-title">Arjun Mehra</h6>
                                        <span class="box-desig">Group Traveler</span>
                                        <div class="box-review">
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <span aria-atomic="true" aria-live="assertive" class="swiper-notification"></span>
                    </div>
                    <div class="swiper th-slider testi-grid2-thumb style2 swiper-initialized swiper-horizontal swiper-backface-hidden swiper-thumbs"
                        data-slider-options='{"effect":"slide","slidesPerView":"6","spaceBetween":7,"loop":false}'>
                        <div class="icon-box">
                            <button class="slider-arrow default" data-slider-prev="#testiSlide7"><img alt=""
                                    src="assets/img/icon/right-arrow2.svg" /></button>
                            <button class="slider-arrow default" data-slider-next="#testiSlide7"><img alt=""
                                    src="assets/img/icon/left-arrow2.svg" /></button>
                        </div>
                        <div aria-live="off" class="swiper-wrapper" id="swiper-wrapper-deb7b5cfea8969ae"
                            style="transform: translate3d(0px, 0px, 0px); transition-duration: 0ms; transition-delay: 0ms;">
                            <div aria-label="1 / 4" class="swiper-slide swiper-slide-visible swiper-slide-active"
                                role="group" style="width: 100.5px; margin-right: 7px;">
                                <div class="box-img"><img alt="Priya Sharma" src="optimized_images\testi41.webp" />
                                </div>
                            </div>
                            <div aria-label="2 / 4"
                                class="swiper-slide swiper-slide-visible swiper-slide-next swiper-slide-thumb-active"
                                role="group" style="width: 100.5px; margin-right: 7px;">
                                <div class="box-img"><img alt="Rahul Kapoor" src="optimized_images\testi42.webp" />
                                </div>
                            </div>
                            <div aria-label="3 / 4" class="swiper-slide swiper-slide-visible" role="group"
                                style="width: 100.5px; margin-right: 7px;">
                                <div class="box-img"><img alt="Vikram Singh" src="optimized_images\testi43.webp" />
                                </div>
                            </div>
                            <div aria-label="4 / 4" class="swiper-slide swiper-slide-visible" role="group"
                                style="width: 100.5px; margin-right: 7px;">
                                <div class="box-img"><img alt="Aisha Khan" src="optimized_images\testi44.webp" />
                                </div>
                            </div>
                        </div>
                        <span aria-atomic="true" aria-live="assertive" class="swiper-notification"></span>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div bis_skin_checked="1" class="testi-image-wrapp2">
                        <div bis_skin_checked="1" class="testi-img bg-mask"
                            style='mask-image: url("assets/img/testimonial/testi_shape_1.png");'><img alt=""
                                src="optimized_images\testi-img1.webp" /></div>
                        <div bis_skin_checked="1" class="testi-shape2"><img alt=""
                                src="optimized_images\testishape1.webp" /></div>
                        <div bis_skin_checked="1" class="testi-img2"><img alt=""
                                src="optimized_images\testi-img2.webp" /></div>
                        <div bis_skin_checked="1" class="testi-shape"><img alt=""
                                src="optimized_images\testishape2.webp" /></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="destination-area6 position-relative overflow-hidden space arrow-wrap">
        <div class="container th-container shape-mockup-wrap">
            <div class="title-area text-center"><span class="sub-title">Our Gallery</span>
                <h2 class="sec-title">A simply amazing experience</h2>
            </div>
            <div class="slider-area">
                <div class="swiper th-slider destination-slider2 slider-drag-wrap swiper-coverflow swiper-3d swiper-initialized swiper-horizontal swiper-watch-progress"
                    data-slider-options='{"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":"2"},"992":{"slidesPerView":"3"},"1200":{"slidesPerView":"3"}},"effect":"coverflow","coverflowEffect":{"rotate":"-17","stretch":"-8","depth":"330","modifier":"1","slideShadows":"false"},"centeredSlides":"true"}'
                    id="destiSlider1">
                    <div aria-live="off" class="swiper-wrapper" id="swiper-wrapper-106c21552b97510f35"
                        style="transition-duration: 0ms; transform: translate3d(-1994.67px, 0px, 0px); transition-delay: 0ms;">
                        <div aria-label="1 / 10" class="swiper-slide" data-swiper-slide-index="0" role="group"
                            style="width: 474.667px; transition-duration: 0ms; transform: translate3d(-42.0225px, 0px, -1733.43px) rotateX(0deg) rotateY(-89.2978deg) scale(1); z-index: -4; margin-right: 24px;">
                            <div class="destination-box2 gsap-cursor">
                                <div class="destination-img"><img alt="destination image"
                                        src="optimized_images\destination61.webp" /> <a class="popup-image"
                                        href="assets/img/destination/destination_6_1.jpg">
                                        <div class="icon-btn"><i class="fal fa-magnifying-glass-plus"></i></div>
                                    </a></div>
                            </div>
                            <div class="swiper-slide-shadow-left swiper-slide-shadow-coverflow"
                                style="opacity: 5.25281; transition-duration: 0ms;"></div>
                            <div class="swiper-slide-shadow-right swiper-slide-shadow-coverflow"
                                style="opacity: 0; transition-duration: 0ms;"></div>
                        </div>
                        <div aria-label="2 / 10" class="swiper-slide" data-swiper-slide-index="1" role="group"
                            style="width: 474.667px; transition-duration: 0ms; transform: translate3d(-33.6124px, 0px, -1386.51px) rotateX(0deg) rotateY(-71.4263deg) scale(1); z-index: -3; margin-right: 24px;">
                            <div class="destination-box2 gsap-cursor">
                                <div class="destination-img"><img alt="destination image"
                                        src="optimized_images\destination62.webp" /> <a class="popup-image"
                                        href="assets/img/destination/destination_6_2.jpg">
                                        <div class="icon-btn"><i class="fal fa-magnifying-glass-plus"></i></div>
                                    </a></div>
                            </div>
                            <div class="swiper-slide-shadow-left swiper-slide-shadow-coverflow"
                                style="opacity: 4.20154; transition-duration: 0ms;"></div>
                            <div class="swiper-slide-shadow-right swiper-slide-shadow-coverflow"
                                style="opacity: 0; transition-duration: 0ms;"></div>
                        </div>
                        <div aria-label="3 / 10" class="swiper-slide" data-swiper-slide-index="2" role="group"
                            style="width: 474.667px; transition-duration: 0ms; transform: translate3d(-25.2191px, 0px, -1040.29px) rotateX(0deg) rotateY(-53.5906deg) scale(1); z-index: -2; margin-right: 24px;">
                            <div class="destination-box2 gsap-cursor">
                                <div class="destination-img"><img alt="destination image"
                                        src="optimized_images\destination63.webp" /> <a class="popup-image"
                                        href="assets/img/destination/destination_6_3.jpg">
                                        <div class="icon-btn"><i class="fal fa-magnifying-glass-plus"></i></div>
                                    </a></div>
                            </div>
                            <div class="swiper-slide-shadow-left swiper-slide-shadow-coverflow"
                                style="opacity: 3.15239; transition-duration: 0ms;"></div>
                            <div class="swiper-slide-shadow-right swiper-slide-shadow-coverflow"
                                style="opacity: 0; transition-duration: 0ms;"></div>
                        </div>
                        <div aria-label="4 / 10" class="swiper-slide" data-swiper-slide-index="3" role="group"
                            style="width: 474.667px; transition-duration: 0ms; transform: translate3d(-16.809px, 0px, -693.371px) rotateX(0deg) rotateY(-35.7191deg) scale(1); z-index: -1; margin-right: 24px;">
                            <div class="destination-box2 gsap-cursor">
                                <div class="destination-img"><img alt="destination image"
                                        src="optimized_images\destination64.webp" /> <a class="popup-image"
                                        href="assets/img/destination/destination_6_4.jpg">
                                        <div class="icon-btn"><i class="fal fa-magnifying-glass-plus"></i></div>
                                    </a></div>
                            </div>
                            <div class="swiper-slide-shadow-left swiper-slide-shadow-coverflow"
                                style="opacity: 2.10112; transition-duration: 0ms;"></div>
                            <div class="swiper-slide-shadow-right swiper-slide-shadow-coverflow"
                                style="opacity: 0; transition-duration: 0ms;"></div>
                        </div>
                        <div aria-label="5 / 10" class="swiper-slide swiper-slide-visible swiper-slide-prev"
                            data-swiper-slide-index="4" role="group"
                            style="width: 474.667px; transition-duration: 0ms; transform: translate3d(-8.39888px, 0px, -346.454px) rotateX(0deg) rotateY(-17.8476deg) scale(1); z-index: 0; margin-right: 24px;">
                            <div class="destination-box2 gsap-cursor">
                                <div class="destination-img"><img alt="destination image"
                                        src="optimized_images\destination65.webp" /> <a class="popup-image"
                                        href="assets/img/destination/destination_6_5.jpg">
                                        <div class="icon-btn"><i class="fal fa-magnifying-glass-plus"></i></div>
                                    </a></div>
                            </div>
                            <div class="swiper-slide-shadow-left swiper-slide-shadow-coverflow"
                                style="opacity: 1.04986; transition-duration: 0ms;"></div>
                            <div class="swiper-slide-shadow-right swiper-slide-shadow-coverflow"
                                style="opacity: 0; transition-duration: 0ms;"></div>
                        </div>
                        <div aria-label="6 / 10" class="swiper-slide swiper-slide-visible swiper-slide-active"
                            data-swiper-slide-index="5" role="group"
                            style="width: 474.667px; transition-duration: 0ms; transform: translate3d(-0.00561798px, 0px, -0.231742px) rotateX(0deg) rotateY(-0.0119382deg) scale(1); z-index: 1; margin-right: 24px;">
                            <div class="destination-box2 gsap-cursor">
                                <div class="destination-img"><img alt="destination image"
                                        src="optimized_images\destination61.webp" /> <a class="popup-image"
                                        href="assets/img/destination/destination_6_1.jpg">
                                        <div class="icon-btn"><i class="fal fa-magnifying-glass-plus"></i></div>
                                    </a></div>
                            </div>
                            <div class="swiper-slide-shadow-left swiper-slide-shadow-coverflow"
                                style="opacity: 0.000702247; transition-duration: 0ms;"></div>
                            <div class="swiper-slide-shadow-right swiper-slide-shadow-coverflow"
                                style="opacity: 0; transition-duration: 0ms;"></div>
                        </div>
                        <div aria-label="7 / 10" class="swiper-slide swiper-slide-visible swiper-slide-next"
                            data-swiper-slide-index="6" role="group"
                            style="width: 474.667px; transition-duration: 0ms; transform: translate3d(8.40449px, 0px, -346.685px) rotateX(0deg) rotateY(17.8596deg) scale(1); z-index: 0; margin-right: 24px;">
                            <div class="destination-box2 gsap-cursor">
                                <div class="destination-img"><img alt="destination image"
                                        src="optimized_images\destination62.webp" /> <a class="popup-image"
                                        href="assets/img/destination/destination_6_2.jpg">
                                        <div class="icon-btn"><i class="fal fa-magnifying-glass-plus"></i></div>
                                    </a></div>
                            </div>
                            <div class="swiper-slide-shadow-left swiper-slide-shadow-coverflow"
                                style="opacity: 0; transition-duration: 0ms;"></div>
                            <div class="swiper-slide-shadow-right swiper-slide-shadow-coverflow"
                                style="opacity: 1.05056; transition-duration: 0ms;"></div>
                        </div>
                        <div aria-label="8 / 10" class="swiper-slide" data-swiper-slide-index="7" role="group"
                            style="width: 474.667px; transition-duration: 0ms; transform: translate3d(16.8146px, 0px, -693.603px) rotateX(0deg) rotateY(35.731deg) scale(1); z-index: -1; margin-right: 24px;">
                            <div class="destination-box2 gsap-cursor">
                                <div class="destination-img"><img alt="destination image"
                                        src="optimized_images\destination63.webp" /> <a class="popup-image"
                                        href="assets/img/destination/destination_6_3.jpg">
                                        <div class="icon-btn"><i class="fal fa-magnifying-glass-plus"></i></div>
                                    </a></div>
                            </div>
                            <div class="swiper-slide-shadow-left swiper-slide-shadow-coverflow"
                                style="opacity: 0; transition-duration: 0ms;"></div>
                            <div class="swiper-slide-shadow-right swiper-slide-shadow-coverflow"
                                style="opacity: 2.10183; transition-duration: 0ms;"></div>
                        </div>
                        <div aria-label="9 / 10" class="swiper-slide" data-swiper-slide-index="8" role="group"
                            style="width: 474.667px; transition-duration: 0ms; transform: translate3d(25.2079px, 0px, -1039.82px) rotateX(0deg) rotateY(53.5667deg) scale(1); z-index: -2; margin-right: 24px;">
                            <div class="destination-box2 gsap-cursor">
                                <div class="destination-img"><img alt="destination image"
                                        src="optimized_images\destination64.webp" /> <a class="popup-image"
                                        href="assets/img/destination/destination_6_4.jpg">
                                        <div class="icon-btn"><i class="fal fa-magnifying-glass-plus"></i></div>
                                    </a></div>
                            </div>
                            <div class="swiper-slide-shadow-left swiper-slide-shadow-coverflow"
                                style="opacity: 0; transition-duration: 0ms;"></div>
                            <div class="swiper-slide-shadow-right swiper-slide-shadow-coverflow"
                                style="opacity: 3.15098; transition-duration: 0ms;"></div>
                        </div>
                        <div aria-label="10 / 10" class="swiper-slide" data-swiper-slide-index="9" role="group"
                            style="width: 474.667px; transition-duration: 0ms; transform: translate3d(33.618px, 0px, -1386.74px) rotateX(0deg) rotateY(71.4382deg) scale(1); z-index: -3; margin-right: 24px;">
                            <div class="destination-box2 gsap-cursor">
                                <div class="destination-img"><img alt="destination image"
                                        src="optimized_images\destination65.webp" /> <a class="popup-image"
                                        href="assets/img/destination/destination_6_5.jpg">
                                        <div class="icon-btn"><i class="fal fa-magnifying-glass-plus"></i></div>
                                    </a></div>
                            </div>
                            <div class="swiper-slide-shadow-left swiper-slide-shadow-coverflow"
                                style="opacity: 0; transition-duration: 0ms;"></div>
                            <div class="swiper-slide-shadow-right swiper-slide-shadow-coverflow"
                                style="opacity: 4.20225; transition-duration: 0ms;"></div>
                        </div>
                    </div><span aria-atomic="true" aria-live="assertive" class="swiper-notification"></span>
                </div>
                <div class="icon-box mt-60 text-center"><button class="slider-arrow style5 default"
                        data-slider-prev="#destiSlider1"><img alt="" src="assets/img/icon/right-arrow2.svg" /></button>
                    <button class="slider-arrow style5 default" data-slider-next="#destiSlider1"><img alt=""
                            src="assets/img/icon/left-arrow2.svg" /></button>
                </div>
            </div>
            <div class="shape-mockup shape1 d-none d-xxl-block" style="top: 7%; right: -9%;"><img alt="shape"
                    src="optimized_images\shape1.webp" /></div>
            <div class="shape-mockup shape2 d-none d-xl-block" style="top: 12%; right: -5%;"><img alt="shape"
                    src="optimized_images\shape2.webp" /></div>
            <div class="shape-mockup shape3 d-none d-xxl-block" style="top: 15%; right: -9%;"><img alt="shape"
                    src="optimized_images\shape3.webp" /></div>
            <div class="shape-mockup spin d-none d-xxl-block" style="top: 10%; left: -12%;"><img alt="shape"
                    src="optimized_images\shape27.webp" /></div>
            <div class="shape-mockup jump d-none d-xxl-block" style="bottom: -5%; left: -13%;"><img alt="shape"
                    src="optimized_images\shape28.webp" /></div>
            <div class="shape-mockup movingX d-none d-xxl-block" style="right: -7%; bottom: 19%;"><img alt="shape"
                    src="optimized_images\shape29.webp" /></div>
        </div>
    </div>
    <div class="position-relative overflow-hidden space">
        <div class="cta-sec6 bg-title position-relative overflow-hidden shape-mockup-wrap"
            style="background-color: #d65817 !important;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="cta-area6 space">
                            <div class="title-area mb-30">
                                <h2 class="sec-title cta-title2 text-white mt-n3">
                                    Discover <span class="sec-title2">Unforgettable Journeys</span>
                                    <span class="d-block">Tailored Just for You</span>
                                </h2>
                                <p class="text-white">
                                    Experience seamless travel with Majesty Paradise. Whether it's a serene getaway
                                    or an adventure-packed trip, we curate every detail to perfection.
                                    Let's turn your dream destination into reality!
                                </p>
                            </div>
                            <div class="btn-group">
                                <a class="th-btn th-icon" href="contact-us.php">Plan Your Trip</a>
                            </div>
                            <div class="cta-shape"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="shape-mockup" style="right: -2%; bottom: 0%;">
                <img alt="" src="optimized_images\pexels-photo-14374647.webp" />
            </div>
        </div>
    </div>
    <div class="position-relative space-bottom overflow-hidden overflow-hidden space" id="faq-sec">
        <div class="container shape-mockup-wrap">
            <div class="row gy-4 align-items-center justify-content-between">
                <div class="col-xl-6">
                    <div class="pe-xl-5">
                        <div class="title-area mb-30">
                            <span class="sub-title">Frequently Asked Questions</span>
                            <h2 class="sec-title">Your Kashmir Journey, Answered with Care</h2>
                        </div>
                        <div class="accordion" id="faqAccordion">
                            <div class="accordion-card style3">
                                <div class="accordion-header" id="collapse-item-1">
                                    <button aria-controls="collapse-1" aria-expanded="false"
                                        class="accordion-button collapsed" data-bs-target="#collapse-1"
                                        data-bs-toggle="collapse" type="button">
                                        What services does Majesty Paradise Tour and Travel offer?
                                    </button>
                                </div>
                                <div aria-labelledby="collapse-item-1" class="accordion-collapse collapse show"
                                    data-bs-parent="#faqAccordion" id="collapse-1">
                                    <div class="accordion-body">
                                        <p class="faq-text">We specialize in crafting <strong>Kashmir tour
                                                packages</strong>, including transportation, accommodations, guided
                                            tours, and activities like trekking and shikara rides. From
                                            <strong>honeymoon packages in Kashmir</strong> to <strong>adventure
                                                tours</strong>, we ensure a seamless travel experience tailored to your
                                            needs.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-card style3">
                                <div class="accordion-header" id="collapse-item-2">
                                    <button aria-controls="collapse-2" aria-expanded="false"
                                        class="accordion-button collapsed" data-bs-target="#collapse-2"
                                        data-bs-toggle="collapse" type="button">
                                        Do you only offer tours to Kashmir, or other destinations too?
                                    </button>
                                </div>
                                <div aria-labelledby="collapse-item-2" class="accordion-collapse collapse"
                                    data-bs-parent="#faqAccordion" id="collapse-2">
                                    <div class="accordion-body">
                                        <p class="faq-text">Our expertise lies in <strong>Jammu Kashmir holiday
                                                packages</strong>, showcasing destinations like Gulmarg, Pahalgam, and
                                            Gurez Valley. While Kashmir is our focus, contact us to discuss custom trips
                                            beyond the region—we’re here to make your travel dreams come true!</p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-card style3">
                                <div class="accordion-header" id="collapse-item-3">
                                    <button aria-controls="collapse-3" aria-expanded="false"
                                        class="accordion-button collapsed" data-bs-target="#collapse-3"
                                        data-bs-toggle="collapse" type="button">
                                        Can I customize my Kashmir tour package?
                                    </button>
                                </div>
                                <div aria-labelledby="collapse-item-3" class="accordion-collapse collapse"
                                    data-bs-parent="#faqAccordion" id="collapse-3">
                                    <div class="accordion-body">
                                        <p class="faq-text">Absolutely! Whether it’s a romantic <strong>honeymoon
                                                package in Kashmir</strong>, a family vacation, or a <strong>trekking
                                                package in Kashmir</strong>, we offer fully customizable options. Tell
                                            us your preferences—destinations, duration, or activities—and we’ll design
                                            your perfect trip.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-card style3">
                                <div class="accordion-header" id="collapse-item-4">
                                    <button aria-controls="collapse-4" aria-expanded="true" class="accordion-button"
                                        data-bs-target="#collapse-4" data-bs-toggle="collapse" type="button">
                                        How do I book a Kashmir trip with Majesty Paradise?
                                    </button>
                                </div>
                                <div aria-labelledby="collapse-item-4" class="accordion-collapse collapse"
                                    data-bs-parent="#faqAccordion" id="collapse-4">
                                    <div class="accordion-body">
                                        <p class="faq-text">Booking is simple! Visit our <strong>Contact Us</strong>
                                            page, fill out the inquiry form with your travel details, or call us
                                            directly at our Srinagar office (Ahenger Complex). We’ll guide you through
                                            package selection, customization, and payment for a hassle-free
                                            <strong>Kashmir travel package</strong>.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-card style3">
                                <div class="accordion-header" id="collapse-item-5">
                                    <button aria-controls="collapse-5" aria-expanded="false"
                                        class="accordion-button collapsed" data-bs-target="#collapse-5"
                                        data-bs-toggle="collapse" type="button">
                                        What’s the best time to visit Kashmir with your packages?
                                    </button>
                                </div>
                                <div aria-labelledby="collapse-item-5" class="accordion-collapse collapse"
                                    data-bs-parent="#faqAccordion" id="collapse-5">
                                    <div class="accordion-body">
                                        <p class="faq-text">It depends on your vibe! Spring (March-May) is great for
                                            flowers, summer (June-August) for greenery, autumn (September-November) for
                                            golden hues, and winter (December-February) for snow and skiing. Our
                                            <strong>Kashmir holiday packages</strong> cater to all seasons—pick your
                                            favorite!
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="faq-img3 ps-xl-3">
                        <div class="img1">
                            <img alt="Kashmir Travel FAQ Image" src="optimized_images\mountains-71164621920.webp" style="
    border-radius: 27px;
" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="shape-mockup movingX d-none d-xl-block" style="top: 8%; left: -15%;">
                <img alt="shape" src="optimized_images\shape21.webp" />
            </div>
            <div class="shape-mockup jump d-none d-xl-block" style="top: 23%; right: -14%;">
                <img alt="shape" src="optimized_images\shape22.webp" />
            </div>
            <div class="shape-mockup spin d-none d-xl-block" style="bottom: -4%; left: -18%;">
                <img alt="shape" src="optimized_images\shape23.webp" />
            </div>
            <div class="shape-mockup movingX d-none d-xl-block" style="right: -14%; bottom: 12%;">
                <img alt="shape" src="optimized_images\shape24.webp" />
            </div>
        </div>
    </div>
    <?php include_once('footer.php'); ?>
</body>