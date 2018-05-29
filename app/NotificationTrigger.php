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
                    "SELECT user_follower.followingUserId as userid
                    FROM notification_trigger
                    JOIN user_follower 
                    ON user_follower.id = notification_trigger.originuserfollower
                    WHERE notification_trigger.id = ?";
                    
                $userId = DB::select($query, [$notificationTriggerId]);

                return route('profile', ['id' => $userId[0]->userid]);
                break;

            case 'band_follower':
                
                $query = 
                    "SELECT band_follower.userId
                    FROM notification_trigger
                    JOIN band_follower 
                    ON band_follower.id = notification_trigger.originBandFollower
                    WHERE notification_trigger.id = ?";
                    
                $userId = DB::select($query, [$notificationTriggerId]);

                return route('profile', ['id' => $userId[0]->userid]);
                break;
            
            case 'band_application':
            case 'band_application_updated':
                
                $query = 
                    "SELECT band_application.userId, band_application.bandId
                    FROM notification_trigger
                    JOIN band_application 
                    ON band_application.id = notification_trigger.originBandApplication
                    WHERE notification_trigger.id = ?";
                    
                $userId = DB::select($query, [$notificationTriggerId]);

                if($type == 'band_application')
                    return route('profile', ['id' => $userId[0]->userid]);
                else
                    return route('band_profile', ['id' => $userId[0]->bandid]);
                break;

            case 'band_invitation':
            case 'band_invitation_updated':
                    
                $query = 
                    "SELECT band_invitation.userId, band_invitation.bandId
                    FROM notification_trigger
                    JOIN band_invitation 
                    ON band_invitation.id = notification_trigger.originBandInvitation
                    WHERE notification_trigger.id = ?";
                    
                $userId = DB::select($query, [$notificationTriggerId]);

                if($type == 'band_invitation')
                    return route('band_profile', ['id' => $userId[0]->bandid]);
                else
                    return route('profile', ['id' => $userId[0]->userid]);
                break;
            
            case 'comment':
                    
                $query = 
                    "SELECT content.creatorId as userid, post.id as postid
                    FROM notification_trigger
                    JOIN comment ON comment.id = notification_trigger.originComment
                    JOIN post ON post.id = comment.postid 
                    JOIN content ON content.id = post.contentid
                    WHERE notification_trigger.id = ?";
                    
                $userId = DB::select($query, [$notificationTriggerId]);

                return route('post_page', ['userId' => $userId[0]->userid, 'postId' => $userId[0]->postid]);
        }


    }
}
