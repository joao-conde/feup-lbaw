<?php  include_once('templates/header.php'); ?>

<link rel="stylesheet" type="text/css" href="styles/about.css">
<body>

	<div class="container">

		<nav class="navbar navbar-expand bg-primary navbar-light p-0">
			<ul class="navbar-nav mx-auto">
				<li class="nav-item">
					<a class="nav-link text-success" href="./admin_users.php">Users</a>
				</li>
				<li class="nav-item active">
					<a class="nav-link text-success" href="./admin_reports.php">Reports</a>
				</li>
				<li class="nav-item">
					<a class="nav-link text-success" href="./admin_genres.php">Genres</a>
				</li>
			</ul>
		</nav>

		<hr>

		<table class="table">
			<thead>
				<tr class="row table-light text-center">
					<th class="col-2">Username</th>
					<th class="col-4">Report</th>
					<th class="col-2">Date</th>
					<th class="col-2">Warnings</th>
					<th class="col-2">Action</th>
				</tr>
			</thead>
			<tbody>
				<tr class="row table-light text-center" style="border-width: 3px !important;">
					<td class="col-2">John Doe</td>
					<td class="col-4">Link to reported content</td>
					<td class="col-2">27/02/2018</td>
					<td class="col-2">0</td>
					<td class="col-2"><i class="fas fa-times text-danger"></i><i class="fas fa-exclamation-triangle text-warning ml-1"></i><i class="fas fa-ban text-danger ml-1"></i></td>
				</tr>
				<tr class="row table-light text-center" style="border-width: 3px !important;">
					<td class="col-2">Jane Doe</td>
					<td class="col-4">Link to reported content</td>
					<td class="col-2">2/02/2018</td>
					<td class="col-2">1</td>
					<td class="col-2"><i class="fas fa-times text-danger"></i><i class="fas fa-exclamation-triangle text-warning ml-1"></i><i class="fas fa-ban text-danger ml-1"></i></td>
				</tr>
				<tr class="row table-light text-center" style="border-width: 3px !important;">
					<td class="col-2">Another Doe</td>
					<td class="col-4">Link to reported content</td>
					<td class="col-2">13/01/2018</td>
					<td class="col-2">3</td>
					<td class="col-2"><i class="fas fa-times text-danger"></i><i class="fas fa-exclamation-triangle text-warning ml-1"></i><i class="fas fa-ban text-danger ml-1"></i></td>
				</tr>
			</tbody>
		</table>

		<nav aria-label="userspagination">
			<ul class="pagination justify-content-center">
				<li class="page-item disabled">
					<a class="page-link bg-primary" href="#" tabindex="-1">Previous</a>
				</li>
				<li class="page-item"><a class="page-link bg-primary" href="#">1</a></li>
				<li class="page-item"><a class="page-link bg-primary" href="#">2</a></li>
				<li class="page-item"><a class="page-link bg-primary" href="#">3</a></li>
				<li class="page-item">
					<a class="page-link bg-primary" href="#">Next</a>
				</li>
			</ul>
		</nav>

		<hr>

		<table class="table">
			<thead>
				<tr class="row table-light text-center">
					<th class="col-2">Band Name</th>
					<th class="col-4">Report</th>
					<th class="col-2">Date</th>
					<th class="col-2">Warnings</th>
					<th class="col-2">Action</th>
				</tr>
			</thead>
			<tbody>
				<tr class="row table-light text-center" style="border-width: 3px !important;">
					<td class="col-2">The Does</td>
					<td class="col-4">Link to reported content</td>
					<td class="col-2">23/02/2018</td>
					<td class="col-2">0</td>
					<td class="col-2"><i class="fas fa-times text-danger"></i><i class="fas fa-exclamation-triangle text-warning ml-1"></i><i class="fas fa-ban text-danger ml-1"></i></td>
				</tr>
				<tr class="row table-light text-center" style="border-width: 3px !important;">
					<td class="col-2">The Joes</td>
					<td class="col-4">Link to reported content</td>
					<td class="col-2">20/02/2018</td>
					<td class="col-2">2</td>
					<td class="col-2"><i class="fas fa-times text-danger"></i><i class="fas fa-exclamation-triangle text-warning ml-1"></i><i class="fas fa-ban text-danger ml-1"></i></td>
				</tr>
				<tr class="row table-light text-center" style="border-width: 3px !important;">
					<td class="col-2">The Toes</td>
					<td class="col-4">Link to reported content</td>
					<td class="col-2">3/02/2018</td>
					<td class="col-2">1</td>
					<td class="col-2"><i class="fas fa-times text-danger"></i><i class="fas fa-exclamation-triangle text-warning ml-1"></i><i class="fas fa-ban text-danger ml-1"></i></td>
				</tr>
			</tbody>
		</table>

		<nav aria-label="bandspagination">
			<ul class="pagination justify-content-center">
				<li class="page-item disabled">
					<a class="page-link bg-primary" href="#" tabindex="-1">Previous</a>
				</li>
				<li class="page-item"><a class="page-link bg-primary" href="#">1</a></li>
				<li class="page-item"><a class="page-link bg-primary" href="#">2</a></li>
				<li class="page-item"><a class="page-link bg-primary" href="#">3</a></li>
				<li class="page-item">
					<a class="page-link bg-primary" href="#">Next</a>
				</li>
			</ul>
		</nav>

	</div>
</body>
</html>