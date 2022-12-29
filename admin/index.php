<?php
//include 'google_auth.php';
//?>
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
			background-color: #edf2f4;
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
			background:#012970;
			left: -80px;
			top: -80px;
		}
		.shape:last-child{
			background:#000000;
			right: -30px;
			bottom: -80px;
		}


		form{
			height: 520px;
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
			font-size: 20px;
			font-weight: 700;
			color: #012970;
			font-family: "EB Garamond",serif;
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
<body>
<div class="background">
	<div class="shape"></div>
	<div class="shape"></div>
</div>
<form method="POST" action="adminlogin.php?">
	<a href="../index.php?"><h2>ZAPPY</h2></a>
	<label for="username">Username</label>

	<input name="user_name" type="text" class="form-control" id="username" placeholder="Enter Username" required>

	<label for="password">Password</label>
	<input name="user_password" type="password" class="form-control" id="password" placeholder="Password" required>

	<button name="login" type="submit">Log In</button>
	<a href="admin_register.php?" style="padding-top: 20px;text-align: center">do not have account register now?</a>
	<div class="social">
		<div class="go"><a href="<?php echo $client->createAuthUrl()?>"><i class="fab fa-google" style="color: red"></i>Google</a></div>
		<div class="fb"><i class="fab fa-facebook" style="color: blue"></i>Facebook</div>
	</div>
</form>
</body>
</html>

