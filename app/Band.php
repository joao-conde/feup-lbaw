<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Band extends Model
{

    protected $table = 'band';

    // Don't add create and update timestamps in database.
    public $timestamps  = false;

      /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function members(){
        return $this->hasMany('App\User');
    }



    public static function sendInvitation($userId, $bandId){

        $insertQuery = "INSERT INTO band_invitation(userId,bandId,date,lastStatusDate,status) 
                        VALUES(?,?,now(),now(),'pending');";

        DB::insert($insertQuery, [$userId, $bandId]);
    }
}
