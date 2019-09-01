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

    <title>Raza-Dashboard</title>

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
            <a href="#"> Add Listing</a>
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

        <!--add listing-->
        <div class="holder">
            <form action="#" method="post" class="row">
                <div class="col-lg-6">
                    <div class="top-part"><strong>General Information</strong><i class="fa fa-file-text-o"></i></div>
                    <div class="form-info">
                        <div class="form-group">
                            <label for="title">Listing title</label>
                            <input type="text" id="title" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="category">Category</label>
                            <select name="category" class="wide" id="category">
                                <option selected>Select Category</option>
                                <option value="1">Design</option>
                                <option value="2">Cleaning</option>
                                <option value="3">Electrical</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tags">Tags</label>
                            <input type="text" id="tags" class="form-control" placeholder="Comma separated keywords">
                        </div>
                        <div class="form-group">
                            <label for="desc">Description</label>
                            <textarea name="description" id="desc" rows="4" placeholder="Your description here ..."></textarea>
                        </div>
                        <hr>
                        <strong>Files to upload</strong>
                        <hr>
                        <!-- The fileinput label is used to style the file input field -->
                        <label class="files-upload">
                             <!-- The file input field used as target for the file upload widget -->
                            <input id="fileupload" type="file" name="files[]" multiple>

                            <i class="fa fa-cloud-upload fa-3x text-info"></i>
                            <strong>Drag & Drop or Click to Choose Files</strong>

                        </label>
                        <br>
                        <br>
                        <!-- The global progress bar -->
                        <div id="progress" class="p ress">
                            <div class="progress-bar progress-bar-success"></div>
                        </div>
                        <!-- The container for the uploaded files -->
                        <div id="files" class="files"></div>
                        <hr>
                        <hr>
                        <div class="form-group">
                            <label for="lat">Operation Area</label>
                            <input type="text" id="lat" class="form-control" placeholder="Lat & Long Coordinates">
                        </div>
                        <hr>
                        <button type="submit" class="btn ui-btn">Submit <i class="fa fa-send-o"></i></button>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="top-part"><strong>Contact & Pricing</strong><i class="fa fa-file-text-o"></i></div>
                    <div class="form-info">
                        <div class="form-group">
                            <label for="currency">Currency</label>
                            <select name="currency" class="wide" id="currency">
                                <option selected>Select Currency</option>
                                <option value="1">US Dollar</option>
                                <option value="2">CA Dollar</option>
                                <option value="3">Sterling Pound</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="amount">Amount per Service</label>
                            <input type="number" min="0" id="amount" class="form-control" placeholder="0.00">
                        </div>
                        <hr>
                        <strong>Contact info</strong>
                        <hr>
                        <div class="form-group">
                            <label for="city">City</label>
                            <select name="city" class="wide" id="city">
                                <option selected>Select Currency</option>
                                <option value="1">New York</option>
                                <option value="2">Washington</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" id="address" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="state">State</label>
                            <input type="text" id="state" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="zip">Zip Code</label>
                            <input type="text" id="zip" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="tel" id="phone" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="website">Website</label>
                            <input type="tel" id="website" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="tel" id="email" class="form-control">
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!--end add listing-->

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
<!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
<script src="3rdparty/js/jquery.ui.widget.js"></script>
<!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
<script src="3rdparty/js/jquery.iframe-transport.js"></script>
<!-- The basic File Upload plugin -->
<script src="3rdparty/js/jquery.fileupload.js"></script>
<script src="3rdparty/js/popper.js"></script>
<script src="3rdparty/js/bootstrap.js"></script>
<script src="3rdparty/jquery-nice-select-1.1.0/js/jquery.nice-select.js"></script>
<script src="3rdparty/OwlCarousel2-2.2.1/owl.carousel.min.js"></script>
<script src="3rdparty/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
<script src="js/app.js"></script>
<script src="js/fileselect.js"></script>

</body>

</html>