<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estadoproducto extends Model
{
    protected $table='estados_productos';
    protected $fillable=['nombre'];

    public function productos(){
        return $this->hasMany('App\Producto');
    }
}
