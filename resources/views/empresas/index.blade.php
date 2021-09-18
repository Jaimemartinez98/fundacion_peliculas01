@extends('master')

@section('content')

    <div class="col-12">

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre Empresa</th>
                    <th scope="col">NIT</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($empresas as $empresa)
                    <tr>
                        <td>{{ $empresa->id }}</td>
                        <td>{{ $empresa->nombre_empresa }}</td>
                        <td>{{ $empresa->nit }}</td>
                        <td>
                            <a href="{{ route('empresas.edit', $empresa->id) }}" class="btn btn-success" >EDITAR EMPRESA</a>
                            <form action="{{ route('empresas.delete', $empresa->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger">ELIMINAR EMPRESA</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>



@endsection
