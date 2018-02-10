<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Collegium extends Model
{


    use  Notifiable;
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
    public function user(){
        return $this->belongsToMany('App\User');
    }

    public function studies(){
        return $this->belongsToMany('App\Study');
    }

    public function posts(){
        return $this->hasMany('App\Post')->orderBy('id', 'desc');
    }

    public function tasks(){
        return $this->hasMany('App\Task');
    }

    public function classe(){
        return $this->hasMany('App\Classe')->orderBy('id','desc');
    }
}
