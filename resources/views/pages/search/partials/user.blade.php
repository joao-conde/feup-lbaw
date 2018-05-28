<li class="list-group-item d-flex rounded">
    <img src="{{User::getUserIconPicturePath($result->user_id)}}" class="profile">
    <ul class="list-group col-10 align-self-center">
        <li class="list-group-item border-0 py-0 my-0">
            <div class="row justify-content-between">
            <a href="{{route('profile', [$result->user_id])}}" class="list-group-item-text col-7 text-primary">{{$result->name}}</a>


            @if($result->user_id != Auth::user()->id)
            
                @include('partials.followbutton', ['followType' => 'user','isFollowing' => $result->is_following, 'userOrBandToFollowId' => $result->user_id])

            @endif
            </div>
        </li>
        @if(property_exists($result, "complement") && $result->complement != '')


            <li class="list-group-item border-0 py-0 my-0">
                <small>
                    <span class="list-group-item-text mr-1">
                        {{$result->complement}}
                    </span>
                    @if(property_exists($result, "stars"))
                        @for($i = 0; $i<5; $i++)

                            @if($i < $result->stars)
                                <i class="fas fa-star" style="margin-right: -3px;"></i>
                            @else
                                <i class="far fa-star" style="margin-right: -3px;"></i>
                            @endif
                        @endfor
                    @endif
                </small>
            </li>
        @endif

    </ul>
</li>