@if($isFollowing)

    <button class="follow_unfollow btn btn-danger unfollow"> <span class="btn_follow_label">Unfollow</span> <span class="d-none userId">{{$userToFollowId}}</span></button>

@else

    <button class="follow_unfollow btn btn-success follow"> <span class="btn_follow_label">Follow</span> <span class="d-none userId">{{$userToFollowId}}</span></button>

@endif