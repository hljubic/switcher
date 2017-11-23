<?php

use App\FollowerUser;
use Illuminate\Database\Seeder;

class FollowersUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $followerUsers = [
            [
                'user_id' => 1,
                'follower_id' => 2,
            ]
        ];

        foreach ($followerUsers as $followerUser)
            FollowerUser::create($followerUser);
    }
}
