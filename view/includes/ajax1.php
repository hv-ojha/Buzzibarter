<?php
session_start();
mysql_connect("localhost","root","");
mysql_select_db("buzzibarter");
if(isset($_REQUEST["ad_up"]))
{
    $id = $_REQUEST["cntry"];
	$res = mysql_query("select * from state,country where state.country_id=country.country_id and country_name='$id'");
	?><select name="state_upd" id="state_upd" class="form-control">
    <option value="">Select State</option>
	<?php
    while($rw = mysql_fetch_array($res))
    {
    ?><option><?php echo $rw["state"]; ?></option>
    <?php
    }
    ?>
    </select>
<?php
}
if(isset($_REQUEST["st_up"]))
{
    $id = $_REQUEST["state"];
		$res = mysql_query("select * from city,state where city.state_id=state.state_id and state='$id'");
	?><select name="city_upd" id="city_upd" class="form-control">
		<option value="">Select city</option>
	<?php
    while($rw = mysql_fetch_array($res))
    {
        ?>
        <option><?php echo $rw["city"]; ?></option>
    <?php
    }
    ?>
    </select>
<?php
}
if(isset($_REQUEST["ct_up"]))
{
	$ct = $_REQUEST["cat"];
	$res = mysql_query("select * from sub_category where category_id='$ct'");
?><select name="web_sub_cat" id="web_sub_cat">
	<option>Select Sub-Category</option>
	<?php
    while($rw = mysql_fetch_array($res))
    {
        ?>
        <option value="<?php echo $rw["sub_category_id"]; ?>"><?php echo $rw["sub_category_name"]; ?></option>
    <?php
    }
	?>
	</select>
	<?php
}
?>