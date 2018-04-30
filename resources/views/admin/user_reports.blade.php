@extends('layouts.app')
@section('content')

<div class="container  main_nav">

		@include('admin.navbar', ['active' => 'user_reports'])


	<table class="table">
		<thead>
			<tr class="row table-light text-center">
				<th class="col-2">Username</th>
				<th class="col-4">Report</th>
				<th class="col-2">Date</th>
				<th class="col-1">Warnings</th>
				<th class="col-1">Reports</th>
				<th class="col-2">Action</th>
			</tr>
		</thead>
		<tbody>
			<tr class="row table-light text-center" style="border-width: 3px !important;">
				<td class="col-2">John Doe</td>
				<td class="col-4">Link to reported content</td>
				<td class="col-2">27/02/2018</td>
				<td class="col-1">0</td>
				<td class="col-1">1</td>
				<td class="col-2"><i class="fas fa-times text-danger"></i><i class="fas fa-exclamation-triangle text-warning ml-1"></i><i class="fas fa-ban text-danger ml-1"></i></td>
			</tr>
			<tr class="row table-light text-center" style="border-width: 3px !important;">
				<td class="col-2">Jane Doe</td>
				<td class="col-4">Link to reported content</td>
				<td class="col-2">2/02/2018</td>
				<td class="col-1">3</td>
				<td class="col-1">1</td>
				<td class="col-2"><i class="fas fa-times text-danger"></i><i class="fas fa-exclamation-triangle text-warning ml-1"></i><i class="fas fa-ban text-danger ml-1"></i></td>
			</tr>
			<tr class="row table-light text-center" style="border-width: 3px !important;">
				<td class="col-2">Tom Doe</td>
				<td class="col-4">Link to reported content</td>
				<td class="col-2">13/01/2018</td>
				<td class="col-1">5</td>
				<td class="col-1">2</td>
				<td class="col-2"><i class="fas fa-times text-danger"></i><i class="fas fa-exclamation-triangle text-warning ml-1"></i><i class="fas fa-ban text-danger ml-1"></i></td>
			</tr>
			<tr class="row table-light text-center" style="border-width: 3px !important;">
				<td class="col-2">Barney Doe</td>
				<td class="col-4">Link to reported content</td>
				<td class="col-2">25/01/2018</td>
				<td class="col-1">0</td>
				<td class="col-1">1</td>
				<td class="col-2"><i class="fas fa-times text-danger"></i><i class="fas fa-exclamation-triangle text-warning ml-1"></i><i class="fas fa-ban text-danger ml-1"></i></td>
			</tr>
			<tr class="row table-light text-center" style="border-width: 3px !important;">
				<td class="col-2">Doe Doe</td>
				<td class="col-4">Link to reported content</td>
				<td class="col-2">03/02/2018</td>
				<td class="col-1">1</td>
				<td class="col-1">3</td>
				<td class="col-2"><i class="fas fa-times text-danger"></i><i class="fas fa-exclamation-triangle text-warning ml-1"></i><i class="fas fa-ban text-danger ml-1"></i></td>
			</tr>
			<tr class="row table-light text-center" style="border-width: 3px !important;">
				<td class="col-2">Moses Doe</td>
				<td class="col-4">Link to reported content</td>
				<td class="col-2">13/01/2018</td>
				<td class="col-1">0</td>
				<td class="col-1">1</td>
				<td class="col-2"><i class="fas fa-times text-danger"></i><i class="fas fa-exclamation-triangle text-warning ml-1"></i><i class="fas fa-ban text-danger ml-1"></i></td>
			</tr>
			<tr class="row table-light text-center" style="border-width: 3px !important;">
				<td class="col-2">Another Doe</td>
				<td class="col-4">Link to reported content</td>
				<td class="col-2">25/12/2017</td>
				<td class="col-1">5</td>
				<td class="col-1">2</td>
				<td class="col-2"><i class="fas fa-times text-danger"></i><i class="fas fa-exclamation-triangle text-warning ml-1"></i><i class="fas fa-ban text-danger ml-1"></i></td>
			</tr>
			<tr class="row table-light text-center" style="border-width: 3px !important;">
				<td class="col-2">Lol Doe</td>
				<td class="col-4">Link to reported content</td>
				<td class="col-2">25/01/2018</td>
				<td class="col-1">0</td>
				<td class="col-1">4</td>
				<td class="col-2"><i class="fas fa-times text-danger"></i><i class="fas fa-exclamation-triangle text-warning ml-1"></i><i class="fas fa-ban text-danger ml-1"></i></td>
			</tr>
			<tr class="row table-light text-center" style="border-width: 3px !important;">
				<td class="col-2">João Doe</td>
				<td class="col-4">Link to reported content</td>
				<td class="col-2">25/01/2018</td>
				<td class="col-1">0</td>
				<td class="col-1">4</td>
				<td class="col-2"><i class="fas fa-times text-danger"></i><i class="fas fa-exclamation-triangle text-warning ml-1"></i><i class="fas fa-ban text-danger ml-1"></i></td>
			</tr>
			
		</tbody>
	</table>

	<nav aria-label="userspagination">
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

	<hr>
</div>
@endsection