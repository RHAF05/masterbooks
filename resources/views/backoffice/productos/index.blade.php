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
                    <a class="btn btn-danger" href="{{ route('productos.create') }}"><i class="fas fa-file-pdf"></i></a>

                    {{-- filtros --}}
                    <form action="{{ route('productos.index') }}" method="GET" class="form-inline">
                        <input type="text" name="nombre" id="nombre" class="form-control" placeholder="nombre..." value="{{$request->nombre}}">
                        <select name="categoria_id" id="categoria_id" class="form-control">
                            <option value="">Seleccione categoria...</option>
                            @foreach ($categorias as $categoria)
                                <option value="{{$categoria->id}}" @if ($categoria->id==$request->categoria_id) selected @endif>{{$categoria->nombre}}</option>
                            @endforeach
                        </select>
                        <input type="number" name="desde" id="desde" class="form-control" placeholder="Precio desde..." value="{{$request->desde}}">
                        <input type="number" name="hasta" id="hasta" class="form-control" placeholder="Precio hasta..." value="{{$request->hasta}}">
                        <button type="submit" class="btn btn-info"><i class="fas fa-search"></i></button>
                        <a class="btn btn-primary" href="{{ route('productos.index') }}"><i class="fas fa-sync"></i></a>
                    </form>
                    {{-- fin filtros --}}
              	</div>

                <table class="table table-striped">
                	<thead>
                		<th>ISBN</th>
                		<th>Nombre</th>
                		<th>Descripcion</th>
                		<th>Categor&iacute;a</th>
                		<th>Precio</th>
                		<th>Imagen</th>
                		<th>Archivo</th>
                		<th>Estado</th>
                		<th colspan="3">Opciones</th>
                	</thead>
                	<tbody>
                		@foreach($productos as $producto)
	                		<tr>
	                			<td>{{$producto->isbn}}</td>
	                			<td>{{$producto->nombre}}</td>
	                			<td>{{$producto->descripcion}}</td>
	                			<td>{{$producto->categoria->nombre}}</td>
	                			<td>${{ number_format($producto->precio,2,',','.')}}</td>
	                			<td><img src="{{ asset('imgproductos/'.$producto->imagen.'') }}" alt="" width="50"></td>
	                			<td>{{$producto->archivo}}</td>
	                			<td>{{$producto->estado->nombre}}</td>
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
