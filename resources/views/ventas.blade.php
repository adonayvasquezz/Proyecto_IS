@extends('layouts.navbar')

@section('content')
{{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
 --}}
<link rel="stylesheet" href="../css/styles.css">
<script src="https://code.iconify.design/1/1.0.5/iconify.min.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="container">
    <div class="row">
        <div style="width: 100%; height: 80vh;" class="bg-light col-3">
            <div class="list-group list-group-flush">
              <button id="inicio" type="button" class="btn list-group-item active list-group-item-action"><span class="iconify" data-icon="emojione-monotone:digit-one"></span>  Inicio</button>
              <button id="boleteria" type="button" class="btn list-group-item list-group-item-action bg-light" disabled><span class="iconify" data-icon="emojione-monotone:digit-two"></span>  Boletería</button>
              <button id="asientos" type="button" class="btn list-group-item list-group-item-action bg-light" disabled><span class="iconify" data-icon="emojione-monotone:digit-three"></span>  Asientos</button>
              <button id="confirmacion" type="button" class="btn list-group-item list-group-item-action bg-light" disabled><span class="iconify" data-icon="emojione-monotone:digit-four"></span>  Confirmación Y Pago</button>
              <button id="fin" type="button" class="btn list-group-item list-group-item-action bg-light" disabled><span class="iconify" data-icon="emojione-monotone:digit-five"></span>  Fin</button>
            </div>
        </div>
        <div id="contenido" class="col-9 bg-content">
          <div style="height: 90%;">
            <h1 style="text-align: center;">Bienvenido a E-transs</h1>
            <br><br><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque laborum id nostrum illo maxime quisquam amet quia earum ex, ullam eos sint provident, totam ea, accusamus facere! Dolorem nisi sapiente est officia voluptate corporis eius itaque magni assumenda ea, fugiat quia adipisci optio ut perferendis, voluptatem laudantium animi incidunt ipsum?</p>
          
        </div>
        
        <script>
            function passInfo(){
              js_array =<?php echo json_encode($origenes );?>;
              inicio(js_array)
            }  
        </script>

        <button style="margin-left: 45%;" onclick="passInfo()" type="button" class="btn btn-success">Continuar</button>
        </div>
    </div>
<br>
<br>
<br>
</div>

<script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script language="JavaScript" src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script language="JavaScript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script language="JavaScript" src="{{ asset('Controladores/controlador.js') }}"></script>

<script>


function actualizarDestino(){    
    validarBoleteria() 
    if(parseInt(origen.value)!=0){   
        $.ajax({
          headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            type:'POST',
            url:"{{ route('ajaxRequest.post') }}",
            data:{tipo:1,orig:arrayOrigenes[parseInt(origen.value)-1].id},
            success:function(data){
               selectDestinos(data.success);
            }
         })
         
           
    }
}

function actualizarHorario(){    
    validarBoleteria();
    if( parseInt(destino.value) !=0){   
        $.ajax({
          headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            type:'POST',
            url:"{{ route('ajaxRequest.post') }}",
            data:{tipo:2,orig:arrayOrigenes[parseInt(origen.value)-1].id,desti:arrayDestinos[parseInt(origen.value)-1].id},
            success:function(data){
              selectHorarios(data.success);
            }
         })
           
    }
}

function actualizarDisponibles(){
  
  validarBoleteria();
    if( parseInt(hora.value) !=0){   
        $.ajax({
          headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            type:'POST',
            url:"{{ route('ajaxRequest.post') }}",
            data:{tipo:3,viaje:arrayHorarios[parseInt(hora.value)-1].viaje_idviaje,ruta:arrayHorarios[parseInt(hora.value)-1].ruta_idruta,fecha:fechaViaje.value},
            success:function(data){
              selectDisponibles(data.success);
            }
         })
           
    }
}

function obtenerOcupados(){
  validarBoleteria()
  if(validarBoleteria()){
    $.ajax({
          headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            type:'POST',
            url:"{{ route('ajaxRequest.post') }}",
            data:{tipo:4,viaje:arrayHorarios[parseInt(hora.value)-1].viaje_idviaje,ruta:arrayHorarios[parseInt(hora.value)-1].ruta_idruta,fecha:fechaViaje.value},
            success:function(data){
              
              llenarOcupados(data.success);
            }
         })


  }
}

function guardar(){
  $.ajax({
          headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            type:'POST',
            url:"{{ route('ajaxRequest.post') }}",
            data:{tipo:5,idviaje:parseInt(arrayHorarios[parseInt(hora.value)-1].viaje_idviaje),idruta:parseInt(arrayHorarios[parseInt(hora.value)-1].ruta_idruta),fecha:fechaViaje.value,asientos:seleccionados},
            success:function(data){
              console.log(data.success);
              
            }
         })
}      
      
      
      
      
      


</script>


@endsection