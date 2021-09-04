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
          <tr>
            <td>1</td>
            <td>Mark</td>
            <td>Otto</td>
            <td>
                <button type="button" class="btn btn-warning">EDITAR EMPRESA</button>
                <button type="button" class="btn btn-danger">ELIMINAR EMPRESA</button>
            </td>
          </tr>

        </tbody>
      </table>

</div>



@endsection
