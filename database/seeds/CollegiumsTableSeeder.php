<?php

use App\Collegium;
use Illuminate\Database\Seeder;

class CollegiumsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $collegiums = [

            [
                'name' => 'Računalni praktikum 1',
                'description' => '........',
                'prof_id' => '4',
                'assist_id' => '4',
                'conversation_id' => '1',
            ],

            [
                'name' => 'Računalni praktikum 2',
                'description' => '........',
                'prof_id' => '2',
                'assist_id' => '2',
                'conversation_id' => '2',
            ],

            [
                'name' => 'Baze podataka ',
                'description' => '........',
                'prof_id' => '1',
                'assist_id' => '1',
                'conversation_id' => '3',
            ],

        ];

        foreach ($collegiums as $collegium)
            Collegium::create($collegium);
    }
}
