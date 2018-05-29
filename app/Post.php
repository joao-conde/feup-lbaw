<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Comment;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;



class Post extends Model
{
    protected $table = 'post';


    public static function getPost($userId, $postId){
        $query = "SELECT post.bandid as postbandid, content.creatorId as creatorid, post.private as private, post.id as id,
        content.text as postText, content.creatorId as poster_id, mb_user.name as posterName,
        'na' as bandName, content.date as date, post.mediaURL
        
        
        from post
        join content on post.contentId = content.id
        join mb_user on mb_user.id = ? and mb_user.id = content.creatorId
        WHERE post.id=?";

        return Post::insertCommentsOnPosts(DB::select($query, [$userId, $postId]))[0];
    }

    public static function userPosts($userId,$offset) {

        $isOwnUser = Auth::user()->id == $userId;

        $query = "SELECT post.bandid as postbandid, content.creatorId as creatorid, post.private as private, post.id as id,
        content.text as postText, content.creatorId as poster_id, mb_user.name as posterName, content.date as date, post.mediaURL
        
        
        from post
        join content on post.contentId = content.id
        join mb_user on mb_user.id = ? and mb_user.id = content.creatorId
        WHERE content.isactive = true
        AND (post.private = ?
        OR post.private = false)
        ORDER BY content.date DESC
        LIMIT 5 OFFSET ?";

        $posts =  DB::select($query,[$userId, $isOwnUser, $offset]);
        return Post::insertCommentsOnPosts($posts);

    }

    public static function bandPosts($bandId,$offset) {

        $query = "SELECT post.bandid as postbandid, mb_user.id as creatorid, mb_user.username as username, post.id as id, mb_user.name as postername, 
        content.date as date, content.text as posttext,  'band_post' as post_type, band.name as bandname, post.private, post.mediaURL
                  FROM Post
                  JOIN content on content.id = post.contentid
                  JOIN mb_user on mb_user.id = content.creatorid
                  JOIN band on post.bandid = band.id
                  WHERE post.bandid = ?
                  AND content.isactive = true
                  AND (post.private = ?
                  OR post.private = false)
                  ORDER BY content.date DESC
                  LIMIT 5 OFFSET ?";

        $band = Band::find($bandId);

        $isMember = $band->isMember(Auth::user()->id);

        $posts =  DB::select($query,[$bandId, $isMember, $offset]);

        return Post::insertCommentsOnPosts($posts);

    }

    public static function feedPosts($userId, $offset) {

        $query_posts = "SELECT DISTINCT post_id as id, postbandid, poster_id as creatorid, posterName,date,bandname,postText, private, mediaURL
        
        FROM
        
            (SELECT post.bandid as postbandid, user_follower.followingUserId as follower, post.private as private,
              post.id as post_id, content.text as postText,
              content.creatorId as poster_id, mb_user.name as posterName,
                band.name as bandName,
                content.date as date, content.isactive active, post.mediaURL as mediaURL
            FROM post
            JOIN content ON content.id = post.contentId
            JOIN mb_user ON mb_user.id = content.creatorId
            JOIN user_follower ON user_follower.followedUserId = content.creatorId
            LEFT JOIN band on band.id = post.bandid
            WHERE user_follower.isactive = true
            AND post.private = false
            AND post.bandid IS NULL
            
        
            UNION ALL
        
            SELECT post.bandid as postbandid, band_follower.userId as follower, post.private as private,
            post.id as post_id,content.text as postText, content.creatorId as poster_id,
            mb_user.name as posterName,band.name as bandName,
                 content.date as date, content.isactive active, post.mediaURL as mediaURL
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
            band.name as bandName, content.date as date, content.isactive active, post.mediaURL as mediaURL
            
            
            from post
            join content
            on post.contentId = content.id
            join mb_user   on mb_user.id = ? and mb_user.id = content.creatorId	
            left join band on band.id = post.bandid

            UNION ALL
        
            SELECT post.bandid as postbandid, ? as follower, post.private as private,
            post.id as post_id,content.text as postText, content.creatorId as poster_id,
            mb_user.name as posterName,band.name as bandName,
                content.date as date, content.isactive active, post.mediaURL as mediaURL
            FROM post
            JOIN content ON content.id = post.contentId
            JOIN mb_user ON mb_user.id = content.creatorId
            JOIN band ON band.id = post.bandId
            JOIN band_membership ON band_membership.bandid = band.id
            WHERE band_membership.ceasedate IS NULL
            AND band_membership.userid = ?
            ) as all_posts

        WHERE all_posts.follower = ?
        AND active = true
        ORDER BY all_posts.date DESC 
        LIMIT 5 OFFSET ?";

        $posts = DB::select($query_posts, [$userId, $userId, $userId, $userId, $offset]);
        
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
