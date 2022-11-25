<?php include 'includes/connection.php';
if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash'])){
	// Verify data
	$email = mysqli_escape_string($_GET['email']); // Set email variable
	$hash = mysqli_escape_string($_GET['hash']); // Set hash variable

	$search = mysqli_query("SELECT email,active FROM users WHERE email='".$email."'AND active='0'") or die(mysqli_error());
	$match  = mysqli_num_rows($search);

	if($match > 0){
		// We have a match, activate the account
		mysqli_query("UPDATE users SET active='1' WHERE email='".$email."' AND active='0'") or die(mysqli_error());
		echo '<script>
alert("your account was created successfully");
window.location.href="../admin/index.php";
</script>';
	}else{
		// No match -> invalid url or account has already been activated.
		echo '<script>
alert("There was an error creating your account");
</script>';
	}

}
