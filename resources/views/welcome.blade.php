@extends('plantilla')

@section('content')
    <h3 class="text-center mt-2">Menú de categorias: <span class="text-success">Meebook</span></h3>
    <a href="{{route('login')}}" class="btn btn-primary">Inicie sesion para Administrar</a>
    <div class="row mt-2" >
        @foreach ($categorias as $item )
        <div class="col-lg-3 col-md-3" >
            <a class="stretched-link text-decoration-none nav-link" href="{{route('categorias.show',$item->id)}}">
                <div class="card">
                    <img src="{{asset('../../public/img/movie.png')}}" class="img-fluid" alt="">
                    <div class="card-body">
                        <h2><span class="text-success">{{$item->nombre}}</span></h2>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>

@endsection
