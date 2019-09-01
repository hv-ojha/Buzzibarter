<?php  
	$cn = mysql_connect("localhost","root","");
	mysql_select_db("admin",$cn);
	$id = $_REQUEST['q'];
	$qu = mysql_query("select * from sub_category where cate_id = '$id'");
	if($id == 0)
	{ ?>
		<option value="0"> Sub-category </option>

<?php	}
	while($rs = mysql_fetch_array($qu))
	{ 
	 ?>
	
		<option value="<?php echo $rs['sub_cate_id']; ?>"> <?php echo $rs['sub_cate_name']; ?> </option>
<?php 
	
}	?>
                                    
                                    