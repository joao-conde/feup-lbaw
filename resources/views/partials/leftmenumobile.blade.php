<div id="floatingmenu" class="row d-md-none my-0 bg-primary text-white w-100 border-top border-secondary py-2">
        <div class="col">
          <input type="checkbox" id="toggleleft">
          <i class="align-middle fas fa-bars" id="ham"></i>
          <div class="d-md-none jumbotron jumbotron-fluid d-flex py-1 border rounded border-dark" id="leftmenu">
    
            <ul>
              <li class="display-5 text-primary">My Bands
                <ul>
                  @foreach(Auth::user()->bands() as $band)
                  <li>
                    <a href="{{route('band_profile', [$band->id])}}">
                      <img src="{{ Band::getBandIconPicturePath($band->id) }}" class="profile_img_chat">
                      <p class="text-secondary">{{$band->name}}</p>
                    </a>
                  </li>
                  @endforeach
                  
                </ul>
                <div class="d-flex flex-row m-0">

                    <a class="mr-1 d-block mr-2" href="#">
                      <small><p class="text-secondary mt-2 mb-0">See all</p></small>
                
                    </a>
                    <a class="mr-1 d-block" href="{{ route('create_band') }}">
                      <small><p class="text-secondary mt-2 mb-0">Create Band</p></small>
                    </a>
                
                </div>
              </li>
              <hr>
              <li class="display-5 text-primary">My Fellow Musicians
                <ul>
                  @foreach(Auth::user()->fellowMusicians() as $fellowMusician)
                  <li>
                    <a href="{{'/users/'.$fellowMusician->id}}">
                      <img src="{{ User::getUserIconPicturePath($fellowMusician->id) }}" class="profile_img_chat">
                      <p class="text-secondary">{{$fellowMusician->name}}</p>
    
                    </a>
                  </li>
                  @endforeach
                  <a class="mr-1 d-block mr-2" href="#">
                    <small><p class="text-secondary mt-2">See all</p></small>
                  </a>
                </ul>
              </li>
              <hr>
              <li><a href="{{ route('user_followers') }}"><p class="text-secondary align-middle mb-1">Followers</p></a></li>
              <li><a href="{{ route('user_followings') }}"><p class="text-secondary align-middle mb-1">Following <small>(users)</small></p></a></li>
              <li><a href="{{ route('bands_following') }}"><p class="text-secondary align-middle mb-1">Following <small>(bands)</small></p></a></li>
            </ul>
          </div>
        </div>
    
        <div id="homeButton" class="col-auto">
          <i class="fas fa-home text-white"></i>
        </div>
    
        <div id="chatButton" class="col-auto">
          <i class="fas fa-comments"></i>
        </div>
    
      </div>