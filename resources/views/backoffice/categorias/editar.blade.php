@extends('backoffice.template')

@section('titulo','Editar Categoría')

@section('tituloseccion','Editar categoría '.$categoria->nombre)

@section('ruta')
	<li class="breadcrumb-item"><a href="#">Inicio</a></li>
    <li class="breadcrumb-item active"><a href="{{route('categorias.index')}}">Autores</a></li>
    <li class="breadcrumb-item active">Crear</li>
@endsection

@section('contenido')

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                    <div class="card-body">
                        <form action="{{ route('categorias.update',$categoria->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="_method" value="PUT">
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Ingresar nombre" required value="{{ $categoria->nombre }}">
                            </div>

                            <div class="form-group">
                                <a class="btn btn-danger" href="{{ route('categorias.index') }}">Cancelar</a>
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
