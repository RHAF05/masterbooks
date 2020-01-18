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

    //relacion con el modelo Estadoproducto
    public function estado(){
        return $this->belongsTo('App\Estadoproducto');
    }

    public function scopeNombre($query,$nombre){
        return $query->where('nombre','LIKE','%'.$nombre.'%');
    }

    public function categoria(){
        return $this->belongsTo('App\Categoria');
    }

    public function scopeCategoria($query,$categoria_id){
        if(!empty($categoria_id))
            return $query->where('categoria_id',$categoria_id);
    }

    public function scopePrecio($query,$desde, $hasta){
        if($desde & $hasta)
            return $query->whereBetween('precio', [$desde,$hasta]);
        else if ($desde)
            return $query->where('precio', '>',$desde);
        else if ($hasta)
            return $query->where('precio', '<',$hasta);
    }
}
