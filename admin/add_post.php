<?php include 'includes/header.php';?>
<?php include 'includes/sidebar.php';?>
<?php include 'includes/connection.php';?>

<?php
if (isset($_POST['publish'])) {

		$post_title = $_POST['post-title'];
		$post_tag = $_POST['post-tag'];
		$post_content = $_POST['post-content'];
	     if (isset($_SESSION['firstname'])) {
		$post_author = $_SESSION['firstname'];
	    }
	    $post_date = date('Y-m-d');
	    $post_status = 'draft';
		$image = $_FILES['post-image']['name'];
		$ext = $_FILES['post-image']['type'];
		$validExt = array ("post-image/gif",  "post-image/jpeg",  "post-image/pjpeg", "post-image/png","post-image/jpg");
		if (empty($image)) {
			echo "<script>alert('Attach an image');</script>";
		}
		else if ($_FILES['post-image']['size'] <= 0 || $_FILES['post-image']['size'] > 1024000 )
		{
			echo "<script>alert('Image size is not proper');</script>";
		}
		else if (empty($ext&&$validExt)){
			echo "<script>alert('Not a valid image');</script>";

		}
		else {
			$folder  = './assets/img/Posts/';
			$imgext = strtolower(pathinfo($image, PATHINFO_EXTENSION) );
			$picture = rand(1000 , 1000000) .'.'.$imgext;
			if(move_uploaded_file($_FILES['post-image']['tmp_name'], $folder.$picture)) {
				$query = "INSERT INTO posts (title,author,postdate,image,content,status,tag) VALUES ('$post_title' , '$post_author' , '$post_date' , '$picture' , '$post_content' , '$post_status', '$post_tag') ";
				$result = mysqli_query($conn , $query) or die(mysqli_error($conn));
				if (mysqli_affected_rows($conn) > 0) {
					echo "<script> alert('Content posted successfully.It will be published after admin approves it');
                window.location.href='posts.php';</script>";
				}
				else {
					"<script> alert('Error while posting..try again');</script>";
				}
			}
}}
?>

<main id="main" class="main" xmlns="http://www.w3.org/1999/html">

	<section class="section">


		<div class="container-fluid">

			<div class="card">
				<div class="card-body">
					<form class="needs-validation" role="form" method="POST" enctype="multipart/form-data" novalidate>
						<div class="row mb-3">
							<div class="col-12">
								<label for="post-title" class="card-title">Post Title</label>
								<input type="text" class="form-control" id="post-title" name="post-title" required>
								<div class="invalid-feedback">Requires post title</div>
							</div>
						</div>

						<div class="row mb-3">
							<div class="col-sm-12">
							<label for="post-image" class="col-sm-2 col-form-label card-title">Post Image</label>
								<input class="form-control" type="file" id="post-image" name="post-image" required>
								<div class="invalid-feedback">Requires post image</div>
							</div>
						</div>

						<div class="row mb-3">
							<div class="col-sm-12">
							<label class="col-sm-2 card-title">Post Tag</label>

								<select class="form-select" aria-label="Default select example" name="post-tag">
									<option selected>Programming</option>
									<option value="1">Artificial Intelligence</option>
									<option value="2">Computer Hardware</option>
									<option value="3">Networking</option>
								</select>
							</div>
						</div>
						<div class="row mb-3">
							<div class="col-sm-12">
								<label class="col-sm-2 card-title">Write Content</label>
										<textarea class="form-control" aria-label="post-content" name="post-content" style="height: 30vh" required></textarea>
								<div class="invalid-feedback">Requires the post content</div>
								</div>
							</div>
						</div>

						<div class="row mb-3">
							<div class="col-sm-12 d-flex justify-content-center">
								<button type="submit" class="btn btn-primary col-6" name="publish">Add Post</button>
							</div>
						</div>
			        </form>



				</div>
			</div>
	</section>

</main>

<?php include 'includes/footer.php';?>
