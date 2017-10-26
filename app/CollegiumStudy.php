<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CollegiumStudy extends Model
{
    protected $table = 'collegium_study';

    protected $fillable=['collegium_id','study_id'];

    public $timestamps = false;
}
