@extends('layouts.app')

@section('content')

<link href="{{ asset('css/forms.css') }}" rel="stylesheet">

<script type="text/javascript">
    let pass1 = document.querySelector('#pass1');
    let pass2 = document.querySelector('#pass2');
    let pass_error = document.querySelector('#pass_error');

    if(pass1 != pass2){
        pass_error.display = inline;
    }
</script>

<div class="container-fluid main_form">
    <div class="row justify-content-center mt-5">
        <div class="col-sm-4">
            <div class="jumbotron text-center bg-primary">
                <h2>Reset Password</h2>
                <form method="POST" action="{{ route('update_pass') }}">
                    {{ csrf_field() }}
                    <div class="row justify-content-center">
                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }} mt-4 border border-top-0 border-left-0 border-right-0 border-secondary">
                            <i class="fas fa-user mr-2" style="width: 1rem; height: 1rem; color: white;"></i>
                            <input type="text" class="border border-top-0 border-bottom-0 border-left-0 border-right-0 text-center" id="usrnm" placeholder="Enter username" name="username">
                            @if ($errors->has('username'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('username') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="form-group{{ $errors->has('pass') ? ' has-error' : '' }} mt-4 border border-top-0 border-left-0 border-right-0 border-secondary">
                            <i class="fas fa-user mr-2" style="width: 1rem; height: 1rem; color: white;"></i>
                            <input type="password" class="border border-top-0 border-bottom-0 border-left-0 border-right-0 text-center" id="pass1" placeholder="Enter password" name="pass1" pattern="(?=.*[-_?!@#+*$%&/()=])(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,32}" title="Must have 8 to 32 characters, including 1 lowercase and 1 uppercase, 1 number and 1 of the following -_?!@#+*$%&/()=">
                            @if ($errors->has('pass'))
                            <span class="help-block">
                                <strong>{{ $errors->first('pass') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="form-group{{ $errors->has('pass') ? ' has-error' : '' }} mt-4 border border-top-0 border-left-0 border-right-0 border-secondary">
                            <i class="fas fa-user mr-2" style="width: 1rem; height: 1rem; color: white;"></i>
                            <input type="password" class="border border-top-0 border-bottom-0 border-left-0 border-right-0 text-center" id="pass2" placeholder="Confirm password" name="pass2" pattern="(?=.*[-_?!@#+*$%&/()=])(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,32}" title="Must have 8 to 32 characters, including 1 lowercase and 1 uppercase, 1 number and 1 of the following -_?!@#+*$%&/()=">
                            @if ($errors->has('pass'))
                            <span class="help-block">
                                <strong>{{ $errors->first('pass') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    @foreach($errors->all() as $error)            
                        <p class="text-secondary">Error: {{ $error }}</p>
                    @endforeach
                    <p class="text-secondary d-none" id="pass_error">Error: Passwords do not match.
                    <button type="submit" class="btn btn-secondary m-4">Confirm</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection