<script defer src="{{ asset('js/notifications.js') }}"></script>

<nav class="navbar navbar-expand navbar-light p-0">
    
    <ul class="navbar-nav">

        <li class="nav-item dropdown">
            <a class="nav-link text-success pt-3 read-messages" href="#" role="button" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false">
                <i class="far fa-envelope"></i>
                <span class="badge badge-secondary bg-primary text-warning">1</span>
            </a>
            <div id="messagesList" class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                
                <h5 class=" dropdown-item text-center">Messages</h5>
                <div class="dropdown-divider"></div>
                
                <a class="dropdown-item p-2" href="#">
                    
                    <small class=" time mr-1">16:32</small>
                    <img class="profile_img_message mr-1" src="{{asset('images/system/dummy_profile.svg')}}">
                    <small class="sender"><i>Mike</i></small>
                    <small class="message">Band meeting today</small>
                    
                </a>
                <a class="dropdown-item p-2" href="#">
                    
                    <small class=" time mr-1">10:01</small>
                    <img class="profile_img_message mr-1" src="{{asset('images/system/dummy_profile.svg')}}">
                    <small class="sender"><i>Anne</i></small>
                    <small class="message">Check this song</small>
                    
                </a>
            </div>
        </li>

        @include('layouts.header.partials.notifications', ['notificationsInfo' => Auth::user()->getNotifications()])

        <li class="nav-item dropdown">
            <a class="nav-link text-success p-1" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img id="icon_profile_image" class="profile" src="{{Auth::user()->getIconPicturePath()}}">
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('profile',[Auth::user()->id])}}">My Profile</a>
                @if(Auth::user()->admin)
                <a class="dropdown-item" href="\reported_users">Admin Page</a>
                @endif
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="\faqs">FAQ</a>
                <a class="dropdown-item" href="\about">About</a>
                <a class="dropdown-item" href="\terms">Terms</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item text-danger" href="{{ route('do_logout') }}">Logout</a>
            </div>
        </li>

    </ul>
        
</nav>