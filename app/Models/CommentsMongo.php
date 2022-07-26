<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model;

class CommentsMongo extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'Comments';
    
    protected $fillable = [

        'user_id', 'post_id', 'comment'

    ];
	
	public function users()
    {
        return $this->belongsTo(UsersMongo::class, 'id');
    }
	
	public function posts()
    {
        return $this->belongsTo(PostsMongo::class, 'id');
		//return $this->morphMany(PostsMongot::class, 'user_id');
    }
}
