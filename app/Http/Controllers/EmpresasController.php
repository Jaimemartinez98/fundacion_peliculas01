<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empresas;


class EmpresasController extends Controller
{
    public function index(){

        $empresas = Empresas::all();



        return view('empresas.index', [
            'empresas' => $empresas,
        ]);

    }

    public function create(){
        return view('empresas.crear_empresa');
    }

    public function store(Request $request){

        $empresa = new Empresas;
        $empresa->nombre_empresa = $request->nombre_empresa;
        $empresa->direccion = $request->direccion_empresa;
        $empresa->nit = $request->nit_empresa;
        $empresa->telefono = $request->telefono;
        $empresa->correo_contacto = $request->correo_contacto;
        $empresa->save();

        return back();


    }

    public function show($id){
        //Muestra un registro especifico que esta almacenado en la base de datos pero no permite editar ni insertar datos
    }

    public function edit($id){
        //Muestra un registro especifico pero permite agregar información o actualizar la existente
        $empresa = Empresas::where('id',$id)->first();

        return view('empresas.edit_empresa', [
            'empresa' => $empresa,
        ]);


    }

    public function update(Request $request, $id){

        $empresa = Empresas::findOrFail($id);
        $empresa->nombre_empresa = $request->nombre_empresa;
        $empresa->direccion = $request->direccion_empresa;
        $empresa->nit = $request->nit_empresa;
        $empresa->telefono = $request->telefono;
        $empresa->correo_contacto = $request->correo_contacto;
        $empresa->save();

        return back();
    }

    public function delete($id){

        Empresas::where('id',$id)->delete();
        return back();

    }


}
