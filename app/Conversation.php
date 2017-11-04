<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{

    public $timestamps = false;
    protected $fillable = ['title', 'creator_id'];

    public function user()
    {
        return $this->belongsTo('App\User', 'creator_id');
    }
}
