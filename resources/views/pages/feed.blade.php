 @extends('layouts.logged_user') @section('leftmenumobile')
<link href="{{ asset('css/feed.css') }}" rel="stylesheet">
<script src="{{ asset('js/toggleChat.js') }}" defer></script>
<script src="{{ asset('js/post.js') }}" defer></script> 
@include('partials.leftmenumobile') @endsection @section('logged_content') @include('partials.leftfeedmenu')

<p id="posts_page_type" class="d-none">feed</p>
<div id="center_content" class="col-12 col-md-6 p-0 mt-2 toggleContent">

	@include('partials.new_post')

	<div id = "posts">
		@if(count($posts) > 0)
			@foreach($posts as $post) @include('partials.post', ['post' => $post]) 
			@endforeach 
		@else
			<h4 class="text-secondary text-center mt-3">No posts!</h4>
		@endif
	</div>

	
</div>

@endsection