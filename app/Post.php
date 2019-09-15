<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Post extends Model
{
    protected $fillable = [
    'menu_for', 'details', 'image','max_order','price','ended_at','user_id',
        'order_left'
];
    public function chef()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function customer()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function users()
    {
        return $this->hasOne(User::class);
    }

}
