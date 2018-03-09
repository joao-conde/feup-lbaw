<?php  include_once('templates/header.php'); ?>

<link rel="stylesheet" href="styles/profile.css">
<script defer src="scripts/feed.js"></script>

<div class="profile-page container-fluid">

    <div id="floatingmenu" class="row d-md-none my-0 bg-primary text-white w-100 border-top border-secondary py-2">
        <div class="col">
            <!-- <input type="checkbox" id="toggleleft"> -->
            <!-- <i class="align-middle fas fa-bars" id="ham"></i> -->
            <div class="d-md-none jumbotron jumbotron-fluid bg-primary d-flex py-1 m-0" id="leftmenu">

                <!-- <ul>
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
            </ul> -->
            </div>
        </div>

        <div id="homeButton" class="col-auto">
            <i class="fas fa-home"></i>
        </div>

        <div id="chatButton" class="col-auto">
            <i class="fas fa-comments"></i>
        </div>


    </div>

    <div id="main" class="row justify-content-center">

        <div class="col-9">

            <div class="row justify-content-center">

                <div class="jumbotron">
                    <div id="left" class="">
                        <div class="row p-2 m-0 bg-primary d-block d-md-none">
                            <h6 class="col-auto m-0 text-success">Me</h6>
                        </div>
                        <div class="jumbotron rounded-0 profile-card p-3">

                            <div class="row">

                                <div class="col-5 col-md-12 mb-md-2 align-self-center">

                                    <div class="row justify-content-between">
                                        <h6>Leonardo Teixeira</h6>
                                        <div class="container col align-self-center m-0 text-right">
                                            <!-- <button type="button" class="btn btn-sm btn-success float-right">Follow</button> -->
                                            <!--button type="button" class="btn btn-sm btn-danger float-right">Unfollow</button-->
                                            <i class="fas fa-pencil-alt"></i>
                                        </div>
                                    </div>
                                    <img id="profile_pic" class="card-img-top mt-2" src="images/users/example-user.jpg" alt="Card image">


                                </div>

                                <div class="col-7 col-md-12 align-self-center">

                                    <div id="skills_list" class="card-body p-0 small">

                                        <p class="list-group-item-text my-1">Drums

                                            <small class="mt-1 ml-1 float-right text-info">4.2</small>
                                            <i class="far fa-star mt-1 float-right text-info"></i>
                                            <i class="fas fa-star mt-1 float-right text-info"></i>
                                            <i class="fas fa-star mt-1 float-right text-info"></i>
                                            <i class="fas fa-star mt-1 float-right text-info"></i>
                                            <i class="fas fa-star mt-1 float-right text-info"></i>


                                        </p>




                                        <p class="list-group-item-text my-1">Guitar

                                            <small class="mt-1 ml-1 float-right text-info">3.1</small>
                                            <i class="far fa-star mt-1 float-right text-info"></i>
                                            <i class="far fa-star mt-1 float-right text-info"></i>
                                            <i class="fas fa-star mt-1 float-right text-info"></i>
                                            <i class="fas fa-star mt-1 float-right text-info"></i>
                                            <i class="fas fa-star mt-1 float-right text-info"></i>

                                        </p>




                                        <p class="list-group-item-text my-1">Piano

                                            <small class="mt-1 ml-1 float-right text-info">2.9</small>
                                            <i class="far fa-star mt-1 float-right text-info"></i>
                                            <i class="far fa-star mt-1 float-right text-info"></i>
                                            <i class="fas fa-star mt-1 float-right text-info"></i>
                                            <i class="fas fa-star mt-1 float-right text-info"></i>
                                            <i class="fas fa-star mt-1 float-right text-info"></i>

                                        </p>





                                    </div>



                                </div>

                            </div>

                            <hr>
                            <a class="mr-1 d-block" href="#">
                                <img class="profile_img_feed" src="images/system/dummy_profile.svg">
                                <small class="text-primary">Pearl Jam</small>
                            </a>
                            <a class="mr-1 d-block" href="#">
                                <img class="profile_img_feed" src="images/system/dummy_profile.svg">
                                <small class="text-primary">Future Islands</small>
                            </a>
                            <a class="mr-1 d-block" href="#">
                                <img class="profile_img_feed" src="images/system/dummy_profile.svg">
                                <small class="text-primary">Beach House</small>
                            </a>
                            <a class="mr-1 d-block" href="#">
                                <small>
                                    <p class="text-secondary mt-2">See all</p>
                                </small>
                            </a>

                            <hr>

                            <div class="links p-1">

                                <small>

                                    <a href="#">
                                        <p class="text-secondary align-middle mb-1">Followers</p>
                                    </a>
                                    <a href="#">
                                        <p class="text-secondary align-middle mb-1">Following
                                            <small>(users)</small>
                                        </p>
                                    </a>
                                    <a href="#">
                                        <p class="text-secondary align-middle mb-1">Following
                                            <small>(bands)</small>
                                        </p>
                                    </a>

                                </small>
                            </div>



                        </div>



                    </div>

                </div>

            </div>

            <div class="row justify-content-center">

                <div class="col-12">

                    <div id="posts" class="container col-12 col-md-6 mt-3 p-0 order-3">

                        <div class="jumbotron p-3 post mb-2">
                            <div class="row">
                                <img src="images/system/dummy_profile.svg" class="col-2 mt-1 profile_img_chat p-0 border-0">
                                <textarea placeholder="New post..." class="col-4 col-md-7 mt-1 text-primary form-control-sm border border-secondary mr-0"
                                    rows="1" id="new_post_ta" style="height: 30px;"></textarea>
                                <div class="btn-group col-2" role="group">
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

                        <div class="row p-2 m-0 bg-primary d-block d-md-none">
                            <h6 class="col-auto m-0 text-success">My activity</h6>
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

                                    <small>Phasellus blandit lectus lectus, at sagittis orci tincidunt vitae. Vivamus id quam quis
                                        lacus venenatis hendrerit quis sed quam. Praesent sodales elit ac elit convallis
                                        pulvinar. Fusce bibendum, dui ac dapibus venenatis, lacus augue vehicula ligula,
                                        vel venenatis turpis risus sed lectus. Quisque nunc purus, pellentesque vel odio
                                        vitae, facilisis hendrerit arcu. Class aptent taciti sociosqu ad litora torquent
                                        per conubia nostra, per inceptos himenaeos.
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

                                    <small>Phasellus blandit lectus lectus, at sagittis orci tincidunt vitae. Vivamus id quam quis
                                        lacus venenatis hendrerit quis sed quam. Praesent sodales elit ac elit convallis
                                        pulvinar. Fusce bibendum, dui ac dapibus venenatis, lacus augue vehicula ligula,
                                        vel venenatis turpis risus sed lectus. Quisque nunc purus, pellentesque vel odio
                                        vitae, facilisis hendrerit arcu. Class aptent taciti sociosqu ad litora torquent
                                        per conubia nostra, per inceptos himenaeos.
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

                                    <small>Phasellus blandit lectus lectus, at sagittis orci tincidunt vitae. Vivamus id quam quis
                                        lacus venenatis hendrerit quis sed quam. Praesent sodales elit ac elit convallis
                                        pulvinar. Fusce bibendum, dui ac dapibus venenatis, lacus augue vehicula ligula,
                                        vel venenatis turpis risus sed lectus. Quisque nunc purus, pellentesque vel odio
                                        vitae, facilisis hendrerit arcu. Class aptent taciti sociosqu ad litora torquent
                                        per conubia nostra, per inceptos himenaeos.
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

                                    <small>Phasellus blandit lectus lectus, at sagittis orci tincidunt vitae. Vivamus id quam quis
                                        lacus venenatis hendrerit quis sed quam. Praesent sodales elit ac elit convallis
                                        pulvinar. Fusce bibendum, dui ac dapibus venenatis, lacus augue vehicula ligula,
                                        vel venenatis turpis risus sed lectus. Quisque nunc purus, pellentesque vel odio
                                        vitae, facilisis hendrerit arcu. Class aptent taciti sociosqu ad litora torquent
                                        per conubia nostra, per inceptos himenaeos.
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

                                    <small>Phasellus blandit lectus lectus, at sagittis orci tincidunt vitae. Vivamus id quam quis
                                        lacus venenatis hendrerit quis sed quam. Praesent sodales elit ac elit convallis
                                        pulvinar. Fusce bibendum, dui ac dapibus venenatis, lacus augue vehicula ligula,
                                        vel venenatis turpis risus sed lectus. Quisque nunc purus, pellentesque vel odio
                                        vitae, facilisis hendrerit arcu. Class aptent taciti sociosqu ad litora torquent
                                        per conubia nostra, per inceptos himenaeos.
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

                                    <small>Phasellus blandit lectus lectus, at sagittis orci tincidunt vitae. Vivamus id quam quis
                                        lacus venenatis hendrerit quis sed quam. Praesent sodales elit ac elit convallis
                                        pulvinar. Fusce bibendum, dui ac dapibus venenatis, lacus augue vehicula ligula,
                                        vel venenatis turpis risus sed lectus. Quisque nunc purus, pellentesque vel odio
                                        vitae, facilisis hendrerit arcu. Class aptent taciti sociosqu ad litora torquent
                                        per conubia nostra, per inceptos himenaeos.
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

                                    <small>Phasellus blandit lectus lectus, at sagittis orci tincidunt vitae. Vivamus id quam quis
                                        lacus venenatis hendrerit quis sed quam. Praesent sodales elit ac elit convallis
                                        pulvinar. Fusce bibendum, dui ac dapibus venenatis, lacus augue vehicula ligula,
                                        vel venenatis turpis risus sed lectus. Quisque nunc purus, pellentesque vel odio
                                        vitae, facilisis hendrerit arcu. Class aptent taciti sociosqu ad litora torquent
                                        per conubia nostra, per inceptos himenaeos.
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

                                    <small>Phasellus blandit lectus lectus, at sagittis orci tincidunt vitae. Vivamus id quam quis
                                        lacus venenatis hendrerit quis sed quam. Praesent sodales elit ac elit convallis
                                        pulvinar. Fusce bibendum, dui ac dapibus venenatis, lacus augue vehicula ligula,
                                        vel venenatis turpis risus sed lectus. Quisque nunc purus, pellentesque vel odio
                                        vitae, facilisis hendrerit arcu. Class aptent taciti sociosqu ad litora torquent
                                        per conubia nostra, per inceptos himenaeos.
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

                    </div>

                </div>



            </div>

        </div>
    </div>


    <div id="chat" class="p-0 card bg-light rounded-0 col-12 col-md-3" style="overflow-x: hidden">

        <?php include('chat.html')?>

    </div>
</div>

</div>

</body>

</html>