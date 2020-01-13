<?php

use Illuminate\Database\Seeder;
use App\Team\Event\Eventtype;


class EventtypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Eventtype::create([
          'name' => '公式戦',
        ]);

        Eventtype::create([
          'name' => '練習試合',
        ]);

        Eventtype::create([
          'name' => '練習',
        ]);
    }
}
