<li class="list-group-item d-flex rounded">
    <img src= "{{Band::getBandIconPicturePath($result->band_id)}}" class="profile">
    <ul class="list-group col-10 align-self-center">
        <li class="list-group-item border-0 py-0 my-0">
            <div class="row justify-content-between">
            <a href="{{route('band_profile', [$result->band_id])}}" class="list-group-item-text col-7 text-primary">{{$result->name}}</a>


            @if($result->band_id != Auth::user()->id)
            
            @include('partials.followbutton', ['followType' => 'band','isFollowing' => $result->is_following, 'userOrBandToFollowId' => $result->band_id])

            @endif
            </div>
        </li>
        @if(property_exists($result, "complement") && $result->complement != '')
        
            <li class="list-group-item border-0 py-0 my-0">
                <small>
                    <span class="list-group-item-text">{{$result->complement}}</span>
                </small>
            </li>
        @endif

    </ul>
</li>