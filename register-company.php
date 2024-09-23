<?php
session_start();

if(isset($_SESSION['id_user']) || isset($_SESSION['id_company'])) { 
  header("Location: index.php");
  exit();
}

require_once("db.php");
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

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper py-5">
        <section class="content-header">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 bg-white p-4 rounded shadow">
                        <h1 class="text-center mb-4" style="color: #28395A;"><b>Create Candidate Profile</b></h1>
                        <form method="post" id="registerCompanies" action="addcompany.php"
                            enctype="multipart/form-data">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="fname">Full Name of Owner*</label>
                                    <input class="form-control input-lg" type="text" name="name" placeholder="Full Name of Owner"
                                        required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="email">Email *</label>
                                    <input class="form-control input-lg" type="email" name="email" placeholder="Email"
                                        required>
                                    <?php 
                                        if(isset($_SESSION['registerError'])) { ?>
                                    <div class="text-danger text-center">
                                        Email Already Exists! Choose A Different Email!
                                    </div>
                                    <?php unset($_SESSION['registerError']); } ?>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="website">Website</label>
                                    <input class="form-control input-lg" type="text" name="website"
                                        placeholder="Website">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="companyname">Company Name *</label>
                                    <input class="form-control input-lg" type="text" name="companyname"
                                        placeholder="Company Name" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="contactno">Phone Number *</label>
                                    <input class="form-control input-lg" type="text" name="contactno"
                                        placeholder="Phone Number" maxlength="11" autocomplete="off"
                                        onkeypress="return validatePhone(event);" required>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="aboutme">Brief Info About Your Company</label>
                                    <textarea class="form-control input-lg" rows="4" name="aboutme"
                                        placeholder="Brief info about your company"></textarea>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="password">Password *</label>
                                    <input class="form-control input-lg" type="password" name="password"
                                        placeholder="Password" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="cpassword">Confirm Password *</label>
                                    <input class="form-control input-lg" type="password" name="cpassword"  id="cpassword"
                                        placeholder="Confirm Password" required>
                                    <?php if(isset($_SESSION['passwordError'])) { ?>
                                    <div id="passwordError" class="text-danger text-center">
                                    <?php echo $_SESSION['passwordError']; ?>
                                    </div>
                                    <?php unset($_SESSION['passwordError']); } ?>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="country">Select Country *</label>
                                    <select class="form-control input-lg" id="country" name="country" required>
                                        <option selected="" value="">Select Country</option>
                                        <?php
                                            $sql = "SELECT * FROM countries";
                                            $result = $conn->query($sql);

                                            if($result->num_rows > 0) {
                                                while($row = $result->fetch_assoc()) {
                                                    echo "<option value='".$row['name']."' data-id='".$row['id']."'>".$row['name']."</option>";
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div id="stateDiv" class="form-group col-md-6" style="display: none;">
                                    <label for="state">Select State *</label>
                                    <select class="form-control input-lg" id="state" name="state" required>
                                        <option value="" selected="">Select State</option>
                                    </select>
                                </div>
                                <div id="cityDiv" class="form-group col-md-6" style="display: none;">
                                    <label for="city">Select City *</label>
                                    <select class="form-control input-lg" id="city" name="city" required>
                                        <option value="" selected="">Select City</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="image">Attach Company Logo *</label>
                                    <input type="file" name="image" class="form-control input-lg" required>
                                    <?php 
                                        if(isset($_SESSION['uploadError'])) { ?>
                                    <div class="text-danger text-center">
                                        <?php echo $_SESSION['uploadError']; ?>
                                    </div>
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

    <!-- /.content-wrapper -->
      <!-- All JS Custom Plugins Link Here here -->
    <script src="./assets/js/vendor/modernizr-3.5.0.min.js"></script>
    <!-- Jquery, Popper, Bootstrap -->
    <script src="./assets/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="./assets/js/popper.min.js"></script>
    <script src="./assets/js/bootstrap.min.js"></script>
    <script src="./assets/js/main.js"></script>


    <!-- jQuery 3 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- AdminLTE App -->
    <script src="js/adminlte.min.js"></script>

    <script type="text/javascript">
    function validatePhone(event) {

        //event.keycode will return unicode for characters and numbers like a, b, c, 5 etc.
        //event.which will return key for mouse events and other events like ctrl alt etc. 
        var key = window.event ? event.keyCode : event.which;

        if (event.keyCode == 8 || event.keyCode == 46 || event.keyCode == 37 || event.keyCode == 39) {
            // 8 means Backspace
            //46 means Delete
            // 37 means left arrow
            // 39 means right arrow
            return true;
        } else if (key < 48 || key > 57) {
            // 48-57 is 0-9 numbers on your keyboard.
            return false;
        } else return true;
    }
    </script>

    <script>
    $("#country").on("change", function() {
        var id = $(this).find(':selected').attr("data-id");
        $("#state").find('option:not(:first)').remove();
        if (id != '') {
            $.post("state.php", {
                id: id
            }).done(function(data) {
                $("#state").append(data);
            });
            $('#stateDiv').show();
        } else {
            $('#stateDiv').hide();
            $('#cityDiv').hide();
        }
    });
    </script>

    <script>
    $("#state").on("change", function() {
        var id = $(this).find(':selected').attr("data-id");
        $("#city").find('option:not(:first)').remove();
        if (id != '') {
            $.post("city.php", {
                id: id
            }).done(function(data) {
                $("#city").append(data);
            });
            $('#cityDiv').show();
        } else {
            $('#cityDiv').hide();
        }
    });
    </script>
    <script>
    $("#registerCompanies").on("submit", function(e) {
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