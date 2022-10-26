<header id="header" class="header d-flex align-items-center fixed-top">
	<div class="container-fluid container-xl d-flex align-items-center justify-content-between">

		<a href="index.php" class="logo d-flex align-items-center">
			<h1>Zappy</h1>
		</a>

		<nav id="navbar" class="navbar">
			<ul>
				<li><a href="index.php?">Blog</a></li>
				<?php
				$query = "SELECT * FROM `posts` WHERE id=34 ORDER BY updated_on DESC";
				$run_query = mysqli_query($conn, $query) or die(mysqli_error($conn));
				if (mysqli_num_rows($run_query) > 0) {
				while ($row = mysqli_fetch_assoc($run_query)) {
					$post_id = $row['id'];
				if ($post_status='published'){
				?><li><a href="single-post.php?post=<?php echo $post_id;?>">Single Post</a></li>
				<?php }
					  else{ echo "No content posts";}}}
					  ?>

				<li class="dropdown"><a href="category.html"><span>Categories</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
					<ul>
						<li><a href="">Search Result</a></li>
						<li><a href="#">Drop Down 1</a></li>
						<li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
							<ul>
								<li><a href="#">Deep Drop Down 1</a></li>
								<li><a href="#">Deep Drop Down 2</a></li>
								<li><a href="#">Deep Drop Down 3</a></li>
								<li><a href="#">Deep Drop Down 4</a></li>
								<li><a href="#">Deep Drop Down 5</a></li>
							</ul>
						</li>
						<li><a href="#">Drop Down 2</a></li>
						<li><a href="#">Drop Down 3</a></li>
						<li><a href="#">Drop Down 4</a></li>
					</ul>
				</li>

				<li><a href="about.php?">About</a></li>
				<li><a href="admin/admin_register.php?">Register</a></li>
			</ul>
		</nav><!-- .navbar -->

		<div class="position-relative">
			<a href="#" class="mx-2"><span class="bi-facebook"></span></a>
			<a href="#" class="mx-2"><span class="bi-twitter"></span></a>
			<a href="#" class="mx-2"><span class="bi-instagram"></span></a>

			<a href="#" class="mx-2 js-search-open"><span class="bi-search"></span></a>
			<i class="bi bi-list mobile-nav-toggle"></i>

			<!-- ======= Search Form ======= -->
			<div class="search-form-wrap js-search-form-wrap">
				<form action="search.php" method="post" class="search-form">
					<span class="icon bi-search"></span>
					<input type="text" placeholder="Search" class="form-control">
					<input type="submit" placeholder="su">
					<button class="btn js-search-close"><span class="bi-x"></span></button>
				</form>
			</div><!-- End Search Form -->

		</div>

	</div>

</header><!-- End Header -->
