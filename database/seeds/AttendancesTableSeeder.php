<?php

use App\Attendance;
use Illuminate\Database\Seeder;

class AttendancesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            $attendances = [
                [
                    'class_id' =>'7' ,
                    'user_id'=>'1',
                ],
                [
                    'class_id' => '8',
                    'user_id'=>'2',
                ],
            ];

            foreach($attendances as $attendance)
                Attendance::create($attendance);
    }
}
