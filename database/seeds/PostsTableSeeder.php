<?php

use Illuminate\Database\Seeder;
use App\Post\Post;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Post::create([
          'user_id' => '1',
          'title' => 'Test Post',
          'posttype_id' =>  '1',
          'team_id' => '1',
          'area_id' => '33',
          'content' => '1testContant',
          'status' =>  true,
        ]);
    }
}
