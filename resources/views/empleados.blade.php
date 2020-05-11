@extends('layouts.navbar')

@section('content')

<h5>Empleados</h5>

<div>
    <table class="table table-dark">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Nombre</th>
            <th scope="col">Cargo</th>
            <th scope="col">Telefono</th>
            <th scope="col">Correo</th>
          </tr>
        </thead>
        <tbody>

            @foreach ($empleados as $empleado)
            <tr>
                <td>
                    {{ $empleado->idempleado}}
                </td>
                <td>
                    {{ $empleado->pnombre }} {{ $empleado->papellido }}
                </td>
                <td>
                    {{ $empleado->nombrecargo }}
                </td>
                <td>
                    {{ $empleado->telefono }}
                </td>
                <td>
                    {{ $empleado->correo }}
                </td>
            </tr>
            @endforeach
        </tbody>
      </table>

</div>

@endsection
