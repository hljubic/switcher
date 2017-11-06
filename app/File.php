<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $fillable=['name','path','description','size','task_id','post_id'];
    public $timestamps = false;

    public function task()
    {
        return $this->belongsTo('App\Task', 'task_id');
    }

    public function post()
    {
        return $this->belongsTo ('App\Post', 'post_id');
    }
}
