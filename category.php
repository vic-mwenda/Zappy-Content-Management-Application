<?php
require_once "includes/connection.php";
require_once "includes/header.php";
require_once "includes/connection.php";
require_once "includes/nav_bar.php";
?>
<?php
if (isset($_GET['category'])) {
	$category = $_GET['category'];
	if (!is_string($category)) {
		header("location:index.php");
	}
}
else {
	header('location: index.php');
}
?>
<main id="main">
	<section>
		<div class="container">
			<div class="row">

				<div class="col-md-9" data-aos="fade-up">
					<h3 class="category-title">Category: <?php echo $category?></h3>
					<?php
					$query = "SELECT * FROM posts WHERE tag = '$category'";
					$run_query = mysqli_query($conn, $query) or die(mysqli_error($conn));
					if (mysqli_num_rows($run_query) > 0) {
					while ($row = mysqli_fetch_assoc($run_query)) {
					$post_title = $row['title'];
					$post_tags= $row['tag'];
					$post_date= $row['postdate'];
					$post_image = $row['image'];
					$post_id = $row['id'];
					$post_author= $row['author'];
					$post_content = $row['content'];


						if ($post_status='published'){
					?>
						<div class="d-md-flex post-entry-2 half">
							<a href="single-post.php?post=<?php echo $post_id;?>" class="me-4 thumbnail">
								<img src="assets/img/Posts/<?php echo $post_image ?>" alt="" class="img-fluid">
							</a>
							<div>
								<div class="post-meta"><span class="date"><?php echo $category;?></span> <span class="mx-1">&bullet;</span> <span><?php echo $post_date; ?></span></div>
								<h3><a href="single-post.php?post=<?php echo $post_id;?>"><?php echo $post_title; ?></a></h3>
								<p><?php echo substr($post_content,0,300); ?></p>
								<div class="d-flex align-items-center author">
									<div class="name">
										<h3 class="m-0 p-0"><?php $post_author?></h3>
									</div>
								</div>
							</div>
						</div>
						<?php }
						else{ echo "No Posts in this category";}}}
						?>





					<div class="text-start py-4">
						<div class="custom-pagination">
							<a href="#" class="prev">Prevous</a>
							<a href="#" class="active">1</a>
							<a href="#">2</a>
							<a href="#">3</a>
							<a href="#">4</a>
							<a href="#">5</a>
							<a href="#" class="next">Next</a>
						</div>
					</div>
				</div>

				<div class="col-md-3">
					<!-- ======= Sidebar ======= -->
					<div class="aside-block">

						<ul class="nav nav-pills custom-tab-nav mb-4" id="pills-tab" role="tablist">
							<li class="nav-item" role="presentation">
								<button class="nav-link active" id="pills-popular-tab" data-bs-toggle="pill" data-bs-target="#pills-popular" type="button" role="tab" aria-controls="pills-popular" aria-selected="true">Popular</button>
							</li>
							<li class="nav-item" role="presentation">
								<button class="nav-link" id="pills-trending-tab" data-bs-toggle="pill" data-bs-target="#pills-trending" type="button" role="tab" aria-controls="pills-trending" aria-selected="false">Trending</button>
							</li>
							<li class="nav-item" role="presentation">
								<button class="nav-link" id="pills-latest-tab" data-bs-toggle="pill" data-bs-target="#pills-latest" type="button" role="tab" aria-controls="pills-latest" aria-selected="false">Latest</button>
							</li>
						</ul>

						<div class="tab-content" id="pills-tabContent">
							<?php
							$query = "SELECT * FROM posts WHERE tag = '$category'";
							$run_query = mysqli_query($conn, $query) or die(mysqli_error($conn));
							if (mysqli_num_rows($run_query) > 0) {
								while ($row = mysqli_fetch_assoc($run_query)) {
									$post_title = $row['title'];
									$post_tags= $row['tag'];
									$post_date= $row['postdate'];
									$post_image = $row['image'];
									$post_id = $row['id'];
									$post_author= $row['author'];

									if ($post_status='published'){
										?>
							<div class="tab-pane fade show active" id="pills-popular" role="tabpanel" aria-labelledby="pills-popular-tab">
								<div class="post-entry-1 border-bottom">
									<div class="post-meta"><span class="date"><?php echo $post_tags?></span> <span class="mx-1">&bullet;</span> <span><?php echo $post_date?></span></div>
									<h2 class="mb-2"><a href="single-post.php?post=<?php echo $post_id;?>"><?php echo $post_title?></a></h2>
									<span class="author mb-3 d-block"><?php echo $post_author?></span>
								</div>
									<?php }
									else{ echo "No posts in this category";}}}
							?>
						</div>




							</div> <!-- End Popular -->

						</div>
					</div>

					<div class="aside-block">
						<h3 class="aside-title">Video</h3>
						<div class="video-post">
							<a href="https://www.youtube.com/watch?v=AiFfDjmd0jU" class="glightbox link-video">
								<span class="bi-play-fill"></span>
								<img src="assets/img/post-landscape-5.jpg" alt="" class="img-fluid">
							</a>
						</div>
					</div><!-- End Video -->

					<div class="aside-block">
						<h3 class="aside-title">Categories</h3>
						<ul class="aside-links list-unstyled">
							<?php
							$query = "SELECT tag FROM `posts`";
							$run_query = mysqli_query($conn, $query) or die(mysqli_error($conn));
							if (mysqli_num_rows($run_query) > 0) {
								while ($row = mysqli_fetch_assoc($run_query)) {
									$post_tag = $row['tag'];
									if (is_string($post_tag)){
										?><li><a href="category.php?category=<?php echo $post_tag?>"><i class="bi bi-chevron-right"></i><?php echo $post_tag?></a></li>
									<?php }
									else{ echo "No categories";}}}
							?>
						</ul>
					</div><!-- End Categories -->

					<div class="aside-block">
						<h3 class="aside-title">Tags</h3>
						<ul class="aside-tags list-unstyled">
							<?php
							$query = "SELECT tag FROM `posts`";
							$run_query = mysqli_query($conn, $query) or die(mysqli_error($conn));
							if (mysqli_num_rows($run_query) > 0) {
								while ($row = mysqli_fetch_assoc($run_query)) {
									$post_tag = $row['tag'];
									if (is_string($post_tag)){
										?><li><a href="category.php?category=<?php echo $post_tag?>"><?php echo $post_tag?></a></li>
									<?php }
									else{ echo "No categories";}}}
							?>

						</ul>
					</div><!-- End Tags -->

				</div>

			</div>
		</div>
	</section>
</main>

<?php
require_once "includes/footer.php";


