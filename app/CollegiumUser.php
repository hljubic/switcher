<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CollegiumUser extends Model
{
    public $timestamps = false;
    protected $fillable = ['collegium_id', 'user_id'];
}
