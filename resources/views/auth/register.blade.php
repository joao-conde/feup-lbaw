 @extends('layouts.app')

@section('content')

<link href="{{ asset('css/forms.css') }}" rel="stylesheet">

<div id="register" class="container-fluid main_form">
	<video autoplay muted loop id="myVideo">
		<source src="images/668357526.mp4" type="video/mp4"> Your browser does not support HTML5 video.
	</video>
</div>
<div class="row justify-content-center p-0 mx-0">
	<div class="col-sm-4">
		<div class="jumbotron text-center bg-primary py-5">
			<h2 class="">Register</h2>
			<form method="POST" action="{{ route('do_register') }}">
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
						 placeholder="Enter password" name="password" pattern="(?=.*[-_?!@#+*$%&/()=])(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,32}" title="Must have 8 to 32 characters, including 1 lowercase and 1 uppercase, 1 number and 1 of the following -_?!@#+*$%&/()=">
						
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
						<input type="password" class="border border-bottom-0 border-top-0 border-left-0 border-right-0 border-secondary" id="password-confirm" placeholder="Repeat password" name="password_confirmation" pattern="(?=.*[-_?!@#+*$%&/()=])(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,32}" title="Must have 8 to 32 characters, including 1 lowercase and 1 uppercase, 1 number and 1 of the following -_?!@#+*$%&/()=" required> 
					</div>
				</div>
				<div class="row justify-content-center">
					<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} mt-4 border border-top-0 border-left-0 border-right-0 border-secondary">
						<i class="far fa-user mr-2" style="width: 1rem; height: 1rem; color: white;"></i>
						<input type="text" class="border border-bottom-0 border-top-0 border-left-0 border-right-0 border-secondary" id="name" placeholder="Enter name"
                         name="name" value="{{ old('name') }}" pattern="[A-Z][a-z]*([\s][A-Z][a-z]*)*" title="Can have more than 1 name, all starting with 1 uppercase letter" required>
                         
						@if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
					</div>
				</div>
				<div class="row justify-content-center">
					<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} mt-4 border border-top-0 border-left-0 border-right-0 border-secondary">
						<i class="fas fa-envelope" style="width: 1rem; height: 1rem; color: white;"></i>
						<input type="email" class="border border-top-0 border-bottom-0 border-left-0 border-right-0 border-secondary" id="email"
						 placeholder="Enter email" name="email" value="{{ old('email') }}" required autofocus>
					
						@if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
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