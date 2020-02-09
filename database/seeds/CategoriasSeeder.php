<?php

use App\Categoria;
use Illuminate\Database\Seeder;

class CategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $categoria = Categoria::create([
            'nombre' => 'Infantil'
        ]);
        $categoria = Categoria::create([
            'nombre' => 'Terror'
        ]);
        $categoria = Categoria::create([
            'nombre' => 'Novela'
        ]);
        $categoria = Categoria::create([
            'nombre' => 'Normas'
        ]);
    }
}
