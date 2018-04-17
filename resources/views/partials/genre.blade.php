<style>
	.clickable {
		cursor: pointer;
	}
</style>

<li class="list-group-item genres">
	<span class="d-none" id="genre_id">{{ $genre->id }}</span>
	<div class="row">
		<span class="col-3"></span>
		<span class="col-6">{{ $genre->name }}</span> 
		<div class="col-3 clickable">
			<i class="far fa-times-circle"></i>
		</div>
	</div>
</li>