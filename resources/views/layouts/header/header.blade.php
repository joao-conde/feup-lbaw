<link href="{{ asset('css/header.css') }}" rel="stylesheet">


<div class="row justify-content-between p-2">

    <div id="logo" class="col-5 col-md-4 col-lg-3 p-0 pl-1 align-self-center mr-1 order-md-1">

        <div class="row justify-content-start" onclick="location.href='/';" style="cursor:pointer;">

            <div class="col-auto pr-0 align-self-center">

                <img src="{{ asset('images/system/logo_white.svg') }}" class="logo">
            
            </div>

            <div class="col-8 align-self-center pl-2 pr-0">

                <h1 class="h4">Music Box</h1>
            </div>

        </div>

    </div>

    @auth <!-- if user is logged in -->

        @include('layouts.header.authheader')

    @else

        @include('layouts.header.guestheader')
        
    @endauth


</div>