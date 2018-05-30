<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Message extends Model {
    
    protected $table = 'message';

    public static function getMessagesFromUser($userId, $friendId, $offset) {

        $query = 'SELECT message.id, creatorId, receiverId, text, date, isActive
                    FROM message
                    JOIN content ON content.id = message.contentId
                    WHERE (creatorId = ? AND receiverId = ?
                    OR creatorId = ? AND receiverId = ?)
                    AND isactive = true
                    ORDER BY date DESC
                    LIMIT 8 
                    OFFSET ?';

        return DB::select($query,[$userId,$friendId,$friendId,$userId,$offset]);

    }

    public static function getNewMessages($userId, $friendId, $lastId) {

        $query = 'SELECT message.id, creatorId, receiverId, text, date, isActive
                    FROM message
                    JOIN content ON content.id = message.contentId
                    WHERE (creatorId = ? AND receiverId = ?
                    OR creatorId = ? AND receiverId = ?)
                    AND isactive = true
                    AND message.id > ?
                    ORDER BY date ASC';

        return DB::select($query,[$userId,$friendId,$friendId,$userId,$lastId]);

    }


}
