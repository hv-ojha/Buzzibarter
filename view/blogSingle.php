<?php
session_start()
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
<?php include("includes/header.php");?>
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
            <li><a href="blog.php">Blog</a></li>
            <li><a href="contact.php">Contact</a></li>
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="#" data-toggle="modal" data-target="#Modal">Account</a></li>
        </ul>
    </div>
</div>
<!--end side menu-->

<div class="content-wrapper">

    <!--blog posts container-->
    <div class="blog-container">
        <div class="row">
            <div class="col-lg-9 col-md-8">
                <!--posts-->
                <div class="box">
                    <div class="post">
                        <img src="img/ride.jpg" alt="">

                        <div class="post-content">
                            <div class="post-tags">
                                <span>Inspiration</span>
                                <span>Lifestyle</span>
                            </div>
                            <h5 class="post-title">Ham hock shank hamburger swine, pig rump filet mignon porchetta. Sausage ground round swine</h5>
                            <p>
                                Salami pastrami prosciutto venison bacon short ribs.
                                Ribeye shoulder tail pig. Turducken tenderloin drumstick
                                alcatra ribeye doner kielbasa jowl venison pork belly brisket
                                shankle hamburger porchetta. Ham hock shank hamburger swine,
                                pig rump filet mignon porchetta. Sausage ground round swine
                                corned beef sirloin hamburger shank pork loin jowl short loin
                                pork
                                <br>
                                <br>
                                Ham hock shank hamburger swine,
                                pig rump filet mignon porchetta. Sausage ground round swine
                                corned beef sirloin hamburger shank pork loin jowl short loin
                                pork
                                <br>
                                <br>
                                <span class="quote">
                                    Ham hock shank hamburger swine,
                                    pig rump filet mignon porchetta. Sausage ground round swine
                                    corned beef sirloin hamburger shank pork loin jowl short loin
                                    corned beef sirloin hamburger shank pork loin jowl short loin
                                    corned beef sirloin hamburger shank pork loin jowl short loin
                                </span>
                                <br>
                                <br>
                                Turducken tenderloin drumstick
                                alcatra ribeye doner kielbasa jowl venison pork belly brisket
                                shankle hamburger porchetta. Ham hock shank hamburger swine,
                                pig rump filet mignon porchetta. Sausage ground round swine
                                corned beef sirloin hamburger shank pork loin jowl short loin
                                pork
                            </p>
                        </div>

                        <div class="post-action">
                            <span class="date">March 27, 2018</span>
                            <div class="social">
                                <i class="fa fa-facebook-f"></i>
                                <i class="fa fa-twitter"></i>
                                <i class="fa fa-google-plus"></i>
                                <i class="fa fa-linkedin"></i>
                                <i class="fa fa-pinterest-p"></i>
                            </div>
                            <a href="blog.php" class="read-more">Back to Posts</a>
                        </div>

                        <div class="post-comments">
                            <strong>3 Comments</strong>
                            <hr>
                            <div class="comments">
                                <div class="comment">
                                    <div class="comment-photo">
                                        <div class="comm-img">
                                            <img src="img/avatar.jpg" class="img-fluid" alt="">
                                        </div>
                                        <i class="fa fa-heart"></i>
                                        <i class="fa fa-share-alt"></i>
                                    </div>
                                    <div class="comment-info">
                                        <h6 class="comment-name">Rachel Ivin</h6>
                                        <i>Thursday Feb 4, 2015</i>
                                        <p>
                                            Jowl cupim prosciutto meatloaf, andouille shoulder tail salami.
                                            Corned beef t-bone shoulder, biltong brisket chuck rump hamburger tri-tip.
                                            Short loin porchetta fatback chicken. Sausage venison tail
                                        </p>
                                    </div>
                                </div>
                                <div class="comment">
                                    <div class="comment-photo">
                                        <div class="comm-img">
                                            <img src="img/driver.jpg" class="img-fluid" alt="">
                                        </div>
                                        <i class="fa fa-heart"></i>
                                        <i class="fa fa-share-alt"></i>
                                    </div>
                                    <div class="comment-info">
                                        <h6 class="comment-name">Nancy Liz</h6>
                                        <i>Thursday Feb 7, 2015</i>
                                        <p>
                                            Jowl cupim prosciutto meatloaf, andouille shoulder tail salami.
                                            Corned beef t-bone shoulder, biltong brisket chuck rump hamburger tri-tip.

                                        </p>
                                    </div>
                                </div>
                                <div class="comment">
                                    <div class="comment-photo">
                                        <div class="comm-img">
                                            <img src="img/user.jpg" class="img-fluid" alt="">
                                        </div>
                                        <i class="fa fa-heart"></i>
                                        <i class="fa fa-share-alt"></i>
                                    </div>
                                    <div class="comment-info">
                                        <h6 class="comment-name">Jack Bran</h6>
                                        <i>Thursday Feb 15, 2015</i>
                                        <p>
                                            Jowl cupim prosciutto meatloaf, andouille shoulder tail salami.
                                            Corned beef t-bone shoulder, biltong brisket chuck rump hamburger tri-tip.

                                        </p>
                                    </div>
                                </div>
                            </div>
                            <strong>Comment</strong>
                            <form action="#" method="post">
                                <div class="form-group">
                                    <textarea name="msg" id="" rows="4" class="" placeholder="Your thoughts here..."></textarea>
                                </div>
                                <button class="btn ui-btn dark-blue">Submit</button>
                            </form>
                        </div>

                    </div>
                </div>
                <!--end posts-->
            </div>
            <div class="col-lg-3 col-md-4">
                <div class="box">
                    <div class="pad">
                        <div class="search-box">
                            <input type="text" placeholder="Search">
                            <span><i class="fa fa-search"></i></span>
                        </div>
                    </div>
                </div>

                <div class="box">
                    <div class="pad">
                        <p class="text-center"><strong>About Us</strong></p>
                        <div class="abt">
                            <div class="abt-img">
                                <img src="img/people%20laughing_0.jpg" alt="">
                            </div>
                            <span>
                               Ham hock shank hamburger swine, pig rump filet mignon porchetta.
                           Sausage ground round swine corned beef sirloin hamburger
                           shank pork loin jowl
                          </span>
                        </div>
                    </div>
                </div>

                <div class="box">
                    <div class="pad">
                        <p class="text-center"><strong>Let's Connect</strong></p>
                        <div class="connect-social">
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-facebook-f"></i></a>
                            <a href="#"><i class="fa fa-linkedin"></i></a>
                            <a href="#"><i class="fa fa-google-plus"></i></a>
                            <a href="#"><i class="fa fa-pinterest-p"></i></a>
                        </div>
                    </div>
                </div>

                <div class="box">
                    <div class="pad">
                        <p class="text-center"><strong>Recent Stories</strong></p>
                        <div class="recent-stories">
                            <a href="#">Happiness consists of Salami pastrami prosciu...</a>
                            <a href="#">Happiness consists of Salami pastrami prosciu...</a>
                            <a href="#">Consists of Salami pastrami prosciu...</a>
                            <a href="#">Of Salami pastrami prosciu...</a>
                            <a href="#">Happiness consists of Salami pastrami prosciu...</a>
                            <a href="#">Appine consists of Salami pastrami prosciu...</a>
                            <a href="#">Hpin consists of Salami pastrami prosciu...</a>
                            <a href="#">Happiness consists of Salami pastrami prosciu...</a>
                            <a href="#">Happiness consists of Salami pastrami prosciu...</a>
                        </div>
                    </div>
                </div>

                <div class="box">
                    <div class="pad">
                        <p class="text-center"><strong>Subscribe</strong></p>
                        <div class="search-box">
                            <input type="text" placeholder="Email">
                            <span><i class="fa fa-envelope-o"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end blog posts container-->

</div>

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


</html>