@extends('admin.admin_app')
@section('content')

<div class="container main_nav">

	<nav class="navbar navbar-expand bg-primary navbar-light p-0 mt-3">
		<ul class="navbar-nav mx-auto">
			<li class="nav-item">
				<a class="nav-link text-success" href="/users">Users</a>
			</li>
			<li class="nav-item">
				<a class="nav-link text-success" href="/reported_users">User reports</a>
			</li>
			<li class="nav-item active">
				<a class="nav-link text-success" href="/reported_bands">Band reports</a>
			</li>
			<li class="nav-item">
				<a class="nav-link text-success" href="/genres">Genres</a>
			</li>
			<li class="nav-item">
				<a class="nav-link text-success" href="/skills">Skills</a>
			</li>
		</ul>
	</nav>

	<hr>

	<table class="table">
		<thead>
			<tr class="row table-light text-center">
				<th class="col-2">Band Name</th>
				<th class="col-4">Report</th>
				<th class="col-2">Date</th>
				<th class="col-1">Warnings</th>
				<th class="col-1">Reports</th>
				<th class="col-2">Action</th>
			</tr>
		</thead>
		<tbody>
			<tr class="row table-light text-center" style="border-width: 3px !important;">
				<td class="col-2">The Does</td>
				<td class="col-4">Link to reported content</td>
				<td class="col-2">23/02/2018</td>
				<td class="col-1">0</td>
				<td class="col-1">1</td>
				<td class="col-2"><i class="fas fa-times text-danger"></i><i class="fas fa-exclamation-triangle text-warning ml-1"></i><i class="fas fa-ban text-danger ml-1"></i></td>
			</tr>
			<tr class="row table-light text-center" style="border-width: 3px !important;">
				<td class="col-2">The Joes</td>
				<td class="col-4">Link to reported content</td>
				<td class="col-2">20/02/2018</td>
				<td class="col-1">3</td>
				<td class="col-1">1</td>
				<td class="col-2"><i class="fas fa-times text-danger"></i><i class="fas fa-exclamation-triangle text-warning ml-1"></i><i class="fas fa-ban text-danger ml-1"></i></td>
			</tr>
			<tr class="row table-light text-center" style="border-width: 3px !important;">
				<td class="col-2">The Toes</td>
				<td class="col-4">Link to reported content</td>
				<td class="col-2">3/02/2018</td>
				<td class="col-1">6</td>
				<td class="col-1">1</td>
				<td class="col-2"><i class="fas fa-times text-danger"></i><i class="fas fa-exclamation-triangle text-warning ml-1"></i><i class="fas fa-ban text-danger ml-1"></i></td>
			</tr>
			<tr class="row table-light text-center" style="border-width: 3px !important;">
				<td class="col-2">The Foes</td>
				<td class="col-4">Link to reported content</td>
				<td class="col-2">15/02/2018</td>
				<td class="col-1">0</td>
				<td class="col-1">1</td>
				<td class="col-2"><i class="fas fa-times text-danger"></i><i class="fas fa-exclamation-triangle text-warning ml-1"></i><i class="fas fa-ban text-danger ml-1"></i></td>
			</tr>
			<tr class="row table-light text-center" style="border-width: 3px !important;">
				<td class="col-2">The Yoes</td>
				<td class="col-4">Link to reported content</td>
				<td class="col-2">25/01/2017</td>
				<td class="col-1">0</td>
				<td class="col-1">2</td>
				<td class="col-2"><i class="fas fa-times text-danger"></i><i class="fas fa-exclamation-triangle text-warning ml-1"></i><i class="fas fa-ban text-danger ml-1"></i></td>
			</tr>
			<tr class="row table-light text-center" style="border-width: 3px !important;">
				<td class="col-2">The Roes</td>
				<td class="col-4">Link to reported content</td>
				<td class="col-2">13/01/2018</td>
				<td class="col-1">0</td>
				<td class="col-1">3</td>
				<td class="col-2"><i class="fas fa-times text-danger"></i><i class="fas fa-exclamation-triangle text-warning ml-1"></i><i class="fas fa-ban text-danger ml-1"></i></td>
			</tr>
			<tr class="row table-light text-center" style="border-width: 3px !important;">
				<td class="col-2">The Moes</td>
				<td class="col-4">Link to reported content</td>
				<td class="col-2">9/04/2018</td>
				<td class="col-1">6</td>
				<td class="col-1">6</td>
				<td class="col-2"><i class="fas fa-times text-danger"></i><i class="fas fa-exclamation-triangle text-warning ml-1"></i><i class="fas fa-ban text-danger ml-1"></i></td>
			</tr>
		</tbody>
	</table>

	<nav aria-label="bandspagination">
		<ul class="pagination justify-content-center">
			<li class="page-item disabled">
				<a class="page-link bg-primary" href="#" tabindex="-1">Previous</a>
			</li>
			<li class="page-item"><a class="page-link bg-primary" href="#">1</a></li>
			<li class="page-item"><a class="page-link bg-primary" href="#">2</a></li>
			<li class="page-item"><a class="page-link bg-primary" href="#">3</a></li>
			<li class="page-item">
				<a class="page-link bg-primary" href="#">Next</a>
			</li>
		</ul>
	</nav>

</div>
@endsection