@extends('master')

<style>
    .imagen_estilo {
        border-radius: 30px 30px 0px 0px !important;
        min-height: 430px !important;

    }

    .card_estilo {
        border-radius: 30px !important;
        border: 1px solid #ada4a4 !important;
        box-shadow: 18px 15px 20px 0px #ccdbcc !important;
        margin-bottom: 40px !important;

    }

    .hover figure {
        background: #8ae48a;
        border-radius: 20px !important;

    }

    .hover figure img {
        opacity: 1;
        -webkit-transition: .3s ease-in-out;
        transition: .3s ease-in-out;
    }

    .hover figure:hover img {
        opacity: .5;
    }

</style>
@section('content')
    <div class="row justify-content-center">

        @foreach ($peliculas as $pelicula)
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="card card_estilo" style="width: 18rem;">
                    <div class="hover">
                        <figure><img src="{{ asset('files/' . $pelicula->caratula) }}" class="card-img-top imagen_estilo ">
                        </figure>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $pelicula->nombre_pelicula }}</h5>
                        @php
                            $caracteres = 100;
                            $pequenia_sinopsis = substr($pelicula->sinopsis, 0, $caracteres) . '...';

                        @endphp
                        <p class="card-text">{{ $pequenia_sinopsis }}</p>
                        <center> <a href="{{route('peliculas.show', $pelicula->id)}}" class="btn btn-success" style="border-radius: 20px;">VER</a></center>

                    </div>
                </div>
            </div>

        @endforeach
    </div>
@endsection
