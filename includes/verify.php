<?php include 'includes/connection.php';
if(isset($_GET['email']) &&  isset($_GET['hash'])){
	// Verify data
	$email = $_GET['email']; // Set email variable
	$hash = $_GET['hash']; // Set hash variable
	$query = "SELECT email,active FROM users WHERE email='".$email."'AND active='0'";

	$search = mysqli_query($conn,$query) or die(mysqli_error());
	$match  = mysqli_num_rows($search);

	if($match > 0){
		// We have a match, activate the account
		$query="UPDATE users SET active='1' WHERE email='".$email."' AND active='0'";
		mysqli_query($conn,$query) or die(mysqli_error());
		echo '<script>
alert("your account was created successfully");
window.location.href="../index.php";
</script>';
	}else{
		$query = "SELECT email,active FROM users WHERE email='".$email."'AND active='1'";
		$run = mysqli_query($conn,$query);
		$row = mysqli_num_rows($run);
		if ($row > 0){
		// No match -> invalid url or account has already been activated.
		echo '<script>
alert("Account active. Login Now");
window.location.href="../index.php";
</script>';
	}

}}
