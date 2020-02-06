<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      User::create([
        'name' => '周祐宇',
        'nickname' => 'ジョウ',
        'birthday' => '1993-03-10',
        'gender'  =>  '1',
        'hittype_id'  =>  '3',
        'pitchtype_id'  =>  '2',
        'email' => 'jhouyouyu@gmail.com',
        'password'  =>  Hash::make('a129132037'),
      ]);

      User::create([
        'name' => '周',
        'nickname' => 'YoYu',
        'birthday' => '1993-03-10',
        'gender'  =>  '1',
        'hittype_id'  =>  '1',
        'pitchtype_id'  =>  '1',
        'email' => 'jack40508@gmail.com',
        'password'  =>  Hash::make('yoyu930310'),
      ]);
    }
}
