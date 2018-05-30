<span id="count_hidden" class="d-none">{{$count}}</span>
@foreach($notifications as $notification)
    @include('layouts.header.partials.notification', ['notification'=>$notification])
@endforeach