<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class GenreTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $generos = [
        ['id' => 1, 'name' => 'Acción', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
        ['id' => 2, 'name' => 'RPG', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
        ['id' => 3, 'name' => 'Puzzle', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')]
        ];
        DB::table('genre')->insert($generos);
    }
}
