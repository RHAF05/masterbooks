@extends('backoffice.template')

@section('titulo','Productos')

@section('tituloseccion','Productos')

@section('ruta')
	<li class="breadcrumb-item"><a href="#">Inicio</a></li>
    <li class="breadcrumb-item active">Productos</li>
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
              		<a class="btn btn-success" href="{{ route('productos.create') }}"><i class="fas fa-plus"></i></a>
              	</div>

                <table class="table table-striped">
                	<thead>
                		<th>ISBN</th>
                		<th>Nombre</th>
                		<th>Descripcion</th>
                		<th>Precio</th>
                		<th>Imagen</th>
                		<th>Archivo</th>
                		<th colspan="3">Opciones</th>
                	</thead>
                	<tbody>
                		@foreach($productos as $producto)
	                		<tr>
	                			<td>{{$producto->isbn}}</td>
	                			<td>{{$producto->nombre}}</td>
	                			<td>{{$producto->descripcion}}</td>
	                			<td>${{ number_format($producto->precio,2,',','.')}}</td>
	                			<td><img src="{{ asset('imgproductos/'.$producto->imagen.'') }}" alt="" width="50"></td>
	                			<td>{{$producto->archivo}}</td>
                                <td><a class="btn btn-warning" href="{{ route('productos.edit',$producto->id) }}" title="Modificar"><i class="fas fa-edit"></i></a></td>
                                <td>
                                    @if($producto->estado_id==3)
                                        <a class="btn btn-danger" href="{{ route('productos.activar',$producto->id) }}" title="Activar"><i class="fas fa-check"></i></a>
                                    @else
                                        <a class="btn btn-success" href="{{ route('productos.inactivar',$producto->id) }}" title="Inactivar"><i class="fas fa-check"></i></a>
                                    @endif
                                </td>
                                <td>
                                    <form action="{{ route('productos.destroy',$producto->id) }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="_method" value="delete">
                                        <button class="btn btn-danger" type="submit"><i class="fas fa-trash"></i></button>
                                        {{-- <a class="btn btn-danger" href="{{ route('productos.destroy',$producto->id) }}" title="Eliminar"><i class="fas fa-trash"></i></a> --}}
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
