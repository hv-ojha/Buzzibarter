<?php
include_once('includes/connection.php');
if(isset($_SESSION["user_id"]))
{
	$usr = $_SESSION["user_id"];
	$user = mysql_query("select * from user where user_id='$usr'");
	$res = mysql_fetch_array($user);
	if(isset($_REQUEST["logout"]) || isset($_REQUEST["lg"]))
	{
		session_destroy();
		header("location:login.php?msg='Thank you user'");
    }
}
else
{
	header("location:login.php?msg='Please login to start your session'");
}
?>
