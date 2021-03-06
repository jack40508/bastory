<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      $this->call([
        UsersTableSeeder::class,
        TeamsTableSeeder::class,
        EventsTableSeeder::class,
        EventtypeTableSeeder::class,
        AreasTableSeeder::class,
        TeamUserTableSeeder::class,
        EventUserTableSeeder::class,
        PostsTableSeeder::class,
        CommentsTableSeeder::class,
        PosttypeTableSeeder::class,
        PositionTableSeeder::class,
        PositionUserTableSeeder::class,
        HittypeTableSeeder::class,
        PitchtypeTableSeeder::class,
      ]);
    }
}
