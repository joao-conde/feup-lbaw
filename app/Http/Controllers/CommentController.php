<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Comment;

class CommentController extends Controller {
    
    public function createComment(Request $request, $postId) {

        if (!Auth::check()) return response('No user logged',500);

        if(!$request->__isset('commentText'))
            return response('No Text',500);

        $insertContent = "INSERT INTO content (text, creatorId)
                                VALUES (?, ?)";

        $insertPost = "INSERT INTO comment (contentId, postId)
                                VALUES (currval('content_id_seq'), ?)";

        DB::beginTransaction();
        DB::statement('SET TRANSACTION ISOLATION LEVEL REPEATABLE READ');

        DB::insert($insertContent, [$request->commentText, Auth::user()->id]);
        DB::insert($insertPost, [$postId]);

        
        $commentId = DB::select("SELECT currval('comment_id_seq')")[0]->currval;
        
        DB::commit();
        
        $comment = new Comment();

        $comment->author = Auth::user()->name;

        $comment->userid = Auth::user()->id;
        $comment->text = $request->commentText;
        $comment->date = date('Y-m-d H:i',time());
        $comment->id = $commentId;
        
        return response(view('partials.comment', ['comment'=> $comment]), 200);


    }


    public function deleteComment($commentId) {

        if (!Auth::check()) return response('No user logged',500);

        $query = 'SELECT content.creatorid as id 
                  FROM comment
                  JOIN content on content.id = comment.contentid 
                  WHERE comment.id = ?';

    
        $authorId = DB::select($query,[$commentId]);

        if(count($authorId) == 0)
            return response('No Comment Found',404);
            
        if($authorId[0]->id != Auth::user()->id)
            return response('Not authorized',403);

        $update = 'UPDATE content 
                   SET isactive = false 
                   WHERE id = (SELECT contentid FROM comment where id = ?)';

        DB::update($update,[$commentId]);

        return response(200);

    }


}
