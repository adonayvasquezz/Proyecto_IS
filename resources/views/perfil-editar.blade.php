@extends('layouts.navbar')

@section('content')
<div class="container"  style="margin-bottom:100px">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">PERFIL</div>

                <div class="card-body">

                    <h3>Informacion de Usuario</h3>


                    <form action="{{action('PersonaController@update', $id)}}" method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="PATCH">

                        <label for="">Nombres</label>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="pnombre" value="{{$persona->pnombre}}" placeholder="Primer nombre">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="snombre" value="{{$persona->snombre}}" placeholder="Segundo nombre">
                                </div>
                            </div>
                        </div>

                        <label for="">Apellidos</label>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="papellido" value="{{$persona->papellido}}" placeholder="Primer apellido">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="sapellido" value="{{$persona->sapellido}}" placeholder="Segundo apellido">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="">Direccion</label>
                            <input type="text" class="form-control" name="direccion" value="{{$persona->direccion}}" placeholder="Direccion actual">
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="">Correo electrónico</label>
                                    <input type="text" class="form-control" name="correo" value="{{$user->email}}" placeholder="Numero de teléfono">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="">Telefono</label>
                                    <input type="number" class="form-control" name="telefono" value="{{$persona->telefono}}" placeholder="Numero de teléfono">
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Aceptar</button>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
