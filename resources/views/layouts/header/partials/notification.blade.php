<a class="dropdown-item row" 
    href="{{NotificationTrigger::getLinkOfNotification($notification->id, $notification->type)}}">
    <small class="text-danger time mr-1 col-1 px-1">
    <?php 
        $notif_date = date_parse($notification->date);
        $date_str = "";
        if ($notif_date['year'] != date("Y")) {
            $date_str = $notif_date['day'].'/'.$notif_date['month'].$date_str.'/'.$notif_date['year'].' at ';
        }
        else if ($notif_date['day'] != date("d") || $notif_date['month'] != date("m")) {
            $date_str = $notif_date['day'].'/'.$notif_date['month'].$date_str. ' at ';
        }        
        
        $date_str = $date_str.$notif_date['hour'].':'.$notif_date['minute'];
        echo $date_str;
    ?> 
    </small>
    <small class="text-primary col">
        {{ $notification->text }}
    </small>

</a>