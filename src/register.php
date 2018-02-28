<!DOCTYPE html>

<?php include_once('templates/header.php') ?>

<link rel="stylesheet" type="text/css" href="styles/forms.css"> 

<div id="register" class="container-fluid">
    <div class="row justify-content-center mt-5">
        <div class="col-sm-4">
            <div class="jumbotron text-center">
                <h2>Register</h2>
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
                        <label for="name">Name</label><br>
                        <input type="text" class="border border-top-0 border-left-0 border-right-0 border-primary" id="name" placeholder="Enter name" name="name">
                    </div>

                    <div class="form-group">
                        <label for="surname">Surname</label><br>
                        <input type="text" class="border border-top-0 border-left-0 border-right-0 border-primary" id="surname" placeholder="Enter surname" name="surname">
                    </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>  
    </div>
</div>
</div>
</body>

</html>
