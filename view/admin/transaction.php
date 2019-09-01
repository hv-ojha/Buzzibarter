<?php
require_once("includes/session.php");
include_once('../../controller/controller.php');
$ob = new controller;
$res1 = mysql_query("select * from transaction");
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
        Transactions
      </h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="breadcrumb-item"><a href="#">Transactions</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

    <!-- Default box -->
	<div class="row">
        <div class="col-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Transaction</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example" class="table table-bordered table-hover display nowrap margin-top-10 table-responsive">
				<thead>
					<tr>
						<th>Transaction No.</th>
						<th>From</th>
						<th>To</th>
						<th>Transaction Date</th>
						<th>Amount</th>
						<th>Description</th>
					</tr>
				</thead>
				<tbody>
				<?php
					while($row=mysql_fetch_array($res1))
					{
					?>
					<tr>
						<td><?php echo $row["transaction_id"] ?></td>
						<td><?php if($row["wallet_id"] != 0)
						{ $ur = $row["wallet_id"];
						$usb = mysql_query("select * from user INNER JOIN wallet ON wallet.user_id=user.user_id where wallet_id=$ur");
						$usr = mysql_fetch_array($usb);
						echo $usr["user_name"]; }
						else
						{
							echo "-";
						}
						?></td>
						<td><?php if($row["user_id"] != 0)
						{ $u = $row["user_id"];
						$us = mysql_query("select * from user where user_id=$u");
						$us_r = mysql_fetch_array($us);
						echo $us_r["user_name"]; }
						else
						{
							echo "-";
						}
						?></td>
						<td><?php echo $row["transaction_date"] ?></td>
						<td><?php echo $row["amount"] ?></td>
						<td><?php echo $row["description"] ?></td>
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
