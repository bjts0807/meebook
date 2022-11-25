<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index(){
        $categorias=Categoria::all();
        return view('categorias.index',compact('categorias'));
    }

    public function list(){
        $categorias=Categoria::all();
        return view('admin.adminCategorias.index',compact('categorias'));
    }

    public function create(){
        return view('admin.adminCategorias.create');
    }

    public function store(Request $request){
        $datos= request()->except('_token');
        Categoria::insert($datos);
        $categorias=Categoria::all();
        return redirect()->route('categorias.config.index')->with( ['categorias' => $categorias] );
    }

    public function edit($id)
    {
        $categorias=Categoria::findOrFail($id);
        return view('admin.adminCategorias.edit',compact('categorias'));
    }

    public function update(Request $request, $id)
    {
        $datos=request()->except(['_token','_method']);
        Categoria::where('id','=',$id)->update($datos);
        $categorias=Categoria::all();
        return redirect()->route('categorias.config.index')->with( ['categorias' => $categorias] );

    }

    public function destroy($id)
    {
        Categoria::destroy($id);
        $categorias=Categoria::all();
        return redirect()->route('categorias.config.index')->with( ['categorias' => $categorias] );
    }

    public function show($id)
    {
        $categorias=Categoria::where('id',$id)->
        withCount('libros')
        ->with('libros')->get();
        $nombre_categoria = Categoria::find($id);
        //return response()->json($categorias);
        return view('categoriasShow',compact('categorias','nombre_categoria'));
    }
}
