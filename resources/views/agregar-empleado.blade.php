@extends('layouts.navbar')

@section('content')
<link rel="stylesheet" href="../css/UserForm.css">

<div class="row justify-content-center">
    <div class="col-md-8"  id="myTab" role="tablist">

        <ul class="nav nav-tabs justify-content-end">
            <li class="nav-item" >
                <a class="nav-link active" id="list-tab" data-toggle="tab" href="#info">Perfil</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="form-tab" data-toggle="tab" href="#form">Formulario</a>
            </li>
        </ul>

        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active navegacionForm" id="info" role="tabpanel" aria-labelledby="list-tab">
                <div class="card" style="margin-bottom:150px;">
                    <div class="card-header">Informacion de Usuario</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <br>
                        <h5>
                            <strong>Nombre:</strong>
                            {{ $user->name }}

                            @if(!empty($persona->snombre))
                                {{ $persona->snombre }}
                            @endif

                            @if(!empty($persona->papellido))
                                {{ $persona->papellido }}
                            @endif

                            @if(!empty($persona->sapellido))
                                {{ $persona->sapellido }}
                            @endif
                        </h5>
                        <br>
                        <h5>
                            <strong>No. de identidad:</strong>
                            @if(!empty($persona->identidad))
                                {{ $persona->identidad }}
                            @endif
                        </h5>
                        <br>
                        <h5>
                            <strong>Fecha de nacimiento:</strong>
                            @if(!empty($persona->nacimiento))
                                {{ $persona->nacimiento }}
                            @endif
                        </h5>
                        <br>
                        <h5> <strong>Direccion:</strong>
                            @if(!empty($persona->direccion))
                                {{ $persona->direccion }}
                            @endif
                        </h5>
                        <br>
                        <h5> <strong>Telefono:</strong>
                            @if(!empty($persona->telefono))
                                {{ $persona->telefono }}
                            @endif
                        </h5>
                        <br>
                        <h5> <strong>Correo:</strong>  {{ $user->email }}</h5>
                        <br>
                        <h5> <strong>Fecha de registro:</strong>  {{ $user->created_at }}</h5>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade show navegacionForm" id="form" role="tabpanel" aria-labelledby="list-tab">
                <div class="card" style="margin-bottom:150px;">
                    <div class="card-header">Agregar empleado</div>
                    <div class="card-body">

                        <h5>
                            <strong>Nombre:</strong>
                            {{ $user->name }}

                            @if(!empty($persona->snombre))
                                {{ $persona->snombre }}
                            @endif

                            @if(!empty($persona->papellido))
                                {{ $persona->papellido }}
                            @endif

                            @if(!empty($persona->sapellido))
                                {{ $persona->sapellido }}
                            @endif
                        </h5>
                        <br>

                        <form action="empleados-registrado" method="POST">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <h5>
                                   <strong>Fecha de inicio</strong>
                                </h5>
                                <div class="col-md-4 col-4" style="padding-left:0;">
                                    <input type="date" class="form-control" value="" id="fecha_inicio" name="fecha_inicio">
                                </div>
                            </div>

                            <div class="form-group">
                                <h5>
                                    <strong>Cargo</strong>
                                </h5>
                                <div class="col-md-4 col-4" style="padding-left:0;">
                                    <select class="form-control" id="cargo" name="cargo">
                                        <option value="motorista">Motorista</option>
                                        <option value="cajero">Cajero</option>
                                    </select>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Aceptar</button>
                        </form>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>




@endsection
