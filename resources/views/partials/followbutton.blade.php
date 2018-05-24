@if($isFollowing)

    @if($followType == 'user')
    <button class="follow_unfollow btn btn-danger unfollow"> 
        <span class="btn_follow_label">Unfollow</span>
        <span class="d-none userOrBandId isUser">{{$userOrBandToFollowId}}</span>
    </button>
    @else
    <button class="follow_unfollow btn btn-danger unfollow"> 
        <span class="btn_follow_label">Unfollow Band</span>
        <span class="d-none userOrBandId isBand">{{$userOrBandToFollowId}}</span>
    </button>
    @endif


@else
    @if($followType == 'user')
    <button class="follow_unfollow btn btn-success follow"> 
        <span class="btn_follow_label">Follow</span> 
        <span class="d-none userOrBandId isUser">{{$userOrBandToFollowId}}</span>
    </button>
    @else
    <button class="follow_unfollow btn btn-success follow">
         <span class="btn_follow_label">Follow Band</span> 
         <span class="d-none userOrBandId isBand">{{$userOrBandToFollowId}}</span>
    </button>
    @endif

@endif