<?php

use App\Autor;
use Illuminate\Database\Seeder;

class AutoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $autor = Autor::create([
            'nombre' => 'José Gregorio Arias Noriega'
        ]);

        $autor = Autor::create([
            'nombre' => 'Eduard Vega Ordoñez'
        ]);

        $autor = Autor::create([
            'nombre' => 'Gabriel García Márquez'
        ]);
    }
}
