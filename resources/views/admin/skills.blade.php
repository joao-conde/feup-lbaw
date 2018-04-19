@extends('admin.admin_app')
@section('title', 'Skills')
@section('content')

<script defer src="{{ asset('js/skills_genres.js') }}"></script>

<div class="container  main_nav">

	<nav class="navbar navbar-expand bg-primary navbar-light p-0 mt-3">
		<ul class="navbar-nav mx-auto">
			<li class="nav-item">
				<a class="nav-link text-success" href="/users">Users</a>
			</li>
			<li class="nav-item">
				<a class="nav-link text-success" href="/reported_users">User reports</a>
			</li>
			<li class="nav-item">
				<a class="nav-link text-success" href="/reported_bands">Band reports</a>
			</li>
			<li class="nav-item">
				<a class="nav-link text-success" href="/genres">Genres</a>
			</li>
			<li class="nav-item active">
				<a class="nav-link text-success" href="/skills">Skills</a>
			</li>
		</ul>
	</nav>

	<hr>

	<div class="row">
		<div class="container col-10 col-sm-5 text-center">
			<ul class="list-group" id="skills_list">
				<li class="list-group-item font-weight-bold"><h4>Active</h4></li>
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
