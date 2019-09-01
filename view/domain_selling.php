<?php
session_start();
include_once("includes/session.php");
include_once("../controller/controller_cl.php");
$ob = new controller_cl;
$cat = $ob->cat_select();
if(isset($_REQUEST['dom_upd']))
{
	$ob->domain_upload();
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
        $('#dom_cat').change(function(){
            selcat = $('#dom_cat option:selected').val();
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
	<?php  include("includes/header.php");?>
			<div class="container content-wrapper">
			<br>
				<div class="modal-header">
					<h1>Domains</h1>
				</div>
				<div class="qna">
	                <div class="col-lg-12">
                        <div class="top-part">
							<strong>Domain Details</strong><i class="fa fa-edit"></i>
						</div>
                        <form class="edit-profile form-control" action="#" method="post">
						<div class="row form-group">
							<div class="col-6">
								<select name="dom_cat" id="dom_cat">
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
                              <div class="form-group col-12">
                              	<input type="text" name="dom_top" class="form-control" placeholder="Domain Topic">
                          	  </div>
                         </div>
                         <div class="row">
                            <div class="form-group col-12">
                                <textarea class="form-control" name="dom_des" placeholder="Domain Description"></textarea>
                            </div>
                            <div class="form-group col-12">
                                <input type="text" class="form-control" name="dom_name" placeholder="Domain Name(E.g. Full Address)">
                            </div>
                            <div class="form-group col-12">	
                                <input type="text" class="form-control" name="dom_bid" placeholder="Starting Bid">
                            </div>
                         </div>
                         <div class="row">
                            <div class="form-group col-12">
                                <input type="date" class="form-control" name="last_date" placeholder="Last Date">
                            </div>
                         </div>
                        
                          <div class="row">
                           <div class="col-12">
                            <button class="btn btn-block btn-info" name="dom_upd" type="submit">Submit</button>
                           </div>
                          </div>
                        </form>
                	</div>
				</div>
			</div>

	
	
	
	
	<?php include("includes/footer.php");?>
	</body>
</html>