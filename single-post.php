
<?php include 'includes/header.php';?>

<?php include 'includes/navbar.php';?>
<?php
if (isset($_GET['post'])) {
    $post = $_GET['post'];
    if (!is_numeric($post)) {
      header("location:index.php");

    }
}
else {
    header('location: index.php');
}?>

  <main id="main">

    <section class="single-post-content">
      <div class="container">
        <div class="row">
          <div class="col-md-9 post-content" data-aos="fade-up">
			  <?php

			  $query = "SELECT * FROM posts WHERE id=$post";
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
				  <div class="single-post">
					  <div class="post-meta"><span class="date"><?php echo $post_tags; ?></span> <span class="mx-1">&bullet;</span> <span><?php echo $post_date; ?></span></div>
					  <h1 class="mb-5"><?php echo $post_title; ?></h1>
					  <p><?php echo substr($post_content, 0, 300) . '.........'; ?></p>
					  <img src="assets/img/Posts/<?php echo $post_image ?>" alt="" class="img-fluid m-3">
					  <h4><?php echo $post_title?> </h4>
					  <p><?php echo substr($post_content, 300, 10000)?></p>
				  </div>
			<?php }?>



            <div class="comments">
              <h5 class="comment-title py-4">2 Comments</h5>
              <div class="comment d-flex mb-4">
                <div class="flex-shrink-0">
                  <div class="avatar avatar-sm rounded-circle">
                    <img class="avatar-img" src="assets/img/person-5.jpg" alt="" class="img-fluid">
                  </div>
                </div>
                <div class="flex-grow-1 ms-2 ms-sm-3">
                  <div class="comment-meta d-flex align-items-baseline">
                    <h6 class="me-2">Jordan Singer</h6>
                    <span class="text-muted">2d</span>
                  </div>
                  <div class="comment-body">
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Non minima ipsum at amet doloremque qui magni, placeat deserunt pariatur itaque laudantium impedit aliquam eligendi repellendus excepturi quibusdam nobis esse accusantium.
                  </div>

                  <div class="comment-replies bg-light p-3 mt-3 rounded">
                    <h6 class="comment-replies-title mb-4 text-muted text-uppercase">2 replies</h6>

                    <div class="reply d-flex mb-4">
                      <div class="flex-shrink-0">
                        <div class="avatar avatar-sm rounded-circle">
                          <img class="avatar-img" src="assets/img/person-4.jpg" alt="" class="img-fluid">
                        </div>
                      </div>
                      <div class="flex-grow-1 ms-2 ms-sm-3">
                        <div class="reply-meta d-flex align-items-baseline">
                          <h6 class="mb-0 me-2">Brandon Smith</h6>
                          <span class="text-muted">2d</span>
                        </div>
                        <div class="reply-body">
                          Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                        </div>
                      </div>
                    </div>
                    <div class="reply d-flex">
                      <div class="flex-shrink-0">
                        <div class="avatar avatar-sm rounded-circle">
                          <img class="avatar-img" src="assets/img/person-3.jpg" alt="" class="img-fluid">
                        </div>
                      </div>
                      <div class="flex-grow-1 ms-2 ms-sm-3">
                        <div class="reply-meta d-flex align-items-baseline">
                          <h6 class="mb-0 me-2">James Parsons</h6>
                          <span class="text-muted">1d</span>
                        </div>
                        <div class="reply-body">
                          Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio dolore sed eos sapiente, praesentium.
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="comment d-flex">
                <div class="flex-shrink-0">
                  <div class="avatar avatar-sm rounded-circle">
                    <img class="avatar-img" src="assets/img/person-2.jpg" alt="" class="img-fluid">
                  </div>
                </div>
                <div class="flex-shrink-1 ms-2 ms-sm-3">
                  <div class="comment-meta d-flex">
                    <h6 class="me-2">Santiago Roberts</h6>
                    <span class="text-muted">4d</span>
                  </div>
                  <div class="comment-body">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto laborum in corrupti dolorum, quas delectus nobis porro accusantium molestias sequi.
                  </div>
                </div>
              </div>
            </div><!-- End Comments -->

            <!-- ======= Comments Form ======= -->
            <div class="row justify-content-center mt-5">

              <div class="col-lg-12">
                <h5 class="comment-title">Leave a Comment</h5>
                <div class="row">
                  <div class="col-lg-6 mb-3">
                    <label for="comment-name">Name</label>
                    <input type="text" class="form-control" id="comment-name" placeholder="Enter your name">
                  </div>
                  <div class="col-lg-6 mb-3">
                    <label for="comment-email">Email</label>
                    <input type="text" class="form-control" id="comment-email" placeholder="Enter your email">
                  </div>
                  <div class="col-12 mb-3">
                    <label for="comment-message">Message</label>

                    <textarea class="form-control" id="comment-message" placeholder="Enter your name" cols="30" rows="10"></textarea>
                  </div>
                  <div class="col-12">
                    <input type="submit" class="btn btn-primary" value="Post comment">
                  </div>
                </div>
              </div>
            </div><!-- End Comments Form -->

          </div>
          <div class="col-md-3">


            <div class="aside-block">
              <h3 class="aside-title">Video</h3>
              <div class="video-post">
                <a href="https://www.youtube.com/watch?v=AiFfDjmd0jU" class="glightbox link-video">
                  <span class="bi-play-fill"></span>
                  <img src="assets/img/post-landscape-5.jpg" alt="" class="img-fluid">
                </a>
              </div>
            </div>

            <div class="aside-block">
              <h3 class="aside-title">Categories</h3>
              <ul class="aside-links list-unstyled">
                <li><a href=""><i class="bi bi-chevron-right"></i> Business</a></li>
                <li><a href=""><i class="bi bi-chevron-right"></i> Culture</a></li>
                <li><a href=""><i class="bi bi-chevron-right"></i> Sport</a></li>
                <li><a href=""><i class="bi bi-chevron-right"></i> Food</a></li>
                <li><a href=""><i class="bi bi-chevron-right"></i> Politics</a></li>
                <li><a href=""><i class="bi bi-chevron-right"></i> Celebrity</a></li>
                <li><a href=""><i class="bi bi-chevron-right"></i> Startups</a></li>
                <li><a href=""><i class="bi bi-chevron-right"></i> Travel</a></li>
              </ul>
            </div>

            <div class="aside-block">
              <h3 class="aside-title">Tags</h3>
              <ul class="aside-tags list-unstyled">
                <li><a href="">Business</a></li>
                <li><a href="">Culture</a></li>
                <li><a href="">Sport</a></li>
                <li><a href="">Food</a></li>
                <li><a href="">Politics</a></li>
                <li><a href="">Celebrity</a></li>
                <li><a href="">Startups</a></li>
                <li><a href="">Travel</a></li>
              </ul>
            </div>

          </div>
        </div>
      </div>
    </section>
  </main>

<?php include 'includes/footer.php';?>
