<?php
session_start();
include('includes/emal/insert_mail.php');
$ob = new mail;
mysql_connect("localhost","root","");
mysql_select_db("buzzibarter");
$country = mysql_query("select * from country");
// $fname_err = $lname_err = $add_err = $con_err = $state_err = $city_err = $mob_err = $email_err = $pass_err = $cnf_err = $file_err = "";
$fnm = $lnm = $name = $add = $con = $state = $city = $mob = $email = $pass = $cnf = $file = "";
if(isset($_REQUEST["reg"]))
{
    $f=0;
    if(empty($_REQUEST['fname']))
    {
        $fname_err = "First Name is Required";
        $f++;
    }
    else
    {
        if(is_numeric($_REQUEST["fname"])!=1)
        {
            $fnm = $_REQUEST['fname'];
            $f=0;
        }
        else
        {
            $fname_err = "First Name Should contain Alphabets instead of numbers";
            $f++;
        }
    }
    if(empty($_REQUEST['lname']))
    {
        $lname_err = "Last Name is Required";
        $f++;
    }
    else
    {
        if(is_numeric($_REQUEST["lname"])!=1)
        {
            $lnm = $_REQUEST['lname'];
            $name = $_REQUEST['fname']." ".$_REQUEST['lname'];
            $f=0;
        }
        else
        {
            $fname_err = "Last Name Should contain Alphabets instead of numbers";
            $f++;
        }
    }
    if(empty($_REQUEST['add']))
    {
        $add_err="Address is Required";
        $f++;
    }
    else
    {
        $add = $_REQUEST['add'];
        $f=0;
    }
    if(empty($_REQUEST["country"]))
    {
        $con_err = "Please Select your Country";
        $f++;
    }
    else
    {
        $con = $_REQUEST['country'];
        $f=0;
    }
    if(empty($_REQUEST["state"]))
    {
        $state_err = "Please Select your State";
        $f++;
    }
    else
    {
        $state = $_REQUEST['state'];
        $f=0;
    }
    if(empty($_REQUEST["city"]))
    {
        $city_err = "Please Select your city";
        $f++;
    }
    else
    {
        $city = $_REQUEST['city'];
        $f=0;
    }
    if(empty($_REQUEST["mob"]))
    {
        $mob_err = "Mobile is mandatory";
        $f++;
    }
    else
    {
        if(is_numeric($_REQUEST['mob']))
        {
            if(preg_match('/^[0-9]{10}+$/', $_REQUEST['mob']))
            {
                $mob = $_REQUEST['mob'];
                $f=0;
            }
            else
            {
                $mob_err = "Mobile number must be of 10 digit";
                $f++;
            }
        }
        else
        {
            $mob_err = "Mobile number Must be in numeric format";
            $f++;
        }
    }
    if(empty($_REQUEST["email"]))
    {
        $email_err = "Email is required";
        $f++;
    }
    else
    {
        $eml = $_REQUEST["email"];
        $sel = mysql_query("select * from user where email_id='$eml'");
        if(mysql_num_rows($sel) > 0)
        {
            $email_err = "Email already Exists. Try new one";
            $f++;
        }
        else
        {
            $email = $_REQUEST["email"];
            $f=0;
        }
    }
    if(empty($_REQUEST["pass"]))
    {
        $pass_err = "Password is required";
        $f++;
    }
    else
    {
        if($_REQUEST["pass"]!=$_REQUEST["cnfpass"])
        {
            $cnf_err = "Both Password must Match";
            $f++;
        }
        else
        {
            $pass = $_REQUEST["cnfpass"];
            $f=0;
        }
    }
    if(empty($_FILES["pic"]['tmp_name']))
    {
        $file_err = "PLEASE SELECT YOUR PROFILE PICTURE";
        $f++;
    }
    else
    {
        if($_FILES['pic']['type'] == 'image/jpg' || $_FILES['pic']['type'] == 'image/jpeg' || $_FILES['pic']['type'] == 'image/gif' || $_FILES['pic']['type'] == 'image/png')
        {
            $file = $_FILES["pic"]["name"];
            $f=0;
        }
        else
        {
            $file_err = "Choose A picture format";
            $f++;
        }
    }
    if($f == 0)
    {
        $name = $_REQUEST['fname']." ".$_REQUEST['lname'];
        $add = $_REQUEST['add'];
        $con = $_REQUEST['country'];
        $state = $_REQUEST['state'];
        $city = $_REQUEST['city'];
        $mob = $_REQUEST['mob'];
        $email = $_REQUEST['email'];
        $pass = $_REQUEST['cnfpass'];
        $file = $_FILES["pic"]["name"];
        $tmp = $_FILES["pic"]["tmp_name"];
        $path="uploads/";
        $filepath = $path.$file;
        move_uploaded_file($tmp,$filepath);
        $str = "insert into user values('','$name','$add','$city','$state','$con',$mob,'$email','$pass','$filepath','No','No')";
        $q = mysql_query($str) or die(mysql_error());
        $ob->register($email,$pass);
        if($q)
        {
            session_start();
            $user = mysql_query("select user_id from user where email_id='$email' and password='$pass'");
            $res = mysql_fetch_array($user);
            $_SESSION["user_id"] = $res["user_id"];
            header("location:dashboard.php");
        }
    } 
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Buzzibarter: Register</title>

    <!--meta tags-->

    <meta charset="UTF-8">
    <meta name="description" content="Services Listing HTML5 CSS3 template">
    <meta name="keywords" content="HTML,CSS,XML,JavaScript, services, listing">
    <meta name="author" content="Ui-DesignLab">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--end meta tags-->

    <!--stylesheets-->

    <link rel="stylesheet" href="3rdparty/css/bootstrap.min.css">
    <link rel="stylesheet" href="3rdparty/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="3rdparty/css/animate.min.css">
    <link rel="stylesheet" href="3rdparty/jquery-nice-select-1.1.0/css/nice-select.css">
    <link rel="stylesheet" href="3rdparty/OwlCarousel2-2.2.1/owl.carousel.min.css">
    <link rel="stylesheet" href="3rdparty/OwlCarousel2-2.2.1/owl.theme.green.min.css">
    <link rel="stylesheet" href="3rdparty/perfect-scrollbar/css/perfect-scrollbar.css">
    <link rel="stylesheet" href="css/app.css">

    <!--end stylesheets-->

    <!--google fonts-->

    <link href="https://fonts.googleapis.com/css?family=Quicksand:700|Raleway|Tangerine" rel="stylesheet">
    <!--end google fonts-->
    <script src="3rdparty/js/jquery-3.2.1.min.js"></script>
    <script>
    $(document).ready(function(){
        $('#country').change(function(){
            selcntry = $('#country option:selected').val();
            formdata = {
                cntry : selcntry,
                ad:"submit"
            }

            $.ajax({
                url : "includes/ajax.php",
                type : "post",
                data : formdata,
                success : function(response){
                    $('#state').html(response);
                }
            })
        })
        $('#state').change(function(){
            selstate = $('#state option:selected').val();
            formdata = {
                state : selstate,
                st:"submit"
            }

            $.ajax({
                url : "includes/ajax.php",
                type : "post",
                data : formdata,
                success : function(response){
                    $('#city').html(response);
                }
            })
        })
    })
    </script>
    <style>
        /* The message box is shown when the user clicks on the password field */
        #message {
            display:none;
            background: #f1f1f1;
            color: #000;
            position: relative;
            margin-top: 10px;
        }

        #message p {
            padding-left: 35px;
            font-size: 14px;
        }

        /* Add a green text color and a checkmark when the requirements are right */
        .valid {
            color: green;
        }

        .valid:before {
            position: relative;
            left: -35px;
            content: "✔";
        }

        /* Add a red text color and an "x" when the requirements are wrong */
        .invalid {
            color: red;
        }

        .invalid:before {
            position: relative;
            left: -35px;
            content: "✖";
        }
    </style>
</head>
<body>
    <!--top navbar-->

	<?php include("includes/header.php"); ?>

<!--end top navbar-->

<!--side menu-->
<div class="side-menu" id="side-menu">
    <div class="side-menu-c">
        <div class="side-logo">
            <a href="index-2.php">BuzziBarter</a>
            <i class="fa fa-times close-menu"></i>
        </div>
        <ul class="list-unstyled mini">
            <li><a href="index-2.php">Home</a></li>
            <li><a href="listing_one.php">Listings</a></li>
            <li><a href="aboutus.php">About Us</a></li>
            <li><a href="contact.php">Contact US</a></li>
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="#" data-toggle="modal" data-target="#Modal">Account</a></li>
        </ul>
    </div>
</div>
<!--end side menu-->

<div class="content-wrapper">

    <!-- HEADER -->
    <header class="head">
        <h1><strong>Sign UP</strong> Yourself for <strong>BuzziBarter</strong></h1>
    </header>
    <div class="alert alert-danger">
        <?php
        if(isset($fname_err))
        { echo $fname_err." !! "; }
        if(isset($lname_err))
        {  echo $lname_err." !! "; }
        if(isset($add_err))
        {  echo $add_err." !! "; }
        if(isset($con_err))
        { echo $con_err." !! ";  }
        if(isset($state_err))
        { echo $state_err." !! ";  }
        if(isset($city_err))
        { echo $city_err." !! "; }
        if(isset($mob_err))
        { echo $mob_err." !! ";  }
        if(isset($email_err))
        { echo $email_err." !! "; }
        if(isset($pass_err))
        { echo $pass_err." !! "; }
        if(isset($cnf_err))
        { echo $cnf_err." !! ";  }
        if(isset($file_err))
        { echo $file_err."  !! "; }
        ?>
    </div>
    <div class="p-tables">
    <form method="post" enctype="multipart/form-data" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <div class="row">
            <div class="col-sm-6">
                <input type="text" name="fname" id="" value="<?php echo $fnm; ?>" placeholder="First Name">
            </div>
            <div class="col-sm-6">
                <input type="text" name="lname" id="" value="<?php echo $lnm ?>" placeholder="Last Name">
            </div>
        </div>
        <div class="row">
            <div class="col-sm-8">
                <textarea name="add" id="" cols="30" rows="10" style="height:80px" placeholder="Full Address"><?php echo $add ?></textarea>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <select name="country" id="country">
                    <option value="">Select Country</option>
                <?php
                    while($row = mysql_fetch_array($country))
                    {
                        ?>
                        <option <?php if($con==$row['country_name']) { echo "selected"; } ?>><?php echo $row['country_name'] ?></option>
                <?php
                    }
                ?>
                </select>
            </div>
            <div class="col-sm-4">
                <select name="state" id="state">
                    <option value="">Select Country First</option>
                </select>
            </div>
            <div class="col-sm-4">
                <select name="city" id="city">
                    <option value="">Select State First</option>
                </select>
            </div>
        </div>
        
        <div class="row">
            <div class="col-sm-6">
                <input type="email" name="email" id="" value="<?php echo $email ?>" placeholder="E-mail ID eg.:abc@xyz.com">
            </div>
            <div class="col-sm-6">
                <input type="tel" name="mob" id="" value="<?php echo $mob ?>" placeholder="Telephone Number">
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="short-div">
                    <input type="password" name="pass" placeholder="Password" id="pass" value="<?php echo $pass ?>" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
                </div>
                <div class="short-div">
                    <input type="password" name="cnfpass" value="<?php echo $cnf ?>" id="" placeholder="Confirm Password">
                </div>
            </div>
            <div class="col-sm-6" id="message">
                <p>Password must contain the following:</p>
                <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
                <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
                <p id="number" class="invalid">A <b>number</b></p>
                <p id="length" class="invalid">Minimum <b>8 characters</b></p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-8">
                <input type="file" name="pic">
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <input type="submit" value="Sign UP" name="reg" id="reg" class="btn ui-btn dark-blue">
            </div>
            <div class="col-sm-4">
                <input type="Reset" value="Reset" class="btn ui-btn btn-info">
            </div>
        </div>
    </form>
    </div>
</div>
<?php include("includes/footer.php"); ?>
<script>
var myInput = document.getElementById("pass");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");

// When the user clicks on the password field, show the message box
myInput.onfocus = function() {
    document.getElementById("message").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
myInput.onblur = function() {
    document.getElementById("message").style.display = "none";
}

// When the user starts to type something inside the password field
myInput.onkeyup = function() {
  // Validate lowercase letters
  var lowerCaseLetters = /[a-z]/g;
  if(myInput.value.match(lowerCaseLetters)) {  
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
  }
  
  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) {  
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {  
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }
  
  // Validate length
  if(myInput.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
}
</script>

</body>
</html>