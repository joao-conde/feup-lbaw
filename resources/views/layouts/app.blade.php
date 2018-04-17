<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link href="https://maxcdn.bootstrapcdn.com/bootswatch/4.0.0-beta.3/flatly/bootstrap.min.css" rel="stylesheet" integrity="sha384-+lmTKXkS+c9d34U9obDdGOZT7zqFicJDkhckYYsW7oenXR37T2OEV4uqfUO45M87" crossorigin="anonymous">
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        
    <script defer src= "{{ asset('js/utils.js') }}"></script>
    <script defer src= "{{ asset('js/followUser.js') }}"></script>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'MusicBox') }}</title>

    </head>
<body>
    <header id="header" class="container-fluid bg-primary text-white">
        <span id="user_id_span" class="d-none">{{Auth::user()->id}}</span>

        <!-- <h1><a href="{{ url('/cards') }}">Thingy!</a></h1>
          @if (Auth::check())
          <a class="button" href="{{ url('/logout') }}"> Logout </a> <span>{{ Auth::user()->name }}</span>
          @endif -->
        @include('layouts.header.header')
      </header>
      <section id="content">
        @yield('content')
      </section>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
