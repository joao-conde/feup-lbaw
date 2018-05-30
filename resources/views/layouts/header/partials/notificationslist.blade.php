<span id="count_notifications" class="d-none">{{$count}}</span>
@foreach($notifications as $notification)
    @include('layouts.header.partials.notification', ['notification'=>$notification])
@endforeach