<style>
	.clickable {
		cursor: pointer;
	}
</style>

<li class="list-group-item skills">
	<span class="d-none" id="skill_id">{{ $skill->id }}</span>
	<div class="row">
		<span class="col-3"></span>
		<span class="col-6">{{ $skill->name }}</span> 
		<div class="col-3 clickable">
			<i class="far fa-times-circle"></i>
		</div>
	</div>
</li>