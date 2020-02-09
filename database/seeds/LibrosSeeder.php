<?php

use App\Producto;
use Illuminate\Database\Seeder;

class LibrosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $libro = Producto::create([
            'isbn' => rand(1,10000),
            'nombre' => 'Reforma Tributaria Comentada, Ley 2010 de 2019',
            'precio' => 60000,
            'imagen' => '',
            'archivo' => '',
            'categoria_id' => 4,
            'autor_id' => 1,
            'tipo_id' => 1,
            'estado_id' => 1,
        ]);

        $libro = Producto::create([
            'isbn' => rand(1,10000),
            'nombre' => 'Información Exógena para la DIAN 2019',
            'precio' => 60000,
            'imagen' => '',
            'archivo' => '',
            'categoria_id' => 4,
            'autor_id' => 1,
            'tipo_id' => 1,
            'estado_id' => 1,
        ]);

        //Str::random(40);
    }
}
