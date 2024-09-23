<?php
session_start();

if(empty($_SESSION['id_company'])) {
  header("Location: ../index.php");
  exit();
}

require_once("../db.php");
?>
<!doctype html>
<html class="no-js" lang="zxx">

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

    .form-group label {
        font-weight: bold;
    }
    h2{
      margin-top: 10px;
      margin-left: 5px; 
    }
    </style>
</head>

<body>
    <!-- Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="assets/img/logo/logo.png" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader End -->

    <header class="mb-5 pb-1 pt-1 shadow-sm">
        <div class="header-area header-transparrent">
            <div class="headder-top header-sticky">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-3 col-md-2">
                            <div class="logo">
                                <a href="index.php"><img src="assets/img/logo/logo.png" alt=""></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="wrapper">
        <div class="content-wrapper">
            <section id="candidates" class="content-header">
                <div class="container">
                    <div class="row">
                    <div class="col-md-3">
            <div class="p-4 shadow-sm rounded">
            <h3 class="box-title">Welcome <b><?php echo $_SESSION['name']; ?></b></h3>
              <ul class="nav flex-column">
                <li class="nav-item mb-2">
                  <a class="nav-link d-flex align-items-center text-muted" href="index.php">
                    <i class="fa fa-tachometer-alt"></i> Dashboard
                  </a>
                </li>
                <li class="nav-item mb-2">
                  <a class="nav-link d-flex align-items-center active" href="edit-company.php">
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
                        <div class="col-md-9 bg-white padding-2">
                            <h2><b>My Company</b></h2>
                            <p>In this section you can change your company details</p>
                            <form action="update-company.php" method="post" enctype="multipart/form-data">
                                <?php
                                $sql = "SELECT * FROM company WHERE id_company='$_SESSION[id_company]'";
                                $result = $conn->query($sql);

                                if($result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()) {
                                ?>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Company Name</label>
                                            <input type="text" class="form-control" name="companyname"
                                                value="<?php echo $row['companyname']; ?>" required="">
                                        </div>
                                        <div class="form-group">
                                            <label>Website</label>
                                            <input type="text" class="form-control" name="website"
                                                value="<?php echo $row['website']; ?>" required="">
                                        </div>
                                        <div class="form-group">
                                            <label>Email Address</label>
                                            <input type="email" class="form-control" id="email"
                                                value="<?php echo $row['email']; ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>About Me</label>
                                            <textarea class="form-control" rows="4"
                                                name="aboutme"><?php echo $row['aboutme']; ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn">Update Company Profile</button>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Contact Number</label>
                                            <input type="text" class="form-control" id="contactno" name="contactno"
                                                value="<?php echo $row['contactno']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>City</label>
                                            <input type="text" class="form-control" id="city" name="city"
                                                value="<?php echo $row['city']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>State</label>
                                            <input type="text" class="form-control" id="state" name="state"
                                                value="<?php echo $row['state']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Change Company Logo</label>
                                            <input type="file" name="image" class="form-control">
                                            <?php if($row['logo'] != "") { ?>
                                            <img src="../uploads/logo/<?php echo $row['logo']; ?>"
                                                class="img-responsive mt-2"
                                                style="max-height: 200px; max-width: 200px;">
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                    }
                                }
                                ?>
                            </form>
                            <?php if(isset($_SESSION['uploadError'])) { ?>
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <?php echo $_SESSION['uploadError']; ?>
                                </div>
                            </div>
                            <?php unset($_SESSION['uploadError']); } ?>
                        </div>
                    </div>
                </div>
            </section>
        </div>
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