<footer id="footer" class="footer">

	<div class="footer-content">
		<div class="container">

			<div class="row g-5">
				<div class="col-lg-4">
					<h3 class="footer-heading">About Zappy</h3>
					<p> This is a tech blog developed by Devic developer #awesome content for awesome people</p>
					<p><a href="about.html" class="footer-link-more">Learn More</a></p>
				</div>
				<div class="col-6 col-lg-2">
					<h3 class="footer-heading">Navigation</h3>
					<ul class="footer-links list-unstyled">
						<li><a href="index.php?"><i class="bi bi-chevron-right"></i> Home</a></li>
						<li><a href="category.php?category=technology"><i class="bi bi-chevron-right"></i> Categories</a></li>
						<li><a href="single-post.php?post=31"><i class="bi bi-chevron-right"></i> Single Post</a></li>
						<li><a href="about.php?"><i class="bi bi-chevron-right"></i> About us</a></li>
						<li><a href="admin/admin_register.php?"><i class="bi bi-chevron-right"></i> Register</a></li>
					</ul>
				</div>
				<div class="col-6 col-lg-2">
					<h3 class="footer-heading">Categories</h3>
					<ul class="footer-links list-unstyled">
						<?php
						$query = "SELECT tag FROM `posts` LIMIT 5";
						$run_query = mysqli_query($conn, $query) or die(mysqli_error($conn));
						if (mysqli_num_rows($run_query) > 0) {
							while ($row = mysqli_fetch_assoc($run_query)) {
								$post_tag = $row['tag'];
								if (is_string($post_tag)){
									?><li><a href="category.php?category=<?php echo $post_tag?>"><i class="bi bi-chevron-right"></i> <?php echo $post_tag?></a></li>
								<?php }
								else{ echo "No categories";}}}
						?>

					</ul>
				</div>

				<div class="col-lg-4">
					<h3 class="footer-heading">Recent Posts</h3>

					<ul class="footer-links footer-blog-entry list-unstyled">
						<?php
						$query = "SELECT * FROM `posts` WHERE status='published' ORDER BY updated_on DESC LIMIT 5";
						$run_query = mysqli_query($conn, $query) or die(mysqli_error($conn));
						if (mysqli_num_rows($run_query) > 0) {
							while ($row = mysqli_fetch_assoc($run_query)) {
								$post_id = $row['id'];
								$post_title = $row['title'];
								$post_author = $row['author'];
								$post_image = $row['image'];
								$post_tags = $row['tag'];
								$post_date = $row['postdate'];
								if ($post_status='published'){
									?>
									<li>
									<a href="single-post.php?post=<?php echo $post_id;?>" class="d-flex align-items-center">
										<img src="assets/img/Posts/<?php echo $post_image?>" alt="" class="img-fluid me-3">

										<div>
											<div class="post-meta d-block"><span class="date"><?php echo $post_tags?></span> <span class="mx-1">&bullet;</span> <span><?php echo $post_date?></span></div>
											<span><?php echo $post_title?></span>
										</div>
									</a>
									</li>

								<?php }
								else{ echo "No Latest posts";}}}
						?>

					</ul>

				</div>
			</div>
		</div>
	</div>

	<div class="footer-legal">
		<div class="container">

			<div class="row justify-content-between">
				<div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
					<div class="copyright">
						© Copyright <strong><span>2022</span></strong>. All Rights Reserved
					</div>

					<div class="credits">
						Powered by <a href="https://devic.info/">Devic Developer</a>
					</div>

				</div>

				<div class="col-md-6">
					<div class="social-links mb-3 mb-lg-0 text-center text-md-end">
						<a href="https://twitter.com/devic_co" class="twitter"><i class="bi bi-twitter"></i></a>
						<a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
						<a href="https://github.com/vic-mwenda" class="instagram"><i class="bi bi-github"></i></a>
						<a href="#" class="google-plus"><i class="bi bi-skype"></i></a>
						<a href="https://www.linkedin.com/in/victor-mwenda-5b2b1219a/" class="linkedin"><i class="bi bi-linkedin"></i></a>

					</div>

				</div>

			</div>

		</div>
	</div>

</footer>

<a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="assets/vendor/aos/aos.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>

</body>

</html>
