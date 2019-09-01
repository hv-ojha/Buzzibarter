<?php
include("includes/connection.php");
if(isset($_REQUEST["user_id"]))
{
  $id1 = $_REQUEST["user_id"];
  $u_q = "select * from user where user_id=$id1";
  $user_r = mysql_query($u_q)or die(mysql_error());
  $us_row = mysql_fetch_array($user_r);
  $MERCHANT_KEY = "hDkYGPQe";
  $SALT = "yIEkykqEH3";
  // Merchant Key and Salt as provided by Payu.

  $PAYU_BASE_URL = "https://test.payu.in";		// For Sandbox Mode
  //$PAYU_BASE_URL = "https://secure.payu.in";			// For Production Mode

  $action = '';

  $posted = array();
  if(!empty($_POST)) {
      //print_r($_POST);
    foreach($_POST as $key => $value) {    
      $posted[$key] = $value; 
    
    }
  }

  $formError = 0;

  if(empty($posted['txnid'])) {
    // Generate random transaction id
    $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
  } else {
    $txnid = $posted['txnid'];
  }
  $hash = '';
  // Hash Sequence
  $hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";
  if(empty($posted['hash']) && sizeof($posted) > 0) {
    if(
            empty($posted['key'])
            || empty($posted['txnid'])
            || empty($posted['amount'])
            || empty($posted['firstname'])
            || empty($posted['email'])
            || empty($posted['phone'])
            || empty($posted['productinfo'])
            || empty($posted['surl'])
            || empty($posted['furl'])
        || empty($posted['service_provider'])
    ) {
      $formError = 1;
    } else {
      //$posted['productinfo'] = json_encode(json_decode('[{"name":"tutionfee","description":"","value":"500","isRequired":"false"},{"name":"developmentfee","description":"monthly tution fee","value":"1500","isRequired":"false"}]'));
    $hashVarsSeq = explode('|', $hashSequence);
      $hash_string = '';	
    foreach($hashVarsSeq as $hash_var) {
        $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
        $hash_string .= '|';
      }

      $hash_string .= $SALT;


      $hash = strtolower(hash('sha512', $hash_string));
      $action = $PAYU_BASE_URL . '/_payment';
    }
  } elseif(!empty($posted['hash'])) {
    $hash = $posted['hash'];
    $action = $PAYU_BASE_URL . '/_payment';
    $amt = $_REQUEST["amount"];
    mysql_query("update wallet set amount=$amt where user_id=$id1");
  }
  ?>
  <html>
    
    <head>
    
    <!--meta tags-->

    <meta charset="UTF-8">
    <meta name="description" content="Services Listing HTML5 CSS3 template">
    <meta name="keywords" content="HTML,CSS,XML,JavaScript, services, listing">
    <meta name="author" content="Ui-DesignLab">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--end meta tags-->

    <title>BuzziBarter-Dashboard</title>

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
    <script>
      var hash = '<?php echo $hash ?>';
      function submitPayuForm() {
        if(hash == '') {
          return;
        }
        var payuForm = document.forms.payuForm;
        payuForm.submit();
      }
    </script>
    </head>
    <body onload="submitPayuForm()">
    
<!--top bar-->
<?php include("includes/header.php") ?>


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
      <header class="head">
        <h1>Add Money to your Wallet</h1>
      </header>
      <div class="qna">
      <?php if($formError) { ?>
    
        <span style="color:red">Please fill all mandatory fields.</span>
        <br/>
        <br/>
      <?php } ?>
      <form action="<?php echo $action; ?>" method="post" name="payuForm">
        <input type="hidden" name="key" value="<?php echo $MERCHANT_KEY ?>" />
        <input type="hidden" name="hash" value="<?php echo $hash ?>"/>
        <input type="hidden" name="txnid" value="<?php echo $txnid ?>" />
        <table class="table">
          <tr>
          <?php
          $posted['firstname']=$us_row["user_name"];
          ?>
            <td>Amount: </td>
            <td><input name="amount" value="<?php echo (empty($posted['amount'])) ? '' : $posted['amount'] ?>" /></td>
            <td>First Name: </td>
            <td><input name="firstname" value="<?php echo (empty($posted['firstname'])) ? '' : $posted['firstname']; ?>"></td>
          </tr>
          <tr>
          <?php
          $posted['email']=$us_row["email_id"];
          $posted['phone']=$us_row["mobile_no"];
          ?>
            <td>Email: </td>
            <td><input name="email" id="email" value="<?php echo (empty($posted['email'])) ? '' : $posted['email']; ?>" /></td>
            <td>Phone: </td>
            <td><input name="phone" value="<?php echo (empty($posted['phone'])) ? '' : $posted['phone']; ?>" /></td>
          </tr>
          <tr>
          <?php
          $posted['productinfo']="Add money To wallet";
          ?>
            <td>Product Info: </td>
            <td colspan="3"><textarea name="productinfo"><?php echo (empty($posted['productinfo'])) ? '' : $posted['productinfo'] ?></textarea></td>
          </tr>
          <tr>
          <?php
          $posted['surl']="http://localhost/client_php/view/success.php?user_id=$id1";
          $posted['furl']="http://localhost/client_php/view/failure.php";
          ?>
            <td>Success URI: </td>
            <td colspan="3"><input name="surl" value="<?php echo (empty($posted['surl'])) ? '' : $posted['surl'] ?>" size="64" /></td>
          </tr>
          <tr>
            <td>Failure URI: </td>
            <td colspan="3"><input name="furl" value="<?php echo (empty($posted['furl'])) ? '' : $posted['furl'] ?>" size="64" /></td>
          </tr>

          <tr>
            <td colspan="3"><input type="hidden" name="service_provider" value="payu_paisa" size="64" /></td>
          </tr>
          <tr>
            <?php if(!$hash) { ?>
              <td colspan="4"><input type="submit" value="Submit" class="btn ui-btn btn-info text-light" /></td>
            <?php } ?>
          </tr>
        </table>
      </form>
      </div>
      </div>
      <?php
      include("includes/footer.php")
      ?>
    </body>
  </html>
<?php
}
else
{
?>
<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>

    <!--meta tags-->

    <meta charset="UTF-8">
    <meta name="description" content="Services Listing HTML5 CSS3 template">
    <meta name="keywords" content="HTML,CSS,XML,JavaScript, services, listing">
    <meta name="author" content="Ui-DesignLab">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--end meta tags-->

    <title>BuzziBarter-Dashboard</title>

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

</head>
<body>
<!--end top bar-->
<?php include("includes/header.php") ?>
<!--side menu-->

<div class="content-wrapper">
  <header class="head">
    <h1>Nothing To Display</h1>
  </header>
</div>

<!--end side menu-->
</body>
</html>
<?php
}
?>