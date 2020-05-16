<?php

namespace App\Http\Controllers;
use App\buses;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ViajesController;
use Illuminate\Http\Request;

class busesController extends Controller
{
    // Función para visualizar todos los buses que se encuentran almacenados en la base de datos
   public function index(){
        $b = new ViajesController();
        $b->index();
   }
   // Función que permite añadir nuevos unidades de transporte al sistema.
    public function store(request $request){
        $agregarBus = new buses();
        //$agregarBus->idbus = $request->idbus;
        $agregarBus->matricula = $request->matricula;
        $agregarBus->descripcion = $request->descripcion;
        $agregarBus->capacidad = $request->capacidad;
        $agregarBus->estado = $request->estado;
        $agregarBus->save();
        return view('viajes');
    }
    // Función que permite recuperar los datos del bus seleccionado y mostrarlos en la view "editarBuses" para posteriormente pasar a su actualización.
    public function edit($idbus){
        $busActualizar = buses::find($idbus);
        return view('editarBuses', compact('busActualizar', 'idbus'));
    }
    // Función para guardar los nuevos cambios realizados en los buses.
    public function update(request $request, $idbus){
        $agregarBus = buses::find($idbus);
        $agregarBus->matricula = $request->matricula;
        $agregarBus->descripcion = $request->descripcion;
        $agregarBus->capacidad = $request->capacidad;
        $agregarBus->estado = $request->estado;
        $agregarBus->save();
        return redirect('viajes');
    }
    //Función para eliminar del sistema el bus seleccionado.
    public function destroy($idbus){
        $agregarBus = buses::find($idbus);
        $agregarBus-> delete();
        return redirect('viajes');
    }

   
}
