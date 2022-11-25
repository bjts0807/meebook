@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ __('categorias') }}
                    <a href="{{ route('admin.categorias.create')}}" class="btn btn-primary btn-sm">Nueva</a>
                </div>

                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>No</th>
                            <th>Nombre</th>
                            <th>Opciones</th>
                        </tr>
                        @foreach ($categorias as $item)
                        <tr>
                            <th>{{$loop->iteration }}</th>
                            <th>{{$item->nombre}}</th>
                            <th>
                                <a href="{{ url('/categorias-config-edit/'.$item->id)}}" class="btn btn-warning">
                                    Editar
                                </a>
                                <form action="{{ url('/admin-config-categorias-delete/'.$item->id)}}" method="post">
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
