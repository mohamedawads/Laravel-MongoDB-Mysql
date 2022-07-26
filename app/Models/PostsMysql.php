<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
//use Jenssegers\Mongodb\Eloquent\Model;

class PostsMysql extends Model
{
    protected $connection = 'mysql';
    protected $table = 'posts';
    
    protected $fillable = [

        'user_id', 'Title', 'body', 'comments'

    ];
	
	public function users()
    {
        return $this->belongsTo(UsersMysql::class, 'id');
    }
	
	public function comments()
    {
        return $this->hasMany(CommentsMysql::class, 'post_id');
    }
}
