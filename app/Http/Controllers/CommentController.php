<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Comment;
use App\Content;
use App\Report;

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


    public function reportComment(Request $request){

        if (!Auth::check()) return response('No user logged',500);

        $commentId = $request->commentId;

        $query = "select * from mb_user join content on content.creatorid = mb_user.id join comment on content.id = comment.contentid and comment.id = ?;";
        $user = DB::select($query,[$commentId]);

        $content = DB::select("select * from content join comment on comment.contentid = content.id and comment.id = ?;",[$commentId]);

        // dd(Auth::user()->id);
        $reportId = DB::select("select id from report order by date desc limit 1;");

        $report = new Report();
        $report->id = $reportId[0]->id+1;
        $report->text = str_random(10);
        $report->reportedcontentid = $content[0]->id;
        $report->reporteduserid = $user[0]->id;
        $report->reporteruserid = Auth::user()->id;
        $report->reporttype = 'content_report';
        $report->save();

        return response('',200);
    }


}
