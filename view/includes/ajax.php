<?php
session_start();
mysql_connect("localhost","root","");
mysql_select_db("buzzibarter");
if(isset($_REQUEST["ad"]))
{
    $id = $_REQUEST["cntry"];
	$res = mysql_query("select * from state,country where state.country_id=country.country_id and country_name='$id'");
	?><option value="">Select State</option>
	<?php
    while($rw = mysql_fetch_array($res))
    {
    ?><option><?php echo $rw["state"]; ?></option>
    <?php
    }
}
if(isset($_REQUEST["st"]))
{
    $id = $_REQUEST["state"];
		$res = mysql_query("select * from city,state where city.state_id=state.state_id and state='$id'");
	?>
		<option value="">Select city</option>
	<?php
    while($rw = mysql_fetch_array($res))
    {
        ?>
        <option><?php echo $rw["city"]; ?></option>
    <?php
    }
}
if(isset($_REQUEST["ch"]))
{
    $ps = $_REQUEST["pwd"];
    $rs = mysql_query("select * from user where user_id=$_SESSION[user_id] and password=$ps");
    if(mysql_num_rows($rs)==1)
    {
    ?>
        <input type="password" name="newpass" placeholder="Enter New Password" id="nwpass" class="form-control">
        <input type="password" name="cnfpass" placeholder="Confirm Password" id="cnfpass" class="form-control">
    <?php
    }
    else
    {
        echo "Please Enter Correct Password";
    }
}
?>