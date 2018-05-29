<li class="nav-item">
    <a class="nav-link text-success pt-3 read-notifications" href="{{route('read_notifications')}}" role="button" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false">
        <i class="far fa-flag"></i>
        <span id="notification_count" class="badge badge-secondary bg-primary text-warning">@if($notificationsInfo['count'] > 0) {{$notificationsInfo['count']}} @endif</span>
    </a>
    <div id="notificationsList" class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
        <h5 class="text-center dropdown-item">Notifications</h5>
        <div class="dropdown-divider"></div>
        <div id="notifications_div">    
            @include('layouts.header.partials.notificationslist', [
                'notifications'=> $notificationsInfo['notifications'],
                'count' => $notificationsInfo['count']])        
        </div>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item text-center" href="#">
            <small>See all</small>
        </a>

    </div>
</li>