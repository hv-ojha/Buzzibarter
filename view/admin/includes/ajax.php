<?php  
	$cn = mysql_connect("localhost","root","");
	mysql_select_db("buzzibarter",$cn);
	if(isset($_REQUEST["q"]))
	{
		$id = $_REQUEST['q'];
		$qu = mysql_query("select * from state where country_id = '$id'");
		if($id == 0)
		{ 
?>
			<option value="0"> state </option>
    	<?php	
    }
    while($rs = mysql_fetch_array($qu))
		{ 
	 	?>
			<option value="<?php echo $rs['state_id']; ?>"> <?php echo $rs['state']; ?> </option>
    <?php 
		}
	}
	elseif(isset($_REQUEST["qq"]))
	{
		$id = $_REQUEST['qq'];
		$qu = mysql_query("select * from state where country_id = '$id'");
		if($id == 0)
		{ 
?>
			<option value="0"> state </option>
    	<?php	
    }
    while($rs = mysql_fetch_array($qu))
		{ 
	 	?>
			<option value="<?php echo $rs['state_id']; ?>"> <?php echo $rs['state']; ?> </option>
    <?php 
		}	

	}
?>