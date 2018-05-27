@extends('layouts.logged_user') 

@section('leftmenumobile')
<link href="{{ asset('css/feed.css') }}" rel="stylesheet">
<script defer src="{{ asset('js/toggleChat.js')}}"></script>

@include('partials.leftmenumobile')

@endsection 

@section('logged_content') 

@include('partials.leftfeedmenu')


<div id="search_results" class="col-12 col-md-6 p-0 mt-2 toggleContent">

    
    <div class="jumbotron p-3 mb-2 justify-content-center d-flex">
        
        <ul class="list-group col-12">
                {{-- {{ print_r($results) }} --}}
            <h3 class="text-primary text-center">{{$title}}</h3>
            
            <div id="div_results">
                <div id="list_bands_by_genre_result">
                    {{-- {{ print_r($results) }} --}}
                    @if(count($results) > 0)
                        @foreach($results as $result)
                            @include('layouts.list_page_item', ['result' => $result])
                        @endforeach
                    @else
                        <h4 class="text-secondary text-center mt-3">No results found!</h4>
                    @endif
                </div>
            </div>
            
            


        </ul>
    </div>

</div>


@endsection