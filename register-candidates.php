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

    <!-- Content Wrapper -->
    <div class="content-wrapper py-5">
        <section class="content-header">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 bg-white p-4 rounded shadow">
                        <h1 class="text-center mb-4" style="color: #28395A;"><b>Create Candidate Profile</b></h1>
                        <form method="post" id="registerCandidates" action="adduser.php" enctype="multipart/form-data">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="fname">First Name *</label>
                                    <input class="form-control input-lg" type="text" id="fname" name="fname"
                                        placeholder="First Name *" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="lname">Last Name *</label>
                                    <input class="form-control input-lg" type="text" id="lname" name="lname"
                                        placeholder="Last Name *" required>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="email">Email *</label>
                                    <input class="form-control input-lg" type="email" id="email" name="email"
                                        placeholder="Email *" required>
                                    <?php 
            if(isset($_SESSION['registerError'])) { ?>
                                    <span class="text-danger">
                                        Email Already Exists! Choose A Different Email!
                                    </span>
                                    <?php
            unset($_SESSION['registerError']); 
            } ?>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="aboutme">Brief intro about yourself *</label>
                                    <textarea class="form-control input-lg" rows="4" id="aboutme" name="aboutme"
                                        placeholder="Brief intro about yourself *" required></textarea>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="dob">Date Of Birth</label>
                                    <input class="form-control input-lg" type="date" id="dob" name="dob"
                                        min="1960-01-01" max="1999-01-31" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="age">Age</label>
                                    <input class="form-control input-lg" type="text" id="age" name="age"
                                        placeholder="Age" readonly>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="passingyear">Passing Year</label>
                                    <input class="form-control input-lg" type="date" id="passingyear"
                                        name="passingyear">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="qualification">Highest Qualification</label>
                                    <input class="form-control input-lg" type="text" id="qualification"
                                        name="qualification" placeholder="Highest Qualification" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="stream">Stream</label>
                                    <input class="form-control input-lg" type="text" id="stream" name="stream"
                                        placeholder="Stream">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="contactno">Phone Number</label>
                                    <input class="form-control input-lg" type="text" id="contactno" name="contactno"
                                        maxlength="13" onkeypress="return validatePhone(event);"
                                        placeholder="Phone Number" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="password">Password *</label>
                                    <input class="form-control input-lg" type="password" id="password" name="password"
                                        placeholder="Password *" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="cpassword">Confirm Password *</label>
                                    <input class="form-control input-lg" type="password" id="cpassword" name="cpassword"
                                        placeholder="Confirm Password *" required>
                                    <!-- <?php 
                                    if(isset($_SESSION['passwordError'])) { ?>
                                    <div class="text-danger" id="passwordError">
                                        <?php echo $_SESSION['passwordError']; ?>
                                    </div>
                                    <?php unset($_SESSION['passwordError']); } ?> -->
                                    
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="address">Address</label>
                                    <textarea class="form-control input-lg" rows="4" id="address" name="address"
                                        placeholder="Address" required></textarea>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="city">City</label>
                                    <input class="form-control input-lg" type="text" id="city" name="city"
                                        placeholder="City" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="state">State</label>
                                    <input class="form-control input-lg" type="text" id="state" name="state"
                                        placeholder="State" required>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="skills">Enter Skills</label>
                                    <textarea class="form-control input-lg" rows="4" id="skills" name="skills"
                                        placeholder="Enter Skills" required></textarea>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="designation">Designation</label>
                                    <input class="form-control input-lg" type="text" id="designation" name="designation"
                                        placeholder="Designation">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="resume">Upload CV <span class="text-danger">(File Format PDF
                                            Only!)</span></label>
                                    <input type="file" id="resume" name="resume" accept=".pdf" required>
                                    <?php 
            if(isset($_SESSION['uploadError'])) { ?>
                                    <span class="text-danger">
                                        <?php echo $_SESSION['uploadError']; ?>
                                    </span>
                                    <?php unset($_SESSION['uploadError']); } ?>
                                </div>
                                <div class="form-group col-md-12">
                                    <button class="btn btn-lg btn-block" type="submit">Register</button>
                                </div>

                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </section>
    </div>
<!-- JS here -->

    <!-- All JS Custom Plugins Link Here here -->
    <!-- <script src="./assets/js/vendor/modernizr-3.5.0.min.js"></script> -->
    <!-- Jquery, Popper, Bootstrap -->
    <script src="./assets/js/vendor/jquery-1.12.4.min.js"></script>
    <!-- <script src="./assets/js/popper.min.js"></script> -->
    <!-- <script src="./assets/js/bootstrap.min.js"></script> -->
    <!-- Jquery Mobile Menu -->
    <!-- <script src="./assets/js/jquery.slicknav.min.js"></script> -->

    <!-- Jquery Slick , Owl-Carousel Range -->
    <!-- <script src="./assets/js/owl.carousel.min.js"></script>
    <script src="./assets/js/slick.min.js"></script>
    <script src="./assets/js/price_rangs.js"></script> -->
    <!-- One Page, Animated-HeadLin -->
    <!-- <script src="./assets/js/wow.min.js"></script>
    <script src="./assets/js/animated.headline.js"></script>
    <script src="./assets/js/jquery.magnific-popup.js"></script> -->

    <!-- Scrollup, nice-select, sticky -->
    <!-- <script src="./assets/js/jquery.scrollUp.min.js"></script>
    <script src="./assets/js/jquery.nice-select.min.js"></script>
    <script src="./assets/js/jquery.sticky.js"></script> -->

    <!-- contact js -->
    <!-- <script src="./assets/js/contact.js"></script>
    <script src="./assets/js/jquery.form.js"></script>
    <script src="./assets/js/jquery.validate.min.js"></script>
    <script src="./assets/js/mail-script.js"></script>
    <script src="./assets/js/jquery.ajaxchimp.min.js"></script> -->

    <!-- Jquery Plugins, main Jquery -->
    <!-- <script src="./assets/js/plugins.js"></script> -->
    <script src="./assets/js/main.js"></script>
    <!-- jQuery 3 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- AdminLTE App -->
    <script src="js/adminlte.min.js"></script>

    
    <script>
    function validatePhone(event) {
        var key = event.charCode || event.keyCode || 0;
        return (key >= 48 && key <= 57);
    }

    $('#dob').on('change', function() {
        var today = new Date();
        var birthDate = new Date($(this).val());
        var age = today.getFullYear() - birthDate.getFullYear();
        var m = today.getMonth() - birthDate.getMonth();

        if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
            age--;
        }

        $('#age').val(age);
    });

    $("#registerCandidates").on("submit", function(e) {
        e.preventDefault();
        if ($('#password').val() != $('#cpassword').val()) {
            $('#passwordError').show();
        } else {
            $(this).unbind('submit').submit();
        }
    });
    </script>
    
</body>

</html>