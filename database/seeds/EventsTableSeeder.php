<?php

use Illuminate\Database\Seeder;
use App\Team\Event\Event;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Event::create([
          'name' => '1-1テストイベント',
          'team_id' => '1',
          'rival' =>  '中日龍',
          'eventtype_id' => '0',
          'location' =>  '大阪HAL',
          'address' =>  '大阪府大阪市北区梅田３丁目３−1',
          'datetime'  =>  '2019/12/31 13:30:00',
          'gathertime'  =>  '11:00:00',
          'contant' => 'テスト用イベント1',
        ]);

        Event::create([
          'name' => '2-1テストイベント',
          'team_id' => '2',
          'rival' =>  '楽天',
          'eventtype_id' => '1',
          'location' =>  '大阪HAL',
          'address' =>  '大阪府大阪市北区梅田３丁目３−1',
          'datetime'  =>  '2019/12/31 13:30:00',
          'gathertime'  =>  '11:00:00',
          'contant' => 'テスト用イベント2',
        ]);

        Event::create([
          'name' => '1-2テストイベント',
          'team_id' => '1',
          'rival' =>  'ソフトバンク',
          'eventtype_id' => '2',
          'location' =>  '大阪HAL',
          'address' =>  '大阪府大阪市北区梅田３丁目３−1',
          'datetime'  =>  '2019/12/31 13:30:00',
          'gathertime'  =>  '11:00:00',
          'contant' => 'テスト用イベント3',
        ]);
    }
}
