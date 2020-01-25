<?php

namespace App\Http\Controllers\frontoffice;

use App\Http\Controllers\Controller;
use App\Producto;
use Illuminate\Http\Request;

class PaginasController extends Controller
{
    //
    public function inicio(){
        $productos = Producto::where('estado_id',1)->get();
        return view('frontoffice.inicio',compact('productos'));
    }

    public function detalle($id){
        $producto = Producto::find($id);
        return view('frontoffice.detalle',compact('producto'));
    }
}
