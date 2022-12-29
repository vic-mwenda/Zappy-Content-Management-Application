<?php include 'includes/header.php';?>
<?php include 'includes/sidebar.php';?>
<?php include 'includes/connection.php';?>
<?php
//display user data
if (isset($_SESSION['username'])){

$username = $_SESSION['username'];
$query = "SELECT * FROM users WHERE username = '$username'" ;
$result= mysqli_query($conn , $query) or die (mysqli_error($conn));
if (mysqli_num_rows($result) > 0 ) {
	$row = mysqli_fetch_array($result);
	$userid = $row['id'];
	$usernm = $row['username'];
	$userpassword = $row['password'];
	$useremail = $row['email'];
	$userfirstname = $row['firstname'];
	$userlastname = $row['lastname'];
	$role= $row['role'];
	$about = $row['about'];
	$profile_image=$row['profileimage'];

}}
//update user-profile data
if (isset($_POST['edit-profile'])) {
	$uid = $_SESSION['id'];
	$username = $_POST['username'];
	$first_name = $_POST['first-name'];
	$last_name = $_POST ['last-name'];
	$about = $_POST ['about'];
	$email = $_POST['email'];
    $image = $_FILES['profile-image']['name'];
    $ext = $_FILES['profile-image']['type'];
    $validExt = array ("profile-image/gif",  "profile-image/jpeg",  "profile-image/pjpeg", "profile-image/png","profile-image/jpg");
      if (empty($image)) {
	     echo "<script>alert('Attach an image');</script>";
                         }
       else if ($_FILES['profile-image']['size'] <= 0 || $_FILES['profile-image']['size'] > 1024000 )
                         {
	      echo "<script>alert('Image size is not proper');</script>";
                         }
          else if (empty($ext&&$validExt)){
	   echo "<script>alert('Not a valid image');</script>";

                         }
          else {
                 $folder  = './assets/img/profile-images/';
                 $imgext = strtolower(pathinfo($image, PATHINFO_EXTENSION) );
                 $picture = rand(1000 , 1000000) .'.'.$imgext;
                 if(move_uploaded_file($_FILES['profile-image']['tmp_name'], $folder.$picture)) {

	                 $update_query = "UPDATE users SET firstname = '$first_name' , lastname='$last_name' , email='$email',about='$about', profileimage ='$picture' WHERE id = '$uid' " ;
	                 $result2 = mysqli_query($conn , $update_query) or die(mysqli_error($conn));
	                    if (mysqli_affected_rows($conn) > 0) {
		                    echo "<script>alert('PROFILE UPDATED SUCCESSFULLY');</script>";
	                                                          }
	                       else {
	                            	echo "<script>alert('An error occured, Try again!');</script>";
	                   }

}}}

//edit password
if(isset($_POST['edit-password'])){
	$current_password = $_POST['password'];
	$new_password = $_POST['new-password'];
	$new_password2 = $_POST['new-password2'];

	if (!password_verify($current_password ,  $userpassword)){
		echo "<script>alert('Current password is wrong');</script>";
	}
	elseif ($new_password!==$new_password2){
		echo "<script>alert('passwords do not match');</script>";
	}
	elseif (!password_verify($current_password ,  $userpassword) && $new_password!==$new_password2 ){
		echo "<script>alert('An error occured, Try again!');</script>";

	}
	else{
		$set_password = password_hash("$new_password" , PASSWORD_DEFAULT);
		$query ="UPDATE users SET password ='$set_password'";
		$run = mysqli_query($conn,$query) or die(mysqli_error($conn));
		if (mysqli_affected_rows($conn) > 0) {
			echo "<script>alert('PASSWORD UPDATED SUCCESSFULY');</script>";
		}
		else {
			echo "<script>alert('An error occured, Try again!');</script>";
		}



	}

}

?>



?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Profile</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
          <li class="breadcrumb-item">Users</li>
          <li class="breadcrumb-item active">Profile</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              <img src="assets/img/profile-images/<?php echo $profile_image?>" alt="Profile" class="rounded-circle">
              <h2><?php echo $usernm?></h2>
				<h3><?php echo $role?></h3>

            </div>
          </div>

        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-settings">Settings</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
                </li>

              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">
					<p><?php echo $about?></p>
                  <h5 class="card-title">Profile Details</h5>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Username</div>
                    <div class="col-lg-9 col-md-8"><?php echo $usernm?></div>
                  </div>


                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">First name</div>
                    <div class="col-lg-9 col-md-8"><?php echo $userfirstname?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Last name</div>
                    <div class="col-lg-9 col-md-8"><?php echo $userlastname?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Email</div>
                    <div class="col-lg-9 col-md-8"><?php echo $useremail?></div>
                  </div>

                </div>

                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                  <!-- Profile Edit Form -->
                  <form method="POST" enctype="multipart/form-data" role="form" class="needs-validation" novalidate>
                    <div class="row mb-3">
                      <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                      <div class="col-md-8 col-lg-9">
                        <img src="assets/img/profile-images/<?php echo $profile_image?>" alt="Profile">
                        <div class="pt-2">
							<input class="form-control" type="file" id="profile-image" name="profile-image">
                        </div>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">User Name</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="username" type="text" class="form-control" id="username" value="<?php echo $usernm?>" required>
						  <div class="invalid-feedback">requires username</div>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="about" class="col-md-4 col-lg-3 col-form-label">About</label>
                      <div class="col-md-8 col-lg-9">
                        <textarea name="about" class="form-control" id="about" style="height: 100px">Sunt est soluta temporibus accusantium neque nam maiores cumque temporibus. Tempora libero non est unde veniam est qui dolor. Ut sunt iure rerum quae quisquam autem eveniet perspiciatis odit. Fuga sequi sed ea saepe at unde.</textarea>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="first-name" class="col-md-4 col-lg-3 col-form-label">First Name</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="first-name" type="text" class="form-control" id="first-name" value="<?php echo $userfirstname?>" required>
						  <div class="invalid-feedback">requires firstname</div>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="last-name" class="col-md-4 col-lg-3 col-form-label">Last Name</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="last-name" type="text" class="form-control" id="Last name" value="<?php echo $userlastname?>" required>
						  <div class="invalid-feedback">requires lastname</div>
					  </div>
                    </div>


                    <div class="row mb-3">
                      <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email" type="email" class="form-control" id="Email" value="<?php echo $useremail?>" required>
						  <div class="invalid-feedback">requires email</div>
					  </div>
                    </div>


                    <div class="text-center">
                      <button type="submit" class="btn btn-primary" name="edit-profile">Save Changes</button>
                    </div>
                  </form><!-- End Profile Edit Form -->

                </div>

                <div class="tab-pane fade pt-3" id="profile-settings">

                  <!-- Settings Form -->
                  <form>

                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Email Notifications</label>
                      <div class="col-md-8 col-lg-9">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="changesMade" checked>
                          <label class="form-check-label" for="changesMade">
                            Changes made to your account
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="newProducts" checked>
                          <label class="form-check-label" for="newProducts">
                            Information on new products and services
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="proOffers">
                          <label class="form-check-label" for="proOffers">
                            Marketing and promo offers
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="securityNotify" checked disabled>
                          <label class="form-check-label" for="securityNotify">
                            Security alerts
                          </label>
                        </div>
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                  </form><!-- End settings Form -->

                </div>

                <div class="tab-pane fade pt-3" id="profile-change-password">
                  <!-- Change Password Form -->
                  <form method="POST" class="needs-validation" novalidate>

                    <div class="row mb-3">
                      <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="password" type="password" class="form-control" id="currentPassword"required>
						  <div class="invalid-feedback">requires current password</div>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="new-password" type="password" class="form-control" id="newPassword" required>
						  <div class="invalid-feedback">requires new password</div>
					  </div>
                    </div>

                    <div class="row mb-3">
                      <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="new-password2" type="password" class="form-control" id="renewPassword" required>
						  <div class="invalid-feedback">requires repeat entry password</div>
					  </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary" name="edit-password">Change Password</button>
                    </div>
                  </form><!-- End Change Password Form -->

                </div>

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <?php include 'includes/footer.php';?>
