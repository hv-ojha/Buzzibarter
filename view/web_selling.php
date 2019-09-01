<?php
session_start();
include_once("includes/session.php");
include_once("../controller/controller_cl.php");
$ob = new controller_cl;
$cat = $ob->cat_select();
$cat_err = $name_err = $top_err = $des_err = $bid_err = $dt_err = $key_err = "";
$name = $top = $des = $bid = $dt = $key = "";
if(isset($_REQUEST['web_upd']))
{
	$f=0;
    if(empty($_REQUEST['dom_cat']))
    {
        $cat_err = "select category first";
        $f++;
    }
    else
    {
        $f=0;
    }
    if(is_numeric($_REQUEST["web_top"])==1)
    {
        $top_err = "Application Topic must be String";
        $f++;
    }
    else
    {
        $top = $_REQUEST["web_top"];
        $f=0;
    }
    if(is_numeric($_REQUEST["web_bid"])==1)
    {
        $bid = $_REQUEST["web_bid"];
        $f=0;
    }
    else
    {
        $bid_err = "Bid Must be in Numeric Format";
        $f++;
    }
    if($f==0)
    {
        $ob->website_upload();
    }
}
?>
<!doctype html>
<html>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>

    <!--meta tags-->

    <meta charset="UTF-8">
    <meta name="description" content="Services Listing HTML5 CSS3 template">
    <meta name="keywords" content="HTML,CSS,XML,JavaScript, services, listing">
    <meta name="author" content="Ui-DesignLab">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--end meta tags-->

    <title>BuzziBarter</title>

    <!--stylesheets-->

    <link rel="stylesheet" href="3rdparty/css/bootstrap.min.css">
    <link rel="stylesheet" href="3rdparty/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="3rdparty/css/animate.min.css">
    <link rel="stylesheet" href="3rdparty/jquery-nice-select-1.1.0/css/nice-select.css">
    <link rel="stylesheet" href="3rdparty/OwlCarousel2-2.2.1/owl.carousel.min.css">
    <link rel="stylesheet" href="3rdparty/OwlCarousel2-2.2.1/owl.theme.green.min.css">
    <link rel="stylesheet" href="3rdparty/perfect-scrollbar/css/perfect-scrollbar.css">
    <link rel="stylesheet" href="css/app.css">
	

    <!--end stylesheets-->

    <!--google fonts-->

    <link href="https://fonts.googleapis.com/css?family=Quicksand:700|Raleway|Tangerine" rel="stylesheet">
    <!--end google fonts-->
	
	<script src="3rdparty/js/popper.js"></script>
    <script src="3rdparty/js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function(){
        $('#web_cat').change(function(){
            selcat = $('#web_cat option:selected').val();
            formdata = {
                cat : selcat,
                ct_up:"submit"
            }

            $.ajax({
                url : "includes/ajax1.php",
                type : "post",
                data : formdata,
                success : function(response){
                    $('#sub_cat').html(response);
                }
            })
        })
    })
    </script>


</head>

	<body>
	<?php include("includes/header.php");?>
			<div class="container content-wrapper">
				<br>
				<div class="modal-header">
					<h1>Website</h1>
				</div>
				<div class="qna">
	                <div class="col-lg-12">
                        <div class="top-part">
							<strong>Website Details</strong><i class="fa fa-edit"></i>
						</div>
						<div>

						</div>
                        <form method="post">
						<br>
						  <div class="row form-group">
							<div class="col-6">
								<select name="web_cat" id="web_cat">
									<option>Select Category</option>
									<?php
									while($row_cat = mysql_fetch_array($cat))
									{
									?>
										<option value="<?php echo $row_cat["category_id"]; ?>"><?php echo $row_cat["category_name"]; ?></option>
									<?php
									}
									?>
								</select>
		    				</div>
                           <div class="col-6" id="sub_cat">
								<select name="web_sub_cat" id="web_sub_cat">
									<option>Select Category First</option>
									
								</select>
		    				</div>
						  </div>
                          <div class="row">
                            <div class="col-12">
                              <input type="text" name="web_top" class="form-control" required placeholder="Website Topic">
                          	</div>
                          </div>
                          <div class="row">
                            <div class="col-12">
                                <textarea class="form-control" name="web_des" placeholder="Website Description" required></textarea>
                            </div>
                           </div>
						   <div class="row">
							<div class="col-4">
								<select name="dom_inc" required>
									<option value="">Domain Inclusion</option>
									<option value="Yes">Yes</option>
									<option value="No">No</option>
								</select>
							</div>
							<div class="col-4">
								<select name="cli_data" required>
									<option value="">Client Database</option>
									<option value="Yes">Yes</option>
									<option value="No">No</option>
								</select>
							</div>
							<div class="col-4">
								<select name="ser" required>
									<option value="">Services</option>
									<option value="Never">Never</option>
									<option value="1">One Months</option>
									<option value="3">Threee Months</option>
									<option value="6">Six Months</option>
									<option value="12">Twelve Months</option>
								</select>
							</div>
						   </div>
						   <br>
						   <div class="row">
							<div class="col-4">
								<select name="demo" required>
									<option value="">Show Demo of Website</option>
									<option value="Yes">Yes</option>
									<option value="No">No</option>
								</select>
							</div>
							<div class="col-4">
								<select name="cus_upd">
									<option value="">Custom Updates</option>
									<option value="Yes">Yes</option>
									<option value="No">No</option>
								</select>
							</div>
							<div class="col-4">
								<input type="text" name="cust_price" placeholder="Custom Updates Price">
							</div>
						   </div>
                           <div class="row">
                            <div class="col-12">
                                <input type="text" name="web_domain" class="form-control" required placeholder="Domain Name">
                            </div>
                           </div>
                           <div class="row">
                            <div class="col-12">
                                <input type="text" class="form-control" name="web_bid" required placeholder="Starting Bid">
                            </div>
                           </div>
                          <div class="row">
                            <div class="col-6">
								<input type="date" name="last_date" min="<?php echo date('Y-m-d') ?>">
                            </div>
                           </div>
                           <div class="row">
                            <div class="col-12">
                            	<button class="btn btn-info btn-block" name="web_upd" type="submit">Upload</button>
                            </div>
                           </div>
						   <br>
                        </form>
                    </div>
				</div>

	
	</div>
<script src="3rdparty/js/bootstrap.js"></script>
<script src="3rdparty/jquery-nice-select-1.1.0/js/jquery.nice-select.js"></script>
<script src="3rdparty/OwlCarousel2-2.2.1/owl.carousel.min.js"></script>
<script src="3rdparty/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
<script src="js/app.js"></script>
	
	
	<?php include("includes/footer.php");?>
</body>
</html>