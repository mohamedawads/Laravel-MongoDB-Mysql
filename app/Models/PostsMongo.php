<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model;

class PostsMongo extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'posts';
    
    protected $fillable = [

        'user_id', 'Title', 'body', 'comments'

    ];
	
	public function users()
    {
        return $this->belongsTo(UsersMongo::class, 'id');
    }
	
	public function comments()
    {
        return $this->embedsMany(CommentsMongo::class, 'post_id');
    }
}
