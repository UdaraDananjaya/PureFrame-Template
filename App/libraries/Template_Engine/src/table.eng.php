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
	<section class="section">
		<div class="row">
			<div class="col-lg-12">

				<div class="card">
					<div class="card-body">
					<h5 class="card-title" style="text-align: center;"><?= $Table_Title ?></h5>

						<table class="table datatable" >
							<thead>
								<tr>
									<?php
									echo "<tr>";
									echo "<th scope='col'>#</th>";
									foreach ($Table_Header as $value) {
										echo "<th scope='col'>$value</th>";
									}
									echo "</tr>";
									?>
								</tr>
							</thead>
							<tbody>
						
							<?php
							$i =0;
									if ($Table_Data == false) {
										echo "<tr>";
										foreach ($Table_Header as $value) {
											echo "<th scope='col'>-</th>";
										}
										echo "</tr>";
									} else {
										foreach ($Table_Data as $values) {
											$i=$i+1;
											echo "<tr>";
											echo "<th scope='row'>$i</th>";
											foreach ($values as $value) {
												echo "<td>{$value}</td>";
											}
											echo "</tr>";
										}
									}
									?>

							</tbody>
						</table>
						<!-- End Table with stripped rows -->

					</div>
				</div>

			</div>
		</div>
	</section>
</main>