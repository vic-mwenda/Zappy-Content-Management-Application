<?php include 'includes/connection.php';
?>
<?php include 'includes/header.php';?>

<?php include 'includes/nav_bar.php';?>


<style>
	.email-confirmation{
		margin-top: 200px;
		margin-bottom: 200px;
	}
	.email-confirmation h2{
		font-size: 20px;
	}
	@media (max-width: 720px) {
		.email-confirmation .illustration2{
			display: none;
		}
	}
</style>

<div class="email-confirmation d-flex justify-content-center align-items-center">
	<img src="assets/img/email-verification.svg" alt="illustration" class="img-fluid illustration2">
	<h2>
		You Have successfully been registered. <br>
		<a href="https://gmail.com" style="color: #0f3d81">Please verify your email address by clicking the link sent to you in your email address</a
	</h2>

</div>


<?php include 'includes/footer.php';?>
