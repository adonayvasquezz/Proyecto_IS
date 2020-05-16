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


    <div class="container">
        <div class="mx-auto col-sm-8 main-section" id="myTab" role="tablist">
            <ul class="nav nav-tabs justify-content-end">
                <li class="nav-item">
                    <a class="nav-link active" id="list-tab" data-toggle="tab" href="#listViajes" role="tab"
                        aria-controls="list" aria-selected="false">Viajes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="form-tab" data-toggle="tab" href="#formViajes" role="tab" aria-controls="form"
                        aria-selected="true">Formulario de Viajes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " id="list-tab" data-toggle="tab" href="#listBuses" role="tab"
                        aria-controls="list" aria-selected="true">Buses</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="form-tab" data-toggle="tab" href="#formBuses" role="form"
                        aria-controls="form" aria-selected="true">Form Buses</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active navegacionForm" id="listViajes" role="tabpanel"
                    aria-labelledby="list-tab">
                    <div class="card">
                        <div class="card-header">
                            <h4>Informacion De Rutas</h4>
                        </div>
                        <div class="card-body">
                            <!-- Lista de Rutas-->
                            <div class="table-responsive">
                                <table id="ViajeList" class="table table-bordered table-hover table-striped">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col">ID Viaje</th>
                                            <th scope="col">Hora de Salida</th>
                                            <th scope="col">ID Bus</th>
                                            <th scope="col">Estado</th>
                                            <th scope="col">Ruta</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($rutasViajes as $item)
                                            <tr>
                                                <th scope="row">{{$item->viaje_idviaje}}</th>
                                                <td>{{$item->horaSalida}}</td>                                      
                                                <td>{{$item->idBus}}</td>
                                                <td>{{$item->estado}}</td>
                                                <td>id:{{$item->ruta_idruta}}- {{$item->lugarInicio}} a {{$item->lugarFin}} </td>
                                                <td>
                                                    <a href="javascript:void(0);"  class="awe" onclick="$(this).find('form').submit();">
                                                        <form class="form" role="form" autocomplete="off" action="{{ route('editarViaje', $item->viaje_idviaje)}}" method = "post">
                                                            {{csrf_field()}}
                                                            <input type="hidden" class="form-control" name="idruta" value="{{$item->ruta_idruta}}">
                                                            <button type="submit" class="btn btn-danger"><i class="fas fa-edit"></i></button>
                                                        </form>
                                                    </a> | 
                                                    <a href="javascript:void(0);"  class="awe" onclick="return confirm('¿Deseas eliminar el registro?')">
                                                        <form class="form" role="form" autocomplete="off" action="{{ route('eliminarViaje', $item->viaje_idviaje)}}" method = "post">
                                                            {{csrf_field()}}
                                                            <input type="hidden" class="form-control" name="idruta" value="{{$item->ruta_idruta}}">
                                                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                                        </form>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade navegacionForm" id="formViajes" role="tabpanel" aria-labelledby="form-tab">
                    <div class="card">
                        <div class="card-header">
                            <h4></h4>
                        </div>
                        <div class="card-body">
                            <!-- Formulario de Viajes-->
                            @if($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            @if(session('mensaje'))
                                 <div class="alert alert-success">
                                    <p>{{session ('mensaje')}}</p>
                                </div>
                            @endif
                             <form class="form" role="form" autocomplete="off" action="/createViaje" method = "post">
                             {{csrf_field()}}
                                 <div class="form-group row">
                                    <label for="" class="col-lg-3 col-form-label form-control-label">Ruta</label>
                                    <div class="col-lg-9">
                                        <select class="form-control" id="idruta" name="idruta" value="{{old('idRuta')}}">
                                            @foreach($rutas as $item)
                                                <option value="{{$item->idruta}}">{{$item->idruta}} - {{$item->lugarInicio}} a {{$item->lugarFin}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-lg-3 col-form-label form-control-label">Bus</label>
                                    <div class="col-lg-9">
                                        <select class="form-control" id="id" name="id"  value="{{old('bus')}}">
                                         @foreach($buses as $item)
                                            <option value="{{$item->id}}">id bus:{{$item->id}} - capacidad:{{$item->capacidad}}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Hora de Salida</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="time" id="horaSalida" name="horaSalida"  value="{{old('horaSalida')}}"> 
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Estado</label>
                                    <div class="col-lg-9">
                                        <select class="form-control" id="estado" name="estado" value="{{old('estado')}}">
                                            <option value="ACTIVO">ACTIVO</option>
                                            <option value="INACTIVO">INACTIVO</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-12 text-center">
                                        <input type="reset" class="btn btn-secondary" value="Cancelar">
                                        <input type="submit" class="btn btn-primary" value="Guardar Cambios">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade show navegacionForm" id="listBuses" role="tabpanel"
                    aria-labelledby="list-tab">
                    <div class="card-header">
                        <h4>Informacion Buses</h4>
                    </div>
                    <div class="card-body">
                        <!-- Lista de Buses-->
                        <div class="table-responsive">
                            <table id="lugarList" class="table table-bordered table-hover table-striped">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">ID Bus (Matricula)</th>
                                        <th scope="col">Estado</th>
                                        <th scope="col">Capacida</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($buses as $item)
                                    <tr>
                                        <th scope="row">{{$item->id}}</th>
                                        <td>{{$item->estado}}</td>
                                        <td>{{$item->capacidad}}</td>
                                        <td>
                                            <a href="{{route('editar', $item->id)}}" class="awe"><i class="fas fa-edit"></i></a> | <a href="{{ route('eliminarBus', $item->id)}}"
                                                class="awe" onclick="return confirm('¿Deseas eliminar el registro?')"><i class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade navegacionForm" id="formBuses" role="tabpanel" aria-labelledby="form-tab">
                    <div class="card-header">
                        <h4></h4>
                    </div>
                    <div class="card-body">
                        <!-- Formulario de Buses-->

                        <form class="form" role="form" autocomplete="off" action="/create" method = "post">
                        {{csrf_field()}}
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">ID Bus(Matricula)</label>
                                <div class="col-lg-9">
                                    <input class="form-control" type="number">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Capacidad</label>
                                <div class="col-lg-9">
                                    <input class="form-control" name="capacidad" type="number">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Estado</label>
                                <div class="col-lg-9">
                                    <select class="form-control" id="sel1" name="estado">
                                        <option>ACTIVO</option>
                                        <option>INACTIVO</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-12 text-center">
                                    <input type="reset" class="btn btn-secondary" value="Cancelar">
                                    <input type="submit" class="btn btn-primary" value="Guardar Cambios">
                                </div>
                            </div>
                            
                        </form>
                        @if(session('agregar'))
                            <div>
                                {{session ('agregar')}}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--BOOTSTRAP JAVASCRIPT-->
   {{--  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
            crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
        <script src="../Controladores/app.js"></script>
 --}}

    @endsection
