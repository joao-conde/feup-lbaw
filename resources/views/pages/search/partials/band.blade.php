<li class="list-group-item d-flex rounded">
    <img src= "{{Band::getBandIconPicturePath($result->id)}}" class="profile">
    <ul class="list-group col-10 align-self-center">
        <li class="list-group-item border-0 py-0 my-0">
            <div class="row justify-content-between">
            <a href="{{route('profile', [$result->id])}}" class="list-group-item-text col-7 text-primary">{{$result->name}}</a>


            @if($result->id != Auth::user()->id)
            
            @include('partials.followbutton', ['followType' => 'band','isFollowing' => $result->isfollowing, 'userOrBandToFollowId' => $result->id])

            @endif
            </div>
        </li>

    </ul>
</li>