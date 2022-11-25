@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ __('Actualizacion de Categorias') }}
                </div>

                <div class="card-body">
                    <form  action="{{ url('/admin-config-categorias-update/'.$categorias->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label >Nombre</label>
                            <input type="text" class="form-control"  name="nombre" value="{{$categorias->nombre}}">
                        </div>
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                        {{method_field('PATCH')}}
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
