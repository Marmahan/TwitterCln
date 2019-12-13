<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //a post belongs to one user
    public function user(){
        return $this->belongsTo('App\User');
    }
}
