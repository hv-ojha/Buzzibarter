<?php
session_start();
include_once("includes/session.php");
if(isset($_REQUEST["cng_pwd"]))
{
    if(isset($_REQUEST['cnfpass']) && $_REQUEST['newpass']==$_REQUEST['cnfpass'])
    {
        $pass=$_REQUEST['cnfpass'];
        $q = mysql_query("update user set password='$pass' where user_id=$res[user_id]");
        if($q)
        {
            echo "<script>alert('Successfully Updated');</script>";
            header("location: dashProfile.php");
        }
        else
        {
            echo "<script>alert('Error Updating Password'); windows.location='dashchangePwd.php';</script>";
        }
    }
    else
    {
        echo "<script>alert('Password must match'); windows.location='dashchangePwd.php';</script>";
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
	
    <script src="3rdparty/js/jquery-3.2.1.min.js"></script>
    <script>
    $(document).ready(function(){
        $('#password').change(function(){
            pass = $('#password').val();
            formdata = {
                pwd : pass,
                ch :"submit"
            }

            $.ajax({
                url : "includes/ajax.php",
                type : "post",
                data : formdata,
                success : function(response){
                    $('#cngpwd').html(response);
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
            	<a href="startselling.php" class="btn ui-btn info">Start Selling</a>
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
                                    <img src="<?php echo $res["photo"]; ?>" alt="">
                                </div>
                                <strong><?php echo $res["user_name"]; ?></strong>
                                <em><?php echo $res["address"]." ".$res["city"]; ?></em>
                            </div>
                            <hr>
                            <div class="client-contact-info">
                                <span>Email</span>
                                <i><?php echo $res['email_id']; ?></i>
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
                          <div class="form-group">
                                <input type="password" placeholder="Enter Old Password" name="password" id="password" class="form-control">
                          </div>
                            <div id="cngpwd" class="form-group">
                                
                            </div>

                            <input type="submit" name="cng_pwd" class="btn ui-btn text-light danger" value="Change Password">
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

<script src="3rdparty/js/popper.js"></script>
<script src="3rdparty/js/bootstrap.js"></script>
<script src="3rdparty/jquery-nice-select-1.1.0/js/jquery.nice-select.js"></script>
<script src="3rdparty/OwlCarousel2-2.2.1/owl.carousel.min.js"></script>
<script src="3rdparty/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
<script src="js/app.js"></script>

</body>


</html>