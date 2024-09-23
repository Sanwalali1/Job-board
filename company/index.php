<?php
session_start();
if(empty($_SESSION['id_company'])) {
  header("Location: ../index.php");
  exit();
}
require_once("../db.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="utf-8">
      <meta http-equiv="x-ua-compatible" content="ie=edge">
      <title>Job board </title>
      <meta name="description" content="">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="manifest" href="site.webmanifest">
      <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

      <!-- CSS here -->
      <link rel="stylesheet" href="assets/css/bootstrap.min.css">
      <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
      <link rel="stylesheet" href="assets/css/flaticon.css">
      <link rel="stylesheet" href="assets/css/price_rangs.css">
      <link rel="stylesheet" href="assets/css/slicknav.css">
      <link rel="stylesheet" href="assets/css/animate.min.css">
      <link rel="stylesheet" href="assets/css/magnific-popup.css">
      <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
      <link rel="stylesheet" href="assets/css/themify-icons.css">
      <link rel="stylesheet" href="assets/css/slick.css">
      <link rel="stylesheet" href="assets/css/nice-select.css">
      <link rel="stylesheet" href="assets/css/style.css">
      <link rel="stylesheet" href="css/custom.css">
  
  <style>
    .nav-link {
      color: #6c757d;
      font-size: 1rem;
      padding: 10px 15px;
      border-radius: 5px;
      transition: all 0.3s ease;
    }
    .nav-link.active {
      background-color: #f8f9fa;
      color: #fb246a;
    }
    .nav-link:hover{
      background-color: #f8f9fa;
    }
    .nav-link i {
      margin-right: 10px;
    }
    .info-box {
      background-color: #f8f9fa;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
    }
    #i {
      background-color: #fb246a;
      color: white;
    }
    .info-box-content {
      margin-left: 15px;
    }
  </style>
</head>

<body>
  <!-- Preloader -->
  <div id="preloader-active">
    <div class="preloader d-flex align-items-center justify-content-center">
      <div class="preloader-inner position-relative">
        <div class="preloader-circle"></div>
        <div class="preloader-img">
          <img src="assets/img/logo/logo.png" alt="Preloader">
        </div>
      </div>
    </div>
  </div>

  <!-- Header -->
  <header class="mt-2">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-3 col-md-2">
          <div class="logo">
            <a href="index.php"><img src="assets/img/logo/logo.png" alt="Logo"></a>
          </div>
        </div>
        <div class="col-12 d-lg-none">
          <div class="mobile_menu"></div>
        </div>
      </div>
    </div>
  </header>

  <!-- Main Content Wrapper -->
  <div class="content-wrapper">
    <section id="candidates" class="content-header mt-5">
      <div class="container">
        <div class="row">
          <!-- Sidebar -->
          <div class="col-md-3">
            <div class="p-4 shadow-sm rounded">
            <h3 class="box-title">Welcome <b><?php echo $_SESSION['name']; ?></b></h3>
              <ul class="nav flex-column">
                <li class="nav-item mb-2">
                  <a class="nav-link active d-flex align-items-center" href="index.php">
                    <i class="fa fa-tachometer-alt"></i> Dashboard
                  </a>
                </li>
                <li class="nav-item mb-2">
                  <a class="nav-link d-flex align-items-center text-muted" href="edit-company.php">
                    <i class="fa fa-user"></i> My Company
                  </a>
                </li>
                <li class="nav-item mb-2">
                  <a class="nav-link d-flex align-items-center text-muted" href="create-job-post.php">
                    <i class="fa fa-briefcase"></i> Create Job Post
                  </a>
                </li>
                <li class="nav-item mb-2">
                  <a class="nav-link d-flex align-items-center text-muted" href="my-job-post.php">
                    <i class="fa fa-file-alt"></i> My Job Posts
                  </a>
                </li>
                <li class="nav-item mb-2">
                  <a class="nav-link d-flex align-items-center text-muted" href="job-applications.php">
                    <i class="fa fa-envelope"></i> Job Applications
                  </a>
                </li>
                <li class="nav-item mb-2">
                  <a class="nav-link d-flex align-items-center text-muted" href="settings.php">
                    <i class="fa fa-cog"></i> Account Settings
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link d-flex align-items-center text-muted" href="../logout.php">
                    <i class="fa fa-sign-out-alt"></i> Logout
                  </a>
                </li>
              </ul>
            </div>
          </div>

          <!-- Main Content Area -->
          <div class="col-md-9 bg-white shadow-sm rounded p-4">
            <h2>Overview</h2>
            <p>You can manage your job posts and applications in this dashboard.</p>

            <div class="row">
              <!-- Job Posts Info Box -->
              <div class="col-md-6 mb-4">
                <div class="info-box d-flex align-items-center">
                  <div class="info-box" id="i">
                    <i class="fas fa-briefcase"></i>
                  </div>
                  <div class="info-box-content">
                    <?php
                      $sql = "SELECT * FROM job_post WHERE id_company='$_SESSION[id_company]'";
                      $result = $conn->query($sql);
                      $total = ($result->num_rows > 0) ? $result->num_rows : 0;
                    ?>
                    <span class="info-box-number"><?php echo $total; ?></span>
                    <span class="info-box-text">Job Posts</span>
                  </div>
                </div>
              </div>

              <!-- Applications Info Box -->
              <div class="col-md-6 mb-4">
                <div class="info-box d-flex align-items-center">
                  <div class="info-box" id="i">
                    <i class="fas fa-users"></i>
                  </div>
                  <div class="info-box-content">
                    <?php
                      $sql = "SELECT * FROM apply_job_post WHERE id_company='$_SESSION[id_company]'";
                      $result = $conn->query($sql);
                      $total = ($result->num_rows > 0) ? $result->num_rows : 0;
                    ?>
                    <span class="info-box-number"><?php echo $total; ?></span>
                    <span class="info-box-text">Applications Received</span>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </section>
  </div>

  <!-- JS here -->

      <!-- All JS Custom Plugins Link Here here -->
      <script src="./assets/js/vendor/modernizr-3.5.0.min.js"></script>
      <!-- Jquery, Popper, Bootstrap -->
      <script src="./assets/js/vendor/jquery-1.12.4.min.js"></script>
      <script src="./assets/js/popper.min.js"></script>
      <script src="./assets/js/bootstrap.min.js"></script>
      <!-- Jquery Mobile Menu -->
      <script src="./assets/js/jquery.slicknav.min.js"></script>

      <!-- Jquery Slick , Owl-Carousel Plugins -->
      <script src="./assets/js/owl.carousel.min.js"></script>
      <script src="./assets/js/slick.min.js"></script>
      <script src="./assets/js/price_rangs.js"></script>

      <!-- One Page, Animated-HeadLin -->
      <script src="./assets/js/wow.min.js"></script>
      <script src="./assets/js/animated.headline.js"></script>
      <script src="./assets/js/jquery.magnific-popup.js"></script>

      <!-- Scrollup, nice-select, sticky -->
      <script src="./assets/js/jquery.scrollUp.min.js"></script>
      <script src="./assets/js/jquery.nice-select.min.js"></script>
      <script src="./assets/js/jquery.sticky.js"></script>

      <!-- contact js -->
      <script src="./assets/js/contact.js"></script>
      <script src="./assets/js/jquery.form.js"></script>
      <script src="./assets/js/jquery.validate.min.js"></script>
      <script src="./assets/js/mail-script.js"></script>
      <script src="./assets/js/jquery.ajaxchimp.min.js"></script>

      <!-- Jquery Plugins, main Jquery -->
      <script src="./assets/js/plugins.js"></script>
      <script src="./assets/js/main.js"></script>
      <!-- jQuery 3 -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <!-- Bootstrap 3.3.7 -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <!-- AdminLTE App -->
      <script src="../js/adminlte.min.js"></script>
</body>
</html>
