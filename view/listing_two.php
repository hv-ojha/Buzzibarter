<?php
session_start();
include_once("../controller/controller_cl.php");
$ob=new controller_cl;
if(isset($_REQUEST["tp"]))
{
    if($_REQUEST["tp"]=="application")
    {
        $all = mysql_query("select * from listing INNER JOIN application ON application.application_id=listing.pro_id where listing_type='Application'");
    }
    elseif($_REQUEST["tp"]=="domains")
    {
        $all = mysql_query("select * from listing INNER JOIN domains ON domains.domain_id=listing.pro_id where listing_type='Domain_name'");
    }
    elseif($_REQUEST["tp"]=="website")
    {
        $all = mysql_query("select * from listing INNER JOIN website ON website.website_id=listing.pro_id where listing_type='Website'");
    }
}
elseif(isset($_REQUEST["tp"]) && isset($_REQUEST["cat"]))
{
    $cat = $_REQUEST["tp"];
    if($_REQUEST["tp"]=="application")
    {
        $all = mysql_query("select * from listing INNER JOIN application ON application.application_id=listing.pro_id where listing_type='Application' and category_id=$cat");
    }
    elseif($_REQUEST["tp"]=="domains")
    {
        $all = mysql_query("select * from listing INNER JOIN domains ON domains.domain_id=listing.pro_id where listing_type='Domain_name' and category_id=$cat");
    }
    elseif($_REQUEST["tp"]=="website")
    {
        $all = mysql_query("select * from listing INNER JOIN website ON website.website_id=listing.pro_id where listing_type='Website' and category_id=$cat");
    }
}
else
{
    $all = $ob->sel_all();
}
if(isset($_REQUEST["search"]))
{
    if($_REQUEST["cat"]=="" && $_REQUEST["tp"]!="")
    {
        $tp = $_REQUEST["tp"];
        header("location: listing_two.php?tp=$tp");
    }
    elseif($_REQUEST["tp"]=="" && $_REQUEST["cat"]!="")
    {
        $cat = $_REQUEST["cat"];
        header("location: listing_two.php?cat=$cat");
    }
    elseif($_REQUEST["tp"]!="" && $_REQUEST["cat"]!="")
    {
        $tp = $_REQUEST["tp"];
        $cat = $_REQUEST["cat"];
        header("location: listing_two.php?tp=$tp&cat=$cat");
    }
}
$cat = mysql_query("Select * from category");
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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
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


<!-- Login/register Modal -->


<!-- end Login/register Modal -->

<!--feed modal-->

<div class="modal fade" id="feedModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tell us what you want</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="#" class="user-feed">
                    <input type="checkbox" id="web">
                    <label for="web" class="chip">
                        web design
                    </label>
                    <input type="checkbox" checked id="design">
                    <label for="design" class="chip">
                        graphic design
                    </label>
                    <input type="checkbox" id="band">
                    <label for="band" class="chip">
                        music band
                    </label>
                    <input type="checkbox" id="tt">
                    <label for="tt" class="chip">
                        tutor
                    </label>
                    <input type="checkbox" id="clean">
                    <label for="clean" class="chip">
                        cleaning services
                    </label>
                    <input type="checkbox" id="taxi">
                    <label for="taxi" class="chip">
                        taxi services
                    </label>
                    <input type="submit" class="btn ui-btn dark-blue text-white" value="Done">
                </form>
            </div>
        </div>
    </div>
</div>

<!--end feed modal-->

<!--top navbar-->

	<?php include("includes/header.php"); ?>

<!--end top navbar-->

<!--side menu-->
<div class="side-menu" id="side-menu">
    <div class="side-menu-c">
        <div class="side-logo">
            <a href="#">BuzziBarter</a>
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

    <!--banner-->
    <form method="post">
    <div class="listings-banner">
        <div class="select-fields">
            <div class="sel">
                <select name="tp" class="wide">
                    <option selected value="">Select Type</option>
                    <option value="application">Application</option>
                    <option value="domains">Domain name</option>
                    <option value="website">Website</option>
                </select>
            </div>
            <div class="sel">
                <select name="cat" class="wide">
                    <option selected value="">Select Category</option>
                    <?php
                    while($row = mysql_fetch_array($cat))
                    {
                    ?>
                    <option value="<?php echo $row["category_id"] ?>"><?php echo $row["category_name"] ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <button name="search" class="btn ui-btn dark-blue">Start Now</button>
        
        </div>
    </div>
    </form>
    <!--end banner-->

    <!--switcher-->
    <div class="switcher">
        <div><h6>List Layout</h6></div>
        <div>
            <em>Customize Your Feed</em>&#8195;
            <a href="#" data-toggle="modal" data-target="#feedModal"><i class="fa fa-sliders"></i></a>
            <a href="listing_one.php"><i class="fa fa-th"></i></a>
            <a href="#" class="active"><i class="fa fa-list"></i></a>
            <a href="index-2.php"><i class="fa fa-home"></i></a>
        </div>
    </div>
    <!--end switcher-->

    <!--listings-->
    <div class="listings">
	<?php
	while($a = mysql_fetch_array($all))
	{
		if($a["listing_type"]=="Website")
		{
            $res1 = $ob->web_details_where($a["pro_id"]);
            $row = mysql_fetch_array($res1);
            if(isset($_REQUEST["cat"]))
            {
                if($_REQUEST["cat"]==$row["category_id"])
                {
        ?>
        <!-- WEBSITE LISTING -->
            <div class="listing-two-item">
                <div class="cover-photo">
                    <?php
                        $url = substr($row["domain_name"],4);
                        $u = "https://api.urlbox.io/v1/lu9NPkLS33kQDGxN/png?url=".$url."&thumb_width=600&ttl=86400";
                    ?>
                    <img src="<?php echo $u ?>" alt="No image">
                    <div class="cover-photo-hover">
                        <div class="share-like-two">
                            <a href="#"><i class="fa fa-heart-o"></i></a>
                            <a href="#"><i class="fa fa-share-alt"></i></a>
                            <a href="#"><i class="fa fa-bookmark-o"></i></a>
                        </div>
                    </div>
                </div>
                <div class="listing-two-item-info">
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="user-two-pic">
                                <img src="<?php echo $row["photo"]; ?>" width="100%" height="100%" alt="">
                            </div>
                            <h1><strong><?php echo $row["website_topic"] ?> </strong></h1> <?php echo $a['listing_type'] ?> <span class="text-info"> Uploaded By <?php echo $row["user_name"]; ?></span>
                            <h5>
                                <span><?php if($row["verified"]=="Verified"){ ?><i class="fa fa-check-circle-o text-success"></i> Approved<?php } else{ ?>
                                <i class="fa fa-question-circle-o text-warning"></i> Pending
                                <?php } ?>
                                </span>
                            </h5>
                            <h4>Starting Bid : <strong><?php echo $row["starting_bid"] ?></strong></h4>
                            <h5>
                                <?php echo $row["website_description"]; ?>
                            </h5>
                            <div class="rating-bt text-right">
                                <a href="listingdetail.php?web_id=<?php echo $row['website_id']; ?>&list_id=<?php echo $a["listing_id"] ?>" class="btn ui-btn btn-dark text-light"><strong>View</strong> <i class="fa fa-angle-right"></i></a>
                            </div>
                        </div>
                        <div class="col-sm-4">
                        <?php
                            $dt = date('Y-m-d');
                            $dt1 = date_create($dt);
                            $dt2 = date_create($row["last_date"]);
                            $diff = date_diff($dt1,$dt2);
                            $da = $diff->format("%R%d Days Remaining");
                            $i = $a["listing_id"];
                            $sel = mysql_query("select * from winner where listing_id=$i");
                            if($da>0 && mysql_num_rows($sel)==0)
                            { ?>
                                <h1 class="text-center"><i class="fa fa-5x fa-gavel text-success"> </i> Available</h1>
                        <?php
                            }
                            else
                            {
                                $l_id = $a["listing_id"];
                                if($a["status"]!='closed')
                                {
                                    $upd_list = mysql_query("update listing set status='closed' closed_date='$dt1' where listing_id=$l_id");
                                }
                            ?>
                                <img src="http://www.activeendurance.com/blog/wp-content/uploads/2013/04/soldout.png">
                                <!-- <h1 class="text-center"><i class="fa fa-5x fa-sign-out-alt text-danger"> </i> Sold</h1> -->
                        <?php
                            }
                        ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /WEsbite Listing -->
        <?php
                }
                else
                {
                    continue;
                }
            }
            else
            {
            ?>
            <!-- WEBSITE LISTING -->
            <div class="listing-two-item">
                <div class="cover-photo">
                    <?php
                        $url = substr($row["domain_name"],4);
                        $u = "https://api.urlbox.io/v1/lu9NPkLS33kQDGxN/png?url=".$url."&thumb_width=600&ttl=86400";
                    ?>
                    <img src="<?php echo $u ?>" alt="No image">
                    <div class="cover-photo-hover">
                        <div class="share-like-two">
                            <a href="#"><i class="fa fa-heart-o"></i></a>
                            <a href="#"><i class="fa fa-share-alt"></i></a>
                            <a href="#"><i class="fa fa-bookmark-o"></i></a>
                        </div>
                    </div>
                </div>
                <div class="listing-two-item-info">
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="user-two-pic">
                                <img src="<?php echo $row["photo"]; ?>" width="100%" height="100%" alt="">
                            </div>
                            <h1><strong><?php echo $row["website_topic"] ?> </strong></h1> <?php echo $a['listing_type'] ?> <span class="text-info"> Uploaded By <?php echo $row["user_name"]; ?></span>
                            <h5>
                                <span><?php if($row["verified"]=="Verified"){ ?><i class="fa fa-check-circle-o text-success"></i> Approved<?php } else{ ?>
                                <i class="fa fa-question-circle-o text-warning"></i> Pending
                                <?php } ?>
                                </span>
                            </h5>
                            <h4>Starting Bid : <strong><?php echo $row["starting_bid"] ?></strong></h4>
                            <h5>
                                <?php echo $row["website_description"]; ?>
                            </h5>
                            <div class="rating-bt text-right">
                                <a href="listingdetail.php?web_id=<?php echo $row['website_id']; ?>&list_id=<?php echo $a["listing_id"] ?>" class="btn ui-btn btn-dark text-light"><strong>View</strong> <i class="fa fa-angle-right"></i></a>
                            </div>
                        </div>
                        <div class="col-sm-4">
                        <?php
                            $dt = date('Y-m-d');
                            $dt1 = date_create($dt);
                            $dt2 = date_create($row["last_date"]);
                            $diff = date_diff($dt1,$dt2);
                            $da = $diff->format("%R%d Days Remaining");
                            $i = $a["listing_id"];
                            $sel = mysql_query("select * from winner where listing_id=$i");
                            if($da>0 && mysql_num_rows($sel)==0)
                            { ?>
                                <h1 class="text-center"><i class="fa fa-5x fa-gavel text-success"> </i> Available</h1>
                        <?php
                            }
                            else
                            {
                                $l_id = $a["listing_id"];
                                if($a["status"]!='closed')
                                {
                                    $upd_list = mysql_query("update listing set status='closed' closed_date='$dt1' where listing_id=$l_id");
                                }
                            ?>
                                <img src="http://www.activeendurance.com/blog/wp-content/uploads/2013/04/soldout.png">
                                <!-- <h1 class="text-center"><i class="fa fa-5x fa-sign-out-alt text-danger"> </i> Sold</h1> -->
                        <?php
                            }
                        ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /WEsbite Listing -->
            <?php
            }
		}
		elseif($a["listing_type"]=="Domain_name")
		{
			$res1 = $ob->dom_details_where($a["pro_id"]);
            $row = mysql_fetch_array($res1);
            if(isset($_REQUEST["cat"]))
            {
                if($_REQUEST["cat"]==$row["category_id"])
                {
		?>
        <!-- Domain Name Listing -->
		<div class="listing-two-item">
            <div class="cover-photo">
                <img src="img/dom1.jpeg" alt="No image">
                <div class="cover-photo-hover">
                    <div class="share-like-two">
                        <a href="#"><i class="fa fa-heart-o"></i></a>
                        <a href="#"><i class="fa fa-share-alt"></i></a>
                        <a href="#"><i class="fa fa-bookmark-o"></i></a>
                    </div>
                </div>
            </div>
            <div class="listing-two-item-info">
                <div class="row">
                    <div class="col-sm-8">
                        <div class="user-two-pic">
                            <img src="<?php echo $row["photo"]; ?>" width="100%" height="100%" alt="">
                        </div>
                        <h1><strong><?php echo $row["domain_name"] ?> </strong></h1> <?php echo $a['listing_type'] ?> <span class="text-info"> Uploaded By  <?php echo $row["user_name"]; ?></span>
                        <h5>
                            <span><?php if($row["verified"]=="Verified"){ ?><i class="fa fa-check-circle-o text-success"></i> Approved<?php } else{ ?>
                            <i class="fa fa-question-circle-o text-warning"></i> Pending
                            <?php } ?>
                            </span>
                        </h5>
                        <h4>Starting Bid : <strong><?php echo $row["starting_bid"] ?></strong></h4>
                        <h5>
                            <?php echo $row["domain_description"]; ?>
                        </h5>
                        <div class="rating-bt">
                            <a href="listingdetail.php?dom_id=<?php echo $row['domain_id']; ?>&list_id=<?php echo $a["listing_id"] ?>" class="btn ui-btn btn-dark text-light"><strong>View</strong> <i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-sm-4">
                    <?php
						$dt = date('Y-m-d');
						$dt1 = date_create($dt);
						$dt2 = date_create($row["last_date"]);
						$diff = date_diff($dt1,$dt2);
						$da = $diff->format("%R%d Days Remaining");
						$i = $a["listing_id"];
                        $sel = mysql_query("select * from winner where listing_id=$i");
						if($da>0 && mysql_num_rows($sel)==0)
						{ ?>
							<h1 class="text-center"><i class="fa fa-5x fa-gavel text-success"> </i> Available</h1>
                    <?php
                    	}
						else
						{
                            $l_id = $a["listing_id"];
                            if($a["status"]!='closed')
                            {
                                $upd_list = mysql_query("update listing set status='closed' closed_date='$dt1' where listing_id=$l_id");
                            }
                        ?>
                            <img src="http://www.activeendurance.com/blog/wp-content/uploads/2013/04/soldout.png">
                            <!-- <h1 class="text-center"><i class="fa fa-5x fa-sign-out-alt text-danger"> </i> Sold</h1> -->
                    <?php
                    	}
					?>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Domain Name Listing -->
        <?php
                }
                else
                {
                    continue;
                }
            }
            else
            {
            ?>
            <!-- Domain Name Listing -->
            <div class="listing-two-item">
                <div class="cover-photo">
                    <img src="img/dom1.jpeg" alt="No image">
                    <div class="cover-photo-hover">
                        <div class="share-like-two">
                            <a href="#"><i class="fa fa-heart-o"></i></a>
                            <a href="#"><i class="fa fa-share-alt"></i></a>
                            <a href="#"><i class="fa fa-bookmark-o"></i></a>
                        </div>
                    </div>
                </div>
                <div class="listing-two-item-info">
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="user-two-pic">
                                <img src="<?php echo $row["photo"]; ?>" width="100%" height="100%" alt="">
                            </div>
                            <h1><strong><?php echo $row["domain_name"] ?> </strong></h1> <?php echo $a['listing_type'] ?> <span class="text-info"> Uploaded By  <?php echo $row["user_name"]; ?></span>
                            <h5>
                                <span><?php if($row["verified"]=="Verified"){ ?><i class="fa fa-check-circle-o text-success"></i> Approved<?php } else{ ?>
                                <i class="fa fa-question-circle-o text-warning"></i> Pending
                                <?php } ?>
                                </span>
                            </h5>
                            <h4>Starting Bid : <strong><?php echo $row["starting_bid"] ?></strong></h4>
                            <h5>
                                <?php echo $row["domain_description"]; ?>
                            </h5>
                            <div class="rating-bt">
                                <a href="listingdetail.php?dom_id=<?php echo $row['domain_id']; ?>&list_id=<?php echo $a["listing_id"] ?>" class="btn ui-btn btn-dark text-light"><strong>View</strong> <i class="fa fa-angle-right"></i></a>
                            </div>
                        </div>
                        <div class="col-sm-4">
                        <?php
                            $dt = date('Y-m-d');
                            $dt1 = date_create($dt);
                            $dt2 = date_create($row["last_date"]);
                            $diff = date_diff($dt1,$dt2);
                            $da = $diff->format("%R%d Days Remaining");
                            $i = $a["listing_id"];
                            $sel = mysql_query("select * from winner where listing_id=$i");
                            if($da>0 && mysql_num_rows($sel)==0)
                            { ?>
                                <h1 class="text-center"><i class="fa fa-5x fa-gavel text-success"> </i> Available</h1>
                        <?php
                            }
                            else
                            {
                                $l_id = $a["listing_id"];
                                if($a["status"]!='closed')
                                {
                                    $upd_list = mysql_query("update listing set status='closed' closed_date='$dt1' where listing_id=$l_id");
                                }
                            ?>
                                <img src="http://www.activeendurance.com/blog/wp-content/uploads/2013/04/soldout.png">
                                <!-- <h1 class="text-center"><i class="fa fa-5x fa-sign-out-alt text-danger"> </i> Sold</h1> -->
                        <?php
                            }
                        ?>
                        </div>
                    </div>
                </div>
            </div>
    <?php
            }
        }
        elseif($a["listing_type"]=="Application")
		{
			$res1 = $ob->app_details_where($a["pro_id"]);
            $row = mysql_fetch_array($res1);
            
            $app = $row["api_key"];
            $st = strpos($app,"=");
            $st++;
            $link = substr($app,$st);
            $ans = file_get_contents("https://data.42matters.com/api/v2.0/android/apps/lookup.json?p=$link&access_token=0b1bcd4d30760c42c4f6181d474b826617ba07fc");
            $b = json_decode($ans,true);
            if(isset($_REQUEST["cat"]))
            {
                if($_REQUEST["cat"]==$row["category_id"])
                {
		?>
        <!-- Application Listing -->
			<div class="listing-two-item">
            <div class="cover-photo">
                <img src="<?php echo $b['icon'] ?>" alt="No image">
                <div class="cover-photo-hover">
                    <div class="share-like-two">
                        <a href="#"><i class="fa fa-heart-o"></i></a>
                        <a href="#"><i class="fa fa-share-alt"></i></a>
                        <a href="#"><i class="fa fa-bookmark-o"></i></a>
                    </div>
                </div>
            </div>
            <div class="listing-two-item-info">
                <div class="row">
                    <div class="col-sm-8">
                        <div class="user-two-pic">
                            <img src="<?php echo $row["photo"]; ?>" width="100%" height="100%" alt="">
                        </div>
                        <h1><strong><?php echo $row["application_name"] ?> </strong></h1> <?php echo $a['listing_type'] ?> <span class="text-info"> Uploaded By  <?php echo $row["user_name"]; ?></span>
                        <h5>
                            <span><?php if($row["verified"]=="Verified"){ ?><i class="fa fa-check-circle-o text-success"></i> Approved<?php } else{ ?>
                            <i class="fa fa-question-circle-o text-warning"></i> Pending
                            <?php } ?>
                            </span>
                        </h5>
                        <h4>Starting Bid : <strong><?php echo $row["starting_bid"] ?></strong></h4>
                        <h5>
                            <?php echo $row["application_description"]; ?>
                        </h5>
                        <div class="rating-bt">
                            <a href="listingdetail.php?app_id=<?php echo $row['application_id']; ?>&list_id=<?php echo $a["listing_id"] ?>" class="btn ui-btn btn-dark text-light"><strong>View</strong> <i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-sm-4">
                    <?php
						$dt = date('Y-m-d');
						$dt1 = date_create($dt);
						$dt2 = date_create($row["last_date"]);
						$diff = date_diff($dt1,$dt2);
						$da = $diff->format("%R%d Days Remaining");
						$i = $a["listing_id"];
                        $sel = mysql_query("select * from winner where listing_id=$i");
						if($da>0 && mysql_num_rows($sel)==0)
						{ ?>
							<h1 class="text-center"><i class="fa fa-5x fa-gavel text-success"> </i> Available</h1>
                    <?php
                        }
						else
						{
                            $l_id = $a["listing_id"];
                            if($a["status"]!='closed')
                            {
                                $upd_list = mysql_query("update listing set status='closed' closed_date='$dt1' where listing_id=$l_id");
                            }
                        ?>
                            <img src="http://www.activeendurance.com/blog/wp-content/uploads/2013/04/soldout.png">
                            <!-- <h1 class="text-center"><i class="fa fa-5x fa-sign-out-alt text-danger"> </i> Sold</h1> -->
                    <?php
                    	}
					?>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Domain Name Listing -->
    <?php
                }
                else
                {
                    continue;
                }
            }
            else
            {
            ?>
            <!-- Application Listing -->
			<div class="listing-two-item">
            <div class="cover-photo">
                <img src="<?php echo $b['icon'] ?>" alt="No image">
                <div class="cover-photo-hover">
                    <div class="share-like-two">
                        <a href="#"><i class="fa fa-heart-o"></i></a>
                        <a href="#"><i class="fa fa-share-alt"></i></a>
                        <a href="#"><i class="fa fa-bookmark-o"></i></a>
                    </div>
                </div>
            </div>
            <div class="listing-two-item-info">
                <div class="row">
                    <div class="col-sm-8">
                        <div class="user-two-pic">
                            <img src="<?php echo $row["photo"]; ?>" width="100%" height="100%" alt="">
                        </div>
                        <h1><strong><?php echo $row["application_name"] ?> </strong></h1> <?php echo $a['listing_type'] ?> <span class="text-info"> Uploaded By  <?php echo $row["user_name"]; ?></span>
                        <h5>
                            <span><?php if($row["verified"]=="Verified"){ ?><i class="fa fa-check-circle-o text-success"></i> Approved<?php } else{ ?>
                            <i class="fa fa-question-circle-o text-warning"></i> Pending
                            <?php } ?>
                            </span>
                        </h5>
                        <h4>Starting Bid : <strong><?php echo $row["starting_bid"] ?></strong></h4>
                        <h5>
                            <?php echo $row["application_description"]; ?>
                        </h5>
                        <div class="rating-bt">
                            <a href="listingdetail.php?app_id=<?php echo $row['application_id']; ?>&list_id=<?php echo $a["listing_id"] ?>" class="btn ui-btn btn-dark text-light"><strong>View</strong> <i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-sm-4">
                    <?php
						$dt = date('Y-m-d');
						$dt1 = date_create($dt);
						$dt2 = date_create($row["last_date"]);
						$diff = date_diff($dt1,$dt2);
						$da = $diff->format("%R%d Days Remaining");
						$i = $a["listing_id"];
                        $sel = mysql_query("select * from winner where listing_id=$i");
						if($da>0 && mysql_num_rows($sel)==0)
						{ ?>
							<h1 class="text-center"><i class="fa fa-5x fa-gavel text-success"> </i> Available</h1>
                    <?php
                        }
						else
						{
                            $l_id = $a["listing_id"];
                            if($a["status"]!='closed')
                            {
                                $upd_list = mysql_query("update listing set status='closed' closed_date='$dt1' where listing_id=$l_id");
                            }
                        ?>
                            <img src="http://www.activeendurance.com/blog/wp-content/uploads/2013/04/soldout.png">
                            <!-- <h1 class="text-center"><i class="fa fa-5x fa-sign-out-alt text-danger"> </i> Sold</h1> -->
                    <?php
                    	}
					?>
                    </div>
                </div>
            </div>
        </div>
            <?php
            }
		}
	}
	?>
    </div>
    <!--end listings-->



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
