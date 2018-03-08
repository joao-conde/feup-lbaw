<!-- <div class="card">
    <form action="#">
        <button type="submit">
            <span>
                Submit New Band
            </span>
        </button>
    </form>
</div> -->



<?php  include_once('templates/header.php'); ?>
<link rel="stylesheet" href="styles/chat.css">
<link rel="stylesheet" type="text/css" href="styles/forms.css">

<div class="container-fluid">

    <div class="row d-md-none my-2">
        <div class="col">
            <input type="checkbox" id="toggleleft">
            <i class="text-primary align-middle fas fa-bars" id="ham"></i>
            <div class="d-md-none jumbotron jumbotron-fluid bg-primary d-flex py-1" id="leftmenu">

                <ul>
                    <li class="display-5 text-secondary">My Bands
                        <ul>
                            <li>
                                <a href="#" class="text-success">
                                    <img src="images/system/dummy_profile.svg" class="profile_img_chat">
                                    <p>Cold Play</p>

                                </a>
                            </li>
                            <li>
                                <a href="#" class="text-success">
                                    <img src="images/system/dummy_profile.svg" class="profile_img_chat">
                                    <p>Pearl Jam</p>

                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="display-5 text-secondary">My Fellow Musicians
                        <ul>
                            <li>
                                <a href="#" class="text-success">
                                    <img src="images/system/dummy_profile.svg" class="profile_img_chat">
                                    <p>Eric Clapton</p>

                                </a>
                            </li>
                            <li>
                                <a href="#" class="text-success">
                                    <img src="images/system/dummy_profile.svg" class="profile_img_chat">
                                    <p>Eddie Vedder</p>

                                </a>
                            </li>
                            <li>
                                <a href="#" class="text-success">
                                    <img src="images/system/dummy_profile.svg" class="profile_img_chat">
                                    <p>Jeff Ament</p>

                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>

        <div class="col-auto">
            <i class="fas fa-home"></i>
        </div>

        <div class="col-auto">
            <i class="fas fa-comments"></i>
        </div>


    </div>

    <div id="main" class="row justify-content-center w-75">

        <div class="col-8 jumbotron text-center bg-primary mt-4">
            <h2 class="">New Band</h2>
            <form action="#">
                <div class="row justify-content-center">
                    <div class="form-group mt-4 border border-top-0 border-left-0 border-right-0 border-secondary">
                        <i class="fas fa-heading mr-2 form-icon"></i>
                        <input type="text" class="border-0 text-center" id="band_name"
                            placeholder="Enter Band Name" name="band_name">
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="form-group mt-4 border border-top-0 border-left-0 border-right-0 border-secondary">
                        <i class="fas fa-user mr-2 form-icon"></i>
                        <input type="text" class="border-0 text-cemer" id="pwd"
                            placeholder="Enter Band Members" name="pwd">
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="form-group mt-4 border border-top-0 border-left-0 border-right-0 border-secondary">
                        <i class="fas fa-music mr-2 form-icon"></i>
                        <input type="password" class="border-0 text-cemer" id="pwd"
                            placeholder="Select Genders" name="pwd">
                    </div>
                </div>
                <button type="submit" class="btn btn-secondary mt-3">Submit</button>
            </form>
        </div>

        <div id="chat" class="p-0 card bg-light rounded-0 col-12 col-md-3 d-none d-md-block" style="overflow-x: hidden">

            <?php include('chat.html')?>

        </div>

    </div>

</div>

</body>

</html>