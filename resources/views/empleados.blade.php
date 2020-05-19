@extends('layouts.navbar')

@section('content')
<link rel="stylesheet" href="../css/UserForm.css">

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
            <th scope="col">Eliminar</th>
          </tr>
        </thead>
        <tbody>

            @foreach ($empleados as $empleado)
            <tr>
                <td>
                    {{ $empleado->idempleado}}
                </td>
                <td>
                    {{ $empleado->name }} {{ $empleado->papellido }}
                </td>
                <td>
                    {{ $empleado->nombrecargo }}
                </td>
                <td>
                    {{ $empleado->telefono }}
                </td>
                <td>
                    {{ $empleado->email }}
                </td>
                <td>
                    <a href="{{ route('eliminarEmpleado.destroy', $empleado->idempleado)}}" class="awe" onclick="return confirm('¿Deseas eliminar el registro?')" ><i class="fas fa-trash"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
      </table>

</div>

@include('sweetalert::alert')

@endsection
