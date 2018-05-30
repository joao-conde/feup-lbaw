
@extends('layouts.profile_layout') @section('leftmenumobile')

<link href="{{ asset('css/feed.css') }}" rel="stylesheet">
<link href="{{ asset('css/profile.css') }}" rel="stylesheet">
<link href="{{ asset('css/utils.css') }}" rel="stylesheet">
<link href="{{ asset('css/newband.css') }}" rel="stylesheet">

<script defer src="{{ asset('js/toggleChat.js')}}"></script>
<script defer src="{{ asset('js/editBandPage.js')}}"></script>
<script defer src="{{ asset('js/post.js')}}"></script> @include('partials.leftmenumobile') @endsection @section('logged_content')

<p class="d-none" id="bandId">{{$band->id}}</p>
<p id="posts_page_type" class="d-none">band</p>


<div class="toggleContent">

    <div class="no-gutters">

        <div id="profile_area" class="col-12 col-md-9 col-lg-9">
            <div class="jumbotron p-4 mb-1">

                <div id="username" class="row px-3 justify-content-center">
                    <div class="col-auto align-self-center">
                        <img src="{{asset('images/system/band-icon.svg')}}" class="profile_type">
                    </div>

                    <div class="col-11 align-self-center">

                        <h3 class="d-inline-block">{{$band->name}}</h3>
                    </div>
                </div>

                <div id="profile_pic_div" class="row">

                    <div class="col-auto">

                        <img id="profile_pic" class="profile_image d-block my-3" src="{{$band->getProfilePicturePath()}}" alt="Profile Image"> @include('partials.followbutton', ['followType' => 'band','isFollowing' => $band->isFollowing(Auth::user()->id),
                        'userOrBandToFollowId'=> $band->id])

                    </div>

                    <div class="col-12 col-lg-7 p-3 align-self-start text-justify">

                        <div class="row p-2">
                            <p class="text-primary">{{$band->bio}}</p>
                        </div>

                        <hr class="mt-0">

                        <div id="skills_list" class="row justify-content-center p-2">
                            @foreach($band['genres'] as $genre)
                            <p class="d-none">{{$genre->id}}</p>
                            <p class="mr-4 d-inline">
                                <i>{{$genre->name}}</i>
                            </p>
                            @endforeach
                        </div>

                        <div class="row justify-content-center p-2">
                            <div class="col-auto align-self-center">
                                @if($roundedRate > 0) @for($i = 0; $i
                                    < $wholeRate; $i++) <span class="mt-1 text-primary fullstar">
                                        <i class="fas fa-star"></i>
                                    </span>
                                    @endfor @if($decimalRate > 0)
                                    <span class="mt-1 text-primary halfstar">
                                        <i class="fas fa-star-half"></i>
                                    </span>
                                    @endif @for($i = $wholeRate; $i
                                        < 5; $i++) <span class="mt-1 text-primary emptystar">
                                            <i class="far fa-star"></i>
                                        </span>
                                        @endfor @endif

                                        <small class="m-1 text-info">{{$roundedRate > 0 ? $roundedRate : "Not rated yet"}}</small>
                                    </div>

                                </div>



                                <div id="bios">
                                    <ul class="row p-2 mt-2 justify-content-center">
                                        <li>@if($location != '')
                                            <i>{{$location}}, {{$country}}</i>
                                            @endif
                                        </li>
                                        <li>
                                            <small>Founded on
                                                <i>{{date('Y',strtotime($band->creationdate))}}</i>
                                                <p class="d-inline"> by
                                                    <a class="text-primary" href={{ "/users/".$band[ 'founders'][0]->userid}}>{{$band['founders'][0]->membername}}</p>
                                                    </a>
                                                    @if(count($band['founders']) > 2) @for($i = 1; $i
                                                        < count($band[ 'founders'])-1; $i++) , <a class="text-primary" href={ { "/users/".$band[ 'founders'][$i]->userid}}></i> {{$band['founders'][$i]->membername}}</i>
                                                        </a>
                                                        @endfor and
                                                        <a class="text-primary" href={ { "/users/".$band[ 'founders'][count($band[ 'founders'])-1]->userid}}></i> {{$band['founders'][count($band['founders'])-1]->membername}}</a>
                                                        @endif
                                                    </small>

                                                </li>
                                            </ul>
                                        </div>



                                    </div>

                                </div>

                                <hr>

                                <div id="navprofile" class="row p2 justify-content-center border-top">

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

                            <div id="members" class="jumbotron p-3 mr-2">
                                <h4>Members</h4> 
                                
                                @foreach($members as $member)

                                @include('pages.band.band_members', [$member, $isFounder])
                            
                                @endforeach 
                                
                                @if($isFounder)

                                <div class="autocomplete" id="inviteMember">
                                    <input id="band_members" placeholder="Invite member..." type="text" name="name" autocomplete="off">
                                </div>
                                <div class="collapse show" id="new_members">
                                </div>


                                <hr>
                                <div id="concerts">
                                    <h4>Scheduled Concerts</h4>
                                    <div id="scheduled_concerts">
                                        @foreach($concerts as $concert) 
                                        @include('partials.concert',[$concert]) 
                                        @endforeach
                                    </div>


                                    <h5 class="m-0 mt-3 text-primary">New concert</h5>

                                    <div class="text-left">

                                        <div class="new_concert d-block">
                                            <input type="text" id="description" name="description" class="mt-1 w-75" placeholder="Short description"></input>
                                            <input id="date" name="date" type="date" class="mt-1 w-75" placeholder="Date" required></input><br>
                                            <i id="location" class="mt-1 w-75">Location</i><br>
                                            <button type="button" class="mt-1 btn btn-sm btn-primary w-75 dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" required>
                                                Edit Location
                                            </button>
                                            <span class="d-none" id="location_id"></span>
                                            <div class="dropdown-menu dropdown-menu-left p-3 bg-secondary">
                                                @foreach($cities as $city)
                                                @include('partials.location')
                                                @endforeach
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-primary mt-1 w-50" id="schedule_button">Schedule</button>
                                        <br><p class="" id="schedule_error" style="display: none;">Error: Invalid concert scheduling.</p>
                                    </div>
                                </div>
                                @endif


                            </div>

                        </div>

                        <div class="col-12 col-md-9 col-lg-6">

                            <div id="center_content" class="toggleContent">

                                @if($band->isMember(Auth::user()->id))
                                <?php $bandNewPost = true ?> @include('partials.new_post',[$bandNewPost]) @endif

                                <div id="posts">
                                    @foreach($band['posts'] as $post) @include('partials.post') @endforeach
                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                @endsection