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
					<a class="nav-link" href="./admin_reports.php">Reports</a>
				</li>
				<li class="nav-item active">
					<a class="nav-link" href="./admin_genres.php">Genres</a>
				</li>
			</ul>
		</nav>

		<hr>

		<div class="row">
			<div class="container col-10 col-lg-5">
				<ul class="list-group pl-4">
					<li class="list-group-item font-weight-bold">Genres</li>
					<li class="list-group-item">Rock</li>
					<li class="list-group-item">Jazz</li>
					<li class="list-group-item">Pop</li>
					<li class="list-group-item">Metal</li>
					<li class="list-group-item">Hip hop</li>
					<li class="list-group-item">Disco</li>
					<li class="list-group-item">Blues</li>
				</ul>
			</div>

			<div class="container col-7 pt-3 pt-lg-0 col-lg-3">
				<div class="jumbotron bg-white p-0 pt-2 text-center">

					<div class="pull-right">
						<form action="/action_page.php">
							<div class="form-group">
								<label for="genre">Genre</label><br>
								<input type="text" class="border border-top-0 border-left-0 border-right-0 border-primary" id="genre" placeholder="Enter genre" name="genre">
							</div>	    	
							<button type="submit" class="btn btn-primary m-3">Add Genre</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>