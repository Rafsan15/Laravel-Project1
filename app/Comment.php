<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'special_item_id', 'user_id', 'comment_by','comment'
    ];
}
