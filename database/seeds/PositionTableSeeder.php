<?php

use Illuminate\Database\Seeder;
use App\Player\Position;

class PositionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Position::create([
          'name' => '投',
          'en_name' => 'P',
        ]);

        Position::create([
          'name' => '捕',
          'en_name' => 'C',
        ]);

        Position::create([
          'name' => '一',
          'en_name' => '1B',
        ]);

        Position::create([
          'name' => '二',
          'en_name' => '2B',
        ]);

        Position::create([
          'name' => '三',
          'en_name' => '3B',
        ]);

        Position::create([
          'name' => '遊',
          'en_name' => 'SS',
        ]);

        Position::create([
          'name' => '左',
          'en_name' => 'LF',
        ]);

        Position::create([
          'name' => '中',
          'en_name' => 'CF',
        ]);

        Position::create([
          'name' => '右',
          'en_name' => 'RF',
        ]);

        Position::create([
          'name' => '指',
          'en_name' => 'DH',
        ]);
    }
}
