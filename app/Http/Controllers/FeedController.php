<?php

namespace App\Http\Controllers;

use App\Post;
use App\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class FeedController extends Controller
{
    public function getPosts(){
        if (!Auth::check()) return redirect('/login');

        $query = 'SELECT * from content WHERE 
                    content.creatorid=?;';

        $posts = DB::select($query, [Auth::user()->id]);


        return view('pages.feed', ['posts' => $posts]);
    }

    /**
	 * Creates a new post.
	 *
	 * @return Post The post created.
	 */
	public function createPost(Request $request)
	{
        
        $result = array();

        /*
            BEGIN TRANSACTION;
            SET TRANSACTION ISOLATION LEVEL REPEATABLE READ

            -- Insert content
            INSERT INTO content (text, creatorId)
            VALUES ($text, $creatorId);

            -- Insert post
            INSERT INTO post (private, contentId)
            VALUES ($private, currval('content_id_seq'));

            COMMIT;

        */
    
        $result = DB::transaction(function () {
            $db_result = array();
    
            DB::statement('SET TRANSACTION ISOLATION LEVEL REPEATABLE READ');
            
            $insertContent = "INSERT INTO content (text, creatorId)
            VALUES ($text, $creatorId)";

            $insertPost = "INSERT INTO post (private, contentId)
            VALUES ($private, currval('content_id_seq'))";

            DB::insert($insertContent, []);
            
            /*
            $db_result['count'] = DB::select($countQuery, [$this->id])[0]->count;
                
            $notificationsQuery = $this->queryNotifications();
    
            $db_result['notifications'] = DB::select($notificationsQuery, [$this->id]);
            */
            return $db_result;
        });
    
        return $result;
        


        $content = new Content();
        $post = new Post();
        DB::transaction(function() {
            
            //$content->id = $request;
            $content->text = $request->input('content');
            //$content->date = $request->input();
            $content->date = "31/02/2022";
            $content->creatorid = Auth::user()->id;
            $content->isactive = true;
            
            //$content->save();

        
            
            $post->id = $request->input('id');
            //$post->private = $request->input('private');
            
            //$post->text = $request->input('post');
            
            //$post->save();
            
        });


        return response($post->id, 200);
	}

}