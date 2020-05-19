@extends('layouts.navbar')

@section('content')

<!-- Archivos necesarios -->
    <link rel="stylesheet" href="../css/UserForm.css">
    <!--BOOTSTRAP CSS-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!--iconos fontawesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">
    <script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../Styles/estilo-navbar.css">
    <link rel="stylesheet" href="../Styles/fontawesome-all.min.css">

    
    <div class="container">
        <div class="mx-auto col-sm-8 main-section" id="myTab" role="tablist">
        <!-- Validaciones de los roles de los usuarios y permisos -->
            <ul class="nav nav-tabs justify-content-end">
                <li class="nav-item">
                    <a class="nav-link active" id="list-tab" data-toggle="tab" href="#list" role="tab" aria-controls="list" aria-selected="false">Rutas</a>
                </li>

                 @if(@Auth::user()->hasRole('admin'))
                <li class="nav-item">
                    <a class="nav-link" id="form-tab" data-toggle="tab" href="#form" role="tab" aria-controls="form" aria-selected="true">Form Rutas</a>
                </li>
                @endif 
                <li class="nav-item">
                    <a class="nav-link " id="list-tab" data-toggle="tab" href="#listaLugares" role="tab" aria-controls="list" aria-selected="true">Lugares</a>
                </li>
                @if(@Auth::user()->hasRole('admin')) 
                <li class="nav-item">
                    <a class="nav-link" id="form-tab" data-toggle="tab" href="#formLugar" role="form" aria-controls="form" aria-selected="true">Form Lugares</a>
                </li>
                @endif 
            </ul> 
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active navegacionForm" id="list" role="tabpanel" aria-labelledby="list-tab">
                    <div class="card">
                        <div class="card-header">
                            <h4>Informacion De Rutas</h4>
                        </div>
                        <div class="card-body">
                            <!-- Lista de Rutas-->
                            <div class="table-responsive">
                                <table id="RutaList" class="table table-bordered table-hover table-striped">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Inicio</th>
                                            <th scope="col">Fin</th>
                                            <th scope="col">Duracion</th>
                                            <th scope="col">Precio lps</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <!-- LLena la vista con los datos enviados desde el conrolador -->
                                    @foreach ($rutas as $ruta)
                                        <tr>
                                            <th scope="row">{{$ruta->idruta}}</th>
                                            <td>{{$ruta->ciudadInicio}}</td>
                                            <td>{{$ruta->ciudadFin}}</td>
                                            <td>{{$ruta->duracion}}</td>
                                            <td>{{$ruta->precio}}</td>
                                            <td>
                                            <a href="{{ route('editarRuta', $ruta->idruta)}}" class="awe"><i class="fas fa-edit"></i></a> | 
                                            <a href="{{ route('eliminarRuta.destroy', $ruta->idruta)}}" class="awe" onclick="return confirm('¿Deseas eliminar el registro?')" ><i class="fas fa-trash"></i></a>

                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                                {{ $rutas->links() }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade navegacionForm" id="form" role="tabpanel" aria-labelledby="form-tab">
                    <div class="card">
                        <div class="card-header">
                            <h4></h4>
                        </div>
                        <div class="card-body">
                            <!-- Formulario de Rutas-->

                            <form class="form" action="/createRuta" method="POST" role="form" autocomplete="off">
                            {{csrf_field()}}
                                <div class="form-group row">
                                    <label for="" class="col-lg-3 col-form-label form-control-label">Inicio</label>
                                    <div class="col-lg-9">
                                        <select class="form-control" id="ciudadInicio" name="ciudadInicio">
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
                                        @foreach ($ciudades as $ciudad)
                                            <option value='{{$ciudad->idLugar}}'>{{$ciudad->idLugar}}-{{$ciudad->nombre}}</option>
                                        @endforeach
                                        {!! $errors->first('ciudadFin', '<small style="color:red">:message</small>') !!}
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Duracion</label>
                                    <div class="col-lg-9">
                                        <input required class="form-control" type="text" id="duracion" name="duracion">
                                        {!! $errors->first('duracion', '<small style="color:red">:message</small>') !!}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Precio</label>
                                    <div class="col-lg-9">
                                        <input required class="form-control" type="number" id="precio" name="precio">
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
                <div class="tab-pane fade show navegacionForm" id="listaLugares" role="tabpanel" aria-labelledby="list-tab">
                    <div class="card-header">
                        <h4>Informacion Lugares</h4>
                    </div>
                    <div class="card-body">
                        <!-- Lista de Lugares-->
                        <div class="table-responsive">
                            <table id="lugarList" class="table table-bordered table-hover table-striped">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Ciudad/Pueblo</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                <!-- Llena la vista con los datos enviados desde el conrolador -->
                                @foreach ($ciudades as $ciudad)
                                   <tr>
                                        <th scope="row">{{$ciudad->idLugar}}</th>
                                        <td>{{$ciudad->nombre}}</td>
                                        <td style="width:15%">
                                            <a href="{{ route('editarLugar', $ciudad->idLugar)}}" class="awe"><i class="fas fa-edit"></i></a> | 
                                            <a href="{{ route('eliminarLugar.destroy', $ciudad->idLugar)}}" class="awe" onclick="return confirm('¿Deseas eliminar el registro?')" ><i class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade navegacionForm" id="formLugar" role="tabpanel" aria-labelledby="form-tab">
                    <div class="card-header">
                        <h4></h4>
                    </div>
                    <div class="card-body">
                        <!-- Formulario de Lugares-->

                        <form class="form" action="/createLugar" method="post" role="form" autocomplete="off" id="formularioLugares">
                            {{csrf_field()}}

                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Nombre/Descripcion</label>

                                <div class="col-lg-9">
                                    <input required class="form-control " name="nombre" type="text" id="nombreLugar" >
                                    {!! $errors->first('nombre', '<small style="color:red">:message</small>') !!}
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
        </div>
    </div>

  
    <!--BOOTSTRAP JAVASCRIPT-->
    @include('sweetalert::alert')
{{--     <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>



    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>


    <script src="../Controladores/app.js"></script>
    --}}



@endsection
