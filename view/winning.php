<?php
session_start();
include_once("includes/session.php");
include_once("../controller/controller_cl.php");
$id1=$_SESSION["user_id"];
$set=mysql_query("select * from winner INNER JOIN listing ON listing.listing_id=winner.listing_id INNER JOIN user ON user.user_id=winner.user_id where winner.user_id=$id1");
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
            <div class="row">
                <div class="col-xl-12 col-12">
                    <div class="top-part"><strong>Winnings</strong><i class="fa fa-list"></i></div>
                    <?php
                    while($row=mysql_fetch_array($set))
                    {
                        if($row["listing_type"]=="Domain_name")
                        {
                            $d=$row["pro_id"];
                            $sel=mysql_query("select * from domains where domain_id=$d");
                            $r=mysql_fetch_array($sel);
                    ?>
                        <div class="my-listing">
                            <h5><?php echo $r["domain_name"] ?></h5>
                            <span><?php if($r["verified"]=="Verified"){ ?><i class="fa fa-check-circle-o text-success"></i> <em>Approved</em><?php } else{ ?>
                            <i class="fa fa-question-circle-o text-warning"></i> <em>Pending</em>
                            <?php } ?>
                            </span>
                            <div class="row">
                                <div class="col-sm-6">
                                    <strong>Domain Topic: &nbsp;</strong><?php echo $r["domain_topic"]; ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <strong>Description: &nbsp;</strong><?php echo $r["domain_description"]; ?>
                                </div>
                            </div>
                            <div class="row info">
                                <div class="col-sm-6">
                                <?php
                                $bi = $row['bid_id'];
                                $am_qu = "select * from bidding where bid_id=$bi";
                                $am_win = mysql_query($am_qu);
                                $am_win_r = mysql_fetch_array($am_win);
                                ?>
                                <h4 class="text-light text-right">Winning Amount: <b><?php echo $am_win_r["amount"] ?></b></h4>
                                </div>
                            </div>
                            <?php
                            if($row["pay_status"]=='requested')
                            {
                            ?>
                            <hr>
                            <div class="row info">
                                <div class="col-sm-6">
                                <br>
                                    <h4 class="text-light">Payment Status: <b><?php echo $row["pay_status"] ?></b></h4><br>
                                    <a href="winning.php?pay=<?php echo $row["winner_id"] ?>" class="btn ui-btn btn-success">Pay Now &nbsp; <i class="fa fa-rupee text-light"></i><?php echo " ".$am_win_r["amount"] ?></a>
                                    <?php 
                                    if(isset($_REQUEST["pay"]))
                                    {
                                        $us = $res["user_id"];
                                        $wallet = mysql_query("select * from wallet where user_id=$us");
                                        $wall_res = mysql_fetch_array($wallet);
                                        if($am_win_r["amount"]<$wall_res["amount"])
                                        {
                                            $red = $am_win_r["amount"];
                                            $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
                                            $wall = mysql_query("update wallet set amount=amount-$red where user_id=$us")or die(mysql_error());
                                            if($wall)
                                            {
                                                $us1 = $r["user_id"];
                                                $up_wall = mysql_query("update wallet set amount=amount+$red where user_id=$us1")or die(mysql_error());
                                                if($up_wall)
                                                {
                                                    $dt = new datetime();
                                                    $up_date = date_format($dt,"Y-m-d");
                                                    $w_id = $wall_res["wallet_id"];
                                                    $list = $row["listing_id"];
                                                    $desc = "Payment of transfering of listing";
                                                    mysql_query("insert into transaction values('$txnid',$w_id,$us1,$red,'$desc',$list,'$up_date')")or die(mysql_error());
                                                    $pay = $_REQUEST["pay"];
                                                    mysql_query("update winner set pay_status='paid' where winner_id=$pay");
                                                    header("location: winning.php");
                                                }
                                            }
                                        }
                                        else
                                        {
                                            echo "<script>alert('You do not have sufficient balance in your wallet')</script>";
                                        ?>
                                            <a href="payment.php?user_id=<?php echo $us ?>" class="btn ui-btn btn-dark">Add money</a>
                                        <?php
                                        }
                                    }
                                    ?>
                                <br>
                                <br>
                                </div>
                            </div>
                            <?php
                            }
                            elseif($row["pay_status"]=='paid')
                            {
                            ?>
                            <hr>
                            <div class="row bg-success">
                                <div class="col-sm-6">
                                <br>
                                    <h3 class="text-light">Paid Successfully</h3>
                                <br>
                                </div>
                            </div>
                            <?php
                            }
                            ?>
                        </div>
                    <?php
                        }
                        elseif($row["listing_type"]=="Website")
                        {
                            $w=$row["pro_id"];
                            $sel=mysql_query("select * from website where website_id=$w");
                            $r=mysql_fetch_array($sel);
                        ?>
                        <div class="my-listing">
                            <h5><?php echo $r["website_topic"] ?></h5>
                            <span><?php if($r["verified"]=="Verified"){ ?><i class="fa fa-check-circle-o text-success"></i> <em>Approved</em><?php } else{ ?>
                            <i class="fa fa-question-circle-o text-warning"></i> <em>Pending</em>
                            <?php } ?>
                            </span>
                            <div class="row">
                                <div class="col-sm-6">
                                    <strong>website Topic: &nbsp;</strong><?php echo $r["website_topic"]; ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <strong>Description: &nbsp;</strong><?php echo $r["website_description"]; ?>
                                </div>
                            </div>
                            <div class="row info">
                                <div class="col-sm-6">
                                <?php
                                $bi = $row['bid_id'];
                                $am_qu = "select * from bidding where bid_id=$bi";
                                $am_win = mysql_query($am_qu);
                                $am_win_r = mysql_fetch_array($am_win);
                                ?>
                                <br>
                                <h4 class="text-light">Winning Amount: <b><?php echo $am_win_r["amount"] ?></b></h4>
                                <br>
                                </div>
                            </div>
                            <?php
                            if($row["pay_status"]=='requested')
                            {
                            ?>
                            <hr>
                            <div class="row info">
                                <div class="col-sm-6">
                                <br>
                                    <h4 class="text-light">Payment Status: <b><?php echo $row["pay_status"] ?></b></h4><br>
                                    <a href="winning.php?pay_web=<?php echo $row["winner_id"] ?>" class="btn ui-btn btn-success">Pay Now &nbsp; <i class="fa fa-rupee text-light"></i><?php echo " ".$am_win_r["amount"] ?></a>
                                    <?php 
                                    if(isset($_REQUEST["pay_web"]))
                                    {
                                        $us = $res["user_id"];
                                        $wallet = mysql_query("select * from wallet where user_id=$us");
                                        $wall_res = mysql_fetch_array($wallet);
                                        if($am_win_r["amount"]<$wall_res["amount"])
                                        {
                                            $red = $am_win_r["amount"];
                                            $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
                                            $wall = mysql_query("update wallet set amount=amount-$red where user_id=$us")or die(mysql_error());
                                            if($wall)
                                            {
                                                $us1 = $r["user_id"];
                                                $up_wall = mysql_query("update wallet set amount=amount+$red where user_id=$us1")or die(mysql_error());
                                                if($up_wall)
                                                {
                                                    $dt = new datetime();
                                                    $up_date = date_format($dt,"Y-m-d");
                                                    $w_id = $wall_res["wallet_id"];
                                                    $list = $row["listing_id"];
                                                    $desc = "Payment of transfering of listing";
                                                    mysql_query("insert into transaction values('$txnid',$w_id,$us1,$red,'$desc',$list,'$up_date')")or die(mysql_error());
                                                    $pay = $_REQUEST["pay_web"];
                                                    mysql_query("update winner set pay_status='paid' where winner_id=$pay");
                                                    header("location: winning.php");
                                                }
                                            }
                                        }
                                        else
                                        {
                                            echo "<script>alert('You do not have sufficient balance in your wallet')</script>";
                                        ?>
                                            <a href="payment.php?user_id=<?php echo $us ?>" class="btn ui-btn btn-dark">Add money</a>
                                        <?php
                                        }
                                    }
                                    ?>
                                <br>
                                <br>
                                </div>
                            </div>
                            <?php
                            }
                            elseif($row["pay_status"]=='paid')
                            {
                            ?>
                            <hr>
                            <div class="row bg-success">
                                <div class="col-sm-6">
                                <br>
                                    <h3 class="text-light">Paid Successfully</h3>
                                <br>
                                </div>
                            </div>
                            <?php
                            }
                            ?>
                        </div>
                    <?php
                        }
                        elseif($row["listing_type"]=="Application")
                        {
                            $w=$row["pro_id"];
                            $sel=mysql_query("select * from application where application_id=$w");
                            $r=mysql_fetch_array($sel);
                        ?>
                        <div class="my-listing">
                            <h5><?php echo $r["application_topic"] ?></h5>
                            <span><?php if($r["verified"]=="Verified"){ ?><i class="fa fa-check-circle-o text-success"></i> <em>Approved</em><?php } else{ ?>
                            <i class="fa fa-question-circle-o text-warning"></i> <em>Pending</em>
                            <?php } ?>
                            </span>
                            <div class="row">
                                <div class="col-sm-6">
                                    <strong>application Topic: &nbsp;</strong><?php echo $r["application_topic"]; ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <strong>Description: &nbsp;</strong><?php echo $r["application_description"]; ?>
                                </div>
                            </div>
                            <div class="row info">
                                <div class="col-sm-6">
                                <?php
                                $bi = $row['bid_id'];
                                $am_qu = "select * from bidding where bid_id=$bi";
                                $am_win = mysql_query($am_qu);
                                $am_win_r = mysql_fetch_array($am_win);
                                ?>
                                <h4 class="text-light text-right">Winning Amount: <b><?php echo $am_win_r["amount"] ?></b></h4>
                                </div>
                            </div>
                            <?php
                            if($row["pay_status"]=='requested')
                            {
                            ?>
                            <hr>
                            <div class="row info">
                                <div class="col-sm-6">
                                <br>
                                    <h4 class="text-light">Payment Status: <b><?php echo $row["pay_status"] ?></b></h4><br>
                                    <a href="winning.php?pay_app=<?php echo $row["winner_id"] ?>" class="btn ui-btn btn-success">Pay Now &nbsp; <i class="fa fa-rupee text-light"></i><?php echo " ".$am_win_r["amount"] ?></a>
                                    <?php 
                                    if(isset($_REQUEST["pay_app"]))
                                    {
                                        $us = $res["user_id"];
                                        $wallet = mysql_query("select * from wallet where user_id=$us");
                                        $wall_res = mysql_fetch_array($wallet);
                                        if($am_win_r["amount"]<$wall_res["amount"])
                                        {
                                            $red = $am_win_r["amount"];
                                            $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
                                            $wall = mysql_query("update wallet set amount=amount-$red where user_id=$us")or die(mysql_error());
                                            if($wall)
                                            {
                                                $us1 = $r["user_id"];
                                                $up_wall = mysql_query("update wallet set amount=amount+$red where user_id=$us1")or die(mysql_error());
                                                if($up_wall)
                                                {
                                                    $dt = new datetime();
                                                    $up_date = date_format($dt,"Y-m-d");
                                                    $w_id = $wall_res["wallet_id"];
                                                    $list = $row["listing_id"];
                                                    $desc = "Payment of transfering of listing";
                                                    mysql_query("insert into transaction values('$txnid',$w_id,$us1,$red,'$desc',$list,'$up_date')")or die(mysql_error());
                                                    $pay = $_REQUEST["pay_app"];
                                                    mysql_query("update winner set pay_status='paid' where winner_id=$pay");
                                                    header("location: winning.php");
                                                }
                                            }
                                        }
                                        else
                                        {
                                            echo "<script>alert('You do not have sufficient balance in your wallet')</script>";
                                        ?>
                                            <a href="payment.php?user_id=<?php echo $us ?>" class="btn ui-btn btn-dark">Add money</a>
                                        <?php
                                        }
                                    }
                                    ?>
                                <br>
                                <br>
                                </div>
                            </div>
                            <?php
                            }
                            elseif($row["pay_status"]=='paid')
                            {
                            ?>
                            <hr>
                            <div class="row bg-success">
                                <div class="col-sm-6">
                                <br>
                                    <h3 class="text-light">Paid Successfully</h3>
                                <br>
                                </div>
                            </div>
                            <?php
                            }
                            ?>
                        </div>
                    <?php
                        }
                    }
                    ?>
                    </div>
                </div>
            </div>
        </div>
        <!--end messages-->

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