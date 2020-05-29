<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Post;

class Topic extends Model
{
    protected $guarded = ['id'];

    public function posts(){
        return $this->hasMany('App\Post');
    }
}
