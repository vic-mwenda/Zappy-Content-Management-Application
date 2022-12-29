<?php include 'includes/header.php';?>
<?php include 'includes/sidebar.php';?>
<?php include 'includes/connection.php';?>


  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-8">
          <div class="row">

            <!-- Posts Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Posts <span>| This Month</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
						<i class='bx bx-book-open'></i>
					</div>
                    <div class="ps-3">
                      <h6>145</h6>
                      <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Posts Card -->

            <!-- Views Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Views <span>| This Month</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
						<i class='bx bxs-door-open'></i>
					</div>
                    <div class="ps-3">
						<?php
						$user = $_SESSION['username'];
						$posts_query = "SELECT * FROM `posts` WHERE author= '$user'";
						$run_posts_query = mysqli_query($conn,$posts_query);
						$num_rows = mysqli_num_rows($run_posts_query);
						if ( $num_rows> 0) {
							while ($rowData = mysqli_fetch_array($run_posts_query)) {
								if ($num_rows == 0) {
									?> <h6><?php echo 'no posts'.'<br>';?></h6>
									<?php
								} else {
									?> <h6><?php echo $num_rows . '<br>'; ?></h6>

									<?php
								}
							}
						}
						?>                      <span class="text-success small pt-1 fw-bold">8%</span> <span class="text-muted small pt-2 ps-1">increase</span>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->

            <!-- Likes Card -->
            <div class="col-xxl-4 col-xl-12">

              <div class="card info-card customers-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Likes <span>| This Year</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
						<i class='bx bxs-happy-heart-eyes'></i>
					</div>
                    <div class="ps-3">
						<?php
						$user = $_SESSION['username'];
						$like_query = "SELECT SUM(likes) AS 'total_likes'FROM `posts` WHERE author= '$user'";
						$run_like_query = mysqli_query($conn,$like_query);
						if (mysqli_num_rows($run_like_query) > 0) {
							while ($rowData = mysqli_fetch_array($run_like_query)) {
								if ($rowData['total_likes'] == 0) {
									?> <h6><?php echo 'no likes'.'<br>';?></h6>
									<?php
								} else {
									?> <h6><?php echo $rowData['total_likes'] . '<br>'; ?></h6>

									<?php
								}
							}
						}
						?>

                      <span class="text-danger small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">decrease</span>

                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Customers Card -->



            <!-- Recent Posts -->
            <div class="col-12">
              <div class="card recent-sales overflow-auto">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Recent Posts <span>| Today</span></h5>

                  <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Tag</th>
                        <th scope="col">Status</th>
                      </tr>
                    </thead>
                    <tbody>
					  <?php

					  $query = "SELECT * FROM posts ORDER BY id DESC LIMIT 5";
					  $run_query = mysqli_query($conn, $query) or die(mysqli_error($conn));
					  if (mysqli_num_rows($run_query) > 0) {
						  while ($row = mysqli_fetch_array($run_query)) {
							  $post_id = $row['id'];
							  $post_title = $row['title'];
							  $post_tags = $row['tag'];
							  $post_status = $row['status'];

							  echo "<tr>";
							  echo "<th scope='row'>$post_id</th>";
							  echo "<td>$post_title</td>";
							  echo "<td> $post_tags</td>";
							  echo "<td> <span class='badge bg-success'>$post_status</span></td>";
							  echo "</tr>";
						  }
					  }
					  else {
						  echo "<script>alert('Not any news yet! Start Posting now');
    window.location.href= 'publishpost.php';</script>";
					  }
					  ?>

                    </tbody>
                  </table>

                </div>

              </div>
            </div><!-- End Recent Sales -->

          </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
        <div class="col-lg-4">

          <!-- Recent Activity -->
          <div class="card">
            <div class="filter">
              <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                  <h6>Filter</h6>
                </li>

                <li><a class="dropdown-item" href="#">Today</a></li>
                <li><a class="dropdown-item" href="#">This Month</a></li>
                <li><a class="dropdown-item" href="#">This Year</a></li>
              </ul>
            </div>

            <div class="card-body">
              <h5 class="card-title">Change Log</h5>

              <div class="activity">

                <div class="activity-item d-flex">
                  <div class="activite-label">12.12.22</div>
                  <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>
                  <div class="activity-content">
                    Added a robust admin page
                  </div>
                </div><!-- End activity item-->

                <div class="activity-item d-flex">
                  <div class="activite-label">10.12.22</div>
                  <i class='bi bi-circle-fill activity-badge text-danger align-self-start'></i>
                  <div class="activity-content">
					  Migrated hosting service from heroku to AWS
                  </div>
                </div><!-- End activity item-->

                <div class="activity-item d-flex">
                  <div class="activite-label">6.12.22</div>
                  <i class='bi bi-circle-fill activity-badge text-primary align-self-start'></i>
                  <div class="activity-content">
					  Added a beautiful footer
                  </div>
                </div><!-- End activity item-->


              </div>

            </div>
          </div><!-- End Recent Activity -->




          <!-- News & Updates  -->
          <div class="card">
            <div class="filter">
              <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                  <h6>Filter</h6>
                </li>

                <li><a class="dropdown-item" href="#">Today</a></li>
                <li><a class="dropdown-item" href="#">This Month</a></li>
                <li><a class="dropdown-item" href="#">This Year</a></li>
              </ul>
            </div>

            <div class="card-body pb-0">
              <h5 class="card-title">News &amp; Updates <span>| Today</span></h5>

              <div class="news">
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
						  $post_content = $row['content'];

						  if ($post_status='published'){
							  ?>
							  <div class="post-item clearfix">
								  <img src="assets/img/Posts/<?php echo $post_image?>" alt="">
								  <h4><a href="#"><?php echo $post_title?></a></h4>
								  <p><?php echo (substr($post_content,0,50))?></p>
							  </div>

						  <?php }
						  else{ echo "No Latest posts";}}}
				  ?>

              </div><!-- End sidebar recent posts-->

            </div>
          </div><!-- End News & Updates -->

        </div><!-- End Right side columns -->

      </div>
    </section>

  </main><!-- End #main -->

 <?php include 'includes/footer.php'?>
