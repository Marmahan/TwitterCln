<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Message extends Model
{
    //Inverse One-To-Many relationship
    //Each Message belongs to one User
    public function user(){
        return $this->belongsTo(User::class);
    }
}
