<?php
require_once("includes/session.php");
include_once('../../controller/controller.php');
$ob = new controller;
$web=$ob->website_display();
$dom=$ob->dom_display();
$app=$ob->app_display();
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

    <title>Buzzibarter Admin - Latest Product </title>
  
	<!-- Bootstrap 4.0-->
	<link rel="stylesheet" href="assets/vendor_components/bootstrap/dist/css/bootstrap.min.css">
	
	<!-- Bootstrap 4.0-->
	<link rel="stylesheet" href="assets/vendor_components/bootstrap/dist/css/bootstrap-extend.css">

	<!-- Font Awesome -->
	<link rel="stylesheet" href="assets/vendor_components/font-awesome/css/font-awesome.min.css">

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

  <?php include("includes/header.php"); ?>

  <!-- Left side column. contains the sidebar -->
  <?php include("includes/sidemenu.php"); ?>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Latest Products
      </h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="breadcrumb-item"><a href="#">Products</a></li>
        <li class="breadcrumb-item active">Verified Review</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
			<h3>Websites</h3>
			<hr>
    <div class="row">
	  <?php
		while($row = mysql_fetch_array($web))
		{
	  ?>
      <div class="col-sm-4">
        <div class="box-body" style="overflow-x:auto">
			<div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
			<?php
					$url = substr($row["domain_name"],4);
					$u = "https://api.urlbox.io/v1/lu9NPkLS33kQDGxN/png?url=".$url."&thumb_width=600&ttl=86400";
				?>
            <div class="widget-user-header bg-black" style="background: url('<?php echo $u ?>') center center; background-size:100%;">
			<a href="web_details.php?web_id=<?php echo $row["website_id"] ?>">
              <h3 class="widget-user-username text-success"><?php echo $row["website_topic"] ?></h3>
              <h6 class="widget-user-desc text-danger">By <?php echo $row["user_name"] ?></h6>
			</a>
            </div>
            <div class="widget-user-image">
              <img class="rounded-circle" src="../<?php echo $row["photo"]; ?>" alt="User Avatar">
            </div>
			<?php 
				$max = $ob->max_bid($row["website_id"]);
				$cnt = $ob->count_bid($row["website_id"]);
			?>
            <div class="box-footer">
              <div class="row">
                <div class="col-sm-4 border-right">
                  <div class="description-block">
                    <h5 class="description-header"><?php if($max[0]) { echo $max["max(amount)"]; } else { echo "No BIDS"; } ?></h5>
                    <span class="description-text">Highest Bid</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4 border-right">
                  <a href="bidding_details.php?web_id=<?php echo $row["website_id"]; ?>&name=<?php echo $row["website_topic"] ?>">
				  <div class="description-block">
                    <h5 class="description-header"><?php if($cnt[0]) { echo $cnt["count(*)"]; } else { echo "No BIDS"; } ?></h5>
                    <span class="description-text">Total Bids</span>
                  </div>
				  </a>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4">
                  <div class="description-block">
                    <h5 class="description-header"><?php echo $row["starting_bid"] ?></h5>
                    <span class="description-text">Starting Bid</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
          </div>
		</div>
        <!-- /.box-body -->
        <!-- /.box-footer-->
      </div>
	  <?php
		}
	  ?>
	  </div>
	  <!-- /.box -->
		 <h3>Domain Names</h3>
			<hr>
			<div class="row">
		<?php
		while($row = mysql_fetch_array($dom))
		{
		?>
		<div class="col-xl-4 col-lg-6 col-12">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-green-active">
            <a href="web_details.php?dom_id=<?php echo $row["domain_id"] ?>">
              <h3 class="widget-user-username"><?php echo $row["domain_name"] ?></h3>
              <h6 class="widget-user-desc"><?php echo $row["user_name"] ?></h6>
              </a>
            </div>
            <div class="widget-user-image">
              <img class="rounded-circle" src="../<?php echo $row["photo"] ?>" alt="User Avatar">
            </div>
            <?php 
              $max = $ob->max_bid_dom($row["domain_id"]);
              $cnt = $ob->count_bid_dom($row["domain_id"]);
            ?>
            <div class="box-footer">
              <div class="row">
                <div class="col-sm-4 border-right">
                  <div class="description-block">
                    <h5 class="description-header"><?php if($max[0]) { echo $max["max(amount)"]; } else { echo "No BIDS"; } ?></h5>
                    <span class="description-text">Highest Bid</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4 border-right">
                <a href="bidding_details.php?dom_id=<?php echo $row["domain_id"]; ?>&name=<?php echo $row["domain_name"] ?>">
                  <div class="description-block">
                    <h5 class="description-header"><?php if($cnt[0]) { echo $cnt["count(*)"]; } else { echo "No BIDS"; } ?></h5>
                    <span class="description-text">Total Bids</span>
                  </div>
                  <!-- /.description-block -->
                  </a>
                </div>
                <!-- /.col -->
                <div class="col-sm-4">
                  <div class="description-block">
                    <h5 class="description-header"><?php echo $row["starting_bid"] ?></h5>
                    <span class="description-text">Starting Bid</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
          </div>
          <!-- /.widget-user -->
        </div>
		<?php
		}
		?>
		</div>
      <h3>Applications</h3>
			<hr>
    <div class="row">
	  <?php
		while($row = mysql_fetch_array($app))
		{
	  ?>
      <div class="col-sm-4">
        <div class="box-body" style="overflow-x:auto">
			<div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
			<?php
          $app1 = $row["api_key"];
					$st = strpos($app1,"=");
          $st++;
          $link = substr($app1,$st);
          $ans = file_get_contents("https://data.42matters.com/api/v2.0/android/apps/lookup.json?p=$link&access_token=0b1bcd4d30760c42c4f6181d474b826617ba07fc");
          $b = json_decode($ans,true);
				?>
            <div class="widget-user-header bg-black" style="background: url('<?php echo $b['icon'] ?>') center center; background-size:100%;">
			<a class="text-light" href="web_details.php?app_id=<?php echo $row["application_id"] ?>">
              <h3 class="widget-user-username text-light"><?php echo $row["application_name"] ?></h3>
              <h6 class="widget-user-desc text-light">By <?php echo $row["user_name"] ?></h6>
			</a>
            </div>
            <div class="widget-user-image">
              <img class="rounded-circle" src="../<?php echo $row["photo"]; ?>" alt="User Avatar">
            </div>
			<?php 
				$max = $ob->max_bid_app($row["application_id"]);
				$cnt = $ob->count_bid_app($row["application_id"]);
			?>
            <div class="box-footer">
              <div class="row">
                <div class="col-sm-4 border-right">
                  <div class="description-block">
                    <h5 class="description-header"><?php if($max[0]) { echo $max["max(amount)"]; } else { echo "No BIDS"; } ?></h5>
                    <span class="description-text">Highest Bid</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4 border-right">
                  <a href="bidding_details.php?app_id=<?php echo $row["application_id"]; ?>&name=<?php echo $row["application_name"] ?>">
				  <div class="description-block">
                    <h5 class="description-header"><?php if($cnt[0]) { echo $cnt["count(*)"]; } else { echo "No BIDS"; } ?></h5>
                    <span class="description-text">Total Bids</span>
                  </div>
				  </a>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4">
                  <div class="description-block">
                    <h5 class="description-header"><?php echo $row["starting_bid"] ?></h5>
                    <span class="description-text">Starting Bid</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
          </div>
		</div>
        <!-- /.box-body -->
        <!-- /.box-footer-->
      </div>
	  <?php
		}
	  ?>
	  </div>
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
