<?php

use Illuminate\Database\Seeder;
use App\Post\Posttype;

class PosttypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Posttype::create([
          'name' => 'メンバー募集',
        ]);

        Posttype::create([
          'name' => '相手募集',
        ]);
    }
}
