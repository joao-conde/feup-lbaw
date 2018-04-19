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
			
			{{-- {{print_r(json_decode(file_get_contents( asset('json/faq.json') ), true), true)}} --}}

			@include('pages.faq.question', [
				'question' => 'How do I create an account?', 
				'answer' => 'Head to the <a href="/">login</a> page and click "Here" on "Do not have account? Register Here!". Or just click <a href="/register">here</a> to jump to the register page.',
				'id' => '1'
			])
			@include('pages.faq.question', [
				'question' => 'What type of content can I post on the website?', 
				'answer' => 'The website is mainly designed for musicians, so the content must be music related. Other type of content may be reported and removed.',
				'id' => '2'
			])
			@include('pages.faq.question', [
				'question' => 'How can I find a person or a band that I like?', 
				'answer' => 'On the top of the website there is a search bar, where you can write names to find persons and bands.',
				'id' => '3'
			])
			@include('pages.faq.question', [
				'question' => 'How do I schedule a concert for my band?', 
				'answer' => "On the band's page there is a button to schedule concerts, with a small form to fill with the place and date of the concert.",
				'id' => '4'
			])
			@include('pages.faq.question', [
				'question' => 'What happens when some content is reported?', 
				'answer' => 'We analyse the content to understand if the report was deserved and if it was, the content is removed from the website and the user gets warned or banned, depending on the frequency he gets warned.',
				'id' => '5'
			])
		</div>
	</section>
</div>
@endsection