@extends('master')

<link rel="stylesheet" href="{{ asset('/css/estilos_empresas.css') }}" />


@section('content')

    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif

    <form action="{{ route('empresas.store') }}" method="POST">
        @csrf

        <div class="row">

            <div class="col-lg-12 col-md-12 col-sm-12">
                <label for="nombre_empresa" class="form-label">Nombre de la empresa</label>
                <input type="text" class="form-control" id="nombre_empresa" name="nombre_empresa" value="{{ old('nombre_empresa') }}">
                @if ($errors->has('nombre_empresa'))
                    <p class="text-danger">{{ $errors->first('nombre_empresa') }}</p>
                @endif
            </div>

            <div class="col-6">
                <label for="nit_empresa" class="form-label">NIT</label>
                <input type="text" class="form-control" id="nit_empresa" name="nit_empresa" value="{{ old('nit_empresa') }}">
                @if ($errors->has('nit_empresa'))
                    <p class="text-danger">{{ $errors->first('nit_empresa') }}</p>
                @endif

            </div>
            <div class="col-6">
                <label for="direccion_empresa" class="form-label">Dirección</label>
                <input type="text" class="form-control" id="direccion_empresa" name="direccion_empresa" value="{{ old('direccion_empresa') }}">
                @if ($errors->has('direccion_empresa'))
                    <p class="text-danger">{{ $errors->first('direccion_empresa') }}</p>
                @endif
            </div>
            <div class="col-6">
                <label for="telefono" class="form-label">Télefono</label>
                <input type="number" class="form-control" id="telefono" name="telefono" value="{{ old('telefono') }}">
                @if ($errors->has('telefono'))
                    <p class="text-danger">{{ $errors->first('telefono') }}</p>
                @endif
            </div>

            <div class="col-6">
                <label for="correo_contacto" class="form-label">Correo Contacto</label>
                <input type="text" class="form-control" id="correo_contacto" name="correo_contacto" value="{{ old('correo_contacto') }}">
                @if ($errors->has('correo_contacto'))
                    <p class="text-danger">{{ $errors->first('correo_contacto') }}</p>
                @endif
            </div>


            <button type="submit" class="btn btn-success estilo_boton">Enviar</button>


        </div>

    </form>


@endsection
