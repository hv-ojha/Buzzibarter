<?php
session_start();
include('insert_mail.php');
$ob = new mail;
mysql_connect("localhost","root","");
mysql_select_db("try");
if(isset($_REQUEST["ins"])) {
    $email = $_REQUEST["name"];
    $q = mysql_query("select * from encrypt where email='$email'")or die(mysql_error());
    if($q)
    {
        $pas = mysql_fetch_array($q);
        $pass1 = convert_uudecode($pas["password"]);
        $ob->forget($email,$pass1);
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
<html>
<head>
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<?php
if(isset($_REQUEST["user_name"]) && isset($_REQUEST["pass"]))
{
?>
<h1>Change Password</h1>
    <form method="POST">
        <input type="password" name="p1" id=""><br>
        <input type="password" name="p2" id=""><br>
        <input type="submit" value="Change password" name="upd">
    </form>
<?php
}
else
{
?>
<h1>Forgot Password</h1>
    <form method="POST">
        <input type="email" name="name" id=""><br>
        <input type="submit" value="Forgot" name="ins">
    </form>

<?php
}
?>
    <br>
    <br>
    <br>
    <br>
    <br>
</body>
</html>