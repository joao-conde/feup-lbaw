

@extends('layouts.logged_user') 

	@section('leftmenumobile')
	<link href="{{ asset('css/feed.css') }}" rel="stylesheet">
	<script defer src="{{ asset('js/toggleChat.js')}}"></script>
	<script defer src="{{ asset('js/search.js')}}"></script>

	@include('partials.leftmenumobile')

@endsection 

@section('logged_content') 

@include('partials.leftfeedmenu')


<div id="search_results" class="col-12 col-md-6 p-0 mt-2 toggleContent">


	<div class="jumbotron p-3 mb-2 justify-content-center d-flex">

		<ul class="list-group col-12">
			<h3 class="text-primary text-center">Results for "{{$text}}"</h3>

			<div class="btn-group row justify-content-center my-2">
				<button id="btn_result_users" type="button" class="active btn btn-primary col-auto">Users</button>
				<button id="btn_result_bands" type="button" class="btn btn-primary col-auto">Bands</button>
			</div>
			
			@if(count($searchResultUsers) > 0)
				<div id="list_users_result">
					@foreach($searchResultUsers as $resultUsers)
	
						@include('pages.search.partials.user', ['result' => $resultUsers])
	
					@endforeach
				</div>

			@else
				<h4 class="text-secondary text-center mt-3">No results found!</h4>
			@endif

			@if(count($searchResultBands) > 0)
				<div id="list_bands_result" class="d-none">
				@foreach($searchResultBands as $resultBands)

					@include('pages.search.partials.band', ['result' => $resultBands])

				@endforeach
				</div>
			@else
				<h4 class="text-secondary text-center mt-3">No results found!</h4>
			@endif
			


		</ul>
	</div>

</div>


@endsection