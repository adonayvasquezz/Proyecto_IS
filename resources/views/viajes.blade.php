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


    <div class="container">
        <div class="mx-auto col-sm-8 main-section" id="myTab" role="tablist">
            <ul class="nav nav-tabs justify-content-end">
                <li class="nav-item">
                    <a class="nav-link active" id="list-tab" data-toggle="tab" href="#list" role="tab"
                        aria-controls="list" aria-selected="false">Viajes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="form-tab" data-toggle="tab" href="#form" role="tab" aria-controls="form"
                        aria-selected="true">Formulario de Viajes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " id="list-tab" data-toggle="tab" href="#listaLugares" role="tab"
                        aria-controls="list" aria-selected="true">Buses</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="form-tab" data-toggle="tab" href="#formLugar" role="form"
                        aria-controls="form" aria-selected="true">Form Buses</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active navegacionForm" id="list" role="tabpanel"
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
                                            <th scope="col">ID</th>
                                            <th scope="col">Hora Salida</th>
                                            <th scope="col">ID Bus</th>
                                            <th scope="col">Estado</th>
                                            <th scope="col">Ruta</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>3:00 pm</td>
                                            <td>991020</td>
                                            <td>Activo</td>
                                            <td>San pedro a Tegucigalpa</td>
                                            <td>
                                                <a href="#" class="awe"><i class="fas fa-edit"></i></a> | <a href="#"
                                                    class="awe"><i class="fas fa-trash"></i></a>


                                            </td>
                                        </tr>
                                    </tbody>
                                    <tbody>
                                        <tr>
                                            <th scope="row">2</th>
                                            <td>8:00 am</td>
                                            <td>102015</td>
                                            <td>Inactivo</td>
                                            <td>Catacamas a Tegucigalpa</td>
                                            <td>
                                                <a href="#" class="awe"><i class="fas fa-edit"></i></a> | <a href="#"
                                                    class="awe"><i class="fas fa-trash"></i></a>


                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
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

                            <form class="form" role="form" autocomplete="off">
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">ID Ruta</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="number">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Hora de Salida</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-lg-3 col-form-label form-control-label">Bus ID</label>
                                    <div class="col-lg-9">
                                        <select class="form-control" id="sel1">
                                            <option>102015 - Bus Combi Blanco</option>
                                            <option>991020 - Bus Mitsubishi Amarillo</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-lg-3 col-form-label form-control-label">ID Ruta</label>
                                    <div class="col-lg-9">
                                        <select class="form-control" id="sel1">
                                            <option>1 - San pedro a Tegucigalpa</option>
                                            <option>2 - Catacamas a Tegucigalpa</option>
                                        </select>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Precio</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="number">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-12 text-center">
                                        <input type="reset" class="btn btn-secondary" value="Cancelar">
                                        <input type="button" class="btn btn-primary" value="Guardar Cambiios">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade show navegacionForm" id="listaLugares" role="tabpanel"
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
                                        <th scope="col">Descripcion de Bus</th>
                                        <th scope="col">Capacidad</th>
                                        <th scope="col">Estado</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">102015</th>
                                        <td>Bus Combi Blanco</td>
                                        <td>50</td>
                                        <td>Activo</td>
                                        <td>
                                            <a href="#" class="awe"><i class="fas fa-edit"></i></a> | <a href="#"
                                                class="awe"><i class="fas fa-trash"></i></a>


                                        </td>
                                    </tr>
                                </tbody>
                                <tbody>
                                    <tr>
                                        <th scope="row">991020</th>
                                        <td>Bus Combi Blanco</td>
                                        <td>45</td>
                                        <td>Activo</td>
                                        <td>
                                            <a href="#" class="awe"><i class="fas fa-edit"></i></a> | <a href="#"
                                                class="awe"><i class="fas fa-trash"></i></a>


                                        </td>
                                    </tr>
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
                        <!-- Formulario de Buses-->

                        <form class="form" role="form" autocomplete="off">
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">ID Bus(Matricula)</label>
                                <div class="col-lg-9">
                                    <input class="form-control" type="number">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Descripcion de Bus</label>
                                <div class="col-lg-9">
                                    <input class="form-control" type="Varchar">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Capacidad</label>
                                <div class="col-lg-9">
                                    <input class="form-control" type="number">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Estado</label>
                                <div class="col-lg-9">
                                    <select class="form-control" id="sel1">
                                        <option>Activo</option>
                                        <option>Inactivo</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-12 text-center">
                                    <input type="reset" class="btn btn-secondary" value="Cancelar">
                                    <input type="button" class="btn btn-primary" value="Guardar Cambios">
                                </div>
                            </div>
                        </form>
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
