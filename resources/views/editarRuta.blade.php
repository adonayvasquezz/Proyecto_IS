@extends('layouts.navbar')

@section('content')


    
    <link rel="stylesheet" href="../css/UserForm.css">
    <!--BOOTSTRAP CSS-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!--iconos fontawesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">
    <script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../Styles/estilo-navbar.css">
    <link rel="stylesheet" href="../Styles/fontawesome-all.min.css">

<br>
<br>
<div class="container">
    <div class="mx-auto col-sm-8 main-section">
                <ul class="nav nav-tabs justify-content-end">
                    <li class="nav-item">
                        <a>Editar Ruta </a>
                    </li>
                </ul>
                
                    <form class="form" action="{{action('RutasController@update', $Rutas->idruta)}}" method="POST" role="form" autocomplete="off">
                    {{csrf_field()}}                  
                        <div class="form-group row">
                            <label for="" class="col-lg-3 col-form-label form-control-label">Inicio</label>
                            <div class="col-lg-9">
                            <select class="form-control" id="cidadFin" name="ciudadInicio">
                            @foreach($cA as $cidA)
                            <option value="{{$cidA->idInicio}}"> {{$cidA->idInicio}}-{{$cidA->ciudadInicio}}</option>
                            @endforeach
                            @foreach ($ciudades as $ciudad)
                                <option value='{{$ciudad->idLugar}}'>{{$ciudad->idLugar}}-{{$ciudad->nombre}}</option>
                            @endforeach
                            {!! $errors->first('ciudadInicio', '<small style="color:red">:message</small>') !!}
                            </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-lg-3 col-form-label form-control-label">Fin</label>
                            <div class="col-lg-9">
                            <select class="form-control" id="cidadFin" name="ciudadFin">
                            @foreach($cA as $cidA)
                            <option value="{{$cidA->idFin}}"> {{$cidA->idFin}}-{{$cidA->ciudadFin}}</option>
                            @endforeach
                                @foreach ($ciudades as $ciudad)
                                    <option value='{{$ciudad->idLugar}}'>{{$ciudad->idLugar}}-{{$ciudad->nombre}}</option>
                                @endforeach
                                {!! $errors->first('ciudadInicio', '<small style="color:red">:message</small>') !!}
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Duracion</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="text" id="duracion" name="duracion" value="{{$Rutas->duracion}}">
                                {!! $errors->first('duracion', '<small style="color:red">:message</small>') !!}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Precio</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="number" id="precio" name="precio" value="{{$Rutas->precio}}">
                                {!! $errors->first('precio', '<small style="color:red">:message</small>') !!}
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-12 text-center">
                                <a href="/rutas" class="btn btn-secondary btn-close">Cancel</a>
                                <input type="submit"  class="btn btn-primary " value="Guardar Cambios" id="btnGuardar">
                            </div>
                        </div>
                </form>
        </div>
    </div>
</div>

    <!--BOOTSTRAP JAVASCRIPT-->
{{--     <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
 --}}


    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="../Controladores/app.js"></script>




@endsection