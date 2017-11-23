<?php

use App\Participant;
use Illuminate\Database\Seeder;

class ParticipantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $participants = [

            [
                'conversation_id' => '1',
                'user_id' => '1',
            ],

            [
                'conversation_id' => '1',
                'user_id' => '2',
            ],

            [
                'conversation_id' => '2',
                'user_id' => '2',
            ],

            [
                'conversation_id' => '2',
                'user_id' => '3',
            ],

            [
                'conversation_id' => '3',
                'user_id' => '3',
            ],

            [
                'conversation_id' => '3',
                'user_id' => '4',
            ],

            [
                'conversation_id' => '3',
                'user_id' => '1',
            ],

            [
                'conversation_id' => '4',
                'user_id' => '4',
            ],

            [
                'conversation_id' => '4',
                'user_id' => '2',
            ],

        ];

        foreach ($participants as $participant)
            Participant::create($participant);
    }
}
