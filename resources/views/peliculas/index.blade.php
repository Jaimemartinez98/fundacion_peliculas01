@extends('master')

@section('content')

    <div class="col-12">

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre Pelicula</th>
                    <th scope="col">Empresa</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($peliculas as $pelicula)
                    <tr>
                        <td>{{ $pelicula->id }}</td>
                        <td>{{ $pelicula->nombre_pelicula }}</td>
                        <td>{{ $pelicula->nombre_empresa }}</td>
                        <td>
                            <a href="{{ route('peliculas.edit', $pelicula->id) }}" class="btn btn-success" >EDITAR EMPRESA</a>
                            <form action="{{ route('peliculas.delete', $pelicula->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger">ELIMINAR PELICULA</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>



@endsection
