<?php

namespace App\Http\Controllers\backoffice;

use App\Categoria;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $categorias=Categoria::where('nombre','LIKE','%'.$request->nombre.'%')->get();
        return view('backoffice.categorias.index',compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backoffice.categorias.crear');
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
        $request->validate([
            'nombre'=>'required|max:100|unique:App\Categoria',
        ]);
        $categoria = new Categoria();
        $categoria->nombre=$request->nombre;
        $categoria->save();

        return redirect()->route('categorias.index')->with('status','Categoria '.$request->nombre.' guardada con éxito');
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
        $categoria = Categoria::find($id);
        return view('backoffice.categorias.editar', compact('categoria'));
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
        $request->validate([
            'nombre' => 'required|max:100|unique:App\Categoria,nombre'
        ]);
        $categoria = Categoria::find($id);
        $categoria->nombre = $request->nombre;
        $categoria->save();
        return redirect()->route('categorias.index')->with('status','Categoria '.$request->nombre.' actualizada con exito!');
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
        $categoria = Categoria::find($id);
        $categoria->delete();
        return redirect()->route('categorias.index')->with('status','Categoria '.$categoria->nombre.' eliminada!');
    }
}
