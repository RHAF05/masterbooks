<?php

use App\Estadoproducto;
use Illuminate\Database\Seeder;

class EstadosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $estado = Estadoproducto::create([
            'nombre' => 'Disponible'
        ]);
        $estado = Estadoproducto::create([
            'nombre' => 'Agotado'
        ]);
        $estado = Estadoproducto::create([
            'nombre' => 'Inactivo'
        ]);
    }
}
