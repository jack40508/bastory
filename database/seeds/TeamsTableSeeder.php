<?php

use Illuminate\Database\Seeder;
use App\Team\Team;

class TeamsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Team::create([
        'name' => '阪神虎',
        'area_id' => '33',
        'leader_id' => '1',
        'about' =>  'Test team1',
      ]);

      Team::create([
        'name' => '読売巨人',
        'area_id' => '41',
        'leader_id' => '2',
        'about' =>  'Test team2',
      ]);
    }
}
