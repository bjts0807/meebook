@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{ __('libros') }}
                    <a href="{{ route('admin.libros.create')}}" class="btn btn-primary btn-sm">Nueva</a>
                </div>

                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>Fecha</th>
                            <th>Titulo</th>
                            <th>Autor</th>
                            <th>Pdf</th>
                            <th>Categoria</th>
                            <th>Opciones</th>
                        </tr>
                        @foreach ($libros as $item)
                        <tr>
                            <th>{{$item->fecha}}</th>
                            <th>{{$item->titulo}}</th>
                            <th>{{$item->autor}}</th>
                            <th>
                                <a href="uploads/{{$item->pdf}}" target="_blank" >{{$item->pdf}}</a></th>
                            <th>{{$item->categoria->nombre}}</th>
                            <th>
                                <a href="{{ url('/libros-config-edit/'.$item->id)}}" class="btn btn-warning">
                                    Editar
                                </a>
                                <form action="{{ url('/admin-config-libros-delete/'.$item->id)}}" method="post">
                                    @csrf
                                    {{method_field('DELETE')}}
                                    <input type="submit" onclick="return comfirm('Quieres Borrar?')" value="Eliminar" class="btn btn-danger">
                                </form>
                            </th>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
