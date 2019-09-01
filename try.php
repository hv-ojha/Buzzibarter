<?php
mysql_connect("localhost","root","");
mysql_select_db("buzzibarter");
$country = mysql_query("select * from country");
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
                url : "ajax.php",
                type : "post",
                data : formdata,
                success : function(response){
                    alert(response);
                    $('#state').html(response);
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

    <div class="p-tables"></div>
    <form method="post">
        <div class="row">
            <div>
                <select name="country" id="country">
                <?php
                    while($row = mysql_fetch_array($country))
                    {
                        ?>
                        <option value="<?php echo $row['country_id'] ?>"><?php echo $row['country_name'] ?></option>
                <?php
                    }
                ?>
                </select>
            </div>
        </div>
        <div class="row">
            <div>
                <select name="state" id="state">
                    <option value="">Select Country First</option>
                </select>
            </div>
        </div>
    </form>
</body>
</html>