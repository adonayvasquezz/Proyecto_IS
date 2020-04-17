@extends('layouts.navbar')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">PERFIL</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
                        <div class="col">
                            <h3>Informacion de Usuario</h3>
                        </div>
                        <div class="col">
                            <a href="/perfil/{{$user->id}}/edit" class="btn btn-success" style="float: right;" >
                                Editar
                            </a>
                        </div>
                    </div>

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
    </div>
</div>
@endsection
