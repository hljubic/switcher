<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class TaskUser extends Model
{
    public $timestamps = false;
    protected $table = 'task_user';
    protected $fillable = ['status', 'task_id', 'user_id'];

    public function task(){

        return $this->belongsTo('App\Task');
    }
    public function user(){

        return $this->belongsTo('App\User');
    }
}
