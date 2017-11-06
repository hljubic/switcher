<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CollegiumStudy extends Model
{
    public $timestamps = false;
    protected $table = 'collegium_study';
    protected $fillable = ['collegium_id', 'study_id'];

    public function collegium()
    {
        return $this->belongsTo('App\Collegium', 'collegium_id');
    }

    public function study()
    {
        return $this->belongsTo ('App\Study', 'study_id');
    }
}
