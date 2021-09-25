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

        $request->validate([
            'nombre_empresa' => 'required|max:500',
            'direccion_empresa' => 'required|max:500',
            'nit_empresa' => 'required|unique:empresas,nit',
            'telefono' => 'required|numeric',
            'correo_contacto' => 'required|max:500|email',
        ]
        ,
        [
            'nombre_empresa.required' => 'El nombre de la empresa es requerido',
            'direccion_empresa.required' => 'La dirección es requerida',
            'nit_empresa.required' => 'El nit de la empresa es requerido',
            'nit_empresa.unique' => 'El nit de la empresa ya se encuentra registrado',
            'telefono.required' => 'El télefono es requerido',
            'telefono.numeric' => 'El télefono es debe ser un dato númerico',
            'correo_contacto.required' => 'El correo es requerido',
            'correo_contacto.email' => 'El correo debe ser correcto ej. prueba@example.com',
        ]
        );

        $empresa = new Empresas;
        $empresa->nombre_empresa = $request->nombre_empresa;
        $empresa->direccion = $request->direccion_empresa;
        $empresa->nit = $request->nit_empresa;
        $empresa->telefono = $request->telefono;
        $empresa->correo_contacto = $request->correo_contacto;
        $empresa->save();

        return back()->with('message','La empresa fue creada exitosamente!!!!!!!!');


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

        $request->validate([
            'nombre_empresa' => 'required|max:500',
            'direccion_empresa' => 'required|max:500',
            'nit_empresa' => 'required',
            'telefono' => 'required|numeric',
            'correo_contacto' => 'required|max:500|email',
        ]
        ,
        [
            'nombre_empresa.required' => 'El nombre de la empresa es requerido',
            'direccion_empresa.required' => 'La dirección es requerida',
            'nit_empresa.required' => 'El nit de la empresa es requerido',
            'telefono.required' => 'El télefono es requerido',
            'telefono.numeric' => 'El télefono es debe ser un dato númerico',
            'correo_contacto.required' => 'El correo es requerido',
            'correo_contacto.email' => 'El correo debe ser correcto ej. prueba@example.com',
        ]
        );

        $empresa = Empresas::findOrFail($id);
        $empresa->nombre_empresa = $request->nombre_empresa;
        $empresa->direccion = $request->direccion_empresa;
        $empresa->nit = $request->nit_empresa;
        $empresa->telefono = $request->telefono;
        $empresa->correo_contacto = $request->correo_contacto;
        $empresa->save();

        return back()->with('message','La empresa fue actualizada exitosamente!!!!!!!!');
    }

    public function delete($id){

        Empresas::where('id',$id)->delete();
        return back();

    }


}
