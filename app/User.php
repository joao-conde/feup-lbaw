<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;





class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'mb_user';

    // Don't add create and update timestamps in database.
    public $timestamps  = false;

    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'deactivationDate', 'warns', 'rating', 'admin',       
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $attributes = [
        'admin' => true,
    ];

    public function bands(){
        return $this->belongsToMany('App\Band');
    }
    /**
     * The skills of the user
     */
     public function skills() {
        return $this->hasMany('App\Skill');
     }

     /**
      * The users this user is following
      */

      public function followedUsers() {
          //return $this->belongsToMany('App\User', 'user_follower', 'followinguserid', 'followeduserid','isactive','id');

        $query = 'SELECT * FROM user_follower 
                  JOIN mb_user as users ON users.id = user_follower.followedUserId
                  WHERE user_follower.followingUserId = ?';

        return DB::select($query, [$this->id]);


      }

      /**
      * The following user of this user
      */

    public function followers() {
        //return $this->belongsToMany('App\User', 'user_follower', 'followeduserid', 'followinguserid', 'isactive','id');

        $query = 'SELECT * FROM user_follower 
                  JOIN mb_user as users ON users.id = user_follower.followingUserId
                  WHERE user_follower.followedUserId = ?';

        return DB::select($query, [$this->id]);

    }

    public function pathToProfilePicture() {

        return 'public/user_pics/'.$this->username.'/'.$this->username.'_profile.png';

    } 
    public function pathToIconPicture() {

        return 'public/user_pics/'.$this->username.'/'.$this->username.'_icon.png';

    }

    public function getProfilePicturePath() {

        if(Storage::disk('local')->exists($this->pathToProfilePicture())) 
            return url('storage/user_pics'.'/'.$this->username.'/'.$this->username.'_profile.png');
        else
            return url('images/system/dummy_profile.svg');

    }

    public function getIconPicturePath() {

        if(Storage::disk('local')->exists($this->pathToIconPicture())) 
            return url('storage/user_pics'.'/'.$this->username.'/'.$this->username.'_icon.png');
        else
            return asset('images/system/dummy_profile.svg');

    }

    public function getNotifications() {

        $result = array();

        $result = DB::transaction(function () {
            $db_result = array();

            DB::statement('SET TRANSACTION ISOLATION LEVEL SERIALIZABLE READ ONLY');

            $countQuery = "SELECT count(*)
                            FROM user_notification
                            JOIN notification_trigger
                            ON user_notification.notificationTriggerId = notification_trigger.id
                            AND notification_trigger.type != 'message'
                            WHERE visualizedDate IS NULL
                            AND userId = ?";

            $db_result['count'] = DB::select($countQuery, [$this->id])[0]->count;
            
            $notificationsQuery = $this->queryNotifications();

            $db_result['notifications'] = DB::select($notificationsQuery, [$this->id]);

            return $db_result;
        });

        return $result;
    }

    public function queryNotifications(){
        return "SELECT user_notification.userId, user_notification.notificationTriggerId, user_notification.text, notification_trigger.date, notification_trigger.type
                FROM user_notification
                JOIN notification_trigger
                ON user_notification.notificationTriggerId = notification_trigger.id
                AND notification_trigger.type != 'message'
                WHERE user_notification.userId = ?
                ORDER BY notification_trigger.date DESC
                LIMIT 7";
    }
    public function getNotificationsBlock($blockNo = 0){

        $notificationsQuery = "SELECT notification_trigger.id, user_notification.text, notification_trigger.date, notification_trigger.type
                                FROM user_notification
                                JOIN notification_trigger
                                ON user_notification.notificationTriggerId = notification_trigger.id
                                AND notification_trigger.type != 'message'
                                WHERE user_notification.userId = ?
                                ORDER BY notification_trigger.date DESC
                                LIMIT 7 OFFSET ?;";

        $result['notifications'] = DB::select($notificationsQuery, [$this->id, $blockNo*7]);

        return $result;
    }

    

}
