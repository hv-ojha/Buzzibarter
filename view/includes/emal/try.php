<?php
session_start();
include('insert_mail.php');
$ob = new mail;
mysql_connect("localhost","root","");
mysql_select_db("try");
if(isset($_REQUEST["ins"]))
{
    $email = $_REQUEST["name"];
    $pass = convert_uuencode($_REQUEST["pass1"]);
    echo $i = "insert into encrypt(email,password) values('$email','$pass')";
    $q = mysql_query($i)or die(mysql_error());
    if($q)
    {
        $pass1 = convert_uudecode($pass);
        $ob->register($email,$pass1);
        header('try.php');
    }
}
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
        $query="update encrypt set verified='Yes' where email='$id'";
        $update=mysql_query($query);
        if($update)
        {
            session_destroy();
            header('location: try.php');
        }
    }
}
?>
<html>
<head>
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<h1>register</h1>
    <form method="POST">
        <input type="text" name="name" id=""><br>
        <input type="pass" name="pass1"><br>
        <input type="submit" value="SEND" name="ins">
    </form>
    <br>
    <br>
    <br>
    <br>
    <br>
</body>
</html>