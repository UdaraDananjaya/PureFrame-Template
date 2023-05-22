<main id="main" class="main">
	<div class="pagetitle">
		<h1><?= $page ?> </h1>
		<nav>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="index">Home</a></li>
				<li class="breadcrumb-item active"><?= $page ?> </li>
			</ol>
		</nav>
	</div>
	<!-- End Page Title -->
	<section class="section dashboard">
		<div class="row justify-content-center">
			<div class="col-lg-6">
				<div class="card">
					<div class="card-body">
						<h5 class="card-title"><?= $Form_Title ?></h5>
						<!-- Vertical Form -->
						<form class="row g-3" method="POST">
							<?php
							foreach ($Form_Data as $value) {
								if ($value['type'] == 'hidden') {
									echo "<input type='{$value['type']}' name='{$value['name']}' class='form-control' id='{$value['name']}' {$value['attribute']} value='{$value['value']}'>";
								} elseif ($value['type'] == 'select') {

									echo "<div class='col-12'>";
									echo "<label for='{$value['name']}' class='form-label'>{$value['label']}</label>";
									echo "<select id='{$value['name']}' class='form-select' aria-label='Default select example' name='{$value['name']}' {$value['attribute']}>";
									echo "<option disabled selected>Select {$value['name']}</option>";
									foreach ($value['value']  as $value) {

										foreach ($value as $key => $val) {
											echo "<option value='{$key}'> {$val} </option>";
										}
									}
									echo "</select>";
									echo "</div>";
								} else {
									echo "<div class='col-12'>";
									echo "<label for='{$value['name']}' class='form-label'>{$value['label']}</label>";
									echo "<input type='{$value['type']}' name='{$value['name']}' class='form-control' id='{$value['name']}' {$value['attribute']} value='{$value['value']}'>";
									echo "</div>";
								}
							}
							?>
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