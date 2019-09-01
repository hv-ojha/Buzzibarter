<?php
require_once("includes/session.php");
include('../../controller/controller.php');
if(isset($_REQUEST["user_id"]))
{
    $id1 = $_REQUEST["user_id"];
    $user_details = mysql_query("select * from user where user_id=$id1");
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

    <title>Apro Admin - Dashboard  Profile </title>
  
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
<div class="wrapper">

<!-- Header Section -->
  
  <?php include("includes/header.php"); ?>
   
    <!-- Logo -->
    <?php include("includes/sidemenu.php"); ?>
    <!-- Header Navbar: style can be found in header.less -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <?php
    if(isset($_REQUEST["user_id"]))
    {
        $user_row=mysql_fetch_array($user_details);
    ?>
    <section class="content-header">
      <h1>
        User Profile
      </h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="breadcrumb-item active">User profile</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-xl-4 col-lg-5">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img rounded-circle img-fluid mx-auto d-block" src="../<?php echo $user_row["photo"] ?>" alt="User profile picture">

              <h3 class="profile-username text-center"><?php echo $user_row["user_name"] ?></h3>
				
              <div class="row social-states">
				  <div class="col-6 text-right"><a href="#" class="link"><i class="ion ion-ios-people-outline"></i> 254</a></div>
				  <div class="col-6 text-left"><a href="#" class="link"><i class="ion ion-images"></i> 54</a></div>
			  </div>
            
              <div class="row">
              	<div class="col-12">
              		<div class="profile-user-info">
						<p>Email address </p>
						<h6 class="margin-bottom">jhone.mical@yahoo.com</h6>
						<p>Phone</p>
						<h6 class="margin-bottom">+11 123 456 7890</h6> 
						<p>Address</p>
						<h6 class="margin-bottom">123, Lorem Ipsum, Florida, USA</h6>
						<div class="map-box">
							<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2805244.1745767146!2d-86.32675167439648!3d29.383165774894163!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x88c1766591562abf%3A0xf72e13d35bc74ed0!2sFlorida%2C+USA!5e0!3m2!1sen!2sin!4v1501665415329" style="border:0" allowfullscreen></iframe>
						</div>
						<p class="margin-bottom">Social Profile</p>
						<div class="user-social-acount">
							<button class="btn btn-circle btn-social-icon btn-facebook"><i class="fa fa-facebook"></i></button>
							<button class="btn btn-circle btn-social-icon btn-twitter"><i class="fa fa-twitter"></i></button>
							<button class="btn btn-circle btn-social-icon btn-instagram"><i class="fa fa-instagram"></i></button>
						</div>
					</div>
             	</div>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-xl-8 col-lg-7">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              
              <li><a class="active" href="#timeline" data-toggle="tab">Timeline</a></li>
              <li><a href="#activity" data-toggle="tab">Activity</a></li>
              <li><a href="#settings" data-toggle="tab">Settings</a></li>
            </ul>
                        
            <div class="tab-content">
             
             <div class="active tab-pane" id="timeline">
                <!-- The timeline -->
                <ul class="timeline">
					<!-- timeline time label -->
					<li class="time-label">
						  <span class="bg-green">
							15 Jan. 2017
						  </span>
					</li>
					<!-- /.timeline-label -->
					<!-- timeline item -->
					<li>
					  <i class="ion ion-email bg-blue"></i>

					  <div class="timeline-item">
						<span class="time"><i class="fa fa-clock-o"></i> 11:48</span>

						<h3 class="timeline-header"><a href="#">Genelia</a> sent you an email</h3>

						<div class="timeline-body">
						  Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. ...
						</div>
						<div class="timeline-footer text-right">
						  <a href="#" class="btn btn-primary btn-sm">Read more</a>
						  <a href="#" class="btn btn-danger btn-sm">Delete</a>
						</div>
					  </div>
					</li>
					<!-- END timeline item -->
					<!-- timeline item -->
					<li>
					  <i class="ion ion-person bg-aqua"></i>

					  <div class="timeline-item">
						<span class="time"><i class="fa fa-clock-o"></i> 11 mins ago</span>

						<h3 class="timeline-header no-border"><a href="#">Ritesh Deshmukh</a> accepted your friend request</h3>
					  </div>
					</li>
					<!-- END timeline item -->
					<!-- timeline item -->
					<li>
					  <i class="ion ion-chatbubble-working bg-purple"></i>

					  <div class="timeline-item">
						<span class="time"><i class="fa fa-clock-o"></i> 55 mins ago</span>

						<h3 class="timeline-header"><a href="#">Jone Doe</a> commented on your post</h3>

						<div class="timeline-body">
						  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus numquam facilis enim eaque, tenetur nam id qui vel velit similique nihil iure molestias aliquam, voluptatem totam quaerat, magni commodi quisquam.
						</div>
						<div class="timeline-footer text-right">
						  <a class="btn bg-purple btn-flat btn-sm">View comment</a>
						</div>
					  </div>
					</li>
					<!-- END timeline item -->
					<!-- timeline time label -->
					<li class="time-label">
						  <span class="bg-green">
							15 Nov. 2016
						  </span>
					</li>
					<!-- /.timeline-label -->
					<!-- timeline item -->
					<li>
					  <i class="ion ion-ios-reverse-camera bg-green"></i>

					  <div class="timeline-item">
						<span class="time"><i class="fa fa-clock-o"></i> 8 days ago</span>

						<h3 class="timeline-header"><a href="#">Rakesh Kumar</a> uploaded new photos</h3>

						<div class="timeline-body">
						  <img src="images/150x100.png" alt="..." class="margin">
						  <img src="images/150x100.png" alt="..." class="margin">
						  <img src="images/150x100.png" alt="..." class="margin">
						  <img src="images/150x100.png" alt="..." class="margin">
						</div>
					  </div>
					</li>
					<!-- END timeline item -->
					<!-- timeline item -->
					<li>
					  <i class="ion ion-ios-videocam bg-green"></i>

					  <div class="timeline-item">
						<span class="time"><i class="fa fa-clock-o"></i> 18 days ago</span>

						<h3 class="timeline-header"><a href="#">Ajay Varma</a> shared a video</h3>

						<div class="timeline-body">
						  <div class="embed-responsive embed-responsive-16by9">
							<iframe width="854" height="480" src="https://www.youtube.com/embed/k85mRPqvMbE" allowfullscreen></iframe>
						  </div>
						</div>
						<div class="timeline-footer text-right">
						  <a href="#" class="btn btn-sm bg-purple">See comments</a>
						</div>
					  </div>
					</li>
					<!-- END timeline item -->
					<li>
					  <i class="fa fa-clock-o bg-gray"></i>
					</li>
				  </ul>
              </div>    
              <!-- /.tab-pane -->
              
              <div class="tab-pane" id="activity">
                <!-- Post -->
                <div class="post">
                  <div class="user-block">
                    <img class="img-bordered-sm rounded-circle" src="images/user1-128x128.jpg" alt="user image">
                        <span class="username">
                          <a href="#">John Doe</a>
                          <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                        </span>
                    <span class="description">5 minutes ago</span>
                  </div>
                  <!-- /.user-block -->
                  <div class="activitytimeline">
					  <p>
						Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum.
					  </p>
					  <ul class="list-inline">
						<li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Share</a></li>
						<li><a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> Like</a>
						</li>
						<li class="pull-right">
						  <a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comments
							(5)</a></li>
					  </ul>
					  <form class="form-element">
						  <input class="form-control input-sm" type="text" placeholder="Type a comment">
					 </form>
                  </div>
                </div>
                <!-- /.post -->
                
                <!-- Post -->
                <div class="post">
                  <div class="user-block">
                    <img class="img-bordered-sm rounded-circle" src="images/user6-128x128.jpg" alt="user image">
                        <span class="username">
                          <a href="#">John Doe</a>
                          <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                        </span>
                    <span class="description">5 minutes ago</span>
                  </div>
                  <!-- /.user-block -->
                  <div class="activitytimeline">
					  <div class="row margin-bottom">
						<div class="col-sm-6">
						  <img class="img-fluid" src="images/photo1.png" alt="Photo">
						</div>
						<!-- /.col -->
						<div class="col-sm-6">
						  <div class="row">
							<div class="col-sm-6">
							  <img class="img-fluid" src="images/photo2.png" alt="Photo">
							  <br><br>
							  <img class="img-fluid" src="images/photo3.jpg" alt="Photo">
							</div>
							<!-- /.col -->
							<div class="col-sm-6">
							  <img class="img-fluid" src="images/photo4.jpg" alt="Photo">
							  <br><br>
							  <img class="img-fluid" src="images/photo1.png" alt="Photo">
							</div>
							<!-- /.col -->
						  </div>
						  <!-- /.row -->
						</div>
						<!-- /.col -->
					  </div>
					  <!-- /.row -->

					  <ul class="list-inline">
						<li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Share</a></li>
						<li><a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> Like</a>
						</li>
						<li class="pull-right">
						  <a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comments
							(5)</a></li>
					  </ul>

					  <form class="form-element">
						  <input class="form-control input-sm" type="text" placeholder="Type a comment">
					 </form>
					</div>
				</div>
                <!-- /.post -->

                <!-- Post -->
                <div class="post clearfix">
                  <div class="user-block">
                    <img class="img-bordered-sm rounded-circle" src="images/user7-128x128.jpg" alt="user image">
                        <span class="username">
                          <a href="#">John Doe</a>
                          <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                        </span>
                    <span class="description">5 minutes ago</span>
                  </div>
                  <!-- /.user-block -->
                    <div class="activitytimeline">
					  <p>
						Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum.
					  </p>

					  <form class="form-horizontal form-element">
						<div class="form-group row no-gutters">
						  <div class="col-sm-9">
							<input class="form-control input-sm" placeholder="Response">
						  </div>
						  <div class="col-sm-3">
							<button type="submit" class="btn btn-danger pull-right btn-block btn-sm">Send</button>
						  </div>
						</div>
					  </form>
					</div>
                </div>
                <!-- /.post -->
                
              </div>
              <!-- /.tab-pane -->
              
              <div class="tab-pane" id="settings">
                <form class="form-horizontal form-element col-12">
                  <div class="form-group row">
                    <label for="inputName" class="col-sm-2 control-label">Name</label>

                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="inputName" placeholder="">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="inputEmail" placeholder="">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPhone" class="col-sm-2 control-label">Phone</label>

                    <div class="col-sm-10">
                      <input type="tel" class="form-control" id="inputPhone" placeholder="">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputExperience" class="col-sm-2 control-label">Experience</label>

                    <div class="col-sm-10">
                      <textarea class="form-control" id="inputExperience" placeholder=""></textarea>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputSkills" class="col-sm-2 control-label">Skills</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputSkills" placeholder="">
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="ml-auto col-sm-10">
                      <div class="checkbox">
                       	<input type="checkbox" id="basic_checkbox_1" checked="">
						<label for="basic_checkbox_1"> I agree to the</label>
                          &nbsp;&nbsp;&nbsp;&nbsp;<a href="#">Terms and Conditions</a>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="ml-auto col-sm-10">
                      <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
    <?php
    }
    ?>
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
	
	
</body>

<!-- Mirrored from html-templates.multipurposethemes.com/bootstrap-4/admin/aproadmin-dark/pages/examples/profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 22 Jan 2018 12:23:27 GMT -->
</html>
