<?php
require_once("includes/session.php");
include('../../controller/controller.php');
require_once("../includes/alexa.php");
require_once("../includes/gtm.php");
require_once("../includes/try.php");
$ob = new controller;
if(isset($_REQUEST["web_id"]))
{
	$id = $_REQUEST["web_id"];
	$res1 = $ob->web_details_where($id);
	$row = mysql_fetch_array($res1);
	$al=new alexa;
	$a=$al->get_rank($row["domain_name"]);
/*	$gt=new gtmetrix;
	$dom = "https://".$row["domain_name"];
	$ts=$gt->test($dom); */
}
elseif(isset($_REQUEST["dom_id"]))
{
	$id = $_REQUEST["dom_id"];
	$res1 = $ob->dom_details_where($id);
  $row = mysql_fetch_array($res1);
  $al=new whois;
  $a=$al->test($row["domain_name"]);
}
elseif(isset($_REQUEST["app_id"]))
{
	$id = $_REQUEST["app_id"];
	$res1 = $ob->app_details_where($id);
  $row = mysql_fetch_array($res1);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="images/favicon.ico">

    <title>Admin - Product Details </title>
  
	<!-- Bootstrap 4.0-->
	<link rel="stylesheet" href="assets/vendor_components/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/vendor_components/bootstrap/dist/css/bootstrap.css">
	
	<!-- Bootstrap 4.0-->
	<link rel="stylesheet" href="assets/vendor_components/bootstrap/dist/css/bootstrap-extend.css">

	<!-- Font Awesome -->
	<link rel="stylesheet" href="assets/vendor_components/font-awesome/css/font-awesome.min.css">

  <link rel="stylesheet" href="assets/vendor_component/font-awesome/css/font-awesome.css">

  <link rel="stylesheet" href="assets/vendor_component/glyphicons/glyphicon.css">

	<!-- Ionicons -->
	<link rel="stylesheet" href="assets/vendor_components/Ionicons/css/ionicons.min.css">

	<!-- Theme style -->
	<link rel="stylesheet" href="css/master_style.css">

	<!-- apro_admin Skins. Choose a skin from the css/skins
	   folder instead of downloading all of them to reduce the load. -->
	<link rel="stylesheet" href="css/skins/_all-skins.css">	

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

	<!-- google font -->
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

</head>
<body class="hold-transition skin-black sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  <?php  include("includes/header.php"); ?>

  <!-- Left side column. contains the sidebar -->
  <?php include("includes/sidemenu.php"); ?>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <?php
    if(isset($_REQUEST["web_id"]))
    {
    ?>
      <h1>
        Website Details
      </h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="breadcrumb-item active">Website_details</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Category Insert box -->
        <div class="box-header with-border">
			<h3 class="box-title"><?php echo $row["website_topic"]; ?></h3>
        </div>
        <div class="box-body">
			<div class="col-xl-12 col-lg-12">
          <!-- Box Comment -->
          <div class="box box-widget">
            <div class="box-header with-border">
              <div class="user-block">
                <img class="rounded" src="../<?php echo $row["photo"] ?>" alt="User Image">
                <span class="username"><a href="#"><?php echo $row["user_name"] ?></a></span>
                <span class="description">Shared publicly - <?php echo $row["upload_date"] ?> </span>
              </div>
              <!-- /.user-block -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
			<?php
				$url = substr($row["domain_name"],4);
				$u = "https://api.urlbox.io/v1/lu9NPkLS33kQDGxN/png?url=".$url."&thumb_width=600&ttl=86400";
			?>
              <img class="img-fluid pad" src="<?php echo $u; ?>" alt="Photo">

              <p><?php echo $row["website_description"] ?></p>
            <!-- /.box-body -->
            <div class="box-footer box-comments">
              <div class="box-comment">
                <!-- User image -->
                <div class="comment-text">
                    <span class="username">
						<h5><?php if($row["verified"]=="Verified"){ ?><i class="fa fa-check-square-o"></i>  Approved<?php } else{ ?>
						<i class="fa fa-exclamation-triangle"></i>  Pending
						<?php } ?>
						</h5>
                    </span><!-- /.username -->
                </div>
                <!-- /.comment-text -->
              </div>
			  <div class="box-comment">
				<div class="comment-text">
                      <span class="username">
					  <h5>
                        <?php if($row["domain_including"]=="Yes"){ ?><i class="fa fa-check-square-o"></i><?php } else{ ?>
						<i class="fa fa-times-rectangle"></i><?php } ?> <b>Domain Including</b>
						</h5>
                      </span><!-- /.username -->
                </div>
                <!-- /.comment-text -->
              </div>
			  <div class="box-comment">
				<div class="comment-text">
                      <span class="username">
					  <h5>
                        <?php if($row["custom_updates"]=="Yes"){ ?><i class="fa fa-check-square-o"></i><?php } else{ ?>
						<i class="fa fa-times-rectangle"></i><?php } ?> <b>Custom Updates</b>
						</h5>
                      </span><!-- /.username -->
                </div>
                <!-- /.comment-text -->
              </div>
			  <?php
				if($row["custom_update_price"]!=0)
				{
			  ?>
			  <div class="box-comment">
				<div class="comment-text">
                      <span class="username">
						Custom Update Price
                      </span><!-- /.username -->
					  <?php echo $row["custom_update_price"]; ?>
                </div>
                <!-- /.comment-text -->
              </div>
			  <?php
				}
			  ?>
			  <div class="box-comment">
				<div class="comment-text">
                      <span class="username">
					  <h5>
                        <?php if($row["client_database"]=="Yes"){ ?><i class="fa fa-check-square-o"></i><?php } else{ ?>
						<i class="fa fa-times-rectangle"></i><?php } ?> <b>Client Database</b>
						</h5>
                      </span><!-- /.username -->
                </div>
                <!-- /.comment-text -->
              </div>
              <!-- /.box-comment -->
              <div class="box-comment">
                <!-- User image -->
                <div class="comment-text">
                      <span class="username">
                        Domain Name: 
                      </span><!-- /.username -->
					<?php echo $row["domain_name"] ?>
                </div>
			  </div>
			  <!-- /.box-comment -->
            </div>
            <!-- /.box-footer -->
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
		</div>
    <?php
    }
    elseif(isset($_REQUEST["dom_id"]))
    {
    ?>
      <h1>
        Domain Name Details
      </h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="breadcrumb-item active">Domain details</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Category Insert box -->
        <div class="box-header with-border">
			<h3 class="box-title"><?php echo $row["domain_name"]; ?></h3>
        </div>
        <div class="box-body">
			<div class="col-xl-12 col-lg-12">
          <!-- Box Comment -->
          <div class="box box-widget">
            <div class="box-header with-border">
              <div class="user-block">
                <img class="rounded" src="../<?php echo $row["photo"] ?>" alt="User Image">
                <span class="username"><a href="#"><?php echo $row["user_name"] ?></a></span>
                <span class="description">Shared publicly - <?php echo $row["upload_date"] ?> </span>
              </div>
              <!-- /.user-block -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <img class="img-fluid pad" src="../img/dom1.jpeg" alt="Photo">

              <p><?php echo $row["domain_description"] ?></p>
            <!-- /.box-body -->
            <div class="box-footer box-comments">
              <div class="box-comment">
                <!-- User image -->
                <div class="comment-text">
                    <span class="username">
						<h5><?php if($row["verified"]=="Verified"){ ?><i class="fa fa-check-square-o"></i>  Approved<?php } else{ ?>
						<i class="fa fa-exclamation-triangle"></i>  Pending
						<?php } ?>
						</h5>
                    </span><!-- /.username -->
                </div>
                <!-- /.comment-text -->
              </div>
			  <div class="box-comment">
				<div class="comment-text">
                      <span class="username">
					  <h5>
                        <?php echo $row["starting_bid"] ?>
						</h5>
                      </span><!-- /.username -->
                </div>
                <!-- /.comment-text -->
              </div>
			  <div class="box-comment">
				<div class="comment-text">
                      <span class="username">
					  <h5>
                        <?php echo $row["upload_date"] ?>
						</h5>
                      </span><!-- /.username -->
                </div>
                <!-- /.comment-text -->
              </div>
			  <div class="box-comment">
				<div class="comment-text">
                      <span class="username">
					  <h5>
                     <b> Registrar </b>:  <?php echo $a["registrar"] ?>
						</h5>
                      </span><!-- /.username -->
                </div>
                <!-- /.comment-text -->
              </div>
              <!-- /.box-comment -->
              <div class="box-comment">
                <!-- User image -->
                <div class="comment-text">
                      <span class="username">
                        Domain Name: 
                      </span><!-- /.username -->
					<?php echo $row["domain_name"] ?>
                </div>
			  </div>
        <div class="box-comment">
                <!-- User image -->
                <div class="comment-text">
                      <span class="username">
                        Age: 
                      </span><!-- /.username -->
					<?php echo $a["age"] ?>
                </div>
			  </div>
			  <!-- /.box-comment -->
            </div>
            <!-- /.box-footer -->
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
		</div>
    <?php
    }
    elseif(isset($_REQUEST["app_id"]))
    {
    ?>
      <h1>
        Application Details
      </h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="breadcrumb-item active">Application details</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Category Insert box -->
        <div class="box-header with-border">
			<h3 class="box-title"><?php echo $row["application_name"]; ?></h3>
        </div>
        <div class="box-body">
			<div class="col-xl-12 col-lg-12">
          <!-- Box Comment -->
          <div class="box box-widget">
            <div class="box-header with-border">
              <div class="user-block">
                <img class="rounded" src="../<?php echo $row["photo"] ?>" alt="User Image">
                <span class="username"><a href="#"><?php echo $row["user_name"] ?></a></span>
                <span class="description">Shared publicly - <?php echo $row["upload_date"] ?> </span>
              </div>
              <!-- /.user-block -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <?php
              $app1 = $row["api_key"];
              $st = strpos($app1,"=");
              $st++;
              $link = substr($app1,$st);
              $ans = file_get_contents("https://data.42matters.com/api/v2.0/android/apps/lookup.json?p=$link&access_token=0b1bcd4d30760c42c4f6181d474b826617ba07fc");
              $b = json_decode($ans,true);
            ?>
              <img class="img-fluid pad" src="<?php echo $b['icon'] ?>" alt="Photo">
              <img class="img-fluid pad" src="<?php echo $b['screenshots'][0] ?>" alt="Photo">
              <img class="img-fluid pad" src="<?php echo $b['screenshots'][1] ?>" alt="Photo">
              <img class="img-fluid pad" src="<?php echo $b['screenshots'][2] ?>" alt="Photo">
              <p><?php echo $row["application_description"] ?></p>
            <!-- /.box-body -->
            <div class="box-footer box-comments">
              <div class="box-comment">
                <!-- User image -->
                <div class="comment-text">
                    <span class="username">
						<h5><?php if($row["verified"]=="Verified"){ ?><i class="fa fa-check-square-o"></i>  Approved<?php } else{ ?>
						<i class="fa fa-exclamation-triangle"></i>  Pending
						<?php } ?>
						</h5>
                    </span><!-- /.username -->
                </div>
                <!-- /.comment-text -->
              </div>
			  <div class="box-comment">
				<div class="comment-text">
                      <span class="username">
					  <h5>
                  <b>Starting Bid</b> :      <?php echo $row["starting_bid"] ?>
						</h5>
                      </span><!-- /.username -->
                </div>
                <!-- /.comment-text -->
              </div>
			  <div class="box-comment">
				<div class="comment-text">
                      <span class="username">
					  <h5>
                  <b>Upload Date</b> :      <?php echo $row["upload_date"] ?>
						</h5>
                      </span><!-- /.username -->
                </div>
                <!-- /.comment-text -->
              </div>
			  <div class="box-comment">
				<div class="comment-text">
                      <span class="username">
					  <h5>
                     <b> Downloads </b>:  <?php echo $b["downloads"] ?>
						</h5>
                      </span><!-- /.username -->
                </div>
                <!-- /.comment-text -->
              </div>
              <!-- /.box-comment -->
              <div class="box-comment">
                <!-- User image -->
                <div class="comment-text">
                      <span class="username">
                        <h5>
                         <b> Created Date </b>: <?php echo substr($b['created'],0,10); ?>
                        </h5>
                      </span><!-- /.username -->
                </div>
              </div>
        <div class="box-comment">
                <!-- User image -->
                <div class="comment-text">
                      <span class="username">
                      <h5>
                      <b> Google Play Price </b>: <?php echo $b['price_numeric']; ?>
                      </h5>
                      </span><!-- /.username -->
                </div>
			  </div>
        <div class="box-comment">
                <!-- User image -->
                <div class="comment-text">
                      <span class="username">
                      <h5>
                      <b>  5 Star Rating </b>: <?php echo $b['ratings_5']; ?>
                      </h5>
                      </span><!-- /.username -->
                </div>
			  </div>
			  <!-- /.box-comment -->
            </div>
            <!-- /.box-footer -->
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
		</div>
    <?php
    }
    ?>
        <!-- /.box-body -->
      <!-- /.box -->
      
      <!-- Category Table -->
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 
  <?php  
	include("includes/footer.php");
?>

  <!-- Control Sidebar -->
  
  <!-- /.control-sidebar -->
  
  <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!--  SCRIPTS  -->
	<?php  
		include("includes/scripts.php");
	?>
</body>
</html>