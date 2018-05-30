@if($message->creatorid == Auth::user()->id)

<div class="row my-2 message m-0 text-right">
    <p class="d-none messageId">{{$message->id}}</p>
    <div class="col px-0">
        <small>{{$message->text}}</small>
    </div>
    <div class="col-auto px-2 mr-0">
        <a href="{{"users/".$message->creatorid}}" data-toggle="tooltip" title="{{date('d/m H:i',strtotime($message->date))}}" data-placement="left">
            <img src="{{ User::getUserIconPicturePath($message->creatorid) }}" class="profile_img_chat_window">
        </a>
    </div>
</div>
@else
<div class="row my-2 message">
        <p class="d-none messageId">{{$message->id}}</p>
        <div class="col-auto px-2">
            <a href="{{"users/".$message->creatorid}}" data-toggle="tooltip" title="{{date('d/m H:i',strtotime($message->date))}}" data-placement="left">
                <img src="{{ User::getUserIconPicturePath($message->creatorid) }}" class="profile_img_chat_window">
            </a>
        </div>
        <div class="col px-0">
            <small>{{$message->text}}</small>
        </div>
    </div>
@endif