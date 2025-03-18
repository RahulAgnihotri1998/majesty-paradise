<?php include_once('header.php'); ?>

<body>
    <?php include_once('nav.php'); ?>

    <div class="breadcumb-wrapper background-image"
        style="background-image: url(&quot;assets/img/bg/breadcumb-bg.jpg&quot;);">
        <div class="container">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">Package</h1>
                <ul class="breadcumb-menu">
                    <li><a href="index.php">Home</a></li>
                    <li>Package</li>
                </ul>
            </div>
        </div>
    </div>
    <?php
    include('./admin/codes/db.php'); 
// Include the database connection file


// Get the category URL from the query string (e.g., ?url=adventure-tours)
$categoryUrl = isset($_GET['url']) ? $_GET['url'] : null;

// Define a dummy image path
$dummyImage = 'assets/img/tour/dummy-image.jpg'; // Adjust to your dummy image path

// Fetch the category ID based on the URL
$categoryId = null;
if ($categoryUrl) {
    $categoryQuery = $db->prepare("SELECT id FROM brand WHERE url = ? AND status = 'active'");
    $categoryQuery->bind_param('s', $categoryUrl);
    $categoryQuery->execute();
    $categoryResult = $categoryQuery->get_result();
    if ($categoryResult->num_rows > 0) {
        $category = $categoryResult->fetch_assoc();
        $categoryId = $category['id'];
    }
    $categoryQuery->close();
}

// Query to fetch active packages for the specific category
$packageQuery = "SELECT * FROM products WHERE status = 'active'";
if ($categoryId) {
    $packageQuery .= " AND brand_id = " . (int)$categoryId; // Add category filter
}
$packageResult = $db->query($packageQuery);
?>

<style>
     .bg-title {
            background-color: #f5e0c3 !important;
        }
</style>
<section class="space">
    <div class="container">
        <div class="th-sort-bar">
            <!-- Add sorting options here if needed -->
        </div>
        <div class="row">
            <div class="col-xxl-12 col-lg-8">
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade active show" id="tab-grid" role="tabpanel" aria-labelledby="tab-destination-grid">
                        <div class="row gy-30">
                            <?php if ($packageResult->num_rows > 0): ?>
                                <?php foreach ($packageResult as $package): ?>
                                    <div class="col-xxl-4 col-xl-6">
                                        <div class="tour-box th-ani">
                                            <div class="tour-box_img global-img">
                                                <img src="<?= !empty($package['main_image']) ? 'admin/codes/'. htmlspecialchars($package['main_image']) : Base_url . $dummyImage ?>" alt="package image">
                                            </div>
                                            <div class="tour-content">
                                                <h3 class="box-title">
                                                    <a href="package-details.php?url=<?php echo urlencode($package['url']); ?>"><?= htmlspecialchars($package['title']) ?></a>
                                                </h3>
                                                <div class="tour-rating">
                                                    <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5">
                                                        <span style="width:100%">Rated <strong class="rating">5.00</strong> out of 5 based on <span class="rating">4.8</span>(4.8 Rating)</span>
                                                    </div>
                                                    <a href="<?= Base_url . htmlspecialchars($package['url']) ?>" class="woocommerce-review-link">(<span class="count">4.8</span> Rating)</a>
                                                </div>
                                                <h4 class="tour-box_price">
                                                    <span class="currency">₹<?= number_format($package['total_cost'], 2) ?></span>
                                                </h4>
                                                <div class="tour-action">
                                                    <span><i class="fa-light fa-clock"></i><?= htmlspecialchars($package['duration']) ?></span>
                                                    <a href="package-details.php?url=<?php echo urlencode($package['url']); ?>" class="th-btn style4 th-icon">View Package</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <div class="col-12">
                                    <p>No active packages available at this time.</p>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <!-- Keeping the list view static for now, let me know if you want it dynamic too -->
                    <div class="tab-pane fade" id="tab-list" role="tabpanel" aria-labelledby="tab-destination-list">
                        <div class="row gy-30">
                            <div class="col-12">
                                <div class="tour-box style-flex th-ani">
                                    <div class="tour-box_img global-img"><img src="assets/img/tour/tour_3_1.jpg" alt="image"></div>
                                    <div class="tour-content">
                                        <h3 class="box-title"><a href="destination-details.html">Dubai</a></h3>
                                        <div class="tour-rating">
                                            <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5">
                                                <span style="width:100%">Rated <strong class="rating">5.00</strong> out of 5 based on <span class="rating">4.8</span>(4.8 Rating)</span>
                                            </div>
                                            <a href="destination-details.html" class="woocommerce-review-link">(<span class="count">4.8</span> Rating)</a>
                                        </div>
                                        <h4 class="tour-box_price"><span class="currency">$980.00</span>/Person</h4>
                                        <div class="tour-action">
                                            <span><i class="fa-light fa-clock"></i>7 Days</span>
                                            <a href="contact.html" class="th-btn style4 th-icon">Book Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Add more static list items if needed -->
                        </div>
                    </div>
                </div>
                <!-- <div class="th-pagination text-center mt-60 mb-0">
                    <ul>
                        <li><a class="active" href="destination.html">1</a></li>
                        <li><a href="destination.html">2</a></li>
                        <li><a href="destination.html">3</a></li>
                        <li><a href="destination.html">4</a></li>
                        <li><a class="next-page" href="destination.html">Next <img src="assets/img/icon/arrow-right4.svg" alt=""></a></li>
                    </ul>
                </div> -->
            </div>
        </div>
    </div>
</section>

<?php
// Close the database connection
$db->close();
?>

    <?php include_once('footer.php'); ?>