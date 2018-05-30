    <div class="chat_dropdown_band clickable row ml-2 justify-content-between pr-4" data-toggle="collapse" href="{{"#band".$band->id}}" role="button"
        aria-expanded="false" aria-controls="chatWindow">
        <div class="col">
            <img src="{{ Band::getBandIconPicturePath($band->id) }}" class="mr-2 profile_img_chat">
            <small class="text-secondary">{{$band->name}}</small>

        </div>
        <div class="col-2">

            <?php 
            
            $unreadMessages = 0;
            foreach ($user->getBandUnreadMessages($band->id) as $unreadMessage) {
                
                if($unreadMessage->bandid == $band->id) {
                    $unreadMessages = $unreadMessage->numberofmessages;
                }
            }
                    
            ?>

            @if($unreadMessages > 0)
            <span class="badge badge-primary align-middle newMessagesBand">{{$unreadMessages}}</span>
            @else
            <span class="badge badge-primary align-middle d-none newMessagesBand">{{$unreadMessages}}</span>
            @endif

        </div>
    </div>

    <div class="collapse" id="{{"band".$band->id}}">
        <div class="card card-body rounded-0 p-0 m-0 chats">
            <div class="container pr-0 messagesListBand">
                <?php $messages =  $user->getBandMessages($band->id) ?>
                @for($i = count($messages)-1; $i >= 0; $i--)
                    @include('partials.message',['message' => $messages[$i]])
                @endfor
            </div>
        </div>

        <div class="container">
            <form class="row form-inline sendBandMessageForm">
                <p class="d-none bandId">{{$band->id}}</p>
                <img src="{{ Auth::user()->getProfilePicturePath() }}" class="m-2 profile_img_chat">
                <textarea class="messageInput col not_resizable form-control mr-1" name="Chat message" id="chat_msg1" cols="25" rows="1"></textarea>
                <button type="submit" class="sendMessageButton col-auto form-control btn btn-sm btn-primary">
                    <i class="fas fa-arrow-right"></i>
                </button>
            </form>
        </div>

    </div>