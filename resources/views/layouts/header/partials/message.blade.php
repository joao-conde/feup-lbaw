<a class="dropdown-item row" href="#">  
        
    <small class="text-danger time mr-1 col-1 px-1">
    <?php 
        $message_date = date_parse($message->date);
        $date_str = "";
        if ($message_date['year'] != date("Y")) {
            $date_str = $message_date['day'].'/'.$message_date['month'].$date_str.'/'.$message_date['year'].' at ';
        }
        else if ($message_date['day'] != date("d") || $message_date['month'] != date("m")) {
            $date_str = $message_date['day'].'/'.$message_date['month'].$date_str. ' at ';
        }        
        
        $date_str = $date_str.$message_date['hour'].':'.$message_date['minute'];
        echo $date_str;
    ?> 
    </small>
    {{-- <img id="icon_profile_image" class="profile" src="{{Auth::user()->getIconPicturePath()}}"> --}}
    <span class="message_user_id d-none">{{$message->userid}}</span>
    <img class="profile_img_message mr-1" src="{{User::find($message->userid)->getIconPicturePath()}}">
    <small class="sender"><i>{{$message->name}}:</i></small>
    <small class="message">{{$message->text}}</small>
    
</a>
