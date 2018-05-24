@extends('layouts.logged_user')

@section('leftmenumobile')
    <link href="{{ asset('css/feed.css') }}" rel="stylesheet">
    <link href="{{ asset('css/forms.css') }}" rel="stylesheet">
    <link href="{{ asset('css/utils.css') }}" rel="stylesheet">
    <script defer src="{{ asset('js/followers.js') }}"></script>

    @include('partials.leftmenumobile')

@endsection

@section('logged_content')

    @include('partials.leftfeedmenu')

    <script defer src="{{ asset('js/newBand.js')}}"></script>
    <link href="{{ asset('css/newband.css') }}" rel="stylesheet">

    <div id="center_content" class="col-12 col-md-6 p-0 mt-2">

        <div class="jumbotron text-center bg-primary mt-4">
            <h2 class="">New Band</h2>
            <form method="POST" action="{{ route('do_create_band') }}" autocomplete="off" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row justify-content-center">
                    <div class="form-group mt-4 border border-top-0 border-left-0 border-right-0 border-secondary">
                        <i class="fas fa-heading mr-2 form-icon"></i>
                        <input type="text" class="border-0 text-center" id="band_name"
                            placeholder="Enter Band Name" name="name" required>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="autocomplete form-group mt-4 border border-top-0 border-left-0 border-right-0 border-secondary">
                            <i class="fas fa-user mr-2 form-icon clickable" data-toggle="collapse" href="#new_members" role="button"
                            aria-expanded="true" aria-controls="new_members"></i>
                        <input type="text" class="border-0 text-cemer" id="band_members"
                            placeholder="Enter Band Members" name="members">
                    </div>
                </div>
                <div class="collapse show" id="new_members">
                </div>
                <select id="selectNewMember" name="selectNewMember[]" multiple class="d-none">
                </select>
                <div class="row justify-content-center">
                    <div class="form-group mt-4 border border-top-0 border-left-0 border-right-0 border-secondary">
                        <i class="fas fa-music mr-2 form-icon"></i>
                            <div class="btn-group mx-4">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Select Genres
                                </button>
                                <div id="new_genres_list" class="dropdown-menu dropdown-menu-left col-12 p-2 bg-secondary">
                                    
                                    @foreach($genres as $genre)
                                    <div class="input-group m-0 row justify-content-between">
                                        <label for="{{"genre_cb_".$genre->id}}" class="col-auto text-black"><small>{{$genre->name}}</small></label>
                                        <div class="input-group-append col-auto">
                                            <div class="input-group-text p-0 bg-secondary border-0">
                                                <input id="{{"genre_cb_".$genre->id}}" name="genres[]" value="{{$genre->id}}" type="checkbox" aria-label="Checkbox for following text input">
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    
                                </div>
                            </div>  
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="form-group mt-4 border border-top-0 border-left-0 border-right-0 border-secondary">
                       <textarea placeholder="Enter band biography" class="col-9 col-sm-10 col-md-9 col-lg-10 text-primary bg-secondary form-control-sm border border-secondary"
                        rows="8" cols="25" id="band_bio" name="bio"></textarea>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-4 form-group mt-4 border border-top-0 border-left-0 border-right-0 border-secondary p-0">
                        <i class="far fa-image mr-2 form-icon align-bottom mb-2"></i>
                        <input type="file" class="border-0 text-center d-none" id="band_img_input"
                            placeholder="Enter Band Name" name="band_img">
                        <button type="button" id="btnBandPic" class="btn btn-primary">Select Picture</button>
                        <img id="band_img" src="" alt="Band img" class="d-none" width="100%">
                    </div>
                </div>
                <button type="submit" class="btn btn-secondary mt-3">Submit</button>
            </form>
        </div>

    </div>

@endsection