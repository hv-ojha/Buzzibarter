<?php
require_once("includes/session.php");
include('../../controller/controller.php');
if(isset($_POST["ins_country"]))
{
  $ob = new controller;
	$ob->coun_insert();
}
elseif(isset($_POST["upd_country"]))
{
  $id = $_REQUEST["upd"];
  $ob = new controller;
  $ob->coun_update($id);
}
elseif(isset($_REQUEST["del"]))
{
  $ob = new controller;
  $ob->coun_delete();
}
$ob = new controller;
$country_rec = $ob->coun_select();

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
	<link rel="stylesheet" href="assets/vendor_components/bootstrap/dist/css/bootstrap.css">
	
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

  <?php  include("includes/header.php"); ?>

  <!-- Left side column. contains the sidebar -->
  <?php include("includes/sidemenu.php"); ?>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Country
      </h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="breadcrumb-item">Location</li>
        <li class="breadcrumb-item active">Country</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Category Insert box -->
      <div class="box">
        <div class="box-header with-border">
			<h3 class="box-title">Add Country</h3>
        </div>
        <div class="box-body">
         <form method="post" class="form-group-lg">
          <div class="row">
            <div class="col-12">
            	<div class="form-group row">
				  <div class="col-sm-12">
					<input class="form-control" type="text" name="country_name" placeholder="Country Name">
				  </div>
				</div>
            </div>
            <!-- /.col -->
          </div>
          <div class="row">
            <div class="col-12">
            	<div class="form-group row">
				  <div class="col-sm-12">
					<input class="btn btn-lg btn-block btn-rounded btn-light" type="submit" name="ins_country" value="Insert">
				  </div>
				</div>
            </div>
            <!-- /.col -->
          </div>
          </form>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
      
      <!-- Category Table -->
      	<div class="row">
        <div class="col-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Hover Export Data Table</h3>
              <h6 class="box-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example" class="table table-bordered table-hover display nowrap margin-top-10 table-responsive">
				<thead>
					<tr>
            <th>Country ID</th>
						<th>Country Name</th>
            <th>Operation</th>
					</tr>
				</thead>
				<tbody>
          <?php
		        while($coun_dis=mysql_fetch_array($country_rec))
		        {
			         if(isset($_REQUEST['upd']) && ($_REQUEST['upd']==$coun_dis['country_id']))
			         {
				      ?>
				      <tr>
              <form method="POST">
                <td><?php echo $coun_dis['country_id']; ?></td>
                <td>
                  <input type="text" class="form-control" name="con_name" value="<?php echo $coun_dis['country_name'] ?>">
                </td>
				        <td>
                  <input type="submit" value="Update" name="upd_country" class="btn btn-light btn-lg">
					        <a href="country.php">Cancel</a> </td>
              </form>
              </tr>
		            <?php } 
			          else
			          { ?>
		              <tr>
                  <td><?php echo $coun_dis['country_id']; ?></td>
			              <td>
				              <?php echo $coun_dis['country_name']; ?>
			              </td>
			              <td>
				              <a href="country.php?upd=<?php echo $coun_dis['country_id'] ?>"><span class="fa fa-2x fa-edit"></span></a>&nbsp;&nbsp;&nbsp;&nbsp;
				              <a href="country.php?del=<?php echo $coun_dis['country_id'] ?>"><span class="fa fa-2x fa-trash"></span></a>
			              </td>
		              </tr>
	              <?php }
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
 
  <?php include("includes/footer.php"); ?>

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
