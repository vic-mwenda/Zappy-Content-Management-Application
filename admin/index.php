<style>
	.container{
		justify-content: center;
		text-align: center;
		align-items: center;
		width: 100%;
		height: 100%;
		margin-top: 20vh;

	}
	.container h4{
		color: #1e1e1e;
		font-weight: 700;
		font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
		font-size: 24px;
	}
	.container input{
		width: 50vh;
		margin-top: 30px;
		padding-top: 20px;
		border-radius: 5px;
	}
	.container button{
		width: 50vh;
		margin-top: 30px;
		padding-top: 20px;
		background-color: #0a58ca;
		border: none;
		cursor: pointer;
		border-radius: 5px;
	}
	button:hover {
		opacity: 0.8;

	}
	.container input::placeholder{
		text-align: center;
		justify-items: center;
	}
</style>
<div class="container">
	<h4>ZAPPY ADMIN</h4>
	<form method="POST" action="adminlogin.php">
		<div class="">
			<input name="user_name" type="text" class="form-control" placeholder="Enter Username" required>
			<br>
		</div>

		<div class="input-group">
			<input name="user_password" type="password" class="form-control" placeholder="Enter Passsword" required>
			<br>
			<span class="input-group-btn">
				<button name="login" class="btn btn-primary" type="submit"> LOGIN</button>
		</span>
		</div>
</div>
