<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
//use Jenssegers\Mongodb\Eloquent\Model;

class CommentsMysql extends Model
{
    protected $connection = 'mysql';
    protected $table = 'comments';
    
    protected $fillable = [

        'user_id', 'post_id', 'comment'

    ];
	
	public function users()
    {
        return $this->belongsTo(UsersMysql::class, 'id');
    }
	
	public function posts()
    {
        return $this->belongsTo(PostsMysql::class, 'id');
		//return $this->morphMany(PostsMongot::class, 'post_id');
    }
}
