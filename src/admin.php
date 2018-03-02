<?php  include_once('templates/header.php'); ?>

<link rel="stylesheet" type="text/css" href="styles/about.css">
<body>

	<div class="container">

		<nav class="navbar navbar-expand bg-primary navbar-light p-0">
			<ul class="navbar-nav mx-auto">
				<li class="nav-item active">
					<a class="nav-link" href="./admin_users.php">Users</a>
				</li>
				<li class="nav-item active">
					<a class="nav-link" href="#">Reports</a>
				</li>
				<li class="nav-item active">
					<a class="nav-link" href="#">Genres</a>
				</li>
			</ul>
		</nav>

		<hr>

		<table class="table">
			<thead>
				<tr class="row table-light text-center">
					<th class="col-3">Username</th>
					<th class="col-7">Report</th>
					<th class="col-2">Action</th>
				</tr>
			</thead>
			<tbody>
				<tr class="row table-light text-center border border-secondary" style="border-width: 3px !important;">
					<td class="col-3">John Doe</td>
					<td class="col-7">Link to reported content</td>
					<td class="col-2"><i class="fas fa-exclamation-triangle text-warning"></i><i class="fas fa-ban text-danger ml-1"></i></td>
				</tr>
				<tr class="row table-light text-center border border-warning" style="border-width: 3px !important;">
					<td class="col-3">Jane Doe</td>
					<td class="col-7">Link to reported content</td>
					<td class="col-2"><i class="fas fa-exclamation-triangle text-warning"></i><i class="fas fa-ban text-danger ml-1"></i></td>
				</tr>
				<tr class="row table-light text-center border border-danger" style="border-width: 3px !important;">
					<td class="col-3">Another Doe</td>
					<td class="col-7">Link to reported content</td>
					<td class="col-2"><i class="fas fa-exclamation-triangle text-warning"></i><i class="fas fa-ban text-danger ml-1"></i></td>
				</tr>
			</tbody>
		</table>
	</div>
</body>
</html>