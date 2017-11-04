<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{

    protected $fillable = ['title', 'creator_id'];
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo('App\User', 'creator_id');
    }
}
