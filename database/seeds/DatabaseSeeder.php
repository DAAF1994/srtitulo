<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$this->call(usersTableSeeder::class);
        $this->call(GenreTableSeeder::class);
        $this->call(platform::class);
        $this->call(games::class);
        $this->call(platformgame::class);
        $this->call(genregames::class);
    }
}
