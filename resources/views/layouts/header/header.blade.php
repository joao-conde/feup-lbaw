<link href="{{ asset('css/header.css') }}" rel="stylesheet">


<div class="row justify-content-between p-2">

    <div id="logo" class="col-5 col-md-4 col-lg-3 p-0 pl-1 align-self-center mr-1 order-md-1">

        <div class="row justify-content-start">

            <div class="col-auto pr-0 align-self-center">

                <img src="{{ asset('images/system/logo_white.svg') }}" class="logo">
                

            </div>

            <div class="col-8 align-self-center pl-2 pr-0">

                <h1 class="h4">Music Box</h1>
            </div>

        </div>

    </div>

    <div id="mobileToggle2" class="col-auto align-self-center d-md-none p-0" data-toggle="collapse" data-target="#searchbar">

        <img class="search" src="images/system/search_icon.svg">

    </div>

    <div id="fixedNavBar" class="col-5 col-md-3 col-lg-3 align-self-center order-md-3">

        <div class="row justify-content-end">

            @if(false) <!-- if user is logged in -->
                @include('layouts.header.fixednavbar')
            @endif

        </div>

    </div>

    <div id="searchbarHeader" class="col-12 col-md-4  order-last align-self-center order-md-2">

        <div class="row">

            @if(false) <!-- if user is logged in -->
                @include('layouts.header.searchbar')
            @endif

        </div>

    </div>


    <div id="navBar" class="col-12 col-md-2 order-last align-self-center order-md-4 d-md-none">

        <div class="row">

             @include('layouts.header.navbar')

        </div>

    </div>

</div>