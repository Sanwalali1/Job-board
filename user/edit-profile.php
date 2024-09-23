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
        color: black transition: all ease 0.2s;
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
    <!-- Preloader Start -->

    <header class="mb-5 pb-1 pt-1 shadow-sm">
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

    <div class="wrapper">

        <!-- Content Wrapper. Contains page content -->
        <div>
            <section id="candidates" class="content-header">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="box box-solid p-4 shadow-sm rounded">
                                <div class="box-header with-border pb-2 mb-3">
                                    <h4><b>Menu</b></h4>
                                </div>
                                <div class="box-body no-padding">
                                    <ul class="nav flex-column">
                                        <li class="nav-item mb-2">
                                            <a class="nav-link d-flex align-items-center active"
                                                href="edit-profile.php">
                                                <i class="fa fa-user mr-2"></i> Edit Profile
                                            </a>
                                        </li>
                                        <li class="nav-item mb-2">
                                            <a class="nav-link d-flex align-items-center text-muted" href="index.php">
                                                <i class="fa fa-address-card mr-2"></i> My Applications
                                            </a>
                                        </li>
                                        <li class="nav-item mb-2">
                                            <a class="nav-link d-flex align-items-center text-muted" href="jobs.php">
                                                <i class="fa fa-briefcase mr-2"></i> Jobs
                                            </a>
                                        </li>
                                        <li class="nav-item mb-2">
                                            <a class="nav-link d-flex align-items-center text-muted"
                                                href="settings.php">
                                                <i class="fa fa-cog mr-2"></i> Settings
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link d-flex align-items-center text-muted"
                                                href="../logout.php">
                                                <i class="fa fa-sign-out-alt mr-2"></i> Logout
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-9 bg-white padding-2">
                            <form action="update-profile.php" method="post" enctype="multipart/form-data">
                                <?php
            //Sql to get logged in user details.
            $sql = "SELECT * FROM users WHERE id_user='$_SESSION[id_user]'";
            $result = $conn->query($sql);

            //If user exists then show his details.
            if($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {
            ?>
                                <div class="row bg-white shadow-sm rounded p-3 mb-1">
                                  <h2><b>Edit Profile</b></h2>
                                    <div class="col-md-6 latest-job">
                                        <div class="form-group">
                                            <label for="fname">First Name</label>
                                            <input type="text" class="form-control input-lg" id="fname" name="fname"
                                                placeholder="First Name" value="<?php echo $row['firstname']; ?>"
                                                required="">
                                        </div>
                                        <div class="form-group">
                                            <label for="lname">Last Name</label>
                                            <input type="text" class="form-control input-lg" id="lname" name="lname"
                                                placeholder="Last Name" value="<?php echo $row['lastname']; ?>"
                                                required="">
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email address</label>
                                            <input type="email" class="form-control input-lg" id="email"
                                                placeholder="Email" value="<?php echo $row['email']; ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="address">Address</label>
                                            <textarea id="address" name="address" class="form-control input-lg" rows="5"
                                                placeholder="Address"><?php echo $row['address']; ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="city">City</label>
                                            <input type="text" class="form-control input-lg" id="city" name="city"
                                                value="<?php echo $row['city']; ?>" placeholder="city">
                                        </div>
                                        <div class="form-group">
                                            <label for="state">State</label>
                                            <input type="text" class="form-control input-lg" id="state" name="state"
                                                placeholder="state" value="<?php echo $row['state']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-flat">Update
                                                Profile</button>
                                        </div>
                                    </div>
                                    <div class="col-md-6 latest-job ">
                                        <div class="form-group">
                                            <label for="contactno">Contact Number</label>
                                            <input type="text" class="form-control input-lg" id="contactno"
                                                name="contactno" placeholder="Contact Number"
                                                value="<?php echo $row['contactno']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="qualification">Highest Qualification</label>
                                            <input type="text" class="form-control input-lg" id="qualification"
                                                name="qualification" placeholder="Highest Qualification"
                                                value="<?php echo $row['qualification']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="stream">Stream</label>
                                            <input type="text" class="form-control input-lg" id="stream" name="stream"
                                                placeholder="stream" value="<?php echo $row['stream']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Skills</label>
                                            <textarea class="form-control input-lg" rows="4"
                                                name="skills"><?php echo $row['skills']; ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>About Me</label>
                                            <textarea class="form-control input-lg" rows="4"
                                                name="aboutme"><?php echo $row['aboutme']; ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Upload/Change Resume</label>
                                            <input type="file" name="resume" class="form-control">
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
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </section>



        </div>
        <!-- /.content-wrapper -->



        <!-- /.control-sidebar -->
        <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
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

    <!-- jQuery 3 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../js/adminlte.min.js"></script>
</body>

</html>