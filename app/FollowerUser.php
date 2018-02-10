<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class FollowerUser extends Model
{

    public $timestamps = false;
    protected $table = 'follower_user';
    protected $fillable = ['user_id', 'follower_id'];

    public function user(){

        return $this->belongsTo('App\User', 'user_id');
    }

    public function follower (){
        return $this->belongsTo('App\User','follower_id');
    }
}
