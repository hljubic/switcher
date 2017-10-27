<?php

use App\File;
use Illuminate\Database\Seeder;

class FilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $files =[

            [
                'name' => 'Seminarski',
                'path' => '',
                'description' => 'Kao neki seminarski',
                'size'=> '23',

            ],

            [
                'name' => 'Zavrsni',
                'path' => '',
                'description' => 'Kao neki zavrsni',
                'size'=> '23',

                ]
            ];
        foreach($files as $file)
            File::create($file);
    }
}
