<?php

use App\Classe;
use Illuminate\Database\Seeder;

class ClassesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $classes = [
            [
                'type' => 'lecture',

            ],
            [
                'type' => 'exercises',

            ],
        ];
        foreach($classes as $classe)
            Classe::create($classe);
    }
}
