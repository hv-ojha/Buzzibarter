<?php
include("includes/session.php");
$res1 = mysql_query("select count(*) as cnt from bidding inner join listing on listing.listing_id=bidding.listing_id");
$cnt_bid1 = mysql_fetch_array($res1);
$pro = mysql_query("select count(*) as cnt from listing");
$cnt_pro = mysql_fetch_array($pro);
$win = mysql_query("select count(*) as cnt from winner");
$cnt_win = mysql_fetch_array($win);
$bidders = mysql_query("select * from bidding INNER JOIN listing ON bidding.listing_id=listing.listing_id INNER JOIN user ON bidding.user_id=user.user_id order by created_date limit 7");
$products = mysql_query("select * from listing order by listing_id DESC limit 7");
$winners = mysql_query("select * from winner INNER JOIN listing ON winner.listing_id=listing.listing_id INNER JOIN user ON winner.user_id=user.user_id order by win_date DESC limit 7");
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

    <title>BuzziBarter Admin - Dashboard</title>
    
	<!-- Bootstrap 4.0-->
	<link rel="stylesheet" href="assets/vendor_components/bootstrap/dist/css/bootstrap.css">
	
	<!-- Bootstrap 4.0-->
	<link rel="stylesheet" href="assets/vendor_components/bootstrap/dist/css/bootstrap-extend.css">
	
	<!-- font awesome -->
	<link rel="stylesheet" href="assets/vendor_components/font-awesome/css/font-awesome.css">
	
	<!-- ionicons -->
	<link rel="stylesheet" href="assets/vendor_components/Ionicons/css/ionicons.css">
	
	<!-- theme style -->
	<link rel="stylesheet" href="css/master_style.css">
	
	<!-- apro_admin skins. choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
	<link rel="stylesheet" href="css/skins/_all-skins.css">
	
	<!-- weather weather -->
	<link rel="stylesheet" href="assets/vendor_components/weather-icons/weather-icons.css">
	
	<!-- jvectormap -->
	<link rel="stylesheet" href="assets/vendor_components/jvectormap/jquery-jvectormap.css">
	
	<!-- date picker -->
	<link rel="stylesheet" href="assets/vendor_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.css">
	
	<!-- daterange picker -->
	<link rel="stylesheet" href="assets/vendor_components/bootstrap-daterangepicker/daterangepicker.css">
	
	<!-- bootstrap wysihtml5 - text editor -->
	<link rel="stylesheet" href="assets/vendor_plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.css">
	

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
<div class="wrapper">
<!-- Header start -->
 
 	<?php include("includes/header.php"); ?>
 
<!-- Header Over -->
  
  <!-- Left side column. contains the logo and sidebar -->
  
  <?php include("includes/sidemenu.php"); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="breadcrumb-item active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
	  <div class="row">
		  <div class="col-xl-12 connectedSortable">
		  <!-- Small boxes (Stat box) -->
		  <div class="row">
			<div class="col-lg-4 col-12">
			  <div class="info-box">
				<span class="info-box-icon bg-green"><i class="fa fa-gavel"></i></span>

				<div class="info-box-content">
				  <span class="info-box-number"><?php echo $cnt_bid1["cnt"]; ?></span>
				  <span class="info-box-text">User Biddings</span>
				</div>
				<!-- /.info-box-content -->
			  </div>
			  <!-- /.info-box -->
			</div>
			<!-- /.col -->

			<!-- fix for small devices only -->
			<div class="clearfix visible-sm-block"></div>
			<div class="col-lg-4 col-12">
			  <div class="info-box">
				<span class="info-box-icon bg-purple"><i class="ion ion-bag"></i></span>

				<div class="info-box-content">
				  <span class="info-box-number"><?php echo $cnt_pro["cnt"] ?></span>
				  <span class="info-box-text">Products</span>
				</div>
				<!-- /.info-box-content -->
			  </div>
			  <!-- /.info-box -->
			</div>
			<!-- /.col -->
			<div class="col-lg-4 col-12">
			  <div class="info-box">
				<span class="info-box-icon bg-red"><i class="ion ion-ribbon-b"></i></span>

				<div class="info-box-content">
				  <span class="info-box-number"><?php echo $cnt_win["cnt"] ?></span>
				  <span class="info-box-text">Winners</span>
				</div>
				<!-- /.info-box-content -->
			  </div>
			  <!-- /.info-box -->
			</div>
			<!-- /.col -->
		  </div>
      	<!-- /.row -->
		</div>
		<!-- /.col -->      
			<div class="col-sm-4">	
				<!-- PRODUCT LIST -->
					<div class="box box-primary">
					<div class="box-header with-border">
						<h3 class="box-title">Recent Biddings</h3>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<ul class="products-list product-list-in-box">
						<?php
						if(mysql_num_rows($bidders) > 0)
						{
							while($row = mysql_fetch_array($bidders))
							{
						?>
								<li class="item">
									<div class="product-img">
									<img src="../<?php echo $row["photo"] ?>">
									</div>
									<div class="product-info">
										<p class="product-title"><?php echo $row["user_name"] ?>
										<span class="label label-warning pull-right"><i class="fa fa-inr"></i><?php echo " ".$row["amount"] ?></span>
									</p>
									<span class="product-description">
										<?php echo $row["listing_type"] ?>
									</span>
									</div>
								</li>
							<?php
							}
						}
						else
						{ ?>
							<li class="item">
								<div class="product-info">
									<h3>No Product Available</h3>
								</div>
							</li>
						<?php
						}
						?>
						<!-- /.item -->
						</ul>
					</div>
					<!-- /.box-body -->
					<div class="box-footer text-center">
						<a href="javascript:void(0)" class="uppercase">View All Products</a>
					</div>
					<!-- /.box-footer -->
					</div>
			</div>
			<div class="col-sm-4">	
				<!-- PRODUCT LIST -->
					<div class="box box-primary">
					<div class="box-header with-border">
						<h3 class="box-title">Recent Products</h3>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<ul class="products-list product-list-in-box">
						<?php
						if(mysql_num_rows($products) > 0)
						{
							while($row1 = mysql_fetch_array($products))
							{
								if($row1["listing_type"]=="Application")
								{
									$id1 = $row1["pro_id"];
									$det = mysql_query("select * from application INNER JOIN user ON user.user_id=application.user_id where application_id=$id1");
									while($a = mysql_fetch_array($det))
									{
								?>
									<li class="item">
										<div class="product-img">
										<img src="../<?php echo $a["photo"] ?>">
										</div>
										<div class="product-info">
											<p class="product-title"><?php echo $a["user_name"] ?>
											<span class="label label-warning pull-right"><i class="fa fa-inr"></i><?php echo " ".$a["starting_bid"] ?></span>
										</p>
										<span class="product-description">
											<?php echo $a["application_name"] ?>
										</span>
										</div>
									</li>
								<?php
									}
								}
								elseif($row1["listing_type"]=="Domain_name")
								{
									$id1 = $row1["pro_id"];
									$det = mysql_query("select * from domains INNER JOIN user ON user.user_id=domains.user_id where domain_id=$id1");
									while($a = mysql_fetch_array($det))
									{
							?>
									<li class="item">
										<div class="product-img">
										<img src="../<?php echo $a["photo"] ?>">
										</div>
										<div class="product-info">
											<p class="product-title"><?php echo $a["user_name"] ?>
											<span class="label label-warning pull-right"><i class="fa fa-inr"></i><?php echo " ".$a["starting_bid"] ?></span>
										</p>
										<span class="product-description">
											<?php echo $a["domain_name"] ?>
										</span>
										</div>
									</li>
								<?php
									}
								}
								elseif($row1["listing_type"]=="Website")
								{
									$id1 = $row1["pro_id"];
									$det = mysql_query("select * from website INNER JOIN user ON user.user_id=website.user_id where website_id=$id1");
									while($a = mysql_fetch_array($det))
									{
							?>
									<li class="item">
										<div class="product-img">
										<img src="../<?php echo $a["photo"] ?>">
										</div>
										<div class="product-info">
											<p class="product-title"><?php echo $a["user_name"] ?>
											<span class="label label-warning pull-right"><i class="fa fa-inr"></i><?php echo " ".$a["starting_bid"] ?></span>
										</p>
										<span class="product-description">
											<?php echo $a["website_topic"] ?>
										</span>
										</div>
									</li>
								<?php
									}
								}
							}
						}
						else
						{ ?>
							<li class="item">
								<div class="product-info">
									<h3>No Product Available</h3>
								</div>
							</li>
						<?php
						}
						?>
						<!-- /.item -->
						</ul>
					</div>
					<!-- /.box-body -->
					<div class="box-footer text-center">
						<a href="javascript:void(0)" class="uppercase">View All Products</a>
					</div>
					<!-- /.box-footer -->
					</div>
			</div>
			<div class="col-sm-4">	
				<!-- PRODUCT LIST -->
					<div class="box box-primary">
					<div class="box-header with-border">
						<h3 class="box-title">Recent Biddings</h3>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<ul class="products-list product-list-in-box">
						<?php
						if(mysql_num_rows($winners) > 0)
						{
							while($row1 = mysql_fetch_array($winners))
							{
								if($row1["listing_type"]=="Application")
								{
									$id1 = $row1["pro_id"];
									$det = mysql_query("select * from application INNER JOIN user ON user.user_id=application.user_id where application_id=$id1");
									while($a = mysql_fetch_array($det))
									{
								?>
									<li class="item">
										<div class="product-img">
										<img src="../<?php echo $a["photo"] ?>">
										</div>
										<div class="product-info">
											<p class="product-title"><?php echo $a["user_name"] ?>
											<span class="label label-warning pull-right"><i class="fa fa-inr"></i><?php echo " ".$a["starting_bid"] ?></span>
										</p>
										<span class="product-description">
											<?php echo $a["application_name"] ?>
										</span>
										</div>
									</li>
								<?php
									}
								}
								elseif($row1["listing_type"]=="Domain_name")
								{
									$id1 = $row1["pro_id"];
									$det = mysql_query("select * from domains INNER JOIN user ON user.user_id=domains.user_id where domain_id=$id1");
									while($a = mysql_fetch_array($det))
									{
							?>
									<li class="item">
										<div class="product-img">
										<img src="../<?php echo $a["photo"] ?>">
										</div>
										<div class="product-info">
											<p class="product-title"><?php echo $a["user_name"] ?>
											<span class="label label-warning pull-right"><i class="fa fa-inr"></i><?php echo " ".$a["starting_bid"] ?></span>
										</p>
										<span class="product-description">
											<?php echo $a["domain_name"] ?>
										</span>
										</div>
									</li>
								<?php
									}
								}
								elseif($row1["listing_type"]=="Website")
								{
									$id1 = $row1["pro_id"];
									$det = mysql_query("select * from website INNER JOIN user ON user.user_id=website.user_id where website_id=$id1");
									while($a = mysql_fetch_array($det))
									{
							?>
									<li class="item">
										<div class="product-img">
										<img src="../<?php echo $a["photo"] ?>">
										</div>
										<div class="product-info">
											<p class="product-title"><?php echo $a["user_name"] ?>
											<span class="label label-warning pull-right"><i class="fa fa-inr"></i><?php echo " ".$a["starting_bid"] ?></span>
										</p>
										<span class="product-description">
											<?php echo $a["website_topic"] ?>
										</span>
										</div>
									</li>
								<?php
									}
								}
							}
						}
						else
						{ ?>
							<li class="item">
								<div class="product-info">
									<h3>No Product Available</h3>
								</div>
							</li>
						<?php
						}
						?>
						<!-- /.item -->
						</ul>
					</div>
					<!-- /.box-body -->
					<div class="box-footer text-center">
						<a href="javascript:void(0)" class="uppercase">View All Products</a>
					</div>
					<!-- /.box-footer -->
					</div>
			</div>
		<!-- /.row -->
		</div>
	</section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
  <!-- footer section -->
  
  	<?php include("includes/footer.php");  ?>
  
  <!-- footer over -->

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
