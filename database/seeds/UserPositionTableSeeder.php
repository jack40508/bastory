<?php

use Illuminate\Database\Seeder;
use App\Player\UserPosition;

class UserPositionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        UserPosition::create([
          'user_id' =>  '1',
          'position_id' =>  '1',
        ]);

        UserPosition::create([
          'user_id' =>  '1',
          'position_id' =>  '4',
        ]);

        UserPosition::create([
          'user_id' =>  '2',
          'position_id' =>  '6',
        ]);
    }
}
