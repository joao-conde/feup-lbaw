<?php include('templates/header.php'); ?>

<link rel="stylesheet" type="text/css" href="styles/forms.css">

<div class="container-fluid">
	<div class="row justify-content-center mt-5">
		<div class="col-sm-4">
		<div class="jumbotron text-center">
		  	<h2>Login</h2>
		  	<form action="/action_page.php">
		    	<div class="form-group">
		      		<label for="email">Username</label><br>
		   	  		<input type="text" class="border border-top-0 border-left-0 border-right-0 border-primary" id="usrnm" placeholder="Enter username" name="username">
		    	</div>
		    	<div class="form-group">
		      		<label for="pwd">Password</label><br>
		      		<input type="password" class="border border-top-0 border-left-0 border-right-0 border-primary" id="pwd" placeholder="Enter password" name="pswd">
		    	</div>
		    	<div class="form-check">
		      		<label class="form-check-label">
		        		<input class="form-check-input" type="checkbox" name="remember"> Remember me
		      		</label>
		    	</div>		    	
		    		<button type="submit" class="btn btn-primary m-3">Login</button>
			</form>
		</div>
	</div>
	</div>
</div>

</body>
</html>