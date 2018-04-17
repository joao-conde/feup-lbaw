{{-- @extends('layouts.app')

@section('content')

<div class="main_content container-fluid p-0 p-md-2">

    @yield('logged_content')

    <div id="chat" class="p-0 card bg-light rounded-0 col-12 col-md-3 mt-0">

        @include('partials.chat')

	</div>
</div>

@endsection --}}

@extends('layouts.app')

@section('content')

<div class="main_content container-fluid ">
    {{-- @include('partials.leftmenumobile') --}}

    @yield('leftmenumobile')

    <div id="main" class="row justify-content-center p-0 p-md-2 pt-md-0">

        @yield('logged_content')

        <div id="chat" class="p-0 card bg-light rounded-0 col-12 col-md-3 mt-0">

            @include('partials.chat')
        </div>

    </div>

</div>
@endsection