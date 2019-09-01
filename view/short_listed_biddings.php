<?php
session_start();
$id1 = $_SESSION['user_id'];
include_once("includes/session.php");
include_once("includes/emal/insert_mail.php");
$ob = new mail;
if(isset($_REQUEST['bid_id']) && isset($_REQUEST["web_id"]))
{
    $id = $_REQUEST['bid_id'];
    mysql_query("update bidding set status='short_listed' where bid_id=$id");
    $sel = mysql_query("select * from user INNER JOIN bidding on bidding.user_id=user.user_id where bid_id=$id");
    $fetch = mysql_fetch_array($sel);
    $list = $fetch['listing_id'];
    $user = $fetch['user_id'];
    $desc = "You have been Shortlisted for your bid on the product";
    $dt = new datetime();
	$up_date = date_format($dt,"Y-m-d");
    $p = $_REQUEST["web_id"];
    $ob->bid_shortlist($fetch["email_id"],$fetch["user_name"],$p);
    mysql_query("insert into notification values('',$user,$list,'$desc','$up_date')");
}
elseif(isset($_REQUEST['can_id']))
{
    $id = $_REQUEST['can_id'];
    mysql_query("update bidding set status='pending' where bid_id=$id");
    $sel = mysql_query("select * from user INNER JOIN bidding on bidding.user_id=user.user_id where bid_id=$id");
    $fetch = mysql_fetch_array($sel);
    $list = $fetch['listing_id'];
    $user = $fetch['user_id'];
    $desc = "You have been removed Shortlisted from your bid on the product";
    $dt = new datetime();
	$up_date = date_format($dt,"Y-m-d");
    mysql_query("insert into notification values('',$user,$list,'$desc','$up_date')");
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
                        $d1 = $r["domain_id"];
                        $bids = mysql_query("select * from bidding INNER JOIN listing ON bidding.listing_id=listing.listing_id INNER JOIN domains ON listing.pro_id=domains.domain_id INNER JOIN user ON bidding.user_id=user.user_id where domains.domain_id=$d1 and listing_type='Domain_name' and domains.user_id=$id1 and bidding.status='short_listed' order by amount DESC");
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
                                    <h3><strong><?php echo $row["domain_topic"] ?></strong></h3>
                                    <div class="short-div">
                                        <strong><?php echo $row["user_name"] ?></strong>
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
                            <?php
                                $listing = $row["listing_id"];
                                $que = "select * from winner where listing_id=$listing";
                                $chk = mysql_query($que)or die(mysql_error());
                                $chkf = mysql_fetch_array($chk);
                                if(empty($chkf))
                                {
                            ?>
                                <div class="short-div">
                                    <a href="winning_bids.php?bid_id=<?php echo $row["bid_id"] ?>&list_id=<?php echo $r["listing_id"] ?>&user_id=<?php echo $row["user_id"] ?>&web_id=<?php echo $row["domain_topic"] ?>" class="btn ui-btn btn-success text-light"> Accept </a>
                                </div>
                                <br>
                                <div class="short-div">
                                    <a class="btn ui-btn btn-info text-light" href="short_listed_biddings.php?can_id=<?php echo $row["bid_id"] ?>&list_id=<?php echo $r["listing_id"] ?>"> Cancel </a>
                                </div>
                            <?php
                                }
                                else
                                {
                                    if($chkf["user_id"]==$row["user_id"])
                                    {
                            ?>
                                <h1 class="text-center"><i class="fa fa-3x fa-money text-success"></i><br> Here is The Winner </h1>
                            <?php
                                    }
                                    else
                                    {
                            ?>
                                <h1 class="text-center"><i class="fa fa-3x fa-exclamation-triangle text-warning"></i><br> Winner Is Declared </h1>
                            <?php
                                    } 
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
                        $s = "select * from bidding INNER JOIN listing ON bidding.listing_id=listing.listing_id INNER JOIN website ON listing.pro_id=website.website_id INNER JOIN user ON bidding.user_id=user.user_id where website.user_id=$id1 and website.website_id=$w1 and bidding.status='short_listed' order by amount DESC";
                        $bids = mysql_query($s)or die(mysql_error());
                        while($row1=mysql_fetch_array($bids))
                        {
                        ?>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="client-info">
                                    <div class="client-photo">
                                        <div class="user-icon">
                                        <img src="<?php echo $row1["photo"]; ?>" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="activity">
                                    <div class="act-info">
                                    <h3><strong><?php echo $row1["website_topic"] ?></strong></h3>
                                    <div class="short-div">
                                        <strong><?php echo $row1["user_name"] ?></strong><br>
                                    </div>
                                    <div class="short-div">
                                        Bid Amount: <strong><?php echo $row1["amount"] ?></strong>
                                    </div>
                                    <div class="short-div">
                                        Bidding Time: <i class="time"><?php echo $row1["created_date"] ?></i>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                            <?php
                                $listing = $row1["listing_id"];
                                $que = "select * from winner where listing_id=$listing";
                                $chk = mysql_query($que)or die(mysql_error());
                                $chkf = mysql_fetch_array($chk);
                                if(empty($chkf))
                                {
                            ?>
                                <div class="short-div">
                                    <a href="winning_bids.php?bid_id=<?php echo $row1["bid_id"] ?>&list_id=<?php echo $r1["listing_id"] ?>&user_id=<?php echo $row1["user_id"] ?>" class="btn ui-btn btn-success text-light"> Accept </a>
                                </div>
                                <br>
                                <div class="short-div">
                                    <a class="btn ui-btn btn-info text-light" href="short_listed_biddings.php?can_id=<?php echo $row1["bid_id"] ?>&list_id=<?php echo $r1["listing_id"] ?>"> Cancel </a>
                                </div>
                            <?php
                                }
                                else
                                {
                                    if($chkf["user_id"]==$row1["user_id"])
                                    {
                            ?>
                                <h1 class="text-center"><i class="fa fa-3x fa-money text-success"></i><br> Here is The Winner </h1>
                            <?php
                                    }
                                    else
                                    {
                            ?>
                                <h1 class="text-center"><i class="fa fa-3x fa-exclamation-triangle text-warning"></i><br> Winner Is Declared </h1>
                            <?php
                                    } 
                            }
                            ?>
                            </div>
                        </div>
                        <hr>
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
                    while($r1 = mysql_fetch_array($app))
                    {
                        $w1 = $r1["application_id"];
                        $bids = mysql_query("select * from bidding INNER JOIN listing ON bidding.listing_id=listing.listing_id INNER JOIN application ON listing.pro_id=application.application_id INNER JOIN user ON bidding.user_id=user.user_id where listing_type='Application' and application.application_id=$w1 and application.user_id=$id1 and bidding.status='short_listed' order by amount DESC");
                        while($row1=mysql_fetch_array($bids))
                        {
                            $listing = $row1["listing_id"];
                            $que = "select * from winner where listing_id=$listing";
                            $chk = mysql_query($que)or die(mysql_error());
                            $chkf = mysql_fetch_array($chk);
                            if($chkf["user_id"]==$row1["user_id"])
                            {
                                continue;
                            }
                        ?>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="client-info">
                                    <div class="client-photo">
                                        <div class="user-icon">
                                        <img src="<?php echo $row1["photo"]; ?>" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="activity">
                                    <div class="act-info">
                                    <h3><strong><?php echo $row1["application_name"] ?></strong></h3>
                                    <div class="short-div">
                                        <strong><?php echo $row1["user_name"] ?></strong>
                                    </div>
                                    <div class="short-div">
                                        Bid Amount: <strong><?php echo $row1["amount"] ?></strong>
                                    </div>
                                    <div class="short-div">
                                        Bidding Time: <i class="time"><?php echo $row1["created_date"] ?></i>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                            <?php
                                if(empty($chkf))
                                {
                            ?>
                                <div class="short-div">
                                <a href="winning_bids.php?bid_id=<?php echo $row1["bid_id"] ?>&list_id=<?php echo $r1["listing_id"] ?>&user_id=<?php echo $row1["user_id"] ?>&web_id=<?php echo $row1["application_name"] ?>" class="btn ui-btn btn-success text-light"> Accept </a>
                                </div>
                                <br>
                                <div class="short-div">
                                <a class="btn ui-btn btn-info text-light" href="short_listed_biddings.php?can_id=<?php echo $row1["bid_id"] ?>&list_id=<?php echo $r1["listing_id"] ?>"> Cancel </a>
                                </div>
                            <?php
                                }
                                else
                                {
                                    if($chkf["user_id"]==$row1["user_id"])
                                    {
                            ?>
                                <h1 class="text-center"><i class="fa fa-3x fa-money text-success"></i><br> Here is The Winner </h1>
                            <?php
                                    }
                                    else
                                    {
                            ?>
                                <h1 class="text-center"><i class="fa fa-3x fa-exclamation-triangle text-warning"></i><br> Winner Is Declared </h1>
                            <?php
                                    } 
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