@extends('layouts.app')
{{-- 
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}

@section('content')

<link href="styles/forms.css" rel="stylesheet">
{{-- <div class="container text-center m-0 mt-1">
    <video autoplay muted loop id="myVideo">
        <source src="images/668357526.mp4" type="video/mp4">
        Your browser does not support HTML5 video.
    </video>
</div> --}}

<div class="container-fluid main_form">
    <div class="row justify-content-center mt-5">
        <div class="col-sm-4">
            <div class="jumbotron text-center bg-primary">
                <h2>Login</h2>
                <form method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}
                    <div class="row justify-content-center">
                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }} mt-4 border border-top-0 border-left-0 border-right-0 border-secondary">
                            <i class="fas fa-user mr-2" style="width: 1rem; height: 1rem; color: white;"></i>
                            <input type="text" class="border border-top-0 border-bottom-0 border-left-0 border-right-0" id="usrnm" placeholder="Enter username" name="username">
                            @if ($errors->has('username'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('username') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} mt-4 border border-top-0 border-left-0 border-right-0 border-secondary">
                            <i class="fas fa-lock mr-2" style="width: 1rem; height: 1rem; color: white;"></i>
                            <input type="password" class="border border-top-0 border-bottom-0 border-left-0 border-right-0" id="pwd" placeholder="Enter password" name="password">
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    {{-- <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-8 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                Login
                            </button>

                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                Forgot Your Password?
                            </a>
                        </div>
                    </div>
                    <div class="form-check mt-4">
                        <label class="form-check-label">
                            <input class="form-check-input" type="checkbox" name="remember"> Remember me
                        </label>
                    </div>		    	 --}}
                    <button type="submit" class="btn btn-secondary m-4">Login</button>
                    {{-- <a href="./feed_jp.php" class="btn btn-secondary m-4">Login</a> --}}
                </form>
                <div class="row justify-content-center">
                    <p class="text-secondary">Do not have account? Register <a href="{{url("/register")}}"> Here</a>!</p>
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection
