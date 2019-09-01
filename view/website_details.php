<?php
session_start();
include_once("includes/session.php");
include_once("../controller/controller_cl.php");
require_once("includes/alexa.php");
require_once("includes/gtm.php");
require_once("includes/try.php");
$ob = new controller_cl;
if(isset($_REQUEST["web_id"]))
{
	$id=$_REQUEST["web_id"];
	$res1 = $ob->web_details($id);
	$row = mysql_fetch_array($res1);
	$al=new alexa;
	$a=$al->get_rank($row["domain_name"]);
	$gt=new gtmetrix;
	$dom = "http://".$row["domain_name"];
	$ts=$gt->test($dom);
}
elseif(isset($_REQUEST["app_id"]))
{
	$id=$_REQUEST["app_id"];
	$res1 = $ob->app_details($id);
	$row = mysql_fetch_array($res1);
	$app = $row["api_key"];
    $st = strpos($app,"=");
    $st++;
    $link = substr($app,$st);
    $ans = file_get_contents("https://data.42matters.com/api/v2.0/android/apps/lookup.json?p=$link&access_token=0b1bcd4d30760c42c4f6181d474b826617ba07fc");
    $b = json_decode($ans,true);
}
elseif(isset($_REQUEST["dom_id"]))
{
	$id=$_REQUEST["dom_id"];
	$res1 = $ob->dom_details($id);
	$row = mysql_fetch_array($res1);
	$al=new whois;
	$a=$al->test($row["domain_name"]);
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

    <title>BuzziBarter-Product Details</title>

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
<div class="slide-container">
    <div class="dashboard-content">
	
	<?php
	if(isset($_REQUEST["web_id"]))
	{
	?>
		<div class="holder">
			<div class="top-part"><strong><?php echo $row["website_topic"] ?></strong><i class="fa fa-list"></i></div>
			<div class="my-listing">
                <div class="row">
					<?php
						$url = substr($row["domain_name"],4);
						$u = "https://api.urlbox.io/v1/lu9NPkLS33kQDGxN/png?url=".$url."&thumb_width=600&ttl=86400";
					?>
					<div class="col-sm-6">
						<img src="<?php echo $u; ?>">
					</div>
				</div>
				<span><?php if($row["verified"]=="Verified"){ ?><i class="fa fa-check-circle-o text-success"></i> <em>Approved</em><?php } else{ ?>
				<i class="fa fa-question-circle-o text-warning"></i> <em>Pending</em>
				<?php } ?>
				</span>
                <div class="row">
					<div class="col-sm-6">
						<strong>Domain Name: &nbsp;</strong><?php echo $row["domain_name"]; ?>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6">
						<strong>Global Ranking: &nbsp;</strong><?php echo $a["rank"]; ?>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6">
						<strong>Global Reach: &nbsp;</strong><?php echo $a["reach"]; ?>
					</div>
				</div>
				<?php
				if(isset($a["country"]))
				{
				?>
				<div class="row">
					<div class="col-sm-6">
						<strong><?php echo $a["country"]; ?>: &nbsp;</strong><?php echo $a["con_rank"]; ?>
					</div>
				</div>
                <?php
				}
				?>
				<div class="row">
					<div class="col-sm-8">
						<strong>Description: &nbsp;</strong><?php echo $row["website_description"]; ?>
					</div>
				</div>
                <div class="row">
					<div class="col-sm-6">
						<strong>Upload Date: &nbsp;</strong><?php echo $row["upload_date"]; ?>
					</div>
				</div>
                <div class="row">
					<div class="col-sm-6">
						<strong>Last Date: &nbsp;</strong><?php echo $row["last_date"]; ?>
					</div>
				</div>
                <div class="row">
					<div class="col-sm-6">
						<strong>Starting Bid: &nbsp;</strong><?php echo $row["starting_bid"]; ?>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6">
						<?php echo "<strong> Fully Loaded Time: </strong>".$ts["fully_loaded_time"]." miliseconds<br>";?>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6">
						<?php echo "<strong> HTML Loading Time: </strong>".$ts["html_load_time"]." miliseconds<br>";?>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6">
						<?php echo "<strong> Onload Time: </strong>".$ts["onload_time"]." miliseconds<br>";?>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6">
						<?php echo "<strong>Onload Duration: </strong>".$ts["onload_duration"]." miliseconds<br>";?>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6">
						<?php echo "<strong>Backend Duration: </strong>".$ts["backend_duration"]." seconds<br>";?>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6">
						<?php echo "<strong> Pagespeed Score: </strong>".$ts["pagespeed_score"]." seconds<br>";?>
					</div>
				</div>
            </div>
	<?php
	}
	elseif(isset($_REQUEST["app_id"]))
	{
	?>
	<div class="holder">
		<div class="top-part" style="font-size:20px"><strong><?php echo $row["application_name"] ?></strong><i class="fa fa-list"></i></div>
		<div class="my-listing" style="font-size:18px">
			<div class="row">
				<div class="col-sm-6">
					<img src="<?php echo $b["screenshots"][0]; ?>">
				</div>
			</div>
			<span><?php if($row["verified"]=="Verified"){ ?><i class="fa fa-check-circle-o text-success"></i> <em>Approved</em><?php } else{ ?>
			<i class="fa fa-question-circle-o text-warning"></i> <em>Pending</em>
			<?php } ?>
			</span>
			<div class="row">
				<div class="col-sm-6">
					<strong>Topic: &nbsp;</strong><?php echo $row["application_topic"]; ?>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-8">
					<strong>Description: &nbsp;</strong><?php echo $row["application_description"]; ?>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<strong>Total Downloads: &nbsp;</strong><?php echo $b["downloads"]; ?>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<strong>Creation Date: &nbsp;</strong><?php echo substr($b['created'],0,10); ?>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<strong>Price: &nbsp;</strong><?php echo $b['price_numeric']; ?>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<strong>5* ratings: &nbsp;</strong><?php echo $b['ratings_5']; ?>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<strong>Upload Date: &nbsp;</strong><?php echo $row["upload_date"]; ?>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<strong>Last Date: &nbsp;</strong><?php echo $row["last_date"]; ?>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<strong>Starting Bid: &nbsp;</strong><?php echo $row["starting_bid"]; ?>
				</div>
			</div>
		</div>
	</div>
	<?php
	}
	elseif(isset($_REQUEST["dom_id"]))
	{
	?>
	<div class="holder">
		<div class="top-part" style="font-size:20px"><strong><?php echo $row["domain_name"] ?></strong><i class="fa fa-list"></i></div>
		<div class="my-listing" style="font-size:18px">
			<span><?php if($row["verified"]=="Verified"){ ?><i class="fa fa-check-circle-o text-success"></i> <em>Approved</em><?php } else{ ?>
			<i class="fa fa-question-circle-o text-warning"></i> <em>Pending</em>
			<?php } ?>
			</span>
			<div class="row">
				<div class="col-sm-6">
					<strong>Topic: &nbsp;</strong><?php echo $row["domain_topic"]; ?>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-8">
					<strong>Description: &nbsp;</strong><?php echo $row["domain_description"]; ?>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-8">
				<strong>Domain Name : </strong> <?php echo $a['domain'] ?>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-8">
			 	<strong>Registrar : </strong> <?php echo $a['registrar'] ?>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-8">
				<strong> Created Date : </strong> <?php echo $a['created_date']; ?>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-8">
				<strong> Expiry Date : </strong> <?php echo $a['expiry']; ?>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-8">
				<strong> Domain Age : </strong> <?php echo $a['age']; ?>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<strong>Upload Date: &nbsp;</strong><?php echo $row["upload_date"]; ?>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<strong>Last Date: &nbsp;</strong><?php echo $row["last_date"]; ?>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<strong>Starting Bid: &nbsp;</strong><?php echo $row["starting_bid"]; ?>
				</div>
			</div>
		</div>
	</div>
	<?php
	}
	?>
        <!--dashboard footer-->
        <div class="dash-footer">
            <span>&copy; BuzziBarter: All Rights Reserved.</span>
        </div>
        <!--end dashboard footer-->
		</div>
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