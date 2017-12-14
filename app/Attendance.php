<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    public $timestamps = false;
    protected $fillable = ['class_id', 'user_id'];

    public function classe()
    {
        return $this->belongsTo('App\Classe', 'class_id');
    }

    public function user()
    {
        return $this->belongsTo ('App\User', 'user_id');
    }
}
