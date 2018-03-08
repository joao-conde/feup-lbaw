<?php  include_once('templates/header.php'); ?>

<link rel="stylesheet" href="styles/profile.css">

<div class="profile-page row m-0 ">

    <div id="left" class="container col-12 col-md-3 p-0 my-3 my-md-0 order-1">
        <div class="row p-2 m-0 bg-primary d-block d-md-none">
            <h6 class="col-auto m-0 text-success">Band </h6>
        </div>
        <div class="card p-3 rounded-0 profile-card">

            <div class="row mb-2">
                <div class="col-12 mb-md-2 align-self-center">

                    <div class="row justify-content-between">
                        <h6 class="card-title col-8 col-md-8 align-self-center m-0 text-primary">The Does</h6>
                        <div class="container col align-self-center m-0 text-right">
                            <i class="fas fa-pencil-alt"></i>
                        </div>
                    </div>
                    <img id="profile_pic" class="card-img-top mt-2" src="images/users/example-post2.jpg" alt="Card image">


                </div>
            </div>

            <div class="row">

                <div class="col-12 col-md-12 align-self-center">

                    <div class="card-body p-0 small">

                        <ul class="list-group">
                            <li class="list-group-item active">Members</li>
                            <li class="list-group-item text-success">John Doe</li>
                            <li class="list-group-item text-success">Jane Doe</li>
                            <li class="list-group-item text-success">Another Doe</li>
                        </ul>

                        <hr>

                        <ul class="list-group">
                            <li class="list-group-item active">Genres</li>
                            <li class="list-group-item text-success">Rock</li>
                            <li class="list-group-item text-success">Blues</li>
                            <li class="list-group-item text-success">Jazz</li>
                        </ul>

                    </div>

                </div>

            </div>

        </div>
    </div>

    <div id="posts" class="container col-12 col-md-5 mt-3 p-0 order-3">

        <div class="row p-2 m-0 bg-primary d-block d-md-none">
            <h6 class="col-auto m-0 text-success">New Content </h6>
        </div>

        <div id="new_post" class="jumbotron py-2">
            <div class="row justify-content-between p-0">

                <div class="col-3 col-md-4">
                    <small>
                        <i>New Content</i>
                    </small>
                </div>

                <div class="col-9 col-md-6 text-right p-0">

                    <div class="btn-group" role="group">
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

            <div class="row p-3">

                <div class="col-12">

                    <form class="form-inline row justify-content-between">
                        <textarea placeholder="" class="col-9 col-sm-9 col-md-9 text-primary form-control-sm border border-secondary" rows="5" id="new_comment_ta"></textarea>
                        <input type="submit" value="post" class="btn btn-primary btn-sm col-2">
                    </form>

                </div>



            </div>



        </div>

        <div class="row p-2 m-0 bg-primary d-block d-md-none">
            <h6 class="col-auto m-0 text-success">Band activity</h6>
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
                        hendrerit quis sed quam. Praesent sodales elit ac elit convallis pulvinar. Fusce bibendum, dui ac
                        dapibus venenatis, lacus augue vehicula ligula, vel venenatis turpis risus sed lectus. Quisque nunc
                        purus, pellentesque vel odio vitae, facilisis hendrerit arcu. Class aptent taciti sociosqu ad litora
                        torquent per conubia nostra, per inceptos himenaeos.
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

                    <small>Phasellus blandit lectus lectus, at sagittis orci tincidunt vitae. Vivamus id quam quis lacus venenatis
                        hendrerit quis sed quam. Praesent sodales elit ac elit convallis pulvinar. Fusce bibendum, dui ac
                        dapibus venenatis, lacus augue vehicula ligula, vel venenatis turpis risus sed lectus. Quisque nunc
                        purus, pellentesque vel odio vitae, facilisis hendrerit arcu. Class aptent taciti sociosqu ad litora
                        torquent per conubia nostra, per inceptos himenaeos.
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

                    <small>Phasellus blandit lectus lectus, at sagittis orci tincidunt vitae. Vivamus id quam quis lacus venenatis
                        hendrerit quis sed quam. Praesent sodales elit ac elit convallis pulvinar. Fusce bibendum, dui ac
                        dapibus venenatis, lacus augue vehicula ligula, vel venenatis turpis risus sed lectus. Quisque nunc
                        purus, pellentesque vel odio vitae, facilisis hendrerit arcu. Class aptent taciti sociosqu ad litora
                        torquent per conubia nostra, per inceptos himenaeos.
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

                    <small>Phasellus blandit lectus lectus, at sagittis orci tincidunt vitae. Vivamus id quam quis lacus venenatis
                        hendrerit quis sed quam. Praesent sodales elit ac elit convallis pulvinar. Fusce bibendum, dui ac
                        dapibus venenatis, lacus augue vehicula ligula, vel venenatis turpis risus sed lectus. Quisque nunc
                        purus, pellentesque vel odio vitae, facilisis hendrerit arcu. Class aptent taciti sociosqu ad litora
                        torquent per conubia nostra, per inceptos himenaeos.
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

                    <small>Phasellus blandit lectus lectus, at sagittis orci tincidunt vitae. Vivamus id quam quis lacus venenatis
                        hendrerit quis sed quam. Praesent sodales elit ac elit convallis pulvinar. Fusce bibendum, dui ac
                        dapibus venenatis, lacus augue vehicula ligula, vel venenatis turpis risus sed lectus. Quisque nunc
                        purus, pellentesque vel odio vitae, facilisis hendrerit arcu. Class aptent taciti sociosqu ad litora
                        torquent per conubia nostra, per inceptos himenaeos.
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

                    <small>Phasellus blandit lectus lectus, at sagittis orci tincidunt vitae. Vivamus id quam quis lacus venenatis
                        hendrerit quis sed quam. Praesent sodales elit ac elit convallis pulvinar. Fusce bibendum, dui ac
                        dapibus venenatis, lacus augue vehicula ligula, vel venenatis turpis risus sed lectus. Quisque nunc
                        purus, pellentesque vel odio vitae, facilisis hendrerit arcu. Class aptent taciti sociosqu ad litora
                        torquent per conubia nostra, per inceptos himenaeos.
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

                    <small>Phasellus blandit lectus lectus, at sagittis orci tincidunt vitae. Vivamus id quam quis lacus venenatis
                        hendrerit quis sed quam. Praesent sodales elit ac elit convallis pulvinar. Fusce bibendum, dui ac
                        dapibus venenatis, lacus augue vehicula ligula, vel venenatis turpis risus sed lectus. Quisque nunc
                        purus, pellentesque vel odio vitae, facilisis hendrerit arcu. Class aptent taciti sociosqu ad litora
                        torquent per conubia nostra, per inceptos himenaeos.
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

                    <small>Phasellus blandit lectus lectus, at sagittis orci tincidunt vitae. Vivamus id quam quis lacus venenatis
                        hendrerit quis sed quam. Praesent sodales elit ac elit convallis pulvinar. Fusce bibendum, dui ac
                        dapibus venenatis, lacus augue vehicula ligula, vel venenatis turpis risus sed lectus. Quisque nunc
                        purus, pellentesque vel odio vitae, facilisis hendrerit arcu. Class aptent taciti sociosqu ad litora
                        torquent per conubia nostra, per inceptos himenaeos.
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

    <div id="right" class="container col-12 col-md-3 p-0 order-2">

        <div class="card rounded-0 border-0 py-md-2">
            <div class="card-body p-0 border-md-left">
                <div class="row p-2 m-0 bg-primary">
                    <h6 class="col-auto m-0 text-success">Followers (11)</h6>
                </div>
                <ul id="followers" class=" mb-md-2  p-md-2 mb-0">
                    <li>
                        <a class="d-flex flex-column" href="#">
                            <img class="profile_img_feed" src="images/system/dummy_profile.svg">
                            <small>John Doe</small>
                        </a>
                    </li>
                    <li>
                        <a class="d-flex flex-column" href="#">
                            <img class="profile_img_feed" src="images/system/dummy_profile.svg">
                            <small>John Doe</small>
                        </a>
                    </li>
                    <li>
                        <a class="d-flex flex-column" href="#">
                            <img class="profile_img_feed" src="images/system/dummy_profile.svg">
                            <small>John Doe</small>
                        </a>
                    </li>
                    <li>
                        <a class="d-flex flex-column" href="#">
                            <img class="profile_img_feed" src="images/system/dummy_profile.svg">
                            <small>John Doe</small>
                        </a>
                    </li>
                    <li>
                        <a class="d-flex flex-column" href="#">
                            <img class="profile_img_feed" src="images/system/dummy_profile.svg">
                            <small>John Doe</small>
                        </a>
                    </li>
                    <li>
                        <a class="d-flex flex-column" href="#">
                            <img class="profile_img_feed" src="images/system/dummy_profile.svg">
                            <small>John Doe</small>
                        </a>
                    </li>
                    <li>
                        <a class="d-flex flex-column" href="#">
                            <img class="profile_img_feed" src="images/system/dummy_profile.svg">
                            <small>John Doe</small>
                        </a>
                    </li>
                    <li>
                        <a class="d-flex flex-column" href="#">
                            <img class="profile_img_feed" src="images/system/dummy_profile.svg">
                            <small>John Doe</small>
                        </a>
                    </li>
                    <li>
                        <a class="d-flex flex-column" href="#">
                            <img class="profile_img_feed" src="images/system/dummy_profile.svg">
                            <small>John Doe</small>
                        </a>
                    </li>
                    <li>
                        <a class="d-flex flex-column" href="#">
                            <img class="profile_img_feed" src="images/system/dummy_profile.svg">
                            <small>John Doe</small>
                        </a>
                    </li>
                    <li>
                        <a class="d-flex flex-column" href="#">
                            <img class="profile_img_feed" src="images/system/dummy_profile.svg">
                            <small>John Doe</small>
                        </a>
                    </li>

                </ul>



                <div class="row p-2 m-0 bg-primary">
                    <h6 class="col-auto m-0 text-success">Applicants (11)</h6>
                </div>
                <ul id="follows" class="mb-md-2 p-md-2 mb-0">
                    <li>
                        <a class="d-flex flex-column" href="#">
                            <img class="profile_img_feed" src="images/system/dummy_profile.svg">
                            <small>John Doe</small>
                        </a>
                    </li>
                    <li>
                        <a class="d-flex flex-column" href="#">
                            <img class="profile_img_feed" src="images/system/dummy_profile.svg">
                            <small>John Doe</small>
                        </a>
                    </li>
                    <li>
                        <a class="d-flex flex-column" href="#">
                            <img class="profile_img_feed" src="images/system/dummy_profile.svg">
                            <small>John Doe</small>
                        </a>
                    </li>
                    <li>
                        <a class="d-flex flex-column" href="#">
                            <img class="profile_img_feed" src="images/system/dummy_profile.svg">
                            <small>John Doe</small>
                        </a>
                    </li>
                    <li>
                        <a class="d-flex flex-column" href="#">
                            <img class="profile_img_feed" src="images/system/dummy_profile.svg">
                            <small>John Doe</small>
                        </a>
                    </li>
                    <li>
                        <a class="d-flex flex-column" href="#">
                            <img class="profile_img_feed" src="images/system/dummy_profile.svg">
                            <small>John Doe</small>
                        </a>
                    </li>
                    <li>
                        <a class="d-flex flex-column" href="#">
                            <img class="profile_img_feed" src="images/system/dummy_profile.svg">
                            <small>John Doe</small>
                        </a>
                    </li>
                    <li>
                        <a class="d-flex flex-column" href="#">
                            <img class="profile_img_feed" src="images/system/dummy_profile.svg">
                            <small>John Doe</small>
                        </a>
                    </li>
                    <li>
                        <a class="d-flex flex-column" href="#">
                            <img class="profile_img_feed" src="images/system/dummy_profile.svg">
                            <small>John Doe</small>
                        </a>
                    </li>
                    <li>
                        <a class="d-flex flex-column" href="#">
                            <img class="profile_img_feed" src="images/system/dummy_profile.svg">
                            <small>John Doe</small>
                        </a>
                    </li>
                    <li>
                        <a class="d-flex flex-column" href="#">
                            <img class="profile_img_feed" src="images/system/dummy_profile.svg">
                            <small>John Doe</small>
                        </a>
                    </li>

                </ul>


            </div>
        </div>
    </div>


</div>

</body>

</html>