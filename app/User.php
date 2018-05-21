<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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

    

}
