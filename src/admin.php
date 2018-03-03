<?php  include_once('templates/header.php'); ?>

<link rel="stylesheet" type="text/css" href="styles/about.css">
<body>

	<div class="container">
		<div class="row justify-content-center mt-5">
			<a href="./admin_users.php">
				<div class="card col-8 col-md-3 mr-md-4 d-flex text-center">
					<img class="card-img-top mt-3 border rounded-bottom" src="./images/system/users.png" alt="Card image">
					<div class="card-body">
						<a href="./admin_users.php" class="btn btn-primary">Users</a>
					</div>
				</div>
			</a>

			<a href="./admin_reports.php">
				<div class="card col-8 col-md-3 mr-md-4 d-flex text-center">
					<img class="card-img-top mt-3" src="./images/system/warning.jpg" alt="Card image">
					<div class="card-body">
						<a href="./admin_reports.php" class="btn btn-primary">Reports</a>
					</div>
				</div>
			</a>

			<a href="./admin_genres.php">
				<div class="card col-8 col-md-3 d-flex text-center">
					<img class="card-img-top mt-3 border rounded-bottom" src="./images/system/music.jpg" alt="Card image">
					<div class="card-body">
						<a href="./admin_genres.php" class="btn btn-primary">Genres</a>
					</div>
				</div>
			</a>

		</div>
	</div>
</body>
</html>