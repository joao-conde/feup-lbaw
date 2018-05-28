<button class="follow_unfollow btn {{$isFollowing ? 'btn-danger unfollow' : 'btn-success follow'}}"> 
    <span class="btn_follow_label">
        {{ $isFollowing ? 'Unfollow' : 'Follow'}}
        {{ ($followType == 'band') ? ' Band': ''}}
    </span>
    <span class="d-none userOrBandId {{ ($followType == 'user') ? 'isUser' : 'isBand' }}">{{$userOrBandToFollowId}}</span>
</button>