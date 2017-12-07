<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    public $timestamps = false;
    protected $fillable = ['type', 'collegium_id', 'created_at'];

    public function collegium()
    {
        return $this->belongsTo('App\Collegium', 'collegium_id');
    }
}
