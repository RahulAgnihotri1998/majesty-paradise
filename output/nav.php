<?php include('./admin/codes/db.php'); ?>

<!-- Query to fetch active package categories -->
<?php
$categoryQuery = "SELECT * FROM brand WHERE status = 'active'";
$categoryResult = $db->query($categoryQuery);

// Query to fetch active packages
$packageQuery = "SELECT * FROM products WHERE status = 'active'";
$packageResult = $db->query($packageQuery);

// Store packages in an array for easier matching
$packages = [];
if ($packageResult->num_rows > 0) {
    while ($row = $packageResult->fetch_assoc()) {
        $packages[] = $row;
    }
}
?>

<style>
  .cke_notification {
    display: none !important;
  }
  .cke_notification_warning {
    display: none !important;
  }
</style>
<div class="sidemenu-wrapper sidemenu-info">
<div class="sidemenu-content">
<button class="closeButton sideMenuCls">
<i class="far fa-times"></i>
</button>
<div class="mobile-logo">
<a href="/">
<img alt="Majesty Paradise" class="logo1" src="optimized_images\majestyparadise-logo-hd-transparent.webp"/>
</a>
</div>
<div class="th-mobile-menu">
<ul>
<li>
<a class="active" href="index.php">Home</a>
</li>
<li>
<a href="about-us.php">About Us</a>
</li>
<li class="menu-item-has-children">
<a href="#">Packages</a>
<ul class="sub-menu">
            <?php if ($categoryResult->num_rows > 0): ?>
              <?php foreach ($categoryResult as $category): ?>
                <li class="">
<a href="&lt;?= 'package.php?url=' . htmlspecialchars($category['url']) ?&gt;"><?= htmlspecialchars($category['name']) ?></a>
<ul class="">
                    <?php foreach ($packages as $package): ?>
                      <?php if (stripos($package['url'], $category['url']) !== false || stripos($package['title'], $category['name']) !== false): ?>
                        <li><a href="&lt;?= 'package.php?url='. htmlspecialchars($package['url']) ?&gt;"><?= htmlspecialchars($package['title']) ?></a></li>
                      <?php endif; ?>
                    <?php endforeach; ?>
                  </ul>
</li>
              <?php endforeach; ?>
            <?php else: ?>
              <li><a href="#">No Packages Available</a></li>
            <?php endif; ?>
          </ul>
</li>
<li>
<a href="contact-us.php">Contact us</a>
</li>
</ul>
</div>
</div>
</div>
<div class="popup-search-box">
<button class="searchClose"><i class="fal fa-times"></i></button>
<form action="#">
<input placeholder="What are you looking for?" type="text"/>
<button type="submit"><i class="fal fa-search"></i></button>
</form>
</div>
<div class="th-menu-wrapper onepage-nav">
<div class="th-menu-area text-center">
<button class="th-menu-toggle"><i class="fal fa-times"></i></button>
<div class="mobile-logo">
<a href="/">
<img alt="Majesty Paradise" class="logo1" src="optimized_images\majestyparadise-logo-hd-transparent.webp"/>
</a>
</div>
<div class="th-mobile-menu">
<ul>
<li class="mega-menu-wrap">
<a class="active" href="index.php">Home</a>
</li>
<li><a href="about-us.php">About Us</a></li>
<li class="menu-item-has-children">
<a href="#">Packages</a>
<ul class="sub-menu">
            <?php if ($categoryResult->num_rows > 0): ?>
              <?php foreach ($categoryResult as $category): ?>
                <li class="">
<a href="&lt;?= 'package.php?url=' . htmlspecialchars($category['url']) ?&gt;"><?= htmlspecialchars($category['name']) ?></a>
<ul class="">
                    <?php foreach ($packages as $package): ?>
                      <?php if (stripos($package['url'], $category['url']) !== false || stripos($package['title'], $category['name']) !== false): ?>
                        <li><a href="&lt;?= 'package.php?url='. htmlspecialchars($package['url']) ?&gt;"><?= htmlspecialchars($package['title']) ?></a></li>
                      <?php endif; ?>
                    <?php endforeach; ?>
                  </ul>
</li>
              <?php endforeach; ?>
            <?php else: ?>
              <li><a href="#">No Packages Available</a></li>
            <?php endif; ?>
          </ul>
</li>
<li><a href="contact-us.php">Contact us</a></li>
</ul>
</div>
</div>
</div>
<header class="th-header header-layout1 header-layout4 header-layout7">
<style>
    .logo1 {
      width: 233px;
      height: 93px;
      object-fit: contain;
    }
    .header-layout1 .sticky-wrapper .menu-area {
      padding: 0px 0;
    }
    @media (max-width: 768px) {
      .logo1 {
        height: 80px !important;
      }
    }
  </style>
<div class="sticky-wrapper">
<div class="menu-area">
<div class="container th-container">
<div class="row align-items-center justify-content-between">
<div class="col-auto">
<div class="header-logo">
<a href="/">
<img alt="Majesty Paradise" class="logo1" src="optimized_images\majestyparadise-logo-hd-transparent.webp"/>
</a>
</div>
</div>
<div class="col-auto">
<nav class="main-menu d-none d-xl-inline-block">
<ul>
<li class="menu-item-has-children mega-menu-wrap">
<a class="active" href="index.php">Home</a>
</li>
<li><a href="about-us.php">About Us</a></li>
<li class="menu-item-has-children">
<a href="#">Packages</a>
<ul class="sub-menu">
                    <?php if ($categoryResult->num_rows > 0): ?>
                      <?php foreach ($categoryResult as $category): ?>
                        <li class="">
<a href="&lt;?= 'package.php?url=' . htmlspecialchars($category['url']) ?&gt;"><?= htmlspecialchars($category['name']) ?></a>
<ul class="">
                            <?php foreach ($packages as $package): ?>
                              <?php if (stripos($package['url'], $category['url']) !== false || stripos($package['title'], $category['name']) !== false): ?>
                                <li><a href="&lt;?= 'package.php?url='. htmlspecialchars($package['url']) ?&gt;"><?= htmlspecialchars($package['title']) ?></a></li>
                              <?php endif; ?>
                            <?php endforeach; ?>
                          </ul>
</li>
                      <?php endforeach; ?>
                    <?php else: ?>
                      <li><a href="#">No Packages Available</a></li>
                    <?php endif; ?>
                  </ul>
</li>
<li><a href="contact-us.php">Contact us</a></li>
</ul>
</nav>
<button class="th-menu-toggle d-block d-xl-none" type="button">
<i class="far fa-bars"></i>
</button>
</div>
<div class="col-auto d-none d-xl-block">
<div class="header-button">
<a class="th-btn style3 style1 th-icon" href="contact-us.php">Book Now</a>
</div>
</div>
</div>
</div>
<div class="logo-bg" data-mask-src="assets/img/logo_bg_mask.png"></div>
<div class="menu-right-bg" data-mask-src="assets/img/menu_bg_mask.png"></div>
</div>
</div>
</header>