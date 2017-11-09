<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class usersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        	'id' => 1,
            'name' => 'David Acuña',
            'email' => 'daaf1994@gmail.com',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'password' => bcrypt('david123'),
        ]);
        //
    }
}
