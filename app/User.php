<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use Notifiable;

    public $timestamps = false;

    protected $fillable = [
        'name', 'email', 'password', 'index_number', 'title', 'phone', 'type', 'is_active', 'study_id'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    //funkcija koja postavlja kriptiranu lozinku
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = Hash::needsRehash($password) ? Hash::make($password) : $password;
    }

    public function study()
    {
        return $this->belongsTo('App\Study');
    }

    public function task()
    {

        return $this->belongsToMany('App\Task');
    }

    public function collegium()
    {

        return $this->belongsToMany('App\Collegium');
    }

    public function posts()
    {
        return $this->hasMany('App\Post')->orderBy('id', 'desc');
    }

    public  function  classe(){

        return $this->belongsToMany('App\Classe');
    }

    public function conversation(){

        return $this->belongsToMany('App\Conversation');
    }
}