<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(FacultiesTableSeeder::class);
        $this->call(StudiesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(ConversationsTableSeeder::class);
        $this->call(MessagesTableSeeder::class);
        $this->call(ParticipantsTableSeeder::class);
    }
}
