<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empresas;
use App\Models\Peliculas;
use Illuminate\Support\Facades\DB;

class PeliculasController extends Controller
{
    public function index(){

        $peliculas = DB::table('peliculas AS p')
                ->select('p.id','p.nombre_pelicula','e.nombre_empresa')
                ->join('empresas AS e', 'p.empresa_id', '=', 'e.id')
                ->get();

        return view('peliculas.index', [
            'peliculas' => $peliculas,
        ]);

    }

    public function create(){

        $empresas = Empresas::all();

        return view('peliculas.crear_pelicula', [
            'empresas' => $empresas,
        ]);

    }

    public function store(Request $request){

        $pelicula = new Peliculas;
        $pelicula->nombre_pelicula = $request->nombre_pelicula;
        $pelicula->director = $request->director;
        $pelicula->fecha_lanzamiento = $request->fecha_lanzamiento;
        $pelicula->sinopsis = $request->sinopsis;
        $pelicula->correo_contacto = $request->correo_contacto;
        $pelicula->empresa_id = $request->empresa_id;
        $pelicula->save();

        return back();

    }

    public function show($id){
        //Muestra un registro especifico que esta almacenado en la base de datos pero no permite editar ni insertar datos
    }

    public function edit($id){

        $empresas = Empresas::all();
        $pelicula = Peliculas::where('id',$id)->first();

        return view('peliculas.edit_pelicula', [
            'pelicula' => $pelicula,
            'empresas' => $empresas,
        ]);

    }

    public function update(Request $request,$id){

        $pelicula = Peliculas::findOrFail($id);
        $pelicula->nombre_pelicula = $request->nombre_pelicula;
        $pelicula->director = $request->director;
        $pelicula->fecha_lanzamiento = $request->fecha_lanzamiento;
        $pelicula->sinopsis = $request->sinopsis;
        $pelicula->correo_contacto = $request->correo_contacto;
        $pelicula->empresa_id = $request->empresa_id;
        $pelicula->save();

        return back();

    }

    public function delete($id){

        Peliculas::where('id',$id)->delete();
        return back();
    }

}
