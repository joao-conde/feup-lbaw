<li class="list-group-item skills">
	<span class="d-none" id="skill_id">{{ $skill->id }}</span>
	<div class="row">
		<span class="col-3"></span>
		<span class="col-6 skill_name">{{ $skill->name }}</span> 
		<div class="col-1 clickable">
			<i class="far fa-times-circle"></i>
		</div>
		<div class="col-2">
			<span id="edit_button">
				<i class="fas fa-pencil-alt clickable"></i>
			</span>
			<span id="confirm_edit_button" class="d-none">
				<i class="fas fa-check text-success clickable"></i>
			</span>
			<span id="cancel_edit_button" class="d-none">
				<i class="fas fa-times text-danger clickable"></i>
			</span>	
		</div>
	</div>
</li>