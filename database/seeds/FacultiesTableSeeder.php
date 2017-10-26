<?php

use App\Faculty;
use Illuminate\Database\Seeder;

class FacultiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $facultis = [
            [
                'name' => 'Fakultet prirodoslovno matematičkih znanosti',
                'short_name' => 'FPMOZ',
                'address' => 'Matice Hrvatske b.b',
                'web' => 'https://fpmoz-sve.mo.ba',
                'email' => 'referada@gmail.com',
                'phone' => '036854124'
            ],

            [
                'name' => 'Fakultet strojarstva i računarstva',
                'short_name' => 'FSR',
                'address' => 'Matice Hrvatske b.b',
                'web' => 'https://fsrmo.ba',
                'email' => 'fsr@mo.ba',
                'phone' => '45789564'
            ]
        ];

        foreach ($facultis as $faculty)
            Faculty::create($faculty);
    }
}
