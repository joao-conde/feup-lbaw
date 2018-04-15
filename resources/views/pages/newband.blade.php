@extends('layouts.app')
@section('content')

<link href="{{ asset('css/feed.css') }}" rel="stylesheet">
<link href="{{ asset('css/forms.css') }}" rel="stylesheet">
<script defer src="{{ asset('js/followers.js') }}"></script>

<div class="container-fluid">
    @include('partials.leftmenumobile')


  <div id="main" class="row justify-content-center">

    <div id="leftfeedmenu" class="py-3 card bg-light rounded-0 col-2 d-none d-md-block">

      @include('partials.leftfeedmenu')

    </div>

    <div id="posts" class="col-12 col-md-6 p-0 mt-2">

      <div class="jumbotron text-center bg-primary mt-4">
            <h2 class="">New Band</h2>
            <form method="POST" action="{{ route('do_create_band') }}">
                {{ csrf_field() }}
                <div class="row justify-content-center">
                    <div class="form-group mt-4 border border-top-0 border-left-0 border-right-0 border-secondary">
                        <i class="fas fa-heading mr-2 form-icon"></i>
                        <input type="text" class="border-0 text-center" id="band_name"
                            placeholder="Enter Band Name" name="name">
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="form-group mt-4 border border-top-0 border-left-0 border-right-0 border-secondary">
                        <i class="fas fa-user mr-2 form-icon"></i>
                        <input type="text" class="border-0 text-cemer" id="band_members"
                            placeholder="Enter Band Members" name="members">
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="form-group mt-4 border border-top-0 border-left-0 border-right-0 border-secondary">
                        <i class="fas fa-music mr-2 form-icon"></i>
                        <input type="password" class="border-0 text-cemer" id="genders"
                            placeholder="Select Genders" name="genders">
                    </div>
                </div>
                <button type="submit" class="btn btn-secondary mt-3">Submit</button>
            </form>
        </div>

    </div>

    <div id="chat" class="p-0 card bg-light rounded-0 col-12 col-md-3 mt-0">

        @include('partials.chat')
    </div>

  </div>

</div>
@endsection