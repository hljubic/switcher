<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CollegiumUser extends Model
{
    public $timestamps = false;
    protected $table = 'collegium_user';
    protected $fillable = ['collegium_id', 'user_id'];

    public function user(){

        return $this->belongsTo('App\User', 'user_id');
    }
    public function collegium (){

        return $this->belongsTo('App\Collegium','collegium_id');
    }
}
