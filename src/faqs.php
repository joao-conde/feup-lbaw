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
		<h1 class="mt-3 text-primary">FAQ</h1>
		<hr>

		<section class="pb-3">
			<!--ul class="list-group">
				<li class="list-group-item">First item</li>
				<li class="list-group-item">Second item</li>
				<li class="list-group-item">Third item</li>
			</ul-->
			<div id="accordion">
				<div class="card mb-1 bg-primary" style="border: none;">
					<div class="card-header" id="headingOne">
						<h5 class="mb-0">
							<button class="btn btn-link text-secondary font-weight-bold" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
								Simple collapsible
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
				<hr>
				<div class="row">
					<div class="col">
						<button type="button" class="btn btn-primary text-secondary font-weight-bold" data-toggle="collapse" data-target="#faq1" style="width: 100%">FAQ1</button>
						<div id="faq1" class="collapse" data-parent="#accordion" style="background-color: white;">
							Answer 1
						</div>
					</div>
					<div class="col">
						<button type="button" style="width: 100%" class="btn btn-primary text-secondary font-weight-bold" data-toggle="collapse" data-target="#faq2">FAQ2</button>
						<div id="faq2" class="collapse" data-parent="#accordion" style="background-color: white;">
							Answer 2
						</div>
					</div>
					<div class="col">
						<button type="button" style="width: 100%" class="btn btn-primary text-secondary font-weight-bold" data-toggle="collapse" data-target="#faq3">FAQ3</button>
						<div id="faq3" class="collapse" data-parent="#accordion" style="background-color: white;">
							Answer 3
						</div>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col">
						<button type="button" class="btn btn-primary text-secondary font-weight-bold" data-toggle="collapse" data-target="#faq4" style="width: 100%">FAQ4</button>
						<div id="faq4" class="collapse" data-parent="#accordion" style="background-color: white;">
							Answer 4
						</div>
					</div>
					<div class="col">
						<button type="button" style="width: 100%" class="btn btn-primary text-secondary font-weight-bold" data-toggle="collapse" data-target="#faq5">FAQ5</button>
						<div id="faq5" class="collapse" data-parent="#accordion" style="background-color: white;">
							Answer 5
						</div>
					</div>
					<div class="col">
						<button type="button" style="width: 100%" class="btn btn-primary text-secondary font-weight-bold" data-toggle="collapse" data-target="#faq6">FAQ6</button>
						<div id="faq6" class="collapse" data-parent="#accordion" style="background-color: white;">
							Answer 6
						</div>
					</div>
				</div>
				<hr>
			</div>
		</section>
	</div>
</body>
</html>