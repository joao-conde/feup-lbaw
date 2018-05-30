<span id="count_messages" class="d-none">{{$count}}</span>
@foreach($messages as $message)
    @include('layouts.header.partials.message', ['message'=>$message])
@endforeach