@extends('layouts.app')
@section('content')

<script defer src="{{ asset('js/admin.js') }}"></script>

<div class="container  main_nav">

	@include('admin.navbar', ['active' => 'users'])

	<table class="table">
		<thead>
			<tr class="row table-light text-center">
				<th class="col-3">Username</th>
				<th class="col-6">Name</th>
				<th class="col-3">Admin Privileges</th>
			</tr>
		</thead>
		<tbody>
			@each('partials.admin_user', $users, 'user')
		</tbody>
	</table>

	<nav aria-label="bandspagination">
		{{ $users->links() }}
	</nav>
</div>
@endsection