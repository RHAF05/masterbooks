<?php

namespace App\Http\Controllers\backoffice;

use App\Autor;
use App\Categoria;
use App\Estadoproducto;
use App\Http\Controllers\Controller;
use App\Producto;
use App\Tipo;
use Illuminate\Http\Request;

class ProductosController extends Controller
{

    /**
     * Función para mostrar todos los productos creados
     */
    public function index()
    {
        $productos = Producto::all();
        //dd($productos);
        return view('backoffice.productos.index',compact('productos'));
    }

    /**
     * Función para mostrar el formulario para crear un nuevo producto
     */
    public function create()
    {
        $categorias=Categoria::all();
        $autores=Autor::all();
        $tipos=Tipo::all();
        $estados=Estadoproducto::all();
        return view('backoffice.productos.crear', compact('categorias','autores','tipos','estados'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
