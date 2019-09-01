<?php
session_start();
include_once("includes/session.php");
include_once("../controller/controller_cl.php");
$ob = new controller_cl;
$res1 = $ob->web_display();
if(isset($_REQUEST["unpub"]))
{
	$id=$_REQUEST["unpub"];
	$ob->unpub_web($id);
}
if(isset($_REQUEST["pub"]))
{
	$id=$_REQUEST["pub"];
	$ob->pub_web($id);
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
			<div class="top-part"><strong>My Website</strong><i class="fa fa-list"></i></div>
			<?php
			while($row = mysql_fetch_array($res1))
			{
			?>
			<div class="my-listing">
                <div class="row">
					<div class="col-sm-6">
						<div class="short-div">
							<h3><strong><?php echo $row["website_topic"] ?><?php if($row["verified"]=="Verified"){ ?><i class="fa fa-check-circle-o text-success"></i><?php } else{ ?>
							<i class="fa fa-question-circle-o text-warning"></i><?php } ?></strong></h3>
						</div>
						<div class="short-div">
							<?php if($row["verified"]=="Verified"){ ?><i class="fa fa-check-circle-o text-success"></i> <em>Approved</em><?php } else{ ?>
							<i class="fa fa-question-circle-o text-warning"></i> <em>Pending</em>
							<?php } ?>
						</div>
						<div class="short-div">
							<strong>Domain Name: &nbsp;</strong><?php echo $row["domain_name"]; ?>
						</div>
						<div class="short-div">
							<strong>Last Date: &nbsp;</strong><?php echo $row["last_date"]; ?>
						</div>
						<div class="short-div">
							<strong>Starting Bid: &nbsp;</strong><?php echo $row["starting_bid"]; ?>
						</div>
						<?php 
							$max = $ob->max_bid($row["website_id"]);
							$cnt = $ob->count_bid($row["website_id"]);
						?>
						<div class="short-div">
							<strong>Total Bids: &nbsp;</strong><?php if($cnt[0]) { echo $cnt["count(*)"]; } else { echo "No BIDS"; } ?>
						</div>
						<div class="short-div">
							<strong>Maximum Bid: &nbsp;</strong><?php if($max[0]) { echo $max["max(amount)"]; } else { echo "No BIDS"; } ?>
						</div>
					</div>
					<div class="col-sm-6 text-right">
					<div class="col-8 btn-group-vertical  btn-group-lg">
						<?php
						if($row["publish"]=='Publish')
						{ ?>
							<a href="website.php?unpub=<?php echo $row["website_id"]; ?>" class="btn ui-btn btn-success"> <i class="fa fa-eye-slash text-light"> </i> Unpublish This Website</a>
						<?php
						}
						else 
						{
						?>
							<a href="website.php?pub=<?php echo $row["website_id"]; ?>" class="btn ui-btn btn-success"> <i class="fa fa-eye text-light"> </i> Publish This Website</a>
						<?php
						}
						?>
							<a href="website_update.php?web_id=<?php echo $row['website_id']; ?>" class="btn ui-btn btn-info"> <i class="fa fa-edit text-light"> </i> Update Website</a>
						<a href="#" class="btn ui-btn btn-danger"> <i class="fa fa-trash text-light"> </i> Delete Website</a>
						<a href="website_details.php?web_id=<?php echo $row["website_id"]; ?>" class="btn ui-btn btn-info"> <i class="fa fa-list text-light"> </i> View Full Details</a>
					</div>
					</div>
				</div>
            </div>
			<?php
			}
			?>
			</div>
		</div>
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