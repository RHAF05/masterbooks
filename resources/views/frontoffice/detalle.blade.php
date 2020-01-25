@extends('frontoffice.template')

@section('titulo',$producto->nombre)

@section('contenido')

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <img class="img-thumbnail" src="{{asset('imgproductos/'.$producto->imagen)}}" alt="{{$producto->nombre}}" >
            </div>
            <div class="col-md-6">
                <div class="card text-center">
                    <div class="card-header">
                        Descripci&oacute;n
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{$producto->nombre}}</h5>
                        <p class="card-text text-left">{{$producto->descripcion}}</p>
                        <a href="#" class="btn btn-success btn-lg btn-block"><i class="fas fa-shopping-cart"></i></a>
                    </div>
                    <div class="card-footer text-muted">
                        2 days ago
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
