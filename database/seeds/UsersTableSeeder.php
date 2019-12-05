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
        'email' => 'jhouyouyu@gmail.com',
        'password'  =>  Hash::make('a129132037'),
      ]);
    }
}
