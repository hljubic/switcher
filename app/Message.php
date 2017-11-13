<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    public $timestamps = false;

    protected $fillable = ['content', 'conversation_id', 'sender_id', 'created_at'];

    public function user()
    {
        return $this->belongsTo('App\User', 'sender_id');
    }

    public function conversation()
    {
        return $this->belongsTo('App\Conversation');
    }

}
