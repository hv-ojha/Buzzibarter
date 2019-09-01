<?php
session_start();
include_once("includes/session.php");
include_once("../controller/controller_cl.php");
$ob = new controller_cl;
if(isset($_REQUEST["web_id"]))
{
	$id=$_REQUEST["web_id"];
	$res1 = $ob->web_details($id);
	$row = mysql_fetch_array($res1);
	if(isset($_REQUEST["upd_web"]))
	{
		$ob->web_update($row['website_id']);
	}
}
elseif(isset($_REQUEST["app_id"]))
{
	$id=$_REQUEST["app_id"];
	$res1 = $ob->app_details($id);
	$row = mysql_fetch_array($res1);
	if(isset($_REQUEST["upd_web"]))
	{
		$ob->app_update($row['application_id']);
	}
}
elseif(isset($_REQUEST["dom_id"]))
{
	$id=$_REQUEST["dom_id"];
	$res1 = $ob->dom_details($id);
	$row = mysql_fetch_array($res1);
	if(isset($_REQUEST["upd_dom"]))
	{
		$ob->dom_update($row['domain_id']);
	}
}
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
        </div>
        <div class="bottom-strip">
            <a href="index.php">Home</a> <i class="fa fa-angle-right"></i>
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
<form method="POST">
<div class="slide-container">
    <div class="dashboard-content">
		<div class="holder">
		<?php
		if(isset($_REQUEST["web_id"]))
		{
		?>
			<div class="top-part"><strong>Update Website</strong><i class="fa fa-list"></i></div>
			<div class="my-listing">
				<h5><?php echo $row["domain_name"] ?></h5>
                <span><?php if($row["verified"]=="Verified"){ ?><i class="fa fa-check-circle-o text-success"></i> <em>Approved</em><?php } else{ ?>
				<i class="fa fa-question-circle-o text-warning"></i> <em>Pending</em>
				<?php } ?>
				</span>
				<div class="row">
					<div class="col-sm-3">
						<strong>Domain Topic: &nbsp;</strong>
					</div>
					<div class="col-sm-6">
						<input type="text" name="dom_top" value="<?php echo $row["domain_topic"]; ?>">
					</div>
				</div>
                <div class="row">
					<div class="col-sm-3">
						<strong>Domain Name: &nbsp;</strong>
					</div>
					<div class="col-sm-6">
						<input type="text" name="dom_domain" value="<?php echo $row["domain_name"]; ?>">
					</div>
				</div>
                <div class="row">
					<div class="col-sm-3">
						<strong>Description: &nbsp;</strong>
					</div>
					<div class="col-sm-6">
						<input type="text" name="dom_des" value="<?php echo $row["domain_description"]; ?>">
					</div>
				</div>
                <div class="row">
					<div class="col-sm-3">
						<strong>Upload Date: &nbsp;</strong>
					</div>
					<div class="col-sm-6">
						<input type="text" name="dom_upd_date" value="<?php echo $row["upload_date"]; ?>" disabled>
					</div>
				</div>
                <div class="row">
					<div class="col-sm-3">
						<strong>Last Date: &nbsp;</strong>
					</div>
					<div class="col-sm-6">
						<input type="date" name="dom_last_date" value="<?php echo $row["last_date"]; ?>">
					</div>
				</div>
                <div class="row">
					<div class="col-sm-3">
						<strong>Starting Bid: &nbsp;</strong>
					</div>
					<div class="col-sm-6">
						<input type="text" name="dom_bid" value="<?php echo $row["starting_bid"]; ?>">
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4">
						<input type="submit" name="upd_web" value="Update Domain" class="btn ui-btn info text-light">
					</div>
				</div>
			</div>
		<?php
		}
		elseif(isset($_REQUEST["app_id"]))
		{
		?>
			<div class="top-part"><strong>Update Website</strong><i class="fa fa-list"></i></div>
			<div class="my-listing">
				<h5><?php echo $row["application_name"] ?></h5>
                <span><?php if($row["verified"]=="Verified"){ ?><i class="fa fa-check-circle-o text-success"></i> <em>Approved</em><?php } else{ ?>
				<i class="fa fa-question-circle-o text-warning"></i> <em>Pending</em>
				<?php } ?>
				</span>
				<div class="row">
					<div class="col-sm-3">
						<strong>Application Name: &nbsp;</strong>
					</div>
					<div class="col-sm-6">
						<input type="text" name="app_name" value="<?php echo $row["application_name"]; ?>">
					</div>
				</div>
                <div class="row">
					<div class="col-sm-3">
						<strong>Topic: &nbsp;</strong>
					</div>
					<div class="col-sm-6">
						<input type="text" name="app_topic" value="<?php echo $row["application_topic"]; ?>">
					</div>
				</div>
                <div class="row">
					<div class="col-sm-3">
						<strong>Description: &nbsp;</strong>
					</div>
					<div class="col-sm-6">
						<input type="text" name="app_des" value="<?php echo $row["application_description"]; ?>">
					</div>
				</div>
                <div class="row">
					<div class="col-sm-3">
						<strong>Upload Date: &nbsp;</strong>
					</div>
					<div class="col-sm-6">
						<input type="text" name="web_upd_date" value="<?php echo $row["upload_date"]; ?>" disabled>
					</div>
				</div>
                <div class="row">
					<div class="col-sm-3">
						<strong>Last Date: &nbsp;</strong>
					</div>
					<div class="col-sm-6">
						<input type="date" name="app_last_date" value="<?php echo $row["last_date"]; ?>">
					</div>
				</div>
                <div class="row">
					<div class="col-sm-3">
						<strong>Starting Bid: &nbsp;</strong>
					</div>
					<div class="col-sm-6">
						<input type="text" name="app_bid" value="<?php echo $row["starting_bid"]; ?>">
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3">
						<strong>Play Store API Key: &nbsp;</strong>
					</div>
					<div class="col-sm-6">
						<input type="text" name="api_key" value="<?php echo $row["api_key"]; ?>">
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4">
						<input type="submit" name="upd_web" value="Update Application" class="btn ui-btn info text-light">
					</div>
				</div>
			</div>
		<?php
		}
		elseif(isset($_REQUEST["dom_id"]))
		{
		?>
			<div class="top-part"><strong>Update Website</strong><i class="fa fa-list"></i></div>
			<div class="my-listing">
				<h5><?php echo $row["domain_name"] ?></h5>
                <span><?php if($row["verified"]=="Verified"){ ?><i class="fa fa-check-circle-o text-success"></i> <em>Approved</em><?php } else{ ?>
				<i class="fa fa-question-circle-o text-warning"></i> <em>Pending</em>
				<?php } ?>
				</span>
				<div class="row">
					<div class="col-sm-3">
						<strong>Domain Topic: &nbsp;</strong>
					</div>
					<div class="col-sm-6">
						<input type="text" name="dom_top" value="<?php echo $row["domain_topic"]; ?>">
					</div>
				</div>
                <div class="row">
					<div class="col-sm-3">
						<strong>Domain Name: &nbsp;</strong>
					</div>
					<div class="col-sm-6">
						<input type="text" name="dom_domain" value="<?php echo $row["domain_name"]; ?>">
					</div>
				</div>
                <div class="row">
					<div class="col-sm-3">
						<strong>Description: &nbsp;</strong>
					</div>
					<div class="col-sm-6">
						<input type="text" name="dom_des" value="<?php echo $row["domain_description"]; ?>">
					</div>
				</div>
                <div class="row">
					<div class="col-sm-3">
						<strong>Upload Date: &nbsp;</strong>
					</div>
					<div class="col-sm-6">
						<input type="text" name="web_upd_date" value="<?php echo $row["upload_date"]; ?>" disabled>
					</div>
				</div>
                <div class="row">
					<div class="col-sm-3">
						<strong>Last Date: &nbsp;</strong>
					</div>
					<div class="col-sm-6">
						<input type="date" name="dom_last_date" value="<?php echo $row["last_date"]; ?>">
					</div>
				</div>
                <div class="row">
					<div class="col-sm-3">
						<strong>Starting Bid: &nbsp;</strong>
					</div>
					<div class="col-sm-6">
						<input type="text" name="dom_bid" value="<?php echo $row["starting_bid"]; ?>">
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4">
						<input type="submit" name="upd_dom" value="Update Website" class="btn ui-btn info text-light">
					</div>
				</div>
			</div>
		<?php
		}
		?>
		</div>
        <!--dashboard footer-->
        <div class="dash-footer">
            <span>&copy; BuzziBarter: All Rights Reserved.</span>
        </div>
        <!--end dashboard footer-->
		</div>
	</div>
</div>
</form>
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