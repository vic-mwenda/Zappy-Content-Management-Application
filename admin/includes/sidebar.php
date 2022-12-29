<?php
?>
<aside id="sidebar" class="sidebar">

	<ul class="sidebar-nav" id="sidebar-nav">

		<li class="nav-item">
			<a class="nav-link " href="dashboard.php?">
				<i class="bi bi-grid"></i>
				<span>Dashboard</span>
			</a>
		</li><!-- End Dashboard Nav -->


		<li class="nav-item">
			<a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
				<i class="bi bi-layout-text-window-reverse"></i><span>Posts</span><i class="bi bi-chevron-down ms-auto"></i>
			</a>
			<ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
				<li>
					<a href="add_post.php?">
						<i class="bi bi-circle"></i><span>Add post</span>
					</a>
				</li>
				<li>
					<a href="posts.php?">
						<i class="bi bi-circle"></i><span> My Posts </span>
					</a>
				</li>

			</ul>
		</li><!-- End Tables Nav -->


		<li class="nav-item">
			<a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
				<i class="bi bi-gem"></i><span>users</span><i class="bi bi-chevron-down ms-auto"></i>
			</a>
			<ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
				<li>
					<a href="users.php?">
						<i class="bi bi-circle"></i><span>View users</span>
					</a>
				</li>
			</ul>
		</li><!-- End Icons Nav -->

		<li class="nav-item">
			<a class="nav-link collapsed" href="users-profile.php?">
				<i class="bi bi-person"></i>
				<span>Profile</span>
			</a>
		</li><!-- End Profile Page Nav -->


	</ul>

</aside><!-- End Sidebar-->

