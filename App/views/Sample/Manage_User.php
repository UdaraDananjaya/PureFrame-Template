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
								<tbody>
									<?php if (empty($Users_table)) : ?>
										<tr>
											<td colspan="5">- No Data Available In Table -</td>
										</tr>
									<?php else : ?>
										<?php foreach ($Users_table as $value) : ?>
											<tr>
												<td><?= $value->id ?></td>
												<td><?= $value->email ?></td>
												<td><?= $value->password ?></td>
												<td><?= $value->date ?></td>
												<td>
													<a onclick="return confirm('Are you sure you want to delete?')" href="<?= BASE ?>Sample/Delete_User?Delete=<?= $value->id ?>"><i class="bi bi-trash3-fill"></i></a>
												</td>
											</tr>
										<?php endforeach; ?>
									<?php endif; ?>
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
<script>
	$(document).ready(function() {
		$('#dataTable').DataTable();
	});
</script>

<script>
	$(document).ready(function() {
		$('#dataTable').Tabledit({
			deleteButton: false,
			editButton: false,
			columns: {
				identifier: [0, 'id'],
				editable: [
					[1, 'email'],
					[2, 'password']
				]
			},
			hideIdentifier: false,
			url: '<?=BASE?>/Sample/Manage_User'
		});
	});
</script>

<?php require_once('layout/footer.php'); ?>