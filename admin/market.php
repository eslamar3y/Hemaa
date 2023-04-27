<?php
// session_start();
// $id=$_SESSION['id'];
// $fname=$_SESSION['fname'];
// $admin=$_SESSION['admin'];
// if(!$id || $admin == 0)
// {
//   header("Location: ../index.php");
// }
?>
<?php
$status=0;
require_once("../connection.php");
if(isset($_GET['status'])) {
	$status = $_GET['status'];
	// do something with the number here
}

    
?>
<!DOCTYPE html>
<html lang="ar">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Hemma Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="./assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="./assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End Plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="./assets/css/style.css">
    <!-- End layout styles -->
    <link href="../assets/img/favicon.png" rel="icon" />
    <style>
      td
        {
            white-space:break-spaces !important;
        }
        input:hover
        {
          color: #fff !important;
        }
        textarea:hover
        {
          color: #fff !important;
        }
        @media (max-width: 1330px) 
        {
          .tableDev
          {
            overflow-x: scroll;
          }
        }
    </style>
     
  </head>
  <body>
    
    <div class="container-scroller">
      <!-- partial:./partials/_sidebar.php -->
      <!-- partial:partials/_sidebar.php -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
          <a class="sidebar-brand brand-logo" style="display: contents;" href="index.php"><h1 style="color: #fff;">همه</h1></a>
          <a class="sidebar-brand brand-logo-mini"  href="index.php"><h1 style="color: #fff;">همه</h1></a>
        </div>
        <ul class="nav">
          <li class="nav-item profile">
            <div class="profile-desc">
              <div class="profile-pic">
                <div class="count-indicator">
                  <img class="img-xs rounded-circle " src="assets/images/faces/face15.jpg" alt="">
                  <span class="count bg-success"></span>
                </div>
                <div class="profile-name">
                  <h5 class="mb-0 font-weight-normal">
                    ادمن
                </h5>
                  <span>ادمن</span>
                </div>
              </div>
              
            </div>
          </li>
          <li class="nav-item nav-category">
            <span class="nav-link">اختيارات</span>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="index.php">
              <span class="menu-icon">
                <i class="mdi mdi-speedometer"></i>
              </span>
              <span class="menu-title">مرحبا</span>
            </a>
          </li>
          <!-- In Use -->
          <!-- الخدمات -->
          <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#cars" aria-expanded="false" aria-controls="cars">
              <span class="menu-icon">
                <i class="mdi mdi-car"></i>
              </span>
              <span class="menu-title">الخدمات</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="cars">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="public_services.php">خدمات عامة</a></li>
                <li class="nav-item"> <a class="nav-link" href="restaurants.php">مطاعم</a></li>
                <li class="nav-item"> <a class="nav-link" href="pharmacies.php">صيدليات</a></li>
                <li class="nav-item"> <a class="nav-link" href="market.php">سوبر ماركت</a></li>
              </ul>
            </div>
            </li>
          
            <!-- اضافة خدمة -->
          
            <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#add" aria-expanded="false" aria-controls="add">
              <span class="menu-icon">
                <i class="mdi mdi-car"></i>
              </span>
              <span class="menu-title">إضافة خدمة</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="add">
              <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="add_public.php">اضافة خدمة عامة</a></li>
              <li class="nav-item"> <a class="nav-link" href="add_restaurant.php">اضافة مطعم</a></li>
              <li class="nav-item"> <a class="nav-link" href="add_pharmacy.php">اضافة صيدلية</a></li>
              <li class="nav-item"> <a class="nav-link" href="add_supermark.php">اضافة سوبر ماركت</a></li>
              </ul>
            </div>
            </li>
              <!-- نهاية اضافة الخدمة -->
              <!-- ارشادات -->
              <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#instruc" aria-expanded="false" aria-controls="instruc">
              <span class="menu-icon">
                <i class="mdi mdi-car"></i>
              </span>
              <span class="menu-title">ارشادات</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="instruc">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="show_instruc.php">كل الارشادات</a></li>
                <li class="nav-item"> <a class="nav-link" href="add_instruc.php">اضافة ارشاد</a></li>
              </ul>
            </div>
            </li>
              <!-- نهية ارشادات-->
              <!-- مراكز -->
              <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#cent" aria-expanded="false" aria-controls="cent">
              <span class="menu-icon">
                <i class="mdi mdi-car"></i>
              </span>
              <span class="menu-title">المراكز</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="cent">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="show_center.php">كل المراكز</a></li>
                <li class="nav-item"> <a class="nav-link" href="add_center.php">اضافة مركز</a></li>
              </ul>
            </div>
            </li>
              <!-- نهاية المراكز -->
              <!-- بداية تواصل معنا -->
              <li class="nav-item menu-items">
            <a class="nav-link" href="messages.php">
              <span class="menu-icon">
                <i class="mdi mdi-message"></i>
              </span>
              <span class="menu-title">تواصل معنا</span>
            </a>
          </li>
          <!-- نهاية تواصل معنا -->
          
              
        </ul>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.php -->
        <nav class="navbar p-0 fixed-top d-flex flex-row">
          <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
            <a class="navbar-brand brand-logo-mini"  href="index.php"><h1 style="color: #fff;margin-right:30px">همه</h1></a>
          </div>
          <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
              <span class="mdi mdi-menu"></span>
            </button>
            
            <ul class="navbar-nav navbar-nav-right">
              
              <li class="nav-item dropdown">
                <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown">
                  <div class="navbar-profile">
                    <img class="img-xs rounded-circle" src="assets/images/faces/face15.jpg" alt="">
                    <p class="mb-0 d-none d-sm-block navbar-profile-name">
                      ادمن
                    </p>
                    <i class="mdi mdi-menu-down d-none d-sm-block"></i>
                  </div>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="profileDropdown">
                
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item" href="../Logout.php">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-logout text-danger"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject mb-1">تسجيل الخروج</p>
                    </div>
                  </a>
                </div>
              </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
              <span class="mdi mdi-format-line-spacing"></span>
            </button>
          </div>
        </nav>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="tableDev">
              <table class="table table-dark table-columns">
            </div>
                <thead>
                  <th>#</th>
                  <th>الاسم</th>
                  <th>التفاصيل</th>
                  <th>الجوال</th>
                  <th>الرابط</th>
                  <th>صوره</th>
                  <th colspan="2" style="text-align: center">Actions</th>
                </thead>
                <tbody>
                  <?php
                  $query = "SELECT * FROM `markets`";
              
                  $result = mysqli_query($conn, $query);
                  while ($row = mysqli_fetch_array($result)) 
                  {
                  ?>
                    <tr>
                        <td><?=$row['market_id']?></td>
                        <td><?=$row['name']?></td>
                        <td><?=$row['details']?></td>
                        <td><?=$row['phone']?></td>
                        <td><?=$row['link']?></td>
                        <td><img class="img-responsive" style="width: 100px;height: 100px;" src="../assets/img/markets/<?=$row['image']?>" alt=""></td>
                        
                        <td><a onclick="return confirm('هل تريد حذف صيدلية  <?=$row['name']?>')" href="delete_market.php?id=<?=$row['market_id']?>" class="btn btn-danger">حذف</a></td>
                        <td><a class="btn btn-warning"  href="update_market.php?id=<?=$row['market_id']?>">تعديل</a></td>
                        
                    </tr>
                    <?php
                  }
                    ?>
                </tbody>
              </table>
        </div>
          <!-- content-wrapper ends -->
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    
</div>
    <!-- plugins:js -->
    <script src="./assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="./assets/js/off-canvas.js"></script>
    <script src="./assets/js/hoverable-collapse.js"></script>
    <script src="./assets/js/misc.js"></script>
    <script src="./assets/js/settings.js"></script>
    <script src="./assets/js/todolist.js"></script>
    <script src="./assets/js/bootstrap.bundle.min.js"></script>
    <script src="../js/sweetalert.min.js"></script>
    <!-- endinject -->
    <?php
    if ($status =='Added')
    {
      ?>
      <script>
        swal("Done!", "Car Added Succesfully!", "success");
      </script>
      <?php
    }
    if ($status =='Updated')
    {
      ?>
      <script>
        swal("Done!", "Car Updated Succesfully!", "success");
      </script>
      <?php
    }
    ?>
  </body>
</html>
