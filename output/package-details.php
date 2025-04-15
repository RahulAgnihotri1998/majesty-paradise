<?php include_once('header.php'); ?>

<body>
    <?php include_once('nav.php'); ?>

    <div class="breadcumb-wrapper" data-bg-src="assets/img/bg/breadcumb-bg.jpg">
<div class="container">
<div class="breadcumb-content">
<h1 class="breadcumb-title">Tour Details</h1>
<ul class="breadcumb-menu">
<li><a href="home-travel.html">Home</a></li>
<li>Tour Details</li>
</ul>
</div>
</div>
</div>
<style>
        .resort-content {
            max-width: 530px;
            padding: var(--widget-padding-y, 30px) var(--widget-padding-x, 30px);
            background-color: var(--white-color);
            border: 1px solid var(--gray-color);
            border-radius: 8px;
            margin-bottom: 40px;
            position: relative;
        }

        .resort-content .resort-list ul {
            padding: 30px 40px;
            background-color: #f5e0c3;
            border: 1px solid transparent;
            border-radius: 20px;
        }

        .resort-content .resort-list ul li .title {
            color: #000000;
        }

        .box-title a {
            color: #ad3906;
        }

        .resort-content .resort-price .currency {
            color: #ad3906;
        }

        .box-title a:hover {
            color: #000000;
        }

        /* Ensure uniform image size in slider */
        .tour-slider-img img {
            width: 100%;
            height: 400px; /* Adjust height as needed */
            object-fit: cover; /* Ensures images are cropped to fit without distortion */
        }

        .small-slider img{
            height: 200px;
        }
        /* Add spacing between headings */
        .page-single .box-title {
            margin-top: 40px; /* Adds space above each heading */
        }

        /* Style for Included and Excluded icons */
        .checklist ul li {
            position: relative;
            padding-left: 30px;
        }

        .checklist.style2.style4 ul li ul li:before {
            content: url('assets/img/icon/check-green.svg'); /* Path to green checkmark icon */
            position: absolute;
            left: 0;
            top: 0;
        }

        .checklist.style5 ul li ul li:before {
            content: url('assets/img/icon/cross-red.svg'); /* Path to red cross icon */
            position: absolute;
            left: 0;
            top: 0;
        }
        .bg-title {
            background-color: #f5e0c3 !important;
        }
    </style>

    <?php
    include('./admin/codes/db.php'); 

    // Get the tour URL from the query string (e.g., ?url=luxury-beach-resort)
    $tourUrl = isset($_GET['url']) ? $_GET['url'] : null;

    // Define a dummy image path
    $dummyImage = 'assets/img/tour/dummy-image.jpg';

    // Predefined categories and their possible services
    $serviceCategories = [
        "Meal plan" => [
            "Breakfast",
            "Dinner",
            "Lunch"
        ],
        "Transport" => [
            "(SEDEN) NON A/C",
            "Government Taxes/VAT/Service Charges",
            "Cab for sightseeing",
            "Siteseeing",
            "Other non AC cars"
        ],
        "Hotel" => [
            "One room",
            "3 Star hotel"
        ],
        "Airport/Railway Station pickup/drop" => [
            "Arrival",
            "Departure"
        ],
        "Others" => [
            "Assistance on arrival",
            "Welcome drink on arrival at hotel",
            "Other inclusions",
            "Other exclusions"
        ],
        "Flight" => [
            "Flight"
        ],
        "Entry fee charges" => [
            "Entry fee charges"
        ]
    ];

    // Fetch tour details based on URL
    $tour = null;
    $galleryImages = [];
    if ($tourUrl) {
        $tourQuery = $db->prepare("
            SELECT p.*, b.name as brand_name 
            FROM products p 
            LEFT JOIN brand b ON p.brand_id = b.id 
            WHERE p.url = ? AND p.status = 'active'
        ");
        $tourQuery->bind_param('s', $tourUrl);
        $tourQuery->execute();
        $tourResult = $tourQuery->get_result();
        if ($tourResult->num_rows > 0) {
            $tour = $tourResult->fetch_assoc();

            // Fetch gallery images
            $galleryQuery = $db->prepare("
                SELECT image_url 
                FROM gallery_images 
                WHERE product_id = ?
            ");
            $galleryQuery->bind_param('i', $tour['id']);
            $galleryQuery->execute();
            $galleryResult = $galleryQuery->get_result();
            while ($row = $galleryResult->fetch_assoc()) {
                $galleryImages[] = $row['image_url'];
            }
            $galleryQuery->close();
        }
        $tourQuery->close();
    }

    if ($tour):
    ?>

    <section class="space">
<div class="container">
<div class="row">
<div class="col-lg-7">
<div class="tour-page-single">
<div class="slider-area tour-slider1">
                            <?php 
                            $images = array_merge([$tour['main_image']], $galleryImages);
                            ?>
                            <div class="swiper th-slider mb-4" data-slider-options='{"effect":"fade","loop":true,"thumbs":{"swiper":".tour-thumb-slider"},"autoplayDisableOnInteraction":"true"}' id="tourSlider4">
<div class="swiper-wrapper">
                                    <?php foreach ($images as $image): ?>
                                    <div class="swiper-slide">
<div class="tour-slider-img">
<img alt="<?php echo htmlspecialchars($tour['title']); ?>" src="admin/codes/<?php echo $image ?: $dummyImage; ?>"/>
</div>
</div>
                                    <?php endforeach; ?>
                                </div>
</div>
<div class="swiper th-slider tour-thumb-slider" data-slider-options='{"effect":"slide","loop":true,"breakpoints":{"0":{"slidesPerView":2},"576":{"slidesPerView":"2"},"768":{"slidesPerView":"3"},"992":{"slidesPerView":"3"},"1200":{"slidesPerView":"3"}},"autoplayDisableOnInteraction":"true"}'>
<div class="swiper-wrapper">
                                    <?php foreach ($images as $image): ?>
                                    <div class="swiper-slide">
<div class="tour-slider-img small-slider">
<img alt="<?php echo htmlspecialchars($tour['title']); ?>" src="admin/codes/<?php echo $image ?: $dummyImage; ?>"/>
</div>
</div>
                                    <?php endforeach; ?>
                                </div>
</div>
<button class="slider-arrow style3 slider-prev" data-slider-prev="#tourSlider4">
<img alt="" src="assets/img/icon/hero-arrow-left.svg"/>
</button>
<button class="slider-arrow style3 slider-next" data-slider-next="#tourSlider4">
<img alt="" src="assets/img/icon/hero-arrow-right.svg"/>
</button>
</div>
</div>
</div>
<div class="col-lg-5">
<div class="resort-content">
<h3 class="box-title"><a href="#"><?php echo htmlspecialchars($tour['title']); ?></a></h3>
<h4 class="resort-price">
<span class="currency"><i class="fa-light fa-money-bill"></i>
                            ₹<?php echo number_format($tour['total_cost'], 2); ?></span>
</h4>
<div class="resort-list">
<ul>
<li><span class="title"><i class="fa-light fa-clock"></i> Duration:</span> 
                                    <?php echo htmlspecialchars($tour['duration']); ?>
                                </li>
<li><span class="title"><i class="fa-regular fa-user"></i> No. of persons:</span> 
                                    <?php echo $tour['number_of_persons']; ?>
                                </li>
<li><span class="title"><i class="fa-light fa-money-bill"></i> Cost:</span> 
                                    Rs. <?php echo number_format($tour['total_cost'], 2); ?>
                                </li>
<li><span class="title"><i class="fa-regular fa-info-circle"></i> Note:</span> 
                                    Cost may vary depending on seasons
                                </li>
</ul>
<div class="resort-btn mt-40">
<a class="th-btn style4 th-icon" href="contact-us.php?url=<?php echo urlencode($tour['url']); ?>">Book Now</a>
</div>
</div>
</div>
</div>
</div>
<div class="row space">
<div class="col-md-12 page-single">
<h2 class="box-title">Highlights</h2>
<ul class="resort-grid-list">
                        <?php 
                        $highlights = explode(',', $tour['highlights'] ?? '');
                        foreach ($highlights as $index => $highlight):
                            if (trim($highlight)):
                        ?>
                        <li>
<div class="resort-grid-list-icon">
<img alt="img" src="assets/img/icon/resort-icon1-<?php echo ($index % 10) + 1; ?>.svg"/>
</div>
<div class="resort-grid-list-details">
<h4 class="resort-grid-list-title"><?php echo htmlspecialchars(trim($highlight)); ?></h4>
</div>
</li>
                        <?php endif; endforeach; ?>
                    </ul>
<h2 class="box-title">Included and Excluded</h2>
<div class="destination-checklist">
                        <?php
                        $services = json_decode($tour['services'], true);
                        $includedServices = [];
                        foreach ($services as $key => $value) {
                            if (is_array($value) && !empty($value)) {
                                $includedServices = array_merge($includedServices, $value);
                            }
                        }
                        $includedServices = array_map('trim', $includedServices);

                        // Group included and excluded services by category
                        $includedByCategory = [];
                        $excludedByCategory = [];

                        foreach ($serviceCategories as $category => $items) {
                            $includedInCategory = [];
                            $excludedInCategory = [];

                            foreach ($items as $item) {
                                if (in_array($item, $includedServices)) {
                                    $includedInCategory[] = $item;
                                } else {
                                    $excludedInCategory[] = $item;
                                }
                            }

                            if (!empty($includedInCategory)) {
                                $includedByCategory[$category] = $includedInCategory;
                            }
                            if (!empty($excludedInCategory)) {
                                $excludedByCategory[$category] = $excludedInCategory;
                            }
                        }
                        ?>
                        <div class="checklist style2 style4">
<h4>Included</h4>
<ul>
                                <?php foreach ($includedByCategory as $category => $items): ?>
                                <li>
<strong><?php echo htmlspecialchars($category); ?></strong>
<ul class="pt-2">
                                        <?php foreach ($items as $item): ?>
                                        <li><?php echo htmlspecialchars($item); ?></li>
                                        <?php endforeach; ?>
                                    </ul>
</li>
                                <?php endforeach; ?>
                            </ul>
</div>
<div class="checklist style5 ms-5">
<h4>Excluded</h4>
<ul>
                                <?php foreach ($excludedByCategory as $category => $items): ?>
                                <li>
<strong><?php echo htmlspecialchars($category); ?></strong>
                                    <?php if (!empty($items)): ?>
                                    <ul class="pt-2">
                                        <?php foreach ($items as $item): ?>
                                        <li><?php echo htmlspecialchars($item); ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                    <?php endif; ?>
                                </li>
                                <?php endforeach; ?>
                            </ul>
</div>
</div>
<h2 class="box-title">Itinerary</h2>
<div class="itinerary-content">
                        <?php echo $tour['long_description']; ?>
                    </div>
</div>
</div>
</div>
</section>

    <?php else: ?>
    <section class="space">
<div class="container">
<div class="row">
<div class="col-md-12">
<h3>Tour Not Found</h3>
<p>Sorry, we couldn't find the tour you're looking for.</p>
<a class="th-btn" href="tours.php">Browse All Tours</a>
</div>
</div>
</div>
</section>
    <?php endif; ?>

    <?php include_once('footer.php'); ?>
</body>