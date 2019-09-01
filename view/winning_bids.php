<?php
session_start();
$id1 = $_SESSION['user_id'];
include_once("includes/session.php");
include_once("includes/emal/insert_mail.php");
$ob = new mail;
if(isset($_REQUEST['bid_id']) && isset($_REQUEST['list_id']) && isset($_REQUEST['user_id']))
{
    $bid = $_REQUEST['bid_id'];
    $list = $_REQUEST['list_id'];
    $user = $_REQUEST['user_id'];
    $dt = new datetime();
    $up = date_format($dt,"Y-m-d");
    $que = "select * from winner where listing_id=$list";
    $m = mysql_query($que);
    $r = mysql_fetch_array($m);
    if(empty($r))
    {
        $ins="insert into winner values('',$list,$bid,$user,'$up','pending')";
        $upd_list = "update listing set status='closed', closed_date='$up' where listing_id='$list'";
        mysql_query($upd_list)or die(mysql_error());
        mysql_query($ins)or die(mysql_error());
        $sel = mysql_query("select * from user INNER JOIN bidding on bidding.user_id=user.user_id where bid_id=$bid");
        $fetch = mysql_fetch_array($sel);
        $ob->winner($fetch["email_id"],$fetch["user_name"]);
    }
    else
    {
        echo "<script>alert('WINNER ALREADY DECLARED FOR FOLLOWING');</script>";
    }
}
$dom = mysql_query("select * from listing inner join domains on domains.domain_id=listing.pro_id where listing_type='Domain_name' and domains.user_id=$id1");
$web = mysql_query("select * from listing inner join website on website.website_id=listing.pro_id where listing_type='Website' and website.user_id=$id1");
$app = mysql_query("select * from listing inner join application on application.application_id=listing.pro_id where listing_type='Application' and application.user_id=$id1");
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
        <!--messages-->
		<div class="holder">
            <div class="top-part"><strong>Bidders on Your Domains</strong><i class="fa fa-list"></i></div>
            <div class="my-listing">
                <div class="row">
                    <div class="col-xl-12 col-12">
                    <?php
                    while($r = mysql_fetch_array($dom))
                    {
                        $bids = mysql_query("select * from winner inner join bidding on bidding.bid_id=winner.bid_id INNER JOIN listing ON bidding.listing_id=listing.listing_id INNER JOIN domains ON listing.pro_id=domains.domain_id INNER JOIN user ON bidding.user_id=user.user_id where domains.user_id=$id1 and bidding.status='short_listed' order by amount DESC");
                        while($row=mysql_fetch_array($bids))
                        {
                        ?>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="client-info">
                                    <div class="client-photo">
                                        <div class="user-icon">
                                        <img src="<?php echo $row["photo"]; ?>" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="activity">
                                    <div class="act-info">
                                    <div class="short-div">
                                        <strong><?php echo $row["user_name"] ?> => </strong>
                                        <?php echo $row["domain_name"] ?><br>
                                    </div>
                                    <div class="short-div">
                                        Bid Amount: <strong><?php echo $row["amount"] ?></strong>
                                    </div>
                                    <div class="short-div">
                                        Bidding Time: <i class="time"><?php echo $row["created_date"] ?></i>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 text-center">
                                <h1><i class="fa fa-3x fa-trophy text-success"></i><br> <?php echo $row["domain_name"] ?></h1>
                                <?php
                                        if($row["pay_status"]=='pending')
                                        {
                                        ?>
                                        <div class="short-div">
                                            <a href="winning_bids.php?req=<?php echo $row["winner_id"] ?>" class="btn ui-btn info text-light">Request for Payment</a>
                                        </div>
                                        <?php
                                        }
                                        elseif($row["pay_status"]=='requested')
                                        {
                                        ?>
                                        <div class="short-div">
                                            <a href="#" class="btn ui-btn info text-light">Already requested</a>
                                        </div>
                                        <?php
                                        }
                                        elseif($row["pay_status"]=='paid')
                                        {
                                        ?>
                                        <div class="short-div">
                                            <a href="#" class="btn ui-btn info text-light">Paid</a>
                                        </div>
                                        <?php
                                        }
                                        if(isset($_REQUEST["req"]))
                                        {
                                            $win_p = $_REQUEST["req"];
                                            $paid = mysql_query("update winner set pay_status='requested' where winner_id=$win_p");
                                            $list = $row['listing_id'];
                                            $user = $row['user_id'];
                                            $desc = "Payment request on your winning product";
                                            $dt = new datetime();
                                            $up_date = date_format($dt,"Y-m-d");
                                            mysql_query("insert into notification values('',$user,$list,'$desc','$up_date')");
											header("location: winning_bids.php");
                                        }
                                        ?>
                            </div>
                        </div>
                        <hr>
                        <?php
                        }
                    }
                    ?>
                    </div>
                </div>
            </div>
		</div>
        <!--end messages-->

        <div class="holder">
            <div class="top-part"><strong>Bidders on Your Website</strong><i class="fa fa-list"></i></div>
            <div class="my-listing">
                <div class="row">
                    <div class="col-xl-12 col-12">
                    <?php
                    while($r1 = mysql_fetch_array($web))
                    {
                        $w1 = $r1["website_id"];
                        $bids = mysql_query("select * from winner inner join bidding on bidding.bid_id=winner.bid_id INNER JOIN listing ON bidding.listing_id=listing.listing_id INNER JOIN website ON listing.pro_id=website.website_id INNER JOIN user ON bidding.user_id=user.user_id where website.user_id=$id1 and website.website_id=$w1 and bidding.status='short_listed' order by amount DESC");
                        while($row=mysql_fetch_array($bids))
                        {
                        ?>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="client-info">
                                    <div class="client-photo">
                                        <div class="user-icon">
                                        <img src="<?php echo $row["photo"]; ?>" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="activity">
                                    <div class="act-info">
                                        <div class="short-div">
                                            <strong><?php echo $row["user_name"] ?> => </strong>
                                            <?php echo $row["website_topic"] ?><br>
                                        </div>
                                        <div class="short-div">
                                            Bid Amount: <strong><?php echo $row["amount"] ?></strong>
                                        </div>
                                        <div class="short-div">
                                            Bidding Time: <i class="time"><?php echo $row["created_date"] ?></i>
                                        </div>
                                        <br>
                                        <?php
                                        if($row["pay_status"]=='pending')
                                        {
                                        ?>
                                        <div class="short-div">
                                            <a href="winning_bids.php?req=<?php echo $row["winner_id"] ?>" class="btn ui-btn info text-light">Request for Payment</a>
                                        </div>
                                        <?php
                                        }
                                        elseif($row["pay_status"]=='requested')
                                        {
                                        ?>
                                        <div class="short-div">
                                            <a href="#" class="btn ui-btn info text-light">Already requested</a>
                                        </div>
                                        <?php
                                        }
                                        elseif($row["pay_status"]=='paid')
                                        {
                                        ?>
                                        <div class="short-div">
                                            <a href="#" class="btn ui-btn info text-light">Paid</a>
                                        </div>
                                        <?php
                                        }
                                        if(isset($_REQUEST["req"]))
                                        {
                                            $win_p = $_REQUEST["req"];
                                            $paid = mysql_query("update winner set pay_status='requested' where winner_id=$win_p");
                                            $list = $row['listing_id'];
                                            $user = $row['user_id'];
                                            $desc = "Payment request on your winning product";
                                            $dt = new datetime();
                                            $up_date = date_format($dt,"Y-m-d");
                                            mysql_query("insert into notification values('',$user,$list,'$desc','$up_date')");
											header("location: winning_bids.php");
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 text-center">
                                <h1><i class="fa fa-3x fa-trophy text-success"></i><br> <?php echo $row["website_topic"] ?></h1>
                            </div>
                        </div>
                        <?php
                        }
                    }
                    ?>
                    <hr>
                    </div>
                </div>
            </div>
		</div>

        <div class="holder">
            <div class="top-part"><strong>Bidders on Your Application</strong><i class="fa fa-list"></i></div>
            <div class="my-listing">
                <div class="row">
                    <div class="col-xl-12 col-12">
                    <?php
                    while($r = mysql_fetch_array($app))
                    {
                        $bids = mysql_query("select * from winner inner join bidding on bidding.bid_id=winner.bid_id INNER JOIN listing ON bidding.listing_id=listing.listing_id INNER JOIN application ON listing.pro_id=application.application_id INNER JOIN user ON bidding.user_id=user.user_id where application.user_id=$id1 and bidding.status='short_listed' order by amount DESC");
                        while($row=mysql_fetch_array($bids))
                        {
                        ?>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="client-info">
                                    <div class="client-photo">
                                        <div class="user-icon">
                                        <img src="<?php echo $row["photo"]; ?>" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="activity">
                                    <div class="act-info">
                                    <div class="short-div">
                                        <strong><?php echo $row["user_name"] ?> => </strong>
                                        <?php echo $row["application_name"] ?><br>
                                    </div>
                                    <div class="short-div">
                                        Bid Amount: <strong><?php echo $row["amount"] ?></strong>
                                    </div>
                                    <div class="short-div">
                                        Bidding Time: <i class="time"><?php echo $row["created_date"] ?></i>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 text-center">
                                <h1><i class="fa fa-3x fa-trophy text-success"></i><br> <?php echo $row["application_name"] ?></h1>
								<div class="short-div">
                                            Bid Amount: <strong><?php echo $row["amount"] ?></strong>
                                        </div>
                                        <div class="short-div">
                                            Bidding Time: <i class="time"><?php echo $row["created_date"] ?></i>
                                        </div>
                                        <br>
                                        <?php
                                        if($row["pay_status"]=='pending')
                                        {
                                        ?>
                                        <div class="short-div">
                                            <a href="winning_bids.php?req=<?php echo $row["winner_id"] ?>" class="btn ui-btn info text-light">Request for Payment</a>
                                        </div>
                                        <?php
                                        }
                                        elseif($row["pay_status"]=='requested')
                                        {
                                        ?>
                                        <div class="short-div">
                                            <a href="#" class="btn ui-btn info text-light">Already requested</a>
                                        </div>
                                        <?php
                                        }
                                        elseif($row["pay_status"]=='paid')
                                        {
                                        ?>
                                        <div class="short-div">
                                            <a href="#" class="btn ui-btn info text-light">Paid</a>
                                        </div>
                                        <?php
                                        }
                                        if(isset($_REQUEST["req"]))
                                        {
                                            $win_p = $_REQUEST["req"];
                                            $paid = mysql_query("update winner set pay_status='requested' where winner_id=$win_p");
                                            $list = $row['listing_id'];
                                            $user = $row['user_id'];
                                            $desc = "Payment request on your winning product";
                                            $dt = new datetime();
                                            $up_date = date_format($dt,"Y-m-d");
                                            mysql_query("insert into notification values('',$user,$list,'$desc','$up_date')");
											header("location: winning_bids.php");
                                        }
                                        ?>
                                    </div>
                            </div>
                        </div>
                        <hr>
                        <?php
                        }
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
<script src="js/app.js"></script>

</body>


</html>