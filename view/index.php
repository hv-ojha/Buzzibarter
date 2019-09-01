<?php
session_start();
include("../controller/controller_cl.php");
if(isset($_REQUEST["lg"]))
{
    session_destroy();
}
if(isset($_REQUEST["search"]))
{
    if($_REQUEST["cat"]=="" && $_REQUEST["tp"]!="")
    {
        $tp = $_REQUEST["tp"];
        header("location: listing_two.php?tp=$tp");
    }
    elseif($_REQUEST["tp"]=="" && $_REQUEST["cat"]!="")
    {
        $cat = $_REQUEST["cat"];
        header("location: listing_two.php?cat=$cat");
    }
    elseif($_REQUEST["tp"]!="" && $_REQUEST["cat"]!="")
    {
        $tp = $_REQUEST["tp"];
        $cat = $_REQUEST["cat"];
        header("location: listing_two.php?tp=$tp&cat=$cat");
    }
}
$cat = mysql_query("Select * from category");
?>
<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>

    <!--meta tags-->
    <meta charset="UTF-8">
    <meta name="description" content="Services Listing HTML5 CSS3 template">
    <meta name="keywords" content="HTML,CSS,XML,JavaScript, services, listing">
    <meta name="author" content="Ui-DesignLab">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--end meta tags-->

    <title>BuzziBarter</title>

    <!--stylesheets-->

    <link rel="stylesheet" href="3rdparty/css/bootstrap.min.css">
    <link rel="stylesheet" href="3rdparty/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="3rdparty/css/animate.min.css">
    <link rel="stylesheet" href="3rdparty/jquery-nice-select-1.1.0/css/nice-select.css">
    <link rel="stylesheet" href="3rdparty/OwlCarousel2-2.2.1/owl.carousel.min.css">
    <link rel="stylesheet" href="3rdparty/OwlCarousel2-2.2.1/owl.theme.green.min.css">
    <link rel="stylesheet" href="css/app.css">

    <!--end stylesheets-->

    <!--google fonts-->

    <link href="https://fonts.googleapis.com/css?family=Quicksand:700|Raleway|Tangerine" rel="stylesheet">
    <!--end google fonts-->


</head>
<body>

<!--banner-->
<div class="landing-banner">
    <nav class="banner-menu">
        <div class="banner-logo"><a href="#">BuzziBarter</a></div>
        <div class="start-here">
            <a href="pricing.php" class="btn ui-btn info">Start Here</a>
        </div>
    </nav>

    <div class="banner-content">
        <h1 class="banner-title">Get Internet properties Asap!</h1>
        <p>Choose from thousands of properties and get the perfect one for your Start-up.</p>
<form method="post">
        <div class="select-fields">
            <div class="sel">
                <select name="tp" class="wide">
                    <option selected value="">Select Type</option>
                    <option value="application">Application</option>
                    <option value="domains">Domain name</option>
                    <option value="website">Website</option>
                </select>
            </div>
            <div class="sel">
                <select name="cat" class="wide">
                    <option selected value="">Select Category</option>
                    <?php
                    while($row = mysql_fetch_array($cat))
                    {
                    ?>
                    <option value="<?php echo $row["category_id"] ?>"><?php echo $row["category_name"] ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <button name="search" class="btn ui-btn dark-blue">Start Now</button>
        </div>
        </form>
    </div>

</div>
<!--end banner-->

<!--efficiency-->
<div class="efficient">
    <div class="row">
        <div class="col-lg-4 col-md-4">
        <a href="listing_two.php">
            <div class="eff-item">
                <i class="fa fa-desktop text-success fa-3x"></i>
            </div>
            <div class="eff-tt">
               	<h5><strong>WEBSITES</strong></a></h5>
            </div>
        </div>
        <div class="col-lg-4 col-md-4">
        <a href="listing_two.php">
            <div class="eff-item">
                <i class="fa fa-globe text-danger fa-3x"></i>
            </div>
            <div class="eff-tt">
               	<h5><strong>DOMAINS</strong></h5>
            </div>
        </a>
        </div>
        <div class="col-lg-4 col-md-4">
        <a href="listing_two.php">
            <div class="eff-item">
                <i class="fa fa-mobile-phone text-info fa-4x"></i>
            </div>
            <div class="eff-tt">
                	<h5><strong>APPLICATION</strong></h5>
            </div>
        </a>
        </div>
    </div>
</div>
<!--end efficiency-->

<!--connecting people-->
<div class="connect">
    <div class="row">
        <div class="col-lg-4 col-md-4">
            <div class="connect-img">
                <img src="img/edit.jpg" alt="">
            </div>
        </div>
        <div class="col-lg-8 col-md-8">
            <div class="connect-info">
                <h3>Take The First Step, move forward.</h3>
                <p>
                    
                    ---------------------------------------------------------
                    <p class="text-justify">
                        This is the first step for the people to embrase their startups. Here we provide several handy and most required tools to take your start-up at new level. This website provide a best to get the required with great efficiency.
                    </p>
                    <p class="text-justify">
                        It is also a great platform to get a good revenue for your used or pastly created or owned property. The only thing is to upload your product over here. The interested people will connect your the medium.
                    </p>
				   ---------------------------------------------------------
				   </p>
                <a href="pricing.php" class="btn ui-btn info">Get Started</a>
            </div>
        </div>
    </div>
</div>
<!--end connecting people-->

<!--most requested-->
<div class="requested">
<h3 class="text-center">Get Started with BuzziBarter</h3>
    <div class="row">
        <div class="col-lg-4 col-md-4">
        <a href="app_selling.php">
            <div class="requested-item">
                <img src="img/application.jpeg" alt="">
                <div class="req-item-hover">
                    <h5 class="text-light">Application</h5>
                </div>
            </div>
            </a>
        </div>
        <div class="col-lg-4 col-md-4">
        <a href="domain_selling.php">
            <div class="requested-item">
                <img src="img/domain.jpeg" alt="">
                <div class="req-item-hover">
                    <h5 class="text-light">Domains</h5>
                </div>
            </div>
            </a>
        </div>
        <div class="col-lg-4 col-md-4">
        <a href="web_selling.php">
            <div class="requested-item">
                <img src="img/website.jpg" alt="">
                <div class="req-item-hover">
                    <h5 class="text-light">Websites</h5>
                </div>
            </div>
            </a>
        </div>
    </div>
</div>
<!--end most requested-->

<!--top rated-->
<div class="top-rated">
    <h3 class="text-center">Top Bidders and Top Buyers</h3>
    <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="user-card">
                <div class="top">
                    <div class="user-photo">
                        <div><img src="img/riya.jpg" alt=""></div>
                        <span><i class="fa fa-star text-rose"></i></span>
                    </div>
                    <div class="user-details">
                        <h6 class="name">Riya Mistry</h6>
                        <div class="em-web">
                            <span>@Riya</span>
                            <span>|</span>
                            <span>merly.com</span>
                        </div>
                        <div class="location"><strong>India</strong></div>
                    </div>
                    <div class="user-counts">
                        <div class="count-item">
                            <i class="fa fa-twitter text-info"></i>
                            <strong>1241</strong>
                        </div>
                        <div class="count-item">
                            <i class="fa fa-heart text-mayan"></i>
                            <strong>786</strong>
                        </div>
                        <div class="count-item">
                            <i class="fa fa-envelope text-rose"></i>
                            <strong>569</strong>
                        </div>
                    </div>
                </div>
                <div class="center">
                    <p>
                        Short ribs cow pork chop itin pancetta sage jerky
                        bresaola frankfurter swine ribeye pork loin.
                        Leberkas ham.
                    </p>
                </div>
                <div class="bottom">
                    <strong>Services</strong>
                    <span>Design . Tutor . Cook . Web . Developer . Prototype</span>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="user-card">
                <div class="top">
                    <div class="user-photo">
                        <div><img src="img/harsh.jpg" alt=""></div>
                        <span><i class="fa fa-star text-rose"></i></span>
                    </div>
                    <div class="user-details">
                        <h6 class="name">Harshvardhan Ojha</h6>
                        <div class="em-web">
                            <span>@Harsh</span>
                            <span>|</span>
                            <span>Ojha.com</span>
                        </div>
                        <div class="location"><strong>India</strong></div>
                    </div>
                    <div class="user-counts">
                        <div class="count-item">
                            <i class="fa fa-twitter"></i>
                            <strong>1241</strong>
                        </div>
                        <div class="count-item">
                            <i class="fa fa-heart text-mayan"></i>
                            <strong>786</strong>
                        </div>
                        <div class="count-item">
                            <i class="fa fa-envelope"></i>
                            <strong>569</strong>
                        </div>
                    </div>
                </div>
                <div class="center">
                    <p>
                        Short ribs cow pork chop itin pancetta sage jerky
                        bresaola frankfurter swine ribeye pork loin.
                        Leberkas ham.
                    </p>
                </div>
                <div class="bottom">
                    <strong>Services</strong>
                    <span>Design . Tutor . Cook . Web . Developer . Prototype</span>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="user-card">
                <div class="top">
                    <div class="user-photo">
                        <div><img src="img/prachi.jpg" alt=""></div>
                        <span><i class="fa fa-star"></i></span>
                    </div>
                    <div class="user-details">
                        <h6 class="name">Prachi Parekh</h6>
                        <div class="em-web">
                            <span>@Prachi</span>
                            <span>|</span>
                            <span>Parekh.com</span>
                        </div>
                        <div class="location"><strong>India</strong></div>
                    </div>
                    <div class="user-counts">
                        <div class="count-item">
                            <i class="fa fa-twitter text-info"></i>
                            <strong>1241</strong>
                        </div>
                        <div class="count-item">
                            <i class="fa fa-heart text-mayan"></i>
                            <strong>786</strong>
                        </div>
                        <div class="count-item">
                            <i class="fa fa-envelope text-rose"></i>
                            <strong>569</strong>
                        </div>
                    </div>
                </div>
                <div class="center">
                    <p>
                        Short ribs cow pork chop itin pancetta sage jerky
                        bresaola frankfurter swine ribeye pork loin.
                        Leberkas ham.
                    </p>
                </div>
                <div class="bottom info">
                    <strong>Services</strong>
                    <span>Design . Tutor . Cook . Web . Developer . Prototype</span>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="user-card">
                <div class="top">
                    <div class="user-photo">
                        <div><img src="img/mox.jpg" alt=""></div>
                        <span><i class="fa fa-star text-rose"></i></span>
                    </div>
                    <div class="user-details">
                        <h6 class="name">Moxesh Mehta</h6>
                        <div class="em-web">
                            <span>@Mox</span>
                            <span>|</span>
                            <span>Mehta.com</span>
                        </div>
                        <div class="location"><strong>India</strong></div>
                    </div>
                    <div class="user-counts">
                        <div class="count-item">
                            <i class="fa fa-twitter"></i>
                            <strong>1241</strong>
                        </div>
                        <div class="count-item">
                            <i class="fa fa-heart"></i>
                            <strong>786</strong>
                        </div>
                        <div class="count-item">
                            <i class="fa fa-envelope text-rose"></i>
                            <strong>569</strong>
                        </div>
                    </div>
                </div>
                <div class="center">
                    <p>
                        Short ribs cow pork chop itin pancetta sage jerky
                        bresaola frankfurter swine ribeye pork loin.
                        Leberkas ham.
                    </p>
                </div>
                <div class="bottom">
                    <strong>Services</strong>
                    <span>Design . Tutor . Cook . Web . Developer . Prototype</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!--end top rated-->

<!--testimonials-->
<div class="testimonials">
    <h3 class="text-center">People talking about us</h3>
    <div class="owl-carousel owl-theme">
        <div class="item">
            <div class="testimonial-item">
                <div class="testm-img">
                    <img src="img/avatar.jpg" alt="">
                </div>
                <h5>Megan Trevor</h5>
                <i>Graphic Designer</i>
                <p>
                    It is most useful to me to get best revenue of my work.
                    The services by the website is pretty nice.
                </p>
            </div>
        </div>
        <div class="item">
            <div class="testimonial-item">
                <div class="testm-img">
                    <img src="img/user2.jpg" alt="">
                </div>
                <h5>Victor Zen</h5>
                <i>Web Developer</i>
                <p>
                    As being a web developer I create a number of Websites.
                    This platform is like a trasure for me to get a perfect revenue of my hardwork.
                    Bresaola meatball ribeye pig doner boudin. Meatloaf rump spare ribs,
                    salami drumstick corned beef ball tip jerky frankfurter.
                </p>
            </div>
        </div>
        <div class="item">
            <div class="testimonial-item">
                <div class="testm-img">
                    <img src="img/avatar2.jpg" alt="">
                </div>
                <h5>Carol Mitcho</h5>
                <i>Mobile App Designer</i>
                <p>
                    As the time is moving to the smartphone world, I create a lot of application.
                    Some do a well work. But some remain unused. So this website is effective to provide tools to the people who need them.
                </p>
            </div>
        </div>
		
    </div>
</div>
<!--end testimonials-->


<!--footer section-->
<?php include("includes/footer.php");?>
<!--end footer section-->

<!--pre-loader-->
<div class="preloader"><span class="beacon"></span></div>
<!--end pre-loader-->


<script src="3rdparty/js/jquery-3.2.1.min.js"></script>
<script src="3rdparty/js/popper.js"></script>
<script src="3rdparty/js/bootstrap.js"></script>
<script src="3rdparty/jquery-nice-select-1.1.0/js/jquery.nice-select.js"></script>
<script src="3rdparty/OwlCarousel2-2.2.1/owl.carousel.min.js"></script>
<script src="3rdparty/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
<script src="js/app.js"></script>
</body>

<!-- Mirrored from ui-designlab.me/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 18 Jan 2018 06:14:05 GMT -->
</html>