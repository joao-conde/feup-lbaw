<!-- <?php include_once('templates/header.php') ?>

<link rel="stylesheet" type="text/css" href="styles/forms.css"> 

<div id="register" class="container-fluid">
        <video autoplay muted loop id="myVideo">
            <source src="images/668357526.mp4" type="video/mp4">
                Your browser does not support HTML5 video.
            </video>
        </div>
        <div class="row justify-content-center mt-5">
            <div class="col-sm-4">
                <div class="jumbotron text-center bg-primary">
                    <h2 class="">Register</h2>
                    <form action="#">
                        <div class="row justify-content-center">
                            <div class="form-group mt-4 border border-top-0 border-left-0 border-right-0 border-secondary">
                                <i class="fas fa-user mr-2" style="width: 1rem; height: 1rem; color: white;"></i>
                                <input type="text" class="border border-top-0 border-bottom-0 border-left-0 border-right-0 border-secondary" id="username" placeholder="Enter username" name="username">
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="form-group mt-4 border border-top-0 border-left-0 border-right-0 border-secondary">
                                <i class="fas fa-lock mr-2" style="width: 1rem; height: 1rem; color: white;"></i>
                                <input type="password" class="border border-top-0 border-left-0 border-bottom-0 border-right-0 border-secondary" id="pwd" placeholder="Enter password" name="pwd">
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="form-group mt-4 border border-top-0 border-left-0 border-right-0 border-secondary">
                                <i class="fas fa-lock mr-2" style="width: 1rem; height: 1rem; color: white;"></i>
                                <input type="password" class="border border-bottom-0 border-top-0 border-left-0 border-right-0 border-secondary" id="pwd" placeholder="Repeat password" name="pwd">
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="form-group mt-4 border border-top-0 border-left-0 border-right-0 border-secondary">
                                <i class="far fa-user mr-2" style="width: 1rem; height: 1rem; color: white;"></i>
                                <input type="text" class="border border-bottom-0 border-top-0 border-left-0 border-right-0 border-secondary" id="name" placeholder="Enter name" name="name">
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="form-group mt-4 border border-top-0 border-left-0 border-right-0 border-secondary">
                                <i class="fas fa-id-card mr-2" style="width: 1rem; height: 1rem; color: white;"></i>
                                <input type="text" class="border border-bottom-0 border-top-0 border-left-0 border-right-0 border-secondary" id="surname" placeholder="Enter surname" name="surname">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-secondary mt-3">Submit</button>
                    </form>
                </div>  
            </div>
        </div>
    </div>
</body>

</html>
 -->


 <?php  include_once('templates/header.php'); ?>

    <link rel="stylesheet" type="text/css" href="styles/register.css">    
    <body>
        <div id="register" class="container-fluid">
            <div class="row justify-content-center">
            <div class="col-sm-6">
            <div class="jumbotron jumbotron">
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
                            <label for="name">Full name</label><br>
                            <input type="text" class="border border-top-0 border-left-0 border-right-0 border-primary" id="name" placeholder="Enter full name" name="name">
                    </div>
                    
                    <div class="form-group">
                            <label for="date">Birthdate</label><br>
                            <input type="date" class="border border-top-0 border-left-0 border-right-0 border-primary" id="date">
                    </div> 
                    
                    <div class="form-group">
                            <label for="date">City</label><br>
                            <input type="text" class="border border-top-0 border-left-0 border-right-0 border-primary" placeholder="Enter your city" id="city">
                    </div> 
                    
                    <div class="form-group">
                            <label for="date">Country</label><br>
                            <input type="text" class="border border-top-0 border-left-0 border-right-0 border-primary" placeholder="Enter your country" id="country">
                    </div>
                    
                    <!--div class="form-group">
                            <label for="date">Academic titles</label><br>
                            <input type="text" class="border border-top-0 border-left-0 border-right-0 border-primary" id="academic">
                    </div--> 
                    

                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-7 text-left">
                                <label><input type="checkbox" value="rock">Rock</label>
                            </div>

                            <div class="col-4 text-left">
                                <label><input type="checkbox" value="metal">Metal</label>
                            </div>
                        </div>

                        <div class="row justify-content-center">
                            <div class="col-7 text-left">
                                <label><input type="checkbox" value="pop">Pop</label>
                            </div>

                            <div class="col-4 text-left">
                                <label><input type="checkbox" value="jazz">Jazz</label>
                            </div>
                        </div>

                        <div class="row justify-content-center">
                            <div class="col-7 text-left">
                            <label><input type="checkbox" value="blues">Blues</label>
                            </div>

                            <div class="col-4 text-left">
                                <label><input type="checkbox" value="country">Country</label>
                            </div>
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
        </div>
    </div>
    </body>

</html>