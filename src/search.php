<?php  include_once('templates/header.php'); ?>
<link rel="stylesheet" href="styles/feed.css">

<div class="container-fluid">

	<div class="row d-md-none my-2">
		<div class="col">
			<input type="checkbox" id="toggleleft">
			<i class="text-primary align-middle fas fa-bars" id="ham"></i>
			<div class="d-md-none jumbotron jumbotron-fluid bg-primary d-flex py-1" id="leftmenu">

				<ul>
					<li class="display-5 text-secondary">My Bands
						<ul>
							<li>
								<a href="#" class="text-success">
									<img src="images/system/dummy_profile.svg" class="profile_img_chat">
									<p>Cold Play</p>

								</a>
							</li>
							<li>
								<a href="#" class="text-success">
									<img src="images/system/dummy_profile.svg" class="profile_img_chat">
									<p>Pearl Jam</p>

								</a>
							</li>
						</ul>
					</li>
					<li class="display-5 text-secondary">My Fellow Musicians
						<ul>
							<li>
								<a href="#" class="text-success">
									<img src="images/system/dummy_profile.svg" class="profile_img_chat">
									<p>Eric Clapton</p>

								</a>
							</li>
							<li>
								<a href="#" class="text-success">
									<img src="images/system/dummy_profile.svg" class="profile_img_chat">
									<p>Eddie Vedder</p>

								</a>
							</li>
							<li>
								<a href="#" class="text-success">
									<img src="images/system/dummy_profile.svg" class="profile_img_chat">
									<p>Jeff Ament</p>

								</a>
							</li>
						</ul>
					</li>
				</ul>
			</div>
		</div>

		<div class="col-auto">
			<i class="fas fa-home"></i>
		</div>

		<div class="col-auto">
			<i class="fas fa-comments"></i>
		</div>
	</div>

	<div id="main" class="row justify-content-center">

		<div id="leftfeedmenu" class="py-3 card bg-light rounded-0 col-2 d-none d-md-block">

			<?php include('leftfeedmenu.html')?>

		</div>

		<div id="chat" class="p-0 card bg-light rounded-0 col-12 col-md-3 d-none d-md-block" style="overflow-x: hidden;">
			
			<?php include('chat.html')?>

		</div>

		<div id="posts" class="col-12 col-md-6 p-0 mt-2">

			<h2 class="text-primary">Search results for "Pearl Jam"</h2>

			<div class="jumbotron p-3 mb-2 justify-content-center d-flex">
	
				<ul class="list-group col-10">
				  <li class="list-group-item d-flex">
				  	<img src="images/system/dummy_profile.svg" class="profile">
				  	<ul class="list-group col-10 align-self-center">
				  		<li class="list-group-item border-0 py-0 my-0">
				  			<span class="list-group-item-text">Pearl Jam</span>
				  			<button type="button" class="btn btn-sm btn-danger float-right">Unfollow</button>
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
				  			<span class="list-group-item-text">Eddie Vedder</span>
				  			<button type="button" class="btn btn-sm btn-danger float-right">Unfollow</button>
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
				  			<span class="list-group-item-text">Jeff Ament</span>
				  			<button type="button" class="btn btn-sm btn-danger float-right">Unfollow</button>
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
				  			<span class="list-group-item-text">Matt Cameron</span>
				  			<button type="button" class="btn btn-sm btn-danger float-right">Unfollow</button>
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

	</div>

</body>

</html>