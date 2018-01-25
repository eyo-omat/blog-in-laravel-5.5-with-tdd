<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Comment;

class Post extends Model
{
    protected $guarded = [];   
    
    public function comment(){
        return $this->hasMany('App\Comment');
    }
    
    public function storeComment($comment){
        $this->comment()->create($comment);
    }
    
    public function creator(){
        return $this->belongsTo(User::class, 'user_id');
    }
    
}
