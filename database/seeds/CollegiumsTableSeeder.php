<?php

use Illuminate\Database\Seeder;
use App\Collegium;

class CollegiumsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $collegiums =[

            [
                'name' => 'Računalni praktikum 1',
                'description' => '........',
                'prof_id'=> '4',
                'assist_id' => '4',


            ],

            [
                'name' => 'Računalni praktikum 2',
                'description' => '........',
                'prof_id'=> '4',
                'assist_id' => '4',

            ],

            [
                'name' => 'Baze podataka ',
                'description' => '........',
                'prof_id'=> '4',
                'assist_id' => '4',

            ],

        ];

        foreach($collegiums as $collegium)
            Collegium::create($collegium);
    }
}
