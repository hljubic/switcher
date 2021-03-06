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
        $this->call(CollegiumsTableSeeder::class);
        $this->call(TasksTableSeeder::class);
        $this->call(TaskUserTableSeeder::class);
        $this->call(MessagesTableSeeder::class);
        $this->call(ParticipantsTableSeeder::class);
        $this->call(ClassesTableSeeder::class);
        $this->call(AttendancesTableSeeder::class);
        $this->call(CollegiumStudyTableSeeder::class);
        $this->call(FilesTableSeeder::class);
        $this->call(FollowersUsersTableSeeder::class);
        $this->call(CollegiumUserTableSeeder::class);
        $this->call(PostsTableSeeder::class);

    }
}
