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
                'name' => 'Student 1',
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
                'name' => 'Student 2',
                'email' => 'student2@gmail.com',
                'password' => bcrypt('123456'),
                'index_number'=> '1954DS',
                'title'=> '',
                'phone' => '063123456',
                'type' => 'admin',
                'is_active' => '1',
                'study_id' => '1',
            ],

            [
                'name' => 'Student 3',
                'email' => 'student3@gmail.com',
                'password' => bcrypt('123456'),
                'index_number'=> '1929DS',
                'title'=> '',
                'phone' => '063345031',
                'type' => 'student',
                'is_active' => '1',
                'study_id' => '1',
            ],

            [
                'name' => 'Professor 1',
                'email' => 'professor@gmail.com',
                'password' => bcrypt('123456'),
                'index_number'=> '',
                'title'=> 'assistent',
                'phone' => '063897123',
                'type' => 'professor',
                'is_active' => '1',
                'study_id' => '1',
            ],

            [
                'name' => 'Professor 2',
                'email' => 'professor1@gmail.com',
                'password' => bcrypt('123456'),
                'index_number'=> '',
                'title'=> 'dr.sc.',
                'phone' => '0638123987',
                'type' => 'professor',
                'is_active' => '1',
                'study_id' => '1',
            ]

        ];

        foreach($users as $user)
            User::create($user);
    }
}
