<?php

//To Handle Session Variables on This Page
session_start();


//Including Database Connection From db.php file to avoid rewriting in all files
require_once("../db.php");
?>
<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Job board HTML-5 Template </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

    <!-- CSS here -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/price_rangs.css">
    <link rel="stylesheet" href="assets/css/flaticon.css">
    <link rel="stylesheet" href="assets/css/slicknav.css">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/slick.css">
    <link rel="stylesheet" href="assets/css/nice-select.css">
    <link rel="stylesheet" href="assets/css/style.css">
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

    .form-label {
        font-size: 1.1rem;
        margin-bottom: 8px;
        color: #333;
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

    <!-- Content Wrapper. Contains page content -->
    <section id="candidates" class="content-header">
        <div class="container">
            <div class="row">
                <!-- Sidebar Column -->
                <div class="col-md-3">
                    <div class="box box-solid p-4 shadow-sm rounded">
                        <div class="box-header with-border pb-2 mb-3">
                            <h4><b>Menu</b></h4>
                        </div>
                        <div class="box-body no-padding">
                            <ul class="nav flex-column">
                                <li class="nav-item mb-2">
                                    <a class="nav-link d-flex align-items-center text-muted" href="edit-profile.php">
                                        <i class="fa fa-user mr-2"></i> Edit Profile
                                    </a>
                                </li>
                                <li class="nav-item mb-2">
                                    <a class="nav-link d-flex align-items-center text-muted" href="index.php">
                                        <i class="fa fa-address-card mr-2"></i> My Applications
                                    </a>
                                </li>
                                <li class="nav-item mb-2">
                                    <a class="nav-link d-flex align-items-center active" href="jobs.php">
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

                    <!-- Job Category Listing start -->
                        <div class="job-category-listing mb-50 mt-5">
                            <!-- single two -->
                            <div class="single-listing">
                            <div class="small-section-tittle2 mb-45">
                                    <div class="ion">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="20px" height="12px">
                                            <path fill-rule="evenodd" fill="rgb(27, 207, 107)"
                                                d="M7.778,12.000 L12.222,12.000 L12.222,10.000 L7.778,10.000 L7.778,12.000 ZM-0.000,-0.000 L-0.000,2.000 L20.000,2.000 L20.000,-0.000 L-0.000,-0.000 ZM3.333,7.000 L16.667,7.000 L16.667,5.000 L3.333,5.000 L3.333,7.000 Z" />
                                        </svg>
                                    </div>
                                    <h4>Filter Jobs</h4>
                                </div>
                                <div class="small-section-tittle2">
                                    <h4>Job Location</h4>
                                </div>
                                <!-- Select job items start -->
                                <form action="" method="get">
                                <?php
                                // Initialize the variables
                                $location = isset($_GET['location']) ? $_GET['location'] : '';
                                $experience = isset($_GET['experience']) ? $_GET['experience'] : '';
                                ?>
                                <div class="select-job-items2">
                                    <select name="location">
                                        <option value="" <?php if ($location == '') echo 'selected'; ?>>Anywhere</option>
                                        <option value="Karachi" <?php if ($location == 'Karachi') echo 'selected'; ?>>Karachi</option>
                                        <option value="Lahore" <?php if ($location == 'Lahore') echo 'selected'; ?>>Lahore</option>
                                        <option value="Islamabad" <?php if ($location == 'Islamabad') echo 'selected'; ?>>Islamabad</option>
                                        <option value="Peshawar" <?php if ($location == 'Peshawar') echo 'selected'; ?>>Peshawar</option>
                                    </select>
                                </div>
                                <!-- Select job items End -->
                                <!-- select-Categories start -->
                                <div class="select-Categories pt-80 pb-50">
                                    <div class="small-section-tittle2">
                                        <h4>Experience</h4>
                                    </div>
                                    <label class="container">All
                                        <input type="radio" name="experience" value="" <?php if ($experience == '') echo 'checked'; ?>>
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="container">1 Year
                                        <input type="radio" name="experience" value="1" <?php if ($experience == '1') echo 'checked'; ?>>
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="container">2 Years
                                        <input type="radio" name="experience" value="2" <?php if ($experience == '2') echo 'checked'; ?>>
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="container">3 Years
                                        <input type="radio" name="experience" value="3" <?php if ($experience == '3') echo 'checked'; ?>>
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="container">4 Years
                                        <input type="radio" name="experience" value="4" <?php if ($experience == '4') echo 'checked'; ?>>
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="container">5 Years
                                        <input type="radio" name="experience" value="5" <?php if ($experience == '5') echo 'checked'; ?>>
                                        <span class="checkmark"></span>
                                    </label>
                                    <button type="submit" class="btn head-btn1">Filter</button>
                                </div>
                                <!-- select-Categories End -->
                            </form>
                            </div>
                        </div>
                        <!-- Job Category Listing End -->
                    <!-- Job Filter End -->
                </div>

                <!-- Job Listing Column -->
                <div class="col-md-9">
                    <div class="container">
                        <!-- Job Listing -->
                        <div class="count-job mb-35">
                            <?php
                        $sql = "SELECT job_post.*, company.city, company.companyname, company.logo FROM job_post 
                                JOIN company ON job_post.id_company = company.id_company";

                        if ($location != '' || $experience != '') {
                            $sql .= " WHERE ";
                            $conditions = [];
                            if ($location != '') {
                                $conditions[] = "company.city='$location'";
                            }
                            if ($experience != '') {
                                $conditions[] = "job_post.experience='$experience'";
                            }
                            $sql .= implode(' AND ', $conditions);
                        }

                        $result = $conn->query($sql);
                        $totalno = $result->num_rows > 0 ? $result->num_rows : 0;
                        ?>
                            <span><?php echo $totalno; ?> Jobs Available</span>
                        </div>

                        <?php
                    // Pagination logic
                    $limit = 6;
                    $page = isset($_GET["page"]) ? $_GET['page'] : 1;
                    $start_from = ($page - 1) * $limit;
                    $sql .= " LIMIT $start_from, $limit";
                    $result = $conn->query($sql);
                    
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                    ?>
                        <div class="single-job-items mb-30">
                                    <div class="job-items">
                                        <div class="company-img" style="height: 65px; width: 105px;">
                                            <img src="../uploads/logo/<?php echo $row['logo']; ?>" alt="companylogo"
                                                style="width:100%; height:100%;">
                                        </div>
                                        <div class="job-tittle job-tittle2 ml-3">
                                            <a>
                                                <h4 id="jt"><?php echo $row['jobtitle']; ?></h4>
                                            </a>
                                            <ul>
                                                <li id="jt"><?php echo $row['companyname']; ?></li>
                                                <li id="jt"><i class="fas fa-map-marker-alt" ></i><?php echo $row['city']; ?>
                                                </li>
                                                <li>Experience <?php echo $row['experience']; ?> Years</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="items-link items-link2 f-right">
                                        <a href="view-job-post.php?id=<?php echo $row['id_jobpost']; ?>">Full
                                            details</a>
                                    </div>
                                </div>
                        <?php
                        }
                    } else {
                        echo "No jobs found.";
                    }
                    
                    // Pagination buttons
                    if ($totalno > $limit) {
                        $total_pages = ceil($totalno / $limit);
                    ?>
                        <div class="pagination-area pb-115 text-center">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-center">
                                    <?php if ($page > 1) { ?>
                                    <li class="page-item">
                                        <a class="page-link" href="?page=<?php echo $page - 1; ?>"
                                            aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span> Previous
                                        </a>
                                    </li>
                                    <?php } ?>

                                    <?php for ($i = 1; $i <= $total_pages; $i++) { ?>
                                    <li class="page-item <?php if ($i == $page) echo 'active'; ?>">
                                        <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                                    </li>
                                    <?php } ?>

                                    <?php if ($page < $total_pages) { ?>
                                    <li class="page-item">
                                        <a class="page-link" href="?page=<?php echo $page + 1; ?>" aria-label="Next">
                                            Next <span aria-hidden="true">&raquo;</span>
                                        </a>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </nav>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Job List Area End -->
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