
<?php

$number=0;
require_once("connection.php");
if(isset($_GET['id'])) {
	$id = $_GET['id'];
	// do something with the number here
}
$sql = "SELECT * FROM contact WHERE id = '$id'";
$result = mysqli_query($conn, $sql);
?>



<!DOCTYPE html>
<html lang="ar" dir='rtl'>

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Hemaa</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="index.php" class="logo d-flex align-items-center">
      <img src="assets/img/logo.png" alt="" />
        <span id="logoname">&nbsp;&nbsp;همه</span>
      </a>

      <nav id="navbar" class="navbar">
        <ul>
        <li>
            <a class="nav-link scrollto active" href="index.php">الرئيسية</a>
          </li>
          <li>
            <a class="nav-link scrollto" href="services.php">الخدمات</a>
          </li>
          <li>
            <a class="nav-link scrollto" href="portfolio.php">المراكز</a>
          </li>
          <li>
            <a class="nav-link scrollto" href="instructions.php">الارشادات</a>
          </li>
          <li><a class="nav-link scrollto" href="index.php#about">من نحن</a></li>
          <li><a class="nav-link scrollto" href="index.php#contact">تواصل معنا</a></li>
          <?php
			  	session_start();
				if($_SESSION)
				{
					?>
					<li class="nav-item dropdown">
          <a class="nav-link" id="profileDropdown" href="notifications.php" data-toggle="dropdown">
						<div class="navbar-profile">
							<p class="mb-0 d-none d-sm-block navbar-profile-name">اشعارات</p>
						</div>
						</a>
          </li>
					<li class="nav-item dropdown">
						<a class="nav-link" id="profileDropdown" href="./Logout.php" data-toggle="dropdown">
						<div class="navbar-profile">
							<p class="mb-0 d-none d-sm-block navbar-profile-name">خروج</p>
						</div>
						</a>
						<div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="profileDropdown">
						
						<a class="dropdown-item preview-item" href="./Logout.php" style="cursor: pointer">
							<div class="preview-thumbnail">
							<div class="preview-icon bg-dark rounded-circle">
								<i class="mdi mdi-logout text-danger"></i>
							</div>
							</div>
							<div class="preview-item-content">
							<p class="preview-subject mb-1">خروج</p>
							</div>
						</a>
						</div>
					</li>
          
					<?php
				}
				else
				{
					?>
					<li class="nav-item"><a href="admin/login.php" class="nav-link">دخول</a></li>
					<?php
				}
			  ?>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="index.php">الرئيسية</a></li>
          <li><a href="notifications.php">الاشعارات</a></li>
          <li>رساله</li>
        </ol>
        <h2>تفاصيل</h2>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Blog Single Section ======= -->
    <?php
      while($row = mysqli_fetch_assoc($result)) 
      {
    ?>
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">

        <div class="row">

          <div class="col-lg-12 entries">

            <article class="entry entry-single">

              <div class="entry-img">
                <img src="assets/img//diseases/" alt="" style="width:100%" class="img-fluid">
              </div>

              <h2 class="entry-title">
                <a href="#"><?= $row['subject']?></a>
              </h2>

              <div class="entry-content" >
                <p style="line-height: 3 !important;">
                <?= $row['message']?>
                </p>

                
                <blockquote>
                   
                  <?php
                  if($row['respond'])
                  {
                    echo "الرد: ";
                  }
                  ?>
                  <p style="font-style:normal !important">
                  <?php
                  if($row['respond'])
                  {
                      echo $row['respond'];
                  }
                  else
                  {
                    echo "لم يتم الرد بعد";
                  }
                  ?>
                  
                </p>
                </blockquote>
                

            </article><!-- End blog entry -->

            

          </div><!-- End blog entries list -->

          

        </div>

      </div>
    </section>
    <?php 
    }
    ?>
    <!-- End Blog Single Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-5 col-md-12 footer-info">
            <a href="index.php" class="logo d-flex align-items-center">
              <img src="assets/img/logo.png" alt="" />
              <span>&nbsp;&nbsp;همه</span>
            </a>
            <p>
              منظمة تأسست لتوفير الرعاية والدعم والخدمات للأفراد الذين يعانون
              من إعاقة بدنية أو ذهنية أو تعليمية أو اجتماعية. وتهدف المنظمة
              إلى تحسين جودة حياة هؤلاء الأفراد وتقديم الدعم اللازم لهم
              ولأسرهم لتمكينهم من الاندماج في المجتمع بصورة أفضل.
            </p>
            <div class="social-links mt-3">
              <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
              <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
              <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
              <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
            </div>
          </div>

          <div class="col-lg-2 col-6 footer-links">
            <h4>صفحات مهمة</h4>
            <ul>
              <li>
                <i class="bi bi-chevron-right"></i> <a href="index.php">الرئيسية</a>
              </li>
              <li>
                <i class="bi bi-chevron-right"></i> <a href="services.php">خدمات</a>
              </li>
              <li>
                <i class="bi bi-chevron-right"></i> <a href="portfolio.php">مراكز</a>
              </li>
            </ul>
          </div>

          <div class="col-lg-2 col-6 footer-links">
            <h4>الخدمات</h4>
            <ul>
              <li>
                <i class="bi bi-chevron-right"></i> <a href="pharmacies.php">صيدليات</a>
              </li>
              <li>
                <i class="bi bi-chevron-right"></i>
                <a href="restaurants.php">مطاعم</a>
              </li>
              <li>
                <i class="bi bi-chevron-right"></i>
                <a href="markets.php">سوبر ماركت</a>
              </li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
            <h4>تواصل معنا</h4>
            <p>
              <strong>جوال :</strong> 01100000000<br />
              <strong>بريد الكتروني :</strong> Hmm@example.com<br />
            </p>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- End Footer -->
  <?php 
    require_once('float.php')
?>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>