<?php include('templates/header.php'); ?>

<link rel="stylesheet" type="text/css" href="styles/forms.css">

<div class="container-fluid">
	<div class="row justify-content-center mt-5">
		<div class="col-sm-4">
			<div class="jumbotron text-center bg-primary">
				<h2>Login</h2>
				<form action="/action_page.php">
					<div class="row justify-content-center">
						<div class="form-group mt-4 border border-top-0 border-left-0 border-right-0 border-secondary">
							<i class="fas fa-user mr-2" style="width: 1rem; height: 1rem; color: white;"></i>
						<input type="text" class="border border-top-0 border-bottom-0 border-left-0 border-right-0" id="usrnm" placeholder="Enter username" name="username">
						</div>
					</div>
					<div class="row justify-content-center">
						<div class="form-group mt-4 border border-top-0 border-left-0 border-right-0 border-secondary">
							<i class="fas fa-lock mr-2" style="width: 1rem; height: 1rem; color: white;"></i>
							<input type="password" class="border border-top-0 border-bottom-0 border-left-0 border-right-0" id="pwd" placeholder="Enter password" name="pswd">
						</div>
					</div>
					<div class="form-check mt-4">
						<label class="form-check-label">
							<input class="form-check-input" type="checkbox" name="remember"> Remember me
						</label>
					</div>		    	
					<button type="submit" class="btn btn-secondary m-4">Login</button>
				</form>
			</div>
		</div>
	</div>
</div>

</body>
</html>