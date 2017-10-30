<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = ['content', 'conversation_id', 'sender_id', 'created_at'];
    public $timestamps = false;
}
