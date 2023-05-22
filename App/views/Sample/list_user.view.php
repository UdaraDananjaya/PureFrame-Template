<?php require_once('layout/header.view.php'); ?>

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
										<th scope="col">Action</th>
									</tr>
								</thead>
								<tfoot>
									<tr>
										<th scope="col">ID</th>
										<th scope="col">E-mail</th>
										<th scope="col">Password</th>
										<th scope="col">Date</th>
										<th scope="col">Action</th>
									</tr>
								</tfoot>
								<tbody>
									<?php
									foreach ($Usres_table as $value) {
										echo "<tr>";
										echo "<td>{$value->id}</td>";
										echo "<td>{$value->email}</td>";
										echo "<td>{$value->password}</td>";
										echo "<td>{$value->date}</td>";
										echo "<td><a href='" . BASE . "Sample/Manage_User?id={$value->id}'><i class='bi bi-pencil'></i></a></td>";
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