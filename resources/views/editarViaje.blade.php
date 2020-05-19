@extends('layouts.navbar')

@section('content')


    <link rel="stylesheet" href="../css/UserForm.css">
    <!--BOOTSTRAP CSS-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!--iconos fontawesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">
    <script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../Styles/estilo-navbar.css">
    <link rel="stylesheet" href="../Styles/estilos-modulo-viajes.css">
    <link rel="stylesheet" href="../Styles/fontawesome-all.min.css">


<br>
<br>
    <div class="titulo-edicion">Actualización de Viajes</div>
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
                    <form class="form" action="{{action('ViajesController@update', $viaje->idviaje)}}" method="POST" role="form" autocomplete="off">
                    {{csrf_field()}}        
                        <div class="form-group row">
                                    <label for="" class="col-lg-3 col-form-label form-control-label">Viaje</label>
                                    <div class="col-lg-9">
                                        <select class="form-control" id="idviaje" name="idviaje" value="{{$viaje->idviaje}}">
                                                <option value="{{$viaje->idviaje}}">Viaje:{{$viaje->idviaje}} </option>
                                        </select>
                                    </div>
                                </div>          
                        <div class="form-group row">
                            <label for="" class="col-lg-3 col-form-label form-control-label">Ruta</label>
                            <div class="col-lg-9">
                                <select class="form-control" id="idruta" name="idruta" value="{{$ruta->idruta}}">
                                        <option value="{{$ruta->idruta}}">{{$ruta->idruta}} - {{$ruta->lugarInicio}} a {{$ruta->lugarFin}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-lg-3 col-form-label form-control-label">Bus</label>
                            <div class="col-lg-9">
                                <select class="form-control" id="idbus" name="idbus"  value="{{$bus->idbus}}">
                                     <option value="{{$bus->idbus}}"> matricula:{{$bus->matricula}}- descripcion:{{$bus->descripcion}}- capacidad:{{$bus->capacidad}}</option>
                                    @foreach($buses as $item)
                                        <option value="{{$item->idbus}}"> matricula:{{$item->matricula}}- descripcion:{{$item->descripcion}}- capacidad:{{$item->capacidad}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Hora de Salida</label>
                            <div class="col-lg-9">
                                  <input class="form-control" type="time" id="horaSalida" name="horaSalida"  value="{{$horaSalida}}"> 
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Estado</label>
                            <div class="col-lg-9">
                                <select class="form-control" id="estado" name="estado" value="{{$viaje->estado}}">
                                        <option value="{{$viaje->estado}}">{{$viaje->estado}}</option>
                                        <option value="ACTIVO">ACTIVO</option>
                                        <option value="INACTIVO">INACTIVO</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-12 text-center">
                                <a href="/viajes" class="btn btn-secondary btn-close">Cancel</a>
                                <input type="submit"  class="btn btn-primary " value="Guardar Cambios" id="btnGuardar">
                            </div>
                        </div>
                </form>


   <!--BOOTSTRAP JAVASCRIPT-->
{{--     <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
 --}}


    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="../Controladores/app.js"></script>




@endsection