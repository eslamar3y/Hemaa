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
$id=0;
require_once("../connection.php");
if(isset($_GET['id'])) {
	$id = $_GET['id'];
	// do something with the number here
}
  function getfeature($featuresrow, $feature, $name)
  {
    if($featuresrow[$feature]==1)
    {
      ?>
      <input type="checkbox" checked name="<?=$feature?>" class="form-control" id="examplecarimage" placeholder=""> <?=$name?>
      <?php
    }
    else
    {
      ?>
      <input type="checkbox" name="<?=$feature?>" class="form-control" id="examplecarimage" placeholder=""> <?=$name?>
      <?php
    }
  }

  if($_SERVER['REQUEST_METHOD']=='POST')
{
  
  // basic
  $service_name = mysqli_escape_string($conn, $_POST['service_name']);
  $service_type = mysqli_escape_string($conn, $_POST['service_type']);
  $details = mysqli_escape_string($conn, $_POST['details']);
  $phone = mysqli_escape_string($conn, $_POST['phone']);
  $Link = mysqli_escape_string($conn, $_POST['Link']);
  

  

  
  $Query = "UPDATE `public_services` SET `service_name`='$service_name',`service_type`='$service_type',`details`='$details',`phone`='$phone',`Link`='$Link' where `service_id` = $id";

  if(mysqli_query($conn, $Query))
  {
    header("Location: public_services.php?status=Updated");
  }
  else
  {
    ?>
    <script>
			swal("Error!", "An Error Occured, please try again!", "danger");
		</script>
		<?php
  }

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
    <link rel="stylesheet" href="./assets/css/style.css">
    <!-- End layout styles -->
    <link href="../assets/img/favicon.png" rel="icon" />
    <style>
        .div_center{
            text-align: center;
            padding-top:40px;
        }
        .div_center h1{
            font-size:20px;
            font-weight:bold;
        }
        .form-control{
            background-color: #2A3035 !important;
        }
        .form-control:focus{
            color: #fff !important;
        }

        table{
            margin-top: 20px;
        }
        table th{
            color: rgb(240, 239, 239) !important;
        }
        table tbody{
            color: rgb(174, 172, 172) !important;
        }
        #examplecarcategory{
            width: 100%;
            height: 40px;
            background-color: #2a3035;
            color: #fff !important;
            cursor: pointer;
        }
        #examplecarimage{
            height: fit-content;
            cursor: pointer;
        }
        input,select{
            border-radius: 10px !important;
        }
        .btntn{
            height: 40px;
            width: 120px;
            margin-left: auto;
            margin-right: 30px;
        }
        input[type="file"]
        {
            width: 95.5%;
            margin-left: 1%;
        }
    </style>
  </head>
  <body>
    <div class="container-scroller">
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
            <?php
              $select="SELECT * FROM `public_services` WHERE `service_id` =" .$id. " LIMIT 1";
              $result=mysqli_query($conn,$select);
              $row=mysqli_fetch_assoc($result);

              // $select2="SELECT * FROM `features` WHERE `car_id` =" .$id. " LIMIT 1";
              // $result2=mysqli_query($conn,$select2);
              // $featuresrow=mysqli_fetch_assoc($result2);
              ?>
            <form action="" method="POST" >
            <div class="div_center">
                <div class="col-md-12">
                    <div class="card">
                      <div class="card-body">
                        <h1 class="card-title">تحديث الخدمة</h1>
                          <div class="form-group row">
                            <label for="exampletitle" class="col-sm-3 col-form-label">اسم الخدمة</label>
                            <div class="col-sm-9">
                              <input name="service_name" type="text" class="form-control" id="exampletitle" value="<?= $row['service_name'] ?>" placeholder="" required>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="exampletitle" class="col-sm-3 col-form-label">نوع الخدمة</label>
                            <div class="col-sm-9">
                              <input name="service_type" type="text" class="form-control" id="exampletitle" value="<?= $row['service_type'] ?>" placeholder="" required>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="exampledescription" class="col-sm-3 col-form-label">التفاصيل</label>
                            <div class="col-sm-9">
                              <textarea name="details" style="height: 120px" type="text" class="form-control" id="" required><?= $row['details'] ?></textarea>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="exampleprice" class="col-sm-3 col-form-label">الجوال</label>
                            <div class="col-sm-9">
                              <input name="phone" type="text" max="5" min="1" class="form-control" value="<?= $row['phone'] ?>" id="exampleprice" placeholder="">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="exampleprice" class="col-sm-3 col-form-label">الرابط</label>
                            <div class="col-sm-9">
                              <input name="Link" type="text" class="form-control" value="<?= $row['Link'] ?>" id="exampleprice" placeholder="">
                            </div>
                          </div>
                        </div>
                        
                        <button type="submit" class=" btntn btn btn-primary">تعديل</button>
                        </div>
                        
                        </div>
                    </div>
                </div>
            </form>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
</div>
    <script src="./assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="./assets/js/off-canvas.js"></script>
    <script src="./assets/js/hoverable-collapse.js"></script>
    <script src="./assets/js/misc.js"></script>
    <script src="./assets/js/settings.js"></script>
    <script src="./assets/js/todolist.js"></script>
    <script src="js/sweetalert.min.js"></script>
    <!-- endinject -->
  </body>
</html>
<?php

?>