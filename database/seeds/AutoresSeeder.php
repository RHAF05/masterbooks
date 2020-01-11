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
            'nombre' => 'Gabriel Garcia Marquez'
        ]);
    }
}
