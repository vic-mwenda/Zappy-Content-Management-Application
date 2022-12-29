<?php
session_start()
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">

	<title>Dashboard</title>
	<meta content="" name="description">
	<meta content="" name="keywords">

	<!-- Favicons -->
	<link href="assets/img/zappy-logo-1.png" rel="icon">

	<!-- Google Fonts -->
	<link href="https://fonts.gstatic.com" rel="preconnect">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

	<!-- Vendor CSS Files -->
	<link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
	<link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
	<link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
	<link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
	<link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
	<link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

	<link href="assets/css/style.css" rel="stylesheet">

</head>

<body>
<?php
include 'includes/connection.php';
$username=$_SESSION['username'];
$query = "SELECT * FROM users WHERE username = '$username'";
$result = mysqli_query($conn , $query) or die(mysqli_error($conn));
$rows = mysqli_num_rows($result);
if ($rows > 0) {
	$row = mysqli_fetch_assoc($result);
	$profile_image = $row['profileimage'];
}
?>

<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center">

	<div class="d-flex align-items-center justify-content-between">
		<a href="../index.php?" class="logo d-flex align-items-center">
			<img src="assets/img/zappy-logo-1.png" alt="">
			<span class="d-none d-lg-block">Zappy</span>
		</a>
		<i class="bi bi-list toggle-sidebar-btn"></i>
	</div><!-- End Logo -->

	<div class="search-bar">
		<form class="search-form d-flex align-items-center" method="POST" action="#">
			<input type="text" name="query" placeholder="Search" title="Enter search keyword">
			<button type="submit" title="Search"><i class="bi bi-search"></i></button>
		</form>
	</div><!-- End Search Bar -->

	<nav class="header-nav ms-auto">
		<ul class="d-flex align-items-center">

			<li class="nav-item d-block d-lg-none">
				<a class="nav-link nav-icon search-bar-toggle " href="#">
					<i class="bi bi-search"></i>
				</a>
			</li><!-- End Search Icon-->

			<li class="nav-item dropdown">

				<a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
					<i class="bi bi-bell"></i>
					<span class="badge bg-primary badge-number">1</span>
				</a><!-- End Notification Icon -->

				<ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
					<li class="dropdown-header">
						You have 1 new notifications
						<a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
					</li>
					<li>
						<hr class="dropdown-divider">
					</li>

					<li class="notification-item">
						<i class="bi bi-exclamation-circle text-warning"></i>
						<div>
							<h4>ERROR</h4>
							<p>Update error</p>
							<p>30 min. ago</p>
						</div>
					</li>

					<li class="dropdown-footer">
						<a href="#">Show all notifications</a>
					</li>

				</ul><!-- End Notification Dropdown Items -->

			</li><!-- End Notification Nav -->

			<li class="nav-item dropdown pe-3">

				<a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
					<img src="assets/img/profile-images/<?php echo $profile_image?>" alt="Profile" class="rounded-circle">
					<span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $_SESSION['username']; ?></span>
				</a><!-- End Profile Iamge Icon -->

				<ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
					<li class="dropdown-header">
						<h6>Kevin Anderson</h6>
						<span>Web Designer</span>
					</li>
					<li>
						<hr class="dropdown-divider">
					</li>

					<li>
						<a class="dropdown-item d-flex align-items-center" href="users-profile.php?">
							<i class="bi bi-person"></i>
							<span>My Profile</span>
						</a>
					</li>
					<li>
						<hr class="dropdown-divider">
					</li>

					<li>
						<a class="dropdown-item d-flex align-items-center" href="users-profile.php?">
							<i class="bi bi-gear"></i>
							<span>Account Settings</span>
						</a>
					</li>
					<li>
						<hr class="dropdown-divider">
					</li>
					<li>
						<hr class="dropdown-divider">
					</li>

					<li>
						<a class="dropdown-item d-flex align-items-center" href="logout.php?">
							<i class="bi bi-box-arrow-right"></i>
							<span>Sign Out</span>
						</a>
					</li>

				</ul><!-- End Profile Dropdown Items -->
			</li><!-- End Profile Nav -->

		</ul>
	</nav><!-- End Icons Navigation -->

</header><!-- End Header -->
