
<a class="dropdown-item text-warning" href="#">
    <small class=" time mr-1">
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
    <small>
        {{ $notification->text }}
    </small>

</a>