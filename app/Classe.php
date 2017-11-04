<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    public $timestamps = false;
    protected $fillable = ['type', 'collegium_id'];
}
