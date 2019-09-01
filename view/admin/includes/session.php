<?php
include('../includes/connection.php');
session_start();
if(isset($_SESSION["admin_id"]))
{
	$adm = $_SESSION["admin_id"];
	$admin = mysql_query("select * from admin where admin_id='$adm'");
	$res = mysql_fetch_array($admin);
	if(isset($_REQUEST["logout"]) || isset($_REQUEST["lg"]))
	{
		session_destroy();
		header("location:login.php?msg='Thank you admin'");
	}
}
else
{
	header("location:login.php?msg='Please login to start your session'");
}
?>
