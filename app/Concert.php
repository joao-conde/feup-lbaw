<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


use App\Concert;

class Concert extends Model
{
    protected $table = 'concert';

    protected $fillable = [
        'locationid', 'concertdate', 'description', 'bandid', 'isactive', 'id'
    ];

    // Don't add create and update timestamps in database.
    public $timestamps  = false;


    public static function getBandConcerts($id){
        $query = "SELECT concert.id, concert.description, concert.concertDate, city.name from concert JOIN city ON concert.locationid=city.id WHERE bandid=? and concert.isactive = true";
        return DB::select($query, [$id]);
    }

}
