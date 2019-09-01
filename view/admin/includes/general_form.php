<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="images/favicon.ico">

    <title>Apro Admin - Dashboard  General Form Elements </title>
  
	<!-- Bootstrap 4.0-->
	<link rel="stylesheet" href="assets/vendor_components/bootstrap/dist/css/bootstrap.min.css">
	
	<!-- Bootstrap 4.0-->
	<link rel="stylesheet" href="assets/vendor_components/bootstrap/dist/css/bootstrap-extend.css">

	<!-- Font Awesome -->
	<link rel="stylesheet" href="assets/vendor_components/font-awesome/css/font-awesome.min.css">

	<!-- Ionicons -->
	<link rel="stylesheet" href="../../assets/vendor_components/Ionicons/css/ionicons.min.css">
		
	<!-- Glyphicons -->
	<link rel="stylesheet" href="../../assets/vendor_components/glyphicons/glyphicon.css">
	
	<!-- daterange picker -->
	
	<link rel="stylesheet" href="../../assets/vendor_components/bootstrap-daterangepicker/daterangepicker.css">
	
	<!-- bootstrap datepicker -->	
	<link rel="stylesheet" href="../../assets/vendor_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
	
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
<div class="wrapper">

  <?php include("header.php"); ?>
  
  <!-- Left side column. contains the logo and sidebar -->
  <?php include("sidemenu.php"); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        General Form Elements
      </h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="breadcrumb-item"><a href="#">Forms</a></li>
        <li class="breadcrumb-item active">General Elements</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
     
     <!-- Basic Forms -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Default Basic Forms</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col-12">
            	<div class="form-group row">
				  <label for="example-text-input" class="col-sm-2 col-form-label">Text</label>
				  <div class="col-sm-10">
					<input class="form-control" type="text" value="Johen Doe" id="example-text-input">
				  </div>
				</div>
				<div class="form-group row">
				  <label for="example-search-input" class="col-sm-2 col-form-label">Search</label>
				  <div class="col-sm-10">
					<input class="form-control" type="search" value="How do I shoot web" id="example-search-input">
				  </div>
				</div>
				<div class="form-group row">
				  <label for="example-email-input" class="col-sm-2 col-form-label">Email</label>
				  <div class="col-sm-10">
					<input class="form-control" type="email" value="bootstrap@example.com" id="example-email-input">
				  </div>
				</div>
				<div class="form-group row">
				  <label for="example-url-input" class="col-sm-2 col-form-label">URL</label>
				  <div class="col-sm-10">
					<input class="form-control" type="url" value="https://getbootstrap.com" id="example-url-input">
				  </div>
				</div>
				<div class="form-group row">
				  <label for="example-tel-input" class="col-sm-2 col-form-label">Telephone</label>
				  <div class="col-sm-10">
					<input class="form-control" type="tel" value="1-(555)-555-5555" id="example-tel-input">
				  </div>
				</div>
				<div class="form-group row">
				  <label for="example-password-input" class="col-sm-2 col-form-label">Password</label>
				  <div class="col-sm-10">
					<input class="form-control" type="password" value="hunter2" id="example-password-input">
				  </div>
				</div>
				<div class="form-group row">
				  <label for="example-number-input" class="col-sm-2 col-form-label">Number</label>
				  <div class="col-sm-10">
					<input class="form-control" type="number" value="42" id="example-number-input">
				  </div>
				</div>
				<div class="form-group row">
				  <label for="example-datetime-local-input" class="col-sm-2 col-form-label">Date and time</label>
				  <div class="col-sm-10">
					<input class="form-control" type="datetime-local" value="2011-08-19T13:45:00" id="example-datetime-local-input">
				  </div>
				</div>
				<div class="form-group row">
				  <label for="example-date-input" class="col-sm-2 col-form-label">Date</label>
				  <div class="col-sm-10">
					<input class="form-control" type="date" value="2011-08-19" id="example-date-input">
				  </div>
				</div>
				<div class="form-group row">
				  <label for="example-month-input" class="col-sm-2 col-form-label">Month</label>
				  <div class="col-sm-10">
					<input class="form-control" type="month" value="2011-08" id="example-month-input">
				  </div>
				</div>
				<div class="form-group row">
				  <label for="example-week-input" class="col-sm-2 col-form-label">Week</label>
				  <div class="col-sm-10">
					<input class="form-control" type="week" value="2011-W33" id="example-week-input">
				  </div>
				</div>
				<div class="form-group row">
				  <label for="example-time-input" class="col-sm-2 col-form-label">Time</label>
				  <div class="col-sm-10">
					<input class="form-control" type="time" value="13:45:00" id="example-time-input">
				  </div>
				</div>
				<div class="form-group row">
				  <label for="example-color-input" class="col-sm-2 col-form-label">Color</label>
				  <div class="col-sm-10">
					<input class="form-control" type="color" value="#563d7c" id="example-color-input">
				  </div>
				</div>
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
          <div class="row">
        <div class="col-12">
          <div class="box box-solid">
            <div class="box-header with-border">
              <i class="fa fa-check-square-o text-black"></i>

              <h3 class="box-title">Basic Checkbox Design Colors with Filled In</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            
				<div class="demo-checkbox">
					<input id="md_checkbox_21" class="filled-in chk-col-red" checked="" type="checkbox">
					<label for="md_checkbox_21">Red</label>					
					<input id="md_checkbox_23" class="filled-in chk-col-purple" checked="" type="checkbox">
					<label for="md_checkbox_23">Purple</label>
					<input id="md_checkbox_24" class="filled-in chk-col-deep-purple" checked="" type="checkbox">
					<label for="md_checkbox_24">Deep Purple</label>					
					<input id="md_checkbox_26" class="filled-in chk-col-blue" checked="" type="checkbox">
					<label for="md_checkbox_26">Blue</label>
					<input id="md_checkbox_27" class="filled-in chk-col-light-blue" checked="" type="checkbox">
					<label for="md_checkbox_27">Light Blue</label>					
					<input id="md_checkbox_29" class="filled-in chk-col-teal" checked="" type="checkbox">
					<label for="md_checkbox_29">Teal</label>
					<input id="md_checkbox_30" class="filled-in chk-col-green" checked="" type="checkbox">
					<label for="md_checkbox_30">Green</label>
					<input id="md_checkbox_33" class="filled-in chk-col-yellow" checked="" type="checkbox">
					<label for="md_checkbox_33">Yellow</label>					
					<input id="md_checkbox_35" class="filled-in chk-col-orange" checked="" type="checkbox">
					<label for="md_checkbox_35">Orange</label>
					<input id="md_checkbox_36" class="filled-in chk-col-deep-orange" checked="" type="checkbox">
					<label for="md_checkbox_36">Deep Orange</label>
					<input id="md_checkbox_37" class="filled-in chk-col-maroon" checked="" type="checkbox">
					<label for="md_checkbox_37">Maroon</label>
					<input id="md_checkbox_38" class="filled-in chk-col-grey" checked="" type="checkbox">
					<label for="md_checkbox_38">Grey</label>
					<input id="md_checkbox_39" class="filled-in chk-col-navy" checked="" type="checkbox">
					<label for="md_checkbox_39">Navy</label>
					<input id="md_checkbox_40" class="filled-in chk-col-black" checked="" type="checkbox">
					<label for="md_checkbox_40">Black</label>
				</div>
            
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- ./col -->
      </div>
       <div class="row">
        <div class="col-12">
          <div class="box box-solid">
            <div class="box-header with-border">
              <i class="fa fa-check-circle-o text-black"></i>

              <h3 class="box-title">Basic Radio Button Design Colors with Outline</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            
				<div class="demo-radio-button">
					<input name="group5" id="radio_30" class="with-gap radio-col-red" checked="" type="radio">
					<label for="radio_30">Red</label>					
					<input name="group5" id="radio_32" class="with-gap radio-col-purple" type="radio">
					<label for="radio_32">Purple</label>
					<input name="group5" id="radio_33" class="with-gap radio-col-deep-purple" type="radio">
					<label for="radio_33">Deep Purple</label>
					<input name="group5" id="radio_35" class="with-gap radio-col-blue" type="radio">
					<label for="radio_35">Blue</label>
					<input name="group5" id="radio_36" class="with-gap radio-col-light-blue" type="radio">
					<label for="radio_36">LIight Blue</label>
					<input name="group5" id="radio_38" class="with-gap radio-col-teal" type="radio">
					<label for="radio_38">Teal</label>
					<input name="group5" id="radio_39" class="with-gap radio-col-green" type="radio">
					<label for="radio_39">Green</label>
					<input name="group5" id="radio_42" class="with-gap radio-col-yellow" type="radio">
					<label for="radio_42">Yellow</label>
					<input name="group5" id="radio_44" class="with-gap radio-col-orange" type="radio">
					<label for="radio_44">Orange</label>
					<input name="group5" id="radio_45" class="with-gap radio-col-deep-orange" type="radio">
					<label for="radio_45">Deep Orange</label>
					<input name="group5" id="radio_46" class="with-gap radio-col-maroon" type="radio">
					<label for="radio_46">Maroon</label>
					<input name="group5" id="radio_47" class="with-gap radio-col-grey" type="radio">
					<label for="radio_47">Grey</label>
					<input name="group5" id="radio_48" class="with-gap radio-col-navy" type="radio">
					<label for="radio_48">Navy</label>
					<input name="group5" id="radio_49" class="with-gap radio-col-black" type="radio">
					<label for="radio_49">Black</label>
				</div>
            
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- ./col -->
      </div>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
      <div class="row">
      	<div class="col-lg-6 col-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Date picker</h3>
            </div>
            <div class="box-body">
              <!-- Date -->
              <div class="form-group">
                <label>Date:</label>

                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input class="form-control pull-right" id="datepicker" type="text">
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->

              <!-- Date range -->
              <div class="form-group">
                <label>Date range:</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input class="form-control pull-right" id="reservation" type="text">
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->

              <!-- Date and time range -->
              <div class="form-group">
                <label>Date and time range:</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-clock-o"></i>
                  </div>
                  <input class="form-control pull-right" id="reservationtime" type="text">
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->

              <!-- Date and time range -->
              <div class="form-group">
                <label>Date range button:</label>

                <div class="input-group">
                  <button type="button" class="btn btn-default pull-right" id="daterange-btn">
                    <span>
                      <i class="fa fa-calendar"></i> Date range picker
                    </span>
                    <i class="fa fa-caret-down"></i>
                  </button>
                </div>
              </div>
              <!-- /.form group -->

            </div>
            <!-- /.box-body -->
			</div>
          <!-- /.box -->
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
<!-- Footer section -->
  <?php include("footer.php"); ?>


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
	<script src="assets/vendor_components/jquery/dist/jquery.min.js"></script>
	
	<!-- popper -->
	<script src="assets/vendor_components/popper/dist/popper.min.js"></script>
	
	<!-- Bootstrap 4.0-->
	<script src="assets/vendor_components/bootstrap/dist/js/bootstrap.min.js"></script>
	
	<!-- SlimScroll -->
	<script src="assets/vendor_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	
	<!-- FastClick -->
	<script src="assets/vendor_components/fastclick/lib/fastclick.js"></script>
	
	<!-- apro_admin App -->
	<script src="js/template.js"></script>
	
	<!-- apro_admin for demo purposes -->
	<script src="js/demo.js"></script>
	
	<!-- jQuery 3 -->
	<script src="assets/vendor_components/jquery/dist/jquery.min.js"></script>
	
	<!-- popper -->
	<script src="assets/vendor_components/popper/dist/popper.min.js"></script>
	
	<!-- Bootstrap 4.0-->
	<script src="assets/vendor_components/bootstrap/dist/js/bootstrap.min.js"></script>
	
	<!-- Select2 -->
	<script src="assets/vendor_components/select2/dist/js/select2.full.js"></script>
	
	<!-- InputMask -->
	<script src="assets/vendor_plugins/input-mask/jquery.inputmask.js"></script>
	<script src="assets/vendor_plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
	<script src="assets/vendor_plugins/input-mask/jquery.inputmask.extensions.js"></script>
	
	<!-- date-range-picker -->
	<script src="assets/vendor_components/moment/min/moment.min.js"></script>
	<script src="assets/vendor_components/bootstrap-daterangepicker/daterangepicker.js"></script>
	
	<!-- bootstrap datepicker -->
	<script src="assets/vendor_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
	
	<!-- bootstrap color picker -->
	<script src="assets/vendor_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
	
	<!-- bootstrap time picker -->
	<script src="assets/vendor_plugins/timepicker/bootstrap-timepicker.min.js"></script>
	
	<!-- SlimScroll -->
	<script src="assets/vendor_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	
	<!-- iCheck 1.0.1 -->
	<script src="assets/vendor_plugins/iCheck/icheck.min.js"></script>
	
	<!-- FastClick -->
	<script src="assets/vendor_components/fastclick/lib/fastclick.js"></script>
	
	<!-- apro_admin App -->
	<script src="js/template.js"></script>
	
	<!-- apro_admin for demo purposes -->
	<script src="js/demo.js"></script>
	
	<!-- apro_admin for advanced form element -->
	<script src="js/pages/advanced-form-element.js"></script>
	
</body>


</html>
