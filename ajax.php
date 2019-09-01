<?php
mysql_connect("localhost","root","");
mysql_select_db("buzzibarter");
if(isset($_REQUEST["ad"]))
{
    $id = $_REQUEST["cntry"];
    $res = mysql_query("select * from state where country_id=$id");
    while($rw = mysql_fetch_array($res))
    {
        ?>
        <option value="<?php echo $rw["state_id"] ?>"><?php echo $rw["state"]; ?></option>
    <?php
    }
}
?>