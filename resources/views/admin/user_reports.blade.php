@extends('layouts.app')
@section('content')

<script defer src="{{ asset('js/admin.js') }}"></script>

<div class="container  main_nav">

	@include('admin.navbar', ['active' => ''])

	<h4>User: {{ $user_name }}</h4>
	<table class="table">
		<thead>
			<tr class="row table-light text-center">
				<th class="col-2">Date</th>
				<th class="col-2">Reason</th>
				<th class="col-6">Content</th>
				<th class="col-2">Action</th>
			</tr>
		</thead>
		<tbody>
			@each('partials.user_report', $reports, 'report')
		</tbody>
	</table>

	<hr>
</div>
@endsection