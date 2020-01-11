<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Producto extends Model
{
    use SoftDeletes;

    protected $table = 'productos';
    protected $fillable = [
        'isbn', 'nombre', 'descripcion', 'precio', 'archivo', 'imagen',
        'categoria_id', 'autor_id', 'tipo_id', 'estado_id'
    ];

    protected $dates = ['delete_at'];
}
