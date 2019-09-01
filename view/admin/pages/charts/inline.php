<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../images/favicon.ico">

    <title>Apro Admin - Dashboard  Inline Chart </title>
  
	<!-- Bootstrap 4.0-->
	<link rel="stylesheet" href="../../assets/vendor_components/bootstrap/dist/css/bootstrap.min.css">
	
	<!-- Bootstrap 4.0-->
	<link rel="stylesheet" href="../../assets/vendor_components/bootstrap/dist/css/bootstrap-extend.css">

	<!-- Font Awesome -->
	<link rel="stylesheet" href="../../assets/vendor_components/font-awesome/css/font-awesome.min.css">

	<!-- Ionicons -->
	<link rel="stylesheet" href="../../assets/vendor_components/Ionicons/css/ionicons.min.css">

	<!-- Theme style -->
	<link rel="stylesheet" href="../../css/master_style.css">

	<!-- apro_admin Skins. Choose a skin from the css/skins
	   folder instead of downloading all of them to reduce the load. -->
	<link rel="stylesheet" href="../../css/skins/_all-skins.css">

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

<!-- Header -->
 	<?php include("../include/header.php"); ?>
  
  <!-- Left side column. contains the logo and sidebar -->
  <?php include("../include/sidemenu.php"); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Inline Charts
      </h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="breadcrumb-item"><a href="#">Charts</a></li>
        <li class="breadcrumb-item active">Inline Charts</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- row -->
      <div class="row">
        <div class="col-12">
          <div class="box box-solid">
            <div class="box-header">
              <i class="fa fa-pie-chart"></i>

              <h3 class="box-title">jQuery Knob Tron Style</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-default btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-default btn-sm" data-widget="remove"><i class="fa fa-times"></i>
                </button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-12 col-md-6 col-lg-3 text-center">
                  <input type="text" class="knob" value="90" data-skin="tron" data-thickness="0.1" data-width="90" data-height="90" data-fgColor="#33cabb" data-readonly="true">

                  <div class="knob-label">data-width="90"</div>
                </div>
                <!-- ./col -->
                <div class="col-12 col-md-6 col-lg-3 text-center">
                  <input type="text" class="knob" value="75" data-skin="tron" data-thickness="0.1" data-width="100" data-height="100" data-fgColor="#f96868">

                  <div class="knob-label">data-width="110"</div>
                </div>
                <!-- ./col -->
                <div class="col-12 col-md-6 col-lg-3 text-center">
                  <input type="text" class="knob" value="25" data-skin="tron" data-thickness="0.1" data-width="100" data-height="100" data-fgColor="#46be8a">

                  <div class="knob-label">data-thickness="0.1"</div>
                </div>
                <!-- ./col -->
                <div class="col-12 col-md-6 col-lg-3 text-center">
                  <input type="text" class="knob" value="100" data-skin="tron" data-thickness="0.2" data-angleArc="250" data-angleOffset="-125" data-width="100" data-height="100" data-fgColor="#926dde">

                  <div class="knob-label">data-angleArc="250"</div>
                </div>
                <!-- ./col -->
              </div>
              <!-- /.row -->
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>      
      <!-- /.row -->

      <div class="row">
        <div class="col-12">
          <div class="box box-solid">
            <div class="box-header">
              <i class="fa fa-pie-chart"></i>

              <h3 class="box-title">jQuery Knob Different Sizes</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-default btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-default btn-sm" data-widget="remove"><i class="fa fa-times"></i>
                </button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-12 col-md-6 col-lg-3 text-center">
                  <input type="text" class="knob" value="40" data-thickness="0.2" data-width="100" data-height="100" data-fgColor="#33cabb" data-readonly="true">

                  <div class="knob-label">data-width="100"</div>
                </div>
                <!-- ./col -->
                <div class="col-12 col-md-6 col-lg-3 text-center">
                  <input type="text" class="knob" value="34" data-thickness="0.2" data-width="120" data-height="120" data-fgColor="#926dde">

                  <div class="knob-label">data-width="120"</div>
                </div>
                <!-- ./col -->
                <div class="col-12 col-md-6 col-lg-3 text-center">
                  <input type="text" class="knob" value="30" data-thickness="0.1" data-width="100" data-height="100" data-fgColor="#46be8a">

                  <div class="knob-label">data-thickness="0.1"</div>
                </div>
                <!-- ./col -->
                <div class="col-12 col-md-6 col-lg-3 text-center">
                  <input type="text" class="knob" data-thickness="0.2" data-angleArc="250" data-angleOffset="-125" value="45" data-width="90" data-height="90" data-fgColor="#f96868">

                  <div class="knob-label">data-angleArc="250"</div>
                </div>
                <!-- ./col -->
              </div>
              <!-- /.row -->
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">
        <div class="col-12">
          <!-- jQuery Knob -->
          <div class="box box-solid">
            <div class="box-header">
              <i class="fa fa-pie-chart"></i>

              <h3 class="box-title">jQuery Knob</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-default btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-default btn-sm" data-widget="remove"><i class="fa fa-times"></i>
                </button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-12 col-md-6 col-lg-3 text-center">
                  <input type="text" class="knob" value="45" data-width="100" data-height="100" data-fgColor="#009EFB">

                  <div class="knob-label">New Visitors</div>
                </div>
                <!-- ./col -->
                <div class="col-12 col-md-6 col-lg-3 text-center">
                  <input type="text" class="knob" value="61" data-width="100" data-height="100" data-fgColor="#f2a654">

                  <div class="knob-label">Bounce Rate</div>
                </div>
                <!-- ./col -->
                <div class="col-12 col-md-6 col-lg-3 text-center">
                  <input type="text" class="knob" value="-72" data-min="-150" data-max="150" data-width="100" data-height="100" data-fgColor="#46be8a">

                  <div class="knob-label">Server Load</div>
                </div>
                <!-- ./col -->
                <div class="col-12 col-md-6 col-lg-3 text-center">
                  <input type="text" class="knob" value="32" data-width="100" data-height="100" data-fgColor="#f96868">

                  <div class="knob-label">Disk Space</div>
                </div>
                <!-- ./col -->
              </div>
              <!-- /.row -->

              <div class="row">
                <div class="col-12 col-sm-6 text-center">
                  <input type="text" class="knob" value="52" data-thickness="0.2" data-width="100" data-height="100" data-fgColor="#926dde">

                  <div class="knob-label">Bandwidth</div>
                </div>
                <!-- ./col -->
                <div class="col-12 col-sm-6 text-center">
                  <input type="text" class="knob" value="84" data-thickness="0.2" data-width="100"  data-height="100" data-fgColor="#009EFB">

                  <div class="knob-label">CPU</div>
                </div>
                <!-- ./col -->
              </div>
              <!-- /.row -->
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- callout -->
      <div class="callout callout-info">
        <h4>The following was created using data tags</h4>

        <p>The following three inline (sparkline) chart have been initialized to read and interpret data tags</p>
      </div>
      <!-- /.callout -->

      <div class="row">
        <div class="col-lg-4 col-12">
          <div class="box box-solid">
            <div class="box-header">
              <i class="fa fa-pie-chart"></i>
              <h3 class="box-title text-danger">Sparkline Pie</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body text-center">
              <div id="sparkline5"></div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->

        <div class="col-lg-4 col-12">
          <div class="box box-solid">
            <div class="box-header">
              <i class="fa fa-line-chart"></i>
              <h3 class="box-title text-blue">Sparkline line</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body text-center">
              <div class="sparkline" data-type="line" data-spot-Radius="3" data-highlight-Spot-Color="#f2a654" data-highlight-Line-Color="#222" data-min-Spot-Color="#f96868" data-max-Spot-Color="#926dde" data-spot-Color="#33cabb" data-offset="90" data-width="100%" data-height="100px" data-line-Width="1" data-line-Color="#46be8a" data-fill-Color="rgba(57, 204, 204, 0.08)">
                7,3,2,5,4,8,6,4,2,8,7,9,4,5,3,4,5,9,7,5
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->

        <div class="col-lg-4 col-12">
          <div class="box box-solid">
            <div class="box-header">
              <i class="fa fa-bar-chart-o"></i>
              <h3 class="box-title text-warning">Sparkline Bar</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body text-center">
              <div class="sparkline" data-type="bar" data-width="100%" data-height="100px" data-bar-Width="5" data-bar-Spacing="10" data-bar-Color="#f96868">
                7,3,10,5,4,8,6,4,2,4,5,3,4,5
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">
        <div class="col-12">
          <div class="box box-solid">
            <div class="box-header">
              <h3 class="box-title">Sparkline examples</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-default btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-default btn-sm" data-widget="remove"><i class="fa fa-times"></i>
                </button>
              </div>
            </div>
            <!-- /.box-header -->
            <div id="myBody" class="box-body">
              <div class="row">
                <div class="col-12 col-sm-6">
                  <p>
                    Mouse speed <span id="mousespeed">Loading..</span>
                  </p>

                  <p>
                    Inline <span class="sparkline-1">4,5,3,4,5,9,7,5</span>
                    line graphs
                    <span class="sparkline-1">7,3,10,5,4,8,6,4,2,4,5,3,4,5</span>
                  </p>

                  <p>
                    Bar charts <span class="sparkbar">4,5,3,4,5,9,7,5</span>
                    negative values: <span class="sparkbar">-4,1,5,0,3,-2</span>
                    stacked: <span class="sparkbar">0:2,2:4,4:2,4:1</span>
                  </p>

                  <p>
                    Composite inline
                    <span id="compositeline">7,3,10,5,4,8,6,4,2,4,5,3,4,5</span>
                  </p>

                  <p>
                    Inline with normal range
                    <span id="normalline">7,3,10,5,4,8,6,4,2,4,5,3,4,5</span>
                  </p>

                  <p>
                    Composite bar
                    <span id="compositebar">4,5,3,4,5,9,7,5</span>
                  </p>

                  <p>
                    Discrete
                    <span class="discrete1">7,3,10,5,4,8,6,4,2,4,5,3,4,5</span><br>

                    Discrete with threshold
                    <span id="discrete2">4,5,3,4,5,9,7,5</span>
                  </p>

                  <p>
                    Bullet charts<br>
                    <span class="sparkbullet">4,11,1,9,7</span><br>
                    <span class="sparkbullet">8,7,12,9,10</span><br>
                    <span class="sparkbullet">10,1,14,8,5</span><br>
                  </p>
                </div>
                <!-- /.col -->
                <div class="col-12 col-sm-6">
                  <p>
                    Customize size and colours
                    <span id="linecustom">4,5,3,4,5,9,7,5</span>
                  </p>

                  <p>
                    Tristate charts
                    <span class="sparktristate">1,1,0,1,-1,-1,1,-1,0,0,1,1</span><br>
                    (think games won, lost or drawn)
                  </p>

                  <p>
                    Tristate chart using a colour map:
                    <span class="sparktristatecols">1,2,0,2,-1,-2,1,-2,0,0,1,1</span>
                  </p>

                  <p>
                    Box Plot: <span class="sparkboxplot">4,27,34,52,54,59,61,68,78,82,85,87,91,93,100</span><br>
                    Pre-computed box plot <span class="sparkboxplotraw">Loading..</span>
                  </p>

                  <p>
                    Pie charts
                    <span class="sparkpie">1,1,2</span>
                    <span class="sparkpie">1,5</span>
                    <span class="sparkpie">30,70,90</span>
                  </p>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
  <!-- Footer section -->
  
  <?php include("../include/footer.php"); ?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-light">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li class="nav-item"><a href="#control-sidebar-home-tab" data-toggle="tab">Home</a></li>
      <li class="nav-item"><a href="#control-sidebar-settings-tab" data-toggle="tab">Settings</a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Admin Birthday</h4>

                <p>Will be July 24th</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Jhone Updated His Profile</h4>

                <p>New Email : jhone_doe@demo.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Disha Joined Mailing List</h4>

                <p>disha@demo.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Code Change</h4>

                <p>Execution time 15 Days</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Web Design
                <span class="label label-danger pull-right">40%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 40%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Update Data
                <span class="label label-success pull-right">75%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 75%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Order Process
                <span class="label label-warning pull-right">89%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-warning" style="width: 89%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Development 
                <span class="label label-primary pull-right">72%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 72%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <input type="checkbox" id="report_panel" class="chk-col-grey" >
			<label for="report_panel" class="control-sidebar-subheading ">Report panel usage</label>

            <p>
              general settings information
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <input type="checkbox" id="allow_mail" class="chk-col-grey" >
			<label for="allow_mail" class="control-sidebar-subheading ">Mail redirect</label>

            <p>
              Other sets of options are available
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <input type="checkbox" id="expose_author" class="chk-col-grey" >
			<label for="expose_author" class="control-sidebar-subheading ">Expose author name</label>

            <p>
              Allow the user to show his name in blog posts
            </p>
          </div>
          <!-- /.form-group -->

          <h3 class="control-sidebar-heading">Chat Settings</h3>

          <div class="form-group">
            <input type="checkbox" id="show_me_online" class="chk-col-grey" >
			<label for="show_me_online" class="control-sidebar-subheading ">Show me as online</label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <input type="checkbox" id="off_notifications" class="chk-col-grey" >
			<label for="off_notifications" class="control-sidebar-subheading ">Turn off notifications</label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">              
              <a href="javascript:void(0)" class="text-red margin-r-5"><i class="fa fa-trash-o"></i></a>
              Delete chat history
            </label>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  
  <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

	<!-- jQuery 3 -->
	<script src="../../assets/vendor_components/jquery/dist/jquery.min.js"></script>
	
	<!-- popper -->
	<script src="../../assets/vendor_components/popper/dist/popper.min.js"></script>
	
	<!-- Bootstrap 4.0-->
	<script src="../../assets/vendor_components/bootstrap/dist/js/bootstrap.min.js"></script>
	
	<!-- SlimScroll -->
	<script src="../../assets/vendor_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	
	<!-- FastClick -->
	<script src="../../assets/vendor_components/fastclick/lib/fastclick.js"></script>
	
	<!-- apro_admin App -->
	<script src="../../js/template.js"></script>
	
	<!-- apro_admin for demo purposes -->
	<script src="../../js/demo.js"></script>
	
	<!-- jQuery Knob -->
	<script src="../../assets/vendor_components/jquery-knob/js/jquery.knob.js"></script>
	
	<!-- Sparkline -->
	<script src="../../assets/vendor_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
	
	<!-- apro_admin for inline Chart purposes -->
	<script src="../../js/pages/widget-inline-charts.js"></script>

</body>

<!-- Mirrored from html-templates.multipurposethemes.com/bootstrap-4/admin/aproadmin-dark/pages/charts/inline.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 22 Jan 2018 12:18:01 GMT -->
</html>
