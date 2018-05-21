@extends('layouts.app')
@section('content')

<script defer src="{{ asset('js/admin.js') }}"></script>

<div class="container  main_nav">

	@include('admin.navbar', ['active' => 'reported_users'])

	<table class="table">
		<thead>
			<tr class="row table-light text-center">
				<th class="col-4">Name</th>
				<th class="col-4">Reports Links</th>
				<th class="col-2">Warnings</th>
				<th class="col-2">Reports</th>
			</tr>
		</thead>
		<tbody>
			@each('partials.reported_user', $reports, 'report')
		</tbody>
	</table>

	<nav aria-label="userspagination">
		<span class="d-none" id="current_page">{{ $current_page }}</span>
		<span class="d-none" id="last_page">{{ $last_page }}</span>
		<ul class="pagination justify-content-center">
			<li class="page-item disabled" id="previous_button">
				<a class="page-link bg-primary" href="?page={{ $current_page-1 }}" tabindex="-1">Previous</a>
			</li>
			<li class="page-item" id="next_button">
				<a class="page-link bg-primary" href="?page={{ $current_page+1 }}">Next</a>
			</li>
		</ul>
	</nav>

	<hr>
</div>
@endsection