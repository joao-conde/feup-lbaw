<style>
	i {
		cursor: pointer;
	}
</style>

<li class="list-group-item skills">
	<span class="d-none" id="skill_id">{{ $skill->id }}</span>
	<div class="row">
		<span class="col-3"></span>
		<span class="col-6">{{ $skill->name }}</span> 
		<div class="col-3 clickable">
			<i class="far fa-trash-alt align-self-center"></i>
		</div>
	</div>
</li>