<?php

use Illuminate\Database\Seeder;
use App\Post;
class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts =[

            [
                'content' => 'Ovo je post 1',
                'collegium_id' => '2',

            ],

            [
                'content' => 'Ovo je post 2',
                'collegium_id' => '3',

            ],

            [
                'content' => 'Ovo je post 3',
                'collegium_id' => '4',
            ],

        ];

        foreach($posts as $post)
            Post::create($post);
    }
}
