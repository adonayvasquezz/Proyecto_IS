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
    <div class="titulo-edicion">Actualización de buses</div>
    <form class="form" role="form" autocomplete="off" action="{{action('busesController@update', $idbus)}}" method = "post">
        {{csrf_field()}}
            <div class="form-group row">
                <label class="col-lg-3 col-form-label form-control-label">Matrícula</label>
                <div class="col-lg-9">
                    <input class="form-control @error('matricula') is-invalid @enderror" name="matricula" type="text" value="{{$busActualizar->matricula}}">
                    @error('matricula')
                      <span class="invalid-feedback mensaje-error" role="alert">
                        {{ $message }}
                      </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-lg-3 col-form-label form-control-label">Descripción</label>
                <div class="col-lg-9">
                    <input class="form-control @error('descripcion') is-invalid @enderror" name="descripcion" type="text" value="{{$busActualizar->descripcion}}">
                    @error('descripcion')
                      <span class="invalid-feedback mensaje-error" role="alert">
                        {{ $message }}
                      </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-lg-3 col-form-label form-control-label">Capacidad de pasajeros</label>
                <div class="col-lg-9">
                    <input class="form-control @error('capacidad') is-invalid @enderror" name="capacidad" type="number" value="{{$busActualizar->capacidad}}">
                    @error('capacidad')
                      <span class="invalid-feedback mensaje-error" role="alert">
                        {{ $message }}
                      </span>
                    @enderror
                </div>
            </div>
            <label for="">Estado del bus <br> previamente seleccionado: <span style="color: #ed2b46">{{$busActualizar->estado}}</span> </label>
            <div class="form-group row">
                <label class="col-lg-3 col-form-label form-control-label">Nuevo estado</label>
                <div class="col-lg-9">
                    <select class="form-control" id="sel1" name="estado">
                        <option>Activo</option>
                        <option>Inactivo</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-lg-12 text-center">
                    <input type="reset" class="btn btn-secondary" value="Cancelar">
                    <input type="submit" class="btn btn-primary" value="Guardar cambios">
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