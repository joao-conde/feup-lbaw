@extends('layouts.app')
@section('content')

<script defer src="{{ asset('js/admin.js') }}"></script>

<div class="container  main_nav">

	@include('admin.navbar', ['active' => 'banned_users'])

	<table class="table">
		<thead>
			<tr class="row table-light text-center">
				<th class="col-2">Username</th>
				<th class="col-2">Name</th>
				<th class="col-3">Ban Reason</th>
				<th class="col-2">Ban Date</th>
				<th class="col-2">Cease Date</th>
				<th class="col-1">Lift Ban</th>
			</tr>
		</thead>
		<tbody>
			@each('partials.banned_user', $bans, 'ban')
		</tbody>
	</table>
</div>
@endsection