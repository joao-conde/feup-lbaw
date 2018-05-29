@extends('layouts.app')

@section('content')

<link href="{{ asset('css/forms.css') }}" rel="stylesheet">

<div class="container text-center m-0 mt-1">
    <video autoplay muted loop id="myVideo">
        <source src="images/668357526.mp4" type="video/mp4">
            Your browser does not support HTML5 video.
        </video>
    </div>

    <div class="container-fluid main_form">
        <div class="row justify-content-center mt-5">
            <div class="col-11 col-sm-8 col-md-7 col-lg-6 col-xl-5">
                <div class="jumbotron text-center bg-primary">
                    <h2>Login</h2>
                    <form method="POST" action="{{ route('do_login') }}">
                        {{ csrf_field() }}
                        <div class="row justify-content-center">
                            <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }} mt-4 border border-top-0 border-left-0 border-right-0 border-secondary">
                                <i class="fas fa-user mr-2" style="width: 1rem; height: 1rem; color: white;"></i>
                                <input type="text" class="border border-top-0 border-bottom-0 border-left-0 border-right-0 text-center" id="usrnm" placeholder="Enter username" name="username">
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} mt-4 border border-top-0 border-left-0 border-right-0 border-secondary">
                                <i class="fas fa-lock mr-2" style="width: 1rem; height: 1rem; color: white;"></i>
                                <input type="password" class="border border-top-0 border-bottom-0 border-left-0 border-right-0 text-center" id="pwd" placeholder="Enter password" name="password">
                            </div>
                        </div>
                        @foreach($errors->all() as $error)            
                            <p class="text-secondary">Error: {{ $error }}</p>
                        @endforeach
                        <button type="submit" class="btn btn-secondary m-4">Login</button>
                    </form>
                    <div class="row justify-content-center">
                        <p class="text-secondary">Do not have account? Register <a href="{{url("/register")}}"> Here</a>!</p>
                    </div>
                    <div class="row justify-content-center">
                        <p class="text-secondary">Forgot your password? Click <a href="{{url("/email")}}"> Here</a>!</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
    
    @endsection