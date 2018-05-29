<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class NotificationTrigger extends Model
{
    protected $table = 'notification_trigger';

    // Don't add create and update timestamps in database.
    public $timestamps  = false;

    public static function getLinkOfNotification($notificationTriggerId, $type){
            // 'user_follower', 'band_follower', 'message', 'comment', 'band_application',
            // 'band_invitation', 'warning', 'band_invitation_updated', 'band_application_updated');
        switch($type){
            case 'user_follower':
                
                $query = 
                    "SELECT originuserfollower as userid
                    FROM notification_trigger
                    WHERE notification_trigger.id = ?";
                    
                $userId = DB::select($query, [$notificationTriggerId]);

                // return route('profile', ['id' => $userId[0]->userid]);
                // return print_r($userId);
                return "LEO";
                break;
        }


    }
}
