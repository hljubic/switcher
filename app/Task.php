<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['name','created_at', 'deadline','description','type', 'collegium_id'];
    public $timestamps = false;
}
