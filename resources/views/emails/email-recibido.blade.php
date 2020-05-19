<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="utf-8">
   <!-- <meta http-equiv="refresh" content="0;URL='/'" />   -->
   <title>Mensaje enviado</title>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
   <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
   <script>
      $(document).ready(function()
      {
         $("#mostrarmodal").modal("show");
      });
    </script>
</head>
<body>

<div>
<!-- Cuerpo del mensaje -->
    <h2>Nuevo Mensaje</h2>
    
    <p><strong>Usuario:</strong>{{$msj['name']}}</p>
    <p><strong>Correo:</strong>{{$msj['email']}}</p>
    <p><strong>Asunto:</strong>{{$msj['subject']}}</p>
    <p><strong>Mensaje:</strong>{{$msj['message']}}</p><br>

</div>
   <!-- <div class="modal fade" id="mostrarmodal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
           <div class="modal-header">
              <h3>Mensaje enviado exitosamente</h3>
           </div>
           <div class="modal-footer">
          <a  href="" data-dismiss="modal" class="btn btn-danger">
          <form action="">
          </form></a>
         
           </div>
      </div>
   </div> -->
</div>
</body>
</html>