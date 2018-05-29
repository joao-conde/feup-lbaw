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
    // return print_r($user);
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


public function fellowMusicians() {
    
    $bands = $this->bands();
    
    if(count($bands) == 0)
    return array(); 
    
    $query = 'SELECT DISTINCT mb_user.id, mb_user.name 
                  FROM band
                  JOIN band_membership ON band_membership.bandid = band.id
                  JOIN mb_user on mb_user.id = band_membership.userid
                  WHERE band.id=ANY(?)
                  AND mb_user.id <> ?
                  LIMIT 4';

        $bands_ids = "{";
        for($i = 0; $i < count($bands)-1; $i++){
            $bands_ids = $bands_ids.$bands[$i]->id.',';
        }

        if(count($bands) >= 1)
            $bands_ids = $bands_ids.$bands[count($bands)-1]->id;
            
            
        $bands_ids = $bands_ids.'}';

        return DB::select($query,[$bands_ids, $this->id]);

    }

    public static function getUsersByPattern($userId, $pattern){
        $searchQueryUsers = 
            "SELECT mb_user.id as user_id, mb_user.name as name, city.name || ', ' || country.name as complement, coalesce(user_follower.isActive, false) as is_following
            FROM mb_user
            LEFT JOIN city ON city.id = mb_user.location 
            LEFT JOIN country ON city.countryId = country.id
            LEFT JOIN user_follower 
            ON user_follower.followedUserId = mb_user.id AND user_follower.followingUserId = ?
            WHERE to_tsvector('simple', mb_user.name) @@ to_tsquery('simple', ?)
            ORDER BY is_following DESC, name ASC";

        return DB::select($searchQueryUsers, [$userId, $pattern]);
    }

    public static function getUsersBySkill($userId, $pattern){
        
        $searchQueryUsersBySkill = 
            "SELECT user_skill.level as stars, skill.name as complement, mb_user.id as user_id, mb_user.name as name, coalesce(user_follower.isActive, false) as is_following
            FROM mb_user
            LEFT JOIN user_skill ON user_skill.userId = mb_user.id
            JOIN skill ON skill.id = user_skill.skillId
            LEFT JOIN user_follower
            ON user_follower.followedUserId = mb_user.id AND user_follower.followingUserId = ?
            WHERE to_tsvector('simple', skill.name) @@ to_tsquery('simple', ?)
            ORDER BY is_following DESC, user_skill.level DESC";
        
        return DB::select($searchQueryUsersBySkill, [$userId, $pattern]);

    }

    public static function getFollowingAll($id){
        $followingUsersQuery = 
            "SELECT mb_user.id as user_id, mb_user.name as name, city.name || ', ' || country.name as complement, true as is_following
            FROM mb_user
            LEFT JOIN city ON city.id = mb_user.location 
            LEFT JOIN country ON city.countryId = country.id
            JOIN user_follower 
            ON user_follower.followedUserId = mb_user.id 
            AND user_follower.followingUserId = ?
            AND user_follower.isactive = true
            ORDER BY  mb_user.name ASC";

        return DB::select($followingUsersQuery, [$id]);
    }

    public static function getFollowersAll($id){
        $followerUsersQuery = 
            "SELECT mb_user.id as user_id, mb_user.name as name, city.name || ', ' || country.name as complement, coalesce(follows.isActive,false) as is_following
            FROM mb_user
            LEFT JOIN city ON city.id = mb_user.location 
            LEFT JOIN country ON city.countryId = country.id
            JOIN user_follower 
            ON user_follower.followingUserId = mb_user.id 
            AND user_follower.followedUserId = ?
            AND user_follower.isactive = true
            LEFT JOIN (select * from user_follower) as follows
            ON follows.followingUserId = ?
            AND follows.followedUserId = mb_user.id
            ORDER BY is_following DESC, mb_user.name ASC";

        return DB::select($followerUsersQuery, [$id, $id]);
    }

    public static function getFollowingBands($userId){
        $searchQueryBands = 
            "SELECT band.id as band_id, band.name as name, band_follower.isActive as is_following
            FROM band
            JOIN band_follower 
            ON band_follower.bandId = band.id AND band_follower.userId = ?
            WHERE band_follower.isActive = true
            ORDER BY is_following ASC";
        
        return DB::select($searchQueryBands, [$userId]);  
    }
    
    public static function getOwnBands($userId){
        $searchQueryBands = 
            "SELECT band.id as band_id, band.name as name
            FROM band
            JOIN band_membership
            ON band_membership.bandId = band.id AND band_membership.userId = ?
            AND band_membership.ceasedate IS NULL
            ORDER BY band.name ASC";
        
        return DB::select($searchQueryBands, [$userId]);  
    }

    public static function getBandsMembership($userId){
        $searchQueryBands = 
            "SELECT * FROM(
                SELECT band.id as band_id, band.name as name, 'member' as membership_status, 'Your Band' as complement
                FROM band_membership
                JOIN band ON band_membership.bandId = band.id 
                AND band_membership.ceasedate IS NULL
                WHERE band_membership.userId = ?

                UNION

                SELECT band.id as band_id, band.name as name, 'pending_invitation' as membership_status, 'Invitation' as complement
                FROM band_invitation
                JOIN band ON band_invitation.bandId = band.id
                WHERE band_invitation.status = 'pending' AND band_invitation.userId = ?


                UNION

                SELECT band.id as band_id, band.name as name, 'pending_application' as membership_status, 'Application' as complement
                FROM band_application
                JOIN band ON band_application.bandId = band.id
                WHERE band_application.status = 'pending' AND band_application.userId = ?
            ) as result
            ORDER BY result.membership_status DESC, result.name ASC";
        
        return DB::select($searchQueryBands, [$userId, $userId, $userId]);  
    }

}
