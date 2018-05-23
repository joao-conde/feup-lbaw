<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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

        $query = 'SELECT mb_user.id as creatorid, mb_user.username as username, post.id as id, mb_user.name as name, content.date as date, content.text as text, true as band_post  
                  FROM Post
                  JOIN content on content.id = post.contentid
                  JOIN mb_user on mb_user.id = content.creatorid
                  WHERE post.bandid = ?
                  ORDER BY content.date ASC
                  LIMIT 5 OFFSET ?';

        $posts =  DB::select($query,[$this->id, $offset]);

        $comments = $this->comments($offset);

        foreach($posts as $post) {

            if(!array_key_exists("comments",$post))
                $post->comments = array();

            foreach($comments as $comment) {

                if($comment->postid == $post->id) {
                    
                    array_push($post->comments,$comment);

                }

            }

        }
        
        return $posts;

    }

    public function comments($offset) {

        $query = 'SELECT mb_user.id as userid, mb_user.username as username, mb_user.name as author, comment.id as id, post.id as postid, content.text as text, content.date as date 
                  FROM comment
                  JOIN content on content.id = comment.contentid
                  JOIN post on comment.postid = post.id
                  JOIN mb_user on mb_user.id = content.creatorid
                  WHERE post.bandid = ?
                  AND post.id IN 
                    (SELECT post.id 
                    FROM Post
                    JOIN content on content.id = post.contentid
                    WHERE post.bandid = ?
                    LIMIT 5 OFFSET ?)
                  ORDER BY content.date ASC';

        return DB::select($query,[$this->id, $this->id, $offset]);

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
            return url('storage/user_pics'.'/'.$this->id.'/'.$this->id.'_icon.png');
        else
            return asset('images/system/band-profile.svg');

    }


}
