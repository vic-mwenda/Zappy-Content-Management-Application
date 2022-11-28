<?php
require 'includes/connection.php';
session_start();

if(isset($_SESSION['username'])){
	header('Location: index.php');
	exit;
}
require 'google-api-php-client-2.4.0/vendor/autoload.php';
// Creating new google client instance
$client = new Google_Client();
$client->setClientId('184227828611-fnjdmjosoj5gub0si6csm2j18tnqlpch.apps.googleusercontent.com');
$client->setClientSecret('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');
$client->setRedirectUri('http://dry-tor-98820.herokuapp.com/google_auth.php');
$client->addScope("email");
$client->addScope("profile");


if(isset($_GET['code'])):
	$token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
	if(!isset($token["error"])){
		$client->setAccessToken($token['access_token']);
		// getting profile information
		$google_oauth = new Google_Service_Oauth2($client);
		$google_account_info = $google_oauth->userinfo->get();

//		 Storing data into database
		$id = mysqli_real_escape_string($conn, $google_account_info->id);
		$full_name = mysqli_real_escape_string($conn, trim($google_account_info->name));
		$email = mysqli_real_escape_string($conn, $google_account_info->email);
		// checking user already exists or not
		$get_user = mysqli_query($conn, "SELECT `email` FROM `users` WHERE `email`='$email'");
		if(mysqli_num_rows($get_user) > 0){
			$_SESSION['username'] = $full_name;
			$_SESSION['role'] = 'user';
			header('Location: admin/dashboard.php');
			exit;
		}
		else{
			// if user not exists we will insert the user
			$insert = mysqli_query($conn, "INSERT INTO `users`(`username`, `firstname`, `lastname`, `email`, `password`, `role`) VALUES ('$full_name','','','$email','','user');
");
			if($insert){
				$_SESSION['username'] = $full_name;
				$_SESSION['role'] = 'user';

				header('Location: admin/dashboard.php');
				exit;
			}
			else{
				die ("error" . mysqli_error($conn));
			}
		}
	}
	else{
		header('Location: admin/index.php');
		exit;
	}

endif;

