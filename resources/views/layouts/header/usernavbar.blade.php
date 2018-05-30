<script defer src="{{ asset('js/notifications.js') }}"></script>
<script defer src="{{ asset('js/messages.js') }}"></script>

<nav class="navbar navbar-expand navbar-light p-0">
    
    <ul class="navbar-nav">

        @include('layouts.header.partials.messages', ['messagesInfo' => Auth::user()->getMessages(0)])

        @include('layouts.header.partials.notifications', ['notificationsInfo' => Auth::user()->getNotifications(0)])

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