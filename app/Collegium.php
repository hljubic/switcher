<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Collegium extends Model
{
    public $timestamps = false;
    protected $table = 'collegiums';
    protected $fillable = ['name', 'description', 'prof_id', 'assist_id', 'conversation_id'];
}
