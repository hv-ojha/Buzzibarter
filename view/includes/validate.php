<?php
if(isset($_REQUEST["vl"]))
{
    if(empty($_REQUEST['fname']))
    {
        $err="First Name is Required";
        return $err;
    }
}
?>