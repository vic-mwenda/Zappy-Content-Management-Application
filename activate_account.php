<?php
include 'includes/header.php';
include 'includes/nav_bar.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include 'PHPMailer-master/src/Exception.php';
include 'PHPMailer-master/src/PHPMailer.php';
include 'PHPMailer-master/src/SMTP.php';

?>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
</head>
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

	form{
		height: 400px;
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

	}

</style>
<body>
<div class="background">
	<div class="shape"></div>
	<div class="shape"></div>
</div>
<?php
if (isset($_POST['activate'])){
	$email = $_POST['email'];
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
  Thanks for signing up!Your account has been created, you can login after you have activated your account by pressing the url below. <br>

<br><br>

  Please click this link to activate your account: <br>
  <a href="http://dry-tor-98820.herokuapp.com/verify.php?email='.$email.'&hash='.$hash.'">http://localhost/Zappy/verify.php?email='.$email.'&hash='.$hash.'</a>'; // Our message above including the link

	//send verification email

	$mail -> send();
	if ($mail!= true){
		echo "<script> alert('An error occured, Try again!'); </script>";
	}else {
		echo "<script>alert('Email Sent');
      	window.location.href='email-confirmation.php';</script>";
	}

}

?>
<form method="POST" action="">
	<a href="../index.php?"><h2>ZAPPY</h2></a>
	<label for="email">Email</label>

	<input name="email" type="email" class="form-control" id="username" placeholder="Enter Your email" required>

	<button name="activate" type="submit">Activate account</button>

</form>
</body>
</html>




