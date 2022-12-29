<?php
 require __DIR__.'/includes/connection.php';
 include 'google_auth.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include 'PHPMailer-master/src/Exception.php';
include 'PHPMailer-master/src/PHPMailer.php';
include 'PHPMailer-master/src/SMTP.php';


if (isset($_POST['add'])) {
	include "GUMP-master/gump.class.php";
	$gump = new GUMP();
	$_POST = $gump->sanitize($_POST);

	$gump->validation_rules(array(
		'username'    => 'required|alpha_numeric|max_len,20|min_len,4',
		'firstname'   => 'required|alpha|max_len,30|min_len,2',
		'lastname'    => 'required|alpha|max_len,30|min_len,1',
		'email'       => 'required|valid_email',
		'password'    => 'required|max_len,50|min_len,6',
	));
	$gump->filter_rules(array(
		'username' => 'trim|sanitize_string',
		'firstname' => 'trim|sanitize_string',
		'lastname' => 'trim|sanitize_string',
		'password' => 'trim',
		'email'    => 'trim|sanitize_email',
	));
	$validated_data = $gump->run($_POST);

	if($validated_data === false) {
		?>
		<center><font color="red" > <?php echo $gump->get_readable_errors(true); ?> </font></center>
		<?php
	}
	else if ($_POST['password'] !== $_POST['cpassword'])
	{
		echo  "<center><font color='red'>Passwords do not match </font></center>";
	}
	else {
		$username = $validated_data['username'];
		$firstname = $validated_data['firstname'];
		$lastname = $validated_data['lastname'];
		$email = $validated_data['email'];
		$role = $_POST['role'];
		$pass = $validated_data['password'];
		$password = password_hash("$pass" , PASSWORD_DEFAULT);
		$query = "INSERT INTO users(username,firstname,lastname,email,password,role) VALUES ('$username' , '$firstname' , '$lastname' , '$email', '$password' , '$role')";
		$result = mysqli_query($conn , $query) or die(mysqli_error($conn));
		if (mysqli_affected_rows($conn) > 0) {


			$hash =md5(rand(1000,5000));
			$mail = new PHPMailer(true);
			$mail -> isSMTP();
			$mail -> Host ='smtp.gmail.com';
			$mail -> SMTPAuth = true;
			$mail -> Username = 'mwendav6@gmail.com';
			$mail -> Password = 'jfpvjscxwdgzkxdo';
			$mail -> SMTPSecure = 'ssl';
			$mail -> Port = 465;
			$mail -> setFrom('mwendav6@gmail.com');
			$mail -> addAddress($_POST['email']);
			$mail -> isHTML(true);
			$mail -> Subject = 'Signup | Verification';
			$mail -> Body =
				'
		         <!DOCTYPE html>
                 <html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="x-apple-disable-message-reformatting">
	<title></title>

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">

	<!-- CSS Reset : BEGIN -->
	<style>

		html,
		body {
			margin: 0 auto !important;
			padding: 0 !important;
			height: 100% !important;
			width: 100% !important;
			background: #f1f1f1;
		}

		/* What it does: Stops email clients resizing small text. */
		* {
			-ms-text-size-adjust: 100%;
			-webkit-text-size-adjust: 100%;
		}

		/* What it does: Centers email on Android 4.4 */
		div[style*="margin: 16px 0"] {
			margin: 0 !important;
		}

		/* What it does: Stops Outlook from adding extra spacing to tables. */
		table,
		td {
			mso-table-lspace: 0pt !important;
			mso-table-rspace: 0pt !important;
		}

		/* What it does: Fixes webkit padding issue. */
		table {
			border-spacing: 0 !important;
			border-collapse: collapse !important;
			table-layout: fixed !important;
			margin: 0 auto !important;
		}

		/* What it does: Uses a better rendering method when resizing images in IE. */
		img {
			-ms-interpolation-mode:bicubic;
		}

		/* What it does: Prevents Windows 10 Mail from underlining links despite inline CSS. Styles for underlined links should be inline. */
		a {
			text-decoration: none;
		}

		/* What it does: A work-around for email clients meddling in triggered links. */
		*[x-apple-data-detectors],  /* iOS */
		.unstyle-auto-detected-links *,
		.aBn {
			border-bottom: 0 !important;
			cursor: default !important;
			color: inherit !important;
			text-decoration: none !important;
			font-size: inherit !important;
			font-family: inherit !important;
			font-weight: inherit !important;
			line-height: inherit !important;
		}

		/* What it does: Prevents Gmail from displaying a download button on large, non-linked images. */
		.a6S {
			display: none !important;
			opacity: 0.01 !important;
		}

		/* What it does: Prevents Gmail from changing the text color in conversation threads. */
		.im {
			color: inherit !important;
		}

		/* If the above doesn\'t work, add a .g-img class to any image in question. */
		img.g-img + div {
			display: none !important;
		}

		/* What it does: Removes right gutter in Gmail iOS app: https://github.com/TedGoas/Cerberus/issues/89  */
		/* Create one of these media queries for each additional viewport size you\'d like to fix */

		/* iPhone 4, 4S, 5, 5S, 5C, and 5SE */
		@media only screen and (min-device-width: 320px) and (max-device-width: 374px) {
			u ~ div .email-container {
				min-width: 320px !important;
			}
		}
		/* iPhone 6, 6S, 7, 8, and X */
		@media only screen and (min-device-width: 375px) and (max-device-width: 413px) {
			u ~ div .email-container {
				min-width: 375px !important;
			}
		}
		/* iPhone 6+, 7+, and 8+ */
		@media only screen and (min-device-width: 414px) {
			u ~ div .email-container {
				min-width: 414px !important;
			}
		}

	</style>


	<style>


		.bg_white{
			background: #ffffff;
		}
		.bg_light{
			background: #fafafa;
		}
		.email-section{
			padding:2.5em;
		}

		/*BUTTON*/
		.btn{
			padding: 10px 15px;
			display: inline-block;
		}
		.btn.btn-primary{
			border-radius: 5px;
			background: #000000;
			color: #ffffff;
		}
		.btn.btn-white{
			border-radius: 5px;
			background: #ffffff;
			color: #000000;
		}
		.btn.btn-white-outline{
			border-radius: 5px;
			background: transparent;
			border: 1px solid #fff;
			color: #fff;
		}
		.btn.btn-black-outline{
			border-radius: 0px;
			background: transparent;
			border: 2px solid #000;
			color: #000;
			font-weight: 700;
		}

		h1,h2,h3,h4,h5,h6{
			font-family: \'EB Garamond\', serif;
			color: #000000;
			margin-top: 0;
			font-weight: 400;
		}

		body{
			font-family:\'EB Garamond\', serif;
			font-weight: 400;
			font-size: 15px;
			line-height: 1.8;
			color: rgba(0,0,0,.4);
		}

		a{
			color: #30e3ca;
		}

		table{
		}
		/*LOGO*/

		.logo h1{
			margin: 0;
		}
		.logo h1 a{
			color: #000000;
			font-size: 24px;
			font-weight: 700;
			font-family: \'EB Garamond\', serif;
		}

		/*HERO*/
		.hero{
			position: relative;
			z-index: 0;
		}

		.hero .text{
			color: rgba(0,0,0,.3);
		}
		.hero .text h2{
			color: #000;
			font-size: 40px;
			margin-bottom: 0;
			font-weight: 400;
			line-height: 1.4;
		}
		.hero .text h3{
			font-size: 24px;
			font-weight: 300;
		}
		.hero .text h2 span{
			font-weight: 600;
			color: #000000;
		}


		/*HEADING SECTION*/
		.heading-section{
		}
		.heading-section h2{
			color: #000000;
			font-size: 28px;
			margin-top: 0;
			line-height: 1.4;
			font-weight: 400;
		}

		.heading-section-white h2{
			font-family:\'EB Garamond\', serif;
			line-height: 1;
			padding-bottom: 0;
		}
		.heading-section-white h2{
			color: #ffffff;
		}

		ul.social li{
			display: inline-block;
			margin-right: 10px;
		}

		/*FOOTER*/

		.footer{
			border-top: 1px solid rgba(0,0,0,.05);
			color: rgba(0,0,0,.5);
		}
		.footer .heading{
			color: #000;
			font-size: 20px;
		}
		.footer ul{
			margin: 0;
			padding: 0;
		}
		.footer ul li{
			list-style: none;
			margin-bottom: 10px;
		}
		.footer ul li a{
			color: rgba(0,0,0,1);
		}


		@media screen and (max-width: 500px) {


		}


	</style>


</head>

<body width="100%" style="margin: 0; padding: 0 !important; mso-line-height-rule: exactly; background-color: #f1f1f1;">
<center style="width: 100%; background-color: #f1f1f1;">
	<div style="display: none; font-size: 1px;max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden; mso-hide: all; font-family: sans-serif;">
		&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;
	</div>
	<div style="max-width: 600px; margin: 0 auto;" class="email-container">
		<!-- BEGIN BODY -->
		<table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="margin: auto;">
			<tr>
				<td valign="top" class="bg_white" style="padding: 1em 2.5em 0 2.5em;">
					<table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
						<tr>
							<td class="logo" style="text-align: center;">
								<h1><a href="#">Zappy</a></h1>
							</td>
						</tr>
					</table>
				</td>
			</tr><!-- end tr -->
			<tr>
				<td valign="middle" class="hero bg_white" style="padding: 3em 0 2em 0;">
					<img src="images/email.png" alt="" style="width: 300px; max-width: 600px; height: auto; margin: auto; display: block;">
				</td>
			</tr><!-- end tr -->
			<tr>
				<td valign="middle" class="hero bg_white" style="padding: 2em 0 4em 0;">
					<table>
						<tr>
							<td>
								<div class="text" style="padding: 0 2.5em; text-align: center;">
									<h2>Please verify your email</h2>
									<h3>Amazing content, updates, interesting stories right in your inbox</h3>
									<p><a href="http://dry-tor-98820.herokuapp.com/verify.php?email='.$email.'&&hash='.$hash.'" class="btn btn-primary">Yes! Verify now</a></p>
								</div>
							</td>
						</tr>
					</table>
				</td>
			</tr><!-- end tr -->
			<!-- 1 Column Text + Button : END -->
		</table>
		<table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="margin: auto;">
			<tr>
				<td valign="middle" class="bg_light footer email-section">
					<table>
						<tr>
							<td valign="top" width="33.333%" style="padding-top: 20px;">
								<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
									<tr>
										<td style="text-align: left; padding-right: 10px;">
											<h3 class="heading">About</h3>
											<p>This is a tech blog developed by Devic developer #awesome content for awesome people</p>
										</td>
									</tr>
								</table>
							</td>
							<td valign="top" width="33.333%" style="padding-top: 20px;">
								<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
									<tr>
										<td style="text-align: left; padding-left: 5px; padding-right: 5px;">
											<h3 class="heading">Contact Info</h3>
											<ul>
												<li><span class="text">Nairobi, KENYA</span></li>
												<li><span class="text">+254 759261505</span></a></li>
											</ul>
										</td>
									</tr>
								</table>
							</td>
							<td valign="top" width="33.333%" style="padding-top: 20px;">
								<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
									<tr>
										<td style="text-align: left; padding-left: 10px;">
											<h3 class="heading">Useful Links</h3>
											<ul>
												<li><a href="localhost/Zappy/index.php">Read</a></li>
												<li><a href="localhost/Zappy/index.php">Our Story</a></li>
											</ul>
										</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
				</td>
			</tr><!-- end: tr -->
			<tr>
				<td class="bg_light" style="text-align: center;">
					<p>Please do not reply to this email. Emails sent to this address will not be answered.</p>
					<p>Copyright © 1999-2022 Zappy,LLC Kenya. All rights reserved. <br>
						<a href="#" style="color: rgba(0,0,0,.8);">Contact us?</a></p>
				</td>
			</tr>
		</table>

	</div>
</center>
</body>
</html>
                '; // Our message above including the link

			//send verification email

			$mail -> send();
			if ($mail!= true){
				echo "<script> alert('An error occured, Try again!'); </script>";
			}else {
				echo "<script>alert('REGISTERED SUCCESSFULLY');
      	window.location.href='../email-confirmation.php';</script>";
			}
		}
		else {
			echo "<script> alert('An error occured, Try again!'); </script>";
		}
	}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Register</title>
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
	<style media="screen">
		*,
		*:before,
		*:after{
			padding: 0;
			margin: 0;
			box-sizing: border-box;
		}
		body{
			background-color: #dddddd;
		}
		.background{
			width: 430px;
			height: 520px;
			position: absolute;
			transform: translate(-50%,-50%);
			left: 50%;
			top: 50%;
		}
		.background .shape{
			height: 200px;
			width: 200px;
			position: absolute;
			border-radius: 50%;
		}
		.shape:first-child{
			background:#000000;
			left: -100px;
			top: -200px;
		}
		.shape:last-child{
			background:#6C63FF;
			right: -70px;
			bottom: -300px;
		}
		@media (max-width: 738px) {
			.shape{
				display: none;
			}
			form{
				height:800px;
				background-color: #dddddd;

			}
		}


		form{
			margin-top: 50px;
			height: 100%;
			width: 400px;
			background-color: rgba(255,255,255,0.13);
			position: absolute;
			transform: translate(-50%,-50%);
			top: 50%;
			left: 50%;
			border-radius: 10px;
			backdrop-filter: blur(10px);
			border: 2px solid rgba(255,255,255,0.1);
			box-shadow: 0 0 40px rgba(8,7,16,0.6);
			padding: 50px 35px;
		}
		form *{
			font-family: 'EB Garamond', serif;
			color: #1e1e1e;
			letter-spacing: 0.5px;
			outline: none;
			border: none;
		}

		form h2{
			font-size: 30px;
			font-weight: 700;
			color: #212529;
			text-align: center;
		}
		form h3{
			font-size: 32px;
			font-weight: 500;
			line-height: 42px;
			text-align: center;
		}

		label{
			display: block;
			margin-top: 30px;
			font-size: 16px;
			font-weight: 500;
		}
		input{
			display: block;
			height: 50px;
			width: 100%;
			background-color: rgba(55, 55, 55, 0.14);
			border-radius: 3px;
			padding: 0 10px;
			margin-top: 8px;
			font-size: 14px;
			font-weight: 300;
		}
		::placeholder{
			color: #1e1e1e;
		}
		button{
			margin-top: 50px;
			width: 100%;
			background-color: #ffffff;
			color: #080710;
			padding: 15px 0;
			font-size: 18px;
			font-weight: 600;
			border-radius: 5px;
			cursor: pointer;
		}
		.social{
			margin-top: 30px;
			margin-bottom: 50px;
			display: flex;
		}
		.social div{
			background: red;
			width: 150px;
			border-radius: 3px;
			padding: 5px 10px 10px 5px;
			background-color: rgba(255,255,255,0.27);
			color: #1e1e1e;
			text-align: center;
		}
		.social div:hover{
			background-color: rgba(255,255,255,0.47);
		}
		.social .fb{
			margin-left: 25px;
		}
		.social i{
			margin-right: 4px;
		}
		}

	</style>
</head>
<body>
<div class="background">
	<div class="shape"></div>
	<div class="shape"></div>
</div>
<form method="POST" action="" enctype="multipart/form-data">

	<a href="../index.php?"><h2>ZAPPY</h2></a>

	<label for="user_title">User Name</label>
	<input type="text" name="username" class="form-control" required>

	<label for="user_author">FirstName</label>
	<input type="text" name="firstname" class="form-control" required>

	<label for="user_status">LastName</label>
	<input type="text" name="lastname" class="form-control" required>

	<select class="form-control" name="role" id="">
		<label for="user_role">Role</label>
		<?php
		echo "<option value='user'>User</option>";
		?>

	</select>
	<label for="user_tag">Email</label>
	<input type="email" name="email" class="form-control" required>

	<label for="user_tag">Password</label>
	<input type="password" name="password" class="form-control" required>

	<label for="user_tag">Confirm Password</label>
	<input type="password" name="cpassword" class="form-control" required>

	<button type="submit" name="add" class="btn btn-primary" value="Add User">Register</button>

	<a href="index.php" style="margin-top: 40px;text-align: center">Have account. <span>Login now?</span> </a>

	<div class="social">
		<div class="go"><a href="<?php echo $client->createAuthUrl()?>"><i class="fab fa-google" style="color: red"></i>  Google</a></div>
		<div class="fb"><i class="fab fa-facebook" style="color: blue"></i>  Facebook</div>
	</div>
</form>
</body>
</html>
