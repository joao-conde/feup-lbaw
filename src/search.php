<?php  include_once('templates/header.php'); ?>
<link rel="stylesheet" href="styles/feed.css">
<script defer src="scripts/followers.js"></script>

<div class="container-fluid">
	<div id="floatingmenu" class="row d-md-none my-0 bg-primary text-white w-100 border-top border-secondary py-2">
		<div class="col">
			<input type="checkbox" id="toggleleft">
			<i class="align-middle fas fa-bars" id="ham"></i>
			<div class="d-md-none jumbotron jumbotron-fluid d-flex py-1 border rounded border-dark" id="leftmenu">

				<ul>
					<li class="display-5 text-success">My Bands
						<ul>
							<li>
								<a href="#">
									<img src="images/system/dummy_profile.svg" class="profile_img_chat">
									<p class="text-secondary">Cold Play</p>

								</a>
							</li>
							<li>
								<a href="#">
									<img src="images/system/dummy_profile.svg" class="profile_img_chat">
									<p class="text-secondary">Pearl Jam</p>

								</a>
							</li>
						</ul>
					</li>
					<li class="display-5 text-success">My Fellow Musicians
						<ul>
							<li>
								<a href="#">
									<img src="images/system/dummy_profile.svg" class="profile_img_chat">
									<p class="text-secondary">Eric Clapton</p>

								</a>
							</li>
							<li>
								<a href="#">
									<img src="images/system/dummy_profile.svg" class="profile_img_chat">
									<p class="text-secondary">Eddie Vedder</p>

								</a>
							</li>
							<li>
								<a href="#">
									<img src="images/system/dummy_profile.svg" class="profile_img_chat">
									<p class="text-secondary">Jeff Ament</p>

								</a>
							</li>
						</ul>
					</li>
				</ul>
			</div>
		</div>

		<div id="homeButton" class="col-auto">
			<i class="fas fa-home text-white"></i>
		</div>

		<div id="chatButton" class="col-auto">
			<i class="fas fa-comments"></i>
		</div>

	</div>

	<div id="main" class="row justify-content-center">

		<div id="leftfeedmenu" class="py-3 card bg-light rounded-0 col-2 d-none d-md-block">

			<?php include('leftfeedmenu.html')?>


		</div>

		<div id="posts" class="col-12 col-md-6 p-0 mt-2">

			<h2 class="text-primary text-center">Search results for "Pearl Jam"</h2>

			<div class="jumbotron p-3 mb-2 justify-content-center d-flex">
				
				<ul class="list-group col-12">
					<li class="list-group-item d-flex">
						<img src="images/system/dummy_profile.svg" class="profile">
						<ul class="list-group col-10 align-self-center">
							<li class="list-group-item border-0 py-0 my-0">
								<div class="row">
									<span class="list-group-item-text col-7">Pearl Jam</span>
									<button type="button" class="btn btn-sm btn-danger col-5 align-self-center">Unfollow</button>
								</div>
							</li>
							<li class="list-group-item border-0 py-0 my-0">
								<small><span class="list-group-item-text">Seattle, USA</span></small>
							</li>
							<li class="list-group-item border-0 py-0 my-0">
								<small><span class="list-group-item-text">Rock</span></small>
							</li>
						</ul>
					</li>

					<li class="list-group-item d-flex">
						<img src="images/system/dummy_profile.svg" class="profile">
						<ul class="list-group col-10 align-self-center">
							<li class="list-group-item border-0 py-0 my-0">
								<div class="row">
									<span class="list-group-item-text col-7">Eddie Vedder</span>
									<button type="button" class="btn btn-sm btn-danger col-5 align-self-center">Unfollow</button>
								</div>
							</li>
							<li class="list-group-item border-0 py-0 my-0">
								<small><span class="list-group-item-text">Illinois, USA</span></small>
							</li>
							<li class="list-group-item border-0 py-0 my-0">
								<small><span class="list-group-item-text">Guitarist</span></small>
							</li>
						</ul>
					</li>

					<li class="list-group-item d-flex">
						<img src="images/system/dummy_profile.svg" class="profile">
						<ul class="list-group col-10 align-self-center">
							<li class="list-group-item border-0 py-0 my-0">
								<div class="row">
									<span class="list-group-item-text col-7">Jeff Ament</span>
									<button type="button" class="btn btn-sm btn-danger col-5 align-self-center">Unfollow</button>
								</div>
							</li>
							<li class="list-group-item border-0 py-0 my-0">
								<small><span class="list-group-item-text">Montana, USA</span></small>
							</li>
							<li class="list-group-item border-0 py-0 my-0">
								<small><span class="list-group-item-text">Bassist</span></small>
							</li>
						</ul>
					</li>

					<li class="list-group-item d-flex">
						<img src="images/system/dummy_profile.svg" class="profile">
						<ul class="list-group col-10 align-self-center">
							<li class="list-group-item border-0 py-0 my-0">
								<div class="row">
									<span class="list-group-item-text col-7">Matt Cameron</span>
									<button type="button" class="btn btn-sm btn-danger col-5 align-self-center">Unfollow</button>
								</div>
							</li>
							<li class="list-group-item border-0 py-0 my-0">
								<small><span class="list-group-item-text">California, USA</span></small>
							</li>
							<li class="list-group-item border-0 py-0 my-0">
								<small><span class="list-group-item-text">Drummer</span></small>
							</li>
						</ul>
					</li>

				</ul>
			</div>

		</div>



		<div id="chat" class="p-0 card bg-light rounded-0 col-12 col-md-3 mt-0">

			<?php include('chat.html')?>


		</div>
	</div>

</div>
</body>

</html>