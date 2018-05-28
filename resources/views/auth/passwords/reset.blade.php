@extends('layouts.app')

@section('content')

<link href="{{ asset('css/forms.css') }}" rel="stylesheet">

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
                            <input type="password" class="border border-top-0 border-bottom-0 border-left-0 border-right-0 text-center" id="pass1" placeholder="Enter password" name="pass1">
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
                            <input type="password" class="border border-top-0 border-bottom-0 border-left-0 border-right-0 text-center" id="pass2" placeholder="Confirm password" name="pass2">
                            @if ($errors->has('pass'))
                            <span class="help-block">
                                <strong>{{ $errors->first('pass') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <button type="submit" class="btn btn-secondary m-4">Confirm</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection