<?php

use Illuminate\Database\Seeder;
use App\Player\PositionUser;

class PositionUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        //
        PositionUser::create([
          'user_id' => '1',
          'position_id' => '1',
        ]);

        PositionUser::create([
          'user_id' => '1',
          'position_id' => '4',
        ]);

        PositionUser::create([
          'user_id' => '2',
          'position_id' => '6',
        ]);

        PositionUser::create([
          'user_id' => '3',
          'position_id' => '7',
        ]);

        PositionUser::create([
          'user_id' => '3',
          'position_id' => '8',
        ]);

        PositionUser::create([
          'user_id' => '3',
          'position_id' => '9',
        ]);
    }
}
