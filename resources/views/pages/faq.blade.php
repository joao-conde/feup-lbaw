@extends('layouts.app')
@section('content')

<link href="{{ asset('css/about.css') }}" rel="stylesheet">
<link href="{{ asset('css/header.css') }}" rel="stylesheet">
<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<div class="container main_nav">

	<h1 class="mt-3 text-primary">FAQ</h1><br><br>

	<section class="pb-3">
		<div id="accordion">
			<div class="card mb-1 bg-primary border-0">

				<button class="btn btn-link text-secondary text-left font-weight-bold" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
					<div class="card-header" id="headingOne">
						<h5 class="mb-0">How do I create an account?</h5>
					</div>
				</button>

				<div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
					<div class="card-body bg-white">
						Head to the 
						<a href="/">login</a>
						 page and click "Here" on "Do not have account? Register Here!". Or just click 
						<a href="/register">here</a>
						  to jump to the register page.
					</div>
				</div>
			</div>
			<br>
			<div class="card mb-1 bg-primary border-0">
				<button class="btn btn-link text-secondary text-left font-weight-bold" data-toggle="collapse" data-target="#collapse2" aria-expanded="false" aria-controls="collapseOne">
					<div class="card-header" id="headingOne">
						<h5 class="mb-0">What type of content can I post on the website?</h5>
					</div>
				</button>

				<div id="collapse2" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
					<div class="card-body bg-white">
						The website is mainly designed for musicians, so the content must be music related. Other type of content may be reported and removed.
					</div>
				</div>
			</div>
			<br>
			<div class="card mb-1 bg-primary border-0">
				<button class="btn btn-link text-secondary text-left font-weight-bold" data-toggle="collapse" data-target="#collapse3" aria-expanded="false" aria-controls="collapseOne">
					<div class="card-header" id="headingOne">
						<h5 class="mb-0">How can I find a person or a band that I like?</h5>
					</div>
				</button>

				<div id="collapse3" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
					<div class="card-body bg-white">
						On the top of the website there is a search bar, where you can write names to find persons and bands.
					</div>
				</div>
			</div>
			<br>
			<div class="card mb-1 bg-primary border-0">
				<button class="btn btn-link text-secondary text-left font-weight-bold" data-toggle="collapse" data-target="#collapse4" aria-expanded="false" aria-controls="collapseOne">
					<div class="card-header" id="headingOne">
						<h5 class="mb-0">How do I schedule a concert for my band?</h5>
					</div>
				</button>

				<div id="collapse4" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
					<div class="card-body bg-white">
						On the band's page there is a button to schedule concerts, with a small form to fill with the place and date of the concert.
					</div>
				</div>
			</div>
			<br>
			<div class="card mb-1 bg-primary border-0">
				<button class="btn btn-link text-secondary text-left font-weight-bold" data-toggle="collapse" data-target="#collapse5" aria-expanded="false" aria-controls="collapseOne">
					<div class="card-header" id="headingOne">
						<h5 class="mb-0">What happens when some content is reported?</h5>
					</div>
				</button>

				<div id="collapse5" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
					<div class="card-body bg-white">
						We analyse the content to understand if the report was deserved and if it was, the content is removed from the website and the user gets warned or banned, depending on the frequency he gets warned.
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
@endsection