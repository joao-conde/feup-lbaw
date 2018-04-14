 @extends('layouts.app')

{{-- @section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

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
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
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
<link rel="stylesheet" type="text/css" href="styles/forms.css">

<!-- <div id="register" class="container-fluid main_form">
	<video autoplay muted loop id="myVideo">
		<source src="images/668357526.mp4" type="video/mp4"> Your browser does not support HTML5 video.
	</video>
</div> -->
<div class="row justify-content-center p-0 mx-0">
	<div class="col-sm-4">
		<div class="jumbotron text-center bg-primary py-5">
			<h2 class="">Register</h2>
			<form method="POST" action="{{ route('register') }}">
				{{ csrf_field() }}
				<div class="row justify-content-center">
					<div class="form-group{{ $errors->has('username') ? ' has-error' : '' }} mt-4 border border-top-0 border-left-0 border-right-0 border-secondary">
						<i class="fas fa-user mr-2" style="width: 1rem; height: 1rem; color: white;"></i>
						<input type="text" class="border border-top-0 border-bottom-0 border-left-0 border-right-0 border-secondary" id="username"
						 placeholder="Enter username" name="username" value="{{ old('username') }}" required autofocus>
					
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
						<input type="password" class="border border-top-0 border-left-0 border-bottom-0 border-right-0 border-secondary" id="password"
						 placeholder="Enter password" name="password">
						
						 @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
					 </div>
				</div>
				<div class="row justify-content-center">
					<div class="form-group mt-4 border border-top-0 border-left-0 border-right-0 border-secondary">
						<i class="fas fa-lock mr-2" style="width: 1rem; height: 1rem; color: white;"></i>
						<input type="password" class="border border-bottom-0 border-top-0 border-left-0 border-right-0 border-secondary" id="password-confirm"
						 placeholder="Repeat password" name="password_confirmation" required> 
					</div>
				</div>
				<div class="row justify-content-center">
					<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} mt-4 border border-top-0 border-left-0 border-right-0 border-secondary">
						<i class="far fa-user mr-2" style="width: 1rem; height: 1rem; color: white;"></i>
						<input type="text" class="border border-bottom-0 border-top-0 border-left-0 border-right-0 border-secondary" id="name" placeholder="Enter name"
                         name="name" value="{{ old('name') }}" required>
                         
						@if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
					</div>
				</div>
				<button type="submit" class="btn btn-secondary mt-3">Submit</button>
			</form>
		</div>
	</div>
</div>

@endsection