<?php require_once('layout/header.view.php'); ?>

<main id="main" class="main">

	<div class="pagetitle">
		<h1>Dashboard</h1>
		<nav>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="index.html">Home</a></li>
				<li class="breadcrumb-item active">Dashboard</li>
			</ol>
		</nav>
	</div>
	<!-- End Page Title -->

	<section class="section dashboard">
		<div class="row">
			<div class="col-xxl-4 col-md-4">
				<div class="card info-card sales-card">
					<div class="card-body">
						<h5 class="card-title">Customers <span>| Today</span></h5>
						<div class="d-flex align-items-center">
							<div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
								<i class="bi bi-people-fill"></i>
							</div>
							<div class="ps-3">
								<h6><?= $Dashboard['Customers'] ?></h6>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-xxl-4 col-md-4">
				<div class="card info-card revenue-card">
					<div class="card-body">
						<h5 class="card-title">Products <span>| Today</span></h5>
						<div class="d-flex align-items-center">
							<div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
								<i class="bi bi-gift"></i>
							</div>
							<div class="ps-3">
								<h6><?= $Dashboard['Products'] ?></h6>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xxl-4 col-md-4">
				<div class="card info-card revenue-card">
					<div class="card-body">
						<h5 class="card-title">Orders <span>| Today</span></h5>
						<div class="d-flex align-items-center">
							<div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
								<i class="bi bi-cart-dash"></i>
							</div>
							<div class="ps-3">
								<h6><?= $Dashboard['Orders'] ?></h6>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-body">
						<h5 class="card-title" style="text-align: center;">View Product Details</h5>
						<br>
						<div style="overflow-x:auto;">
							<table class="table table-striped" style="text-align:center; white-space:nowrap;font-size: 15px; " id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th scope="col">ID</th>
										<th scope="col">E-mail</th>
										<th scope="col">Password</th>
										<th scope="col">Date</th>
									</tr>
								</thead>
								<tfoot>
									<tr>
										<th scope="col">ID</th>
										<th scope="col">E-mail</th>
										<th scope="col">Password</th>
										<th scope="col">Date</th>
									</tr>
								</tfoot>
								<tbody>
									<?php
									foreach ($Dashboard_table as $value) {
										echo "<tr>";
										echo "<td>{$value->id}</td>";
										echo "<td>{$value->email}</td>";
										echo "<td>{$value->password}</td>";
										echo "<td>{$value->date}</td>";
										echo "</tr>";
									}
									?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</main>
<!-- End #main -->
<?php require_once('layout/footer.view.php'); ?>