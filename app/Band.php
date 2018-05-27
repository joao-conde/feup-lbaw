<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Post;

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

    
    public function membersSQL() {

        $queryBandMembers = 'SELECT mb_user.id as userid, mb_user.name as membername, band_membership.isowner as owner
                           FROM band_membership
                           JOIN band on band.id = band_membership.bandid
                           JOIN mb_user on band_membership.userid = mb_user.id
                           WHERE band.id = ?
                           AND band_membership.ceasedate IS NULL
                           ORDER BY band_membership.initialdate';

        $members = DB::select($queryBandMembers,[$this->id]);
        return $members;

    }


    public function founders() {

        $queryBandOwner = 'SELECT mb_user.id as userid, mb_user.name as membername
                            FROM band_membership
                            JOIN band on band.id = band_membership.bandid
                            JOIN mb_user on band_membership.userid = mb_user.id
                            WHERE band.id = ?
                            AND band_membership.isowner = true';



        return DB::select($queryBandOwner, [$this->id]);
        
    }

    public function rate() {

        $rateQuery = 'SELECT AVG(rate)
                   FROM band_rating
                   WHERE ratedbandid = ?';

        $rate = DB::select($rateQuery,[$this->id]);

        if(count($rate) > 0)
            return $rate[0]->avg;
        return -1;

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

    public function posts($offset) {
        
        return Post::bandPosts($this->id,$offset);

    }

    public function genres() {

        $query = 'SELECT genre.id, genre.name 
                  FROM genre
                  JOIN band_genre ON band_genre.genreid = genre.id
                  WHERE band_genre.bandid = ?
                  AND genre.isactive = true';

        return DB::select($query,[$this->id]);

    }


    public function pathToProfilePicture() {

        return 'public/band_pics/'.$this->id.'/'.$this->id.'_profile.png';

    } 
    public function pathToIconPicture() {

        return 'public/band_pics/'.$this->id.'/'.$this->id.'_icon.png';

    }

    public function getProfilePicturePath() {

        if(Storage::disk('local')->exists($this->pathToProfilePicture())) 
            return url('storage/band_pics'.'/'.$this->id.'/'.$this->id.'_profile.png');
        else
            return url('images/system/band-profile.svg');

    }

    public function getIconPicturePath() {

        if(Storage::disk('local')->exists($this->pathToIconPicture())) 
            return url('storage/band_pics'.'/'.$this->id.'/'.$this->id.'_icon.png');
        else
            return asset('images/system/band-profile.svg');

    }

    public function followers() {

        $query = 'SELECT userid 
                  FROM band_follower
                  WHERE bandid = ?';

        return DB::select($query,[$this->id]);

    }

    public function isFollowing($userId) {

        $query = 'SELECT count(*) FROM band_follower WHERE bandid = ? AND userid = ?';
        return DB::select($query,[$this->id,$userId])[0]->count == 1;

    }

    public static function getBandProfilePicturePath($bandId) {

        $band = Band::find($bandId);
        return $band->getProfilePicturePath();

    }

    public static function getBandIconPicturePath($bandId) {

        $band = Band::find($bandId);
        return $band->getIconPicturePath();

    }

    public static function getBandsByPattern($userId, $pattern){
        $searchQueryBands = 
            "SELECT band.id as band_id, band.name as name, coalesce(band_follower.isActive, false) as is_following
            FROM band
            LEFT JOIN band_follower 
            ON band_follower.bandId = band.id AND band_follower.userId = ?
            WHERE to_tsvector('simple', band.name) @@ to_tsquery('simple', ?)
            ORDER BY is_following DESC";
        
        return DB::select($searchQueryBands, [$userId, $pattern]);  
    }

    public static function getBandsByGenre($userId, $pattern){
        $searchQueryBandsByGenre = 
            "SELECT genre.name as complement, band.id as band_id, band.name as name, coalesce(band_follower.isActive, false) as is_following
            FROM genre
            JOIN band_genre ON band_genre.genreId = genre.id
            JOIN band ON band.id = band_genre.bandId
            LEFT JOIN band_follower
            ON band_follower.bandId = band.id AND band_follower.userId = ?
            WHERE to_tsvector('simple', genre.name) @@ to_tsquery('simple', ?)
            ORDER BY is_following DESC";

        return DB::select($searchQueryBandsByGenre, [$userId, $pattern]);  
    }


    
}
