<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Comment;
use Illuminate\Support\Facades\DB;


class Post extends Model
{
    protected $table = 'post';


    public static function getPost($userId, $postId){
        $query = "SELECT post.bandid as postbandid, content.creatorId as creatorid, post.private as private, post.id as id,
        content.text as postText, content.creatorId as poster_id, mb_user.name as posterName,
        'na' as bandName, content.date as date
        
        
        from post
        join content on post.contentId = content.id
        join mb_user on mb_user.id = ? and mb_user.id = content.creatorId
        WHERE post.id=?";

        return Post::insertCommentsOnPosts(DB::select($query, [$userId, $postId]))[0];
    }

    public static function userPosts($userId,$offset) {

        $query = "SELECT post.bandid as postbandid, content.creatorId as creatorid, post.private as private, post.id as id,
        content.text as postText, content.creatorId as poster_id, mb_user.name as posterName,
        'na' as bandName, content.date as date
        
        
        from post
        join content on post.contentId = content.id
        join mb_user on mb_user.id = ? and mb_user.id = content.creatorId
        ORDER BY content.date DESC
        LIMIT 5 OFFSET ?";

        $posts =  DB::select($query,[$userId, $offset]);
        return Post::insertCommentsOnPosts($posts);

    }

    public static function bandPosts($bandId,$offset) {

        $query = "SELECT post.bandid as postbandid, mb_user.id as creatorid, mb_user.username as username, post.id as id, mb_user.name as postername, content.date as date, content.text as posttext,  'band_post' as post_type  
                  FROM Post
                  JOIN content on content.id = post.contentid
                  JOIN mb_user on mb_user.id = content.creatorid
                  WHERE post.bandid = ?
                  ORDER BY content.date DESC
                  LIMIT 5 OFFSET ?";

        $posts =  DB::select($query,[$bandId, $offset]);

        return Post::insertCommentsOnPosts($posts);

    }

    public static function feedPosts($userId, $offset) {

        $query_posts = "SELECT DISTINCT post_id as id, postbandid, poster_id as creatorid, posterName,date,bandname,postText
        
        FROM
        
            (SELECT post.bandid as postbandid, user_follower.followingUserId as follower, post.private as private,
              post.id as post_id, content.text as postText,
              content.creatorId as poster_id, mb_user.name as posterName,
                'na' as bandName,
                content.date as date
            FROM post
            JOIN content ON content.id = post.contentId
            JOIN mb_user ON mb_user.id = content.creatorId
            JOIN user_follower ON user_follower.followedUserId = content.creatorId
            WHERE user_follower.isactive = true
            AND post.private = false
            AND post.bandid IS NULL
        
            UNION ALL
        
            SELECT post.bandid as postbandid, band_follower.userId as follower, post.private as private,
            post.id as post_id,content.text as postText, content.creatorId as poster_id,
            mb_user.name as posterName,band.name as bandName,
                 content.date as date
            FROM post
            JOIN content ON content.id = post.contentId
            JOIN mb_user ON mb_user.id = content.creatorId
            JOIN band_follower ON band_follower.bandId = post.bandId
            JOIN band ON band.id = band_follower.bandId
            WHERE band_follower.isactive = true
            AND post.private = false
        

            UNION ALL 
            
            select post.bandid as postbandid, content.creatorId as follower, post.private as private, post.id as post_id,
            content.text as postText, content.creatorId as poster_id, mb_user.name as posterName,
            'na' as bandName, content.date as date
            
            
            from post
            join content
            on post.contentId = content.id
            join mb_user   on mb_user.id = ? and mb_user.id = content.creatorId	) as all_posts

        WHERE all_posts.follower = ?
        ORDER BY all_posts.date DESC 
        LIMIT 5 OFFSET ?";

        $posts = DB::select($query_posts, [$userId, $userId, $offset]);
        
        return Post::insertCommentsOnPosts($posts);
      

    }

    private static function insertCommentsOnPosts($posts) {

        $comments = Comment::comments($posts);

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


}
