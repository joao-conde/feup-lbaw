<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Message;

class MessageController extends Controller {
    
    public function store(Request $request, $userId, $friendId) {

        if (!Auth::check() || Auth::user()->id != $userId) 
            return response('No user logged',500);

        if(!$request->__isset('message') || strlen(trim($request->message)) == 0) 
            return response('No content',500);

        
        $insertContent = "INSERT INTO content (text, creatorId)
                                VALUES (?, ?)";

        $insertPost = "INSERT INTO message (contentId,receiverId)
                                VALUES (currval('content_id_seq'), ?)";

        DB::beginTransaction();
        DB::statement('SET TRANSACTION ISOLATION LEVEL REPEATABLE READ');

        DB::insert($insertContent, [$request->message, $userId]);
        DB::insert($insertPost, [$friendId]);

        DB::commit();

        $message = new Message();

        $message->creatorid = $userId;
        $message->date = date('Y-m-d H:i',time());
        $message->text = $request->message;

        return response(view('partials.message', ['message'=> $message]), 200);

    }


    public function getNewMessages(Request $request, $userId, $friendId) {

        if (!Auth::check() || Auth::user()->id != $userId) 
            return response('No user logged',500);

        
        // if(!$request->input__isset('lastMessageId')) 
        //     return response('No content',500);

        $lastId = $request->lastMessageId;

        $newMessages = Message::getNewMessages($userId, $friendId, $lastId);

        $response = "";

        foreach($newMessages as $message) {

            $messagePartial = view('partials.message',['message' => $message]);
            $response = $response.$messagePartial;

        }

        return $response;


    }


}
