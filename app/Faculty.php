<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    public $timestamps = false;
    protected $fillable = ['name', 'short_name', 'address', 'web', 'phone', 'email'];
}
