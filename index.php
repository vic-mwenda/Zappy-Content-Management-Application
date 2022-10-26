

<?php include 'includes/connection.php';
?>
<?php include 'includes/header.php';?>

<?php include 'includes/navbar.php';?>

  <main id="main">

    <!-- ======= Hero Slider Section ======= -->
    <section id="hero-slider" class="hero-slider">
      <div class="container-md" data-aos="fade-in">
        <div class="row">
          <div class="col-12">
            <div class="swiper sliderFeaturedPosts">
              <div class="swiper-wrapper">
              <?php
				  $query = "SELECT * FROM `posts` WHERE id BETWEEN 34 AND 36 ORDER BY updated_on DESC";
					  $run_query = mysqli_query($conn, $query) or die(mysqli_error($conn));
					  if (mysqli_num_rows($run_query) > 0) {
					  while ($row = mysqli_fetch_assoc($run_query)) {
					  $post_title = $row['title'];
					  $post_tags= $row['tag'];
					  $post_date= $row['postdate'];
					  $post_image= $row['image'];
					  $post_id = $row['id'];
					  $post_content = $row['content'];



						  if ($post_status='published'){
					  	?>
							  <div class="swiper-slide">
								  <a href="single-post.php?post=<?php echo $post_id;?>" class="img-bg d-flex align-items-end" style="background-image: url('assets/img/Posts/<?php echo $post_image ?>');">
									  <div class="img-bg-inner">
										  <h2><?php echo $post_title;?></h2>
										  <p><?php echo substr($post_content, 0, 300) . '.........'; ?></p>
									  </div>
								  </a>
							  </div>

						  <?php }
					  else{ echo "No content posts";}}}
					  ?>
              </div>
              <div class="custom-swiper-button-next">
                <span class="bi-chevron-right"></span>
              </div>
              <div class="custom-swiper-button-prev">
                <span class="bi-chevron-left"></span>
              </div>

              <div class="swiper-pagination"></div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="posts" class="posts">
      <div class="container" data-aos="fade-up">
        <div class="row g-5">
          <div class="col-lg-4">

			  <?php

	$query = "SELECT * FROM `posts` WHERE id=31;";
	$run_query = mysqli_query($conn, $query) or die(mysqli_error($conn));
	$num_rows = mysqli_num_rows($run_query);

	if($num_rows > 0 ) {

		$row = mysqli_fetch_assoc($run_query);
		$post_title = $row['title'];
		$post_id = $row['id'];
		$post_author = $row['author'];
		$post_date = $row['postdate'];
		$post_image = $row['image'];
		$post_content = $row['content'];
		$post_tags = $row['tag'];

			  ?>
            <div class="post-entry-1 lg">
              <a href="single-post.php?post=<?php echo $post_id; ?>"><img src="assets/img/Posts/<?php echo $post_image ?>" alt="" class="img-fluid"></a>
              <div class="post-meta"><span class="date"><?php echo $post_tags; ?> </span> <span class="mx-1">&bullet;</span> <span><?php echo $post_date; ?></span></div>
              <h2><a href="single-post.php?post=<?php echo $post_id; ?>"><?php echo $post_title; ?></a></h2>
              <p class="mb-4 d-block"><?php echo substr($post_content, 0, 300) . '.........'; ?></p>

              <div class="d-flex align-items-center author">
                <div class="photo"><img src="assets/img/person-1.jpg" alt="" class="img-fluid"></div>
                <div class="name">
                  <h3 class="m-0 p-0"><?php echo $post_author; ?></h3>
                </div>
              </div>
            </div>
		  </div>
			  <?php }?>




          <div class="col-lg-8">
            <div class="row g-5">

				<div class="col-lg-4 border-start custom-border">
					<?php
					$query = "SELECT * FROM `posts` WHERE id BETWEEN 31 AND 33 ORDER BY updated_on DESC";
					$run_query = mysqli_query($conn, $query) or die(mysqli_error($conn));
					if (mysqli_num_rows($run_query) > 0) {
						while ($row = mysqli_fetch_assoc($run_query)) {
							$post_title = $row['title'];
							$post_tags= $row['tag'];
							$post_date= $row['postdate'];
							$post_image = $row['image'];
							$post_id = $row['id'];

							if ($post_status='published'){
								?>
								<div class="post-entry-1">
									<a href="single-post.php?post=<?php echo $post_id;?>"><img src="assets/img/Posts/<?php echo $post_image?>" alt="" class="img-fluid"></a>
									<div class="post-meta"><span class="date"><?php echo $post_tags;?></span> <span class="mx-1">&bullet;</span> <span><?php echo $post_date;?></span></div>
									<h2><a href="single-post.php?post=<?php echo $post_id;?>"><?php echo $post_title;?></a></h2>
								</div>
							<?php }
							else{ echo "No Latest posts";}}}
					?>
				</div>

				  <div class="col-lg-4 border-start custom-border">
					  <?php
					  $query = "SELECT * FROM `posts` WHERE id BETWEEN 34 AND 36 ORDER BY updated_on DESC";
					  $run_query = mysqli_query($conn, $query) or die(mysqli_error($conn));
					  if (mysqli_num_rows($run_query) > 0) {
					  while ($row = mysqli_fetch_assoc($run_query)) {
					  $post_title = $row['title'];
					  $post_tags= $row['tag'];
					  $post_date= $row['postdate'];
					  $post_image= $row['image'];
					  $post_id = $row['id'];


						  if ($post_status='published'){
					  	?>
					  <div class="post-entry-1">
						  <a href="single-post.php?post=<?php echo $post_id;?>"><img src="assets/img/Posts/<?php echo $post_image?>" alt="" class="img-fluid"></a>
						  <div class="post-meta"><span class="date"><?php echo $post_tags;?></span> <span class="mx-1">&bullet;</span> <span><?php echo $post_date;?></span></div>
						  <h2><a href="single-post.php?post=<?php echo $post_id;?>"><?php echo $post_title;?></a></h2>
					  </div>
					  <?php }
					  else{ echo "No Latest posts";}}}
					  ?>
              </div>

              <!-- Trending Section -->
              <div class="col-lg-4">

                <div class="trending">
                  <h3>Trending</h3>
                  <ul class="trending-post">
					  <?php
					  $query = "SELECT * FROM `posts` WHERE status='published' ORDER BY updated_on DESC";
					  $run_query = mysqli_query($conn, $query) or die(mysqli_error($conn));
					  if (mysqli_num_rows($run_query) > 0) {
					  while ($row = mysqli_fetch_assoc($run_query)) {
					  $post_title = $row['title'];
					  $post_author = $row['author'];
					  $post_id = $row['id'];

						  if ($post_status='published'){
					  ?>
					  <li>
					  <a href="single-post.php?post=<?php echo $post_id;?>">
						  <h3><?php echo $post_title?></h3>
                        <span class="author"><?php echo $post_author?></span>
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

        </div>
      </div>
    </section>



  </main>

<?php include 'includes/footer.php';?>

