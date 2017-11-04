<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CollegiumStudy extends Model
{
    public $timestamps = false;
    protected $table = 'collegium_study';
    protected $fillable = ['collegium_id', 'study_id'];
}
