<?php

use App\Task;
use Illuminate\Database\Seeder;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tasks = [

            [
                'name' => 'Programski jezik c, c++',
                'deadline' => '2017-11-01',
                'description' => '......',
                'type' => 'seminar paper',
                'collegium_id' => '1',

            ],

            [
                'name' => 'Model baze podataka',
                'deadline' => '2017-11-07',
                'description' => '......',
                'type' => 'project',
                'collegium_id' => '2',
            ],

            [
                'name' => 'Zadatak 2',
                'deadline' => '2017-11-01',
                'description' => '......',
                'type' => 'homework',
                'collegium_id' => '3',
            ],


        ];

        foreach ($tasks as $task)
            Task::create($task);
    }
}
