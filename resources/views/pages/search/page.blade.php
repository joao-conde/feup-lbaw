

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

			<div id="results_pagination" class="btn-group row justify-content-center my-2">
				<button id="btn_result_users" type="button" class="active btn btn-primary col-auto">Users</button>
				<button id="btn_result_bands" type="button" class="btn btn-primary col-auto">Bands</button>
				<button id="btn_result_bands_by_genre" type="button" class="btn btn-primary col-auto">Genres <small>(bands)</small></button>
				<button id="btn_result_users_by_skill" type="button" class="btn btn-primary col-auto">Skills <small>(users)</small></button>
			</div>
			
			<div id="div_results">
				<div id="list_users_result">
					@if(count($searchResultUsers) > 0)
						@foreach($searchResultUsers as $resultUsers)
		
							@include('pages.search.partials.user', ['result' => $resultUsers])
		
						@endforeach
					@else
						<h4 class="text-secondary text-center mt-3">No results found!</h4>
					@endif
				</div>
	
	
				<div id="list_bands_result" class="d-none">
					@if(count($searchResultBands) > 0)
					@foreach($searchResultBands as $resultBands)
	
						@include('pages.search.partials.band', ['result' => $resultBands])
	
					@endforeach
					@else
						<h4 class="text-secondary text-center mt-3">No results found!</h4>
					@endif
				</div>
	
				<div id="list_bands_by_genre_result" class="d-none">
					@if(count($searchResultBandsByGenre) > 0)
						@foreach($searchResultBandsByGenre as $resultBandsByGenre)
		
							@include('pages.search.partials.band', ['result' => $resultBandsByGenre])
		
						@endforeach
					@else
						<h4 class="text-secondary text-center mt-3">No results found!</h4>
					@endif
				</div>

				<div id="list_bands_by_genre_result" class="d-none">
					@if(count($searchResultUsersBySkill) > 0)
						@foreach($searchResultUsersBySkill as $resultUsersBySkill)
		
							@include('pages.search.partials.user', ['result' => $resultUsersBySkill])
		
						@endforeach
					@else
						<h4 class="text-secondary text-center mt-3">No results found!</h4>
					@endif
				</div>
			</div>
			
			


		</ul>
	</div>

</div>


@endsection