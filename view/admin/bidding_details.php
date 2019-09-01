<?php
require_once("includes/session.php");
include_once('../../controller/controller.php');
$ob=new controller;
if(isset($_REQUEST["web_id"]))
{
	$id = $_REQUEST["web_id"];
	$res1 = $ob->bid_details($id);
	$high = $ob->bid_details($id);
	$am = mysql_fetch_array($high);
}
elseif(isset($_REQUEST["dom_id"]))
{
	$id = $_REQUEST["dom_id"];
	$res1 = $ob->bid_details_dom($id);
	$high = $ob->bid_details_dom($id);
	$am = mysql_fetch_array($high);
}
elseif(isset($_REQUEST["app_id"]))
{
	$id = $_REQUEST["app_id"];
	$res1 = $ob->bid_details_app($id);
	$high = $ob->bid_details_app($id);
	$am = mysql_fetch_array($high);
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
        <?php echo $_REQUEST["name"] ?>
      </h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="breadcrumb-item"><a href="#">Examples</a></li>
        <li class="breadcrumb-item active">Blank page</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
		<div class="box">
        <div class="box-header with-border">
          <h3 class="text-center">Highest Bid: </h3>
		  <h3><center><?php echo $am["amount"]; ?></center></h3>
        </div>
        <div class="box-body" style="overflow-x:auto">
			<table id="example" class="table table-bordered table-hover display nowrap margin-top-10 table-responsive">
				<thead>
					<tr>
						<th>Serial No.</th>
						<th>User name</th>
						<th>Bid Amount</th>
						<th>Bidding Date</th>
						<th>Modification Date</th>
						<th>Status</th>
					</tr>
				</thead>
				<tbody>
				<?php
				$i = 1;
				while($row = mysql_fetch_array($res1))
				{
					$us = $row["user_id"];
					$list = $row["listing_id"];
					$sel = "select * from winner where user_id=$us and listing_id=$list";
					$q = mysql_query($sel);
					if(mysql_num_rows($q)==0)
					{
						$f = false;
					}
					else
					{
						$f = true;
					}
				?>
					<tr>
						<td><?php echo $i; ?></td>
						<td><?php echo $row["user_name"]; ?></td>
						<td><?php echo $row["amount"]; ?></td>
						<td><?php echo $row["created_date"]; ?></td>
						<td><?php echo $row["modified_date"]; ?></td>
						<td><?php if($f==true) { echo "Winner"; } else { echo $row["status"]; } ?></td>
					</tr>
				<?php
				$i++;
				}
				?>
				</tbody>
			</table>
        </div>
        <!-- /.box-body -->
        <!-- /.box-footer-->
      </div>
      
	  <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 
  <footer class="main-footer">
    <div class="pull-right d-none d-sm-inline-block">
      <b>Version</b> 1.1
    </div>Copyright &copy; 2017 <a href="https://www.multipurposethemes.com/">Multi-Purpose Themes</a>. All Rights Reserved.
  </footer>
  
  <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->


	<?php include("includes/scripts.php") ?>

</body>
</html>
