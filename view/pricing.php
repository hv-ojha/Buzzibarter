<?php
session_start();
include("includes/ses.php");
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
    <link rel="stylesheet" href="3rdparty/perfect-scrollbar/css/perfect-scrollbar.css">
    <link rel="stylesheet" href="css/app.css">

    <!--end stylesheets-->

    <!--google fonts-->

    <link href="https://fonts.googleapis.com/css?family=Quicksand:700|Raleway|Tangerine" rel="stylesheet">
    <!--end google fonts-->

</head>
<body>

<!-- Login/register Modal -->

<?php include('includes/login.php')?>

<!-- end Login/register Modal -->

<!--top navbar-->

	<?php include("includes/header.php"); ?>

<!--end top navbar-->

<!--side menu-->
<div class="side-menu" id="side-menu">
    <div class="side-menu-c">
        <div class="side-logo">
            <a href="index-2.php">BuzziBarter</a>
            <i class="fa fa-times close-menu"></i>
        </div>
        <ul class="list-unstyled mini">
            <li><a href="index-2.php">Home</a></li>
            <li><a href="listing_one.php">Listings</a></li>
            <li><a href="aboutus.php">About Us</a></li>
            <li><a href="contact.php">Contact US</a></li>
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="#" data-toggle="modal" data-target="#Modal">Account</a></li>
        </ul>
    </div>
</div>
<!--end side menu-->

<div class="content-wrapper">

    <!--header-->
    <header class="head">
        <h1>Find Your <strong>Right Plan</strong></h1>
        <p>Paid plans start with a 14-day free trial</p>
        <p>Upgrade, Downgrade or Cancel anytime.</p>
        <div class="price-switcher">
            <a class="active" href="#">Monthly</a>
            <a href="#">Yearly</a>
        </div>
    </header>
    <!--end header-->

    <!--pricing tables-->
    <div class="p-tables">
        <div class="row">
            <div class="col-lg-4 col-md-6"><div class="pricing-table">
                <div class="title">
                    <h6><strong>PERSONAL</strong></h6>
                </div>
                <div class="table-content">
                  <div class="price">
                      <i class="fa fa-rupee"></i>
                      <h1>500</h1>
                      <em>/mo</em>
                  </div>
                    <div class="offers">
                        <p><i class="fa fa-check text-info"></i> <span>Unlimited Listings</span></p>
                        <p><i class="fa fa-check text-info"></i> <span>Edit Your Listings</span></p>
                        <p><i class="fa fa-check text-info"></i> <span>Get Quick Approval</span></p>
                        <p><i class="fa fa-times"></i> <span>Take Bookings Online</span></p>
                        <p><i class="fa fa-times"></i> <span>24/7 Support Service</span></p>
                        <p><i class="fa fa-times"></i> <span>Secure Payments</span></p>
                        <p><i class="fa fa-times"></i> <span>No Restrictions</span></p>
                    </div>
                    <a href="listing_two.php" class="btn ui-btn dark-blue btn-block">Get this Plan</a>
                </div>
            </div></div>
            <div class="col-lg-4 col-md-6"><div class="pricing-table">
                <div class="title">
                    <h6><strong>BUSINESS</strong></h6>
                    <strong class="text-info">Popular</strong>
                </div>
                <div class="table-content">
                  <div class="price">
                      <i class="fa fa-rupee"></i>
                      <h1>2000</h1>
                      <em>/mo</em>
                  </div>
                    <div class="offers">
                        <p><i class="fa fa-check text-info"></i> <span>Unlimited Listings</span></p>
                        <p><i class="fa fa-check text-info"></i> <span>Edit Your Listings</span></p>
                        <p><i class="fa fa-check text-info"></i> <span>Get Quick Approval</span></p>
                        <p><i class="fa fa-check text-info"></i> <span>Take Bookings Online</span></p>
                        <p><i class="fa fa-check text-info"></i> <span>24/7 Support Service</span></p>
                        <p><i class="fa fa-times"></i> <span>Secure Payments</span></p>
                        <p><i class="fa fa-times"></i> <span>No Restrictions</span></p>
                    </div>
                    <a href="listing_two.php" class="btn ui-btn dark-blue btn-block">Get this Plan</a>
                </div>
            </div></div>
            <div class="col-lg-4 col-md-6"><div class="pricing-table">
                <div class="title">
                    <h6><strong>AGENCY</strong></h6>
                </div>
                <div class="table-content">
                  <div class="price">
                      <i class="fa fa-rupee"></i>
                      <h1>4500</h1>
                      <em>/mo</em>
                  </div>
                    <div class="offers">
                        <p><i class="fa fa-check text-info"></i> <span>Unlimited Listings</span></p>
                        <p><i class="fa fa-check text-info"></i> <span>Edit Your Listings</span></p>
                        <p><i class="fa fa-check text-info"></i> <span>Get Quick Approval</span></p>
                        <p><i class="fa fa-check text-info"></i> <span>Take Bookings Online</span></p>
                        <p><i class="fa fa-check text-info"></i> <span>24/7 Support Service</span></p>
                        <p><i class="fa fa-check text-info"></i> <span>Secure Payments</span></p>
                        <p><i class="fa fa-check text-info"></i> <span>No Restrictions</span></p>
                    </div>
                    <a href="listing_two.php" class="btn ui-btn dark-blue btn-block">Get this Plan</a>
                </div>
            </div></div>
        </div>
    </div>
    <!--end pricing tables-->

    <!--Q&A-->
    <div class="qna">
        <h1 class="qna-title">q&a</h1>
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="qna-item">
                    <h5><strong>How does it work?</strong></h5>
                    <p>
                        Bacon ipsum dolor amet doner pork loin cow rump leberkas
                        biltong chuck tri-tip pig andouille hamburger salami strip
                        steak landjaeger prosciutto. chuck tri-tip pig andouille
                        hamburger salami strip steak landjaeger prosciutto.
                    </p>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="qna-item">
                    <h5><strong>What is The Raza precisely?</strong></h5>
                    <p>
                        Bacon ipsum dolor amet doner pork loin cow rump leberkas
                        biltong chuck tri-tip pig andouille hamburger salami strip
                        steak landjaeger prosciutto. chuck tri-tip pig andouille
                        hamburger salami strip steak landjaeger prosciutto.
                    </p>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="qna-item">
                    <h5><strong>Do you provide support?</strong></h5>
                    <p>
                        Bacon ipsum dolor amet doner pork loin cow rump leberkas
                        biltong chuck tri-tip pig andouille hamburger salami strip
                        steak landjaeger prosciutto. chuck tri-tip pig andouille
                        hamburger salami strip steak landjaeger prosciutto.
                    </p>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="qna-item">
                    <h5><strong>Why choose The Raza?</strong></h5>
                    <p>
                        Bacon ipsum dolor amet doner pork loin cow rump leberkas
                        biltong chuck tri-tip pig andouille hamburger salami strip
                        steak landjaeger prosciutto. chuck tri-tip pig andouille
                        hamburger salami strip steak landjaeger prosciutto.
                    </p>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="qna-item">
                    <h5><strong>What if I have other questions?</strong></h5>
                    <p>
                        Bacon ipsum dolor amet doner pork loin cow rump leberkas
                        biltong chuck tri-tip pig andouille hamburger salami strip
                        steak landjaeger prosciutto. chuck tri-tip pig andouille
                        hamburger salami strip steak landjaeger prosciutto.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!--end Q&A-->

</div>

<!--footer section-->

	<?php include("includes/footer.php"); ?>

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


</html>