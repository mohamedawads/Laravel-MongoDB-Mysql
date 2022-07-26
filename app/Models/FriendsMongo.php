<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model;

class FriendsMongo extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'friends';
    
    protected $fillable = [

        'user_id', 'friend_id'

    ];
	
	public function user()
    {
        return $this->belongsTo(UsersMongo::class, 'friend_id');
    }
}
