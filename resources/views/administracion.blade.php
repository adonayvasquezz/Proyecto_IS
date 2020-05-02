@extends('layouts.navbar')

@section('content')

<h2>Probando administracion</h2>

<br>

<form action="administracion" method="POST">
    {{ csrf_field() }}

<div class="row">
    <div class="col">
        <div class="form-group">
            <label for="">Nombre</label>
            <input type="text" class="form-control" name="nombre" placeholder="Buscar por nombre">
        </div>
    </div>

    <div class="col">
        <div class="form-group">
            <label for="">Correo</label>
            <input type="text" class="form-control" name="correo" placeholder="Buscar por correo">
        </div>
    </div>
</div>

    <button type="submit" class="btn btn-primary">Aceptar</button>
</form>

<br>
<div>

    <h3>Resultados:</h3>

    @if(!empty($users))
    <table class="table table-dark">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Nombre</th>
            <th scope="col">Correo</th>
          </tr>
        </thead>
        <tbody>

            @foreach ($users as $user)
            <tr>
                <td>
                    {{ $user->id}}
                </td>
                <td>
                    <a href="www.google.com">
                    {{ $user->name }}
                    </a>
                </td>
                <td>
                    {{ $user->email }}
                </td>
            </tr>
            @endforeach
        </tbody>
      </table>
      @endif

</div>

@endsection
