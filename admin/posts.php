<?php include 'includes/header.php';?>
<?php include 'includes/sidebar.php';?>
<?php include 'includes/connection.php';?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Posts</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
          <li class="breadcrumb-item">Posts</li>
          <li class="breadcrumb-item active">My posts</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">


        <div class="container-fluid">


          <div class="card">
            <div class="card-body">
              <h5 class="card-title"><a href="" style="text-decoration:none">Write</a></h5>

				<table class="table table-hover">


					<thead>
					<tr>
						<th>ID</th>
						<th>Author</th>
						<th>Title</th>
						<th>Status</th>
						<th>Image</th>
						<th>Tags</th>
						<th>Date</th>
						<th>View</th>
						<th>Edit</th>
						<th>Delete</th>
						<th>Publish</th>
					</tr>
					</thead>
					<tbody>

					<?php

					$query = "SELECT * FROM posts ORDER BY id DESC";
					$run_query = mysqli_query($conn, $query) or die(mysqli_error($conn));
					if (mysqli_num_rows($run_query) > 0) {
						while ($row = mysqli_fetch_array($run_query)) {
							$post_id = $row['id'];
							$post_title = $row['title'];
							$post_author = $row['author'];
							$post_date = $row['postdate'];
							$post_image = $row['image'];
							$post_content = $row['content'];
							$post_tags = $row['tag'];
							$post_status = $row['status'];

							echo "<tr>";
							echo "<td>$post_id</td>";
							echo "<td>$post_author</td>";
							echo "<td>$post_title</td>";
							echo "<td>$post_status</td>";
							echo "<td><img  width='100' src='assets/img/Posts/$post_image' alt='Post Image' ></td>";
							echo "<td>$post_tags</td>";
							echo "<td>$post_date</td>";
							echo "<td><a href='post.php?post=$post_id' style='color:green'>See Post</a></td>";
							echo "<td><a href='editposts.php?id=$post_id'><i class='bx bx-edit bx-sm bx-flashing-hover'></i></a></td>";
							echo "<td><a onClick=\"javascript: return confirm('Are you sure you want to delete this post?')\" href='?del=$post_id'><i class='bx bx-window-close bx-sm ' style='color: red'></i></a></td>";
							echo "<td><a onClick=\"javascript: return confirm('Are you sure you want to publish this post?')\"href='?pub=$post_id'><i class='bx bxs-send bx-sm bx-burst-hover' style='color: #0a58ca'></i></a></td>";

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



				<!-- End Table with hoverable rows -->

            </div>
          </div>



        </div>
    </section>

  </main><!-- End #main -->

  <?php include 'includes/footer.php';?>
