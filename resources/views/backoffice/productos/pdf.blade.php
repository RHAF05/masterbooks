<table class="table table-striped">
    <thead>
        <th>ISBN</th>
        <th>Nombre</th>
        <th>Descripcion</th>
        <th>Categor&iacute;a</th>
        <th>Precio</th>
        {{--<th>Imagen</th>
        <th>Archivo</th>--}}
        <th>Estado</th>
    </thead>
    <tbody>
        @foreach($productos as $producto)
            <tr>
                <td>{{$producto->isbn}}</td>
                <td>{{$producto->nombre}}</td>
                <td>{{$producto->descripcion}}</td>
                <td>{{$producto->categoria->nombre}}</td>
                <td>${{ number_format($producto->precio,2,',','.')}}</td>
                {{--<td><img src="{{ asset('imgproductos/'.$producto->imagen.'') }}" alt="" width="50"></td>
                <td>{{$producto->archivo}}</td>--}}
                <td>{{$producto->estado->nombre}}</td>
            </tr>
        @endforeach
    </tbody>
</table>
