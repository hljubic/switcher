<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    protected $fillable = ['name', 'short_name','address', 'web', 'phone', 'email'];
    public $timestamps = false;
}
