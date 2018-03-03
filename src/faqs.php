<?php  include_once('templates/header.php'); ?>

<link rel="stylesheet" type="text/css" href="styles/about.css">
<body>

	<div class="container">

		<nav aria-label="breadcrumb">
			<ol class="breadcrumb mt-3">
				<li class="breadcrumb-item"><a href="index.html" class="text-primary font-weight-bold">Home</a></li>
				<li class="breadcrumb-item active" aria-current="page">FAQ</li>
			</ol>
		</nav>
		<h1 class="mt-3 text-primary">FAQ</h1><br><br>

		<section class="pb-3">
			<div id="accordion">
				<div class="card mb-1 bg-primary" style="border: none;">
					<div class="card-header" id="headingOne">
						<h5 class="mb-0">
							<button class="btn btn-link text-secondary font-weight-bold" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
								FAQ1
							</button>
						</h5>
					</div>

					<div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
						<div class="card-body" style="background-color: white;">
							Lorem ipsum dolor sit amet, consectetur adipisicing elit,
							sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
							quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
						</div>
					</div>
				</div>
				<br>
				<div class="card mb-1 bg-primary" style="border: none;">
					<div class="card-header" id="headingOne">
						<h5 class="mb-0">
							<button class="btn btn-link text-secondary font-weight-bold" data-toggle="collapse" data-target="#collapse2" aria-expanded="false" aria-controls="collapseOne">
								FAQ2
							</button>
						</h5>
					</div>

					<div id="collapse2" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
						<div class="card-body" style="background-color: white;">
							Lorem ipsum dolor sit amet, consectetur adipisicing elit,
							sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
							quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
						</div>
					</div>
				</div>
				<br>
				<div class="card mb-1 bg-primary" style="border: none;">
					<div class="card-header" id="headingOne">
						<h5 class="mb-0">
							<button class="btn btn-link text-secondary font-weight-bold" data-toggle="collapse" data-target="#collapse3" aria-expanded="false" aria-controls="collapseOne">
								FAQ3
							</button>
						</h5>
					</div>

					<div id="collapse3" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
						<div class="card-body" style="background-color: white;">
							Lorem ipsum dolor sit amet, consectetur adipisicing elit,
							sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
							quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
						</div>
					</div>
				</div>
				<br>
				<div class="card mb-1 bg-primary" style="border: none;">
					<div class="card-header" id="headingOne">
						<h5 class="mb-0">
							<button class="btn btn-link text-secondary font-weight-bold" data-toggle="collapse" data-target="#collapse4" aria-expanded="false" aria-controls="collapseOne">
								FAQ4
							</button>
						</h5>
					</div>

					<div id="collapse4" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
						<div class="card-body" style="background-color: white;">
							Lorem ipsum dolor sit amet, consectetur adipisicing elit,
							sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
							quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
</body>
</html>