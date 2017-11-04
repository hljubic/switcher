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
                'faculty_id' => 1,
            ],
            [
                'name' => 'Kemija',
                'description' => 'Fakultet kemije',
                'faculty_id' => 2,
            ]


        ];

        foreach ($studies as $study)
            Study::create($study);
    }
}
