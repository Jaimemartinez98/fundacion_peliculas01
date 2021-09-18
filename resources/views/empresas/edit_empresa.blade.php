@extends('master')

<link rel="stylesheet" href="{{ asset('/css/estilos_empresas.css') }}" />


@section('content')

    <form action="{{ route('empresas.update',$empresa->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
                {{-- HOLA --}}
            <div class="col-lg-12 col-md-12 col-sm-12">
                <label for="nombre_empresa" class="form-label">Nombre de la empresa</label>
                <input type="text" class="form-control" id="nombre_empresa" name="nombre_empresa" value="{{$empresa->nombre_empresa}}">
            </div>

            <div class="col-6">
                <label for="nit_empresa" class="form-label">NIT</label>
                <input type="text" class="form-control" id="nit_empresa" name="nit_empresa" value="{{$empresa->nit}}">
            </div>
            <div class="col-6">
                <label for="direccion_empresa" class="form-label">Dirección</label>
                <input type="text" class="form-control" id="direccion_empresa" name="direccion_empresa" value="{{$empresa->direccion}}">
            </div>
            <div class="col-6">
                <label for="telefono" class="form-label">Télefono</label>
                <input type="text" class="form-control" id="telefono" name="telefono" value="{{$empresa->telefono}}">
            </div>

            <div class="col-6">
                <label for="correo_contacto" class="form-label">Correo Contacto</label>
                <input type="text" class="form-control" id="correo_contacto" name="correo_contacto" value="{{$empresa->correo_contacto}}">
            </div>


            <button type="submit" class="btn btn-success estilo_boton">Enviar</button>


        </div>

    </form>


@endsection
