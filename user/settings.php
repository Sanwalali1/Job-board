<?php
session_start();
if(empty($_SESSION['id_user'])) {
    header("Location: ../index.php");
    exit();
}
require_once("../db.php");
?>
<!doctype html>
<html lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Job Portal - Settings</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <link rel="stylesheet" href="assets/css/style.css">
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

    .nav-link:hover {
        background-color: #f8f9fa;
    }

    .form-group label {
        font-weight: bold;
    }

    .hide-me {
        display: none;
    }

    .error-text {
        color: red;
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
    <div class="content-wrapper" style="margin-left: 0px;">
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
                                            <i class="fa fa-user mr-2"></i>&nbsp; Edit Profile
                                        </a>
                                    </li>
                                    <li class="nav-item mb-2">
                                        <a class="nav-link d-flex align-items-center text-muted" href="index.php">
                                            <i class="fa fa-address-card mr-2"></i>&nbsp; My Applications
                                        </a>
                                    </li>
                                    <li class="nav-item mb-2">
                                        <a class="nav-link d-flex align-items-center text-muted" href="jobs.php">
                                            <i class="fa fa-briefcase mr-2"></i>&nbsp; Jobs
                                        </a>
                                    </li>
                                    <li class="nav-item mb-2">
                                        <a class="nav-link d-flex align-items-center active" href="settings.php">
                                            <i class="fa fa-cog mr-2"></i>&nbsp; Settings
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link d-flex align-items-center text-muted" href="../logout.php">
                                            <i class="fa fa-sign-out-alt mr-2"></i>&nbsp; Logout
                                        </a>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>

                    <div class="col-md-9 bg-white p-4 shadow-sm rounded">
                        <h2><i class="fa fa-cog"></i> Change Password</h2>
                        <p>Please enter your new password below.</p>

                        <form id="changePassword" action="change-password.php" method="post">
                            <div class="form-group mb-3">
                                <label for="password">New Password</label>
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="Enter new password" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="cpassword">Confirm Password</label>
                                <input type="password" class="form-control" id="cpassword"
                                    placeholder="Confirm new password" required>
                            </div>
                            <div id="passwordError" class="alert alert-danger hide-me" role="alert">
                                Passwords do not match!
                            </div>
                            <button type="submit" class="btn">Change Password</button>
                        </form>

                        <hr class="my-4">

                        <h2>Deactivate Account</h2>
                        <form action="deactivate-account.php" method="post">
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" required>
                                <label class="form-check-label">I want to deactivate my account</label>
                            </div>
                            <button type="submit" class="btn">Deactivate My Account</button>
                        </form>
                    </div>

                </div>
            </div>
        </section>
        <!-- Footer Placeholder -->
        <div class="control-sidebar-bg"></div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
    $("#changePassword").on("submit", function(e) {
        e.preventDefault();
        if ($('#password').val() !== $('#cpassword').val()) {
            $('#passwordError').removeClass('hide-me');
        } else {
            $(this).unbind('submit').submit();
        }
    });
    </script>
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
</body>

</html>