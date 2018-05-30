@extends('layouts.app') @section('content')

<link href="{{ asset('css/about.css') }}" rel="stylesheet">
<link href="{{ asset('css/header.css') }}" rel="stylesheet">

<div class="container main_content">
	<section class="py-3">
		<div class="jumbotron">
			<div class="row">
				<div class="col-12 text-secondary">
					<h2 class="text-secondary">Terms of Service</h2>
				</div>
			</div>
			<h5 class=" text-secondary">The following terms apply to all the services provided by MusicBox</h5>
		</div>
	</section>

	<h1 class="mt-3 text-secondary">Our Services</h1>

	<div class="card text-center p-2">
		<div class="card-body">
			<h4 class="card-title">Connect musicians</h4>
			<span>
				We help connect thousands of musicians around the globe, enabling strong connections and facilitate the creation of world-wide
				famous bands.
			</span>
		</div>
	</div>

	<hr>

	<div class="card text-center p-2">
		<div class="card-body">
			<h4 class="card-title">Give tools to freely communicate</h4>
			<span>
				Express your opinions, share your favourite songs, chat with other talented artists, make real connections and share interests.
				All with our services.
			</span>
		</div>
	</div>

	<hr>

	<div class="card text-center p-2">
		<div class="card-body">
			<h4 class="card-title">Help you launch your career </h4>
			<span>
				Setup band meetings and concerts while announcing them all within our social network.
			</span>
		</div>
	</div>

	<hr>

	<h1 class="mt-3 text-secondary">Private data policy</h1>

	<div class="card text-center p-2">
		<div class="card-body">
			<h4 class="card-title">Your personal information is yours only</h4>

			<span>
				Unlike other inferior social networks we do not require your data and every personal information you wish to save will be
				kept hidden.
			</span>
		</div>
	</div>

	<hr>

	<h1 class="mt-3 text-secondary">Your Responsabilities</h1>

	<div class="card text-center p-2">
		<div class="card-body">
			<h4 class="card-title">Your share of the work to keep MusicBox alive</h4>

			<span>
				We live and operate as a community thus requiring every single one of our musicians to agree on a set of basic rules, keeping
				the overall environment of the network both safe and pleasant.
			</span>
		</div>
	</div>

	<hr>

	<div class="card text-center p-2">
		<div class="card-body">
			<h4 class="card-title">Offensive content</h4>

			<span>
				Offensive content will not be tolerated and will be quickly reported and later on his user banned.
			</span>
		</div>
	</div>

	<hr>

	<div class="card text-center p-2">
		<div class="card-body">
			<h4 class="card-title">Unrelated content</h4>

			<span>
				Keep in mind this social network is about MUSIC. We want to keep it as much as possible
				about that. When posting or sharing content, think if said content has interest to another musician.
				Even though you won't get DIRECTLY banned from this, you might get warned which in the future
				does lead to a more sever action.
			</span>
		</div>
	</div>

	<hr>
</div>

@endsection