<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $fillable=['name','path','description','size','task_id'];
    public $timestamps = true;

    public function task()
    {
        return $this->belongsTo('App\Task', 'task_id');
    }

}
