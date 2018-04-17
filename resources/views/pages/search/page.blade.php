

@extends('layouts.logged_user') 

	@section('leftmenumobile')
	<link href="{{ asset('css/feed.css') }}" rel="stylesheet">
	<link href="{{ asset('js/feed.js') }}" rel="stylesheet"> 

	@include('partials.leftmenumobile')

@endsection 

@section('logged_content') 

@include('partials.leftfeedmenu')


<div id="search_results" class="col-12 col-md-6 p-0 mt-2">


	<div class="jumbotron p-3 mb-2 justify-content-center d-flex">

		<ul class="list-group col-12">
			<h3 class="text-primary text-center">Results for "{{$text}}"</h3>

			@if(count($searchResult) > 0)
				<h4 class="pl-3 text-primary">Users</h4>

				@foreach($searchResult as $result)

					@include('pages.search.partials.user', ['result' => $result])

				@endforeach
			@else

				<h4 class="text-secondary text-center mt-3">No results found!</h4>
			@endif


		</ul>
	</div>

</div>


@endsection