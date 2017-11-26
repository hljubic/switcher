<?php

use App\CollegiumUser;
use Illuminate\Database\Seeder;


class CollegiumUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $collegiumUsers = [

            [
                'collegium_id' => '1',
                'user_id' => '1',

            ],

            [
                'collegium_id' => '2',
                'user_id' => '2',

            ],

            [
                'collegium_id' => '3',
                'user_id' => '3',
            ],

        ];

        foreach ($collegiumUsers as $collegiumUser)
            CollegiumUser::create($collegiumUser);
    }
}
