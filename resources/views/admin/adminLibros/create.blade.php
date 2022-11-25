@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ __('Creacion de Libros') }}
                </div>

                <div class="card-body">
                    <form action="{{ url('/admin-config-libros-create') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                          <label >fecha</label>
                          <input type="date" class="form-control"  name="fecha">
                        </div>
                        <div class="form-group">
                            <label >Titulo</label>
                            <input type="text" class="form-control"  name="titulo">
                        </div>
                        <div class="form-group">
                            <label >Autor</label>
                            <input type="text" class="form-control"  name="autor">
                        </div>
                        <div class="form-group">
                            <label >Pdf</label>
                            <input type="file" name="pdf">
                        </div>
                        <div class="form-group">
                            <label>categoria</label>
                            <div>
                                <select name="categoria_id" id="categoria_id" class="form-control" required>
                                    <option value="" selected="selected"> - Seleccione - </option>
                                    @foreach ($categorias as $item)
                                        <option value="{{ $item->id }}">{{ $item->nombre }}</option>$
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
