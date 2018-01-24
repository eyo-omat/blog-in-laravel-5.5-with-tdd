<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Comment;

class Post extends Model
{
    
    public function comment(){
        return $this->hasMany('App\Comment');
    }
}
