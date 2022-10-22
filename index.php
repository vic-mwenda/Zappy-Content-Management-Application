

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
                <div class="swiper-slide">
                  <a href="single-post.html" class="img-bg d-flex align-items-end" style="background-image: url('assets/img/post-slide-1.jpg');">
                    <div class="img-bg-inner">
                      <h2>The Best Homemade Masks for Face (keep the Pimples Away)</h2>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem neque est mollitia! Beatae minima assumenda repellat harum vero, officiis ipsam magnam obcaecati cumque maxime inventore repudiandae quidem necessitatibus rem atque.</p>
                    </div>
                  </a>
                </div>

                <div class="swiper-slide">
                  <a href="single-post.html" class="img-bg d-flex align-items-end" style="background-image: url('assets/img/post-slide-2.jpg');">
                    <div class="img-bg-inner">
                      <h2>17 Pictures of Medium Length Hair in Layers That Will Inspire Your New Haircut</h2>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem neque est mollitia! Beatae minima assumenda repellat harum vero, officiis ipsam magnam obcaecati cumque maxime inventore repudiandae quidem necessitatibus rem atque.</p>
                    </div>
                  </a>
                </div>

                <div class="swiper-slide">
                  <a href="single-post.html" class="img-bg d-flex align-items-end" style="background-image: url('assets/img/post-slide-3.jpg');">
                    <div class="img-bg-inner">
                      <h2>13 Amazing Poems from Shel Silverstein with Valuable Life Lessons</h2>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem neque est mollitia! Beatae minima assumenda repellat harum vero, officiis ipsam magnam obcaecati cumque maxime inventore repudiandae quidem necessitatibus rem atque.</p>
                    </div>
                  </a>
                </div>

                <div class="swiper-slide">
                  <a href="single-post.html" class="img-bg d-flex align-items-end" style="background-image: url('assets/img/post-slide-4.jpg');">
                    <div class="img-bg-inner">
                      <h2>9 Half-up/half-down Hairstyles for Long and Medium Hair</h2>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem neque est mollitia! Beatae minima assumenda repellat harum vero, officiis ipsam magnam obcaecati cumque maxime inventore repudiandae quidem necessitatibus rem atque.</p>
                    </div>
                  </a>
                </div>
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
    </section><!-- End Hero Slider Section -->

    <!-- ======= Post Grid Section ======= -->
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
              <a href="publicposts.php?post=<?php echo $post_id; ?>"><img src="assets/img/post-landscape-1.jpg" alt="" class="img-fluid"></a>
              <div class="post-meta"><span class="date">Culture</span> <span class="mx-1">&bullet;</span> <span><?php echo $post_date; ?></span></div>
              <h2><a href="publicposts.php?post=<?php echo $post_id; ?>"><?php echo $post_title; ?></a></h2>
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
				<?php
				$query = "SELECT * FROM `posts` WHERE id=31;";
				$run_query = mysqli_query($conn, $query) or die(mysqli_error($conn));
				$num_rows = mysqli_num_rows($run_query);

				if($num_rows > 0 ) {

				$row = mysqli_fetch_assoc($run_query);
				$post_title = $row['title'];
				$post_id = $row['id'];

				?>
              <div class="col-lg-4 border-start custom-border">
                <div class="post-entry-1">
                  <a href="single-post.html"><img src="assets/img/post-landscape-2.jpg" alt="" class="img-fluid"></a>
                  <div class="post-meta"><span class="date">Sport</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                  <h2><a href="single-post.html"><?php echo $post_title?></a></h2>
                </div>
				  <?php }?>

                <div class="post-entry-1">
					<?php
					$query = "SELECT * FROM `posts` WHERE id=32;";
					$run_query = mysqli_query($conn, $query) or die(mysqli_error($conn));
					$num_rows = mysqli_num_rows($run_query);

					if($num_rows > 0 ) {

					$row = mysqli_fetch_assoc($run_query);
					$post_title = $row['title'];
					?>
                  <a href=""><img src="assets/img/post-landscape-5.jpg" alt="" class="img-fluid"></a>
                  <div class="post-meta"><span class="date">Food</span> <span class="mx-1">&bullet;</span> <span>Jul 17th '22</span></div>
                  <h2><a href="single-post.html"></a><?php echo $post_title?></h2>
                </div>
			  <?php }?>

				  <div class="post-entry-1">
					  <?php
					  $query = "SELECT * FROM `posts` WHERE id=33;";
					  $run_query = mysqli_query($conn, $query) or die(mysqli_error($conn));
					  $num_rows = mysqli_num_rows($run_query);

					  if($num_rows > 0 ) {

					  $row = mysqli_fetch_assoc($run_query);
					  $post_title = $row['title'];
					  $post_id = $row['id'];

					  ?>
                  <a href="publicposts.php?post=<?php echo $post_id; ?>"><img src="assets/img/post-landscape-7.jpg" alt="" class="img-fluid"></a>
                  <div class="post-meta"><span class="date">Design</span> <span class="mx-1">&bullet;</span> <span>Mar 15th '22</span></div>
                  <h2><a href="publicposts.php?post=<?php echo $post_id; ?>"><?php echo $post_title?></a></h2>
                </div>
			  <?php }?>
				  </div>

				  <div class="col-lg-4 border-start custom-border">
					  <?php
					  $query = "SELECT title,tag,postdate,id FROM `posts` WHERE id BETWEEN 34 AND 36 ORDER BY updated_on DESC";
					  $run_query = mysqli_query($conn, $query) or die(mysqli_error($conn));
					  if (mysqli_num_rows($run_query) > 0) {
					  while ($row = mysqli_fetch_assoc($run_query)) {
					  $post_title = $row['title'];
					  $post_tags= $row['tag'];
					  $post_date= $row['postdate'];
					  if ($post_status='published'){
					  	?>
					  <div class="post-entry-1">
						  <a href="single-post.html"><img src="assets/img/post-landscape-3.jpg" alt="" class="img-fluid"></a>
						  <div class="post-meta"><span class="date"><?php echo $post_tags;?></span> <span class="mx-1">&bullet;</span> <span><?php echo $post_date;?></span></div>
						  <h2><a href="single-post.html"><?php echo $post_title;?></a></h2>
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
					  $query = "SELECT title,author FROM `posts` WHERE status='published' ORDER BY updated_on DESC";
					  $run_query = mysqli_query($conn, $query) or die(mysqli_error($conn));
					  if (mysqli_num_rows($run_query) > 0) {
					  while ($row = mysqli_fetch_assoc($run_query)) {
					  $post_title = $row['title'];
					  $post_author = $row['author'];
					  if ($post_status='published'){
					  ?>
					  <li>
					  <a href="single-post.html">
                        <span class="number">1</span>
                        <h3><?php echo $post_title?></h3>
                        <span class="author"><?php echo $post_author?></span>
                      </a>
					  </li>
					  <?php }
					  else{ echo "No Latest posts";}}}
					  ?>
                  </ul>
                </div>

              </div> <!-- End Trending Section -->
            </div>
          </div>

        </div> <!-- End .row -->
      </div>
    </section> <!-- End Post Grid Section -->



  </main><!-- End #main -->

<?php include 'includes/footer.php';?>

  <!-- ======= Footer ======= -->
