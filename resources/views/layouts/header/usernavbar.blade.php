<nav class="navbar navbar-expand navbar-light p-0">
    
    <ul class="navbar-nav">

        <li class="nav-item dropdown">
            <a class="nav-link text-success pt-3" href="#" role="button" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false"><i class="far fa-envelope"></i><span class="badge badge-secondary bg-primary text-warning">2</span></a>
            <div id="messagesList" class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                
                <h5 class=" dropdown-item text-center">Messages</h5>
                <div class="dropdown-divider"></div>
                
                <a class="dropdown-item p-2" href="#">
                    
                        <small class=" time mr-1">16:32</small>
                        <img class="profile_img_message mr-1" src="images/system/dummy_profile.svg">
                        <small class="sender"><i>Mike</i></small>
                        <small class="message">Band meeting today</small>
                    
                </a>
                <a class="dropdown-item p-2" href="#">
                    
                        <small class=" time mr-1">10:01</small>
                        <img class="profile_img_message mr-1" src="images/system/dummy_profile.svg">
                        <small class="sender"><i>Anne</i></small>
                        <small class="message">Check this song</small>
                    
                </a>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link text-success pt-3" href="#" role="button" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false"><i class="far fa-flag"></i><span class="badge badge-secondary bg-primary text-warning">3</span></a>
            <div id="notificationsList" class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <h5 class="text-center dropdown-item">Notifications</h5>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item text-warning" href="#"><small class=" time mr-1">18:01</small><small>You have been warned</a></small>
                <a class="dropdown-item" href="#"><small class=" time mr-1">16:32</small><small>band you are following has just posted a new video</a></small>
                <a class="dropdown-item " href="#"><small class=" time mr-1">11:21</small><small>Your friend has just commented</a></small>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item text-center" href="#"><small>See all</small></a>

            </div>
        </li>

        <li class="nav-item dropdown">
            <a class="nav-link text-success p-1" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img class="profile" src="{{ asset('images/system/dummy_profile.svg') }}">
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('profile',[Auth::user()->id])}}">My Profile</a>
                <a class="dropdown-item" href="admin_user_reports.php">Admin Page</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item text-danger" href="{{ route('do_logout') }}">Logout</a>
            </div>
        </li>

    </ul>
        
</nav>