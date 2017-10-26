<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    protected $fillable=['type','collegium_id'];
    public $timestamps = false;
}
