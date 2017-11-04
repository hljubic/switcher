<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FollowerUser extends Model
{
    public $timestamps = false;
    protected $table = 'follower_user';
    protected $fillable = ['user_id', 'follower_id'];
}
