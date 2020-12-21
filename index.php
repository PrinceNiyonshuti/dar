<!DOCTYPE html>
<html lang="en-US">

<?php
    
    include "admin/config/config.php";

    $sql = " SELECT * FROM `site_details`  ";
    $query = $conn->prepare($sql);
    $query->execute();
    $data = $query->rowCount();
    while($fetch = $query->fetch()){
        $description=$fetch['site_description'];
        $phone=$fetch['phone'];
        $mobile=$fetch['mobile'];
        $address=$fetch['address'];
        $email=$fetch['email'];
        $about=$fetch['about'];
    }

    $sql5=" SELECT * from favicon  ";
    $result5=$conn->query($sql5);
    while ($row5 = $result5->fetch()) {
        $favicon=$row5['favicon'];
        $logo=$row5['logo'];
    }

    $sql_slide=" SELECT * FROM `slider` ";
    $result_slide=$conn->query($sql_slide);
    while ($row_slide = $result_slide->fetch()) {
        $slide_1=$row_slide['slide_1'];
        $slide_2=$row_slide['slide_2'];
    }
?>
<!-- home-200:30-->
<head>
    <title>Car Transported - Dar</title>
    <link rel="apple-touch-icon" href="admin/img/logo/<?php echo $favicon; ?>">
    <link rel="shortcut icon" href="admin/img/logo/<?php echo $favicon; ?>"> 
    <meta name="author" content="Car Transported - Dar">
    <meta name="robots" content="index follow">
    <meta name="googlebot" content="index follow">
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="keywords" content="cargo, logistics, modern, shipment, transport, transportation, truck, trucking">
    <meta name="description" content=" Car Transported - Dar Transportation and Logistics ">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800%7CPoppins:300i,300,400,500,600,700,400i,500%7CDancing+Script:700%7CDancing+Script:700%7CGreat+Vibes:400%7CPoppins:400%7CDosis:800%7CRaleway:400,700,800&amp;subset=latin-ext" rel="stylesheet">
    <!-- animate -->
    <link rel="stylesheet" href="assets/css/animate.css" />
    <!-- owl Carousel assets -->
    <link href="assets/css/owl.carousel.css" rel="stylesheet">
    <link href="assets/css/owl.theme.css" rel="stylesheet">
    <!-- bootstrap -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- hover anmation -->
    <link rel="stylesheet" href="assets/css/hover-min.css">
    <!-- flag icon -->
    <link rel="stylesheet" href="assets/css/flag-icon.min.css">
    <!-- main style -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- elegant icon -->
    <link rel="stylesheet" href="assets/css/elegant_icon.css">
    <!-- fontawesome  -->
    <link rel="stylesheet" href="assets/fonts/font-awesome/css/font-awesome.min.css">
    <!-- REVOLUTION STYLE SHEETS -->
    <link rel="stylesheet" type="text/css" href="assets/rslider/fonts/pe-icon-7-stroke/css/pe-icon-7-stroke.css">
    <link rel="stylesheet" type="text/css" href="assets/rslider/fonts/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="assets/rslider/css/settings.css">
</head>

<body>

    <!--  Header  -->
    <header class="background-white">
        <div class="header-output">
            <div class="header-output">
                <div class="header-in" style="background-color: #474747;">

                    <!-- Up Head -->
                    <div class="up-head d-none d-lg-block background-grey-4">
                        <div class="container">
                            <div class="row" style="color: #ffc107;">
                                <div class="col-xl-8 col-lg-12">
                                    <div class="row">
                                        <div class="col-md-4"><i class="fa fa-phone margin-right-10px"></i>+<?php echo $phone; ?> / +<?php echo $mobile; ?></div>
                                        <div class="col-md-4"><i class="fa fa-envelope-o margin-right-10px"></i> <?php echo $email; ?></div>
                                        <div class="col-md-4"><i class="fa fa-map-marker margin-right-10px"></i> <?php echo $address; ?></div>
                                    </div>
                                </div>
                                <div class="col-xl-4 d-none d-xl-block">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <!-- lang dropdown -->
                                            <div id="google_translate_element"></div>

                                                <script type="text/javascript">
                                                function googleTranslateElementInit() {
                                                  new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
                                                }
                                                </script>
                                                <!--  Google translator here -->

                                                <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
                                            <div class="dropdown show" id="google_translate_element">

                                                <div class="dropdown-menu text-small text-uppercase" aria-labelledby="dropdownMenuLink">
                                                    <a class="dropdown-item" href="#"><span class="flag-icon flag-icon-es margin-right-8px"></span> Spanish</a>
                                                    <a class="dropdown-item" href="#"><span class="flag-icon flag-icon-mr margin-right-8px"></span> Arabic</a>
                                                    <a class="dropdown-item" href="#"><span class="flag-icon flag-icon-fr margin-right-8px"></span> French</a>
                                                    <a class="dropdown-item" href="#"><span class="flag-icon flag-icon-de margin-right-8px"></span> German</a>
                                                </div>
                                            </div>
                                            <!-- // lang dropdown -->

                                        </div>

                                        <div class="col-lg-6">
                                            <!--  Social -->
                                            <ul class="social-media list-inline text-right margin-0px text-white">
                                                <li class="list-inline-item"><a class="facebook" href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                                <li class="list-inline-item"><a class="youtube" href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
                                                <li class="list-inline-item"><a class="linkedin" href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                                <li class="list-inline-item"><a class="google" href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                                <li class="list-inline-item"><a class="twitter" href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                                <li class="list-inline-item"><a class="rss" href="#"><i class="fa fa-rss" aria-hidden="true"></i></a></li>
                                            </ul>
                                            <!-- // Social -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- // Up Head -->
                    <div class="container">
                        <div class="position-relative">
                            <div class="row">
                                <div class="col-lg-3 col-md-12">
                                    <!-- <a id="logo" href="index.php" class="d-inline-block margin-tb-15px"><img src="admin/img/logo/<?php echo $logo; ?>" alt="" width="188px" height="41px"></a> -->
                                    <a class="mobile-toggle padding-15px background-second-color border-radius-3" href="#"><i class="fa fa-bars"></i></a>
                                </div>
                                <div class="col-lg-7 col-md-12 position-inherit">
                                    <ul id="menu-main" class="nav-menu float-xl-left text-lg-center link-padding-tb-25px dropdown-dark" >
                                        <li><a  style="color: #ffc107;" href="index.php">Home</a>
                                        </li>

                                        <li class="has-dropdown"><a style="color: #ffc107;" href="#">About</a>
                                            <ul class="sub-menu" >
                                                <li ><a style="color: #ffc107;" href="index.php?about">About Us</a></li>
                                                <li><a style="color: #ffc107;" href="index.php?faq">Faqs</a></li>
                                                <li><a style="color: #ffc107;" href="index.php?team">Our Team</a></li>
                                                <li><a style="color: #ffc107;" href="index.php?price">Price Table</a></li>
                                                <li><a style="color: #ffc107;" href="index.php?partner">Our Partners</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a style="color: #ffc107;" href="index.php?service">Services</a>
                                        </li>

                                        <li>
                                            <a style="color: #ffc107;" href="index.php?contact">Contact Us</a>
                                        </li>

                                        <li>
                                            <a style="color: #ffc107;" href="index.php?blog">Blog</a>
                                        </li>

                                        <li>
                                            <a style="color: #ffc107;" href="index.php?tax">Tax Calculation</a>
                                        </li>

                                    </ul>



                                    <div class="d-none d-xl-block pull-right model-link margin-top-15px">
                                        
                                    </div>
                                    <div class="d-none d-xl-block search-link pull-right model-link margin-top-15px">
                                        <a id="search-header" class="model-link margin-right-0px text-dark opacity-hover-8" href="#search">
                                    <i class="fa fa-search"></i>
                                </a>
                                    </div>

                                </div>
                                <div class="col-lg-2 col-md-12  d-none d-lg-block">
                                    <a data-toggle="modal" data-target=".bd-example-modal-lg" href="#" class="btn btn-sm border-radius-30 margin-tb-20px text-white  background-main-color  box-shadow float-right padding-lr-20px margin-left-30px d-block">
                          <i class="fa fa-envelope-o margin-right-10px"></i>  Get A Quote
                        </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- // Header  -->


    <!-- Search  -->
    <div id="search">
        <button type="button" class="close">×</button>
        <form class="clearfix d-block">
            <input type="search" value="" placeholder="Search for . . . ." />
            <button type="submit" class="btn btn-primary">Search</button>
        </form>
    </div>
    <!-- // Search  -->


    <!-- Get A Quote  -->
    <div class="modal contact-modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content margin-top-150px background-main-color">
                <div class="row no-gutters">
                    <div class="col-lg-5">
                        <img src="assets/img/contact-img.jpg" alt="">
                    </div>
                    <div class="col-lg-7">
                        <div class="padding-30px">

                            <h3 class="padding-bottom-15px">Get A Free Quote</h3>
                            <div id="quote_data"></div>
                            <form method="post" action="#/" onsubmit="quote();return false;">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Full Name</label>
                                        <input type="text" class="form-control" name="f_name" id="f_name" placeholder="Name" required="">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Email</label>
                                        <input type="email" class="form-control" name="mail" id="mail" placeholder="Email" required="">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Expected Time</label>
                                        <input type="date" class="form-control" name="exp_date" id="exp_date" placeholder="From Place" required="">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Tel</label>
                                        <input type="number" class="form-control" name="tel" id="tel" placeholder="To place" required="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Vehicle</label>
                                    <input type="text" class="form-control" name="vehicle" id="vehicle" placeholder="Vehicle Name" required="">
                                </div>
                                <div class="form-group">
                                    <label>Model</label>
                                    <input type="text" class="form-control" name="model" id="model" placeholder="Vehicle Model " required="">
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>From</label>
                                        <input type="text" class="form-control" name="car_from" id="car_from" placeholder="From Place" required="">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>To</label>
                                        <input type="text" class="form-control" name="car_to" id="car_to" placeholder="To place" required="">
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label>Message</label>
                                    <textarea class="form-control" name="detail" id="detail" rows="3" required=""></textarea>
                                </div>

                                <button type="submit" name="send_message" class="btn btn-primary text-center  text-uppercase rounded-0 padding-15px ">SEND quote</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- // Get A Quote  -->


    <?php
         if(isset($_GET['home']))
        {
          include("home.php");
        }
        
        elseif(isset($_GET['about']))
        {           
            include("about.php");
        }

        elseif(isset($_GET['faq']))
        {           
            include("faq.php");
        }

        elseif(isset($_GET['team']))
        {           
            include("team.php");
        }

        elseif(isset($_GET['price']))
        {           
            include("price.php");
        }

        elseif(isset($_GET['partner']))
        {           
            include("partner.php");
        }

        elseif(isset($_GET['service']))
        {           
            include("service.php"); 
        }

        elseif(isset($_GET['service_detail']))
        {           
            include("service_detail.php"); 
        }

        elseif(isset($_GET['contact']))
        {           
            include("contact.php");
        }

        elseif(isset($_GET['blog']))
        {           
            include("blog.php");
        }

        elseif(isset($_GET['tax']))
        {           
            include("tax.php");
        }

        elseif(isset($_GET['blog_details']))
        {           
            include("blog_details.php");
        }

        else
        {
          include("home.php");
        }
    ?> 

<!-- footer -->
    <footer class="layout-dark">
        <div class="container padding-tb-100px">
            <div class="row">

                <div class="col-lg-3 col-md-6">
                    <div class="about-us sm-mb-45px">
                        <!-- <div class="logo-footer margin-bottom-35px">
                            <a href="#"><img src="admin/img/logo/<?php echo $logo; ?>" alt="" width="188px" height="41px"></a>
                        </div> -->
                        <div class="text margin-bottom-35px">
                            <h2 class="title">Site Details</h2>
                            <?php echo $description; ?>
                        </div>
                        <!-- <a href="#" class="nile-bottom sm">Read More</a> -->
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="nile-widget widget_nav_menu sm-mb-45px">
                        <h2 class="title">Our Services</h2>
                        <ul class="footer-menu">
                            <?php

                                $sql = " SELECT * FROM `service` order by service_id DESC  ";
                                $query = $conn->prepare($sql);
                                $query->execute();
                                $data = $query->rowCount();
                                while($fetch = $query->fetch()){
                            ?>
                            <li><a href="#"><?php echo $fetch['tittle'];?></a></li>
                            <?php
                                }
                            ?>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="nile-widget">
                        <div class="margin-bottom-60px">
                            <h2 class="title">Location</h2>
                            <div class="contact-info opacity-9">
                                <div class="icon margin-top-5px"><span class="icon_pin_alt"></span></div>
                                <div class="text">
                                    <span class="title-in">Location :</span> <br>
                                    <span class="font-weight-500 text-uppercase"> <?php echo $address; ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="call_center">
                            <h2 class="title">Call Center</h2>
                            <div class="contact-info opacity-9">
                                <div class="icon  margin-top-5px"><span class="icon_phone"></span></div>
                                <div class="text">
                                    <span class="title-in">Call Us :</span><br>
                                    <span class="font-weight-500 text-uppercase">+<?php echo $phone; ?> / +<?php echo $mobile; ?></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <br>
                    <!--  Social -->
                    <ul class="social-media list-inline text-white">
                        <li class="list-inline-item"><a class="facebook" href="https://web.facebook.com/Radiotv10Rwanda/posts/2972290916205580?_rdc=1&_rdr" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>

                        <li class="list-inline-item"><a class="youtube" href="https://www.youtube.com/channel/UCzCyzQ2VFkHxAqmlb1mTH8g" target="_blank"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>


                        <li class="list-inline-item"><a class="instagram" href="https://www.instagram.com/cartransporterdar/" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>

                        <li class="list-inline-item"><a class="twitter" href="https://twitter.com/dartransporter?lang=en" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                    </ul>
                    <!-- // Social -->
                </div>

                <div class="col-lg-3 col-md-6">
                    
                </div>

            </div>
        </div>
    </footer>
    <!-- jquery library  -->
    <script src="assets/js/nile-slider.js"></script>
    <script src="assets/js/jquery-3.2.1.min.js"></script>
    <!-- REVOLUTION JS FILES -->
    <script src="assets/rslider/js/jquery.themepunch.tools.min.js"></script>
    <script src="assets/rslider/js/jquery.themepunch.revolution.min.js"></script>
    <!-- SLIDER REVOLUTION 5.0 EXTENSIONS -->
    <script src="assets/rslider/js/extensions/revolution.extension.actions.min.js"></script>
    <script src="assets/rslider/js/extensions/revolution.extension.carousel.min.js"></script>
    <script src="assets/rslider/js/extensions/revolution.extension.kenburn.min.js"></script>
    <script src="assets/rslider/js/extensions/revolution.extension.layeranimation.min.js"></script>
    <script src="assets/rslider/js/extensions/revolution.extension.migration.min.js"></script>
    <script src="assets/rslider/js/extensions/revolution.extension.navigation.min.js"></script>
    <script src="assets/rslider/js/extensions/revolution.extension.parallax.min.js"></script>
    <script src="assets/rslider/js/extensions/revolution.extension.slideanims.min.js"></script>
    <script src="assets/rslider/js/extensions/revolution.extension.video.min.js"></script>
    <script src="assets/js/YouTubePopUp.jquery.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/imagesloaded.min.js"></script>
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/mine.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

</body>


<!-- home-200:34-->
</html>
