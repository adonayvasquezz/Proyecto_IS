



// viajes = [{
//     origen:"Tegucigalpa",
//     destino:"San Pedro Sula";
//     hsalida:"10:00 am"
//     hllegada:""
// }]

var numAsientos =25;
var ocupados = [1,2,3,4,5,11,12,17,18,20,25];
var seleccionados = []
var numBoleto = 6;
var origen ;
var destino;
var hora;
var cantidad ;

var divInicio = `
    <div style="height: 90%;">
        <h1 style="text-align: center;">Bienvenido a E-transs</h1>
        <br><br><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque laborum id nostrum illo maxime quisquam amet quia earum ex, ullam eos sint provident, totam ea, accusamus facere! Dolorem nisi sapiente est officia voluptate corporis eius itaque magni assumenda ea, fugiat quia adipisci optio ut perferendis, voluptatem laudantium animi incidunt ipsum?</p>  
    </div>
    <button style="margin-left: 45%;" onclick="inicio()" type="button" class="btn btn-success">Continuar</button>
`;

var divBoleteria = `
            <div style="height: 90%;">
                <h1 style="text-align: center;">Elija su Viaje</h1>
                <br>
                <div class="row">
                  <label style="margin-top: 10px; text-align: right;" class="col-2">Origen:</label>
                  <div style="margin-top: 10px;" class="col-4">
                    <select onchange="validarBoleteria()" class = "form-control" id="origen">
                      <option value="0" >------</option>
                      <option value="1" >Tegucigalpa</option>
                      <option value="2" >Comayagua</option>
                    </select>
                  </div>
                  <label style="margin-top: 10px;text-align: right" class="col-2">Destino:</label>
                  <div style="margin-top: 10px;" class="col-4">
                    <select onchange="validarBoleteria()" class = "form-control" id="destino">
                      <option value="0" selected>------</option>
                      <option value="1" >San Pedro Sula</option>
                      <option value="2" >La Ceiba</option>
                    </select>
                  </div>
                  <label style="margin-top: 10px;text-align: right" class="col-2">Hora Salida:</label>
                  <div style="margin-top: 10px;" class="col-4">
                    <select onchange="validarBoleteria()" class = "form-control" id="hora">
                      <option value="0" selected>------</option>
                      <option value="1">10:00 am</option>
                      <option value="2">01:00 pm</option>
                    </select>
                  </div>
                  <label style="margin-top: 10px;text-align: right;" class="col-2">Hora Llegada: </label>
                  <label style="margin-top: 10px;text-align: left;" class="col-4">------ </label>
                  <label style="margin-top: 10px;text-align: right" class="col-2">Disponibles:</label>
                  <label style="margin-top: 10px;text-align:left" class="col-4"> ${numAsientos - ocupados.length} </label>
                  <label style="margin-top: 10px;text-align: right" class="col-2">Precio:</label>
                  <label style="margin-top: 10px;text-align:left" class="col-4">100</label>
                  <label style="margin-top: 10px;text-align: right" class="col-2">Cantidad:</label>
                  <div style="margin-top: 10px;" class="col-4">
                    <input type="number" onchange="validarBoleteria()" id="cantidad" min="1" max="25">
                  </div>
                </div>   
              </div>
            <button style="margin-left: 40%;" onclick="atrasBoleteria()" type="button" class="btn btn-secondary">Atras</button>
            <button style="margin-left: 10px;" onclick="boleteria()" type="button" class="btn btn-success">Continuar</button>

`;

function inicio(){
    document.getElementById("inicio").classList.remove("active");
    document.getElementById("inicio").classList.add("opt-success");
    document.getElementById("inicio").disabled=true;
    document.getElementById("boleteria").classList.add("active");
    document.getElementById("boleteria").disabled=false;
    document.getElementById("contenido").innerHTML = divBoleteria;
}

function atrasBoleteria(){
    document.getElementById("inicio").classList.add("active");
    document.getElementById("inicio").classList.remove("opt-success");
    document.getElementById("inicio").disabled=false;
    document.getElementById("boleteria").classList.remove("active");
    document.getElementById("boleteria").disabled=true;
    document.getElementById("contenido").innerHTML = divInicio;
}

function validarBoleteria(){
    let valido = true;
    origen = document.getElementById("origen");
    destino = document.getElementById("destino");
    hora = document.getElementById("hora");
    cantidad = document.getElementById("cantidad")
    if(cantidad.value <1 || cantidad.value> (numAsientos - ocupados.length)){
        valido = false;
        cantidad.classList.add("error-form")
    }else{
        cantidad.classList.remove("error-form")
    }
    if(origen.value =="0"){
        valido = false;
        origen.classList.add("error-form")
    }else{
        origen.classList.remove("error-form")
    }
    if(destino.value =="0"){
        valido = false;
        destino.classList.add("error-form")
    }else{
        destino.classList.remove("error-form")
    }
    if(hora.value =="0"){
        valido = false;
        hora.classList.add("error-form")
    }else{
        hora.classList.remove("error-form")
    }
    return valido;
}

function boleteria(){
    if(validarBoleteria()){
        numBoleto = parseInt(cantidad.value);
        document.getElementById("boleteria").classList.remove("active");
        document.getElementById("boleteria").classList.add("opt-success");
        document.getElementById("boleteria").disabled=true;
        document.getElementById("asientos").classList.add("active");
        document.getElementById("asientos").disabled=false;
        generarAsientos();
    }
}

function generarAsientos(){
    genAsientos='';
    let src;
    for(let i=1;i<=numAsientos;i++){
        if(ocupados.lastIndexOf(i)==-1){
            if(seleccionados.lastIndexOf(i)==-1){
                src= "../Images/libre.png";
            }else{
                src = "../Images/seleccionado.png"
            }
            genAsientos += `<div class="col-2"><img width="50px" id= "img${i}" onclick="cambiarAsiento(${i})" src=${src}></div>`;
        }else{
            genAsientos += `<div class="col-2"><img width="50px" src="../Images/ocupado.png"></div>`;
        }
        if(i%2==0){
            if(i%4==0){
                genAsientos+= `</div><div class="row">`;
            }else{
                genAsientos+= `<div class="col-1"></div>`;
            }
        }
    }
    document.getElementById("contenido").innerHTML = `
    <div">
        <h1 style="text-align: center;">Seleccione su Asiento</h1>
        <h3 style="text-align: center;">Seleccione ${numBoleto} asientos</h3>
        <div class="row">
            <div class="col-6">
                <div class = "bg-bus-tp"></div>
                <div class = "bg-bus-md">
                    <div class="row">
                        ${genAsientos}
                    </div>
                </div>
                <div class = "bg-bus-lw"></div>
            </div>
        </div>
    </div>
    <br>
    <button style="margin-left: 40%;" onclick="atrasAsientos()" type="button" class="btn btn-secondary">Atras</button>
    <button style="margin-left: 10px;" onclick="asientos()" type="button" class="btn btn-success">Continuar</button>
`;
    document.getElementById("contenido").style=`height: ${90+12.5*Math.floor(numAsientos/4)}vh;`;
}

function atrasAsientos(){
        document.getElementById("boleteria").classList.add("active");
        document.getElementById("boleteria").classList.remove("opt-success");
        document.getElementById("boleteria").disabled=false;
        document.getElementById("asientos").classList.remove("active");
        document.getElementById("asientos").disabled=true;
        document.getElementById("contenido").innerHTML = divBoleteria;
        document.getElementById("contenido").style="height: 80vh;";
}

function cambiarAsiento(indice){
    let asiento = document.getElementById(`img${indice}`);
    if(asiento.getAttribute("src")=="../Images/libre.png"){
        if(numBoleto>0){
            asiento.src ="../Images/seleccionado.png";
            numBoleto -= 1;
            seleccionados.push(indice);
        }
    }else{
        asiento.src = "../Images/libre.png";
        numBoleto +=1;
        seleccionados.splice(seleccionados.lastIndexOf(indice),1);
    }
}

function asientos(){
    if(numBoleto == 0){
        document.getElementById("asientos").classList.remove("active");
        document.getElementById("asientos").classList.add("opt-success");
        document.getElementById("asientos").disabled=true;
        document.getElementById("confirmacion").classList.add("active");
        document.getElementById("confirmacion").disabled=false;
        document.getElementById("contenido").innerHTML = `
        <div style="height: 90%;">
            <h1 style="text-align: center;">Confirmacion y Pago</h1>  
                <div class="ml-5">
                    <Label style="margin-left: auto;margin-right: auto;">Nombre: </Label><br>
                    <Label>Origen: ${origen.value}</Label><br>
                    <Label>Destino: ${destino.value}</Label><br>
                    <Label>Fecha: </Label><br>
                    <Label>Hora Salida: ${hora.value}</Label><br>
                    <Label>Precio Boleto: </Label><br>
                    <Label>Cantidad: ${cantidad.value}</Label><br>
                    <Label>Asiento: ${seleccionados}</Label><br>
                    <Label>Subtotal: </Label><br>
                    <Label>Descuento: </Label><br>
                    <Label>Total a Pagar: </Label><br>
                </div>
        </div>
        <button style="margin-left: 40%;" onclick="atrasConfirmacion()" type="button" class="btn btn-secondary">Atras</button>
        <button style="margin-left: 10px;" onclick="confirmacion()" type="button" class="btn btn-success">Continuar</button>
        `;
        document.getElementById("contenido").style="height: 100vh;";
    }
}

function atrasConfirmacion(){
    document.getElementById("asientos").classList.add("active");
    document.getElementById("asientos").classList.remove("opt-success");
    document.getElementById("asientos").disabled=false;
    document.getElementById("confirmacion").classList.remove("active");
    document.getElementById("confirmacion").disabled=true;
    generarAsientos();
}

function confirmacion(){

}