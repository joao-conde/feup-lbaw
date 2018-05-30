<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


use App\Concert;

class Concert extends Model
{
    protected $table = 'concert';

    // Don't add create and update timestamps in database.
    public $timestamps  = false;


    public static function getBandConcerts($id){
        $query = "SELECT concert.description, concert.concertDate, city.name from concert JOIN city ON concert.locationid=city.id WHERE bandid=?";
        return DB::select($query, [$id]);
    }

}
