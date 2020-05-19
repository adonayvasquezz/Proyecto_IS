@extends('layouts.navbar')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">MENU</div>

                <div class="card-body" style="margin: auto">


                    <a href="/empleados" type="button" class="btn btn-secondary" style="height:70px; width:220px; line-height: 50px; color:white; background-color: #ed2b46">
                        EMPLEADOS
                    </a>
                    <br>
                    <br>
                    <a href="/agregar-empleados" type="button" class="btn btn-secondary" style="height:70px; width:220px; line-height: 50px; color:white; background-color: #ed2b46; border-color:transparent">
                        AGREGAR EMPLEADO
                    </a>
                    <br>
                    <br>
                    <a href="/bitacora" type="button" class="btn btn-secondary" style="height:70px; width:220px; line-height: 50px; color:white; background-color: #ed2b46">
                        BITÁCORA
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
