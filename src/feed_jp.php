<?php  include_once('templates/header.php'); ?>
<link rel="stylesheet" href="styles/feed.css">
<script defer src="scripts/feed.js"></script>

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

  <div id="main" class="row justify-content-center">

    <div id="leftfeedmenu" class="py-3 card bg-light rounded-0 col-2 d-none d-md-block">

      <?php include('leftfeedmenu.html')?>

    </div>


    <div id="posts" class="col-12 col-md-6 p-0 mt-2">

      <div class="jumbotron p-3 post mb-2">
        <div class="row">
          <img src="images/system/dummy_profile.svg" class="col-2 profile_img_chat p-0 border-0">
          <textarea placeholder="New post..." class="col-4 col-md-7 text-primary form-control-sm border border-secondary mr-0" rows="1" id="new_post_ta" style="height: 30px;"></textarea>
          <div class="btn-group col-2" role="group" style="height: 100%;">
            <button type="button" class="btn btn-light">
              <i class="far fa-image"></i>
            </button>
            <button type="button" class="btn btn-light">
              <i class="fas fa-film"></i>
            </button>
            <button type="button" class="btn btn-light">
              <i class="fas fa-music"></i>
            </button>
          </div>
        </div>
      </div>

      <div class="jumbotron p-3 post mb-2">

        <div class="row mb-3 justify-content-between">
          <div class="col">
            <img src="images/system/dummy_profile.svg" class="profile mr-2">
            <a class="text-secondary align-middle" href="#">João Pedro</a>
          </div>

          <div class="col-4 text-right">
            <small>
              <i class="text-secondary">1/3/2018 10:33</i>
            </small>
          </div>

        </div>

        <div class="row justify-content-start">

          <div class="col align-self-center text-justify">

            <small>Phasellus blandit lectus lectus, at sagittis orci tincidunt vitae. Vivamus id quam quis lacus venenatis
              hendrerit quis sed quam. Praesent sodales elit ac elit convallis pulvinar. Fusce bibendum, dui
              ac dapibus venenatis, lacus augue vehicula ligula, vel venenatis turpis risus sed lectus. Quisque
              nunc purus, pellentesque vel odio vitae, facilisis hendrerit arcu. Class aptent taciti sociosqu
              ad litora torquent per conubia nostra, per inceptos himenaeos.
            </small>

          </div>

        </div>

        <hr>

        <div class="row comment mb-1">

          <div class="col align-self-center">

            <div class="row">

              <div class="col-auto comment_author">
                <img src="images/system/dummy_profile.svg" class=" profile_img_message mr-2">
                <small>
                  <a class="text-secondary align-middle" href="#">Leo</a>
                </small>
              </div>

              <div class="col">
                <small class="comment_text">
                  <small>
                    <sup>
                      <i class="fas fa-quote-right"></i>
                    </sup>
                    <i>Nice</i>
                  </small>
                </small>
              </div>
            </div>

          </div>

        </div>

        <div class="row comment mb-1">

          <div class="col align-self-center">

            <div class="row">

              <div class="col-auto comment_author">
                <img src="images/system/dummy_profile.svg" class=" profile_img_message mr-2">
                <small>
                  <a class="text-secondary align-middle" href="#">Leo</a>
                </small>
              </div>

              <div class="col">
                <small class="comment_text">
                  <small>
                    <sup>
                      <i class="fas fa-quote-right"></i>
                    </sup>
                    <i>Nice</i>
                  </small>
                </small>
              </div>
            </div>

          </div>

        </div>


        <form class="form-inline row justify-content-between px-3 pt-2">
          <textarea placeholder="new comment" class="col-9 col-sm-10 col-md-9 col-lg-10 text-primary form-control-sm border border-secondary"
          rows="2" id="new_comment_ta"></textarea>
          <input type="submit" value="comment" class="btn btn-primary btn-sm">
        </form>


      </div>

      <div class="jumbotron  p-3 post mb-2">

        <div class="row mb-3 justify-content-between">
          <div class="col">
            <img src="images/system/dummy_profile.svg" class="profile mr-2">
            <a class="text-secondary align-middle" href="#">João Pedro</a>
          </div>

          <div class="col-4 text-right">
            <small>
              <i class="text-secondary">1/3/2018 10:33</i>
            </small>
          </div>

        </div>

        <div class="row justify-content-start">

          <div class="col align-self-center text-justify">

            <small>Phasellus blandit lectus lectus, at sagittis orci tincidunt vitae. Vivamus id quam quis lacus venenatis
              hendrerit quis sed quam. Praesent sodales elit ac elit convallis pulvinar. Fusce bibendum, dui
              ac dapibus venenatis, lacus augue vehicula ligula, vel venenatis turpis risus sed lectus. Quisque
              nunc purus, pellentesque vel odio vitae, facilisis hendrerit arcu. Class aptent taciti sociosqu
              ad litora torquent per conubia nostra, per inceptos himenaeos.
            </small>

          </div>

        </div>

        <hr>

        <div class="row comment mb-1">

          <div class="col align-self-center">

            <div class="row">

              <div class="col-auto comment_author">
                <img src="images/system/dummy_profile.svg" class=" profile_img_message mr-2">
                <small>
                  <a class="text-secondary align-middle" href="#">Leo</a>
                </small>
              </div>

              <div class="col">
                <small class="comment_text">
                  <small>
                    <sup>
                      <i class="fas fa-quote-right"></i>
                    </sup>
                    <i>Nice</i>
                  </small>
                </small>
              </div>
            </div>

          </div>

        </div>

        <div class="row comment mb-1">

          <div class="col align-self-center">

            <div class="row">

              <div class="col-auto comment_author">
                <img src="images/system/dummy_profile.svg" class=" profile_img_message mr-2">
                <small>
                  <a class="text-secondary align-middle" href="#">Leo</a>
                </small>
              </div>

              <div class="col">
                <small class="comment_text">
                  <small>
                    <sup>
                      <i class="fas fa-quote-right"></i>
                    </sup>
                    <i>Nice</i>
                  </small>
                </small>
              </div>
            </div>

          </div>

        </div>

      </div>

      <div class="jumbotron  p-3 post mb-2">

        <div class="row mb-3 justify-content-between">
          <div class="col">
            <img src="images/system/dummy_profile.svg" class="profile mr-2">
            <a class="text-secondary align-middle" href="#">João Pedro</a>
          </div>

          <div class="col-4 text-right">
            <small>
              <i class="text-secondary">1/3/2018 10:33</i>
            </small>
          </div>

        </div>

        <div class="row justify-content-start">

          <div class="col align-self-center text-justify">

            <small>Phasellus blandit lectus lectus, at sagittis orci tincidunt vitae. Vivamus id quam quis lacus venenatis
              hendrerit quis sed quam. Praesent sodales elit ac elit convallis pulvinar. Fusce bibendum, dui
              ac dapibus venenatis, lacus augue vehicula ligula, vel venenatis turpis risus sed lectus. Quisque
              nunc purus, pellentesque vel odio vitae, facilisis hendrerit arcu. Class aptent taciti sociosqu
              ad litora torquent per conubia nostra, per inceptos himenaeos.
            </small>

          </div>

        </div>

        <hr>

        <div class="row comment mb-1">

          <div class="col align-self-center">

            <div class="row">

              <div class="col-auto comment_author">
                <img src="images/system/dummy_profile.svg" class=" profile_img_message mr-2">
                <small>
                  <a class="text-secondary align-middle" href="#">Leo</a>
                </small>
              </div>

              <div class="col">
                <small class="comment_text">
                  <small>
                    <sup>
                      <i class="fas fa-quote-right"></i>
                    </sup>
                    <i>Nice</i>
                  </small>
                </small>
              </div>
            </div>

          </div>

        </div>

        <div class="row comment mb-1">

          <div class="col align-self-center">

            <div class="row">

              <div class="col-auto comment_author">
                <img src="images/system/dummy_profile.svg" class=" profile_img_message mr-2">
                <small>
                  <a class="text-secondary align-middle" href="#">Leo</a>
                </small>
              </div>

              <div class="col">
                <small class="comment_text">
                  <small>
                    <sup>
                      <i class="fas fa-quote-right"></i>
                    </sup>
                    <i>Nice</i>
                  </small>
                </small>
              </div>
            </div>

          </div>

        </div>

      </div>

      <div class="jumbotron  p-3 post mb-2">

        <div class="row mb-3 justify-content-between">
          <div class="col">
            <img src="images/system/dummy_profile.svg" class="profile mr-2">
            <a class="text-secondary align-middle" href="#">João Pedro</a>
          </div>

          <div class="col-4 text-right">
            <small>
              <i class="text-secondary">1/3/2018 10:33</i>
            </small>
          </div>

        </div>

        <div class="row justify-content-start">

          <div class="col align-self-center text-justify">

            <small>Phasellus blandit lectus lectus, at sagittis orci tincidunt vitae. Vivamus id quam quis lacus venenatis
              hendrerit quis sed quam. Praesent sodales elit ac elit convallis pulvinar. Fusce bibendum, dui
              ac dapibus venenatis, lacus augue vehicula ligula, vel venenatis turpis risus sed lectus. Quisque
              nunc purus, pellentesque vel odio vitae, facilisis hendrerit arcu. Class aptent taciti sociosqu
              ad litora torquent per conubia nostra, per inceptos himenaeos.
            </small>

          </div>

        </div>

        <hr>

        <div class="row comment mb-1">

          <div class="col align-self-center">

            <div class="row">

              <div class="col-auto comment_author">
                <img src="images/system/dummy_profile.svg" class=" profile_img_message mr-2">
                <small>
                  <a class="text-secondary align-middle" href="#">Leo</a>
                </small>
              </div>

              <div class="col">
                <small class="comment_text">
                  <small>
                    <sup>
                      <i class="fas fa-quote-right"></i>
                    </sup>
                    <i>Nice</i>
                  </small>
                </small>
              </div>
            </div>

          </div>

        </div>

        <div class="row comment mb-1">

          <div class="col align-self-center">

            <div class="row">

              <div class="col-auto comment_author">
                <img src="images/system/dummy_profile.svg" class=" profile_img_message mr-2">
                <small>
                  <a class="text-secondary align-middle" href="#">Leo</a>
                </small>
              </div>

              <div class="col">
                <small class="comment_text">
                  <small>
                    <sup>
                      <i class="fas fa-quote-right"></i>
                    </sup>
                    <i>Nice</i>
                  </small>
                </small>
              </div>
            </div>

          </div>

        </div>

      </div>

      <div class="jumbotron  p-3 post mb-2">

        <div class="row mb-3 justify-content-between">
          <div class="col">
            <img src="images/system/dummy_profile.svg" class="profile mr-2">
            <a class="text-secondary align-middle" href="#">João Pedro</a>
          </div>

          <div class="col-4 text-right">
            <small>
              <i class="text-secondary">1/3/2018 10:33</i>
            </small>
          </div>

        </div>

        <div class="row justify-content-start">

          <div class="col align-self-center text-justify">

            <small>Phasellus blandit lectus lectus, at sagittis orci tincidunt vitae. Vivamus id quam quis lacus venenatis
              hendrerit quis sed quam. Praesent sodales elit ac elit convallis pulvinar. Fusce bibendum, dui
              ac dapibus venenatis, lacus augue vehicula ligula, vel venenatis turpis risus sed lectus. Quisque
              nunc purus, pellentesque vel odio vitae, facilisis hendrerit arcu. Class aptent taciti sociosqu
              ad litora torquent per conubia nostra, per inceptos himenaeos.
            </small>

          </div>

        </div>

        <hr>

        <div class="row comment mb-1">

          <div class="col align-self-center">

            <div class="row">

              <div class="col-auto comment_author">
                <img src="images/system/dummy_profile.svg" class=" profile_img_message mr-2">
                <small>
                  <a class="text-secondary align-middle" href="#">Leo</a>
                </small>
              </div>

              <div class="col">
                <small class="comment_text">
                  <small>
                    <sup>
                      <i class="fas fa-quote-right"></i>
                    </sup>
                    <i>Nice</i>
                  </small>
                </small>
              </div>
            </div>

          </div>

        </div>

        <div class="row comment mb-1">

          <div class="col align-self-center">

            <div class="row">

              <div class="col-auto comment_author">
                <img src="images/system/dummy_profile.svg" class=" profile_img_message mr-2">
                <small>
                  <a class="text-secondary align-middle" href="#">Leo</a>
                </small>
              </div>

              <div class="col">
                <small class="comment_text">
                  <small>
                    <sup>
                      <i class="fas fa-quote-right"></i>
                    </sup>
                    <i>Nice</i>
                  </small>
                </small>
              </div>
            </div>

          </div>

        </div>

      </div>

    </div>

    <div id="chat" class="p-0 card bg-light rounded-0 col-12 col-md-3 d-none d-md-block" style="overflow-x: hidden">
      <!--  -->

      <?php include('chat.html')?>

    </div>

  </div>

</div>

</body>

</html>
