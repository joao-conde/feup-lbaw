 @extends('layouts.logged_user') @section('leftmenumobile')
<link href="{{ asset('css/feed.css') }}" rel="stylesheet">
<script src="{{ asset('js/toggleChat.js') }}" defer></script>
<script src="{{ asset('js/post.js') }}" defer></script> @include('partials.leftmenumobile') @endsection @section('logged_content') @include('partials.leftfeedmenu')


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

	
</div>

@endsection