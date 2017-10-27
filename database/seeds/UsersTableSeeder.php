<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users =[

            [
                'name' => 'Brigita Šahinović',
                'email' => 'student1@gmail.com',
                'password' => bcrypt('123456'),
                'index_number'=> '1930DS',
                'title'=> '',
                'phone' => '063077442',
                'type' => 'student',
                'is_active' => '1',
                'study_id' => '1',
            ],

            [
                'name' => 'Hrvoje Ljubić',
                'email' => 'student@gmail.com',
                'password' => bcrypt('123456'),
                'index_number'=> '1954DS',
                'title'=> '',
                'phone' => '063123456',
                'type' => 'admin',
                'is_active' => '1',
                'study_id' => '1',
            ],

            [
                'name' => 'Marija Tuka',
                'email' => 'student2@gmail.com',
                'password' => bcrypt('123456'),
                'index_number'=> '1929DS',
                'title'=> '',
                'phone' => '063345031',
                'type' => 'student',
                'is_active' => '1',
                'study_id' => '1',
            ],

            [
                'name' => 'Daniel Vasić',
                'email' => 'professor@gmail.com',
                'password' => bcrypt('123456'),
                'index_number'=> '',
                'title'=> 'assistent',
                'phone' => '063897123',
                'type' => 'professor',
                'is_active' => '1',
                'study_id' => '1',
            ]

        ];

        foreach($users as $user)
            User::create($user);
    }
}
