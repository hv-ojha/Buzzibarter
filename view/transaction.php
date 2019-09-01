<?php
session_start();
include_once("includes/session.php");
include_once("../controller/controller_cl.php");
$id1 = $_SESSION["user_id"];
$wall = mysql_query("select * from wallet where user_id=$id1");
$wall_res = mysql_fetch_array($wall);
$wall_id = $wall_res["wallet_id"];
$t = "select * from transaction where wallet_id=$wall_id or user_id=$id1";
$trans = mysql_query($t)or die(mysql_error());
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

    <title>BuzziBarter-Dashboard</title>

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
            <a href="index-2.php">Home</a> <i class="fa fa-angle-right"></i>
            <a href="dashboard.php"> Dashboard</a> <i class="fa fa-angle-right"></i>
            <a href="#"> Messages</a>
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

        <div class="holder">
            <div class="row">
                <div class="col-xl-12 col-12">
                    <div class="top-part"><strong>Transactions</strong><i class="fa fa-list"></i></div>
                    <table class="table table-hover table-striped table-bordered">
						<tr>
							<th>Transaction No.</th>
							<th>From</th>
							<th>To</th>
							<th>Transaction Date</th>
							<th>Amount</th>
							<th>Description</th>
						</tr>
						<?php
						while($row=mysql_fetch_array($trans))
						{
						?>
						<tr>
							<td><?php echo $row["transaction_id"] ?></td>
							<td><?php echo $row["wallet_id"] ?></td>
							<td><?php echo $row["user_id"] ?></td>
							<td><?php echo $row["transaction_date"] ?></td>
							<td><?php echo $row["amount"] ?></td>
							<td><?php echo $row["description"] ?></td>
						</tr>
						<?php
						}
						?>
					</table>
                </div>
            </div>
        </div>
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