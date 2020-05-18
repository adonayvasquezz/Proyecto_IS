@extends('layouts.navbar')

@section('content')

<div>
    <table class="table table-dark">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Nombre</th>
            <th scope="col">Accion</th>
            <th scope="col">Fecha</th>
          </tr>
        </thead>
        <tbody>

            @foreach ($consultar as $bitacora)
            <tr>
                <td>
                    {{ $bitacora->user}}
                </td>
                <td>
                    {{ $bitacora->name}}
                </td>
                <td>
                    {{ $bitacora->action }}
                </td>
                <td>
                    {{ $bitacora->fechaCambio }}
                </td>
            </tr>
            @endforeach
        </tbody>
      </table>

</div>


@endsection
