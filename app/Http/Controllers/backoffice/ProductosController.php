<?php

namespace App\Http\Controllers\backoffice;

use App\Autor;
use App\Categoria;
use App\Estadoproducto;
use App\Http\Controllers\Controller;
use App\Mail\ProductoCreado;
use App\Producto;
use App\Tipo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ProductosController extends Controller
{

    /**
     * Función para mostrar todos los productos creados
     */
    public function index(Request $request)
    {
        $categorias = Categoria::all();
        //$productos = Producto::all();
        // $productos = Producto::where('nombre','LIKE','%'.$request->nombre.'%')->get();
        $productos = Producto::nombre($request->nombre)
                                ->categoria($request->categoria_id)
                                ->precio($request->desde,$request->hasta)
                                ->get();
        // dd($productos);
        return view('backoffice.productos.index',compact('productos','request','categorias'));
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
     * función para guardar en la base de datos los productos
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

        //Envamos el correo electronico
        Mail::to('rharife@hotmail.com')->send(new ProductoCreado($request->nombre,$request->precio));
        //Fin envio de correo electronico

        return redirect()->route('productos.index')->with('status','Producto '.$request->nombre.' creado exitosamente!');
    }

    /**
     * Mostrar un producto especifico
     */
    public function show($id)
    {
        //
    }

    /**
     * Muestra el formulario para modificar un producto
     */
    public function edit($id)
    {
        //
        $producto = Producto::find($id);
        $categorias=Categoria::all();
        $autores=Autor::all();
        $tipos=Tipo::all();
        $estados=Estadoproducto::all();
        // dd($productos);
        return view('backoffice.productos.editar',compact('producto','categorias','autores','tipos','estados'));
    }

    /**
     * Guarda los cambios realizados del producto modificado en la base de datos
     */
    public function update(Request $request, $id)
    {
        //Validamos
        $request->validate([
            'isbn' => 'required|max:100',
            'nombre' => 'required|max:100',
            'precio' => 'required|numeric',
            'imagen' => 'mimes:jpeg,jpg,png',
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
        $producto = Producto::find($id);
        $producto->isbn = $request->isbn;
        $producto->nombre = $request->nombre;
        $producto->descripcion = $request->descripcion;
        $producto->precio = $request->precio;
        if($request->file('imagen')){ $producto->imagen = $nombreimg;}
        if($request->file('archivo')){ $producto->archivo = $nombrepdf;}
        $producto->categoria_id = $request->categoria_id;
        $producto->autor_id = $request->autor_id;
        $producto->tipo_id = $request->tipo_id;
        $producto->tipo_id = $request->tipo_id;
        $producto->estado_id = $request->estado_id;

        $producto->save();

        return redirect()->route('productos.index')->with('status','Producto '.$request->nombre.' modificado exitosamente!');
    }

    /**
     * Elimina el registro (como uso softdelete, solo le pone fecha de eliminacion)
     */
    public function destroy($id)
    {
        //
        $producto = Producto::find($id);
        $producto->delete();
        return redirect()->route('productos.index')->with('status','Producto '.$producto->nombre.' eliminado con éxito!');
    }

    /**
     * Inactiva un producto especifico
     */
    public function inactivar($id){
        $producto = Producto::find($id);
        $producto->estado_id = 3;
        $producto->save();
        return redirect()->route('productos.index')->with('status','Producto '.$producto->nombre.' inactivado con éxito!');
    }

    /**
     * Activa un producto especifico
     */
    public function activar($id){
        $producto = Producto::find($id);
        $producto->estado_id = 1;
        $producto->save();
        return redirect()->route('productos.index')->with('status','Activado '.$producto->nombre.' con éxito!');
    }
}
