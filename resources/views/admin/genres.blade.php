@extends('layouts.app')

@section('content')

<script defer src="{{ asset('js/skills_genres.js') }}"></script>

<div class="container  main_nav">

	@include('admin.navbar', ['active' => 'genres'])


	<div class="row">
		<div class="container col-10 col-sm-5 text-center">
			<ul class="list-group" id="genres_list">
				<li class="list-group-item"><h4 class="font-weight-bold">Genres</h4></li>
				@each('partials.genre', $genres, 'genre')		
				<li class="list-group-item">
					<form class="new_genre">
						<div class="form-group">
							<input type="text" class="border border-top-0 border-left-0 border-right-0 border-primary text-center" id="new_genre" placeholder="Add new genre" name="genre">
						</div>	    	
						<button id="add_genre_button" type="submit" class="btn btn-primary m-3">Add Genre</button>
					</form>
				</li>
			</ul>
		</div>
	</div>
</div>

@endsection