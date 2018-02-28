<!DOCTYPE html>

<html lang="en-US"> 
    
    <head>
        <title>Nome</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootswatch/4.0.0-beta.3/flatly/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="styles/register.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
    </head>

    <body>

            <div id="register" class="container">
			<div class="jumbotron">
                <h3>Register</h3>
                <form action="#">
                    <div class="form-group">
                        <label for="username">Username</label><br>
                        <input type="text" class="border border-top-0 border-left-0 border-right-0 border-primary" id="username" placeholder="Enter username" name="username">
                    </div>

                    <div class="form-group">
                        <label for="pwd">Password</label><br>
                        <input type="password" class="border border-top-0 border-left-0 border-right-0 border-primary" id="pwd" placeholder="Enter password" name="pwd">
                    </div>
                    
                    <div class="form-group">
                            <label for="name">Full name</label><br>
                            <input type="text" class="border border-top-0 border-left-0 border-right-0 border-primary" id="name" placeholder="Enter full name" name="name">
                    </div>
                    
                    <div class="form-group">
                            <label for="date">Birthdate</label><br>
                            <input type="date" class="border border-top-0 border-left-0 border-right-0 border-primary" id="date">
                    </div> 
					
					<div class="form-group">
                            <label for="date">City</label><br>
                            <input type="text" class="border border-top-0 border-left-0 border-right-0 border-primary" id="city">
                    </div> 
					
					<div class="form-group">
                            <label for="date">Country</label><br>
                            <input type="text" class="border border-top-0 border-left-0 border-right-0 border-primary" id="country">
                    </div>
					
					<div class="form-group">
                            <label for="date">Academic titles</label><br>
                            <input type="text" class="border border-top-0 border-left-0 border-right-0 border-primary" id="academic">
                    </div> 
					

                    <div class="container">
        
                        <div class="col-sm-6">
                            <label><input type="checkbox" value="rock">Rock</label>
                        </div>

                        <div class="col-sm-6">
                            <label><input type="checkbox" value="metal">Metal</label>
                        </div>

                        <div class="col-sm-6">
                            <label><input type="checkbox" value="pop">Pop</label>
                        </div>

                        <div class="col-sm-6">
                            <label><input type="checkbox" value="jazz">Jazz</label>
                        </div>

                        <div class="col-sm-6">
                           <label><input type="checkbox" value="blues">Blues</label>
                        </div>

                        <div class="col-sm-6">
                            <label><input type="checkbox" value="country">Country</label>
                        </div>
                    
                    </div>

                    <div class="form-group">
                            <label for="comment">Bio</label>
                            <textarea placeholder="Describe yourself in a few words" class="form-control" rows="6" id="bio"></textarea>
                    </div>
          
                <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                    
            </div>
			</div>

    </body>

</html>
