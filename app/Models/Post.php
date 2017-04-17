<?php
namespace App\Models;

use App\Models\Model;


class Post extends Model
{
    protected $table = 'posts';
    protected $id, $text, $topic_id, $user_id, $created_at;

}