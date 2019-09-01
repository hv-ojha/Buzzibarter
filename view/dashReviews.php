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
            <a href="#"> Reviews</a>
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
                <div class="col-lg-3 col-md-6">
                    <div class="client-review">
                        <div class="user-icon">
                            <img src="img/avatar.jpg" alt="">
                        </div>
                        <strong>Carol Mitch</strong>
                        <em>carol@mit.com</em>
                        <div class="client-ratings">
                            <div class="rating-stars">
                                <i class="fa fa-star yel"></i>
                                <i class="fa fa-star yel"></i>
                                <i class="fa fa-star yel"></i>
                                <i class="fa fa-star-half-empty"></i>
                                <i class="fa fa-star-o yel"></i>
                            </div>
                            <a href="dashReview-detail.php"><i class="fa fa-chevron-circle-right text-info"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="client-review">
                        <div class="user-icon">
                            <img src="img/user2.jpg" alt="">
                        </div>
                        <strong>Brandon Zen</strong>
                        <em>carol@mit.com</em>
                        <div class="client-ratings">
                            <div class="rating-stars">
                                <i class="fa fa-star yel"></i>
                                <i class="fa fa-star yel"></i>
                                <i class="fa fa-star yel"></i>
                                <i class="fa fa-star-half-empty"></i>
                                <i class="fa fa-star-o yel"></i>
                            </div>
                            <a href="dashReview-detail.php"><i class="fa fa-chevron-circle-right text-info"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="client-review">
                        <div class="user-icon">
                            <img src="img/avatar2.jpg" alt="">
                        </div>
                        <strong>Megan Trevor</strong>
                        <em>carol@mit.com</em>
                        <div class="client-ratings">
                            <div class="rating-stars">
                                <i class="fa fa-star yel"></i>
                                <i class="fa fa-star yel"></i>
                                <i class="fa fa-star yel"></i>
                                <i class="fa fa-star-half-empty rel"></i>
                                <i class="fa fa-star-o yel"></i>
                            </div>
                            <a href="dashReview-detail.php"><i class="fa fa-chevron-circle-right text-info"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="client-review">
                        <div class="user-icon">
                            <img src="img/user.jpg" alt="">
                        </div>
                        <strong>Jack Brody</strong>
                        <em>carol@mit.com</em>
                        <div class="client-ratings">
                            <div class="rating-stars">
                                <i class="fa fa-star yel"></i>
                                <i class="fa fa-star yel"></i>
                                <i class="fa fa-star yel"></i>
                                <i class="fa fa-star-half-empty rel"></i>
                                <i class="fa fa-star-o yel"></i>
                            </div>
                            <a href="dashReview-detail.php"><i class="fa fa-chevron-circle-right text-info"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="client-review">
                        <div class="user-icon">
                            <img src="img/avatar2.jpg" alt="">
                        </div>
                        <strong>Megan Trevor</strong>
                        <em>carol@mit.com</em>
                        <div class="client-ratings">
                            <div class="rating-stars">
                                <i class="fa fa-star yel"></i>
                                <i class="fa fa-star yel"></i>
                                <i class="fa fa-star yel"></i>
                                <i class="fa fa-star-half-empty rel"></i>
                                <i class="fa fa-star-o yel"></i>
                            </div>
                            <a href="dashReview-detail.php"><i class="fa fa-chevron-circle-right text-info"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="client-review">
                        <div class="user-icon">
                            <img src="img/avatar.jpg" alt="">
                        </div>
                        <strong>Carol Mitch</strong>
                        <em>carol@mit.com</em>
                        <div class="client-ratings">
                            <div class="rating-stars">
                                <i class="fa fa-star yel"></i>
                                <i class="fa fa-star yel"></i>
                                <i class="fa fa-star yel"></i>
                                <i class="fa fa-star-half-empty"></i>
                                <i class="fa fa-star-o yel"></i>
                            </div>
                            <a href="dashReview-detail.php"><i class="fa fa-chevron-circle-right text-info"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="client-review">
                        <div class="user-icon">
                            <img src="img/user2.jpg" alt="">
                        </div>
                        <strong>Brandon Zen</strong>
                        <em>carol@mit.com</em>
                        <div class="client-ratings">
                            <div class="rating-stars">
                                <i class="fa fa-star yel"></i>
                                <i class="fa fa-star yel"></i>
                                <i class="fa fa-star yel"></i>
                                <i class="fa fa-star-half-empty"></i>
                                <i class="fa fa-star-o yel"></i>
                            </div>
                            <a href="dashReview-detail.php"><i class="fa fa-chevron-circle-right text-info"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="client-review">
                        <div class="user-icon">
                            <img src="img/user.jpg" alt="">
                        </div>
                        <strong>Jack Brody</strong>
                        <em>carol@mit.com</em>
                        <div class="client-ratings">
                            <div class="rating-stars">
                                <i class="fa fa-star yel"></i>
                                <i class="fa fa-star yel"></i>
                                <i class="fa fa-star yel"></i>
                                <i class="fa fa-star-half-empty rel"></i>
                                <i class="fa fa-star-o yel"></i>
                            </div>
                            <a href="dashReview-detail.php"><i class="fa fa-chevron-circle-right text-info"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="client-review">
                        <div class="user-icon">
                            <img src="img/user.jpg" alt="">
                        </div>
                        <strong>Jack Brody</strong>
                        <em>carol@mit.com</em>
                        <div class="client-ratings">
                            <div class="rating-stars">
                                <i class="fa fa-star yel"></i>
                                <i class="fa fa-star yel"></i>
                                <i class="fa fa-star yel"></i>
                                <i class="fa fa-star-half-empty rel"></i>
                                <i class="fa fa-star-o yel"></i>
                            </div>
                            <a href="dashReview-detail.php"><i class="fa fa-chevron-circle-right text-info"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="client-review">
                        <div class="user-icon">
                            <img src="img/avatar2.jpg" alt="">
                        </div>
                        <strong>Megan Trevor</strong>
                        <em>carol@mit.com</em>
                        <div class="client-ratings">
                            <div class="rating-stars">
                                <i class="fa fa-star yel"></i>
                                <i class="fa fa-star yel"></i>
                                <i class="fa fa-star yel"></i>
                                <i class="fa fa-star-half-empty rel"></i>
                                <i class="fa fa-star-o yel"></i>
                            </div>
                            <a href="dashReview-detail.php"><i class="fa fa-chevron-circle-right text-info"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="client-review">
                        <div class="user-icon">
                            <img src="img/avatar.jpg" alt="">
                        </div>
                        <strong>Carol Mitch</strong>
                        <em>carol@mit.com</em>
                        <div class="client-ratings">
                            <div class="rating-stars">
                                <i class="fa fa-star yel"></i>
                                <i class="fa fa-star yel"></i>
                                <i class="fa fa-star yel"></i>
                                <i class="fa fa-star-half-empty"></i>
                                <i class="fa fa-star-o yel"></i>
                            </div>
                            <a href="dashReview-detail.php"><i class="fa fa-chevron-circle-right text-info"></i></a>
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