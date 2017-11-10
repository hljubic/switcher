<?php

use App\Study;
use Illuminate\Database\Seeder;

class StudiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $studies = [
            [
                'name' => 'Informatika',
                'description' => 'Imat ces se kad kajat!',

            ],
            [
                'name' => 'Kemija',
                'description' => 'Fakultet kemije',

            ]


        ];

        foreach ($studies as $study)
            Study::create($study);
    }
}
