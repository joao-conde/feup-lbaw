<link href="{{ asset('css/notifications.css') }}" rel="stylesheet">

<li class="nav-item">
    <a id="notifications_read" class="nav-link text-success pt-3 clickable" role="button" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false">
        <i class="far fa-flag"></i>
        <span id="notification_count" class="badge badge-secondary bg-primary text-warning">@if($notificationsInfo['count'] > 0) {{$notificationsInfo['count']}} @endif</span>
    </a>
    <div class="notificationsList dropdown-menu dropdown-menu-right " aria-labelledby="navbarDropdown">
        <h5 class="text-center dropdown-item">Notifications</h5>
        <div class="dropdown-divider"></div>
        <div id="notifications_div">    
            @include('layouts.header.partials.notificationslist', [
                'notifications'=> $notificationsInfo['notifications'],
                'count' => $notificationsInfo['count']])        
        </div>
        <div class="dropdown-divider"></div>
        <a id="see_more_notifications" class="dropdown-item text-center" href="#">
            <small>See more</small>
        </a>

    </div>
</li>