<?php

namespace App\Http\Controllers\backoffice;

use App\Autor;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AutoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $autores = Autor::where('nombre','LIKE','%'.$request->nombre.'%')->get();
        return view('backoffice.autores.index',compact('autores','request'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backoffice.autores.crear');
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
            'nombre' => 'required|max:150|unique:App\Autor',
        ]);

        $autor = new Autor();

        $autor->nombre=$request->nombre;
        $autor->save();
        return redirect()->route('autores.index')->with('status','Autor '.$request->nombre.' creado con &eacute;xito!');
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
        $autor = Autor::find($id);
        return view('backoffice.autores.editar',compact('autor'));
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
            'nombre' => 'required|max:150|unique:App\Autor',
        ]);

        $autor = Autor::find($id);

        $autor->nombre = $request->nombre;
        $autor->save();
        return redirect()->route('autores.index')->with('status','Autor '.$request->nombre.' actualizado con exito!');
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
        $autor = Autor::find($id);
        $autor->delete();
        return redirect()->route('autores.index')->with('status','Autor '.$autor->nombre.' eliminado con éxito!');
    }
}
