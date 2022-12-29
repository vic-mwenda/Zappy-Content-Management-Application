<header id="header" class="header d-flex align-items-center fixed-top">
	<div class="container-fluid container-xl d-flex align-items-center justify-content-between">

		<a href="index.php?" class="logo d-flex align-items-center">
			<img src="assets/img/zappy-logo-1.png" alt="">
			<span class="d-none d-lg-block">Zappy</span>
		</a>

		<nav id="navbar" class="navbar">
			<ul>
				<?php
				if (isset($_SESSION['username'])) {
				?>
				<li><a href="admin/add_post.php?">Write</a></li>
				<?php }?>
				<?php
				$query = "SELECT * FROM `posts` WHERE id=34 ORDER BY updated_on DESC";
				$run_query = mysqli_query($conn, $query) or die(mysqli_error($conn));
				if (mysqli_num_rows($run_query) > 0) {
				while ($row = mysqli_fetch_assoc($run_query)) {
					$post_id = $row['id'];
				if ($post_status='published'){
				?><li><a href="single-post.php?post=<?php echo $post_id;?>">Read</a></li>
				<?php }
					  else{ echo "No content posts";}}}
					  ?>

				<li class="dropdown"><a href=""><span>Topics</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
					<ul>
						<li><a href="category.php?category=programming" style="text-transform: lowercase;">Programming</a></li>
						<li>
							<hr class="dropdown-divider">
						</li>
						<li><a href="category.php?category=artificial intelligence" style="text-transform: lowercase;">artificial intelligence</a></li>
						<liclass="dropdown-divider"></li>
						<li><a href="category.php?category=machine learning" style="text-transform: lowercase;">machine learning</a></li>
						<li>
							<hr class="dropdown-divider">
						</li>
						<li><a href="category.php?category=networking" style="text-transform: lowercase;">networking</a></li>
						<li>
							<hr class="dropdown-divider">
						</li>
						<li><a href="category.php?category=data science" style="text-transform: lowercase;">data science</a></li>
						<li>
							<hr class="dropdown-divider">
						</li>
						<li><a href="category.php?category=computer hardware" style="text-transform: lowercase;">computer hardware</a></li>

					</ul>

				<li><a href="about.php?">Our Story</a></li>

				<li style="display: none">
					<a class=" js-search-open"><span class=""></a>
					<button class=" js-search-close"></button>
				</li>
			</ul>

			<div class="dropdown user-icon">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user "></i><b class="caret"></b></a>
				<ul class="dropdown-menu">
					<?php
					if (isset($_SESSION['username'])) {
						?>
						<li class="dropdown-header">
							<h6><?php echo $_SESSION['username']?></h6>
							<span><?php echo $_SESSION['role']?></span>
						</li>
						<li>
							<hr class="dropdown-divider">
						</li>
						<li>
							<a class="dropdown-item d-flex align-items-center" href="admin/dashboard.php?"><i class="bi bi-person"></i> Dashboard</a>
						</li>
						<li>
							<hr class="dropdown-divider">
						</li>
						<li>
							<a class="dropdown-item d-flex align-items-center" href="admin/users-profile.php"><i class="bi bi-gear"></i> Account Settings</a>
						</li>
						<li>
							<hr class="dropdown-divider">
						</li>
						<li>
							<a class="dropdown-item d-flex align-items-center" href="admin/logout.php"><i class="bi bi-box-arrow-right"></i> Sign Out</a>
						</li>
						<?php
					} else{
						?>
						<li>
							<a class="dropdown-item d-flex align-items-center" href="admin/index.php"><i class="fa-solid fa-right-to-bracket"></i>Sign In</a>
						</li>

						<?php
					}
					?>

				</ul>
			</div>
		</nav><!-- .navbar -->






			<i class="bi bi-list mobile-nav-toggle"></i>

			<!-- ======= Search Form ======= -->


		</div>
</header><!-- End Header -->
