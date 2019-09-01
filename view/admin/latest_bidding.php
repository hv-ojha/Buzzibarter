<?php
require_once("includes/session.php");
include_once('../../controller/controller.php');
$ob = new controller;
$res1 = $ob->run_bid();
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

    <title>Apro Admin - Dashboard  Blank Page </title>
  
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
        Latest Biddings
      </h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="breadcrumb-item"><a href="#">Biddings</a></li>
        <li class="breadcrumb-item active">Running</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

    <!-- Default box -->
	<div class="row">
        <div class="col-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Latest Biddings</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example" class="table table-bordered table-hover display nowrap margin-top-10 table-responsive">
				<thead>
					<tr>
						<th>Bidding ID</th>
						<th>Website Topic</th>
						<th>User Name</th>
						<th>Amount</th>
						<th>Created Date</th>
						<th>Modified Date</th>
						<th>Status</th>
					</tr>
				</thead>
				<tbody>
				<?php
					while($row = mysql_fetch_array($res1))
					{
				?>
					<tr>
						<td><?php echo $row["bid_id"]; ?></td>
						<?php
						if($row["listing_type"]=="Website")
						{
						?>
							<td><a href="web_details.php?web_id=<?php echo $row['pro_id'] ?>&type=<?php echo $row["listing_type"]; ?>"><?php echo $row["listing_type"]; ?></a></td>
						<?php
						}
						elseif($row["listing_type"]=="Domain_name")
						{
						?>
							<td><a href="web_details.php?dom_id=<?php echo $row['pro_id'] ?>"><?php echo $row["listing_type"]; ?></a></td>
						<?php
						}
						elseif($row["listing_type"]=="Application")
						{
						?>
							<td><a href="web_details.php?app_id=<?php echo $row['pro_id'] ?>"><?php echo $row["listing_type"]; ?></a></td>
						<?php
						}
						?>
						<td><a href="user_details.php?user_id=<?php echo $row['user_id'] ?>"><?php echo $row["user_name"]; ?></a></td>
						<td><?php echo $row["amount"]; ?></td>
						<td><?php echo $row["created_date"]; ?></td>
						<td><?php echo $row["modified_date"]; ?></td>
						<td><?php
						$bid_d = $row["bid_id"];
						$query = mysql_query("select * from bidding where bid_id=$bid_d");
						$ftch = mysql_fetch_array($query);
						echo $ftch["status"]; ?></td>
					</tr>
				<?php
					}
				?>
				</tbody>
			</table>              
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->          
        </div>
        <!-- /.col -->
      </div>
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
