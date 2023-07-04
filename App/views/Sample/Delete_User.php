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
						<form class="row g-3" method="GET">

							<div class="col-12">
								<select class="form-select" aria-label="Default select example" name="Delete" required>
									<?php
									echo "<option disabled selected>Select </option>";
									foreach ($User_table as $value) {
										echo "<option value='{$value->id}'>{$value->id} : {$value->email} </option>";
									}
									?>
								</select>
							</div>
		
							<div class="text-center">
								<button type="submit" class="btn btn-danger">Delete</button>
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