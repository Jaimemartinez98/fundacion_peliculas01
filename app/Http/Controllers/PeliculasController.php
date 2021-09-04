<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PeliculasController extends Controller
{
    public function index(){
        //Muestra la pagina principal o una lista de las empresas (Trae información)
    }

    public function create(){
        //Va a mostrarme un formulario donde luego se introduciran datos
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
