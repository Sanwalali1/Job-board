  <?php

  //To Handle Session Variables on This Page
  session_start();

  //If user Not logged in then redirect them back to homepage. 
  if(empty($_SESSION['id_user'])) {
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
      #jt {
          text-transform: capitalize;
      }

      .nav-link {
          color: #6c757d;
          font-size: 1rem;
          transition: all 0.3s ease;
          padding: 10px 15px;
          border-radius: 5px;
          transition: all 0.5s ease;
      }

      .nav-link:hover {
          background-color: #f8f9fa;
      }

      .nav-link.active {
          background-color: #f8f9fa;
          color: #fb246a;
      }

      .nav-link i {
          margin-right: 10px;
      }

      .card-title a {
          color: black;
          transition: all ease 0.2s;
      }

      .card-title a:hover {
          color: #fb246a;
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
      <!-- Preloader end -->
      <header class="mt-2">
          <!-- Header Start -->
          <div class="header-area header-transparrent">
              <div class="headder-top header-sticky">
                  <div class="container">
                      <div class="row align-items-center">
                          <div class="col-lg-3 col-md-2">
                              <!-- Logo -->
                              <div class="logo">
                                  <a href="index.php"><img src="assets/img/logo/logo.png" alt=""></a>
                              </div>
                          </div>
                          <!-- Mobile Menu -->
                          <div class="col-12">
                              <div class="mobile_menu d-block d-lg-none"></div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <!-- Header End -->
      </header>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper" style="margin-left: 0px;">
          <!-- Hero Section (optional for design consistency) -->
          <section id="candidates" class="hero-section"
              style="background-color: #EAEDFF; background-size: cover; padding: 60px 0;">
              <div class="container text-center text-white">
                  <h1 class="display-4">Welcome <b><?php echo $_SESSION['name']; ?></b></h1>
                  <p class="lead">Here you can manage your profile and review your job applications.</p>
              </div>
          </section>

          <!-- Main Content Section -->
          <section class="content-header">
              <div class="container mt-5">
                  <div class="row">
                      <!-- Sidebar -->
                      <div class="col-md-3">
                          <div class="box box-solid p-4 shadow-sm rounded">
                              <div class="box-header with-border pb-2 mb-3">
                                  <h4><b>Menu</b></h4>
                              </div>
                              <div class="box-body no-padding">
                                  <ul class="nav flex-column">
                                      <li class="nav-item mb-2">
                                          <a class="nav-link d-flex align-items-center text-muted"
                                              href="edit-profile.php">
                                              <i class="fa fa-user mr-2"></i> Edit Profile
                                          </a>
                                      </li>
                                      <li class="nav-item mb-2">
                                          <a class="nav-link d-flex align-items-center active" href="index.php">
                                              <i class="fa fa-address-card mr-2"></i> My Applications
                                          </a>
                                      </li>
                                      <li class="nav-item mb-2">
                                          <a class="nav-link d-flex align-items-center text-muted" href="jobs.php">
                                              <i class="fa fa-briefcase mr-2"></i> Jobs
                                          </a>
                                      </li>
                                      <li class="nav-item mb-2">
                                          <a class="nav-link d-flex align-items-center text-muted" href="settings.php">
                                              <i class="fa fa-cog mr-2"></i> Settings
                                          </a>
                                      </li>
                                      <li class="nav-item">
                                          <a class="nav-link d-flex align-items-center text-muted" href="../logout.php">
                                              <i class="fa fa-sign-out-alt mr-2"></i> Logout
                                          </a>
                                      </li>
                                  </ul>
                              </div>

                          </div>
                      </div>

                      <!-- Main Content Area -->
                      <div class="col-md-9 bg-white shadow-sm rounded p-4">
                          <h2><b>Recent Applications</b></h2>
                          <p class="text-muted">Below you will find job roles you have applied for.</p>

                          <!-- Application List -->
                          <?php
            $sql = "SELECT * FROM job_post INNER JOIN apply_job_post ON job_post.id_jobpost=apply_job_post.id_jobpost WHERE apply_job_post.id_user='$_SESSION[id_user]'";
            $result = $conn->query($sql);

            if($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {     
          ?>
                          <div class="card mb-4 border-light shadow-sm">
                              <div class="card-body">
                                  <h5 class="card-title">
                                      <a href="view-job-post.php?id=<?php echo $row['id_jobpost']; ?>"
                                          id="jt"><?php echo $row['jobtitle']; ?></a>
                                  </h5>
                                  <p class="card-text">
                                      <small class="text-muted">
                                          <i class="fa fa-calendar mr-2"></i>Posted on: <?php echo $row['createdat']; ?>
                                      </small>
                                  </p>

                                  <div class="d-flex justify-content-end align-items-center">
                                      <span>Status: </span>
                                      <span class="ml-2">
                                          <?php
                                          if($row['status'] == 0) {
                                              echo '<span class="badge badge-warning ml-2">Pending</span>';
                                          } else if ($row['status'] == 1) {
                                              echo '<span class="badge badge-danger ml-2">Rejected</span>';
                                          } else if ($row['status'] == 2) {
                                              echo '<span class="badge badge-success ml-2">Under Review</span>';
                                          }
                                          ?>
                                      </span>
                                  </div>
                              </div>
                          </div>
                          <?php
                                }
                              }
                            ?>
                      </div>
                  </div>
              </div>
          </section>

          <!-- Footer Placeholder -->
          <div class="control-sidebar-bg"></div>
      </div>

      <!-- ./wrapper -->

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