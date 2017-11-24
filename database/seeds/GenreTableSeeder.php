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
        ['id' => 3, 'name' => 'Deportes', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
        ['id' => 4, 'name' => 'Simulación', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
        ['id' => 5, 'name' => 'Conducción', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
        ['id' => 6, 'name' => 'Plataformas', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
        ['id' => 7, 'name' => 'Puzzle', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
        ['id' => 8, 'name' => 'Sigilo', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
        ['id' => 9, 'name' => 'Fist Person Shooter', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
        ['id' => 10, 'name' => 'Mundo Abierto', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
        ['id' => 11, 'name' => 'Novela Visual', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
        ['id' => 12, 'name' => 'Rogue-like', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
        ['id' => 13, 'name' => 'Metroidvania', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
        ['id' => 14, 'name' => 'Aventura', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
        ['id' => 15, 'name' => "Shoot em' up", 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
        ['id' => 16, 'name' => "Beat em´up", 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
        ['id' => 17, 'name' => "Run n'gun", 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
        ['id' => 18, 'name' => "Sandbox", 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
        ['id' => 19, 'name' => "Estrategia", 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
        ['id' => 20, 'name' => "Carreras", 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
        ['id' => 21, 'name' => "Misterio", 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
        ['id' => 22, 'name' => "Sobrevivencia", 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
        ['id' => 23, 'name' => "Lucha", 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
        ['id' => 24, 'name' => "Musical", 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],


        ];
        DB::table('genre')->insert($generos);
    }
}
