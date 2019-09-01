<?php
session_start();
include_once("includes/emal/insert_mail.php");
include_once("includes/ses.php");
include_once("includes/connection.php");
include_once("../controller/controller_cl.php");
require_once("includes/alexa.php");
require_once("includes/try.php");
require_once("includes/gtm.php");
$ob = new controller_cl;
$email = new mail;
if(isset($_REQUEST["web_id"]))
{
	$id=$_REQUEST["web_id"];
	$id1=$_REQUEST["list_id"];
	$res1 = $ob->web_details_where($id);
	$row = mysql_fetch_array($res1);
	$al=new alexa;
	$a=$al->get_rank($row["domain_name"]);
	$gt=new gtmetrix;
	$dom = "https://".$row["domain_name"];
	$ts=$gt->test($dom);
	$bidng = mysql_query("select MAX(amount) as max,user_id from bidding where listing_id=$id1 group by user_id order by max DESC")or die(mysql_error());
	$arr = mysql_fetch_array($bidng);
	if(isset($_REQUEST['place_bid']))
	{
		$b = $_REQUEST["bid"];
		if(isset($_SESSION["user_id"]))
		{
			if($b>=$row["starting_bid"])
			{
				if($_SESSION["user_id"]!=$arr["user_id"])
				{
					if($b>$arr[0])
					{
						if($res['email_verified']=='Yes')
						{
							$ob->bid_insert();
							$name=$res["user_name"];
							$to = $row["email_id"];
							$product = $row["website_topic"];
							$email->bidding($to,$name,$product);
							$web = "listingdetail.php?web_id=".$id."&list_id=".$id1;
							header("location:$web");
						}
						else
						{
							echo "<script>alert('First You need To verify your email ID');</script>";
						}
					}
					else
					{
						echo "<script>alert('Bid Amount Must be Higher Than Last Bid Amount');</script>";
					}
				}
				else
				{
					echo "<script>alert('You Have the highest bid So bid cannot perform');</script>";
				}
			}
			else
			{
				echo "<script>alert('Bid Amount Must be Higher Than Starting Bid Amount');</script>";
			}
		}
		else
		{
			echo "<script>alert('You Need To LogIn First');</script>";
		}
	}
	$bidding = $ob->bid_show_web();
}
elseif(isset($_REQUEST["dom_id"]))
{
	$id=$_REQUEST["dom_id"];
	$id1=$_REQUEST["list_id"];
	$res1 = $ob->dom_details_where($id);
	$row = mysql_fetch_array($res1);
	$al=new whois;
	$a=$al->test($row["domain_name"]);
	$bidng = mysql_query("select MAX(amount) as max,user_id from bidding where listing_id=$id1 group by user_id order by max DESC");
	$arr = mysql_fetch_array($bidng);
	if(isset($_REQUEST['place_bid']))
	{
		$b = $_REQUEST["bid"];
		if(isset($_SESSION["user_id"]))
		{
			if($b>=$row["starting_bid"])
			{
				if($_SESSION["user_id"]!=$arr["user_id"])
				{
					if($b>$arr[0])
					{
						if($res['email_verified']=='Yes')
						{
							$ob->bid_insert();
							$name=$res["user_name"];
							$to = $row["email_id"];
							$product = $row["domain_topic"];
							$email->bidding($to,$name,$product);
							$web = "listingdetail.php?dom_id=".$id."&list_id=".$id1;
							header("location:$web");
						}
						else
						{
							echo "<script>alert('First You need To verify your email ID');</script>";
						}
					}
					else
					{
						echo "<script>alert('Bid Amount Must be Higher Than Last Bid Amount');</script>";
					}
				}
				else
				{
					echo "<script>alert('You Have the highest bid So bid cannot perform');</script>";
				}
			}
			else
			{
				echo "<script>alert('Bid Amount Must be Higher Than Starting Bid Amount');</script>";
			}
		}
		else
		{
			echo "<script>alert('You Need To LogIn First');</script>";
		}
	}
	$bidding = $ob->bid_show_dom();
}
elseif(isset($_REQUEST["app_id"]))
{
	$id=$_REQUEST["app_id"];
	$id1=$_REQUEST["list_id"];
	$res1 = $ob->app_details_where($id);
	$row = mysql_fetch_array($res1);
	$app = $row["api_key"];
	$st = strpos($app,"=");
	$st++;
	$link = substr($app,$st);
	$ans = file_get_contents("https://data.42matters.com/api/v2.0/android/apps/lookup.json?p=$link&access_token=0b1bcd4d30760c42c4f6181d474b826617ba07fc");
	$b = json_decode($ans,true);
	$bidng = mysql_query("select MAX(amount) as max,user_id from bidding where listing_id=$id1 group by user_id order by max DESC");
	$arr = mysql_fetch_array($bidng);
	if(isset($_REQUEST['place_bid']))
	{
		$b = $_REQUEST["bid"];
		if(isset($_SESSION["user_id"]))
		{
			if($b>=$row["starting_bid"])
			{
				if($_SESSION["user_id"]!=$arr["user_id"])
				{
					if($b>$arr[0])
					{
						if($res['email_verified']=='Yes')
						{
							$ob->bid_insert();
							$name=$res["user_name"];
							$to = $row["email_id"];
							$product = $row["website_topic"];
							$email->bidding($to,$name,$product);
							$web = "listingdetail.php?app_id=".$id."&list_id=".$id1;
							header("location:$web");
						}
						else
						{
							echo "<script>alert('First You need To verify your email ID');</script>";
						}
					}
					else
					{
						echo "<script>alert('Bid Amount Must be Higher Than Last Bid Amount');</script>";
					}
				}
				else
				{
					echo "<script>alert('You Have the highest bid So bid cannot perform');</script>";
				}
			}
			else
			{
				echo "<script>alert('Bid Amount Must be Higher Than Starting Bid Amount');</script>";
			}
		}
		else
		{
			echo "<script>alert('You Need To LogIn First');</script>";
		}
	}
	$bidding = $ob->bid_show_app();
}
if(isset($_REQUEST["feedback"]))
{
	$id1=$_REQUEST["list_id"];
	$em = $_REQUEST["eml"];
	$nme = $_REQUEST["nme"];
	$msg = $_REQUEST["msg"];
	$feed_query=mysql_query("insert into feedback values('','$id1','$em','$nme','$msg')");
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

<style>

</style>

</head>
<body>


<!-- Login/register Modal -->


<!-- end Login/register Modal -->

<!--top navbar-->
	<?php include("includes/header.php")?>
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

    <!--listing detail-->
    <div class="listing-detail">

        <!--main section-->
        <div class="detail-main-section">
		<?php 
		if(isset($_REQUEST["web_id"]))
		{
		?>
            <div class="detail-cover-img">
				<?php
					$url = substr($row["domain_name"],4);
					$u = "https://api.urlbox.io/v1/lu9NPkLS33kQDGxN/png?url=".$url."&thumb_width=600&ttl=86400";
				?>
                <img src="<?php echo $u; ?>" alt="">
                <div class="cover-shade">
                    <div class="user-picture">
                        <img src="<?php echo $row["photo"]; ?>" alt="">
                    </div>
                    <h4><?php echo $row["user_name"]; ?></h4>
                    <h5 class="text-rose">Chef</h5>
                    <strong><i class="fa fa-map-marker text-info"></i> <?php echo $row["city"]; ?></strong>
                </div>
            </div>
            <div class="detail-action">
                <span><?php if($row["verified"]=="Verified"){ ?><i class="fa fa-check-circle-o text-success"></i> <em>Approved</em><?php } else{ ?>
					<i class="fa fa-question-circle-o text-warning"></i> <em>Pending</em>
					<?php } ?>
				</span>
                <div class="action">
                    <a href="#"><i class="fa fa-heart-o"></i></a>
                    <a href="#"><i class="fa fa-share-alt"></i></a>
                    <a href="#"><i class="fa fa-bookmark-o"></i></a>
                </div>
            </div>
			<div class="row">
				<div class="col-sm-12">
				<p class="detail-description">
					<h2><?php echo $row["website_topic"] ?></h2>
					<br>
					<strong>Domain Name: &nbsp;</strong><?php echo $row["domain_name"]; ?>
					<br>
					<strong>Description: &nbsp;</strong><?php echo $row["website_description"]; ?>
					<br>
					<?php
					if(isset($_SESSION["user_id"]))
					{
					?>
					<span><?php if($row["domain_including"]=="Yes"){ ?><i class="fa fa-check-circle-o text-success"></i><?php } else{ ?>
					<i class="fa fa-times-circle-o text-danger"></i><?php } ?> <b>Domain Including</b>
					</span>
					<br>
					<span><?php if($row["custom_updates"]=="Yes"){ ?><i class="fa fa-check-circle-o text-success"></i><?php } else{ ?>
					<i class="fa fa-times-circle-o text-danger"></i><?php } ?> <b>Custom Updates</b>
					</span>
					<br>
					<?php
					if($row["custom_update_price"]!=0)
					{
					?>
						<strong>Custom Update Price: &nbsp;</strong><?php echo $row["custom_update_price"]; ?>
						<br>
					<?php
					}
					?>
					<span><?php if($row["client_database"]=="Yes"){ ?><i class="fa fa-check-circle-o text-success"></i><?php } else{ ?>
					<i class="fa fa-times-circle-o text-danger"></i><?php } ?> <b>Client Database</b>
					</span>
					<br>
					<strong>Last Date: &nbsp;</strong><?php echo $row["last_date"]; ?>
					<br>
					<strong>Starting Bid: &nbsp;</strong><?php echo $row["starting_bid"]; ?>
					<br>
				</p>
				<?php
				}
				else
				{
				?>
					<h4 class="bg-danger text-light">For more details You Need To Login First</h4>
				<?php
				}
				?>
				</div>
			</div>
        <?php 
		}
		elseif(isset($_REQUEST["dom_id"]))
		{
		?>
			<div class="detail-cover-img">
                <img src="img/dom1.jpeg" alt="No Image">
                <div class="cover-shade">
                    <div class="user-picture">
                        <img src="<?php echo $row["photo"] ?>" alt="No User Image">
                    </div>
                    <h4><?php echo $row["user_name"]; ?></h4>
                    <h5 class="text-rose">Chef</h5>
                    <strong><i class="fa fa-map-marker text-info"></i> <?php echo $row["city"]; ?></strong>
                </div>
            </div>
            <div class="detail-action">
                <span><?php if($row["verified"]=="Verified"){ ?><i class="fa fa-check-circle-o text-success"></i> <em>Approved</em><?php } else{ ?>
					<i class="fa fa-question-circle-o text-warning"></i> <em>Pending</em>
					<?php } ?>
				</span>
                <div class="action">
                    <a href="#"><i class="fa fa-heart-o"></i></a>
                    <a href="#"><i class="fa fa-share-alt"></i></a>
                    <a href="#"><i class="fa fa-bookmark-o"></i></a>
                </div>
            </div>
			<div class="row">
			<div class="col-sm-12">
            <p class="detail-description">
                <h2><?php echo $row["domain_topic"] ?></h2>
                <br>
				<strong>Domain Name: &nbsp;</strong><?php echo $row["domain_name"]; ?>
                <br>
				<?php
				if(isset($_SESSION["user_id"]))
				{
					?>
                <strong>Description: &nbsp;</strong><?php echo $row["domain_description"]; ?>
                <br>
				<strong>Last Date: &nbsp;</strong><?php echo $row["last_date"]; ?>
				<br>
				<strong>Starting Bid: &nbsp;</strong><?php echo $row["starting_bid"]; ?>
				<br>
            </p>
			<?php
				}
				else
				{
				?>
					<h4 class="bg-danger text-light">For more details You Need To Login First</h4>
				<?php
				}
				?>
			</div>
			</div>
		<?php
		}
		elseif(isset($_REQUEST["app_id"]))
		{
		?>
            <div class="detail-cover-img">
                <img src="<?php echo $b['icon']; ?>" alt="">
                <div class="cover-shade">
                    <div class="user-picture">
                        <img src="<?php echo $row["photo"]; ?>" alt="">
                    </div>
                    <h4><?php echo $row["user_name"]; ?></h4>
                    <h5 class="text-rose">Chef</h5>
                    <strong><i class="fa fa-map-marker text-info"></i> <?php echo $row["city"]; ?></strong>
                </div>
            </div>
            <div class="detail-action">
                <span><?php if($row["verified"]=="Verified"){ ?><i class="fa fa-check-circle-o text-success"></i> <em>Approved</em><?php } else{ ?>
					<i class="fa fa-question-circle-o text-warning"></i> <em>Pending</em>
					<?php } ?>
				</span>
                <div class="action">
                    <a href="#"><i class="fa fa-heart-o"></i></a>
                    <a href="#"><i class="fa fa-share-alt"></i></a>
                    <a href="#"><i class="fa fa-bookmark-o"></i></a>
                </div>
            </div>
			<div class="row">
				<div class="col-sm-12">
				<p class="detail-description">
					<h2><?php echo $row["application_name"] ?></h2>
					<br>
					<strong>Application Name: &nbsp;</strong><?php echo $row["application_name"]; ?>
					<br>
					<?php
					if(isset($_SESSION["user_id"]))
					{
					?>
					<strong>Description: &nbsp;</strong><?php echo $row["application_description"]; ?>
					<br>
					<strong>Last Date: &nbsp;</strong><?php echo $row["last_date"]; ?>
					<br>
					<strong>Starting Bid: &nbsp;</strong><?php echo $row["starting_bid"]; ?>
					<br>
				</p>
				<?php
				}
				else
				{
				?>
					<h4 class="bg-danger text-light">For more details You Need To Login First</h4>
				<?php
				}
				?>
				</div>
			</div>
        <?php 
		}
		?>
		</div>
        <!--end main section-->

        <!--aside section-->
        <aside class="detail-aside-section">
		<?php 
		if(isset($_REQUEST["web_id"]))
		{
		?>
            <div class="box">
			<form method="POST">
                <div class="rating-b">
					<h3>Highest Bid: <b><?php echo $arr["max"]; ?></b></h3>
					<h5><?php
						$dt = date('Y-m-d');
						$dt1 = date_create($dt);
						$dt2 = date_create($row["last_date"]);
						$diff = date_diff($dt1,$dt2);
						$da = $diff->format("%R%d Days Remaining");
						if($da>0)
						{
							echo $da;
						}
						else
						{
							echo "Product Sold";
						}
					?></h5>
					<?php
					if($da>0)
					{
						if(!isset($_SESSION["user_id"]))
						{
						?>
						<h4 class="bg-danger text-light">To Bid You Need To Login First</h4>
						<?php
						}
						elseif($_SESSION["user_id"]!=$row["user_id"])
						{ ?>
						<input type="text" name="bid" placeholder="Bid Amount">
						<input type="submit" name="place_bid" value="Place Bid" class="btn ui-btn btn-success text-light">
						<?php
						}
						else
						{
						?>
						<h4 class="bg-danger text-light">Cannot Bid on Self Uploaded Product</h4>
						<?php
						}
					}
					else
					{
					?>
						<h4 class="bg-danger text-light">Bidding Closed</h4>
					<?php
					}
					?>
                </div>
			</form>
            </div>
			<div class="box">
				<div class="service-sidebar">
					<h4>Top Bidders</h4>
					<hr>
					<?php
					if(isset($_SESSION["user_id"]))
					{
					while($bid = mysql_fetch_array($bidding))
					{
					?>
					<ul class="list-unstyled cont-info">
						<li><div class="user-icon"><img src="<?php echo $bid["photo"]; ?>"></div></li>
						<li><span>Name: <?php echo $bid["user_name"] ?></span></li>
						<li><span>Bid: <?php echo $bid['amount']." INR" ?></span></li>
						</li>
					</ul>
					<?php
					}
					}
					else
					{
					?>
						<h4 class="bg-danger text-light">For more details You Need To Login First</h4>
					<?php
					}
					?>
				</div>
			</div>
            <div class="service-sidebar">
                <h4>Alexa Rankings</h4>
                <hr>
                <?php
				if(isset($_SESSION["user_id"]))
				{
				?>
				<ul class="list-unstyled cont-info">
                    <li><i class="fa fa-globe text-mayan"></i> <span>Global Rank :&nbsp; <b><?php echo $a['rank'] ?></b></span></li>
                    <li><i class="fa fa-level-up text-rose"></i> <span>Global Reach :&nbsp; <b><?php echo $a['reach'] ?></b></span> </li>
                    <?php if($a['country']) { ?>
					<li><i class="fa fa-map-marker"></i> <span>Country :&nbsp; <b><?php echo $a['country']; ?></b> </span></li>
                    <li><i class="fa fa-flag text-info"></i> <span>Country RANK :&nbsp; <b><?php echo $a['con_rank']; ?></b> </span></li>
					<?php } ?>
                </ul>
				<hr>
				<?php
				if($row["demo_url"]=="Yes")
				{
				?>
				<h4>Demo Url</h4>
				<hr>
				<ul class="list-unstyled cont-info">
					<li><a href="http://<?php echo $row["domain_name"]; ?>" target="_blank"><?php echo $row["domain_name"]; ?></a></li>
				</ul>
				<hr>
				<?php
				}
				?>
				<h4>GTMetrix Details</h4>
				<hr>
				<ul class="list-unstyled cont-info">
					<li>Fully Loaded Time: <b><?php echo $ts["fully_loaded_time"] ?></b> miliseconds</li>
					<li> HTML Loading Time: <b><?php echo $ts["html_load_time"] ?></b> miliseconds</li>
					<li> Onload Time: <b><?php echo $ts["onload_time"] ?></b> miliseconds</li>
					<li> Onload Duration: <b><?php echo $ts["onload_duration"] ?></b> miliseconds</li>
					<li> Backend Duration: <b><?php echo $ts["backend_duration"] ?></b>seconds</li>
					<li> Pagespeed Score: <b><?php echo $ts["pagespeed_score"] ?></b> seconds</li>
				</ul>

				<?php
				}
				else
				{
				?>
					<h4 class="bg-danger text-light">For more details You Need To Login First</h4>
				<?php
				}
				?>
                <form method="post">
                    <div class="form-group">
                        <input type="email" name="eml" placeholder="Your Email">
                    </div>
                    <div class="form-group">
                        <input type="text" name="nme" placeholder="Your Name">
                    </div>
                    <div class="form-group">
                        <textarea name="msg" id="msg" rows="3" placeholder="Your Message here .."></textarea>
                    </div>
                    <button type="submit" name="feedback" class="btn ui-btn dark-blue btn-block">Send Feedback</button>
                </form>

            </div>
        <?php
		}
		elseif(isset($_REQUEST["dom_id"]))
		{
		?>
			<div class="box">
			<form method="POST">
                <div class="rating-b">
					<h3>Highest Bid: <b><?php echo $arr["max"]; ?></b></h3>
					<h5><?php
						$dt = date('Y-m-d');
						$dt1 = date_create($dt);
						$dt2 = date_create($row["last_date"]);
						$diff = date_diff($dt1,$dt2);
						$da = $diff->format("%R%d Days Remaining");
						if($da>0)
						{
							echo $da;
						}
						else
						{
							echo "Product Sold";
						}
					?></h5>
					<?php
					if(!isset($_SESSION["user_id"]))
					{
					?>
					<h4 class="bg-danger text-light">To Bid You Need To Login First</h4>
					<?php
					}
					elseif($_SESSION["user_id"]!=$row["user_id"])
					{ ?>
					<input type="text" name="bid" placeholder="Bid Amount">
                    <input type="submit" name="place_bid" value="Place Bid" class="btn ui-btn btn-success text-light">
					<?php
					}
					else
					{
					?>
					<h4 class="bg-danger text-light">Cannot Bid on Self Uploaded Product</h4>
					<?php
					}
					?>
                </div>
			</form>
            </div>
			<div class="box">
				<div class="service-sidebar">
					<h4>Top Bidders</h4>
					<hr>
					<?php
					if(isset($_SESSION["user_id"]))
					{
					while($bid = mysql_fetch_array($bidding))
					{
					?>
					<ul class="list-unstyled cont-info">
						<li><div class="user-icon"><img src="<?php echo $bid["photo"]; ?>"></div></li>
						<li><span>Name: <?php echo $bid["user_name"] ?></span></li>
						<li><span>Bid: <?php echo $bid['amount']." INR" ?></span></li>
						</li>
					</ul>
					<?php
					}
					}
					else
					{
					?>
						<h4 class="bg-danger text-light">For more details You Need To Login First</h4>
					<?php
					}
					?>
				</div>
			</div>
            <div class="service-sidebar">
			<h4>Domain Details</h4>
                <hr>
				<?php
				if(isset($_SESSION["user_id"]))
				{
				?>
                <ul class="list-unstyled cont-info">
                    <li><i class="fa fa-globe text-mayan"></i> <span>Domain Name :&nbsp; <b><?php echo $a['domain'] ?></b></span></li>
                    <li><i class="fa fa-level-up text-rose"></i> <span>Registrar :&nbsp; <b><?php echo $a['registrar'] ?></b></span> </li>
					<li><i class="fa fa-map-marker"></i> <span>Created Date :&nbsp; <b><?php echo $a['created_date']; ?></b> </span></li>
                    <li><i class="fa fa-flag text-info"></i> <span>Expiry Date :&nbsp; <b><?php echo $a['expiry']; ?></b> </span></li>
					<li><i class="fa fa-flag text-info"></i> <span>Domain Age :&nbsp; <b><?php echo $a['age']; ?></b> </span></li>
                </ul>
				<?php
				}
				else
				{
				?>
					<h4 class="bg-danger text-light">For more details You Need To Login First</h4>
				<?php
				}
				?>
				<hr>
				<form method="post">
                    <div class="form-group">
                        <input type="email" name="eml" placeholder="Your Email">
                    </div>
                    <div class="form-group">
                        <input type="text" name="nme" placeholder="Your Name">
                    </div>
                    <div class="form-group">
                        <textarea name="msg" id="msg" rows="3" placeholder="Your Message here .."></textarea>
                    </div>
                    <button type="submit" name="feedback" class="btn ui-btn dark-blue btn-block">Send Feedback</button>
                </form>

            </div>
            </div>
		<?php
		}
		elseif(isset($_REQUEST["app_id"]))
		{
		?>
			<div class="box">
			<form method="POST">
                <div class="rating-b">
					<h3>Highest Bid: <b><?php echo $arr["max"]; ?></b></h3>
					<h5><?php
						$dt = date('Y-m-d');
						$dt1 = date_create($dt);
						$dt2 = date_create($row["last_date"]);
						$diff = date_diff($dt1,$dt2);
						$da = $diff->format("%R%d Days Remaining");
						if($da>0)
						{
							echo $da;
						}
						else
						{
							echo "Product Sold";
						}
					?></h5>
					<?php
					if(!isset($_SESSION["user_id"]))
					{
					?>
					<h4 class="bg-danger text-light">To Bid You Need To Login First</h4>
					<?php
					}
					elseif($_SESSION["user_id"]!=$row["user_id"])
					{ ?>
					<input type="text" name="bid" placeholder="Bid Amount">
                    <input type="submit" name="place_bid" value="Place Bid" class="btn ui-btn btn-success text-light">
					<?php
					}
					else
					{
					?>
					<h4 class="bg-danger text-light">Cannot Bid on Self Uploaded Product</h4>
					<?php
					}
					?>
                </div>
			</form>
            </div>
			<div class="box">
				<div class="service-sidebar">
					<h4>Top Bidders</h4>
					<hr>
					<?php
					if(isset($_SESSION["user_id"]))
					{
					while($bid = mysql_fetch_array($bidding))
					{
					?>
					<ul class="list-unstyled cont-info">
						<li><div class="user-icon"><img src="<?php echo $bid["photo"]; ?>"></div></li>
						<li><span>Name: <?php echo $bid["user_name"] ?></span></li>
						<li><span>Bid: <?php echo $bid['amount']." INR" ?></span></li>
						</li>
					</ul>
					<?php
					}
					}
					else
					{
					?>
						<h4 class="bg-danger text-light">For more details You Need To Login First</h4>
					<?php
					}
					?>
				</div>
			</div>
            <div class="service-sidebar">
			<h4>Application Details</h4>
                <hr>
				<?php
				if(isset($_SESSION["user_id"]))
				{
				?>
                <ul class="list-unstyled cont-info">
				<li><i class="fa fa-level-up text-rose"></i> <span>Downloads :&nbsp; <b><?php echo $b['downloads'] ?></b></span> </li>
					<li><i class="fa fa-map-marker"></i> <span>Created Date :&nbsp; <b><?php echo substr($b['created'],0,10); ?></b> </span></li>
                    <li><i class="fa fa-flag text-info"></i> <span>Price :&nbsp; <b><?php echo $b['price_numeric']; ?></b> </span></li>
					<li><i class="fa fa-flag text-info"></i> <span>Total 5 Star Rating :&nbsp; <b><?php echo $b['ratings_5']; ?></b> </span></li>
                </ul>
				<?php
				}
				else
				{
				?>
					<h4 class="bg-danger text-light">For more details You Need To Login First</h4>
				<?php
				}
				?>
				<hr>
				<form method="post">
                    <div class="form-group">
                        <input type="email" name="eml" placeholder="Your Email">
                    </div>
                    <div class="form-group">
                        <input type="text" name="nme" placeholder="Your Name">
                    </div>
                    <div class="form-group">
                        <textarea name="msg" id="msg" rows="3" placeholder="Your Message here .."></textarea>
                    </div>
                    <button type="submit" name="feedback" class="btn ui-btn dark-blue btn-block">Send Feedback</button>
                </form>

            </div>
            </div>
		<?php
		}
		?>
		</aside>
		<!--end aside section-->
    </div>
    <!--listing detail-->

</div>

<!--footer section-->

	<?php include("includes/footer.php"); ?>

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