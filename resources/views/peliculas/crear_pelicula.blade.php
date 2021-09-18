@extends('master')

<link rel="stylesheet" href="{{ asset('/css/estilos_empresas.css') }}" />


@section('content')

    <form action="{{ route('peliculas.store') }}" method="POST">
        @csrf

        <div class="row">

            <div class="col-lg-12 col-md-12 col-sm-12">
                <label for="nombre_pelicula" class="form-label">Nombre de la pelicula</label>
                <input type="text" class="form-control" id="nombre_pelicula" name="nombre_pelicula">
            </div>

            <div class="col-6">
                <label for="director" class="form-label">Director</label>
                <input type="text" class="form-control" id="director" name="director">
            </div>
            <div class="col-6">
                <label for="fecha_lanzamiento" class="form-label">Fecha de Lanzamiento</label>
                <input type="text" class="form-control" id="fecha_lanzamiento" name="fecha_lanzamiento">
            </div>
            <div class="col-6">
                <label for="sinopsis" class="form-label">Sinopsis</label>
                <input type="text" class="form-control" id="sinopsis" name="sinopsis">
            </div>

            <div class="col-6">
                <label for="correo_contacto" class="form-label">Correo Contacto</label>
                <input type="text" class="form-control" id="correo_contacto" name="correo_contacto">
            </div>

            <div class="col-12">
                <select class="form-select" aria-label="Default select example" name="empresa_id">

                    <option selected>Seleccione la empresa de la pelicula</option>
                    @foreach ($empresas as $empresa)
                        <option value="{{ $empresa->id }}">{{ $empresa->nombre_empresa }}</option>
                    @endforeach


                </select>

            </div>



            <button type="submit" class="btn btn-success estilo_boton">Enviar</button>


        </div>

    </form>


@endsection
