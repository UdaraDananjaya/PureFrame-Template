<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $page ?> - <?= CONFIG['app_name'] ?></title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <link rel="icon" href="<?= BASE ?>assets/img/favicon.png">
    <link rel="apple-touch-icon" href="<?= BASE ?>assets/img/apple-touch-icon.png">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <link href="<?= BASE ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= BASE ?>assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?= BASE ?>assets/vendor/datatables/dataTables.min.css" rel="stylesheet">
    <link href="<?= BASE ?>assets/css/style.css" rel="stylesheet">

	<!-- Vendor JS Files -->
	<script src="<?= BASE ?>assets/vendor/jquery/jquery.min.js"></script>
	<script src="<?= BASE ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="<?= BASE ?>assets/vendor/chart.js/Chart.min.js"></script>
	<script src="<?= BASE ?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
	<script src="<?= BASE ?>assets/vendor/datatables/dataTables.min.js"></script>
	<script src="<?= BASE ?>assets/vendor/datatables/jquery.tabledit.js"></script>

</head>

<body>
	<header id="header" class="header fixed-top d-flex align-items-center">
		<div class="d-flex align-items-center justify-content-between">
			<a href="index.html" class="logo d-flex align-items-center">
				<img src="<?= BASE ?>assets/img/logo.png" alt="">
				<span class="d-none d-lg-block"><?= CONFIG['app_name'] ?></span>
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
						<li class="dropdown-header">
							<h6><?= $User ?></h6>
							<span>Web Designer</span>
						</li>
						<li>
							<hr class="dropdown-divider">
						</li>
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
			<li class="nav-heading">Manage Users {CURD}</li>
			<li class="nav-item">
				<a class="nav-link <?= ($pagegroup != "UserManagement") ? "collapsed" : ""; ?>" data-bs-target="#usermanagement-nav" data-bs-toggle="collapse" href="#">
					<i class="bi bi-menu-button-wide"></i>
					<span>User Management</span><i class="bi bi-chevron-down ms-auto"></i>
				</a>
				<ul id="usermanagement-nav" class="nav-content collapse <?= ($pagegroup == "UserManagement") ? "show" : ""; ?>" data-bs-parent="#sidebar-nav">
					<li>
						<a href="<?= BASE ?>Sample/Add_User" class="<?= ($page == "Add User") ? "active" : ""; ?>">
							<i class="bi bi-circle"></i><span>Add User</span>
						</a>
					</li>
					<li>
						<a href="<?= BASE ?>Sample/List_User" class="<?= ($page == "User List") ? "active" : ""; ?>">
							<i class="bi bi-circle"></i><span>List Users</span>
						</a>
					</li>
					<li>
						<a href="<?= BASE ?>Sample/Update_User" class="<?= ($page == "Update User") ? "active" : ""; ?>">
							<i class="bi bi-circle"></i><span>Update User</span>
						</a>
					</li>
					<li>
						<a href="<?= BASE ?>Sample/Delete_User" class="<?= ($page == "Delete User") ? "active" : ""; ?>">
							<i class="bi bi-circle"></i><span>Delete User</span>
						</a>
					</li>
				</ul>
			</li><!-- End Components Nav -->
			<li class="nav-heading">Table Edit {CURD}</li>
			<li class="nav-item">
				<a class="nav-link <?= ($page == "Manage User") ? "" : "collapsed"; ?>" href="<?= BASE ?>Sample/Manage_User">
					<i class="bi bi-border-style"></i>
					<span>Manage Users</span>
				</a>
			</li><!-- End Dashboard Nav -->

			<li class="nav-heading">Template Engine</li>
			<li class="nav-item">
				<a class="nav-link <?= ($page == "Users Table") ? "" : "collapsed"; ?>" href="<?= BASE ?>Demo/index">
					<i class="bi bi-border-style"></i>
					<span>Users Table</span>
				</a>
			</li><!-- End Dashboard Nav -->
			<li class="nav-item">
				<a class="nav-link <?= ($page == "Users Form") ? "" : "collapsed"; ?>" href="<?= BASE ?>Demo/form">
					<i class="bi bi-border-style"></i>
					<span>Users Form</span>
				</a>
			</li><!-- End Dashboard Nav -->

			<li class="nav-heading">Authentication</li>
			<li class="nav-item">
				<a class="nav-link <?= ($page == "Login") ? "" : "collapsed"; ?>" href="<?= BASE ?>Auth/logout">
					<i class="bi bi-box-arrow-in-right"></i>
					<span>Log Out</span>
				</a>
			</li><!-- End Login Page Nav -->
		</ul>
	</aside><!-- End Sidebar-->