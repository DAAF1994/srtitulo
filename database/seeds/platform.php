<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class platform extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$platforms = [ 
		['id' => 1, 'name' => 'PC', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
		['id' => 2, 'name' => 'iOS', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
		['id' => 3, 'name' => 'Android', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
		['id' => 4, 'name' => 'PS4', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
		['id' => 5, 'name' => 'Xbox One', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
		['id' => 6, 'name' => 'Nintendo Switch', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
		['id' => 7, 'name' => 'PS3', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
		['id' => 8, 'name' => 'Xbox 360', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
		['id' => 9, 'name' => 'Nintendo Wii U', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
		['id' => 10, 'name' => 'Nintendo Wii', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
		['id' => 11, 'name' => 'Nintendo 3DS', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
		['id' => 12, 'name' => 'PS vita', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
		['id' => 13, 'name' => 'Nintendo DS', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
		['id' => 14, 'name' => 'PSP', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')], 
		];

		 DB::table('platform')->insert($platforms);
    }
}
