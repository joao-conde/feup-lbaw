<link href="{{ asset('css/notifications.css') }}" rel="stylesheet">

<li class="nav-item dropdown">
    <a class="nav-link text-success pt-3 read-messages" href="#" role="button" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false">
        <i class="far fa-envelope"></i>
        <span id="message_count" class="badge badge-secondary bg-primary text-warning">@if($messagesInfo['count'] > 0) {{$messagesInfo['count']}} @endif</span>
    </a>
    <div id="messagesList" class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
        
        <h5 class=" dropdown-item text-center">Messages</h5>
        <div class="dropdown-divider"></div>
        
        <div id="messages_div">    
            @include('layouts.header.partials.messageslist', [
                'messages'=> $messagesInfo['messages'],
                'count' => $messagesInfo['count']])        
        </div>
        <div class="dropdown-divider"></div>
        <a id="see_more_messages" class="dropdown-item text-center" href="#">
            <small>See more</small>
        </a>
    </div>
</li>