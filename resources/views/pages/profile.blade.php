@extends('layouts.profile_layout') 
@section('leftmenumobile')

<link rel="stylesheet" href="{{ asset('css/profile.css')}}">
<link rel="stylesheet" href="{{ asset('css/feed.css')}}">
<script defer src="{{ asset('js/toggleChat.js')}}"></script>
<script defer src="{{ asset('js/editProfile.js')}}"></script>
<script defer src="{{ asset('js/post.js')}}"></script>

@include('partials.leftmenumobile')
@endsection

@section('logged_content')

<p id="posts_page_type" class="d-none">profile</p>

<div class="toggleContent">
		
		<div class="no-gutters">
		
			<div id="profile_area" class="col-12 col-md-9">
				<div class="jumbotron p-4 mb-1">
						
					<div id="username" class="row px-3 justify-content-center">
						<div class="col-auto align-self-center">
							<img src="{{asset('images/system/musician-icon.svg')}}" class="profile_type">
						</div>
		
						<div class="col-10 align-self-center">
							<div id="userId" class="d-none">{{ $user->id }}</div>
							<h3 id="h3userName" class="d-inline-block align-middle mr-2">{{$user->name}}</h3>
							@if( $user->id == Auth::user()->id)
							<span id="edit_name_button" class="edit_field d-none">
								<i class="fas fa-pencil-alt"></i>
							</span>
							<span class="edit_field d-none text-secondary" id="edit_name_aid">
								<small>Edit Name</small>
							</span>
							<span id="confirm_edit_name_button" class="d-none">
								<i class="fas fa-check text-success"></i>
							</span>
							<span id="cancel_edit_name_button" class="d-none">
								<i class="fas fa-times text-danger"></i>
							</span>
							@endif
						</div>
						
						@if( $user->id == Auth::user()->id)
						<div class="col-auto align-self-center">
							<span id="lock_locked" class="clickable" data-toggle="modal" data-target="#modalPassword">
								<i class="fas fa-lock text-danger"></i>
							</span>
							<span id="lock_opened" class="d-none clickable">
								<i class="fas fa-lock-open text-primary"></i>
							</span>
						</div>
						<!-- Modal -->
						<div class="modal fade" id="modalPassword"  role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
							<div class="modal-dialog modal-dialog-centered" role="document">
								<div class="modal-content" id="modal-content">
									<div class="modal-header" id="modal_header">
										<h5 class="modal-title" id="modalLongTitle">Please Enter Password</h5>
										<button type="button" id="close_button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="d-none pt-2" id="modal-msg">
										<p class="text-danger pl-3">Wrong Password, please try again.</p>
									</div>
									<div class="d-none pt-2" id="modal-msg-empty">
										<p class="text-danger pl-3">Password can't be empty.</p>
									</div>
									<div class="modal-body">
										<label for="verify_password">Password</label>
										<input type="password" id="verify_password" autofocus>
									</div>
									<div class="modal-footer">
										<button id="submit_password" type="button" class="btn btn-primary">Submit</button>
									</div>
								</div>
							</div>
						</div>
						@endif
						
						<a id="helpLock" class="align-self-center" data-placement="bottom" href="#" data-toggle="tooltip" title="Unlock to edit, lock to avoid mistakes!">
							<i class="far fa-question-circle"></i>
						</a>

					</div>
		
					<div id="profile_pic_div" class="row">
		
						<div class="col-auto">
		
							<img id="profile_pic" class="profile_image d-block my-3" src="{{$user->getProfilePicturePath()}}" alt="Profile Image"> 
							@if($user->id != Auth::user()->id) 
							@include('partials.followbutton', ['followType'=> 'user','isFollowing' => $isFollowing, 'userOrBandToFollowId'=> $user->id])
							<button id="reportButton" class="btn btn-primary">Report</button>
							@else
							<span id="edit_picture_button">
								<input id="inputPicture" name="picture" type="file" class="d-none">
								<button id="buttonPicture" class="btn btn-primary edit_field d-none">Change Picture</button>
							</span>
		
							@endif
		
						</div>
		
						<div class="col-12 col-lg-8 p-3 align-self-start text-justify">
		
							<div class="row p-2">
								<div class="col">
									<p id="bioParagraph" class="text-primary d-inline mr-2">{{$user->bio}}</p>
									@if( $user->id == Auth::user()->id)
									<span id="edit_bio_button" class="edit_field d-none">
										<i class="fas fa-pencil-alt"></i>
									</span>
									<span class="edit_field d-none text-secondary" id="edit_bio_aid">
										<small>Edit Bio</small>
									</span>
									<span id="confirm_edit_bio_button" class="d-none">
										<i class="fas fa-check text-success"></i>
									</span>
									<span id="cancel_edit_bio_button" class="d-none">
										<i class="fas fa-times text-danger"></i>
									</span>
									@endif
								</div>
							</div>
		
							<hr class="mt-0">
		
							<div id="rating" class="row">
								<div class="col-12 mb-3">
									<div id="skills_list">

										@foreach($skills as $skill)

											@if($skill->user_skill)
												@include('partials.user_skill')
											@endif

										@endforeach
		
									</div>
								</div>
							</div>

							@if( $user->id == Auth::user()->id)

								<div class="row justify-content-start m-2 d-none edit_field d-none">

									<div class="btn-group">
										<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											Add New Skill
										</button>
										<div id="new_skill_dd" class="dropdown-menu dropdown-menu-left col-12 p-3 bg-secondary">
											@foreach($skills as $skill)

												@if(!$skill->user_skill)
													@include('partials.new_skill')
												@endif

											@endforeach
											
										</div>
									</div>

								</div>
							
							@endif
		
							<div id="bios" class="row p-0 mt-3 justify-content-center">
								<ul>
									<li>
										
										<i id="user_location">
											@if($location != '')
											{{$location}}, {{$country}}
											@endif
											
										</i>
										@if( $user->id == Auth::user()->id)
										
											@if($location != '')
												<span id="delete_location_button" class="d-none edit_field clickable">
													<i class="fas fa-times text-danger"></i>
												</span>
											@endif

										

										
										<div class="btn-group edit_field d-none">
											<button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												Edit Location
											</button>
											<div id="edit_location_dd" class="dropdown-menu dropdown-menu-left col-12 p-3 bg-secondary">
												@foreach($cities as $city)

													@include('partials.location')

												@endforeach
												
											</div>
										</div>
										
										@endif
	
									</li>
									<li id="date_parent">

											<small id="date_field">
												@if(Auth::user()->dateofbirth)
												Born on
												<i>{{ $dateOfBirthString }}</i>
												@else
												<i>Unknown date of birth</i>
												@endif
											</small>
										
										@if( $user->id == Auth::user()->id)
											<input type="date" class="d-none" id="date_input" value="{{Auth::user()->dateofbirth}}">
											<span id="edit_date_button" class="edit_field d-none clickable">
												<i class="fas fa-pencil-alt"></i>
											</span>
											<span class="edit_field d-none text-secondary" id="edit_date_aid">
												<small>Edit Birthdate</small>
											</span>
											<span id="confirm_edit_date_button" class="d-none clickable">
												<i class="fas fa-check text-success"></i>
											</span>
											<span id="cancel_edit_date_button" class="d-none clickable">
												<i class="fas fa-times text-danger"></i>
											</span>
										@endif
										</small>
									</li>
								</ul>
							</div>
		
		
		
						</div>
		
					</div>
		
					<div id="navprofile" class="row justify-content-center border-top">
		
						<nav class="navbar navbar-expand navbar-light bg-light">
		
							<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
								<div class="navbar-nav">
									<a class="nav-item col-4 nav-link btn btn-secondary text-white mr-2" href="{{ route('bands_membership') }}">Bands</a>
									<a class="nav-item col-4 nav-link btn btn-secondary text-white mr-2" href="{{ route('user_followings') }}">Following</a>
									<a class="nav-item col-4 nav-link btn btn-secondary text-white mr-2" href="{{ route('user_followers') }}">Followers</a>
								</div>
							</div>
						</nav>
		
					</div>
		
		
		
				</div>
		
			</div>
		
		</div>
		
		<div class="row no-gutters">
			<div class="col-3 d-none d-lg-block">
				
				<div class="jumbotron p-3 mr-2">
					<p class="inline">Bands 
						<a id="helpLock" class="align-self-center" data-placement="bottom" href="#" data-toggle="tooltip" title="Checkout all your bands or create new ones!">
							<i class="far fa-question-circle"></i>
						</a>
					</p>
					@foreach($user->bands() as $band)
					<a class="d-block" href="{{route('band_profile', [$band->id])}}">
						<img class="profile_img_feed" src="{{ Band::getBandIconPicturePath($band->id) }}">
						<small class="d-none">{{$band->id}}</small>
						<small class="text-primary">{{$band->name}}</small>
					</a>
					@endforeach
					
					<div class="d-flex flex-row m-0">
		
						<a class="mr-1 d-block mr-2" href="#">
							<small>
								<a class="text-secondary mt-2 mb-0" href="{{route('bands_membership')}}">See all</a>
							</small>
		
						</a>
						<a class="mr-1 d-block" href="{{route('create_band')}}">
							<small>
								<a class="text-secondary mt-2 mb-0" href="{{ route('create_band') }}">Create Band</a>
							</small>
						</a>
		
					</div>
		
				</div>
		
			</div>
		
			<div class="col-12 col-md-9 col-lg-6">
		
				<div id="postsList">

					@if(Auth::user()->id == $user->id)
		
					{{$bandNewPost = false}}
					@include('partials.new_post',[$bandNewPost])
		
					@endif

					<div class="row p-2 m-0 bg-primary d-block d-md-none">
						<h6 class="col-auto m-0 text-success">My activity</h6>
					</div>

					<div id="posts">
						
						@foreach($user->posts(0) as $post)
							@include('partials.post')
						@endforeach
		
					</div>
		
				</div>
			</div>
		</div>
</div>


@endsection