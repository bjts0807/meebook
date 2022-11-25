@extends('plantilla')

@section('content')
    <h1 class="text-center mt-2">Listado de libros</h1>
    <h3 class="text-center ">Categoria: <span class="text-success">{{$nombre_categoria->nombre}}</span></h3>
    <a href="{{route('dashboard')}}" class="btn btn-danger">Regresar</a>
    <div class="row " >
        @foreach ($categorias as $item )
            @if ($item->libros_count>0)
                @foreach ($item->libros as $libro )
                    <div class="col-lg-3 col-md-3" >
                        <a class="stretched-link text-decoration-none nav-link" href="../uploads/{{$libro->pdf}}">
                            <div class="card">
                                <img src="{{asset('./public/img/movie.png')}}" class="img-fluid" alt="">
                                <div class="card-body">
                                    <h2>Titulo: <span class="text-muted">{{$libro->titulo}}</span></h2>
                                    <h2>Fecha: <span class="text-muted">{{$libro->fecha}}</span></h2>
                                    <h2>Autor: <span class="text-muted">{{$libro->autor}}</span></h2>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            @else
                <div class="alert alert-warning text-center mt-2">No hay libros para esta categoria...</div>
            @endif
        @endforeach
    </div>
@endsection
