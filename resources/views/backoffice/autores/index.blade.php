@extends('backoffice.template')

@section('titulo','Autores')

@section('tituloseccion','Autores')

@section('ruta')
	<li class="breadcrumb-item"><a href="#">Inicio</a></li>
    <li class="breadcrumb-item active">Autores</li>
@endsection

@section('contenido')

    @if (session('status'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
            {{ session('status') }}
        </div>
    @endif

	<div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
              	<div class="text-right">
                    <a class="btn btn-success" href="{{ route('autores.create') }}"><i class="fas fa-plus"></i></a>

                    {{-- filtros --}}
                    <form action="{{ route('autores.index') }}" method="GET" class="form-inline">
                        <input type="text" name="nombre" id="nombre" class="form-control" placeholder="nombre..." value="{{$request->nombre ?? ''}}">
                        <button type="submit" class="btn btn-info"><i class="fas fa-search"></i></button>
                        <a class="btn btn-primary" href="{{ route('autores.index') }}"><i class="fas fa-sync"></i></a>
                    </form>
                    {{-- fin filtros --}}
              	</div>

                <table class="table table-striped">
                	<thead>
                		<th>Nombre</th>
                	</thead>
                	<tbody>
                		@foreach($autores as $autor)
	                		<tr>
	                			<td>{{$autor->isbn}}</td>
	                			<td>{{$autor->nombre}}</td>
                                <td><a class="btn btn-warning" href="{{ route('autores.edit',$autor->id) }}" title="Modificar"><i class="fas fa-edit"></i></a></td>
                                <td>
                                    <form action="{{ route('autores.destroy',$autor->id) }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="_method" value="delete">
                                        <button class="btn btn-danger" type="submit" title="Eliminar"><i class="fas fa-trash"></i></button>
                                    </form>
                                </td>
	                		</tr>
	                	@endforeach
                	</tbody>
                </table>

              </div>
            </div>
          </div>

        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->

@endsection
