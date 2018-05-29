@extends('layouts.app')

@section('content')

<link href="{{ asset('css/forms.css') }}" rel="stylesheet">

<div class="container-fluid main_form">
    <div class="row justify-content-center mt-5">
        <div class="col-sm-4">
            <div class="jumbotron text-center bg-primary">
                <h2>Reset Password</h2>
                <form method="POST" action="{{ route('send_email') }}">
                    {{ csrf_field() }}
                    <div class="row justify-content-center">
                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }} mt-4 border border-top-0 border-left-0 border-right-0 border-secondary">
                            <i class="fas fa-user mr-2" style="width: 1rem; height: 1rem; color: white;"></i>
                            <input type="text" class="border border-top-0 border-bottom-0 border-left-0 border-right-0 text-center" id="usrnm" placeholder="Enter username" name="username">
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} mt-4 border border-top-0 border-left-0 border-right-0 border-secondary">
                            <i class="fas fa-user mr-2" style="width: 1rem; height: 1rem; color: white;"></i>
                            <input type="email" class="border border-top-0 border-bottom-0 border-left-0 border-right-0 text-center" id="email" placeholder="Enter email" name="email">
                        </div>
                    </div>
                    @foreach($errors->all() as $error)            
                        <p class="text-secondary">Error: {{ $error }}</p>
                    @endforeach
                    <button type="submit" class="btn btn-secondary m-4">Send Password Reset Link</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
