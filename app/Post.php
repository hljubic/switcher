<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public $timestamps = false;
    protected $fillable = ['content', 'created_at', 'conversation_id', 'collegium_id'];

    public function collegium(){

        return $this->belongsTo('App\Collegium','collegium_id');
    }

    public function conversation(){

        return $this->belongsTo('App\Conversation','converastion_id');
    }
}
