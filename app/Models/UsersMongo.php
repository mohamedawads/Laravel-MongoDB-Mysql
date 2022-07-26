<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model;

class UsersMongo extends Model
{	
    protected $connection = 'mongodb';
    protected $collection = 'users';
    
    protected $fillable = [

        'name', 'gender', 'age', 'email', 'mobile', 'friends', 'posts', 'comments'

    ];
	
	public function friends()
    {
        return $this->embedsMany(FriendsMongo::class);
    }
	
	public function posts()
    {
        return $this->embedsMany(PostsMongo::class);
    }
	
	public function comments()
    {
        return $this->embedsMany(CommentsMongo::class);
    }
	
}
