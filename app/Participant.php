<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    protected $fillable = ['conversation_id', 'user_id'];
    public $timestamps = false;
}
