<?php

use App\Tipo;
use Illuminate\Database\Seeder;

class TiposProductosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $tipo = Tipo::create([
            'nombre' => 'Fisico'
        ]);
        //
        $tipo = Tipo::create([
            'nombre' => 'Digital'
        ]);
    }
}
