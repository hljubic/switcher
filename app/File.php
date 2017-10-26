<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $fillable=['name','path','description','size','task_id','post_id'];
    public $timestamps = false;
}
