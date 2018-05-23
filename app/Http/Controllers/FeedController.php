<?php

namespace App\Http\Controllers;

use \Datetime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class FeedController extends Controller
{
    public function getPosts(){

        if (!Auth::check()) return redirect('/login');

        $query_posts = "SELECT  post_id as id, poster_id as creatorid, posterName, bandName,date,postText, post_type
        FROM
        
            (SELECT user_follower.followingUserId as follower, post.private as private,
              post.id as post_id, content.text as postText,
              content.creatorId as poster_id, mb_user.name as posterName,
                'na' as bandName,
                content.date as date,
                'user_post' as post_type
            FROM post
            JOIN content ON content.id = post.contentId
            JOIN mb_user ON mb_user.id = content.creatorId
            JOIN user_follower ON user_follower.followedUserId = content.creatorId
            WHERE user_follower.isactive = true
        
            UNION ALL
        
            SELECT band_follower.userId as follower, post.private as private,
            post.id as post_id,content.text as postText, content.creatorId as poster_id,
            mb_user.name as posterName,band.name as bandName,
                 content.date as date, 
                 'band_post' as post_type
            FROM post
            JOIN content ON content.id = post.contentId
            JOIN mb_user ON mb_user.id = content.creatorId
            JOIN band_follower ON band_follower.bandId = post.bandId
            JOIN band ON band.id = band_follower.bandId
            WHERE band_follower.isactive = true
        

            UNION ALL 
            
            select content.creatorId as follower, post.private as private, post.id as post_id,
            content.text as postText, content.creatorId as poster_id, mb_user.name as posterName,
            'na' as bandName, content.date as date, 
            'user_post' as post_type
            
            
            from post
            join content
            on post.contentId = content.id
            join mb_user   on mb_user.id = ? and mb_user.id = content.creatorId	) as all_posts

        WHERE all_posts.follower = ?
        AND all_posts.private = false
        ORDER BY all_posts.date DESC 
        LIMIT 10 OFFSET ?";

        $posts = DB::select($query_posts, [Auth::user()->id, Auth::user()->id, 0]);
        $comments = array();

        if(count($posts) > 0){
        
            $post_ids = "{";
            for($i = 0; $i < count($posts)-1; $i++){
                $post_ids = $post_ids.$posts[$i]->id.',';
            }

            if(count($posts) >= 1)
                $post_ids = $post_ids.$posts[count($posts)-1]->id;
                
                
            $post_ids = $post_ids.'}';
            

            $query_comments_alt = "SELECT content.date, mb_user.name AS author, mb_user.id AS userid, content.text, post.id AS postid
                                    FROM comment 
                                    JOIN content ON content.id=comment.contentid 
                                    JOIN post ON post.id=comment.postid 
                                    JOIN mb_user ON mb_user.id=content.creatorid
                                    WHERE post.id=ANY(?)";


            $comments = DB::select($query_comments_alt, [$post_ids]);
        }


        foreach($posts as $post){
            $dt = new DateTime($post->date);
            $post->date = date("d/m/Y H:i:s", $dt->getTimestamp());

            if(!array_key_exists("comments", $post))
                $post->comments = array();

            foreach($comments as $comment){

                if($comment->postid == $post->id)
                    array_push($post->comments, $comment);

            }
            
        }
        
        return view('pages.feed', ['posts' => $posts]);
    }


	public function createPost(Request $request)
	{    
        
        DB::beginTransaction();
        DB::statement('SET TRANSACTION ISOLATION LEVEL REPEATABLE READ');

        $insertContent = "INSERT INTO content (text, creatorId)
                                VALUES (?, ?)";

        $insertPost = "INSERT INTO post (private, contentId)
                                VALUES (?, currval('content_id_seq'))";

        DB::insert($insertContent, [$request->content, Auth::user()->id]);
        DB::insert($insertPost, [$request->private]);
        DB::commit();

        $posts = DB::table('post')->get();
        $postid = $posts[0]->id;

        return response(json_encode(['postid'=>$postid, 'name' => Auth::user()->name,'content' => $request->content, 'date'=>date("d/m/Y")]), 200);
    }
    
    public function deletePost(Request $request){

        $getContentId = "SELECT post.contentid FROM post WHERE post.id = ?";
        $content = DB::select($getContentId, [$request->postid]);
        $contentid = $content[0]->contentid;
        
        DB::beginTransaction();
        DB::statement('SET TRANSACTION ISOLATION LEVEL REPEATABLE READ');
        
        $deletePost = "DELETE FROM post WHERE post.id=?";
        $deleteContent = "DELETE FROM content WHERE content.id=?";

        DB::delete($deletePost, [$request->postid]);
        DB::delete($deleteContent, [$contentid]);
        
        DB::commit();
        
        return response(json_encode(['postid'=>$request->postid]), 200);
    }

}