<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Task extends Model
{
    public $timestamps = false;
    protected $fillable = ['name', 'created_at', 'deadline', 'description', 'type', 'collegium_id'];

    public function collegium(){

        return $this->belongsTo('App\Collegium','collegium_id');
    }

    public function user(){
        return $this->belongsToMany('App\User');
    }
}
