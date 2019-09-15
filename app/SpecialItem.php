<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SpecialItem extends Model
{
    protected $fillable = [
        'user_id', 'details', 'image','title','reacts'
    ];
}
