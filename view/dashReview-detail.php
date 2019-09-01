<?php
session_start();
include_once("includes/session.php")
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

<!--top bar-->
<div class="top-bar">
    <div class="slide-container">
        <div class="top-strip">
            <i class="fa fa-angle-left fa-2x side-nav-toggle"></i>
			<div class="start-here">
            	<a href="startselling.php" class="btn ui-btn info">Start Selling</a>
			</div>
        </div>
        <div class="bottom-strip">
            <a href="index.php">Home</a> <i class="fa fa-angle-right"></i>
            <a href="dashboard.php"> Dashboard</a> <i class="fa fa-angle-right"></i>
            <a href="#"> Review</a>
        </div>
    </div>
</div>
<!--end top bar-->

<!--side menu-->

	<?php include("includes/dashSidebar.php"); ?>

<!--end side menu-->

<!--dashboard content-->
<div class="slide-container">
    <div class="dashboard-content">

        <!--client reviews-->
        <div class="dash-reviews">
            <div class="row">
                <div class="col-lg-8">
                    <div class="holder">
                        <div class="top-part"><strong>Client Review</strong><i class="fa fa-star-o"></i></div>
                        <div class="message-detail">
                            <div class="message-top">
                                <div class="review-rate">
                                    <h1>5.0</h1>
                                    <div class="rating-stars">
                                        <i class="fa fa-star yel"></i>
                                        <i class="fa fa-star yel"></i>
                                        <i class="fa fa-star yel"></i>
                                        <i class="fa fa-star-half-empty"></i>
                                        <i class="fa fa-star-o yel"></i>
                                    </div>
                                </div>
                                <div class="review-sentiment">
                                    <i class="fa fa-smile-o fa-2x text-info"></i>
                                    <em>Positive sentiment</em>
                                </div>
                            </div>
                            <div class="message-center">
                                <p>
                                    Corned beef sausage pancetta tongue,
                                    ham fatback beef ball tip chicken ham hock
                                    capicola kevin prosciutto kielbasa tenderloin.
                                    Sausage turkey flank jowl pig fatback andouille swine pork andouille swine pork.
                                </p>
                                <strong>Nancy McKenzie</strong> <em>24 Jun 2017</em>
                            </div>
                            <div class="message-bottom">
                                <a href="#">Respond</a>
                                <a href="#">Share</a>
                                <form action="#" method="post">
                                    <div class="form-group">
                                        <textarea name="msg" id="msg" rows="2" placeholder="Your Message here..."></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-sm"><i class="fa fa-reply"></i> Reply</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="holder">
                        <div class="top-part"><strong>Client Info</strong><i class="fa fa-user"></i></div>
                        <div class="client-info">
                           <div class="client-photo">
                               <div class="user-icon">
                                   <img src="img/avatar2.jpg" alt="">
                               </div>
                               <strong>Nancy McKenzie</strong>
                               <em>San Francisco, CA</em>
                               <div class="client-contact">
                                   <a href="#"><i class="fa fa-wechat"></i> <em>Send SMS</em></a>
                                   <a href="#"><i class="fa fa-envelope-o"></i> <em>Send Email</em></a>
                               </div>
                           </div>
                            <hr>
                            <div class="client-contact-info">
                                <span>Email</span>
                                <i>mackenzie@nancy.com</i>
                                <span>Phone</span>
                                <i>+1 658 5646 545</i>
                                <span>Address</span>
                                <i>Anderson Road 32-30</i>
                                <i>San Fransisco, CA</i>
                                <i>United States</i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end client reviews-->

        <!--dashboard footer-->
        <div class="dash-footer">
            <span>&copy; BuzziBarter: All Rights Reserved.</span>
        </div>
        <!--end dashboard footer-->

    </div>
</div>
<!--end dashboard content-->

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