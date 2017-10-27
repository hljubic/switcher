<?php

use App\CollegiumStudy;
use Illuminate\Database\Seeder;

class CollegiumStudyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $collegium_studies = [
            [

                'study_id'=>1,
            ],
            [

                'study_id'=>2,
            ],
        ];

        foreach($collegium_studies as $collegiumStudy)
            CollegiumStudy::create($collegiumStudy);
    }
}
