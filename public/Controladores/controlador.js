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
                    <select class = "form-control" id="origen">
                      <option value="0" selected>------</option>
                    </select>
                  </div>
                  <label style="margin-top: 10px;text-align: right" class="col-2">Destino:</label>
                  <div style="margin-top: 10px;" class="col-4">
                    <select class = "form-control" id="destino">
                      <option value="0" selected>------</option>
                    </select>
                  </div>
                  <label style="margin-top: 10px;text-align: right" class="col-2">Hora Salida:</label>
                  <div style="margin-top: 10px;" class="col-4">
                    <select class = "form-control" id="hora">
                      <option value="0" selected>------</option>
                    </select>
                  </div>
                  <label style="margin-top: 10px;text-align: right;" class="col-2">Hora Llegada: </label>
                  <label style="margin-top: 10px;text-align: left;" class="col-4">------ </label>
                  <label style="margin-top: 10px;text-align: right" class="col-2">Disponibles:</label>
                  <label style="margin-top: 10px;text-align:left" class="col-4">------</label>
                  <label style="margin-top: 10px;text-align: right" class="col-2">Cantidad:</label>
                  <div style="margin-top: 10px;" class="col-4">
                    <input type="number" id="cantidad" min="1" max="25">
                  </div>
                </div>   
              </div>
            <button style="margin-left: 40%;" onclick="atrasBoleteria()" type="button" class="btn btn-secondary">Atras</button>
            <button style="margin-left: 10px;" onclick="boleteria()" type="button" class="btn btn-success">Continuar</button>

`;

var numAsientos = 25;
var ocupados = [1,2,3,4,5,11,12,17,18,20,25];
var seleccionados = []
var numBoleto = 6;
var numPersonas = 4;
var formPersonas = []
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

function boleteria(){
    document.getElementById("boleteria").classList.remove("active");
    document.getElementById("boleteria").classList.add("opt-success");
    document.getElementById("boleteria").disabled=true;
    document.getElementById("asientos").classList.add("active");
    document.getElementById("asientos").disabled=false;
    

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
                <div class="row">
                    ${genAsientos}
                </div>
            </div>
        </div>
    </div>
    <button style="margin-left: 40%;" onclick="atrasAsientos()" type="button" class="btn btn-secondary">Atras</button>
    <button style="margin-left: 10px;" onclick="asientos()" type="button" class="btn btn-success">Continuar</button>
`;
    document.getElementById("contenido").style="background-color:antiquewhite; width: 100%; height: 120vh; padding: 20px;"
}

function atrasAsientos(){
    document.getElementById("boleteria").classList.add("active");
    document.getElementById("boleteria").classList.remove("opt-success");
    document.getElementById("boleteria").disabled=false;
    document.getElementById("asientos").classList.remove("active");
    document.getElementById("asientos").disabled=true;
    document.getElementById("contenido").innerHTML = divBoleteria;
    document.getElementById("contenido").style="background-color:antiquewhite; width: 100%; height: 80vh; padding: 20px;";
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
    console.log(numBoleto);
}

function asientos(){
    let formularios = '';
    formPersonas = [];
    for(let i=1;i<=numPersonas;i++){
        let persona={
            identidad:"",
            nombre: "",
            apellido:"",
            telefono:"",
            correo:""
        }
        formPersonas.push(persona);
        formularios += `
                <div class="col-6 my-3">
                    <div class="row">
                        <h3 class="col-12 my-2"> Cliente ${i}</h3>
                      <Label  class="col-3 my-2">Identidad: </Label>
                      <div class="col-9">
                        <input value="${formPersonas[i-1].identidad}" id="identidad${i}" class="form-control my-1" type="text">
                      </div>
                      <Label class="col-3 my-2">Nombre: </Label>
                      <div class="col-9">
                        <input value="${formPersonas[i-1].nombre}" id="nombre${i}" class="form-control my-1" type="text">
                      </div>
                      <Label class="col-3 my-2">Apellido: </Label>
                      <div class="col-9">
                        <input value="${formPersonas[i-1].apellido}" id="apellido${i}" class="form-control my-1" type="text">
                      </div>
                      <Label class="col-3 my-2">Telefono: </Label>
                      <div class="col-9">
                        <input value="${formPersonas[i-1].telefono}" id="telefono${i}" class="form-control my-1" type="text">
                      </div>
                      <Label class="col-3 my-2">Correo: </Label>
                      <div class="col-9">
                        <input value="${formPersonas[i-1].correo}" id="correo${i}" class="form-control my-1" type="text">
                      </div>
                    </div>
                  </div>
        `;
    }

    document.getElementById("asientos").classList.remove("active");
    document.getElementById("asientos").classList.add("opt-success");
    document.getElementById("asientos").disabled=true;
    document.getElementById("datos").classList.add("active");
    document.getElementById("datos").disabled=false;
    document.getElementById("contenido").innerHTML = `
            <div>
                <h1 style="text-align: center;">Registro de Cliente</h1>
                <div class="row">
                    ${formularios}
                </div>
            </div>
            <button style="margin-left: 40%;" onclick="atrasDatos()" type="button" class="btn btn-secondary">Atras</button>
            <button style="margin-left: 10px;" onclick="datos()" type="button" class="btn btn-success">Continuar</button>
    `
    document.getElementById("contenido").style=`background-color:antiquewhite; width: 100%; height: ${40+50*Math.floor(numPersonas/2)}vh; padding: 20px;`;

}

function atrasDatos(){
    document.getElementById("asientos").classList.add("active");
    document.getElementById("asientos").classList.remove("opt-success");
    document.getElementById("asientos").disabled=false;
    document.getElementById("datos").classList.remove("active");
    document.getElementById("datos").disabled=true;

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
                <div class="row">
                    ${genAsientos}
                </div>
            </div>
        </div>
    </div>
    <button style="margin-left: 40%;" onclick="atrasAsientos()" type="button" class="btn btn-secondary">Atras</button>
    <button style="margin-left: 10px;" onclick="asientos()" type="button" class="btn btn-success">Continuar</button>
`;
    document.getElementById("contenido").style="background-color:antiquewhite; width: 100%; height: 120vh; padding: 20px;"
}



function datos(){

    let tarjetas = '';
    for(let i=1;i<=numPersonas;i++){
        formPersonas[i-1].identidad = document.getElementById(`identidad${i}`).value;
        formPersonas[i-1].nombre = document.getElementById(`nombre${i}`).value;
        formPersonas[i-1].apellido = document.getElementById(`apellido${i}`).value;
        formPersonas[i-1].telefono = document.getElementById(`telefono${i}`).value;
        formPersonas[i-1].correo = document.getElementById(`correo${i}`).value;
        

    
    }
    

}






`
<div class="card" style="width: 18rem;">
                <div class="card-body">
                    <Label>Nombre: </Label><br>
                    <Label>Origen: </Label><br>
                    <Label>Destino: </Label>
                    <Label>Fecha: </Label><br>
                    <Label>Hora Salida: </Label><br>
                    <Label>Asiento: </Label><br>
                </div>
              </div>

`