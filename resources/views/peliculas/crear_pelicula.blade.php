@extends('master')

<link rel="stylesheet" href="{{ asset('/css/estilos_empresas.css') }}" />


@section('content')

    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif

    <form action="{{ route('peliculas.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">

            <div class="col-lg-12 col-md-12 col-sm-12">
                <label for="nombre_pelicula" class="form-label">Nombre de la pelicula</label>
                <input type="text" class="form-control" id="nombre_pelicula" name="nombre_pelicula" value="{{ old('nombre_pelicula') }}">
                @if ($errors->has('nombre_pelicula'))
                    <p class="text-danger">{{ $errors->first('nombre_pelicula') }}</p>
                @endif
            </div>

            <div class="col-6">
                <label for="director" class="form-label">Director</label>
                <input type="text" class="form-control" id="director" name="director" value="{{ old('director') }}">
                @if ($errors->has('director'))
                    <p class="text-danger">{{ $errors->first('director') }}</p>
                @endif
            </div>
            <div class="col-6">
                <label for="fecha_lanzamiento" class="form-label">Fecha de Lanzamiento</label>
                <input type="date" class="form-control" id="fecha_lanzamiento" name="fecha_lanzamiento" value="{{ old('fecha_lanzamiento') }}">
                @if ($errors->has('fecha_lanzamiento'))
                    <p class="text-danger">{{ $errors->first('fecha_lanzamiento') }}</p>
                @endif
            </div>
            <div class="col-6">
                <label for="sinopsis" class="form-label">Sinopsis</label>
                <input type="text" class="form-control" id="sinopsis" name="sinopsis" value="{{ old('sinopsis') }}">
                @if ($errors->has('sinopsis'))
                    <p class="text-danger">{{ $errors->first('sinopsis') }}</p>
                @endif
            </div>

            <div class="col-6">
                <label for="correo_contacto" class="form-label">Correo Contacto</label>
                <input type="text" class="form-control" id="correo_contacto" name="correo_contacto" value="{{ old('correo_contacto') }}">
                @if ($errors->has('correo_contacto'))
                    <p class="text-danger">{{ $errors->first('correo_contacto') }}</p>
                @endif
            </div>

            <div class="col-6">
                <label for="empresa_id" class="form-label">Empresa</label>

                <select class="form-select" aria-label="Default select example" name="empresa_id">

                    <option value="">Seleccione la empresa de la pelicula</option>
                    @foreach ($empresas as $empresa)
                        <option value="{{ $empresa->id }}">{{ $empresa->nombre_empresa }}</option>
                    @endforeach


                </select>
                @if ($errors->has('empresa_id'))
                    <p class="text-danger">{{ $errors->first('empresa_id') }}</p>
                @endif
            </div>


            <div class="col-6">
                <label for="archivo" class="form-label">Seleccione una portada de su preferencia</label>
                <input type="file" class="form-control" id="archivo" name="archivo" accept="image/*">
                @if ($errors->has('archivo'))
                    <p class="text-danger">{{ $errors->first('archivo') }}</p>
                @endif
            </div>


            <button type="submit" class="btn btn-success estilo_boton">Enviar</button>


        </div>

    </form>


@endsection
