<div class="d-block">
                    
    <img class="profile_img_feed" src="{{User::getUserIconPicturePath($member->userid)}}">
    <a href="{{'/users/'.$member->userid}}">
        <small class="{{$member->pending == false ? 'text-primary' : 'text-secondary'}}">
            {{$member->membername}}
        </small>
    </a>

    @if($member->owner == true)
    <small class="ml-1">f</small>
    @endif 
    
    @if($member->pending == true)
    <small class="ml-1">p</small>
    <span class="pending_member d-none">{{$member->userid}}</span>
    @endif 
    
    @if($isFounder && !$member->owner)

        @if($member->pending == true)
        <span class="col-2 clickable remove_invite_button">
                <span id="userId" class="d-none">{{$member->userid}}</span>
                <i class="fas fa-times text-danger"></i>
        </span>
        @endif

        @if($member->pending == false)
        <span class="col-2 clickable remove_member_button">
            <span id="memberId" class="d-none">{{$member->userid}}</span>
            <i class="fas fa-times text-danger"></i>
        </span>
        @endif
    
    @endif

</div>