@extends('master')

<title>{{ $pelicula->nombre_pelicula }}</title>
<style>
    .estilo_imagen {
        width: 400px !important;
    }

    .estilo_imagen_lista {
        width: 40px !important;
    }

</style>
@section('content')
    <div class="row">


        <div class="col-6  justify-content-center">
            <center> <img src="{{ asset('files/' . $pelicula->caratula) }}" class="estilo_imagen "></center>

        </div>
        <div class="col-6">

            <h2 class="card-title">{{ $pelicula->nombre_pelicula }}</h2>
            <p class="card-text">Sinopsis: {{ $pelicula->sinopsis }}</p>
            <p class="card-text">Director: {{ $pelicula->director }}</p>
            <p class="card-text">Fecha_lanzamiento: {{ $pelicula->fecha_lanzamiento }}</p>
            <a href="https://www.youtube.com/watch?v=038vcb-_xe0&ab_channel=PastillasParaDormir" class="btn btn-success"
                target="_blank">Ir al trailer</a>
            <br>


        </div>
        <div style="margin-top: 30px">
            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" rows="5"></textarea>

        </div>

        <div class="col-12" style="margin-top: 30px">
            <p>Tambien podrías ver...</p>
            <ul class="list-group">
                @foreach ($peliculas as $pelicula)
                    <a href="{{ route('peliculas.show', $pelicula->id) }}">
                        <li class="list-group-item">
                            <img src="{{ asset('files/' . $pelicula->caratula) }}" class="estilo_imagen_lista ">
                            {{ $pelicula->nombre_pelicula }}
                        </li>
                    </a>
                @endforeach
                {{-- {{ $peliculas->links() }} --}}
            </ul>

        </div>






    </div>
@endsection
