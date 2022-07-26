<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
//use Jenssegers\Mongodb\Eloquent\Model;

class UsersMysql extends Model 
{
    protected $connection = 'mysql';
    protected $table = 'users';
    
    protected $fillable = [

        'name', 'email', 'password', 'friends', 'posts', 'comments', 'likes'

    ];
	
	public function friends()
    {
        return $this->hasMany(FriendsMysql::class, 'user_id');
    }
	
	public function posts()
    {
        return $this->hasMany(PostsMysql::class, 'user_id');
    }
	
	public function comments()
    {
        return $this->hasMany(CommentsMysql::class, 'user_id');
    }
}
