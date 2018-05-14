<?php  include_once('templates/header.php'); ?>
<link rel="stylesheet" href="styles/feed.css">
<link rel="stylesheet" href="styles/forms.css">
<script defer src="scripts/followers.js"></script>

<div class="container-fluid">
  <div id="floatingmenu" class="row d-md-none my-0 bg-primary text-white w-100 border-top border-secondary py-2">
    <div class="col">
      <input type="checkbox" id="toggleleft">
      <i class="align-middle fas fa-bars" id="ham"></i>
      <div class="d-md-none jumbotron jumbotron-fluid d-flex py-1 border rounded border-dark" id="leftmenu">

        <ul>
          <li class="display-5 text-primary">My Bands
            <ul>
              <li>
                <a href="#">
                  <img src="images/system/dummy_profile.svg" class="profile_img_chat">
                  <p class="text-secondary">Cold Play</p>

                </a>
              </li>
              <li>
                <a href="#">
                  <img src="images/system/dummy_profile.svg" class="profile_img_chat">
                  <p class="text-secondary">Pearl Jam</p>

                </a>
              </li>
            </ul>
          </li>
          <hr>
          <li class="display-5 text-primary">My Fellow Musicians
            <ul>
              <li>
                <a href="#">
                  <img src="images/system/dummy_profile.svg" class="profile_img_chat">
                  <p class="text-secondary">Eric Clapton</p>

                </a>
              </li>
              <li>
                <a href="#">
                  <img src="images/system/dummy_profile.svg" class="profile_img_chat">
                  <p class="text-secondary">Eddie Vedder</p>

                </a>
              </li>
              <li>
                <a href="#">
                  <img src="images/system/dummy_profile.svg" class="profile_img_chat">
                  <p class="text-secondary">Jeff Ament</p>

                </a>
              </li>
            </ul>
          </li>
          <hr>
          <li><a href="#"><p class="text-secondary align-middle mb-1">Followers</p></a></li>
          <li><a href="#"><p class="text-secondary align-middle mb-1">Following <small>(users)</small></p></a></li>
          <li><a href="#"><p class="text-secondary align-middle mb-1">Following <small>(bands)</small></p></a></li>
        </ul>
      </div>
    </div>

    <div id="homeButton" class="col-auto">
      <i class="fas fa-home text-white"></i>
    </div>

    <div id="chatButton" class="col-auto">
      <i class="fas fa-comments"></i>
    </div>

  </div>

  <div id="main" class="row justify-content-center">

    <div id="leftfeedmenu" class="py-3 card bg-light rounded-0 col-2 d-none d-md-block">

      <?php include('leftfeedmenu.html')?>

    </div>

    <div id="posts" class="col-12 col-md-6 p-0 mt-2">

      <div class="jumbotron text-center bg-primary mt-4">
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

    </div>

    <div id="chat" class="p-0 card bg-light rounded-0 col-12 col-md-3 mt-0">

    <?php include('chat.html')?>


  </div>

</div>

</body>

</html>