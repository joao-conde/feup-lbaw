<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'mb_user';

    // Don't add create and update timestamps in database.
    public $timestamps  = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The cards this user owns.
     */
     public function cards() {
      return $this->hasMany('App\Card');
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

    

}
