@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{ __('Actualizacion de Libros') }}
                </div>

                <div class="card-body">
                    <form  action="{{ url('/admin-config-libros-update/'.$libros->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                          <label >fecha</label>
                          <input type="date" class="form-control"  name="fecha" value="{{$libros->fecha}}">
                        </div>
                        <div class="form-group">
                            <label >Titulo</label>
                            <input type="text" class="form-control"  name="titulo" value="{{$libros->titulo}}">
                        </div>
                        <div class="form-group">
                            <label >Autor</label>
                            <input type="text" class="form-control"  name="autor" value="{{$libros->autor}}">
                        </div>
                        <div class="form-group">
                            <label >Pdf</label>
                            <label Class="text-muted" >{{$libros->pdf}}</label>
                            <input type="file" name="pdf">
                        </div>
                        <div class="form-group">
                            <label>categoria</label>
                            <div>
                                <select name="categoria_id" id="categoria_id" class="form-control" required>
                                    <option value="" selected="selected"> - Seleccione - </option>
                                    @foreach ($categorias as $item)
                                        <option value="{{ $item->id }}"
                                            {{$libros->categoria_id==$item->id?'selected':''}}>{{ $item->nombre }}</option>$
                                    @endforeach
                                </select>
                            </div>
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
