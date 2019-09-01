<?php
include("includes/connection.php");
include("includes/emal/insert_mail.php");
$ob = new mail;
if(isset($_REQUEST["for_pwd"]))
{
	$email = $_REQUEST["email"];
    $q = mysql_query("select * from user where email_id='$email'")or die(mysql_error());
    if($q)
    {
        $pas = mysql_fetch_array($q);
        $pass1 = $pas["password"];
        $ob->forget($email,$pass1);
        header('location: index.php');
    }
}
if(isset($_REQUEST["user_name"]) && isset($_REQUEST["pass"]))
{
    $mail = $_REQUEST["user_name"];
    $pass = $_REQUEST["pass"];
    $sel = mysql_query("select * from user where email_id='$mail' and password='$pass'");
    if(mysql_num_rows($sel)==1)
    {
        session_start();
        $row = mysql_fetch_array($sel);
        $_SESSION["user_id"] = $row["user_id"];
        $id = $row["email_id"];
        if(isset($_REQUEST["upd"]))
        {
            $pass = $_REQUEST["cnfpass1"];
            $query="update user set password='$pass' where email_id='$id'";
            $update=mysql_query($query)or die(mysql_error());
            if($update)
            {
                session_destroy();
                header('location: index.php');
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Buzzibarter: Register</title>

    <!--meta tags-->

    <meta charset="UTF-8">
    <meta name="description" content="Services Listing HTML5 CSS3 template">
    <meta name="keywords" content="HTML,CSS,XML,JavaScript, services, listing">
    <meta name="author" content="Ui-DesignLab">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--end meta tags-->

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
</head>
<body>
    <!--top navbar-->

	<?php include("includes/header.php"); ?>

<!--end top navbar-->

<!--side menu-->
<div class="side-menu" id="side-menu">
    <div class="side-menu-c">
        <div class="side-logo">
            <a href="index.php">BuzziBarter</a>
            <i class="fa fa-times close-menu"></i>
        </div>
        <ul class="list-unstyled mini">
            <li><a href="index.php">Home</a></li>
            <li><a href="listing_one.php">Listings</a></li>
            <li><a href="aboutus.php">About Us</a></li>
            <li><a href="contact.php">Contact US</a></li>
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="#" data-toggle="modal" data-target="#Modal">Account</a></li>
        </ul>
    </div>
</div>
<!--end side menu-->

<div class="content-wrapper">
<?php
if(isset($_REQUEST["user_name"]) && isset($_REQUEST["pass"]))
{
?>
<header class="head">
        <h1>Forget Password</h1>
        <p>Enter Your New Passwords</p>
    </header>
	
	<div class="top-rated">
	<form method="POST">
		<div class="row">
			<div class="col-md-6 col-sm-6">
				<input type="password" name="pass1" placeholder="Enter Password">
            </div>
            <div class="col-md-6 col-sm-6">
                <input type="password" name="cnfpass1" placeholder="Enter Password">
			</div>
		</div>
		<div class="row">
			<div class="col-md-4 col-sm-4">
				<input type="submit" name="upd" value="Update Password" class="btn ui-btn info text-light">
			</div>
		</div>
	
	</form>
	</div>
<?php
}
else
{
?>
    <!-- HEADER -->
    <header class="head">
        <h1>Forget Password</h1>
        <p>Enter Your Registered Email in following textbox</p>
    </header>
	
	<div class="top-rated">
	<form method="POST">
		<div class="row">
			<div class="col-md-8 col-sm-8">
				<input type="text" name="email" placeholder="Enter Valid E-mail">
			</div>
		</div>
		<div class="row">
			<div class="col-md-4 col-sm-4">
				<input type="submit" name="for_pwd" value="Submit Email" class="btn ui-btn info text-light">
			</div>
		</div>
	
	</form>
	</div>
    <?php
}
    ?>
</div>
<?php include("includes/footer.php"); ?>
</body>
</html>