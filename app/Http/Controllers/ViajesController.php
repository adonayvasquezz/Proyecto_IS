<?php

namespace App\Http\Controllers;

use App\viajes;
use App\rutasViajes;
use App\buses;
use App\lugarRutas;
use App\rutas;
use App\Log;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ViajesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $viajes = viajes::all();
        $buses = buses::all();
        $Lugares = lugarRutas::all();
        $rutasViajes = DB::table('rutaviajes')
        ->select('rutaviajes.*')
        ->orderBy('rutaviajes.viaje_idviaje', 'asc')
        ->paginate(5);

        $rutas = rutas::all();
        $rutasSelect =array();

        if($rutas){
            foreach ($rutas as $ruta) {
                foreach ($Lugares as $lugar) {
                    if($ruta->lugarInicio == $lugar->idLugar){
                        $ruta->lugarInicio= $lugar->nombre;
                    }
                    if($ruta->lugarFin == $lugar->idLugar){
                        $ruta->lugarFin= $lugar->nombre;
                    }
                }
            }
        }
        if($rutasViajes){
            foreach ($rutasViajes as $rutaViaje) {
                foreach ($rutas as $ruta) {
                    if($ruta->idruta == $rutaViaje->ruta_idruta){
                        $rutaViaje->lugarInicio= $ruta->lugarInicio;
                        $rutaViaje->lugarFin= $ruta->lugarFin;
                    }
                }
                foreach ($viajes as $viaje) {
                    if($viaje->idviaje == $rutaViaje->viaje_idviaje){
                        $rutaViaje->idbus= $viaje->idbus;
                        foreach ($buses as $bus) {
                            if($rutaViaje->idbus == $bus->idbus){
                                $rutaViaje->matriculaBus= $bus->matricula;
                                $rutaViaje->descripcionBus= $bus->descripcion;
                                $rutaViaje->capacidadBus= $bus->capacidad;
                            }
                        }
                        $rutaViaje->estado= $viaje->estado;
                    }
                }
            }

        }
        return view('viajes',compact('buses','rutasViajes','rutas','viajes')); // Equivalente a la creación de un arreglo asociativo.
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->validate($request, [
            'idviaje' => 'required',
            'idruta' => 'required',
            'idbus' => 'required',
            'horaSalida' => 'required',
            'estado' => 'required'
        ],[
            'idviaje.required' => 'Es requerida una opcion para el viaje',
            'idruta.required' => 'La ruta es requerida',
            'horaSalida.required' =>  'La hora de salida es requerida',
            'estado.required' => 'El estado es requerido', 
            'id.required' => 'El Bus es requerido'
        ]);
        if($request->idviaje == 'nuevo'){
            $viajes= new viajes();
            $viajes->idbus= $request->idbus;
            $viajes->estado= $request->estado;
            $viajes-> save();
            $idAViajeRecienGuardada = $viajes->idviaje;
        }else{
            $idAViajeRecienGuardada = $request->idviaje;
        }
        if ($idAViajeRecienGuardada) {
            $viajeExistente =DB::table('rutaviajes')
            ->where('viaje_idviaje', '=', $idAViajeRecienGuardada)->where('ruta_idruta', '=', $request->idruta)->get();
            if($viajeExistente->isEmpty()){
                $rutasViajes= new rutasViajes();
                $rutasViajes->ruta_idruta= $request->idruta;
                $rutasViajes->viaje_idviaje= $idAViajeRecienGuardada;
                $rutasViajes->horaSalida= $request->horaSalida;
                $rutasViajes-> save();
            }else{
                return back()->with('mensaje',  'El Viaje '.$idAViajeRecienGuardada.' y la '.$request->idruta.' ya estan asociados');
            }
    
        }
         //Log de crear viaje.
         $user = User::find(Auth::user()->id);
         $logCrear = new Log();
         $logCrear->action = 'El Viaje '.$idAViajeRecienGuardada.' fue creado exitosamente con la ruta '.$request->idruta;
         $logCrear->user = $user;
         $logCrear-> save();
        return back()->with('mensaje',  'El Viaje '.$idAViajeRecienGuardada.' fue creado exitosamente con la ruta '.$request->idruta);
    }

    public function show(viajes $viajes)
    {
        return view('viajes');
        //
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Viajes  $viajes
     * @return \Illuminate\Http\Response
     */
    public function read(request $request){
      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Viajes  $viajes
     * @return \Illuminate\Http\Response
     */
     // Función que permite recuperar los datos del Viaje seleccionado y mostrarlos en la view "editarViajes" para posteriormente pasar a su actualización.
     public function edit(Request $request, $id)
    {
        $buses = buses::all();
        $Lugares = lugarRutas::all();
        $rutasViajes =rutasViajes::all();
        foreach ($rutasViajes as $rutasViaje) {
            if($rutasViaje->viaje_idviaje == $id && $rutasViaje->ruta_idruta == $request->idruta){
                $horaSalida =  $rutasViaje->horaSalida;
            }
        }
        
        $ruta = rutas::find($request->idruta);
            if($ruta){
                foreach ($Lugares as $lugar) {
                    if($ruta->lugarInicio == $lugar->idLugar){
                        $ruta->lugarInicio= $lugar->nombre;
                    }
                    if($ruta->lugarFin == $lugar->idLugar){
                        $ruta->lugarFin= $lugar->nombre;
                    }
                }
         }
        $viaje = viajes::find($id);
        $bus = buses::find($viaje->idbus);
        return view('editarViaje',compact('buses','viaje','ruta','bus','horaSalida'));
    }
    // Función para guardar los nuevos cambios realizados en los Viajes.
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'idviaje' => 'required',
            'idruta' => 'required',
            'idbus' => 'required',
            'horaSalida' => 'required',
            'estado' => 'required'
        ],[
            'idviaje.required' => 'Es requerida una opcion es requerida',
            'idruta.required' => 'La ruta es requerida',
            'horaSalida.required' =>  'La fecha y hora de salida es requerida',
            'estado.required' => 'El estado es requerido', 
            'idbus.required' => 'El Bus es requerido', 
        ]
        );
        $viajes =viajes::find($id);
        $viajes->estado= $request->estado;
        $viajes->idbus= $request->idbus;
        $viajes-> save();
        if ($request->idruta) {
            DB::table('rutaviajes')
            ->where('viaje_idviaje', '=', $id)->where('ruta_idruta', '=', $request->idruta)
            ->update([
                'horaSalida' => $request->horaSalida,
            ]);
        }
         //Log de editar viaje.
         $user = User::find(Auth::user()->id);
         $logEditar = new Log();
         $logEditar->action = 'El Viaje '.$id.' fue editado exitosamente';
         $logEditar->user = $user;
         $logEditar-> save();
        return redirect('viajes')->with('mensaje', 'El Viaje '.$id.' fue editado exitosamente');
    }
    //Función para eliminar del sistema el Viaje seleccionado.
    public function destroy(Request $request, $id){
        DB::table('rutaviajes')
        ->where('viaje_idviaje', '=', $id)->where('ruta_idruta', '=', $request->idruta)->delete();
        $viajeEnUso = DB::table('rutaviajes')
        ->where('viaje_idviaje', '=', $id)->get();
        if($viajeEnUso->isEmpty()){
            $viaje = viajes::find($id);
            $viaje->delete();
        }
        //Log de eliminar viaje.
        $user = User::find(Auth::user()->id);
        $logEliminar = new Log();
        $logEliminar->action = 'La ruta '.$request->idruta.' fue eliminada  del viaje '.$id;
        $logEliminar->user = $user;
        $logEliminar-> save();
        return redirect('viajes')->with('mensaje',  'La ruta '.$request->idruta.' fue eliminada  del viaje '.$id);
    }

}
