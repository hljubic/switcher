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
                'collegium_id' => 1,

            ],
            [
                'type' => 'exercises',
                'collegium_id' => 2,

            ],
        ];
        foreach ($classes as $class)
            Classe::create($class);
    }
}
