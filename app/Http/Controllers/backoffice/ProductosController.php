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
     * función para guardar en la base de daos los productos
     */
    public function store(Request $request)
    {
        //Validamos
        $request->validate([
            'isbn' => 'required|max:100',
            'nombre' => 'required|max:100',
            'precio' => 'required|numeric',
            'imagen' => 'required|mimes:jpeg,jpg,png',
            'archivo' => 'mimes:pdf|max:10000',
            'categoria_id' => 'required',
            'autor_id' => 'required',
            'tipo_id' => 'required',
            'estado_id' => 'required',
        ]);

        //Subir la imagen al servidor
        $nombreimg = "";
        if($request->file('imagen')){
            $imagen = $request->file('imagen');
            $ruta = public_path().'/imgproductos';
            $nombreimg = uniqid()."-".$imagen->getClientOriginalName();
            $imagen->move($ruta,$nombreimg);
        }
        //Subir el pdf al servidor
        $nombrepdf = "";
        if($request->file('archivo')){
            $archivo = $request->file('archivo');
            $ruta = public_path().'/libros';
            $nombrepdf = uniqid()."-".$archivo->getClientOriginalName();
            $archivo->move($ruta,$nombrepdf);
        }

        //Insertamos los registros en la base de datos
        $producto = new Producto();
        $producto->isbn = $request->isbn;
        $producto->nombre = $request->nombre;
        $producto->descripcion = $request->descripcion;
        $producto->precio = $request->precio;
        $producto->imagen = $request->imagen;
        $producto->archivo = $request->archivo;
        $producto->categoria_id = $request->categoria_id;
        $producto->autor_id = $request->autor_id;
        $producto->tipo_id = $request->tipo_id;
        $producto->tipo_id = $request->tipo_id;
        $producto->estado_id = $request->estado_id;

        $producto->save();

        return redirect()->route('productos.index');
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
