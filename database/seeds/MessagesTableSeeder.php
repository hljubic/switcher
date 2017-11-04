<?php

use App\Message;
use Illuminate\Database\Seeder;

class MessagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $messages = [

            [
                'content' => 'Dobar dan!',
                'conversation_id' => '1',
                'sender_id' => '1',
                'created_at' =>'2017-10-27 09:00:00'
            ],

            [
                'content' => 'Dobro jutro!',
                'conversation_id' => '2',
                'sender_id' => '2',
                'created_at' =>'2017-10-27 09:30:00'
            ],

            [
                'content' => 'Dobro večer!',
                'conversation_id' => '3',
                'sender_id' => '3',
                'created_at' =>'2017-10-27 09:35:00'
            ],

            [
                'content' => 'Pozdrav!',
                'conversation_id' => '4',
                'sender_id' => '4',
                'created_at' =>'2017-10-27 09:45:00'
            ],

        ];

        foreach ($messages as $message)
            Message::create($message);

    }
}
