<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Study extends Model
{
    public $timestamps = false;
    protected $fillable = ['name', 'description', 'faculty_id'];

    public function faculty()
    {
        return $this->belongsTo('App\Faculty');
    }
}
