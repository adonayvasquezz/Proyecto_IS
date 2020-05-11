@extends('layouts.navbar')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">MENU</div>

                <div class="card-body" style="margin: auto">


                    <a href="/empleados" type="button" class="btn btn-info" style="height:70px; width:220px; line-height: 50px; color:white;">
                        <strong>
                                EMPLEADOS
                        </strong>
                    </a>
                    <br>
                    <br>
                    <a href="/agregar-empleados" type="button" class="btn btn-success" style="height:70px; width:220px; line-height: 50px;">
                        <strong>
                            AGREGAR EMPLEADO
                        </strong>
                    </a>
                    <br>
                    <br>
                    <a href="/administrar_programas" type="button" class="btn btn-danger" style="height:70px; width:220px; line-height: 50px;">
                        <strong>
                            ELIMINAR EMPLEADO
                        </strong>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
