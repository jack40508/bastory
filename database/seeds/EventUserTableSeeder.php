<?php

use Illuminate\Database\Seeder;
use App\Team\Event\EventUser;

class EventUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      //
      EventUser::create([
        'event_id' =>  '1',
        'user_id' =>  '1',
        'reply' =>  '0',
      ]);

      EventUser::create([
        'event_id' =>  '2',
        'user_id' =>  '1',
        'reply' =>  '1',
      ]);

      EventUser::create([
        'event_id' =>  '2',
        'user_id' =>  '2',
        'reply' =>  '-1',
      ]);

      EventUser::create([
        'event_id' =>  '3',
        'user_id' =>  '1',
        'reply' =>  '-1',
      ]);

      EventUser::create([
        'event_id' =>  '4',
        'user_id' =>  '1',
        'reply' =>  '-1',
      ]);
    }
}
