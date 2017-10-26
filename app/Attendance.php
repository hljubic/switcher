<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $fillable=['class_id','user_id'];
    public $timestamps = false;
}
