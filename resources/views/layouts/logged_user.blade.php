@extends('layouts.app')

@section('content')

<div class="main_content container-fluid">
        {{-- @include('partials.leftmenumobile') --}}

    @yield('leftmenumobile')

    <div id="main" class="row justify-content-center p-0 p-md-2 pt-md-0">

        @yield('logged_content')

        @include('partials.chat',['user' => Auth::user()])


    </div>

</div>
@endsection