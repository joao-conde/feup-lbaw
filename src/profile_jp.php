<?php  include_once('templates/header.php'); ?>

<link rel="stylesheet" href="styles/profile_jp.css">
<script defer src="scripts/feed.js"></script>


<div class="main_content container-fluid p-0 p-md-2">

    <div class="row no-gutters">

        <div id="profile_area" class="col-12 col-md-7 col-lg-9">
            <div class="jumbotron p-3 mb-1">

                <div id="username" class="row px-3 justify-content-center">
                    <div class="col-auto align-self-center">
                            <img src="images/system/musician-icon.svg" class="profile_type">
                    </div>

                    <div class="col-11 align-self-center">
                        
                        <h3 class="d-inline-block">Leonardo Teixeira Vasconcelos</h3>
                    </div>
                </div>

                <div id="profile_pic_div" class="row">

                    <div class="col-auto">

                        <img id="profile_pic" class="profile_image d-block my-3" src="images/users/example-user.jpg" alt="Profile Image">
                        <button class="btn btn-success">Follow</button>


                    </div>

                    <div class="col-12 col-lg-7 p-3 align-self-start text-justify">

                        <div class="row p-2">
                            <p class="text-primary">Lorem ipsunibus ligula. Duis in ipsum nec sem imperdiet tristique. Cras gravida gravida velit
                                at tincidunt. In ligula nisi, tincidunt eget pellentesque vel, sagittis eget sem. Sed nec
                                arcu mauris. Nullam quis condimentum libero. Duis maximus lorem tincidunt commodo molestie.
                                Quisque et sapien dui. In ac felis felis. Etiam auctor arcu ut justo interdum commodo. Aliquam
                                in ipsum molestie elit eleifend fringilla quis eget ante. Praesent in velit leo.</p>
                        </div>

                        <hr class="mt-0">

                        <div id="rating" class="row">
                            <div class="col-12">
                                <div id="skills_list">
                                    <p class="mr-2">Drums
                                        
                                        <i class="far fa-star mt-1 text-primary"></i>
                                        <i class="fas fa-star mt-1 text-primary"></i>
                                        <i class="fas fa-star mt-1 text-primary"></i>
                                        <i class="fas fa-star mt-1 text-primary"></i>
                                        <i class="fas fa-star mt-1 text-primary"></i>
                                        <small class="mt-1 text-info">4.2</small>
                                    </p>
                                    <p class="mr-2">Guitar
                                        
                                        <i class="far fa-star mt-1 text-primary"></i>
                                        <i class="fas fa-star mt-1 text-primary"></i>
                                        <i class="fas fa-star mt-1 text-primary"></i>
                                        <i class="fas fa-star mt-1 text-primary"></i>
                                        <i class="fas fa-star mt-1 text-primary"></i>
                                        <small class="mt-1 text-info">4.2</small>
                                    </p>
                                    <p class="mr-2">Piano
                                        
                                        <i class="far fa-star mt-1 text-primary"></i>
                                        <i class="fas fa-star mt-1 text-primary"></i>
                                        <i class="fas fa-star mt-1 text-primary"></i>
                                        <i class="fas fa-star mt-1 text-primary"></i>
                                        <i class="fas fa-star mt-1 text-primary"></i>
                                        <small class="mt-1 text-info">4.2</small>
                                    </p>

                                </div>

                            </div>
                        </div>

                        <div id="bios" class="row p-0 justify-content-center">
                            <ul>
                                <li>
                                    <small>Lives in
                                        <i>Porto, Portugal</i>
                                    </small>
                                </li>
                                <li>
                                    <small>Born on
                                        <i>6/9/1985, at Amarante</i>
                                    </small>
                                </li>
                            </ul>
                        </div>

                        

                    </div>

                </div>

                <div id="navprofile" class="row justify-content-center border-top">

                        <nav class="navbar navbar-expand navbar-light bg-light">

                            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                                <div class="navbar-nav">
                                    <a class="nav-item col-4 nav-link btn btn-secondary text-white mr-2" href="#">Bands</a>
                                    <a class="nav-item col-4 nav-link btn btn-secondary text-white mr-2" href="#">Following</a>
                                    <a class="nav-item col-4 nav-link btn btn-secondary text-white mr-2" href="#">Followers</a>
                                </div>
                            </div>
                        </nav>

                    </div>

            </div>

            <div id="chat" class="p-0 card bg-light rounded-0 col-12 col-md-4 col-lg-3" style="overflow-x: hidden">

                <?php include('chat.html')?>

            </div>

        </div>

    </div>

    <div class="row no-gutters">
        <div class="col-3 d-none d-lg-block">

            <div class="jumbotron p-3 mr-2">
                <p class="align-middle">Bands</p>
                <a class="d-block" href="#">
                    <img class="profile_img_feed" src="images/system/dummy_profile.svg">
                    <small class="text-primary">Compota de Pérola</small>
                </a>
                <a class="d-block" href="#">
                    <img class="profile_img_feed" src="images/system/dummy_profile.svg">
                    <small class="text-primary">Ilha do Futuro</small>
                </a>
                <a class="d-block" href="#">
                    <img class="profile_img_feed" src="images/system/dummy_profile.svg">
                    <small class="text-primary">Casa da Praia</small>
                </a>
                <a class="d-block" href="#">
                    <img class="profile_img_feed" src="images/system/dummy_profile.svg">
                    <small class="text-primary">Toca Frio</small>
                </a>
                <a class=" d-block" href="#">
                    <small>
                        <p class="text-secondary mt-2">See all</p>
                    </small>
                </a>

            </div>

        </div>

        <div class="col-12 col-md-7 col-lg-6">

            <div id="posts">

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

                            <small>Phasellus blandit lectus lectus, at sagittis orci tincidunt vitae. Vivamus id quam quis lacus
                                venenatis hendrerit quis sed quam. Praesent sodales elit ac elit convallis pulvinar. Fusce
                                bibendum, dui ac dapibus venenatis, lacus augue vehicula ligula, vel venenatis turpis risus
                                sed lectus. Quisque nunc purus, pellentesque vel odio vitae, facilisis hendrerit arcu. Class
                                aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.
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

                            <small>Phasellus blandit lectus lectus, at sagittis orci tincidunt vitae. Vivamus id quam quis lacus
                                venenatis hendrerit quis sed quam. Praesent sodales elit ac elit convallis pulvinar. Fusce
                                bibendum, dui ac dapibus venenatis, lacus augue vehicula ligula, vel venenatis turpis risus
                                sed lectus. Quisque nunc purus, pellentesque vel odio vitae, facilisis hendrerit arcu. Class
                                aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.
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

                            <small>Phasellus blandit lectus lectus, at sagittis orci tincidunt vitae. Vivamus id quam quis lacus
                                venenatis hendrerit quis sed quam. Praesent sodales elit ac elit convallis pulvinar. Fusce
                                bibendum, dui ac dapibus venenatis, lacus augue vehicula ligula, vel venenatis turpis risus
                                sed lectus. Quisque nunc purus, pellentesque vel odio vitae, facilisis hendrerit arcu. Class
                                aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.
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

                            <small>Phasellus blandit lectus lectus, at sagittis orci tincidunt vitae. Vivamus id quam quis lacus
                                venenatis hendrerit quis sed quam. Praesent sodales elit ac elit convallis pulvinar. Fusce
                                bibendum, dui ac dapibus venenatis, lacus augue vehicula ligula, vel venenatis turpis risus
                                sed lectus. Quisque nunc purus, pellentesque vel odio vitae, facilisis hendrerit arcu. Class
                                aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.
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

                            <small>Phasellus blandit lectus lectus, at sagittis orci tincidunt vitae. Vivamus id quam quis lacus
                                venenatis hendrerit quis sed quam. Praesent sodales elit ac elit convallis pulvinar. Fusce
                                bibendum, dui ac dapibus venenatis, lacus augue vehicula ligula, vel venenatis turpis risus
                                sed lectus. Quisque nunc purus, pellentesque vel odio vitae, facilisis hendrerit arcu. Class
                                aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.
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

                            <small>Phasellus blandit lectus lectus, at sagittis orci tincidunt vitae. Vivamus id quam quis lacus
                                venenatis hendrerit quis sed quam. Praesent sodales elit ac elit convallis pulvinar. Fusce
                                bibendum, dui ac dapibus venenatis, lacus augue vehicula ligula, vel venenatis turpis risus
                                sed lectus. Quisque nunc purus, pellentesque vel odio vitae, facilisis hendrerit arcu. Class
                                aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.
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

                            <small>Phasellus blandit lectus lectus, at sagittis orci tincidunt vitae. Vivamus id quam quis lacus
                                venenatis hendrerit quis sed quam. Praesent sodales elit ac elit convallis pulvinar. Fusce
                                bibendum, dui ac dapibus venenatis, lacus augue vehicula ligula, vel venenatis turpis risus
                                sed lectus. Quisque nunc purus, pellentesque vel odio vitae, facilisis hendrerit arcu. Class
                                aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.
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

                            <small>Phasellus blandit lectus lectus, at sagittis orci tincidunt vitae. Vivamus id quam quis lacus
                                venenatis hendrerit quis sed quam. Praesent sodales elit ac elit convallis pulvinar. Fusce
                                bibendum, dui ac dapibus venenatis, lacus augue vehicula ligula, vel venenatis turpis risus
                                sed lectus. Quisque nunc purus, pellentesque vel odio vitae, facilisis hendrerit arcu. Class
                                aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.
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










    </body>

    </html>