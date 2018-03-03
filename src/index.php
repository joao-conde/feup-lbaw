<?php  include_once('templates/header.php'); ?>

<style>
#myVideo {
	position: fixed;
	left: 0;
	bottom: -100px;
	min-width: 100%;
	min-height: 100%;
	z-index: -2;
}

.jumbotron {
	position: fixed;
	right: 0;
	bottom: 0;
	min-width: 100%;
	min-height: 100%;
	z-index: -1;
	background-color: black;
	opacity: 0.4;
	padding: 0;
	margin: 0;
}
</style>

<div class="container text-center m-0 mt-1">
	<div class="jumbotron"></div>
	
	<video autoplay muted loop id="myVideo">
		<source src="images/668357526.mp4" type="video/mp4">
			Your browser does not support HTML5 video.
		</video>
	</div>

</body>
</html>