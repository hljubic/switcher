<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Study extends Model
{
    protected $fillable = ['name', 'description', 'faculty_id'];
    public $timestamps = false;
}
