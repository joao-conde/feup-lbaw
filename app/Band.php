<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
}
