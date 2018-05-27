<div id="leftfeedmenu" class="py-3 card bg-light rounded-0 col-2 d-none d-md-block">
  <a class="mr-1 d-block" href="{{route('profile', Auth::user()->id)}}">
    <img class="profile mr-2" src="{{ Auth::user()->getProfilePicturePath() }}">
    <span class="text-secondary align-middle">My Profile</span>
  </a>

  <hr>

  <p class="align-middle mb-1">Bands</p>
  @foreach(Auth::user()->bands() as $band)
  <a class="mr-1 d-block" href="{{'/bands/'.$band->id}}">
    <img class="profile_img_feed" src="{{ Band::getBandIconPicturePath($band->id) }}">
    <small class="text-primary">{{$band->name}}</small>
  </a>
  @endforeach

  <div class="d-flex flex-row m-0">

    <a class="mr-1 d-block mr-2" href="{{ route('bands_membership') }}">
      <small><p class="text-secondary mt-2 mb-0">See all</p></small>

    </a>
    <a class="mr-1 d-block" href="{{ route('create_band') }}">
      <small><p class="text-secondary mt-2 mb-0">Create Band</p></small>
    </a>

  </div>

  <hr>

  <p class="align-middle mb-1">Fellow Musicians</p>

  @foreach(Auth::user()->fellowMusicians() as $fellowMusician)
  <a class="mr-1 d-block" href="{{'/users/'.$fellowMusician->id}}">
    <img class="profile_img_feed" src="{{ User::getUserIconPicturePath($fellowMusician->id) }}">
    <small class="text-primary">{{$fellowMusician->name}}</small>
  </a>
  @endforeach
  <a class="mr-1 d-block mr-2" href="#">
    <small><p class="text-secondary mt-2">See all</p></small>
  </a>

  <hr>

  <a href="{{ route('user_followers') }}"><p class="text-secondary align-middle mb-1">Followers</p></a>
  <a href="{{ route('user_followings') }}"><p class="text-secondary align-middle mb-1">Following <small>(users)</small></p></a>
  <a href="{{ route('bands_following') }}"><p class="text-secondary align-middle mb-1">Following <small>(bands)</small></p></a>
</div>

