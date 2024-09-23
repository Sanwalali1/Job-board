<?php
session_start();

if(isset($_SESSION['id_user']) || isset($_SESSION['id_company'])) { 
  header("Location: index.php");
  exit();
}
?>
<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Job Board - Create Your Profile</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

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

</head>

<body>
    <!-- Preloader Start -->
    <!-- <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="assets/img/logo/logo.png" alt="">
                </div>
            </div>
        </div>
    </div> -->
    <!-- Preloader End -->
    <!-- Header Start -->
    <header class="header-area header-transparrent pt-2" style="box-shadow: 10px 10px 10px #EDEDED">
        <div class="header-top header-sticky">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-2">
                        <!-- Logo -->
                        <div class="logo">
                            <a href="index.php"><img src="assets/img/logo/logo.png" alt="Logo"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header End -->

    <!-- /.login-logo -->
    <div class="content-wrapper py-5">
        <section class="content-header">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 bg-white p-4 rounded shadow">
                        <h1 class="text-center mb-4" style="color: #28395A;"><b>Candidate Login</b></h1>

                        <form method="post" action="checklogin.php">
                            <div class="form-group has-feedback">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                            </div>
                            <div class="form-group has-feedback">
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="Password">
                                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                <div class="col-md-6">
                                    <a href="#" class="text-dark">I forgot my password</a>
                                </div>
                            </div>
                            <div class="row">
                                <!-- /.col -->
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-block btn-flat">Sign In</button>
                                </div>
                                <!-- /.col -->
                            </div>
                        </form>

                        <br>

                        <?php 
    //If User have successfully registered then show them this success message
    //Todo: Remove Success Message without reload?
    if(isset($_SESSION['registerCompleted'])) {
      ?>
                        <div>
                            <p id="successMessage" class="text-center">You Have Registered Successfully! Your Account
                                Approval Is Pending By Admin</p>
                        </div>
                        <?php
     unset($_SESSION['registerCompleted']); }
    ?>
                        <?php 
    //If User Failed To log in then show error message.
    if(isset($_SESSION['loginError'])) {
      ?>
                        <div>
                            <p class="text-center">Invalid Email/Password! Try Again!</p>
                        </div>
                        <?php
     unset($_SESSION['loginError']); }
    ?>

                        <?php 
    //If User Failed To log in then show error message.
    if(isset($_SESSION['userActivated'])) {
      ?>
                        <div>
                            <p class="text-center">Your Account Is Active. You Can Login</p>
                        </div>
                        <?php
     unset($_SESSION['userActivated']); }
    ?>

                        <?php 
    //If User Failed To log in then show error message.
    if(isset($_SESSION['loginActiveError'])) {
      ?>
                        <div>
                            <p class="text-center"><?php echo $_SESSION['loginActiveError']; ?></p>
                        </div>
                        <?php
     unset($_SESSION['loginActiveError']); }
    ?>

                    </div>
                </div>
            </div>
        </section>
        </div>
        <!-- /.login-box-body -->

        <!-- jQuery 3 -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <!-- Bootstrap 3.3.7 -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js">
        </script>
        <!-- AdminLTE App -->
        <script src="js/adminlte.min.js"></script>
        <!-- iCheck -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/icheck.min.js"></script>
        <script>
        $(function() {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            });
        });
        </script>

</body>

</html>