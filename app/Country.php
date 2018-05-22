<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = 'country';

    protected $attributes = [
        'name'
    ];


    public function cities() {
        return $this->hasMany('App\City');
    }

}
