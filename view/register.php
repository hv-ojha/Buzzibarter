<?php
session_start();
include('insert_mail.php');
$ob = new mail;
mysql_connect("localhost","root","");
mysql_select_db("buzzibarter");
$country = mysql_query("select * from country");
if(isset($_REQUEST["reg"]))
{
    $name = $_REQUEST['fname']." ".$_REQUEST['lname'];
    $add = $_REQUEST['add'];
    $con = $_REQUEST['country'];
    $state = $_REQUEST['state'];
    $city = $_REQUEST['city'];
    $mob = $_REQUEST['num'];
    $email = $_REQUEST['email'];
    $pass = $_REQUEST['cnfpass'];
    $file = $_FILES["pic"]["name"];
	$tmp = $_FILES["pic"]["tmp_name"];
	$path="uploads/";
    $filepath = $path.$file;
    move_uploaded_file($tmp,$filepath);
    $str = "insert into user values ('','$name','$add','$city','$state','$con',$mob,'$email','$pass','$filepath')";
    $q = mysql_query($str) or die(mysql_error());
    $ob->register($email,$pass1);
    if($q)
    {
        session_start();
        $user = mysql_query("select user_id from user where email_id='$email' and password='$pass'");
		$res = mysql_fetch_array($user);
		$_SESSION["user_id"] = $res["user_id"];
		header("location:dashboard.php");
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
    <script>
    $(document).ready(function(){
        $('#country').change(function(){
            selcntry = $('#country option:selected').val();
            formdata = {
                cntry : selcntry,
                ad:"submit"
            }

            $.ajax({
                url : "includes/ajax.php",
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
                st:"submit"
            }

            $.ajax({
                url : "includes/ajax.php",
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
    <!--top navbar-->

	<?php include("includes/header.php"); ?>

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
            <li><a href="aboutus.php">About Us</a></li>
            <li><a href="contact.php">Contact US</a></li>
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="#" data-toggle="modal" data-target="#Modal">Account</a></li>
        </ul>
    </div>
</div>
<!--end side menu-->

<div class="content-wrapper">

    <!-- HEADER -->
    <header class="head">
        <h1><strong>Sign UP</strong> Yourself for <strong>BuzziBarter</strong></h1>
    </header>

    <div class="p-tables">
    <form method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-sm-6">
                <input type="text" name="fname" id="" placeholder="First Name">
            </div>
            <div class="col-sm-6">
                <input type="text" name="lname" id="" placeholder="Last Name">
            </div>
        </div>
        <div class="row">
            <div class="col-sm-8">
                <textarea name="add" id="" cols="30" rows="10" style="height:80px" placeholder="Full Address"></textarea>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <select name="country" id="country">
                    <option value="">Select Country</option>
                <?php
                    while($row = mysql_fetch_array($country))
                    {
                        ?>
                        <option><?php echo $row['country_name'] ?></option>
                <?php
                    }
                ?>
                </select>
            </div>
            <div class="col-sm-4">
                <select name="state" id="state">
                    <option value="">Select Country First</option>
                </select>
            </div>
            <div class="col-sm-4">
                <select name="city" id="city">
                    <option value="">Select State First</option>
                </select>
            </div>
        </div>
        
        <div class="row">
            <div class="col-sm-6">
                <input type="email" name="email" id="" placeholder="E-mail ID eg.:abc@xyz.com">
            </div>
            <div class="col-sm-6">
                <input type="tel" name="num" id="" placeholder="Telephone Number">
            </div>
        </div>
        <div class="row">
            <div class="col-sm-8">
                <input type="password" name="pass" id="" placeholder="Password">
            </div>
        </div>
        <div class="row">
            <div class="col-sm-8">
                <input type="password" name="cnfpass" id="" placeholder="Confirm Password">
            </div>
        </div>
        <div class="row">
            <div class="col-sm-8">
                <input type="file" name="pic">
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <input type="submit" value="Sign UP" name="reg" class="btn ui-btn dark-blue">
            </div>
            <div class="col-sm-4">
                <input type="Reset" value="Reset" class="btn ui-btn btn-info">
            </div>
        </div>
    </form>
    </div>
</div>
<?php include("includes/footer.php"); ?>
</body>
</html>