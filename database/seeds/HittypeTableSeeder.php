<?php

use Illuminate\Database\Seeder;
use App\Player\Hittype;

class HittypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Hittype::create([
          'name' => '右打',
        ]);

        Hittype::create([
          'name' => '左打',
        ]);

        Hittype::create([
          'name' => '両打',
        ]);

    }
}
