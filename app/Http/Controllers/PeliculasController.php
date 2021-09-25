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

        $request->validate([
            'nombre_pelicula' => 'required|max:500',
            'director' => 'required|max:500',
            'fecha_lanzamiento' => 'required|date',
            'sinopsis' => 'required',
            'correo_contacto' => 'required|max:500|email',
            'empresa_id' => 'required',
            'archivo' => 'required',
        ]
        ,
        [
            'nombre_pelicula.required' => 'El nombre de la pelicula es requerido',
            'director.required' => 'El director es requerido',
            'fecha_lanzamiento.required' => 'La fecha de lanzamiento es requerida',
            'sinopsis.required' => 'La sinopsis es requerida',
            'correo_contacto.required' => 'El correo es requerido',
            'correo_contacto.email' => 'El correo debe ser correcto ej. prueba@example.com',
            'empresa_id.required' => 'La empresa es requerida',
            'archivo.required' => 'El archivo es requerido',
        ]
        );

        $pelicula = new Peliculas;
        $pelicula->nombre_pelicula = $request->nombre_pelicula;
        $pelicula->director = $request->director;
        $pelicula->fecha_lanzamiento = $request->fecha_lanzamiento;
        $pelicula->sinopsis = $request->sinopsis;
        $pelicula->correo_contacto = $request->correo_contacto;
        $pelicula->empresa_id = $request->empresa_id;



        if ($request->hasFile("archivo")) {
            $file = $request->file("archivo");

            $nombre = "archivo_".time().".".$file->guessExtension();

            $ruta = public_path("files/".$nombre);

            copy($file, $ruta);
            $pelicula->caratula = $nombre;
        }
        $pelicula->save();

        return back()->with('message','La pelicula fue creada exitosamente!!!');

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


        $request->validate([
            'nombre_pelicula' => 'required|max:500',
            'director' => 'required|max:500',
            'fecha_lanzamiento' => 'required',
            'sinopsis' => 'required',
            'correo_contacto' => 'required|max:500|email',
            'empresa_id' => 'required',
            'archivo' => 'required',
        ]
        ,
        [
            'nombre_pelicula.required' => 'El nombre de la pelicula es requerido',
            'director.required' => 'El director es requerido',
            'fecha_lanzamiento.required' => 'La fecha de lanzamiento es requerida',
            'sinopsis.required' => 'La sinopsis es requerida',
            'correo_contacto.required' => 'El correo es requerido',
            'correo_contacto.email' => 'El correo debe ser correcto ej. prueba@example.com',
            'empresa_id.required' => 'La empresa es requerida',
            'archivo.required' => 'El archivo es requerido',
        ]
        );

        $pelicula = Peliculas::findOrFail($id);
        $pelicula->nombre_pelicula = $request->nombre_pelicula;
        $pelicula->director = $request->director;
        $pelicula->fecha_lanzamiento = $request->fecha_lanzamiento;
        $pelicula->sinopsis = $request->sinopsis;
        $pelicula->correo_contacto = $request->correo_contacto;
        $pelicula->empresa_id = $request->empresa_id;
        if ($request->hasFile("archivo")) {
            $file = $request->file("archivo");

            $nombre = "archivo_".time().".".$file->guessExtension();

            $ruta = public_path("files/".$nombre);

            copy($file, $ruta);
            $pelicula->caratula = $nombre;
        }

        $pelicula->save();

        return back()->with('message','La pelicula fue actualizado exitosamente!!!');

    }

    public function delete($id){

        Peliculas::where('id',$id)->delete();
        return back();
    }

}
