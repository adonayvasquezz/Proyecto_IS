@extends('layouts.navbar')

@section('content')
{{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
 --}}
<link rel="stylesheet" href="../css/styles.css">
<script src="https://code.iconify.design/1/1.0.5/iconify.min.js"></script>

<div class="container">
    <div class="row">
        <div style="width: 100%; height: 80vh;" class="bg-light col-3">
            <div class="list-group list-group-flush">
              <button id="inicio" type="button" class="btn list-group-item active list-group-item-action"><span class="iconify" data-icon="emojione-monotone:digit-one"></span>  Inicio</button>
              <button id="boleteria" type="button" class="btn list-group-item list-group-item-action bg-light" disabled><span class="iconify" data-icon="emojione-monotone:digit-two"></span>  Boletería</button>
              <button id="asientos" type="button" class="btn list-group-item list-group-item-action bg-light" disabled><span class="iconify" data-icon="emojione-monotone:digit-three"></span>  Asientos</button>
              <button id="datos" type="button" class="btn list-group-item list-group-item-action bg-light" disabled><span class="iconify" data-icon="emojione-monotone:digit-four"></span>  Datos</button>
              <button id="confirmacion" type="button" class="btn list-group-item list-group-item-action bg-light" disabled><span class="iconify" data-icon="emojione-monotone:digit-five"></span>  Confirmación</button>
              <button id="terminos" type="button" class="btn list-group-item list-group-item-action bg-light" disabled><span class="iconify" data-icon="emojione-monotone:digit-six"></span>  Términos</button>
              <button id="pago" type="button" class="btn list-group-item list-group-item-action bg-light" disabled><span class="iconify" data-icon="emojione-monotone:digit-seven"></span>  Pago</button>
              <button id="fin" type="button" class="btn list-group-item list-group-item-action bg-light" disabled><span class="iconify" data-icon="emojione-monotone:digit-eight"></span>  Fin</button>
            </div>
        </div>
        <div id="contenido" style="background-color:antiquewhite; width: 100%; height: 80vh; padding: 20px;" class="col-9">
          <div style="height: 90%;">
            <h1 style="text-align: center;">Bienvenido a E-transs</h1>
            <br><br><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque laborum id nostrum illo maxime quisquam amet quia earum ex, ullam eos sint provident, totam ea, accusamus facere! Dolorem nisi sapiente est officia voluptate corporis eius itaque magni assumenda ea, fugiat quia adipisci optio ut perferendis, voluptatem laudantium animi incidunt ipsum?</p>
        </div>
        <button style="margin-left: 45%;" onclick="inicio()" type="button" class="btn btn-success">Continuar</button>
        </div>
    </div>
<br>
<br>
<br>
</div>
{{-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script> --}}

<script src="{{ asset('Controladores/controlador.js') }}"></script>

@endsection
