<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Post;
use App\User;

class Comment extends Model
{
    protected $guarded = ['id'];

    public function post(){
        return $this->belongsTo('App\Post');
    }
    
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function usersthumbnail(){
        return $this->user->thumbnail;
    }
}
