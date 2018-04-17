<div id="leftfeedmenu" class="py-3 card bg-light rounded-0 col-2 d-none d-md-block">
  <a class="mr-1 d-block" href="{{route('profile', Auth::user()->id)}}">
    <img class="profile mr-2" src="{{ asset('images/system/dummy_profile.svg') }}">
    <span class="text-secondary align-middle">My Profile</span>
  </a>

  <hr>

  <p class="align-middle mb-1">Bands</p>
  <a class="mr-1 d-block" href="#">
    <img class="profile_img_feed" src="{{ asset('images/system/dummy_profile.svg') }}">
    <small class="text-primary">Pearl Jam</small>
  </a>
  <a class="mr-1 d-block" href="#">
    <img class="profile_img_feed" src="{{ asset('images/system/dummy_profile.svg') }}">
    <small class="text-primary">Future Islands</small>
  </a>
  <a class="mr-1 d-block" href="#">
    <img class="profile_img_feed" src="{{ asset('images/system/dummy_profile.svg') }}">
    <small class="text-primary">Beach House</small>
  </a>
  <div class="d-flex flex-row m-0">

    <a class="mr-1 d-block mr-2" href="#">
      <small><p class="text-secondary mt-2 mb-0">See all</p></small>

    </a>
    <a class="mr-1 d-block" href="{{ route('create_band') }}">
      <small><p class="text-secondary mt-2 mb-0">Create Band</p></small>
    </a>

  </div>

  <hr>

  <p class="align-middle mb-1">Fellow Musicians</p>
  <a class="mr-1 d-block" href="#">
    <img class="profile_img_feed" src="{{ asset('images/system/dummy_profile.svg') }}">
    <small class="text-primary">Eddie Vedder</small>
  </a>
  <a class="mr-1 d-block" href="#">
    <img class="profile_img_feed" src="{{ asset('images/system/dummy_profile.svg') }}">
    <small class="text-primary">Jeff Ament</small>
  </a>
  <a class="mr-1 d-block" href="#">
    <img class="profile_img_feed" src="{{ asset('images/system/dummy_profile.svg') }}">
    <small class="text-primary">Matt Cameron</small>
  </a>
  <a class="mr-1 d-block mr-2" href="#">
    <small><p class="text-secondary mt-2">See all</p></small>
  </a>

  <hr>

  <a href="followers.html"><p class="text-secondary align-middle mb-1">Followers</p></a>
  <a href="following_users.html"><p class="text-secondary align-middle mb-1">Following <small>(users)</small></p></a>
  <a href="following_bands.html"><p class="text-secondary align-middle mb-1">Following <small>(bands)</small></p></a>
</div>

