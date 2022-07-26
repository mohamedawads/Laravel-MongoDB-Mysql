<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
//use Jenssegers\Mongodb\Eloquent\Model;

class FriendsMysql extends Model
{
    protected $connection = 'mysql';
    protected $table = 'friends';
    
    protected $fillable = [

        'user_id', 'friend_id'

    ];
	
	public function user()
    {
        return $this->belongsTo(UsersMysql::class, 'friend_id');
    }
}
