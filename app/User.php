<?php

namespace App;


use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    //use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'index_number', 'title', 'phone', 'type', 'is_active', 'study_id'
    ];

    public $timestamps = false;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    //metoda koja vraća kriptirani password
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }
}
