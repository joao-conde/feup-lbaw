<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class City extends Model
{


    protected $attributes = [
        'id','name'
    ];


    protected $table = 'city';

    public function country() {
        return $this->belongsTo('App\Country');
    }

    public function users() {
        return $this->hasMany('App\User');
    }

    public static function getAll() {

        $query = 'SELECT city.name as cityName, city.id as cityId, country.name as countryName  
                  FROM city 
                  JOIN country ON country.id = city.countryid
                  ORDER BY city.name';
                  
        return DB::select($query);

    }


}
