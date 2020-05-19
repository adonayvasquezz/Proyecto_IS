//Funcionalidad para poder filtrar en la tabla
/*
(function($) {

	/**
	 * Generate an indented list of links from a nav. Meant for use with panel().
	 * @return {jQuery} jQuery object.
	 
$(document).ready(function() {
    $('#RutaList').DataTable();
} );

$(document).ready(function() {
    $('#lugarList').DataTable();
} );

})(jQuery);
*/
function validarLugares(){
	let valido=true;
	let ILugar=document.getElementById("ILugar");
	//let nombreLugar=document.getElementById("nombreLugar");
	if(idLugar.value==null){
		valido=false;
		ILugar.classList.add("error-form");
		console.log("no hay nada")
	} else{
		ILugar.classList.remove("error-form");
	}
	/*if(descripcion.value== null){
		valido=false;
		descripcion.classList.add("error-form");
	}else{
		descripcion.classList.remove("error-form");
	}*/
	return  valido;

}
function empty(data)
{
  if(typeof(data) == 'number' || typeof(data) == 'boolean')
  { 
    return false; 
  }
  if(typeof(data) == 'undefined' || data === null)
  {
    return true; 
  }
  if(typeof(data.length) != 'undefined')
  {
    return data.length == 0;
  }
  var count = 0;
  for(var i in data)
  {
    if(data.hasOwnProperty(i))
    {
      count ++;
    }
  }
  return count == 0;
}

function ValidacionLugares(){
	let valido=true;
	let ILugar=document.getElementById("ILugar");
	let nombreLugar=document.getElementById("nombreLugar");
	if(empty(nombreLugar.value)){
		valido=false;
		
		nombreLugar.classList.add("error-form");
	}else {
		valido=true;
		
		nombreLugar.classList.remove("error-form");
	}
	if(empty(ILugar.value)){
		valido=false;
		
		ILugar.classList.add("error-form");
	}else{
		valido=true;
		
		ILugar.classList.remove("error-form");
	}
	return valido;
	
}

function validando(){
	if(ValidacionLugares()){}
	console.log("")
}




function ValidacionRutas(){
	let valido=true;

	let inicio=document.getElementById("inicio");
	let fin=document.getElementById("fin");
	let duracion=document.getElementById("duracion");
	let precio=document.getElementById("precio");
	
	if(empty(inicio.value)){
		valido=false;
		
		inicio.classList.add("error-form");
	}else{
		valido=true;
		
		inicio.classList.remove("error-form");
	}
	if(empty(fin.value)){
		valido=false;
		
		fin.classList.add("error-form");
	}else {
		valido=true;
		fin.classList.remove("error-form");
	}
	if(empty(duracion.value)){
		valido=false;
		
		duracion.classList.add("error-form");
	}else {
		valido=true;
		duracion.classList.remove("error-form");
	}
	if(empty(precio.value)){
		valido=false;
		
		precio.classList.add("error-form");
	}else {
		valido=true;
		precio.classList.remove("error-form");
	}
	return valido;
	
}