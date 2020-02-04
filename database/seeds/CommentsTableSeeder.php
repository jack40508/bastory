<?php

use Illuminate\Database\Seeder;
use App\Post\Comment;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Comment::create([
          'user_id' => '2',
          'post_id' => '1',
          'content' => '1testQ',
        ]);

        Comment::create([
          'user_id' => '1',
          'post_id' => '1',
          'content' => '1testA',
        ]);
    }
}
