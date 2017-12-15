<?php

use App\Post;
use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = [

            [
                'content' => 'Ovo je post 1',
                'conversation_id' => '1',
                'collegium_id' => '1',
                'user_id' => '1',

            ],

            [
                'content' => 'Ovo je post 2',
                'conversation_id' => '2',
                'collegium_id' => '2',
                'user_id' => '2',

            ],

            [
                'content' => 'Ovo je post 3',
                'conversation_id' => '3',
                'collegium_id' => '3',
                'user_id' => '3',
            ],

        ];

        foreach ($posts as $post)
            Post::create($post);
    }
}

