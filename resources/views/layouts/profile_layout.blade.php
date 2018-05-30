@extends('layouts.app')

@section('content')


<div class=" container-fluid">
        @yield('leftmenumobile')
</div>

<div class="main_content container-fluid p-0 p-md-2">

        @yield('logged_content')
        @include('partials.chat',['user' => Auth::user()])

</div>
@endsection