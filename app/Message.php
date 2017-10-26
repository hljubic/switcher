<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = ['content', 'conversation_id', 'sender_id'];
    public $timestamps = false;
}
