@extends('layouts.app')
@section('content')

<link href="{{ asset('css/about.css') }}" rel="stylesheet">
<link href="{{ asset('css/header.css') }}" rel="stylesheet">

<div class="container main_content">
	<section class="py-3">
		<div class="jumbotron">
			<div class="row">
				<div class="col-12 text-secondary">
					<h2 class=" text-secondary">About Musicbox</h2>
				</div>
			</div>
			<h5 class=" text-secondary">Musicbox is a social network designed for musicians, where they can share their content and keep track of what is happening in the music world.</h5>
		</div>
	</section>

	<section class="pb-3">
		<h1 class="mt-3 text-secondary">Our Team</h1>
		<hr>
		<div class="row text-center py-3 justify-content-center">
			<div class="col-12 col-md-3 d-flex justify-content-center mt-2">
				<div class="card text-center p-2">
					<img class="card-img-top border rounded" src="https://scontent.flis7-1.fna.fbcdn.net/v/t1.0-9/10801679_739706209412016_9088497699719155212_n.jpg?oh=d1c2973856091cfbece0da266c887660&oe=5B453EB9" alt="Card image">
					<div class="card-body">
						<h4 class="card-title">Danny Soares</h4>
					</div>
				</div>
			</div>

			<div class="col-12 col-md-3 d-flex justify-content-center mt-2">
				<div class="card text-center p-2">
					<img class="card-img-top border rounded" src="https://scontent.flis7-1.fna.fbcdn.net/v/t1.0-9/10514583_817103501641193_4194298598428747641_n.jpg?oh=30e7960c7d0fdc61376dd4153c8ba0fa&oe=5B37B068" alt="Card image">
					<div class="card-body">
						<h4 class="card-title">João Furriel</h4>
					</div>
				</div>
			</div>
			<div class="col-12 col-md-3 d-flex justify-content-center mt-2">
				<div class="card text-center p-2">
					<img class="card-img-top border rounded" src="https://scontent.flis7-1.fna.fbcdn.net/v/t1.0-9/12802752_1222285871132467_1164102876889737192_n.jpg?_nc_cat=0&oh=b6c2e6bb21ca4913dbddf4e774a378ce&oe=5B8F655A" alt="Card image">
					<div class="card-body">
						<h4 class="card-title">João Conde</h4>
					</div>
				</div>
			</div>

			<div class="col-12 col-md-3 d-flex justify-content-center mt-2">
				<div class="card text-center p-2">
					<img class="card-img-top border rounded" src="https://scontent.flis7-1.fna.fbcdn.net/v/t31.0-8/328119_421006244641460_2055447235_o.jpg?oh=5d9f90854cec611bb5206d3fac14d445&oe=5B360644" alt="Card image">
					<div class="card-body">
						<h4 class="card-title">Leo Teixeira</h4>
					</div>
				</div>
			</div>
		</div>
	</section>
	<hr>
</div>

@endsection