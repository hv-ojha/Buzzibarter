<?php
session_start();
include_once("includes/session.php");
$id1 = $_SESSION['user_id'];
$res1 = mysql_query("select count(*) as cnt from bidding inner join listing on listing.listing_id=bidding.listing_id inner join website on listing.pro_id=website.website_id where website.user_id=$id1");
$cnt_bid1 = mysql_fetch_array($res1);
$pro = mysql_query("select count(*) from website where user_id=$id1");
$cnt_pro = mysql_fetch_array($pro);
$bid = mysql_query("select count(*) from bidding where user_id=$id1");
$cnt_bid = mysql_fetch_array($bid);
$wins = mysql_query("select count(*) from winner where user_id=$id1");
$cnt_wins = mysql_fetch_array($wins);
$bidders = mysql_query("select * from bidding INNER JOIN listing ON bidding.listing_id=listing.listing_id INNER JOIN website ON listing.pro_id=website.website_id INNER JOIN user ON bidding.user_id=user.user_id where website.user_id=$id1 limit 5");
$products = mysql_query("select * from website where user_id=$id1 limit 5");
$winnings = mysql_query("select * from winner INNER JOIN listing ON listing.listing_id=winner.listing_id where user_id=$id1 limit 5");
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
            <a href="dashboard.php"> Dashboard</a>
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

        <!--statistics-->
        <div class="statistics">
            <div class="row">
                <div class="col-lg-3 col-md-4">
                    <div class="stat">
                        <h1><?php echo $cnt_bid1['cnt']; ?> <span>Total Bids</span></h1>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4">
                    <div class="stat">
                        <h1><?php echo $cnt_pro[0] ?> <span>Uploads</span></h1>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4">
                    <div class="stat">
                        <h1><?php echo $cnt_bid[0] ?> <span>Your Bids</span></h1>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4">
                    <div class="stat">
                        <h1><?php echo $cnt_wins[0] ?> <span>Winnings</span></h1>
                    </div>
                </div>
            </div>
        </div>
        <!--end statistics-->

        <div class="row">
<!--            <div class="col-lg-8">
                <div class="holder">
                    <div class="graph">
                        <canvas id="canvas"></canvas>
                    </div>
                </div>
            </div> -->
            <div class="col-lg-4">
                <div class="holder">
                    <div class="account-activity">
                        <div class="top-part"><strong>Top Biddings on your Products</strong></div>
                        <?php
						if(mysql_num_rows($bidders) > 0)
						{
							while($row = mysql_fetch_array($bidders))
							{
							?>
							<div class="activity">
								<div class="user-icon">
									<img src="<?php echo $row["photo"]; ?>" alt="">
								</div>
								<div class="act-info">
									<strong><?php echo $row["user_name"] ?></strong>
									<em><?php echo $row["website_topic"] ?></em>
								</div>
								<i class="time"><?php echo $row["created_date"] ?></i>
							</div>
							<?php
							}
						}
						else
						{ ?>
							<div class="activity">
								<div class="act-info">
									<h4>No Biddings available</h4>
								</div>
							</div>
						<?php
						}
						?>
                    </div>
                </div>
            </div>
			<div class="col-lg-4">
                <div class="holder">
                    <div class="account-activity">
                        <div class="top-part"><strong>Your Products</strong></div>
                        <?php
						if(mysql_num_rows($products) > 0)
						{
							while($row = mysql_fetch_array($products))
							{
							?>
							<a href="website_details.php?web_id=<?php echo $row['website_id'] ?>">
								<div class="activity">
									<div class="act-info">
										<strong><?php echo $row["website_topic"] ?></strong>
									</div>
									<i class="time"><?php echo $row["upload_date"] ?></i>
								</div>
							</a>
							<?php
							}
						}
						else
						{
						?>
							<div class="activity">
								<div class="act-info">
									<h4>No Products Uploaded</h4>
								</div>
							</div>
						<?php
						}
						?>
                    </div>
                </div>
            </div>
			<div class="col-lg-4">
                <div class="holder">
                    <div class="account-activity">
                        <div class="top-part"><strong>Top Winners</strong></div>
						<?php
						if(mysql_num_rows($winnings) > 0)
						{
							while($row = mysql_fetch_array($winnings))
							{
                                if($row["listing_type"]=="Website")
                                {
                                    $i=$row["pro_id"];
                                    $ss = mysql_query("select * from website where website_id=$i");
                                    $row1=mysql_fetch_array($ss);
							?>
							<a href="website_details.php?web_id=<?php echo $row1['website_id'] ?>">
								<div class="activity">
									<div class="act-info">
										<strong><?php echo $row1["website_topic"] ?></strong>
									</div>
									<i class="time"><?php echo $row1["upload_date"] ?></i>
								</div>
							</a>
							<?php
                                }
                                elseif($row["listing_type"]=="Domain_name")
                                {
                                    $i=$row["pro_id"];
                                    $ss = mysql_query("select * from domains where domain_id=$i");
                                    $row1=mysql_fetch_array($ss);
							?>
								<div class="activity">
									<div class="act-info">
										<strong><?php echo $row1["domain_topic"] ?></strong>
									</div>
									<i class="time"><?php echo $row1["upload_date"] ?></i>
								</div>
							<?php
                                }
							}
						}
						else
						{
						?>
							<div class="activity">
								<div class="act-info">
									<h4>No Products Uploaded</h4>
								</div>
							</div>
						<?php
						}
						?>
                    </div>
                </div>
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
<script src="3rdparty/js/Chart.bundle.js"></script>
<script src="3rdparty/js/utils.js"></script>
<script src="js/app.js"></script>
<script src="js/graph.js"></script>

</body>

</html>