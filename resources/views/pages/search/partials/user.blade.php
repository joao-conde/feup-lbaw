<li class="list-group-item d-flex rounded">
    <img src="images/system/dummy_profile.svg" class="profile">
    <ul class="list-group col-10 align-self-center">
        <li class="list-group-item border-0 py-0 my-0">
            <div class="row">
            <a href="{{route('profile', [$result->id])}}" class="list-group-item-text col-7 text-primary">{{$result->name}}</a>

                @include('partials.followbutton', ['isFollowing' => $result->isfollowing, 'userToFollowId' => $result->id])

            </div>
        </li>
        <li class="list-group-item border-0 py-0 my-0">
            <small>
                <span class="list-group-item-text">{{$result->city.', '.$result->country.'.'}}</span>
            </small>
        </li>
    </ul>
</li>