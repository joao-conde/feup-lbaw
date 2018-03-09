<?php  include_once('templates/header.php'); ?>

<link rel="stylesheet" type="text/css" href="styles/about.css">
<body>

	<div class="container  main_nav">

		<nav class="navbar navbar-expand bg-primary navbar-light p-0 mt-3">
			<ul class="navbar-nav mx-auto">
				<li class="nav-item active">
					<a class="nav-link text-success" href="./admin_users.php">Users</a>
				</li>
				<li class="nav-item">
					<a class="nav-link text-success" href="./admin_user_reports.php">User reports</a>
				</li>
				<li class="nav-item">
					<a class="nav-link text-success" href="./admin_band_reports.php">Band reports</a>
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
							<span class="slider round bg-primary"></span>
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
					<td class="col-3">Tom Doe</td>
					<td class="col-6">tomdoe@doe.com</td>
					<td class="col-3">
						<label class="switch">
							<input type="checkbox">
							<span class="slider round"></span>
						</label>
					</td>
				</tr>
				<tr class="row table-light text-center">
					<td class="col-3">Doe Doe</td>
					<td class="col-6">doedoe@doe.com</td>
					<td class="col-3">
						<label class="switch">
							<input type="checkbox">
							<span class="slider round"></span>
						</label>
					</td>
				</tr>
				<tr class="row table-light text-center">
					<td class="col-3">Moses Doe</td>
					<td class="col-6">mosesdoe@doe.com</td>
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