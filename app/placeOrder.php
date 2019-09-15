<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class placeOrder extends Model
{
    protected $fillable = [
        'quantity', 'price', 'address','phone','user_id','post_id','confirm','deliver'
    ];

    public function customer()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
