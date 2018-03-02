<?php  include_once('templates/header.php'); ?>

<link rel="stylesheet" type="text/css" href="styles/about.css">
<body>

	<div class="container">

		<nav class="navbar navbar-expand bg-primary navbar-light p-0">
			<ul class="navbar-nav mx-auto">
				<li class="nav-item active">
					<a class="nav-link text-success" href="./admin_users.php">Users</a>
				</li>
				<li class="nav-item">
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
					<th class="col-3">Username</th>
					<th class="col-6">Email</th>
					<th class="col-3">Admin Privileges</th>
				</tr>
			</thead>
			<tbody>
				<tr class="row table-light text-center">
					<td class="col-3">John Doe</td>
					<td class="col-6">johndoe@doe.com</td>
					<td class="col-3">
						<label class="switch">
							<input type="checkbox" checked>
							<span class="slider round"></span>
						</label>
					</td>
				</tr>
				<tr class="row table-light text-center">
					<td class="col-3">Jane Doe</td>
					<td class="col-6">janedoe@doe.com</td>
					<td class="col-3">
						<label class="switch">
							<input type="checkbox">
							<span class="slider round"></span>
						</label>
					</td>
				</tr>
				<tr class="row table-light text-center">
					<td class="col-3">Another Doe</td>
					<td class="col-6">anotherdoe@doe.com</td>
					<td class="col-3">
						<label class="switch">
							<input type="checkbox">
							<span class="slider round"></span>
						</label>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
</body>
</html>