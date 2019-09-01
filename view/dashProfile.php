<?php
session_start();
include_once("includes/session.php");
include_once("../controller/controller_cl.php");
include('includes/emal/insert_mail.php');
$ob = new mail;
$country_res = mysql_query("select * from country");
if(isset($_REQUEST["upd_all"]))
{
    $ob = new controller_cl;
    $id = $_SESSION["user_id"];
    $ob->prof_upd($id);
}
if(isset($_REQUEST["verify"]))
{
    $email = $res['email_id'];
    $pass = $res['password'];
    $ob->register($email,$pass);
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
    

<script src="3rdparty/js/popper.js"></script>
    <script src="3rdparty/js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function(){
        $('#con_upd').change(function(){
            selcntry = $('#con_upd option:selected').val();
            formdata = {
                cntry : selcntry,
                ad_up:"submit"
            }

            $.ajax({
                url : "includes/ajax1.php",
                type : "post",
                data : formdata,
                success : function(response){
                    $('#state').html(response);
                }
            })
        })
        $('#state').change(function(){
            selstate = $('#state option:selected').val();
            formdata = {
                state : selstate,
                st_up:"submit"
            }

            $.ajax({
                url : "includes/ajax1.php",
                type : "post",
                data : formdata,
                success : function(response){
                    $('#city').html(response);
                }
            })
        })
    })
    </script>

</head>
<body>

<!--top bar-->
<div class="top-bar">
    <div class="slide-container">
        <div class="top-strip">
            <i class="fa fa-angle-left fa-2x side-nav-toggle"></i> 
			<div class="start-here">
            	<a href="pricing.php" class="btn ui-btn info">Start Selling</a>
			</div>
		</div>
        <div class="bottom-strip">
            <a href="index.php">Home</a> <i class="fa fa-angle-right"></i>
            <a href="dashboard.php"> Dashboard</a> <i class="fa fa-angle-right"></i>
            <a href="#"> Profile</a>
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

        <!--client reviews-->
        <div class="dash-profile">
            <div class="row">
                <div class="col-lg-4">
                    <div class="holder">
                        <div class="top-part"><strong>Profile Details</strong><i class="fa fa-user"></i></div>
                        <div class="client-info">
                            <div class="client-photo">
                                <div class="user-icon">
                                    <img src="<?php echo $res["photo"]; ?>" alt="No Image">
                                </div>
                                <strong><?php echo $res["user_name"]; ?></strong>
                                <em><?php echo $res["address"]." ".$res["city"]; ?></em>
                            </div>
                            <hr>
                            <div class="client-contact-info">
                                <span>Email</span>
                                <i><?php echo $res['email_id']; ?></i>
                                <span><?php
                                    if($res["email_verified"]=="No")
                                    {
                                    ?><a href="dashProfile.php?verify=Yes">Verify your Email</a>
                                    <?php
                                    }
                                    ?>
                                </span>
                                <span>Phone</span>
                                <i><?php echo $res['mobile_no']; ?></i>
                                <span>Address</span>
                                <i><?php echo $res["address"]." ".$res["city"]; ?></i>
                                <i><?php echo $res["state"]; ?></i>
                                <i><?php echo $res["country"]; ?></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="holder">
                        <div class="top-part"><strong>Edit Profile</strong><a href="dashProfile.php?update=true"><i class="fa fa-edit"></i></a></div>
                        <form class="edit-profile" action="#" method="post">
                          <div class="row">
                            <div class="col-sm-3">
                                Name:
                            </div>
                            <div class="col-sm-9">
                                <input type="text" name="fname" class="form-control" value="<?php echo $res["user_name"]; ?>" <?php if(isset($_REQUEST["update"])){ echo "required"; } else { echo "disabled"; } ?>>
                            </div>
                          </div>
                            <!-- <div class="form-group">
                                <input required type="text" class="form-control" placeholder="Last Name">
                            </div> -->
                            <div class="row">
                                <div class="col-sm-3">
                                    Email ID:
                                </div>
                                <div class="col-sm-8">
                                    <input required type="email" name="email" class="form-control" value="<?php echo $res["email_id"]; ?>" <?php if(isset($_REQUEST["update"])){ echo "required"; } else { echo "disabled"; } ?>>
                                </div>
                                <div class="col-sm-1">
                                    <?php
                                    if($res["email_verified"]=="No")
                                    {
                                    ?>
                                        <i class="fa fa-2x fa-question-circle-o text-success"></i>
                                    <?php
                                    }
                                    else
                                    {
                                    ?>
                                        <i class="fa fa-2x fa-check-circle-o text-warning"></i>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                    Mobile Number:
                                </div>
                                <div class="col-sm-9">
                                    <input required type="text" name="mob_no" class="form-control" value="<?php echo $res["mobile_no"]; ?>" <?php if(isset($_REQUEST["update"])){ echo "required"; } else { echo "disabled"; } ?>>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                    Address:
                                </div>
                                <div class="col-sm-9">
                                    <input required type="text" name="add" class="form-control" value="<?php echo $res["address"]; ?>" <?php if(isset($_REQUEST["update"])){ echo "required"; } else { echo "disabled"; } ?>>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                    Region:
                                </div>
                                <div class="col-sm-3">
                                    <select name="con_upd" id="con_upd" <?php if(isset($_REQUEST["update"])){ echo "required"; } else { echo "disabled"; } ?>>
                                    <?php
                                    while($con = mysql_fetch_array($country_res))
                                    {
                                        if($res['country']==$con['country_name'])
                                        {
                                    ?>
                                        <option selected><?php echo $con["country_name"]; ?></option>
                                    <?php
                                        }
                                        else
                                        {
                                    ?>
                                        <option><?php echo $con["country_name"]; ?></option>
                                    <?php
                                        }
                                    }
                                    ?>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <span id="state">
                                    <select name="state_upd" id="state_upd" <?php if(isset($_REQUEST["update"])){ echo "required"; } else { echo "disabled"; } ?>>
                                        <option selected><?php echo $res["state"]; ?></option>
                                    </select>
                                    </span>
                                </div>
                                <div class="col-sm-3">
                                <span id="city">
                                    <select name="city_upd" id="city_upd" <?php if(isset($_REQUEST["update"])){ echo "required"; } else { echo "disabled"; } ?>>
                                        <option selected><?php echo $res["city"]; ?></option>
                                    </select>
                                    </span>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                            <?php
                            if(isset($_REQUEST["update"]))
                            {
                        ?>
                            <div class="col-sm-4">
                                <input type="submit" name="upd_all" value="Update All" class="btn ui-btn text-light danger">
                            </div>
                            
                        <?php
                        }
                        else
                        {
                        ?>
                            <div class="col-sm-4">
                                <a href="dashchangePwd.php" class="btn ui-btn info">Change Password</a>
                            </div>
                            <div class="col-sm-4">
                                <a href="dashProfile.php?update=true" class="btn ui-btn info">Update Profile</a>
                            </div>
                            <div class="col-sm-4">
                                <a href="dashchangePic.php" class="btn ui-btn info">Change Profile Picture</a>
                            </div>
                        <?php
                        }
                        ?>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--end client reviews-->

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

<script src="3rdparty/js/bootstrap.js"></script>
<script src="3rdparty/jquery-nice-select-1.1.0/js/jquery.nice-select.js"></script>
<script src="3rdparty/OwlCarousel2-2.2.1/owl.carousel.min.js"></script>
<script src="3rdparty/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
<script src="js/app.js"></script>

</body>


</html>