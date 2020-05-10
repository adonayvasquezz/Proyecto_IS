<?php

namespace App\Http\Controllers;
use App\buses;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class busesController extends Controller
{
    // Función para visualizar todos los buses que se encuentran almacenados en la base de datos
   public function index(){
       //$datos['buses']= buses::paginate(20);
       //return view('viajes', $datos);
       $buses = buses::all();
       return view('viajes',compact('buses')); // Equivalente a la creación de un arreglo asociativo.
   }
   // Función que permite añadir nuevos unidades de transporte al sistema.
    public function store(request $request){
        $agregarBus = new buses();
        //$agregarBus->idbus = $request->idbus;
        $agregarBus->estado = $request->estado;
        $agregarBus->capacidad = $request->capacidad;
        $agregarBus->save();
        return back()->with('agregar', 'Bus agregado correctamente');
    }
    // Función que permite recuperar los datos del bus seleccionado y mostrarlos en la view "editarBuses" para posteriormente pasar a su actualización.
    public function edit($id){
        $busActualizar = buses::find($id);
        return view('editarBuses', compact('busActualizar', 'id'));
    }
    // Función para guardar los nuevos cambios realizados en los buses.
    public function update(request $request, $id){
        $agregarBus = buses::find($id);
        $agregarBus->capacidad = $request->capacidad;
        $agregarBus->estado = $request->estado;
        $agregarBus->save();
        return redirect('viajes');
    }
    //Función para eliminar del sistema el bus seleccionado.
    public function destroy($id){
        $agregarBus = buses::find($id);
        $agregarBus-> delete();
        return redirect('viajes');
    }

   
}
