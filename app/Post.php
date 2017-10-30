<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['content', 'conversation_id', 'collegium_id'];
    public $timestamps = false;
}
