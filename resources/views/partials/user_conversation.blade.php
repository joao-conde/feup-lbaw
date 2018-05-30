<div class="chat_dropdown row {{$friend->online ? "online" : "offline" }} ml-2 justify-content-between pr-4" data-toggle="collapse" href="{{"#user_".$friend->id}}" role="button"
    aria-expanded="false" aria-controls="chatWindow">
    <div class="col">
        <img src="{{ User::getUserIconPicturePath($friend->id) }}" class="mr-2 profile_img_chat">
        <small class="text-secondary">{{$friend->name}}</small>
    </div>
    <div class="col-2">
        <?php 
                
            $unreadMessages = 0;
            foreach (Auth::user()->unreadMessages() as $unreadMessage) {
                
                if($unreadMessage->creatorid == $friend->id) {
                   $unreadMessages = $unreadMessage->numberofmessages;
                }
            }
                
        ?>

        @if($unreadMessages > 0)
        <span class="badge badge-primary align-middle newMessages">{{$unreadMessages}}</span>
        @else
        <span class="badge badge-primary align-middle d-none newMessages">{{$unreadMessages}}</span>
        @endif

        
    </div>
</div>

<div class="collapse collapse-messages" id="{{"user_".$friend->id}}">
    <div class="card card-body rounded-0 p-0 m-0 chats">
        <div class="container pr-0 messagesList">
            <?php $messages =  $user->friendMessages($friend->id) ?>
            @for($i = count($messages)-1; $i >= 0; $i--)
                @include('partials.message',['message' => $messages[$i]])
            @endfor
        </div>
    </div>

    <div class="container">
        <form class="row form-inline sendMessageForm">
            <p class="d-none friendId">{{$friend->id}}</p>
            <img src="{{ Auth::user()->getProfilePicturePath() }}" class="m-2 profile_img_chat">
            <textarea required class="col form-control mr-1 not_resizable messageInput" cols="25" rows="1"></textarea>
            <button type="submit" class="sendMessageButton col-auto form-control btn btn-sm btn-primary">
                <i class="fas fa-arrow-right"></i>
            </button>
        </form>
    </div>

</div>