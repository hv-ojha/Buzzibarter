<?php
require_once("includes/session.php");
include_once('../../controller/controller.php');
$obj = new controller;
$country_res = $obj->coun_select();
$country_res1 = $obj->coun_select();
if(isset($_POST["ins_city"]))
{
  $obj->city_insert();
}
elseif(isset($_REQUEST["upd_city"]))
{
  $id = $_REQUEST["upd"];
  $obj->city_update($id);
}
elseif(isset($_REQUEST["del"]))
{
  $id = $_REQUEST["del"];
  $obj->city_delete($id);
}
//$city_ct = "select country.country_name,state.state,city.* FROM city INNER JOIN country ON city.country_id=country.country_id INNER JOIN state ON city.state_id=state.state_id";
$city_rec = $obj->city_select();
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


  <script>
    function show(str)
    {
      xmlhttp=new XMLHttpRequest();
      xmlhttp.onreadystatechange=function()
	    {		
		    if (this.readyState==4 && this.status==200)
		    {
      		document.getElementById("state").innerHTML=this.responseText;
    	  }
  	  }
      xmlhttp.open("POST","includes/ajax.php?q="+str,true);
      xmlhttp.send();
    }
    function show_upd(str)
    {
      xmlhttp=new XMLHttpRequest();
      xmlhttp.onreadystatechange=function()
	    {		
		    if (this.readyState==4 && this.status==200)
		    {
      		document.getElementById("state_name").innerHTML=this.responseText;
    	  }
  	  }
      xmlhttp.open("POST","includes/ajax.php?qq="+str,true);
      xmlhttp.send();
    }
  </script>
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
        City
      </h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="breadcrumb-item">Location</li>
        <li class="breadcrumb-item active">City</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Category Insert box -->
      <div class="box">
        <div class="box-header with-border">
			<h3 class="box-title">Add City</h3>
        </div>
        <div class="box-body">
          <form method="post" class="form-group-lg">
           <div class="row">
            <div class="col-12">
            	<div class="form-group row">
				  <div class="col-sm-12">
					<select name="con_name" required class="form-control" onChange="show(this.value)">
						<option value="">Select Country</option>
						<?php
							while($con_row = mysql_fetch_array($country_res))
							{ ?>
							<option value="<?php echo $con_row['country_id']; ?>"><?php echo $con_row['country_name']; ?></option>
						<?php
							}
						?>
					</select>
				  </div>
				</div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
            	<div class="form-group row">
				        <div class="col-sm-12">
					        <select name="state_name" id="state" required class="form-control">
                    <option value="0">Select State</option>
					        </select>
				        </div>
				      </div>
            </div>
          </div>
           <div class="row">
            <div class="col-12">
            	<div class="form-group row">
				  <div class="col-sm-12">
					<input class="form-control" type="text" name="city_name" placeholder="City Name">
				  </div>
				</div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
            	<div class="form-group row">
				  <div class="col-sm-12">
					<input class="btn btn-lg btn-block btn-rounded btn-light" type="submit" name="ins_city" value="Insert">
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
              <h3 class="box-title">City</h3>
              <h6 class="box-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example" class="table table-bordered table-hover display nowrap margin-top-10 table-responsive">
				<thead>
					<tr>
						<th>City ID</th>
						<th>City Name</th>
						<th>State</th>
						<th>Country</th>
            <th>Operations</th>
					</tr>
				 </thead>
				 <tbody>
         <?php
          while($res = mysql_fetch_array($city_rec))
          {
            if(isset($_REQUEST["upd"]) && ($res["city_id"]==$_REQUEST["upd"]))
            { ?>
              <tr><form method="post">
                <td><?php echo $res["city_id"]; ?></td>
                <td><input type="text" name="city_name1" value="<?php echo $res["city"]; ?>"></td>
                <td>
                  <select name="state_name" id="state_name">
                  <option selected value="<?php echo $res["state_id"]; ?>"><?php echo $res["state"]; ?></option>
                  </select>
                </td>
                <td>
                  <select name="con_name" id="" onChange="show_upd(this.value)">
                  <?php
                    while($con = mysql_fetch_array($country_res1))
                    {
                      if($con["country_id"]==$res["country_id"])
                      { ?>
                        <option selected value="<?php echo $con["country_id"]; ?>"><?php echo $con["country_name"]; ?></option>
                  <?php
                      }
                      else
                      {
                  ?>
                        <option value="<?php echo $con["country_id"]; ?>"><?php echo $con["country_name"]; ?></option>
                  <?php
                      }
                    }
                  ?>
                  </select>
                </td>
                <td>
                  <input type="submit" name="upd_city" value="Update" class="btn btn-light btn-lg">
					        <a href="city.php">Cancel</a>
                </td></form>
              </tr>
            <?php
            }
            else
            {
         ?>
              <tr>
                <td><?php echo $res['city_id']; ?></td>
                <td><?php echo $res['city']; ?></td>
                <td><?php echo $res['state']; ?></td>
                <td><?php echo $res['country_name']; ?></td>
                <td>
                  <a href="city.php?upd=<?php echo $res['city_id'] ?>"><span class="fa fa-2x fa-edit"></span></a>&nbsp;&nbsp;&nbsp;&nbsp;
				          <a href="city.php?del=<?php echo $res['city_id'] ?>"><span class="fa fa-2x fa-trash"></span></a>
                </td>
              </tr>
          <?php
            }
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
