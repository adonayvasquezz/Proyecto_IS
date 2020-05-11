<?php

namespace App\Http\Controllers;

use App\viajes;
use App\rutasViajes;
use App\buses;
use App\lugarRutas;
use App\rutas;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
        $rutasViajes = rutasViajes::all();
        $rutas = rutas::all();
        $rutasSelect =array();

        if($rutas){
            foreach ($rutas as $ruta) {
                foreach ($Lugares as $lugar) {
                    if($ruta->lugarInicio == $lugar->id){
                        $ruta->lugarInicio= $lugar->nombre;
                    }
                    if($ruta->lugarFin == $lugar->id){
                        $ruta->lugarFin= $lugar->nombre;
                    }
                }
            }
        }
        // if($rutasViajes){
        //     foreach ($rutasViajes as $rutaViaje) {

        //     }
        // }
        return view('viajes',compact('buses','viajes','rutas')); // Equivalente a la creación de un arreglo asociativo.
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->validate($request, [
            'idruta' => 'required',
            'id' => 'required',
            'horaSalida' => 'required',
            'estado' => 'required'
        ],[
            'idruta.required' => 'La ruta es requerida',
            'horaSalida.required' =>  'La fecha y hora de salida es requerida',
            'estado.required' => 'El estado es requerido', 
            'id.required' => 'El Bus es requerido', 
        ]
        );
        $viajes= new viajes();
        $viajes->id= $request->id;
        $viajes->estado= $request->estado;
        $viajes-> save();
        $idAViajeRecienGuardada = $viajes->id;
        if ($idAViajeRecienGuardada) {
            $rutasViajes= new rutasViajes();
            $rutasViajes->ruta_idruta= $request->idruta;
            $rutasViajes->viaje_idviaje= $idAViajeRecienGuardada;
            $rutasViajes->horaSalida= str_replace("T", " ", $request->horaSalida);
            $rutasViajes-> save();
        }
        return back()->with('mensaje', 'El Viaje fue agregado exitosamente');
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
    //Función para eliminar del sistema el Viaje seleccionado.
    public function destroy($id){
        $eliminarViaje = viajes::find($id);
        $eliminarViaje-> delete();
        return redirect('viajes');
    }

}
