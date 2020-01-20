@extends('backoffice.template')

@section('titulo','Editar Autor')

@section('tituloseccion','Editar Autor '.$autor->nombre)

@section('ruta')
	<li class="breadcrumb-item"><a href="#">Inicio</a></li>
    <li class="breadcrumb-item active"><a href="{{route('autores.index')}}">Autores</a></li>
    <li class="breadcrumb-item active">Crear</li>
@endsection

@section('contenido')

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                    <div class="card-body">
                        <form action="{{ route('autores.update',$autor->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="_method" value="PUT">
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Ingresar nombre" required value="{{ $autor->nombre }}">
                            </div>

                            <div class="form-group">
                                <a class="btn btn-danger" href="{{ route('autores.index') }}">Cancelar</a>
                                <button class="btn btn-success">Guardar <i class="fas fa-save"></i></button>
                            </div>
                        </form>

                    </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
@endsection
