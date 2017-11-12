<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Collegium extends Model
{
    public $timestamps = false;
    protected $table = 'collegiums';
    protected $fillable = ['name', 'description', 'prof_id', 'assist_id', 'conversation_id'];

    public function professor()
    {
        return $this->belongsTo('App\User','prof_id');
    }
    public function assistent()
    {
        return $this->belongsTo('App\User','assist_id');
    }
    public function conversation()
    {
        return $this->belongsTo('App\Conversation');
    }
}
