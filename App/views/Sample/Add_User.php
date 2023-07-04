<?php require_once('layout/header.php'); ?>
<main id="main" class="main">
	<div class="pagetitle">
		<h1>User List</h1>
		<nav>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="index.html">Home</a></li>
				<li class="breadcrumb-item active">User List</li>
			</ol>
		</nav>
	</div>
	<!-- End Page Title -->
	<section class="section dashboard">
		<div class="row justify-content-center">
			<div class="col-lg-6">
				<div class="card">
					<div class="card-body">
						<h5 class="card-title">Vertical Form</h5>
						<!-- Vertical Form -->
						<form class="row g-3" method="POST">

							<div class="col-12">
								<label for="inputEmail" class="form-label">Email</label>
								<input type="email" class="form-control" name="inputEmail" id="inputEmail">
							</div>
							<div class="col-12">
								<label for="inputPassword" class="form-label">Password</label>
								<input type="password" class="form-control" name="inputPassword" id="inputPassword" >
							</div>
							<div class="text-center">
								<button type="submit" class="btn btn-primary">Submit</button>
								<button type="reset" class="btn btn-secondary">Reset</button>
							</div>
						</form>
						<!-- Vertical Form -->
					</div>
				</div>
			</div>
		</div>
	</section>
</main>
<!-- End #main -->
<?php require_once('layout/footer.php'); ?>