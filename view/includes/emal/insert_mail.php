<?php

//$link=mysqli_connect("localhost","root","","test");
/*
$email=$_POST['email'];
$username=$_POST['username'];
$pwd=$_POST['pwd'];
*/
/*echo $email;
echo $pwd;*/

//$s="insert into mailtest values('$email','$username','$pwd')";
//$arr=mysqli_query($link,$s);

require "class.phpmailer.php";

class mail
{
	function register($to,$pass)
	{
		$mail = new PHPMailer;		
		$mail->isSMTP();                                      // Set mailer to use SMTP
		$mail->Host = 'smtp.gmail.com';  	// Specify main and backup server
		$mail->SMTPAuth = true;                               // Enable SMTP authentication
		$mail->Username = 'buzzibarter@gmail.com';                            // SMTP username suratrealestate2015@gmail.com
		$mail->Password = 'Ilovemyparents';                           // SMTP password suratrealestate
		$mail->SMTPSecure = 'ssl';                            // Enable encryption, 'ssl' also accepted
		$mail->Port = '465';						//Port Number
		
		$mail->From = 'buzzibarter@gmail.com';			//From Email Id
		$mail->FromName = 'Buzzibarter - Registeration';		//From Email Id Display Name
		//$mail->addAddress('josh@example.net', 'Josh Adams');  // Add a recipient
		$mail->addAddress($to);               // Name is optional
		//$mail->addReplyTo('info@example.com', 'Information');
		//$mail->addCC('cc@example.com');
		//$mail->addBCC('bcc@example.com');
		
		$mail->WordWrap = 50;                                 // Set word wrap to 50 characters
		//$mail->addAttachment('');         // Add attachments
		//$mail->addAttachment('','');    // Optional name
		$mail->isHTML(true);                                  // Set email format to HTML

		$url="http://localhost/client_php/view/includes/emal/register_successful.php?uname=$to&pass=$pass";
		$a="uname";
		if(($Content = file_get_contents($url)) === false) {
		$Content = "";
			}

		$mail->Subject = 'Registration Successfully';
		$mail->Body    = $Content;
						
		//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

		if(!$mail->send())
		{
			//header("location:thanks.php");
		echo 'Message could not be sent.';
		echo 'Mailer Error: ' . $mail->ErrorInfo;
		exit;
		}
		else
		{
			echo "<script>location.href='email_verify.php'</script>";
		}
	}
	function forget($to,$pass)
	{
		$mail = new PHPMailer;		
		$mail->isSMTP();                                      // Set mailer to use SMTP
		$mail->Host = 'smtp.gmail.com';  	// Specify main and backup server
		$mail->SMTPAuth = true;                               // Enable SMTP authentication
		$mail->Username = 'buzzibarter@gmail.com';                            // SMTP username suratrealestate2015@gmail.com
		$mail->Password = 'Ilovemyparents';                           // SMTP password suratrealestate
		$mail->SMTPSecure = 'ssl';                            // Enable encryption, 'ssl' also accepted
		$mail->Port = '465';						//Port Number
		
		$mail->From = 'buzzibarter@gmail.com';			//From Email Id
		$mail->FromName = 'Buzzibarter - Reset Your Account';		//From Email Id Display Name
		//$mail->addAddress('josh@example.net', 'Josh Adams');  // Add a recipient
		$mail->addAddress($to);               // Name is optional
		//$mail->addReplyTo('info@example.com', 'Information');
		//$mail->addCC('cc@example.com');
		//$mail->addBCC('bcc@example.com');
		
		$mail->WordWrap = 50;                                 // Set word wrap to 50 characters
		//$mail->addAttachment('');         // Add attachments
		//$mail->addAttachment('','');    // Optional name
		$mail->isHTML(true);                                  // Set email format to HTML

		$url="http://localhost/client_php/view/includes/emal/forgot_password.php?uname=$to&pass=$pass";
		$a="uname";
		if(($Content = file_get_contents($url)) === false) {
		$Content = "";
			}

		$mail->Subject = 'Forgot Password';
		$mail->Body    = $Content;
						
		//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

		if(!$mail->send())
		{
			//header("location:thanks.php");
		echo 'Message could not be sent.';
		echo 'Mailer Error: ' . $mail->ErrorInfo;
		exit;
		}
		else
		{
			echo "<script>location.href='index.php'</script>";
		}
	}
	function bidding($to, $name, $product)
	{
		$mail = new PHPMailer;		
		$mail->isSMTP();                                      // Set mailer to use SMTP
		$mail->Host = 'smtp.gmail.com';  	// Specify main and backup server
		$mail->SMTPAuth = true;                               // Enable SMTP authentication
		$mail->Username = 'buzzibarter@gmail.com';                            // SMTP username suratrealestate2015@gmail.com
		$mail->Password = 'Ilovemyparents';                           // SMTP password suratrealestate
		$mail->SMTPSecure = 'ssl';                            // Enable encryption, 'ssl' also accepted
		$mail->Port = '465';						//Port Number
		
		$mail->From = 'buzzibarter@gmail.com';			//From Email Id
		$mail->FromName = 'Buzzibarter - Actions on your Product';		//From Email Id Display Name
		//$mail->addAddress('josh@example.net', 'Josh Adams');  // Add a recipient
		$mail->addAddress($to);               // Name is optional
		//$mail->addReplyTo('info@example.com', 'Information');
		//$mail->addCC('cc@example.com');
		//$mail->addBCC('bcc@example.com');
		
		$mail->WordWrap = 50;                                 // Set word wrap to 50 characters
		//$mail->addAttachment('');         // Add attachments
		//$mail->addAttachment('','');    // Optional name
		$mail->isHTML(true);                                  // Set email format to HTML

		$url="http://localhost/client_php/view/includes/emal/bid_success.php?uname=$to&name=$name";
		$a="uname";
		if(($Content = file_get_contents($url)) === false) {
		$Content = "";
			}

		$mail->Subject = 'Action on your Uploaded Product';
		$mail->Body    = $Content;
						
		//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

		if(!$mail->send())
		{
			//header("location:thanks.php");
		echo 'Message could not be sent.';
		echo 'Mailer Error: ' . $mail->ErrorInfo;
		exit;
		}
		else
		{
			echo "<script>location.href='listing_two.php'</script>";
		}
	}
	function bid_shortlist($to, $name, $p)
	{
		$mail = new PHPMailer;		
		$mail->isSMTP();                                      // Set mailer to use SMTP
		$mail->Host = 'smtp.gmail.com';  	// Specify main and backup server
		$mail->SMTPAuth = true;                               // Enable SMTP authentication
		$mail->Username = 'buzzibarter@gmail.com';                            // SMTP username suratrealestate2015@gmail.com
		$mail->Password = 'Ilovemyparents';                           // SMTP password suratrealestate
		$mail->SMTPSecure = 'ssl';                            // Enable encryption, 'ssl' also accepted
		$mail->Port = '465';						//Port Number
		
		$mail->From = 'buzzibarter@gmail.com';			//From Email Id
		$mail->FromName = 'Buzzibarter - Reply of your Bidding';		//From Email Id Display Name
		//$mail->addAddress('josh@example.net', 'Josh Adams');  // Add a recipient
		$mail->addAddress($to);               // Name is optional
		//$mail->addReplyTo('info@example.com', 'Information');
		//$mail->addCC('cc@example.com');
		//$mail->addBCC('bcc@example.com');
		
		$mail->WordWrap = 50;                                 // Set word wrap to 50 characters
		//$mail->addAttachment('');         // Add attachments
		//$mail->addAttachment('','');    // Optional name
		$mail->isHTML(true);                                  // Set email format to HTML

		$url="http://localhost/client_php/view/includes/emal/bid_shortlist.php?na=$p&uname=$name";
		$a="uname";
		if(($Content = file_get_contents($url)) === false) {
		$Content = "";
			}

		$mail->Subject = 'Action on your Uploaded Product';
		$mail->Body    = $Content;
						
		//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

		if(!$mail->send())
		{
			//header("location:thanks.php");
		echo 'Message could not be sent.';
		echo 'Mailer Error: ' . $mail->ErrorInfo;
		exit;
		}
		else
		{
			echo "<script>location.href='short_listed_biddings.php'</script>";
		}
	}
	function winner($to, $name, $p)
	{
		$mail = new PHPMailer;		
		$mail->isSMTP();                                      // Set mailer to use SMTP
		$mail->Host = 'smtp.gmail.com';  	// Specify main and backup server
		$mail->SMTPAuth = true;                               // Enable SMTP authentication
		$mail->Username = 'buzzibarter@gmail.com';                            // SMTP username suratrealestate2015@gmail.com
		$mail->Password = 'Ilovemyparents';                           // SMTP password suratrealestate
		$mail->SMTPSecure = 'ssl';                            // Enable encryption, 'ssl' also accepted
		$mail->Port = '465';						//Port Number
		
		$mail->From = 'buzzibarter@gmail.com';			//From Email Id
		$mail->FromName = 'Buzzibarter - Reply of your Bidding';		//From Email Id Display Name
		//$mail->addAddress('josh@example.net', 'Josh Adams');  // Add a recipient
		$mail->addAddress($to);               // Name is optional
		//$mail->addReplyTo('info@example.com', 'Information');
		//$mail->addCC('cc@example.com');
		//$mail->addBCC('bcc@example.com');
		
		$mail->WordWrap = 50;                                 // Set word wrap to 50 characters
		//$mail->addAttachment('');         // Add attachments
		//$mail->addAttachment('','');    // Optional name
		$mail->isHTML(true);                                  // Set email format to HTML

		$url="http://localhost/client_php/view/includes/emal/winner.php?na=$p&uname=$name";
		$a="uname";
		if(($Content = file_get_contents($url)) === false) {
		$Content = "";
			}

		$mail->Subject = 'Action on your Uploaded Product';
		$mail->Body    = $Content;
						
		//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

		if(!$mail->send())
		{
			//header("location:thanks.php");
		echo 'Message could not be sent.';
		echo 'Mailer Error: ' . $mail->ErrorInfo;
		exit;
		}
		else
		{
			echo "<script>location.href='winning_bids.php'</script>";
		}
	}
}
?>