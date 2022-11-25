<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Libro;
use Illuminate\Http\Request;

class LibroController extends Controller
{
    public function index(){
        $libros=Libro::all();
        return view('libros.index',compact('libros'));
    }

    public function list(){
        $libros=Libro::all();
        return view('admin.adminLibros.index',compact('libros'));
    }

    public function create(){
        $categorias=Categoria::all();
        return view('admin.adminLibros.create',compact('categorias'));
    }

    public function store(Request $request){
        $datos= request()->except('_token');
        if ($request->hasFile('pdf')) {
            $file = $request->file('pdf');
            $name = time() . $file->getClientOriginalName();
            $file->move(public_path() . '/uploads/', $name);
            $datos['pdf'] = $name;
        }
        Libro::insert($datos);
        $libros=Libro::all();
        return redirect()->route('libros.config.index')->with( ['libros' => $libros] );
    }

    public function edit($id)
    {
        $libros=Libro::findOrFail($id);
        $categorias=Categoria::all();
        return view('admin.adminLibros.edit',compact('libros','categorias'));
    }

    public function update(Request $request, $id)
    {
        $datos=request()->except(['_token','_method']);
        if ($request->hasFile('pdf')) {
            $file = $request->file('pdf');
            $name = time() . $file->getClientOriginalName();
            $file->move(public_path() . '/uploads/', $name);
            $datos['pdf'] = $name;
        }
        Libro::where('id','=',$id)->update($datos);
        $libros=Libro::all();

        return redirect()->route('libros.config.index')->with( ['libros' => $libros] );
    }

    public function destroy($id)
    {
        Libro::destroy($id);
        $libros=Libro::all();
        return redirect()->route('libros.config.index')->with( ['libros' => $libros] );
    }

    public function show($id)
    {
        $libros=Libro::where('id',$id)->with('libros')->get();
        $nombre_Libro = Libro::find($id);
        //return response()->json($Libros);
        return view('LibrosShow',compact('libros','nombre_Libro'));
    }
}
