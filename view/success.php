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
      <header class="head">
            <h1>Successful Trancation</h1>
      </header>
      <div class="qna">
<?php
include("includes/connection.php");
$status=$_POST["status"];
$firstname=$_POST["firstname"];
$amount=$_POST["amount"];
$txnid=$_POST["txnid"];
$posted_hash=$_POST["hash"];
$key=$_POST["key"];
$productinfo=$_POST["productinfo"];
$email=$_POST["email"];
$salt="yIEkykqEH3";

// Salt should be same Post Request 

If (isset($_POST["additionalCharges"]))
{
      $additionalCharges=$_POST["additionalCharges"];
      $retHashSeq = $additionalCharges.'|'.$salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
}
else
{
      $retHashSeq = $salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
}
$hash = hash("sha512", $retHashSeq);
if ($hash != $posted_hash)
{
      echo "Invalid Transaction. Please try again";
}
else
{
      echo "<h3>Thank You. Your order status is ". $status .".</h3>";
      echo "<h4>Your Transaction ID for this transaction is ".$txnid.".</h4>";
      echo "<h4>We have received a payment of Rs. " . $amount . ". Your order will soon be shipped.</h4>";
      if(isset($_REQUEST["user_id"]))
      {
            $trans = mysql_query("select * from transaction where transaction_id='$txnid'");
            if(mysql_num_rows($trans)==0)
            {
                  $id1 = $_REQUEST["user_id"];
                  $wal = mysql_query("select * from wallet where user_id=$id1");
                  $wal_res = mysql_fetch_array($wal);
                  $amount=$amount+0;
                  $w_id = $wal_res["wallet_id"];
                  $desc = "Money Added to wallet by Card";
                  $dt = new datetime();
	            $up_date = date_format($dt,"Y-m-d");
                  mysql_query("insert into transaction values('$txnid',$w_id,'',$amount,'$desc','','$up_date')")or die(mysql_error());
                  mysql_query("update wallet set amount=amount+$amount where user_id=$id1")or die(mysql_error());
            }
      }
}
?>
</div>
</div>
<?php include("includes/footer.php"); ?>
</body>
</html>