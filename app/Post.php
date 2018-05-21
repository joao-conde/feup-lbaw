<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Post extends Model
{
    protected $table = 'post';

    public $timestamps = false;

    public function insertUserPost($text, $creatorId, $private){

        DB::transaction(function(){
            DB::statement('SET TRANSACTION ISOLATION LEVEL REPEATABLE READ');
            
            $insertContent = 'INSERT INTO content (text, creatorId) VALUES (?, ?);';
            $insertPost = 'INSERT INTO post (private, contentId) VALUES (?, ?);';
            
            DB::insert($insertContent, [$this->text, $this->creatorId]);
            DB::insert($insertPost, [$this->private, $this->contentId]);
        });
    }
}
