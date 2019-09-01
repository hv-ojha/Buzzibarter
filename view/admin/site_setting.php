<?php
require_once("includes/session.php");
include_once('../../controller/controller.php');
$ob = new controller;
$res = $ob->site_select();
if(isset($_REQUEST["upd_site"]))
{
    $id =  $_REQUEST["upd"];
    $ob->site_update($id);
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
        Site Setting
      </h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="breadcrumb-item active">Site Setting</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Records</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
        <table id="example" class="table table-bordered table-hover display nowrap margin-top-10 table-responsive">
            <thead>
                <tr>
                    <th>Field</th>
                    <th>Value</th>
                    <th>Update</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while($row = mysql_fetch_array($res))
                {
                    if(isset($_REQUEST["upd"]) && ($_REQUEST["upd"]==$row["field_id"]))
                    {
                ?>
                <tr>
                    <form method="post">
                    <td><?php echo $row["field"]; ?></td>
                    <td><input type="text" name="field_name" id="" class="form-control" value="<?php echo $row["value"] ?>"></td>
                    <td><input type="submit" value="Update" name="upd_site" class="btn btn-lg btn-light">
                        <a href="site_setting.php">Cancel</a>
                    </td>
                    </form>
                </tr>
                <?php
                    }
                    else
                    {
                ?>
                <tr>
                    <td><?php echo $row["field"]; ?></td>
                    <td><?php echo $row["value"] ?></td>
                    <td><a href="site_setting.php?upd=<?php echo $row['field_id'] ?>"><span class="fa fa-2x fa-edit"></span></a></td>
                </tr>
                <?php
                    }
                }
                ?>
            </tbody>
		</table>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          Footer
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 
  <?php include_once("includes/footer.php") ?>

  <!-- Control Sidebar -->
  
  <!-- /.control-sidebar -->
  
  <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->


	<?php include_once("includes/scripts.php"); ?>

</body>
</html>
