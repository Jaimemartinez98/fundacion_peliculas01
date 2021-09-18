@extends('master')

<link rel="stylesheet" href="{{ asset('/css/estilos_empresas.css') }}" />


@section('content')

    <form action="{{ route('peliculas.update', $pelicula->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">

            <div class="col-lg-12 col-md-12 col-sm-12">
                <label for="nombre_pelicula" class="form-label">Nombre de la pelicula</label>
                <input type="text" class="form-control" id="nombre_pelicula" name="nombre_pelicula"
                    value="{{ $pelicula->nombre_pelicula }}">
            </div>

            <div class="col-6">
                <label for="director" class="form-label">Director</label>
                <input type="text" class="form-control" id="director" name="director" value="{{ $pelicula->director }}">
            </div>
            <div class="col-6">
                <label for="fecha_lanzamiento" class="form-label">Fecha de Lanzamiento</label>
                <input type="text" class="form-control" id="fecha_lanzamiento" name="fecha_lanzamiento"
                    value="{{ $pelicula->fecha_lanzamiento }}">
            </div>
            <div class="col-6">
                <label for="sinopsis" class="form-label">Sinopsis</label>
                <input type="text" class="form-control" id="sinopsis" name="sinopsis" value="{{ $pelicula->sinopsis }}">
            </div>

            <div class="col-6">
                <label for="correo_contacto" class="form-label">Correo Contacto</label>
                <input type="text" class="form-control" id="correo_contacto" name="correo_contacto"
                    value="{{ $pelicula->correo_contacto }}">
            </div>

            <div class="col-12">
                <select class="form-select" aria-label="Default select example" name="empresa_id">

                    <option>Seleccione la empresa de la pelicula</option>
                    @foreach ($empresas as $empresa)
                        @if ($pelicula->empresa_id == $empresa->id)
                            <option value="{{ $empresa->id }}" selected>{{ $empresa->nombre_empresa }}</option>
                        @else
                            <option value="{{ $empresa->id }}">{{ $empresa->nombre_empresa }}</option>
                        @endif
                    @endforeach


                </select>

            </div>



            <button type="submit" class="btn btn-success estilo_boton">Enviar</button>


        </div>

    </form>


@endsection
