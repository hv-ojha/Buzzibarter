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

    <title>Raza</title>

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

    <!--location map-->
    <div class="map">
      <iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d238133.15238501187!2d72.6822102!3d21.1591425!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1517897963880" width="100%" height="100%" frameborder="1" style="border:0" allowfullscreen></iframe>
    </div>
    <!--end location map-->

    <!--contact form-->
    <div class="form-container">
        <div class="contact-form">
            <form action="#" method="post">
                <h2>Get In Touch</h2>
                <div class="form-group">
                    <label for="email3">Email:</label>
                    <input autocomplete="true" type="email" id="email3">
                </div>
                <div class="form-group">
                    <label for="phone">Phone:</label>
                    <input autocomplete="true" type="tel" id="phone">
                </div>
                <div class="form-group">
                    <label for="msg">Message</label>
                    <textarea name="msg" id="msg" rows="3" placeholder="Your Message Here ...."></textarea>
                </div>
                <button type="submit" class="btn ui-btn info">Send Message</button>
            </form>
            <div class="kando info">
                <h5>CONTACT INFORMATION</h5>
                <div class="contact-info">
                    <a href="mailto:someone@example.com">someone@example.com</a>
                    <span>+1 285 6658 5476215</span>
                    <span>1182 Market St,</span>
                    <span> San Francisco, CA</span>
                </div>
                <div class="social">
                    <a href="#"><i class="fa fa-facebook-f"></i></a>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                    <a href="#"><i class="fa fa-google-plus"></i></a>
                    <a href="#"><i class="fa fa-linkedin"></i></a>
                </div>
                <i class="fa fa-envelope-o fa-5x text-white"></i>
            </div>
        </div>
    </div>
    <!--end contact form-->

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

<!--GOOGLE MAPS-->

</body>


</html>