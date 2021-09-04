<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empresas;
use App\Models\Pruebas;

class EmpresasController extends Controller
{
    public function index(){

        $empresas = Pruebas::all();

        dd($empresas);

        return view('empresas.index');

    }

    public function create(){
        return view('empresas.crear_empresa');
    }

    public function store(Request $request){
        //Introduce datos en la base datos
    }

    public function show($id){
        //Muestra un registro especifico que esta almacenado en la base de datos pero no permite editar ni insertar datos
    }

    public function edit($id){
        //Muestra un registro especifico pero permite agregar información o actualizar la existente
    }

    public function update($id){
        //Actualiza un registro en la base de datos
    }

    public function delete($id){
        //Elimina un registro en la base de datos
    }


}
