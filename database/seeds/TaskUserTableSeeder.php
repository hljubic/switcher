<?php

use Illuminate\Database\Seeder;
use App\TaskUser;

class TaskUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tasksusers =[

            [
                'status' => 'in progress',
                'task_id' => '2',
                'user_id' => '1',
            ],

            [
                'status' => 'in progress',
                'task_id' => '2',
                'user_id' => '3',
            ],

            [
                'status' => 'in progress',
                'task_id' => '4',
                'user_id' => '1',
            ],
        ];

        foreach($tasksusers as $taskuser)
            TaskUser::create($taskuser);
    }
}
