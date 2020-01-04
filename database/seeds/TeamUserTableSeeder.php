<?php

use Illuminate\Database\Seeder;
use App\Team\TeamUser;

class TeamUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        TeamUser::create([
          'team_id' =>  '1',
          'user_id' =>  '1',
        ]);

        TeamUser::create([
          'team_id' =>  '2',
          'user_id' =>  '1',
        ]);
    }
}
