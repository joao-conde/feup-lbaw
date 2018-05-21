<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    
    protected $table = 'skill';

    // Don't add create and update timestamps in database.
    public $timestamps  = false;

    /**
     * The attributes that are mass assignable.
     * 
     * @var array
     */
    protected $fillable = [
        'name', 'creatingadminid', 'isactive',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];
}
