<?php
$status=0;
require_once("./connection.php");
if(isset($_GET['status'])) {
	$status = $_GET['status'];
	// do something with the number here
}
// define variables to empty values  
$nameErr = $subjErr =  "";  
$name = $subject= "";  
  
//Input fields validation  
if ($_SERVER["REQUEST_METHOD"] == "POST") {  
      
//String Validation  
    if (empty($_POST["name"])) 
    {  
        $nameErr = "Name is required";  
    } 
    else 
    {  
        $name = input_data($_POST["name"]);  
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z]+$/",$name)) {  
            $nameErr = "حروف فقط";  
        }
    }

    if (empty($_POST["subject"])) 
    {  
        $subjErr = "subject is required";  
    } 
    else 
    {  
        $subject = input_data($_POST["subject"]);
        if (preg_match("/^[1-9]+$/",$subject)) {  
          $subjErr = "حروف فقط";
        }
    }
    if($nameErr=="" && $subjErr=="")
    {
      require_once('connection.php');
      // basic
      session_start();
	    if($_SESSION)
      {
        $user_id = $_SESSION['id'];
      }
      $user_id = mysqli_escape_string($conn, $_POST['id']);
      $name = mysqli_escape_string($conn, $_POST['name']);
      $email = mysqli_escape_string($conn, $_POST['email']);
      $address = mysqli_escape_string($conn, $_POST['address']);
      $subject = mysqli_escape_string($conn, $_POST['subject']);
      $message = mysqli_escape_string($conn, $_POST['message']);
      $Query = "Insert into contact (name, email, address,subject, message, user_id) values ('$name', '$email', '$address','$subject', '$message', '$user_id')";
      $result=mysqli_query($conn,$Query);
      header("Location: index.php?status=Added");
    }
  }
  function input_data($data) {  
    $data = trim($data);  
    $data = stripslashes($data);  
    $data = htmlspecialchars($data);  
    return $data;  
  }
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />

  <title>Hemaa</title>
  <meta content="" name="description" />

  <meta content="" name="keywords" />

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon" />
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon" />

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet" />

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet" />
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet" />
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet" />
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet" />
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet" />

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet" />
  <style>
    .error {
      margin-right: 15px;
      color: #818181;
    }
  </style>
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
					<li >
                        <a class="nav-link" href="notifications.php">
						    اشعارات
						</a>
                    </li>
					<li>
						<a class="nav-link" href="./Logout.php">
						خروج
						</a>
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
      </nav>
      <!-- .navbar -->
    </div>
  </header>
  <!-- End Header -->



  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero d-flex align-items-center">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center">
          <h1 data-aos="fade-up">معنا ستجد كل ما تحتاجه</h1>
          <h2 data-aos="fade-up" data-aos-delay="400">
            مع نخبة من الخبراء والاستشاريين متواجدين دائما للمساعده
          </h2>
          <div data-aos="fade-up" data-aos-delay="600" style="display: flex;justify-content: center;">
            <div class="text-center">
              <a href="#about" class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                <i class="bi bi-arrow-right"></i>
                <span>ابدأ التجربه</span>
              </a>
            </div>
            &nbsp;
            <div class="text-center">
              <a href="https://m.youtube.com/watch?v=bOXMFzyW-cc" target="_blanck" style="background-color: #fff; color: #4154f1; border:1px solid #4154f1" class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                <i class="bi bi-arrow-right"></i>
                <span>فيديو</span>
              </a>
            </div>
          </div>
        </div>
        <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
          <img src="assets/img/hero-img.png" class="img-fluid" alt="" />
        </div>
      </div>
    </div>
  </section>
  <!-- End Hero -->

  <main id="main">
    <!-- ======= Values Section ======= -->
    <section id="values" class="values">
      <div class="container" data-aos="fade-up">
        <header class="section-header">
          <h2>المراكز</h2>
          <p>اسرع خدمة و افضل جودة</p>
        </header>

        <div class="row">
          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
            <div class="box">
              <img src="assets/img/values-1.png" class="img-fluid" alt="" />
              <h3>مراكز تأهيلية</h3>
              <p>
                مؤسسات تقدم خدمات تدريبية وتعليمية واجتماعية ونفسية للأشخاص
                ذوي الاحتياجات الخاصة، بهدف تنمية قدراتهم وتطوير مهاراتهم
                لتحقيق الاندماج والاستقلالية في المجتمع.
              </p>
            </div>
          </div>

          <div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="400">
            <div class="box">
              <img src="assets/img/values-2.png" class="img-fluid" alt="" />
              <h3>مراكز ترفيهية</h3>
              <p>
                مراكز تقدم خدمات ترفيهية وتعليمية ورياضية وثقافية للأشخاص ذوي
                الاحتياجات الخاصة، بما يتوافق مع قدراتهم واحتياجاتهم الخاصة.
              </p>
            </div>
          </div>

          <div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="600">
            <div class="box">
              <img src="assets/img/values-3.png" class="img-fluid" alt="" />
              <h3>مراكز علاجية</h3>
              <p>
                مؤسسات تقدم خدمات علاجية وتأهيلية للأشخاص ذوي الاحتياجات
                الخاصة، بهدف تحسين وظائف الجسم والحركة والتواصل والتعلم،
                وتحقيق أعلى درجات الرعاية الصحية والنفسية والاجتماعية لهم.
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End Values Section -->

    <!-- ======= Features Section ======= -->
    <section id="features" class="features">
      <div class="container" data-aos="fade-up">
        <header class="section-header">
          <h2>خدماتنا</h2>
          <p>جودة عالية لخدمة مميزه</p>
        </header>

        <div class="row">
          <div class="col-lg-6">
            <img src="assets/img/features.png" class="img-fluid" alt="" />
          </div>

          <div class="col-lg-6 mt-5 mt-lg-0 d-flex">
            <div class="row align-self-center gy-4">
              <div class="col-md-6" data-aos="zoom-out" data-aos-delay="200">
                <div class="feature-box d-flex align-items-center" style="justify-content: space-around">
                  <i class="bi bi-check"></i>

                  <h3>جودة عالية</h3>
                </div>
              </div>

              <div class="col-md-6" data-aos="zoom-out" data-aos-delay="300">
                <div class="feature-box d-flex align-items-center" style="justify-content: space-around">
                  <i class="bi bi-check"></i>
                  <h3>احترافية متميزه</h3>
                </div>
              </div>

              <div class="col-md-6" data-aos="zoom-out" data-aos-delay="400">
                <div class="feature-box d-flex align-items-center" style="justify-content: space-around">
                  <i class="bi bi-check"></i>
                  <h3>دقة و تفاني</h3>
                </div>
              </div>

              <div class="col-md-6" data-aos="zoom-out" data-aos-delay="500">
                <div class="feature-box d-flex align-items-center" style="justify-content: space-around">
                  <i class="bi bi-check"></i>
                  <h3>رضا العملاء</h3>
                </div>
              </div>

              <div class="col-md-6" data-aos="zoom-out" data-aos-delay="600">
                <div class="feature-box d-flex align-items-center" style="justify-content: space-around">
                  <i class="bi bi-check"></i>
                  <h3>خبرة و مهاره</h3>
                </div>
              </div>

              <div class="col-md-6" data-aos="zoom-out" data-aos-delay="700">
                <div class="feature-box d-flex align-items-center" style="justify-content: space-around">
                  <i class="bi bi-check"></i>
                  <h3>تفاعل و تواصل</h3>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- End Feature Icons -->
      </div>
    </section>
    <!-- End Features Section -->

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">
        <div class="row gx-0">
          <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
            <div class="content">
              <h3>من نحن</h3>
              <h2>طلبة أنشأوا موقعًا لمساعدة ذوي الاحتياجات الخاصة.</h2>
              <p id="aboutPara">
                نحن طلاب مبادرين قمنا بتأسيس هذا الموقع لمساعدة ذوي الاحتياجات
                الخاصة وتوفير الدعم اللازم لهم. إننا ملتزمون بتقديم خدماتنا
                بأعلى مستوى من الجودة والاحترافية لتلبية احتياجات مجتمعنا
                المتنوعة وتحسين حياة أولئك الذين يعانون من صعوبات مختلفة.
              </p>
            </div>
          </div>

          <div class="col-lg-6 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
            <img src="assets/img/about.jpg" class="img-fluid" alt="" />
          </div>
        </div>
      </div>
    </section>
    <!-- End About Section -->
    <!-- End Team Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">
        <header class="section-header">
          <h2>تواصل</h2>
          <p>تواصل معنا</p>
        </header>

        <div class="row gy-4">
          <div class="col-lg-12">
            <form  method="post" class="php-email-form">
              <div class="row gy-4">
                <div class="col-md-6">
                <?php
                  if($_SESSION)
                  {
                    ?>
                  <input type="text" name="name" style="display: none !important;" class="form-control" placeholder=""  style="border-radius: 10px" value="<?=$_SESSION['id']?>" />
                  <?php
                    ?>
                  <input type="text" name="name" class="form-control" placeholder="اسمك" required style="border-radius: 10px" value="<?=$_SESSION['name']?>" />
                  <?php
                  }
                  else
                  {
                    ?>
                    <input type="text" name="name" class="form-control" placeholder="اسمك" required style="border-radius: 10px" />
                    <?php
                  }
                  ?>
                  <span class="error"> <?php echo $nameErr; ?> </span> 
                </div>

                <div class="col-md-6">
                  <?php
                  if($_SESSION)
                  {
                    ?>
                    <input type="email" class="form-control" name="email" placeholder="بريدك الالكتروني" required style="border-radius: 10px" value="<?=$_SESSION['email']?>" />
                    <?php
                  }
                  else
                  {
                    ?>
                      <input type="email" class="form-control" name="email" placeholder="بريدك الالكتروني" required style="border-radius: 10px" />
                    <?php
                  }
                  ?>
                </div>

                <div class="col-md-6">
                  <input type="text" class="form-control" name="subject" placeholder="الموضوع" required style="border-radius: 10px" />
                  <span class="error"> <?php echo $subjErr; ?> </span> 
                </div>
                <div class="col-md-6">
                  <?php
                if($_SESSION)
                  {
                    ?>
                  <input type="text" class="form-control" name="address" placeholder="العنوان" required style="border-radius: 10px"  value="<?=$_SESSION['address']?>"/>
                  <?php
                  }
                  else
                  {
                    ?>
                    <input type="text" class="form-control" name="address" placeholder="العنوان" required style="border-radius: 10px" />
                    <?php
                  }
                  ?>
                  
                </div>

                <div class="col-md-12">
                  <textarea class="form-control" name="message" rows="6" placeholder="الرساله" required style="resize: none; border-radius: 10px"></textarea>
                </div>

                <div class="col-md-12 text-center">
                  <button type="submit" onclick="succ()">ارسال</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
    <!-- End Contact Section -->
  </main>
  <!-- End #main -->

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
              <a href="./admin/login.php" class="linkedin"><i class="bi bi-door-closed"></i></a>
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
  <!-- <script src="assets/vendor/php-email-form/validate.js"></script> -->
  <script src="./assets/js/sweetalert.min.js"></script>
  <?php
    if ($status =='Added')
    {
      ?>
      <script>
        swal("تم!", "تم الارسال بنجاح!", "success");
      </script>
      <?php
    }
    ?>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <script>
    
    function succ()
    {
      document.getElementById("hid1").style.display = "none";
      document.getElementById("hid2").style.display = "none";
      document.getElementById("suc").style.display = "block";
    }
    
  </script>
  
</body>

</html>