<?php

use Illuminate\Database\Seeder;
use App\Player\Pitchtype;

class PitchtypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Pitchtype::create([
          'name' => '右投',
        ]);

        Pitchtype::create([
          'name' => '左投',
        ]);

        Pitchtype::create([
          'name' => '両投',
        ]);
    }
}
