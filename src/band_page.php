<?php  include_once('templates/header.php'); ?>

<link rel="stylesheet" href="styles/profile.css">

<div class="profile-page row m-0">
	<div class="card float-right profile-card col-3 ml-2">
		<img class="card-img-top mt-2" src="images/users/example-post2.jpg" alt="Card image">
		<div class="card-body">
			<div class="row">
				<h4 class="card-title col-sm-10">The Does</h4>
				<img class="px-2 pb-2 edit-icon" src="images/system/edit-icon.svg" alt="Edit" width="36" height="36">
			</div>

			<ul class="list-group">
				<li class="list-group-item active">Members</li>
				<li class="list-group-item text-success">John Doe</li>
				<li class="list-group-item text-success">Jane Doe</li>
				<li class="list-group-item text-success">Another Doe</li>
			</ul>

			<hr>

			<ul class="list-group">
				<li class="list-group-item active">Genres</li>
				<li class="list-group-item text-success">Rock</li>
				<li class="list-group-item text-success">Blues</li>
				<li class="list-group-item text-success">Jazz</li>
			</ul>

			<hr>

			<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#schedulecollapse" aria-expanded="false" aria-controls="schedulecollapse">
				Schedule Concert
			</button>
			<div class="collapse" id="schedulecollapse">
				<div class="card card-body">
					<div class="form-group">
                        <label for="date">Date</label><br>
                        <input type="date" class="border border-top-0 border-left-0 border-right-0 border-primary" id="date">
                    </div> 
                    <div class="form-group">
                        <label for="date">Place</label><br>
						<input type="text" class="border border-top-0 border-left-0 border-right-0 border-primary" placeholder="Enter the place" id="city">
                    </div>
					<button type="submit" class="btn btn-primary">Schedule</button>
				</div>
			</div>
		</div>
	</div>

	<div class="container col m-0">
		<div class="jumbotron bg-white pt-4 pb-4 mt-0 mb-0">
			<div class="row mb-3">
				<img class="user-post-img rounded-circle" src="images/users/example-post2.jpg" alt="Profile picture">
				<h4 class="col-10 pt-2">Leonardo Teixeira</h4>
			</div>
			<img class="post-img" src="images/users/example-post.jpg" alt="Post picture">
		</div>

		<div class="jumbotron bg-white pt-4 pb-4 mt-2 mb-0">
			<div class="row mb-3">
				<img class="user-post-img rounded-circle" src="images/users/example-post2.jpg" alt="Profile picture">
				<h4 class="col-10 pt-2">Leonardo Teixeira</h4>
			</div>
			<img class="post-img" src="images/users/example-post.jpg" alt="Post picture">
		</div>
	</div>

	<div class="container col-3">
		<div class="card">
			<div class="card-body">
				<div class="row">
					<small class="col-7 w-100"><h5>Followers</h5></small> 
					<small class="col-5 w-100"><h6>11</h6></small>
				</div>
				<div class="row">
					<div class=" col float-right">
						<ul class="nav nav-pills nav-stacked float-right" style="overflow-y: scroll; height: 300px;">
							<li class="nav-item">
								<a class="nav-link" href="#" href="#"><img class="w-25 h-25 mr-1" src="images/system/dummy_profile.svg">John Doe</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#" href="#"><img class="w-25 h-25 mr-1" src="images/system/dummy_profile.svg">John Doe</a>
							</li><li class="nav-item">
								<a class="nav-link" href="#" href="#"><img class="w-25 h-25 mr-1" src="images/system/dummy_profile.svg">John Doe</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#" href="#"><img class="w-25 h-25 mr-1" src="images/system/dummy_profile.svg">John Doe</a>
							</li><li class="nav-item">
								<a class="nav-link" href="#" href="#"><img class="w-25 h-25 mr-1" src="images/system/dummy_profile.svg">John Doe</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#" href="#"><img class="w-25 h-25 mr-1" src="images/system/dummy_profile.svg">John Doe</a>
							</li><li class="nav-item">
								<a class="nav-link" href="#" href="#"><img class="w-25 h-25 mr-1" src="images/system/dummy_profile.svg">John Doe</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#" href="#"><img class="w-25 h-25 mr-1" src="images/system/dummy_profile.svg">John Doe</a>
							</li><li class="nav-item">
								<a class="nav-link" href="#" href="#"><img class="w-25 h-25 mr-1" src="images/system/dummy_profile.svg">John Doe</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#" href="#"><img class="w-25 h-25 mr-1" src="images/system/dummy_profile.svg">John Doe</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#" href="#"><img class="w-25 h-25 mr-1" src="images/system/dummy_profile.svg">John Doe</a>
							</li>
						</ul>
					</div>
				</div>
				
				<hr>

				<div class="row">
					<div class="row col-12">
						<small class="col-7 w-100"><h5>Applicants</h5></small> 
						<small class="col-5 w-100"><h6>3</h6></small>
					</div>
					<div class="col float-right">
						<ul class="nav nav-pills nav-stacked float-right" style="overflow-y: scroll; height: 150px;">
							<li class="nav-item">
								<a class="nav-link" href="#" href="#"><img class="w-25 h-25 mr-1" src="images/system/dummy_profile.svg">John Doe</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#" href="#"><img class="w-25 h-25 mr-1" src="images/system/dummy_profile.svg">John Doe</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#" href="#"><img class="w-25 h-25 mr-1" src="images/system/dummy_profile.svg">John Doe</a>
							</li>
						</ul>
					</div>
				</div>

				<hr>

				<div class="row">
					<small class="col-7 w-100"><h5>Concerts</h5></small> 
					<div class=" col float-right">
						<ul class="nav nav-pills nav-stacked" style="overflow-y: scroll; height: 150px;">
							<li class="nav-item">
								<a class="nav-link" href="#">Aliados - 3/03/2018</a>
							</li>
							
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

</body>
</html>