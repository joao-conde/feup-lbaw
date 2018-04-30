@extends('layouts.app')
@section('content')

<link href="{{ asset('css/feed.css') }}" rel="stylesheet">
<link href="{{ asset('css/profile.css') }}" rel="stylesheet">
<script defer src="scripts/profile.js"></script>

<div class="main_content container-fluid p-0 p-md-2">

    @include('partials.leftmenumobile')


	<div class="row no-gutters">

        <div id="profile_area" class="col-12 col-md-9 col-lg-9">
            <div class="jumbotron p-3 mb-1">

                <div id="username" class="row px-3 justify-content-center">
                    <div class="col-auto align-self-center">
                        <img src="images/system/band-icon.svg" class="profile_type">
                    </div>

                    <div class="col-11 align-self-center">

                        <h3 class="d-inline-block">Future Islands</h3>
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
                                    <p class="mr-2">Rating

                                        <i class="fas fa-star mt-1 text-primary"></i>
                                        <i class="fas fa-star mt-1 text-primary"></i>
                                        <i class="fas fa-star mt-1 text-primary"></i>
                                        <i class="fas fa-star mt-1 text-primary"></i>
                                        <i class="far fa-star mt-1 text-primary"></i>
                                        <small class="mt-1 text-info">4.2</small>
                                    </p>

                                    <p class="mr-1"><i>Rock</i></p>
                                    <p class="mr-1"><i>Synthpop</i></p> 
                                    <p class="mr-1"><i>Alternative Rock</i></p> 
                                    <p class="mr-1"><i>Indie Pop</i></p>
                                    <p class="mr-1"><i>Indie Rock</i></p>
                                    

                                </div>

                            </div>
                        </div>

                        <div id="bios" class="row p-0 justify-content-center">
                            <ul>
                                <li>
                                    <small>From
                                        <i>Porto, Portugal</i>
                                    </small>
                                </li>
                                <li>
                                    <small>Founded on
                                        <i>1985</i>
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
                                <a class="nav-item col-6 nav-link btn btn-secondary text-white mr-2" href="#">Members</a>
                                <a class="nav-item col-6 nav-link btn btn-secondary text-white mr-2" href="#">Followers</a>
                            </div>
                        </div>
                    </nav>

                </div>

            </div>

        </div>

    </div>

	<div class="row no-gutters">
        <div class="col-3 d-none d-lg-block">

            <div class="jumbotron p-3 mr-2">
                <p class="align-middle">Members</p>
                <a class="d-block" href="#">
                    <img class="profile_img_feed" src="images/system/dummy_profile.svg">
                    <small class="text-primary">Gerrit Welmers</small>
                </a>
                <a class="d-block" href="#">
                    <img class="profile_img_feed" src="images/system/dummy_profile.svg">
                    <small class="text-primary">William Cashion</small>
                </a>
                <a class="d-block" href="#">
                    <img class="profile_img_feed" src="images/system/dummy_profile.svg">
                    <small class="text-primary">Samuel Herring</small>
                </a>
                <a class="d-block" href="#">
                    <img class="profile_img_feed" src="images/system/dummy_profile.svg">
                    <small class="text-primary">Michael Lowry</small>
                </a>

            </div>

        </div>

        <div class="col-12 col-md-9 col-lg-6">

            <div id="posts" class="toggleContent">

                <div class="jumbotron p-3 post mb-2" id="newpost">
                    <div class="row">
                        <img src="images/system/dummy_profile.svg" class="col-1 col-sm-2 mt-1 mr-2 mr-md-0 profile_img_chat p-0 border-0">
                        <textarea placeholder="New post..." class="col-6 col-sm-7 col-md-5 col-lg-6 mt-1 text-primary form-control-sm border border-secondary mr-0" rows="1" id="new_post_ta" style="height: 30px;"></textarea>
                        <div class="btn-group col-1 col-sm-2 col-md-1 col-lg-2" id="btns" role="group">
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
                    <div class="row justify-content-end mr-3" id="postbutton">
                        <div class="col-10"></div>
                        <input type="submit" value="post" class="btn btn-primary btn-sm col-2 pull-right justify-content-end">
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

	
	<div id="chat" class="p-0 card bg-light rounded-0 col-12 col-md-3 mt-0">

        @include('partials.chat')

	</div>
</div>

@endsection