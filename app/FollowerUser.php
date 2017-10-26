<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FollowerUser extends Model
{
    protected $table = 'follower_user';

    protected $fillable = ['user_id', 'follower_id'];

    public $timestamps = false;
}
