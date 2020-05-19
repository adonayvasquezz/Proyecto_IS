<?php

namespace App\Http\Controllers;
use App\buses;
use App\Log;
use App\User;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ViajesController;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class busesController extends Controller
{
    public function store(){
        
    }
    // Función para visualizar todos los buses que se encuentran almacenados en la base de datos
   public function index(){
        $b = new ViajesController();
        $b->index();
   }
   // Función que permite añadir nuevos unidades de transporte al sistema.
    public function createBus(request $request){
        // Inicio de validaciones
        $this->validate($request, [
            'matricula'=> 'required|alpha_num',
            'descripcion'=>'required',
            'capacidad'=>'required|digits_between:1,2',
            'descripcion'=>'required',
        ],
        [
            'matricula.required'=>'El campo matrícula está vacío',
            'matricula.alpha_num'=>'No se permiten caracteres especiales',
            'descripcion.required'=>'El campo descripción está vacío',
            'capacidad.required'=>'El campo capacidad está vacío',
            'capacidad.digits_between'=>'La capacidad ingresada es inválida',
            'estado.required'=>'El campo estado está vacío',
        ]
    );
        $agregarBus = new buses();
        //$agregarBus->idbus = $request->idbus;
        $agregarBus->matricula = $request->matricula;
        $agregarBus->descripcion = $request->descripcion;
        $agregarBus->capacidad = $request->capacidad;
        $agregarBus->estado = $request->estado;
        $agregarBus->save();
        // Instrucciones para almacenar en la tabla de logs las unidades de transporte almacenadas.
        $usuarioAccion = User::find(Auth::user()->id);
        $logs = new Log();
        $logs->action = 'Se agregó la unidad de transporte con matrícula: '.$request->matricula;
        $logs->user = $usuarioAccion->id;
        $logs-> save();
        return redirect('viajes')->with('success', 'Bus agregado correctamente');
        
    }
    // Función que permite recuperar los datos del bus seleccionado y mostrarlos en la view "editarBuses" para posteriormente pasar a su actualización.
    public function edit($idbus){
        $busActualizar = buses::find($idbus);
        return view('editarBuses', compact('busActualizar', 'idbus'));
    }
    // Función para guardar los nuevos cambios realizados en los buses.
    public function update(request $request, $idbus){
        $this->validate($request, [
            'matricula'=> 'required|alpha_num',
            'descripcion'=>'required',
            'capacidad'=>'required|digits_between:1,2',
            'descripcion'=>'required',
        ],
        [
            'matricula.required'=>'El campo matrícula está vacío',
            'matricula.alpha_num'=>'No se permiten caracteres especiales',
            'descripcion.required'=>'El campo descripción está vacío',
            'capacidad.required'=>'El campo capacidad está vacío',
            'capacidad.digits_between'=>'La capacidad ingresada es inválida',
            'estado.required'=>'El campo estado está vacío',
        ]
    );
        $agregarBus = buses::find($idbus);
        $agregarBus->matricula = $request->matricula;
        $agregarBus->descripcion = $request->descripcion;
        $agregarBus->capacidad = $request->capacidad;
        $agregarBus->estado = $request->estado;
        $agregarBus->save();
        // Actualización de buses añadido en la tabla logs.
        $usuarioAccion = User::find(Auth::user()->id);
        $logs = new Log();
        $logs->action = 'Se actualizó el bus con matrícula: '.$request->matricula;
        $logs->user = $usuarioAccion->id;
        $logs-> save();
        return redirect('viajes')->with('success', 'Bus actualizado correctamente');
    }
    //Función para eliminar del sistema el bus seleccionado.
    public function destroy($idbus){
            $agregarBus = buses::find($idbus);
            $busEnUso = DB::table('viaje')
            ->where('idbus', '=', $idbus)->get();
            if($busEnUso->isEmpty()){
                $agregarBus-> delete();
                // Eliminación de buses añadido en la tabla logs.
                $user = User::find(Auth::user()->id)->id;
                $logEliminar = new Log();
                $logEliminar->action = 'El bus con id '.$idbus.' fue eliminado';
                $logEliminar->user = $user;
                $logEliminar-> save();
                return redirect('viajes')->with('success', 'Bus eliminado correctamente');
            }else{
                return redirect('viajes')->with('warning', 'No es posible eliminar este bus');
            }   
        
        
    }

   
}
