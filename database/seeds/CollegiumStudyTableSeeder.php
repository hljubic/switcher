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

                'collegium_id' => 1,
                'study_id' => 1,

            ],
            [
                'collegium_id' => 2,
                'study_id' => 2,
            ],
        ];

        foreach ($collegium_studies as $collegium_study)
            CollegiumStudy::create($collegium_study);
    }
}
