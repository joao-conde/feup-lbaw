<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Message extends Model {
    
    protected $table = 'message';

    public static function getMessagesFromUser($userId, $friendId) {

        $query = 'SELECT message.id, creatorId, receiverId, text, date, isActive
                    FROM message
                    JOIN content ON content.id = message.contentId
                    WHERE (creatorId = ? AND receiverId = ?
                    OR creatorId = ? AND receiverId = ?)
                    AND isactive = true
                    ORDER BY date DESC';

        return DB::select($query,[$userId,$friendId,$friendId,$userId]);

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

    public static function getUnreadMessages($userId) {

        $query = "SELECT content.creatorId as creatorId, count(content.creatorId) as numberofmessages
                    FROM user_notification
                    JOIN notification_trigger
                    ON user_notification.notificationTriggerId = notification_trigger.id
                    AND notification_trigger.type = 'message'
                    JOIN message ON message.id = notification_trigger.originmessage
                    JOIN content ON content.id = message.contentid
                    WHERE visualizedDate IS NULL
                    AND userId = ?
                    GROUP BY content.creatorId";

        return DB::select($query, [$userId]);

    }

    public static function getMessagesFromBands($userId, $bandId) {


        
    }


}
