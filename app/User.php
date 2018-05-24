<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use App\City;

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
        'admin' => true
    ];

    /**
     * The skills of the user
     */
     public function skills() {
        
        $query = ' SELECT * FROM 
        
            (SELECT skills.id as skillId, skills.name as skill, user_skill.level as level, true as user_skill 
            FROM user_skill 
            JOIN skill as skills ON skills.id = user_skill.skillId
            WHERE user_skill.userId = ? AND user_skill.isActive = true
        
            UNION ALL

            SELECT skills.id as skillId, skills.name as skill, 0 as level, false as user_skill 
            FROM skill as skills
                WHERE (skills.id, ?) NOT IN (
                SELECT skillId,userId 
                FROM user_skill
                )

            UNION ALL

            SELECT skills.id as skillId, skills.name as skill, user_skill.level as level, false as user_skill 
            FROM user_skill 
            JOIN skill as skills ON skills.id = user_skill.skillId
            WHERE user_skill.userId = ? AND user_skill.isActive = false
            
            
            ) AS result

            ORDER BY result.skill ASC 

        ';
        return DB::select($query, [$this->id, $this->id, $this->id]);

    }

     /**
     * The reports of the user
     */
     public function reports() {
        return $this->hasMany('App\Report');
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
    
    public function city() {
        return $this->belongsTo('App\City');
    }

    public function locationCity() {

        $query = 'SELECT name,id FROM city 
                  WHERE id = ?';

        $location = DB::select($query, [$this->location]);

        if(count($location) > 0)
            return $location[0];
        else
            return '';

    }

    public function locationCountry() {

        $location = $this->locationCity();

        if($location == '')
            return '';

        $query = 'SELECT country.name,country.id FROM country 
                  JOIN city ON country.id = city.countryid
                  WHERE city.id = ?';

        $country = DB::select($query, [$location->id]);

        if(count($country) > 0)
            return $country[0];

    }


    public static function getUserProfilePicturePath($userid) {

        $user = User::find($userid);
        return $user->getProfilePicturePath();

    }

    

    public static function getUserIconPicturePath($userid) {

        $user = User::find($userid);
        return $user->getIconPicturePath();

    }


    public function posts($offset) {

        return Post::userPosts($this->id,$offset);
        
    }

    public function feedPosts($offset) {

        return Post::feedPosts($this->id,$offset);
    }

    public function bands() {

        $query = 'SELECT band.id, band.name 
                  FROM band_membership
                  JOIN band ON band.id = band_membership.bandid
                  WHERE band_membership.userid = ?
                  AND band_membership.ceasedate IS NULL';

        return DB::select($query,[$this->id]);

    }

}
