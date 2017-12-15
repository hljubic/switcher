<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public $timestamps = false;
    protected $fillable = ['content', 'created_at', 'conversation_id', 'collegium_id', 'user_id','file_id'];

    public function collegium(){

        return $this->belongsTo('App\Collegium','collegium_id');
    }

    public function conversation(){

        return $this->belongsTo('App\Conversation','conversation_id');
    }

    public function user(){

        return $this->belongsTo('App\User','user_id');
    }

    public function file(){

        return $this->belongsTo('App\File','file_id');
    }
}