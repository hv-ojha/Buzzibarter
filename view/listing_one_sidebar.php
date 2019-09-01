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

<!--feed modal-->

<div class="modal fade" id="feedModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tell us what you want</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="#" class="user-feed">
                    <input type="checkbox" id="web">
                    <label for="web" class="chip">
                        web design
                    </label>
                    <input type="checkbox" checked id="design">
                    <label for="design" class="chip">
                        graphic design
                    </label>
                    <input type="checkbox" id="band">
                    <label for="band" class="chip">
                        music band
                    </label>
                    <input type="checkbox" id="tt">
                    <label for="tt" class="chip">
                        tutor
                    </label>
                    <input type="checkbox" id="clean">
                    <label for="clean" class="chip">
                        cleaning services
                    </label>
                    <input type="checkbox" id="taxi">
                    <label for="taxi" class="chip">
                        taxi services
                    </label>
                    <input type="submit" class="btn ui-btn dark-blue text-white" value="Done">
                </form>
            </div>
        </div>
    </div>
</div>

<!--end feed modal-->

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

    <!--banner-->
    <div class="listings-banner">
        <div class="select-fields">
            <div class="sel">
                <select title="Service" class="wide">
                    <option selected >Select Service</option>
                    <option data-display="Select">Web Designer</option>
                    <option value="1">Chef</option>
                    <option value="2">Tax Driver</option>
                    <option value="3" disabled>Electrician</option>
                    <option value="4">Cleaner</option>
                </select>
            </div>
            <div class="sel">
                <select title="Service" class="wide">
                    <option selected >Select City</option>
                    <option data-display="Select">New York</option>
                    <option value="1">Miami</option>
                    <option value="2">London</option>
                    <option value="3" disabled>Washington</option>
                    <option value="4">Paris</option>
                </select>
            </div>
            <button class="btn ui-btn dark-blue">Start Now</button>
        </div>
    </div>
    <!--end banner-->

    <!--switcher-->
    <div class="switcher">
        <div><h6>Grid Layout V2</h6></div>
        <div>
            <em>Customize Your Feed</em>&#8195;
            <a href="#" data-toggle="modal" data-target="#feedModal"><i class="fa fa-sliders"></i></a>
            <a href="#" class="active"><i class="fa fa-th"></i></a>
            <a href="listing_two.php"><i class="fa fa-list"></i></a>
            <a href="index-2.php"><i class="fa fa-home"></i></a>
        </div>
    </div>
    <!--end switcher-->

    <!--listings-->
    <div class="listings">
        <div class="row">
            <div class="col-lg-9 col-md-12">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="listing-item">
                            <div class="cover-img">
                                <img src="img/cooker2.jpg" alt="">
                                <div class="cover-hover">
                                    <div class="share-like">
                                        <a href="#" title="Like"><i class="fa fa-heart-o"></i></a>
                                        <a href="#" title="Share"><i class="fa fa-share-alt"></i></a>
                                        <a href="#" title="Bookmark"><i class="fa fa-bookmark-o"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="listing-info">
                                <div class="details">
                                    <div class="user-pic">
                                        <img src="img/chef2.jpg" alt="">
                                    </div>
                                    <strong>Nancy Mackenzie -></strong>
                                    <span>Chef</span>
                                    <p>
                                        Vice eiusmod authentic forage mustache try-hard proident
                                        aesthetic...
                                    </p>
                                    <i class="fa fa-map-marker text-info"></i> <em>New York City</em>
                                </div>
                                <div class="bottom-details">
                                    <div class="rating-stars">
                                        <i class="fa fa-star yel"></i>
                                        <i class="fa fa-star yel"></i>
                                        <i class="fa fa-star yel"></i>
                                        <i class="fa fa-star-half-empty"></i>
                                        <i class="fa fa-star-o yel"></i>
                                        <span>(4.4/345 Reviews)</span>
                                    </div>
                                    <a href="listingdetail.php">View <i class="fa fa-angle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="listing-item">
                            <div class="cover-img">
                                <img src="img/photographer.jpg" alt="">
                                <div class="cover-hover">
                                    <div class="share-like">
                                        <a href="#" title="Like"><i class="fa fa-heart-o"></i></a>
                                        <a href="#" title="Share"><i class="fa fa-share-alt"></i></a>
                                        <a href="#" title="Bookmark"><i class="fa fa-bookmark-o"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="listing-info">
                                <div class="details">
                                    <div class="user-pic">
                                        <img src="img/avatar2.jpg" alt="">
                                    </div>
                                    <strong>Carol Mitch -></strong>
                                    <span>Photographer</span>
                                    <p>
                                        Vice eiusmod authentic forage mustache try-hard proident
                                        aesthetic...
                                    </p>
                                    <i class="fa fa-map-marker text-info"></i> <em>Mystic Falls</em>
                                </div>
                                <div class="bottom-details">
                                    <div class="rating-stars">
                                        <i class="fa fa-star yel"></i>
                                        <i class="fa fa-star yel"></i>
                                        <i class="fa fa-star yel"></i>
                                        <i class="fa fa-star-half-empty"></i>
                                        <i class="fa fa-star-o yel"></i>
                                        <span>(4.4/345 Reviews)</span>
                                    </div>
                                    <a href="listingdetail.php">View <i class="fa fa-angle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="listing-item">
                            <div class="cover-img">
                                <img src="img/cook2.jpg" alt="">
                                <div class="cover-hover">
                                    <div class="share-like">
                                        <a href="#" title="Like"><i class="fa fa-heart-o"></i></a>
                                        <a href="#" title="Share"><i class="fa fa-share-alt"></i></a>
                                        <a href="#" title="Bookmark"><i class="fa fa-bookmark-o"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="listing-info">
                                <div class="details">
                                    <div class="user-pic">
                                        <img src="img/avatar.jpg" alt="">
                                    </div>
                                    <strong>Megan Verly -></strong>
                                    <span>Fruit Supplier</span>
                                    <p>
                                        Vice eiusmod authentic forage mustache try-hard proident
                                        aesthetic...
                                    </p>
                                    <i class="fa fa-map-marker text-info"></i> <em>New Orleans</em>
                                </div>
                                <div class="bottom-details">
                                    <div class="rating-stars">
                                        <i class="fa fa-star yel"></i>
                                        <i class="fa fa-star yel"></i>
                                        <i class="fa fa-star yel"></i>
                                        <i class="fa fa-star-half-empty"></i>
                                        <i class="fa fa-star-o yel"></i>
                                        <span>(4.7/147 Reviews)</span>
                                    </div>
                                    <a href="listingdetail.php">View <i class="fa fa-angle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="listing-item">
                            <div class="cover-img">
                                <img src="img/ubercar.jpg" alt="">
                                <div class="cover-hover">
                                    <div class="share-like">
                                        <a href="#" title="Like"><i class="fa fa-heart-o"></i></a>
                                        <a href="#" title="Share"><i class="fa fa-share-alt"></i></a>
                                        <a href="#" title="Bookmark"><i class="fa fa-bookmark-o"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="listing-info">
                                <div class="details">
                                    <div class="user-pic">
                                        <img src="img/driver.jpg" alt="">
                                    </div>
                                    <strong>Jennifer Liz -></strong>
                                    <span>Uber Driver</span>
                                    <p>
                                        Vice eiusmod authentic forage mustache try-hard proident
                                        aesthetic...
                                    </p>
                                    <i class="fa fa-map-marker text-info"></i> <em>Los Angeles</em>
                                </div>
                                <div class="bottom-details">
                                    <div class="rating-stars">
                                        <i class="fa fa-star yel"></i>
                                        <i class="fa fa-star yel"></i>
                                        <i class="fa fa-star yel"></i>
                                        <i class="fa fa-star-half-empty"></i>
                                        <i class="fa fa-star-o yel"></i>
                                        <span>(4.5/210 Reviews)</span>
                                    </div>
                                    <a href="listingdetail.php">View <i class="fa fa-angle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-12">
                <form action="#" method="post" class="sidebar">
                    <h4>Filters</h4>
                    <div>
                        <select title="Service" class="wide">
                            <option selected >All Categories</option>
                            <option data-display="Select">Mechanical</option>
                            <option value="1">Electrical</option>
                            <option value="2">Cleaning</option>
                            <option value="3" disabled>Disabled Selection</option>
                            <option value="4">Design</option>
                        </select>
                        <select title="Service" class="wide">
                            <option selected >Default Older</option>
                            <option data-display="Select">Highest Rated</option>
                            <option value="1">Most Reviewed</option>
                            <option value="2">Newest Services</option>
                            <option value="3" disabled>Disabled Selection</option>
                            <option value="4">Oldest Services</option>
                        </select>
                    </div>
                    <p class="check-filters">
                        <input type="checkbox" name="remember" id="1" />
                        <label for="1">Instant Book</label><br>
                        <input type="checkbox" name="remember" id="2" />
                        <label for="2">Lowest Price</label><br>
                        <input type="checkbox" name="remember" id="3" />
                        <label for="3">Most Requested</label><br>
                        <input type="checkbox" name="remember" id="4" />
                        <label for="4">Most liked</label><br>
                        <input type="checkbox" name="remember" id="5" />
                        <label for="5">Nearest</label><br>
                        <input type="checkbox" name="remember" id="6" />
                        <label for="6">Instant Book</label><br>
                        <input type="checkbox" name="remember" id="7" />
                        <label for="7">Lowest Price</label><br>
                        <input type="checkbox" name="remember" id="8" />
                        <label for="8">Most Requested</label><br>
                        <input type="checkbox" name="remember" id="9" />
                        <label for="9">Most liked</label><br>
                        <input type="checkbox" name="remember" id="10" />
                        <label for="10">Nearest</label>
                    </p>
                    <button class="btn ui-btn btn-block dark-blue">Update</button>
                </form>
            </div>
        </div>
        <div class="ui-pagination">
            <a href="#" class="page"><i class="fa fa-angle-left"></i></a>
            <a href="#" class="page">1</a>
            <a href="#" class="page info text-white">2</a>
            <a href="#" class="page">3</a>
            <a href="#" class="page">4</a>
            <a href="#" class="page"><i class="fa fa-angle-right"></i></a>
        </div>
    </div>
    <!--end listings-->

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