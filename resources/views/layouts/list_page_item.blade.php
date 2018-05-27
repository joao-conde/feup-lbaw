<li class="list-group-item d-flex rounded">
    @if(property_exists($result, "user_id"))
        <img src="{{User::getUserIconPicturePath($result->user_id)}}" class="profile">
        <?php $id = $result->user_id ?>
    @elseif(property_exists($result, "band_id"))
        <img src="{{Band::getBandIconPicturePath($result->band_id)}}" class="profile">
        <?php $id = $result->band_id ?>
    @endif
    <ul class="list-group col-10 align-self-center">
        <li class="list-group-item border-0 py-0 my-0">
            <div class="row justify-content-between">
            <a href="{{route($route, [$id])}}" class="list-group-item-text col-7 text-primary">{{$result->name}}</a>


            @if($id != Auth::user()->id && property_exists($result, "is_following"))
            
                @include('partials.followbutton', [
                    'followType' => 'user',
                    'isFollowing' => $result->is_following,
                    'userOrBandToFollowId' => $id])

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