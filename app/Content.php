<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $table = 'content';

    public static function patternToTSVector($text){
        $words = explode(" ", trim($text));
        $followingUsersResult = array();

        if(count($words) && $words[0] == ""){
            return "";
        }
        $string = "";
        foreach ($words as $word) {

            $string = $string.$word.":* & ";            
        }
        return trim($string, "& ");
    }
}
