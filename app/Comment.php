<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Comment extends Model {
    
    protected $table = 'comment';
    
    public static function comments($posts) {

        $comments = array();

        if(count($posts) > 0){
        
            $post_ids = "{";
            for($i = 0; $i < count($posts)-1; $i++){
                $post_ids = $post_ids.$posts[$i]->id.',';
            }

            if(count($posts) >= 1)
                $post_ids = $post_ids.$posts[count($posts)-1]->id;
                
                
            $post_ids = $post_ids.'}';
            

            $query_comments_alt = "SELECT comment.id, content.date, mb_user.name AS author, mb_user.id AS userid, content.text, post.id AS postid
                                    FROM comment 
                                    JOIN content ON content.id=comment.contentid 
                                    JOIN post ON post.id=comment.postid 
                                    JOIN mb_user ON mb_user.id=content.creatorid
                                    WHERE content.isactive = true
                                    AND post.id=ANY(?)
                                    
                                    ORDER BY content.date ASC";


            $comments = DB::select($query_comments_alt, [$post_ids]);
        }

        return $comments;

    }

}
