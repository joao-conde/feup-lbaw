 @extends('layouts.logged_user') @section('leftmenumobile')
<link href="{{ asset('css/feed.css') }}" rel="stylesheet">
<script src="{{ asset('js/toggleChat.js') }}" defer></script>
<script src="{{ asset('js/newPost.js') }}" defer></script> @include('partials.leftmenumobile') @endsection @section('logged_content') @include('partials.leftfeedmenu')


<div id="posts" class="col-12 col-md-6 p-0 mt-2 toggleContent">

	<div class="jumbotron p-3 post mb-2" id="newpost">
		<div class="row">
			<img src="{{ asset('images/system/dummy_profile.svg') }}" class="col-1 col-sm-2 mt-1 mr-2 mr-md-0 profile_img_chat p-0 border-0">
			<textarea name="text" placeholder="New post..." class="col-6 col-sm-7 col-md-5 col-lg-6 mt-1 text-primary form-control-sm border border-secondary mr-0"
			 rows="1" id="new_post_ta" style="height: 30px;"></textarea>
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


	@if(count($posts) > 0)
		@foreach($posts as $post) @include('partials.post', ['post' => $post]) 
		@endforeach 

	@else
		<h4 class="text-secondary text-center mt-3">No posts!</h4>
	@endif

	<!--
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
			<textarea placeholder="New comment..." class="col text-primary form-control-sm border mr-2 border-secondary" rows="1" id="new_comment_ta"></textarea>
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

				<small>Phasellus blandit lectus lectus, at sagittis orci tincidunt vitae. Vivamus id quam quis lacus venenatis hendrerit
					quis sed quam. Praesent sodales elit ac elit convallis pulvinar. Fusce bibendum, dui ac dapibus venenatis, lacus
					augue vehicula ligula, vel venenatis turpis risus sed lectus. Quisque nunc purus, pellentesque vel odio vitae, facilisis
					hendrerit arcu. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.
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

				<small>Phasellus blandit lectus lectus, at sagittis orci tincidunt vitae. Vivamus id quam quis lacus venenatis hendrerit
					quis sed quam. Praesent sodales elit ac elit convallis pulvinar. Fusce bibendum, dui ac dapibus venenatis, lacus
					augue vehicula ligula, vel venenatis turpis risus sed lectus. Quisque nunc purus, pellentesque vel odio vitae, facilisis
					hendrerit arcu. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.
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

				<small>Phasellus blandit lectus lectus, at sagittis orci tincidunt vitae. Vivamus id quam quis lacus venenatis hendrerit
					quis sed quam. Praesent sodales elit ac elit convallis pulvinar. Fusce bibendum, dui ac dapibus venenatis, lacus
					augue vehicula ligula, vel venenatis turpis risus sed lectus. Quisque nunc purus, pellentesque vel odio vitae, facilisis
					hendrerit arcu. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.
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

				<small>Phasellus blandit lectus lectus, at sagittis orci tincidunt vitae. Vivamus id quam quis lacus venenatis hendrerit
					quis sed quam. Praesent sodales elit ac elit convallis pulvinar. Fusce bibendum, dui ac dapibus venenatis, lacus
					augue vehicula ligula, vel venenatis turpis risus sed lectus. Quisque nunc purus, pellentesque vel odio vitae, facilisis
					hendrerit arcu. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.
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
	-->
</div>

@endsection