<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width = device-width, initial-scale = 1 shrink-to-fit=no">
	<title>Music Box</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" defer>
	<link href="https://maxcdn.bootstrapcdn.com/bootswatch/4.0.0-beta.3/flatly/bootstrap.min.css" rel="stylesheet" integrity="sha384-+lmTKXkS+c9d34U9obDdGOZT7zqFicJDkhckYYsW7oenXR37T2OEV4uqfUO45M87" crossorigin="anonymous">
	<link href="{{ asset('css/header.css') }}" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
	<link href="{{ asset('css/feed.css') }}" rel="stylesheet">
	<link href="{{ asset('js/feed.js') }}" rel="stylesheet">
	<script>
		$(document).ready(function () {
			$('[data-toggle="tooltip"]').tooltip();
		});
	</script>
	<link href="{{ asset('css/chat.css') }}" rel="stylesheet">
</head>
<body>  
	<div id="header" class="container-fluid bg-primary text-white">

		<div class="row justify-content-between p-2">

			<div id="logo" class="col-5 col-md-4 col-lg-3 p-0 pl-1 align-self-center mr-1 order-md-1">

				<div class="row justify-content-start">

					<div class="col-auto pr-0 align-self-center">

						<a href="{{ url('/users/{id}/posts') }}"><img src="{{ asset('images/system/logo_white.svg') }}" class="logo"></a>

					</div>

					<div class="col-8 align-self-center pl-2 pr-0">

						<h1 class="h4">Music Box</h1>
					</div>

				</div>

			</div>

			<div id="mobileToggle2" class="col-auto align-self-center d-md-none p-0" data-toggle="collapse" data-target="#searchbar">

				<a href="search.html"><img class="search" src="{{ asset('images/system/search_icon.svg') }}"></a>

			</div>      

			<div id="fixedNavBar" class="col-5 col-md-3 col-lg-3 align-self-center order-md-3">

				<div class="row justify-content-end">

					<nav class="navbar navbar-expand navbar-light p-0">
						
						<ul class="navbar-nav">

							<li class="nav-item dropdown">
								<a class="nav-link text-success pt-3" href="#" role="button" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false"><i class="far fa-envelope"></i><span class="badge badge-secondary bg-primary text-warning">2</span></a>
								<div id="messagesList" class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
									
									<h5 class=" dropdown-item text-center">Messages</h5>
									<div class="dropdown-divider"></div>
									
									<a class="dropdown-item p-2" href="#">
										
										<small class=" time mr-1">16:32</small>
										<img class="profile_img_message mr-1" src="{{ asset('images/system/dummy_profile.svg') }}">
										<small class="sender"><i>Mike</i></small>
										<small class="message">Band meeting today</small>
										
									</a>
									<a class="dropdown-item p-2" href="#">

										<small class=" time mr-1">10:01</small>
										<img class="profile_img_message mr-1" src="{{ asset('images/system/dummy_profile.svg') }}">
										<small class="sender"><i>Anne</i></small>
										<small class="message">Check this song</small>
										
									</a>
								</div>
							</li>

							<li class="nav-item">
								<a class="nav-link text-success pt-3" href="#" role="button" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false"><i class="far fa-flag"></i><span class="badge badge-secondary bg-primary text-warning">3</span></a>
								<div id="notificationsList" class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
									<h5 class="text-center dropdown-item">Notifications</h5>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item text-warning" href="#"><small class=" time mr-1">18:01</small><small>You have been warned</a></small>
									<a class="dropdown-item" href="#"><small class=" time mr-1">16:32</small><small>band you are following has just posted a new video</a></small>
									<a class="dropdown-item " href="#"><small class=" time mr-1">11:21</small><small>Your friend has just commented</a></small>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item text-center" href="#"><small>See all</small></a>

								</div>
							</li>

							<li class="nav-item dropdown">
								<a class="nav-link text-success p-1" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<img class="profile" src="{{ asset('images/system/dummy_profile.svg') }}">
								</a>
								<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
									<a class="dropdown-item " href="profile.html">My Profile</a>
									<a class="dropdown-item" href="{{ url('/admin.user_reports') }}">Admin Page</a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item text-danger" href="{{ url('/login') }}">Logout</a>
								</div>
							</li>

						</ul>
						
					</nav>

				</div>

			</div>

			<div id="searchbarHeader" class="col-12 col-md-4  order-last align-self-center order-md-2">

				<div class="row">

					<nav class="navbar  navbar-expand-md p-0">
						
						<div class="collapse navbar-collapse" id="searchbar">

							<form class="form-inline">
								<input class="form-control mr-2 w-75" type="search" placeholder="Search" aria-label="Search">
								<button class="btn btn-outline-success my-2" type="submit"><i class="fas fa-search"></i></button>
							</form>
							
						</div>   
					</nav>

				</div>

			</div>


			<div id="navBar" class="col-12 col-md-2 order-last align-self-center order-md-4 d-md-none">

				<div class="row">

					<nav class="navbar navbar-right navbar-expand-md  p-0">
						
						<div class="collapse navbar-collapse" id="navMore">

							<ul class="navbar-nav">

								<li class="nav-item d-md-none">
									<a class="nav-link text-success" href="profile.html">My Profile</a>
								</li>

								<li class="nav-item d-md-none">
									<a class="nav-link text-success" href="#">My Bands</a>
								</li>

								<li class="nav-item d-md-none">
									<a class="nav-link text-success" href="#">Following</a>
								</li>

								<li class="nav-item d-md-none">
									<a class="nav-link text-danger" href="#">Logout</a>
								</li>

							</ul>
							
						</div>   
					</nav>

				</div>

			</div>

		</div>
	</div>


	<div class="container-fluid">
		<div id="floatingmenu" class="row d-md-none my-0 bg-primary text-white w-100 border-top border-secondary py-2">
			<div class="col">
				<input type="checkbox" id="toggleleft">
				<i class="align-middle fas fa-bars" id="ham"></i>
				<div class="d-md-none jumbotron jumbotron-fluid d-flex py-1 border rounded border-dark" id="leftmenu">

					<ul>
						<li class="display-5 text-primary">My Bands
							<ul>
								<li>
									<a href="#">
										<img src="{{ asset('images/system/dummy_profile.svg') }}" class="profile_img_chat">
										<p class="text-secondary">Cold Play</p>

									</a>
								</li>
								<li>
									<a href="#">
										<img src="{{ asset('images/system/dummy_profile.svg') }}" class="profile_img_chat">
										<p class="text-secondary">Pearl Jam</p>

									</a>
								</li>
								<li>
									<a href="#">
										<p class="text-primary">Create Band</p>
									</a>
								</li>
							</ul>
						</li>
						<hr>
						<li class="display-5 text-primary">My Fellow Musicians
							<ul>
								<li>
									<a href="#">
										<img src="{{ asset('images/system/dummy_profile.svg') }}" class="profile_img_chat">
										<p class="text-secondary">Eric Clapton</p>

									</a>
								</li>
								<li>
									<a href="#">
										<img src="{{ asset('images/system/dummy_profile.svg') }}" class="profile_img_chat">
										<p class="text-secondary">Eddie Vedder</p>

									</a>
								</li>
								<li>
									<a href="#">
										<img src="{{ asset('images/system/dummy_profile.svg') }}" class="profile_img_chat">
										<p class="text-secondary">Jeff Ament</p>

									</a>
								</li>
							</ul>
						</li>
						<hr>

						<li><a href="followers.html"><p class="text-secondary align-middle mb-1">Followers</p></a></li>
						<li><a href="following_users.html"><p class="text-secondary align-middle mb-1">Following <small>(users)</small></p></a></li>
						<li><a href="following_bands.html"><p class="text-secondary align-middle mb-1">Following <small>(bands)</small></p></a></li>
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

				<a class="mr-1 d-block" href="profile.html">
					<img class="profile mr-2" src="{{ asset('images/system/dummy_profile.svg') }}">
					<span class="text-secondary align-middle">My Profile</span>
				</a>

				<hr>

				<p class="align-middle mb-1">Bands</p>
				<a class="mr-1 d-block" href="#">
					<img class="profile_img_feed" src="{{ asset('images/system/dummy_profile.svg') }}">
					<small class="text-primary">Pearl Jam</small>
				</a>
				<a class="mr-1 d-block" href="#">
					<img class="profile_img_feed" src="{{ asset('images/system/dummy_profile.svg') }}">
					<small class="text-primary">Future Islands</small>
				</a>
				<a class="mr-1 d-block" href="#">
					<img class="profile_img_feed" src="{{ asset('images/system/dummy_profile.svg') }}">
					<small class="text-primary">Beach House</small>
				</a>
				<div class="d-flex flex-row m-0">

					<a class="mr-1 d-block mr-2" href="#">
						<small><p class="text-secondary mt-2 mb-0">See all</p></small>

					</a>
					<a class="mr-1 d-block" href="new_band.html">
						<small><p class="text-secondary mt-2 mb-0">Create Band</p></small>
					</a>

				</div>

				<hr>

				<p class="align-middle mb-1">Fellow Musicians</p>
				<a class="mr-1 d-block" href="#">
					<img class="profile_img_feed" src="{{ asset('images/system/dummy_profile.svg') }}">
					<small class="text-primary">Eddie Vedder</small>
				</a>
				<a class="mr-1 d-block" href="#">
					<img class="profile_img_feed" src="{{ asset('images/system/dummy_profile.svg') }}">
					<small class="text-primary">Jeff Ament</small>
				</a>
				<a class="mr-1 d-block" href="#">
					<img class="profile_img_feed" src="{{ asset('images/system/dummy_profile.svg') }}">
					<small class="text-primary">Matt Cameron</small>
				</a>
				<a class="mr-1 d-block mr-2" href="#">
					<small><p class="text-secondary mt-2">See all</p></small>
				</a>

				<hr>

				<a href="followers.html"><p class="text-secondary align-middle mb-1">Followers</p></a>
				<a href="following_users.html"><p class="text-secondary align-middle mb-1">Following <small>(users)</small></p></a>
				<a href="following_bands.html"><p class="text-secondary align-middle mb-1">Following <small>(bands)</small></p></a>

			</div>

					<div id="posts" class="col-12 col-md-6 p-0 mt-2">

				<div class="jumbotron p-3 post mb-2" id="newpost">
					<div class="row">
						<img src="{{ asset('images/system/dummy_profile.svg') }}" class="col-1 col-sm-2 mt-1 mr-2 mr-md-0 profile_img_chat p-0 border-0">
						<textarea placeholder="New post..." class="col-6 col-sm-7 col-md-5 col-lg-6 mt-1 text-primary form-control-sm border border-secondary mr-0" rows="1" id="new_post_ta" style="height: 30px;"></textarea>
						<div class="btn-group col-1 col-sm-2 col-md-1 col-lg-2" id="btns" role="group">
							<button type="button" class="btn btn-light">
								<i class="far fa-image"></i>
							</button>
							<button type="button" class="btn btn-light">
								<i class="fas fa-film"></i>
							</button>
							<button type="button" class="btn btn-light">
								<i class="fas fa-music"></i>
							</button>
						</div>
					</div>
					<div class="row justify-content-end mr-3" id="postbutton">
						<div class="col-10"></div>
						<input type="submit" value="post" class="btn btn-primary btn-sm col-2 pull-right justify-content-end">
					</div>
				</div>

				<div class="jumbotron p-3 post mb-2">

					<div class="row mb-3 justify-content-between">
						<div class="col">
							<img src="{{ asset('images/system/dummy_profile.svg') }}" class="profile mr-2">
							<a class="text-secondary align-middle" href="#">João Pedro</a>
						</div>

						<div class="col-4 text-right">
							<small>
								<i class="text-secondary">1/3/2018 10:33</i>
							</small>
						</div>

					</div>

					<div class="row justify-content-start">

						<div class="col align-self-center text-justify">

							<small>This is my first post using MusicBox! Follow me to checkout my work!
							</small>

						</div>

					</div>

					<hr>

					<div class="row comment mb-1">

						<div class="col align-self-center">

							<div class="row">

								<div class="col-auto comment_author">
									<img src="{{ asset('images/system/dummy_profile.svg') }}" class=" profile_img_message mr-2">
									<small>
										<a class="text-secondary align-middle" href="#">Leo</a>
									</small>
								</div>

								<div class="col">
									<small class="comment_text">
										<small>
											<sup>
												<i class="fas fa-quote-right"></i>
											</sup>
											<i>Nice</i>
										</small>
									</small>
								</div>
							</div>

						</div>

					</div>

					<div class="row comment mb-1">

						<div class="col align-self-center">

							<div class="row">

								<div class="col-auto comment_author">
									<img src="{{ asset('images/system/dummy_profile.svg') }}" class=" profile_img_message mr-2">
									<small>
										<a class="text-secondary align-middle" href="#">Leo</a>
									</small>
								</div>

								<div class="col">
									<small class="comment_text">
										<small>
											<sup>
												<i class="fas fa-quote-right"></i>
											</sup>
											<i>Nice</i>
										</small>
									</small>
								</div>
							</div>

						</div>

					</div>


					<form class="form-inline row justify-content-between px-3 pt-2">
						<textarea placeholder="New comment..." class="col text-primary form-control-sm border mr-2 border-secondary"
						rows="1" id="new_comment_ta"></textarea>
						<input type="submit" value="comment" class="btn btn-primary btn-sm col-auto">
					</form>


				</div>

				<div class="jumbotron  p-3 post mb-2">

					<div class="row mb-3 justify-content-between">
						<div class="col">
							<img src="{{ asset('images/system/dummy_profile.svg') }}" class="profile mr-2">
							<a class="text-secondary align-middle" href="#">João Pedro</a>
						</div>

						<div class="col-4 text-right">
							<small>
								<i class="text-secondary">1/3/2018 10:33</i>
							</small>
						</div>

					</div>

					<div class="row justify-content-start">

						<div class="col align-self-center text-justify">

							<small>Phasellus blandit lectus lectus, at sagittis orci tincidunt vitae. Vivamus id quam quis lacus venenatis
								hendrerit quis sed quam. Praesent sodales elit ac elit convallis pulvinar. Fusce bibendum, dui
								ac dapibus venenatis, lacus augue vehicula ligula, vel venenatis turpis risus sed lectus. Quisque
								nunc purus, pellentesque vel odio vitae, facilisis hendrerit arcu. Class aptent taciti sociosqu
								ad litora torquent per conubia nostra, per inceptos himenaeos.
							</small>

						</div>

					</div>

					<hr>

					<div class="row comment mb-1">

						<div class="col align-self-center">

							<div class="row">

								<div class="col-auto comment_author">
									<img src="{{ asset('images/system/dummy_profile.svg') }}" class=" profile_img_message mr-2">
									<small>
										<a class="text-secondary align-middle" href="#">Leo</a>
									</small>
								</div>

								<div class="col">
									<small class="comment_text">
										<small>
											<sup>
												<i class="fas fa-quote-right"></i>
											</sup>
											<i>Nice</i>
										</small>
									</small>
								</div>
							</div>

						</div>

					</div>

					<div class="row comment mb-1">

						<div class="col align-self-center">

							<div class="row">

								<div class="col-auto comment_author">
									<img src="{{ asset('images/system/dummy_profile.svg') }}" class=" profile_img_message mr-2">
									<small>
										<a class="text-secondary align-middle" href="#">Leo</a>
									</small>
								</div>

								<div class="col">
									<small class="comment_text">
										<small>
											<sup>
												<i class="fas fa-quote-right"></i>
											</sup>
											<i>Nice</i>
										</small>
									</small>
								</div>
							</div>

						</div>

					</div>

				</div>

				<div class="jumbotron  p-3 post mb-2">

					<div class="row mb-3 justify-content-between">
						<div class="col">
							<img src="{{ asset('images/system/dummy_profile.svg') }}" class="profile mr-2">
							<a class="text-secondary align-middle" href="#">João Pedro</a>
						</div>

						<div class="col-4 text-right">
							<small>
								<i class="text-secondary">1/3/2018 10:33</i>
							</small>
						</div>

					</div>

					<div class="row justify-content-start">

						<div class="col align-self-center text-justify">

							<small>Phasellus blandit lectus lectus, at sagittis orci tincidunt vitae. Vivamus id quam quis lacus venenatis
								hendrerit quis sed quam. Praesent sodales elit ac elit convallis pulvinar. Fusce bibendum, dui
								ac dapibus venenatis, lacus augue vehicula ligula, vel venenatis turpis risus sed lectus. Quisque
								nunc purus, pellentesque vel odio vitae, facilisis hendrerit arcu. Class aptent taciti sociosqu
								ad litora torquent per conubia nostra, per inceptos himenaeos.
							</small>

						</div>

					</div>

					<hr>

					<div class="row comment mb-1">

						<div class="col align-self-center">

							<div class="row">

								<div class="col-auto comment_author">
									<img src="{{ asset('images/system/dummy_profile.svg') }}" class=" profile_img_message mr-2">
									<small>
										<a class="text-secondary align-middle" href="#">Leo</a>
									</small>
								</div>

								<div class="col">
									<small class="comment_text">
										<small>
											<sup>
												<i class="fas fa-quote-right"></i>
											</sup>
											<i>Nice</i>
										</small>
									</small>
								</div>
							</div>

						</div>

					</div>

					<div class="row comment mb-1">

						<div class="col align-self-center">

							<div class="row">

								<div class="col-auto comment_author">
									<img src="{{ asset('images/system/dummy_profile.svg') }}" class=" profile_img_message mr-2">
									<small>
										<a class="text-secondary align-middle" href="#">Leo</a>
									</small>
								</div>

								<div class="col">
									<small class="comment_text">
										<small>
											<sup>
												<i class="fas fa-quote-right"></i>
											</sup>
											<i>Nice</i>
										</small>
									</small>
								</div>
							</div>

						</div>

					</div>

				</div>

				<div class="jumbotron  p-3 post mb-2">

					<div class="row mb-3 justify-content-between">
						<div class="col">
							<img src="{{ asset('images/system/dummy_profile.svg') }}" class="profile mr-2">
							<a class="text-secondary align-middle" href="#">João Pedro</a>
						</div>

						<div class="col-4 text-right">
							<small>
								<i class="text-secondary">1/3/2018 10:33</i>
							</small>
						</div>

					</div>

					<div class="row justify-content-start">

						<div class="col align-self-center text-justify">

							<small>Phasellus blandit lectus lectus, at sagittis orci tincidunt vitae. Vivamus id quam quis lacus venenatis
								hendrerit quis sed quam. Praesent sodales elit ac elit convallis pulvinar. Fusce bibendum, dui
								ac dapibus venenatis, lacus augue vehicula ligula, vel venenatis turpis risus sed lectus. Quisque
								nunc purus, pellentesque vel odio vitae, facilisis hendrerit arcu. Class aptent taciti sociosqu
								ad litora torquent per conubia nostra, per inceptos himenaeos.
							</small>

						</div>

					</div>

					<hr>

					<div class="row comment mb-1">

						<div class="col align-self-center">

							<div class="row">

								<div class="col-auto comment_author">
									<img src="{{ asset('images/system/dummy_profile.svg') }}" class=" profile_img_message mr-2">
									<small>
										<a class="text-secondary align-middle" href="#">Leo</a>
									</small>
								</div>

								<div class="col">
									<small class="comment_text">
										<small>
											<sup>
												<i class="fas fa-quote-right"></i>
											</sup>
											<i>Nice</i>
										</small>
									</small>
								</div>
							</div>

						</div>

					</div>

					<div class="row comment mb-1">

						<div class="col align-self-center">

							<div class="row">

								<div class="col-auto comment_author">
									<img src="{{ asset('images/system/dummy_profile.svg') }}" class=" profile_img_message mr-2">
									<small>
										<a class="text-secondary align-middle" href="#">Leo</a>
									</small>
								</div>

								<div class="col">
									<small class="comment_text">
										<small>
											<sup>
												<i class="fas fa-quote-right"></i>
											</sup>
											<i>Nice</i>
										</small>
									</small>
								</div>
							</div>

						</div>

					</div>

				</div>

				<div class="jumbotron  p-3 post mb-2">

					<div class="row mb-3 justify-content-between">
						<div class="col">
							<img src="{{ asset('images/system/dummy_profile.svg') }}" class="profile mr-2">
							<a class="text-secondary align-middle" href="#">João Pedro</a>
						</div>

						<div class="col-4 text-right">
							<small>
								<i class="text-secondary">1/3/2018 10:33</i>
							</small>
						</div>

					</div>

					<div class="row justify-content-start">

						<div class="col align-self-center text-justify">

							<small>Phasellus blandit lectus lectus, at sagittis orci tincidunt vitae. Vivamus id quam quis lacus venenatis
								hendrerit quis sed quam. Praesent sodales elit ac elit convallis pulvinar. Fusce bibendum, dui
								ac dapibus venenatis, lacus augue vehicula ligula, vel venenatis turpis risus sed lectus. Quisque
								nunc purus, pellentesque vel odio vitae, facilisis hendrerit arcu. Class aptent taciti sociosqu
								ad litora torquent per conubia nostra, per inceptos himenaeos.
							</small>

						</div>

					</div>

					<hr>

					<div class="row comment mb-1">

						<div class="col align-self-center">

							<div class="row">

								<div class="col-auto comment_author">
									<img src="{{ asset('images/system/dummy_profile.svg') }}" class=" profile_img_message mr-2">
									<small>
										<a class="text-secondary align-middle" href="#">Leo</a>
									</small>
								</div>

								<div class="col">
									<small class="comment_text">
										<small>
											<sup>
												<i class="fas fa-quote-right"></i>
											</sup>
											<i>Nice</i>
										</small>
									</small>
								</div>
							</div>

						</div>

					</div>

					<div class="row comment mb-1">

						<div class="col align-self-center">

							<div class="row">

								<div class="col-auto comment_author">
									<img src="{{ asset('images/system/dummy_profile.svg') }}" class=" profile_img_message mr-2">
									<small>
										<a class="text-secondary align-middle" href="#">Leo</a>
									</small>
								</div>

								<div class="col">
									<small class="comment_text">
										<small>
											<sup>
												<i class="fas fa-quote-right"></i>
											</sup>
											<i>Nice</i>
										</small>
									</small>
								</div>
							</div>

						</div>

					</div>

				</div>

			</div>

			<div id="chat" class="p-0 card bg-light rounded-0 col-12 col-md-3 mt-0">

				<form class="form-inline mt-2 ml-0 pl-2 pr-4 row justify-content-center">
					<input class="form-control mr-2 col-8 col-lg-9" type="search" placeholder="Search" aria-label="Search">
					<button class="btn btn-outline-success my-2 col-auto" type="submit">
						<i class="fas fa-search"></i>
					</button>
				</form>

				<div class="container">
					<span class="h5">Online</span>
					<span class="text-success status-dot align-baseline pl-1">
						<i class="fas fa-circle"></i>
					</span>
				</div>
				<hr class="m-2">


				<div class="chat_dropdown row online ml-2 justify-content-between pr-4" data-toggle="collapse" href="#chatWindow1" role="button"
				aria-expanded="false" aria-controls="chatWindow">
				<div class="col">
					<img src="{{ asset('images/system/dummy_profile.svg') }}" class="mr-2 profile_img_chat">
					<small class="text-secondary">Leo</small>

				</div>
				<div class="col-2">
					<span class="badge badge-primary align-middle">4</span>
				</div>
			</div>

			<div class="collapse" id="chatWindow1">
				<div class="card card-body rounded-0 p-0 m-0 chats">
					<div class="container">
						<div class="row my-2">
							<div class="col-auto px-2">
								<a href="#" data-toggle="tooltip" title="16:33" data-placement="left">
									<img src="{{ asset('images/system/dummy_profile.svg') }}" class="profile_img_chat_window">
								</a>

							</div>
							<div class="col px-0">
								<small>What is the meaning of life?</small>
							</div>
						</div>
						<div class="row my-2">
							<div class="col-auto px-2">
								<a href="#" data-toggle="tooltip" title="16:33" data-placement="left">
									<img src="{{ asset('images/system/dummy_profile.svg') }}" class="profile_img_chat_window">
								</a>

							</div>
							<div class="col px-0">
								<small>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi sed augue massa. Donec ultrices sollicitudin
								est, eu rhoncus tellus fermentum quis.</small>
							</div>
						</div>
						<div class="row my-2">
							<div class="col-auto px-2">
								<a href="#" data-toggle="tooltip" title="16:33" data-placement="left">
									<img src="{{ asset('images/system/dummy_profile.svg') }}" class="profile_img_chat_window">
								</a>

							</div>
							<div class="col px-0">
								<small>Ok, good bye! Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi sed augue massa. Donec ultrices
								sollicitudin est, eu rhoncus tellus fermentum quis.</small>
							</div>
						</div>
						<div class="row my-2">
							<div class="col-auto px-2">
								<a href="#" data-toggle="tooltip" title="16:33" data-placement="left">
									<img src="{{ asset('images/system/dummy_profile.svg') }}" class="profile_img_chat_window">
								</a>

							</div>
							<div class="col px-0">
								<small>Ok, good bye! Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi sed augue massa. Donec ultrices
								sollicitudin est, eu rhoncus tellus fermentum quis.</small>
							</div>
						</div>
						<div class="row my-2">
							<div class="col-auto px-2">
								<a href="#" data-toggle="tooltip" title="16:33" data-placement="left">
									<img src="{{ asset('images/system/dummy_profile.svg') }}" class="profile_img_chat_window">
								</a>

							</div>
							<div class="col px-0">
								<small>Ok, good bye! Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi sed augue massa. Donec ultrices
								sollicitudin est, eu rhoncus tellus fermentum quis.</small>
							</div>
						</div>

					</div>
				</div>

				<div class="container">
					<form class="row form-inline">
						<img src="{{ asset('images/system/dummy_profile.svg') }}" class="m-2 profile_img_chat">
						<textarea class="col form-control mr-1" name="Chat message" id="chat_msg" cols="25" rows="1"></textarea>
						<button type="submit" class="col-auto form-control btn btn-sm btn-primary">
							<i class="fas fa-arrow-right"></i>
						</button>
					</form>
				</div>

			</div>


			<div class="chat_dropdown row online ml-2 justify-content-between pr-4" data-toggle="collapse" href="#chatDanny" role="button"
			aria-expanded="false" aria-controls="chatWindow">
			<div class="col">
				<img src="{{ asset('images/system/dummy_profile.svg') }}" class="mr-2 profile_img_chat">
				<small class="text-secondary">Danny</small>

			</div>
			<div class="col-2">
				<span class="badge badge-primary align-middle">2</span>
			</div>
		</div>

		<div class="collapse" id="chatDanny">
			<div class="card card-body rounded-0 p-0 m-0 chats">
				<div class="container">
					<div class="row my-2">
						<div class="col-auto px-2">
							<a href="#" data-toggle="tooltip" title="16:33" data-placement="left">
								<img src="{{ asset('images/system/dummy_profile.svg') }}" class="profile_img_chat_window">
							</a>

						</div>
						<div class="col px-0">
							<small>What is the meaning of life?</small>
						</div>
					</div>
					<div class="row my-2">
						<div class="col-auto px-2">
							<a href="#" data-toggle="tooltip" title="16:33" data-placement="left">
								<img src="{{ asset('images/system/dummy_profile.svg') }}" class="profile_img_chat_window">
							</a>

						</div>
						<div class="col px-0">
							<small>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi sed augue massa. Donec ultrices sollicitudin
							est, eu rhoncus tellus fermentum quis.</small>
						</div>
					</div>
					<div class="row my-2">
						<div class="col-auto px-2">
							<a href="#" data-toggle="tooltip" title="16:33" data-placement="left">
								<img src="{{ asset('images/system/dummy_profile.svg') }}" class="profile_img_chat_window">
							</a>

						</div>
						<div class="col px-0">
							<small>Ok, good bye! Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi sed augue massa. Donec ultrices
							sollicitudin est, eu rhoncus tellus fermentum quis.</small>
						</div>
					</div>
					<div class="row my-2">
						<div class="col-auto px-2">
							<a href="#" data-toggle="tooltip" title="16:33" data-placement="left">
								<img src="{{ asset('images/system/dummy_profile.svg') }}" class="profile_img_chat_window">
							</a>

						</div>
						<div class="col px-0">
							<small>Ok, good bye! Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi sed augue massa. Donec ultrices
							sollicitudin est, eu rhoncus tellus fermentum quis.</small>
						</div>
					</div>
					<div class="row my-2">
						<div class="col-auto px-2">
							<a href="#" data-toggle="tooltip" title="16:33" data-placement="left">
								<img src="{{ asset('images/system/dummy_profile.svg') }}" class="profile_img_chat_window">
							</a>

						</div>
						<div class="col px-0">
							<small>Ok, good bye! Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi sed augue massa. Donec ultrices
							sollicitudin est, eu rhoncus tellus fermentum quis.</small>
						</div>
					</div>

				</div>
			</div>

			<div class="container">
				<form class="row form-inline">
					<img src="{{ asset('images/system/dummy_profile.svg') }}" class="m-2 profile_img_chat">
					<textarea class="col form-control mr-1" name="Chat message" id="chat_msg" cols="25" rows="1"></textarea>
					<button type="submit" class="col-auto form-control btn btn-sm btn-primary">
						<i class="fas fa-arrow-right"></i>
					</button>
				</form>
			</div>

		</div>


		<div class="chat_dropdown row online ml-2 justify-content-between pr-4" data-toggle="collapse" href="#chatJP" role="button"
		aria-expanded="false" aria-controls="chatWindow">
		<div class="col">
			<img src="{{ asset('images/system/dummy_profile.svg') }}" class="mr-2 profile_img_chat">
			<small class="text-secondary">João Pedro</small>

		</div>
		<div class="col-2">
			<span class="badge badge-primary align-middle">5</span>
		</div>
	</div>

	<div class="collapse" id="chatJP">
		<div class="card card-body rounded-0 p-0 m-0 chats">
			<div class="container">
				<div class="row my-2">
					<div class="col-auto px-2">
						<a href="#" data-toggle="tooltip" title="16:33" data-placement="left">
							<img src="{{ asset('images/system/dummy_profile.svg') }}" class="profile_img_chat_window">
						</a>

					</div>
					<div class="col px-0">
						<small>What is the meaning of life?</small>
					</div>
				</div>
				<div class="row my-2">
					<div class="col-auto px-2">
						<a href="#" data-toggle="tooltip" title="16:33" data-placement="left">
							<img src="{{ asset('images/system/dummy_profile.svg') }}" class="profile_img_chat_window">
						</a>

					</div>
					<div class="col px-0">
						<small>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi sed augue massa. Donec ultrices sollicitudin
						est, eu rhoncus tellus fermentum quis.</small>
					</div>
				</div>
				<div class="row my-2">
					<div class="col-auto px-2">
						<a href="#" data-toggle="tooltip" title="16:33" data-placement="left">
							<img src="{{ asset('images/system/dummy_profile.svg') }}" class="profile_img_chat_window">
						</a>

					</div>
					<div class="col px-0">
						<small>Ok, good bye! Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi sed augue massa. Donec ultrices
						sollicitudin est, eu rhoncus tellus fermentum quis.</small>
					</div>
				</div>
				<div class="row my-2">
					<div class="col-auto px-2">
						<a href="#" data-toggle="tooltip" title="16:33" data-placement="left">
							<img src="{{ asset('images/system/dummy_profile.svg') }}" class="profile_img_chat_window">
						</a>

					</div>
					<div class="col px-0">
						<small>Ok, good bye! Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi sed augue massa. Donec ultrices
						sollicitudin est, eu rhoncus tellus fermentum quis.</small>
					</div>
				</div>
				<div class="row my-2">
					<div class="col-auto px-2">
						<a href="#" data-toggle="tooltip" title="16:33" data-placement="left">
							<img src="{{ asset('images/system/dummy_profile.svg') }}" class="profile_img_chat_window">
						</a>

					</div>
					<div class="col px-0">
						<small>Ok, good bye! Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi sed augue massa. Donec ultrices
						sollicitudin est, eu rhoncus tellus fermentum quis.</small>
					</div>
				</div>

			</div>
		</div>

		<div class="container">
			<form class="row form-inline">
				<img src="{{ asset('images/system/dummy_profile.svg') }}" class="m-2 profile_img_chat">
				<textarea class="col form-control mr-1" name="Chat message" id="chat_msg" cols="25" rows="1"></textarea>
				<button type="submit" class="col-auto form-control btn btn-sm btn-primary">
					<i class="fas fa-arrow-right"></i>
				</button>
			</form>
		</div>

	</div>


	<div class="chat_dropdown row online ml-2 justify-content-between pr-4" data-toggle="collapse" href="#chatConde" role="button"
	aria-expanded="false" aria-controls="chatWindow">
	<div class="col">
		<img src="{{ asset('images/system/dummy_profile.svg') }}" class="mr-2 profile_img_chat">
		<small class="text-secondary">João Conde</small>

	</div>
	<div class="col-2">
		<span class="badge badge-primary align-middle">132</span>
	</div>
</div>

<div class="collapse" id="chatConde">
	<div class="card card-body rounded-0 p-0 m-0 chats">
		<div class="container">
			<div class="row my-2">
				<div class="col-auto px-2">
					<a href="#" data-toggle="tooltip" title="16:33" data-placement="left">
						<img src="{{ asset('images/system/dummy_profile.svg') }}" class="profile_img_chat_window">
					</a>

				</div>
				<div class="col px-0">
					<small>What is the meaning of life?</small>
				</div>
			</div>
			<div class="row my-2">
				<div class="col-auto px-2">
					<a href="#" data-toggle="tooltip" title="16:33" data-placement="left">
						<img src="{{ asset('images/system/dummy_profile.svg') }}" class="profile_img_chat_window">
					</a>

				</div>
				<div class="col px-0">
					<small>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi sed augue massa. Donec ultrices sollicitudin
					est, eu rhoncus tellus fermentum quis.</small>
				</div>
			</div>
			<div class="row my-2">
				<div class="col-auto px-2">
					<a href="#" data-toggle="tooltip" title="16:33" data-placement="left">
						<img src="{{ asset('images/system/dummy_profile.svg') }}" class="profile_img_chat_window">
					</a>

				</div>
				<div class="col px-0">
					<small>Ok, good bye! Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi sed augue massa. Donec ultrices
					sollicitudin est, eu rhoncus tellus fermentum quis.</small>
				</div>
			</div>
			<div class="row my-2">
				<div class="col-auto px-2">
					<a href="#" data-toggle="tooltip" title="16:33" data-placement="left">
						<img src="{{ asset('images/system/dummy_profile.svg') }}" class="profile_img_chat_window">
					</a>

				</div>
				<div class="col px-0">
					<small>Ok, good bye! Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi sed augue massa. Donec ultrices
					sollicitudin est, eu rhoncus tellus fermentum quis.</small>
				</div>
			</div>
			<div class="row my-2">
				<div class="col-auto px-2">
					<a href="#" data-toggle="tooltip" title="16:33" data-placement="left">
						<img src="{{ asset('images/system/dummy_profile.svg') }}" class="profile_img_chat_window">
					</a>

				</div>
				<div class="col px-0">
					<small>Ok, good bye! Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi sed augue massa. Donec ultrices
					sollicitudin est, eu rhoncus tellus fermentum quis.</small>
				</div>
			</div>

		</div>
	</div>

	<div class="container">
		<form class="row form-inline">
			<img src="{{ asset('images/system/dummy_profile.svg') }}" class="m-2 profile_img_chat">
			<textarea class="col form-control mr-1" name="Chat message" id="chat_msg" cols="25" rows="1"></textarea>
			<button type="submit" class="col-auto form-control btn btn-sm btn-primary">
				<i class="fas fa-arrow-right"></i>
			</button>
		</form>
	</div>

</div>



<div class="container mt-3">
	<span class="h5">Offline</span>
	<span class="text-danger status-dot align-middle pl-1">
		<i class="fas fa-circle"></i>
	</span>
</div>
<hr class="m-2">


<div class="chat_dropdown row offline ml-2 justify-content-between pr-4" href="#chatMichelangelo" data-toggle="collapse"
role="button" aria-expanded="false" aria-controls="chatWindow">
<div class="col">
	<img src="{{ asset('images/system/dummy_profile.svg') }}" class="mr-2 profile_img_chat">
	<small class="text-secondary">Michelangelo</small>

</div>
</div>

<div class="collapse" id="chatMichelangelo">
	<div class="card card-body rounded-0 p-0 m-0 chats">
		<div class="container">
			<div class="row my-2">
				<div class="col-auto px-2">
					<a href="#" data-toggle="tooltip" title="16:33" data-placement="left">
						<img src="{{ asset('images/system/dummy_profile.svg') }}" class="profile_img_chat_window">
					</a>

				</div>
				<div class="col px-0">
					<small>What is the meaning of life?</small>
				</div>
			</div>
			<div class="row my-2">
				<div class="col-auto px-2">
					<a href="#" data-toggle="tooltip" title="16:33" data-placement="left">
						<img src="{{ asset('images/system/dummy_profile.svg') }}" class="profile_img_chat_window">
					</a>

				</div>
				<div class="col px-0">
					<small>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi sed augue massa. Donec ultrices sollicitudin
					est, eu rhoncus tellus fermentum quis.</small>
				</div>
			</div>
			<div class="row my-2">
				<div class="col-auto px-2">
					<a href="#" data-toggle="tooltip" title="16:33" data-placement="left">
						<img src="{{ asset('images/system/dummy_profile.svg') }}" class="profile_img_chat_window">
					</a>

				</div>
				<div class="col px-0">
					<small>Ok, good bye! Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi sed augue massa. Donec ultrices
					sollicitudin est, eu rhoncus tellus fermentum quis.</small>
				</div>
			</div>
			<div class="row my-2">
				<div class="col-auto px-2">
					<a href="#" data-toggle="tooltip" title="16:33" data-placement="left">
						<img src="{{ asset('images/system/dummy_profile.svg') }}" class="profile_img_chat_window">
					</a>

				</div>
				<div class="col px-0">
					<small>Ok, good bye! Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi sed augue massa. Donec ultrices
					sollicitudin est, eu rhoncus tellus fermentum quis.</small>
				</div>
			</div>
			<div class="row my-2">
				<div class="col-auto px-2">
					<a href="#" data-toggle="tooltip" title="16:33" data-placement="left">
						<img src="{{ asset('images/system/dummy_profile.svg') }}" class="profile_img_chat_window">
					</a>

				</div>
				<div class="col px-0">
					<small>Ok, good bye! Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi sed augue massa. Donec ultrices
					sollicitudin est, eu rhoncus tellus fermentum quis.</small>
				</div>
			</div>

		</div>
	</div>

	<div class="container">
		<form class="row form-inline">
			<img src="{{ asset('images/system/dummy_profile.svg') }}" class="m-2 profile_img_chat">
			<textarea class="col form-control mr-1" name="Chat message" id="chat_msg" cols="25" rows="1"></textarea>
			<button type="submit" class="col-auto form-control btn btn-sm btn-primary">
				<i class="fas fa-arrow-right"></i>
			</button>
		</form>
	</div>

</div>



<div class="chat_dropdown row offline ml-2 justify-content-between pr-4" data-toggle="collapse" href="#chatDummy" role="button"
aria-expanded="false" aria-controls="chatWindow">
<div class="col">
	<img src="{{ asset('images/system/dummy_profile.svg') }}" class="mr-2 profile_img_chat">
	<small class="text-secondary">Dummy User da Silva</small>

</div>
<div class="col-2">
	<span class="badge badge-primary align-middle">1</span>
</div>
</div>

<div class="collapse" id="chatDummy">
	<div class="card card-body rounded-0 p-0 m-0 chats">
		<div class="container">
			<div class="row my-2">
				<div class="col-auto px-2">
					<a href="#" data-toggle="tooltip" title="16:33" data-placement="left">
						<img src="{{ asset('images/system/dummy_profile.svg') }}" class="profile_img_chat_window">
					</a>

				</div>
				<div class="col px-0">
					<small>What is the meaning of life?</small>
				</div>
			</div>
			<div class="row my-2">
				<div class="col-auto px-2">
					<a href="#" data-toggle="tooltip" title="16:33" data-placement="left">
						<img src="{{ asset('images/system/dummy_profile.svg') }}" class="profile_img_chat_window">
					</a>

				</div>
				<div class="col px-0">
					<small>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi sed augue massa. Donec ultrices sollicitudin
					est, eu rhoncus tellus fermentum quis.</small>
				</div>
			</div>
			<div class="row my-2">
				<div class="col-auto px-2">
					<a href="#" data-toggle="tooltip" title="16:33" data-placement="left">
						<img src="{{ asset('images/system/dummy_profile.svg') }}" class="profile_img_chat_window">
					</a>

				</div>
				<div class="col px-0">
					<small>Ok, good bye! Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi sed augue massa. Donec ultrices
					sollicitudin est, eu rhoncus tellus fermentum quis.</small>
				</div>
			</div>
			<div class="row my-2">
				<div class="col-auto px-2">
					<a href="#" data-toggle="tooltip" title="16:33" data-placement="left">
						<img src="{{ asset('images/system/dummy_profile.svg') }}" class="profile_img_chat_window">
					</a>

				</div>
				<div class="col px-0">
					<small>Ok, good bye! Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi sed augue massa. Donec ultrices
					sollicitudin est, eu rhoncus tellus fermentum quis.</small>
				</div>
			</div>
			<div class="row my-2">
				<div class="col-auto px-2">
					<a href="#" data-toggle="tooltip" title="16:33" data-placement="left">
						<img src="{{ asset('images/system/dummy_profile.svg') }}" class="profile_img_chat_window">
					</a>

				</div>
				<div class="col px-0">
					<small>Ok, good bye! Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi sed augue massa. Donec ultrices
					sollicitudin est, eu rhoncus tellus fermentum quis.</small>
				</div>
			</div>

		</div>
	</div>

	<div class="container">
		<form class="row form-inline">
			<img src="{{ asset('images/system/dummy_profile.svg') }}" class="m-2 profile_img_chat">
			<textarea class="col form-control mr-1" name="Chat message" id="chat_msg" cols="25" rows="1"></textarea>
			<button type="submit" class="col-auto form-control btn btn-sm btn-primary">
				<i class="fas fa-arrow-right"></i>
			</button>
		</form>
	</div>

</div>



<div class="chat_dropdown row offline ml-2 justify-content-between pr-4" data-toggle="collapse" href="#chatDonnatello" role="button"
aria-expanded="false" aria-controls="chatWindow">
<div class="col">
	<img src="{{ asset('images/system/dummy_profile.svg') }}" class="mr-2 profile_img_chat">
	<small class="text-secondary">Donnatello</small>

</div>
</div>

<div class="collapse" id="chatDonnatello">
	<div class="card card-body rounded-0 p-0 m-0 chats">
		<div class="container">
			<div class="row my-2">
				<div class="col-auto px-2">
					<a href="#" data-toggle="tooltip" title="16:33" data-placement="left">
						<img src="{{ asset('images/system/dummy_profile.svg') }}" class="profile_img_chat_window">
					</a>

				</div>
				<div class="col px-0">
					<small>What is the meaning of life?</small>
				</div>
			</div>
			<div class="row my-2">
				<div class="col-auto px-2">
					<a href="#" data-toggle="tooltip" title="16:33" data-placement="left">
						<img src="{{ asset('images/system/dummy_profile.svg') }}" class="profile_img_chat_window">
					</a>

				</div>
				<div class="col px-0">
					<small>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi sed augue massa. Donec ultrices sollicitudin
					est, eu rhoncus tellus fermentum quis.</small>
				</div>
			</div>
			<div class="row my-2">
				<div class="col-auto px-2">
					<a href="#" data-toggle="tooltip" title="16:33" data-placement="left">
						<img src="{{ asset('images/system/dummy_profile.svg') }}" class="profile_img_chat_window">
					</a>

				</div>
				<div class="col px-0">
					<small>Ok, good bye! Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi sed augue massa. Donec ultrices
					sollicitudin est, eu rhoncus tellus fermentum quis.</small>
				</div>
			</div>
			<div class="row my-2">
				<div class="col-auto px-2">
					<a href="#" data-toggle="tooltip" title="16:33" data-placement="left">
						<img src="{{ asset('images/system/dummy_profile.svg') }}" class="profile_img_chat_window">
					</a>

				</div>
				<div class="col px-0">
					<small>Ok, good bye! Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi sed augue massa. Donec ultrices
					sollicitudin est, eu rhoncus tellus fermentum quis.</small>
				</div>
			</div>
			<div class="row my-2">
				<div class="col-auto px-2">
					<a href="#" data-toggle="tooltip" title="16:33" data-placement="left">
						<img src="{{ asset('images/system/dummy_profile.svg') }}" class="profile_img_chat_window">
					</a>

				</div>
				<div class="col px-0">
					<small>Ok, good bye! Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi sed augue massa. Donec ultrices
					sollicitudin est, eu rhoncus tellus fermentum quis.</small>
				</div>
			</div>

		</div>
	</div>

	<div class="container">
		<form class="row form-inline">
			<img src="{{ asset('images/system/dummy_profile.svg') }}" class="m-2 profile_img_chat">
			<textarea class="col form-control mr-1" name="Chat message" id="chat_msg" cols="25" rows="1"></textarea>
			<button type="submit" class="col-auto form-control btn btn-sm btn-primary">
				<i class="fas fa-arrow-right"></i>
			</button>
		</form>
	</div>

</div>



<div class="chat_dropdown row offline ml-2 justify-content-between pr-4" data-toggle="collapse" href="#chatDonnatello" role="button"
aria-expanded="false" aria-controls="chatWindow">
<div class="col">
	<img src="{{ asset('images/system/dummy_profile.svg') }}" class="mr-2 profile_img_chat">
	<small class="text-secondary">Donnatello</small>

</div>
</div>


<div class="chat_dropdown row offline ml-2 justify-content-between pr-4" data-toggle="collapse" href="#chatDonnatello" role="button"
aria-expanded="false" aria-controls="chatWindow">
<div class="col">
	<img src="{{ asset('images/system/dummy_profile.svg') }}" class="mr-2 profile_img_chat">
	<small class="text-secondary">Donnatello</small>

</div>
</div>


<div class="chat_dropdown row offline ml-2 justify-content-between pr-4" data-toggle="collapse" href="#chatDonnatello" role="button"
aria-expanded="false" aria-controls="chatWindow">
<div class="col">
	<img src="{{ asset('images/system/dummy_profile.svg') }}" class="mr-2 profile_img_chat">
	<small class="text-secondary">Donnatello</small>

</div>
</div>


<div class="chat_dropdown row offline ml-2 justify-content-between pr-4" data-toggle="collapse" href="#chatDonnatello" role="button"
aria-expanded="false" aria-controls="chatWindow">
<div class="col">
	<img src="{{ asset('images/system/dummy_profile.svg') }}" class="mr-2 profile_img_chat">
	<small class="text-secondary">Donnatello</small>

</div>
</div>


<div class="chat_dropdown row offline ml-2 justify-content-between pr-4" data-toggle="collapse" href="#chatDonnatello" role="button"
aria-expanded="false" aria-controls="chatWindow">
<div class="col">
	<img src="{{ asset('images/system/dummy_profile.svg') }}" class="mr-2 profile_img_chat">
	<small class="text-secondary">Donnatello</small>

</div>
</div>


<div class="chat_dropdown row offline ml-2 justify-content-between pr-4" data-toggle="collapse" href="#chatDonnatello" role="button"
aria-expanded="false" aria-controls="chatWindow">
<div class="col">
	<img src="{{ asset('images/system/dummy_profile.svg') }}" class="mr-2 profile_img_chat">
	<small class="text-secondary">Donnatello</small>

</div>
</div>


<div class="chat_dropdown row offline ml-2 justify-content-between pr-4" data-toggle="collapse" href="#chatDonnatello" role="button"
aria-expanded="false" aria-controls="chatWindow">
<div class="col">
	<img src="{{ asset('images/system/dummy_profile.svg') }}" class="mr-2 profile_img_chat">
	<small class="text-secondary">Donnatello</small>

</div>
</div>


<div class="chat_dropdown row offline ml-2 justify-content-between pr-4" data-toggle="collapse" href="#chatDonnatello" role="button"
aria-expanded="false" aria-controls="chatWindow">
<div class="col">
	<img src="{{ asset('images/system/dummy_profile.svg') }}" class="mr-2 profile_img_chat">
	<small class="text-secondary">Cristiano Ronaldo</small>

</div>
</div>


</div>

</div>

</body>

</html>