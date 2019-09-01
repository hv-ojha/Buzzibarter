<?php
$cn = mysql_connect("localhost","root","");
										mysql_select_db("admin",$cn);
	?>
    
    
<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>Admin Panel | Service</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Modern Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
 <!-- Bootstrap Core CSS -->
<link href="../css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="../css/style.css" rel='stylesheet' type='text/css' />
<link href="../css/font-awesome.css" rel="stylesheet"> 
<!-- jQuery -->
<script src="../js/jquery.min.js"></script>
<!----webfonts--->
<link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
<!---//webfonts--->  
<!-- Bootstrap Core JavaScript -->
<script src="../js/bootstrap.min.js"></script>

<script>

function showUser(str)
{
  	if (str=="") 
	{
    	document.getElementById("txthint").innerHTML="";
    	return;
  	} 
  	if (window.XMLHttpRequest) 
	{
    	// code for IE7+, Firefox, Chrome, Opera, Safari
    	xmlhttp=new XMLHttpRequest();
  	}
	else 
	{ // code for IE6, IE5
    	xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  	}
  	xmlhttp.onreadystatechange=function()
	{		
		if (this.readyState==4 && this.status==200)
		{
      		document.getElementById("txthint").innerHTML=this.responseText;
    	}
  }
  xmlhttp.open("POST","ajax_display_example.php?q="+str,true);
  xmlhttp.send();
}

</script>

</head>
<body>

<div id="wrapper">
	 
	 
        <div id="page-wrapper">
        <div class="graphs">
	     <div class="xs">
  	       <h3>Services</h3>
           	<form method="post">
            </fieldset>
            	<fieldset>
                	<legend>Service</legend>
                    
                  <div class="row">  
                  
                    	</div>
                    	
            			<div class="row"> 
                        
                          <div class="col-sm-3">
                            	<select name="category_list" class="form-control1" onChange="showUser(this.value)">
                                	<option value="0"> Category </option>
                                    
									
									<?php  
										
										$query = mysql_query("select * from category");
										while($r = mysql_fetch_array($query))
										{ ?>
											<option value="<?php echo $r['cate_id']; ?>"> <?php echo $r['cate_name']; ?> </option>
                                    	
                                        	
									<?php }	?>
                                    
                                    
                                    
                                </select>
                            </div>
                            
                            
                            
                            
                            
                        	<div class="col-sm-3">
                            	<select name="sub_category_list" id="txthint" class="form-control1">
                                	<option value="0"> Sub-category </option>
                     				
                                </select>
                            </div>
                			<div class="col-sm-3">
                				<input class="form-control1" name="service_name" type="text" placeholder="Service title">
               		 		</div>
             		   <!--</div>
             		   <div class="row">-->
                			<div class="col-sm-2">
                    			<input class="form-control1" name="price" type="text" placeholder="Min. Price">
                    		</div>
               			<!-- </div>
                
                		<div class="row">-->
                		<div class="col-sm-1">
                    			<input class="form-control1 btn btn-primary" type="submit" name="add_service" value="ADD">
                   		 </div>
              		  </div>
            

                    
                </fieldset>
                
                <?php
					include("control.php");
                	if(isset($_REQUEST['add_service']))
					{
						$ins_sct = new controller;
						$ins_sct -> ins_ser();	
					}
				?>
            <div>
            	<fieldset>
                	<legend>Records</legend>
                    	
                        	
                    		<table class="table table-striped">
                            	<tr>
                                	<th>ID</th>
                                    <th>Service</th>
                                    <th>Min.Price</th>
                                    <th>Sub category</th>
                                    <th>Action</th>
                              
                                </tr>
                                <tr>
                                	<?php
                                    		$select_ser = new controller();
											$select_ser -> sel_ser();
									?>
                                </tr>
                            </table>
                     
                        
                        
                </fieldset>
            </div>
          <!--  <div>
            	<fieldset>
                	<legend>Records</legend>
                    	<table class="table table-striped">
                        	<tr>
                            	<th>ID</th>
                                <th>Category Name</th>
                                <th>Sub Category</th>
                                <th>Service</th>
                            </tr>
                            <tr>
                            	
                            </tr>
                        </table>
                </fieldset>
            </div>-->
            	</form>
  	         
  </div>
  </div>
  <div class="copy_layout">
      <p>Copyright © 2018 Canopy. All Rights Reserved</p>
  </div>
  </div>
      </div>
      <!-- /#page-wrapper -->
   </div>
    <!-- /#wrapper -->
<!-- Nav CSS -->
<link href="css/custom.css" rel="stylesheet">
<!-- Metis Menu Plugin JavaScript -->
<script src="js/metisMenu.min.js"></script>
<script src="js/custom.js"></script>
</body>
</html>
