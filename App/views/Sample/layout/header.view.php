<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<title><?= $page ?> - <?= CONFIG['app_name'] ?></title>
	<meta content="" name="description">
	<meta content="" name="keywords">
	<link href="<?= BASE ?>assets/img/favicon.png" rel="icon">
	<link href="<?= BASE ?>assets/img/apple-touch-icon.png" rel="apple-touch-icon">
	<link href="https://fonts.gstatic.com" rel="preconnect">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<link href="<?= BASE ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?= BASE ?>assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
	<link href="<?= BASE ?>assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
	<link href="<?= BASE ?>assets/vendor/quill/quill.snow.css" rel="stylesheet">
	<link href="<?= BASE ?>assets/vendor/quill/quill.bubble.css" rel="stylesheet">
	<link href="<?= BASE ?>assets/vendor/remixicon/remixicon.css" rel="stylesheet">
	<link href="<?= BASE ?>assets/vendor/datatables/datatables.css" rel="stylesheet">
	<link href="<?= BASE ?>assets/css/style.css" rel="stylesheet">
</head>

<body>
	<header id="header" class="header fixed-top d-flex align-items-center">
		<div class="d-flex align-items-center justify-content-between">
			<a href="index.html" class="logo d-flex align-items-center">
				<img src="<?= BASE ?>assets/img/logo.png" alt="">
				<span class="d-none d-lg-block">NiceAdmin</span>
			</a>
			<i class="bi bi-list toggle-sidebar-btn"></i>
		</div><!-- End Logo -->
		<nav class="header-nav ms-auto">
			<ul class="d-flex align-items-center">
				<li class="nav-item dropdown pe-3">
					<a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
						<img src="<?= BASE ?>assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
						<span class="d-none d-md-block dropdown-toggle ps-2"><?= $User ?></span>
					</a><!-- End Profile Iamge Icon -->
					<ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
						<!-- <li class="dropdown-header">
							<h6><?= $User ?></h6>
							<span>Web Designer</span>
						</li> 
						<li>
							<hr class="dropdown-divider">
						</li>-->
						<li>
							<a class="dropdown-item d-flex align-items-center" href="<?= BASE ?>Auth/login">
								<i class="bi bi-box-arrow-right"></i>
								<span>Sign Out</span>
							</a>
						</li>
					</ul><!-- End Profile Dropdown Items -->
				</li><!-- End Profile Nav -->
			</ul>
		</nav><!-- End Icons Navigation -->
	</header><!-- End Header -->
	<!-- ======= Sidebar ======= -->
	<aside id="sidebar" class="sidebar">
		<ul class="sidebar-nav" id="sidebar-nav">
			<li class="nav-item">
				<a class="nav-link <?= ($page == "Dashboard") ? "" : "collapsed"; ?>" href="<?= BASE ?>Sample/index">
					<i class="bi bi-grid"></i>
					<span>Dashboard</span>
				</a>
			</li><!-- End Dashboard Nav -->
	
			<li class="nav-heading">Manage Users</li>
			<li class="nav-item">
				<a class="nav-link <?= ($page == "User List") ? "" : "collapsed"; ?>"  href="<?= BASE ?>Sample/List_User">
					<i class="bi bi-person"></i>
					<span>List Users</span>
				</a>
			</li><!-- End Profile Page Nav -->

			<li class="nav-item">
				<a class="nav-link <?= ($page == "Manage User") ? "" : "collapsed"; ?>"  href="<?= BASE ?>Sample/Manage_User">
					<i class="bi bi-person"></i>
					<span>Manage User</span>
				</a>
			</li><!-- End Profile Page Nav -->
			<li class="nav-item">
				<a class="nav-link <?= ($page == "Add User") ? "" : "collapsed"; ?>"  href="<?= BASE ?>Sample/Add_User">
					<i class="bi bi-person"></i>
					<span>Add User</span>
				</a>
			</li><!-- End Profile Page Nav -->
			<li class="nav-item">
				<a class="nav-link <?= ($page == "Add User") ? "" : "collapsed"; ?>"  href="<?= BASE ?>Sample/Delete_User">
					<i class="bi bi-person"></i>
					<span>Delete User</span>
				</a>
			</li><!-- End Profile Page Nav -->
			
			<li class="nav-item">
				<a class="nav-link <?= ($page == "Login") ? "" : "collapsed"; ?>" href="<?= BASE ?>Sample/logout">
					<i class="bi bi-box-arrow-in-right"></i>
					<span>Log Out</span>
				</a>
			</li><!-- End Login Page Nav -->
		</ul>
	</aside><!-- End Sidebar-->