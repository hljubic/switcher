<?php

use App\Conversation;
use Illuminate\Database\Seeder;

class ConversationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $conversations = [

            [
                'title' => 'Razgovor 1',
                'creator_id' => '1',
            ],

            [
                'title' => 'Razgovor 2',
                'creator_id' => '2',
            ],

            [
                'title' => 'Razgovor 3',
                'creator_id' => '3',
            ],

            [
                'title' => 'Razgovor 4',
                'creator_id' => '4',
            ],

        ];

        foreach ($conversations as $conversation)
            Conversation::create($conversation);
    }
}
