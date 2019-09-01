<?php
if(isset($_REQUEST["user_name"]) && isset($_REQUEST["pass"]))
{
    $mail = $_REQUEST["user_name"];
    $pass = convert_uuencode($_REQUEST["pass"]);
    $sel = mysql_query("select * from encrypt where email='$mail' and password='$pass'");
    if(mysql_num_rows($sel)==1)
    {
        session_start();
        $row = mysql_fetch_array($sel);
        $_SESSION["user"] = $row["email"];
        $id = $_SESSION["user"];
        if(isset($_REQUEST["upd"]))
        {
            $pass = convert_uuencode($_REQUEST["p2"]);
            $query="update encrypt set password='$pass' where email='$id'";
            $update=mysql_query($query)or die(mysql_error());
            if($update)
            {
                session_destroy();
                header('location: try.php');
            }
        }
    }
}
?>