@extends('layouts.app')
@section('content')

<script defer src="{{ asset('js/skills_genres.js') }}"></script>

<div class="container  main_nav">

		@include('admin.navbar', ['active' => 'skills'])


	<div class="row">
		<div class="container col-10 col-sm-5 text-center">
			<ul class="list-group" id="skills_list">
				<li class="list-group-item"><h4 class="font-weight-bold">Skills</h4></li>
				@each('partials.skill', $skills, 'skill')
				<li class="list-group-item">
					<form class="new_skill">
						<div class="form-group">
							<input type="text" class="border border-top-0 border-left-0 border-right-0 border-primary text-center" id="new_skill" placeholder="Add new skill" name="skill">
						</div>
						<button id="add_skill_button" type="submit" class="btn btn-primary m-3">Add Skill</button>
					</form>
				</li>
			</ul>
		</div>
	</div>
</div>
@endsection
