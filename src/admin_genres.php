<?php  include_once('templates/header.php'); ?>

<link rel="stylesheet" type="text/css" href="styles/about.css">
<body>

	<div class="container">

		<nav class="navbar navbar-expand bg-primary navbar-light p-0 mt-3">
			<ul class="navbar-nav mx-auto">
				<li class="nav-item">
					<a class="nav-link text-success" href="./admin_users.php">Users</a>
				</li>
				<li class="nav-item">
					<a class="nav-link text-success" href="./admin_reports.php">Reports</a>
				</li>
				<li class="nav-item active">
					<a class="nav-link text-success" href="./admin_genres.php">Genres</a>
				</li>
			</ul>
		</nav>

		<hr>

		<div class="row">
			<div class="container col-10 col-sm-5 text-center">
				<ul class="list-group ">
					<li class="list-group-item font-weight-bold">Genres</li>
					<li class="list-group-item">Rock</li>
					<li class="list-group-item">Jazz</li>
					<li class="list-group-item">Pop</li>
					<li class="list-group-item">Metal</li>
					<li class="list-group-item">Hip hop</li>
					<li class="list-group-item">Disco</li>
					<li class="list-group-item">Blues</li>
					<li class="list-group-item">
						<form action="/action_page.php">
							<div class="form-group">
								<input type="text" class="border border-top-0 border-left-0 border-right-0 border-primary text-center" id="genre" placeholder="Add new genre" name="genre">
							</div>	    	
							<button type="submit" class="btn btn-primary m-3">Add Genre</button>
						</form>
					</li>
				</ul>
			</div>
		</div>
	</div>
</body>
</html>