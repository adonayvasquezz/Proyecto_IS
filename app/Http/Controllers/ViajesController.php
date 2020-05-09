<?php

namespace App\Http\Controllers;

use App\Viajes;
use App\rutasViajes;
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
        return view('viajes');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->validate($request, [
            'idRuta' => 'required',
            'bus' => 'required',
            'horaSalida' => 'required',
            'estado' => 'required'
        ],[
            'idRuta.required' => 'La ruta es requerida',
            'horaSalida.required' =>  'La fecha y hora de salida es requerida',
            'estado.required' => 'El estado es requerido', 
        ]
        );
        $viajes= new viajes();
        $viajes->$request->except(['idRuta', 'horaSalida']);
        $viajes-> save();
        $idAViajeRecienGuardada = $viajes->id;
        if ($idAViajeRecienGuardada) {
            $rutasViajes= new rutasViajes();
            $rutasViajes->ruta_idRuta= $request->idRuta;
            $rutasViajes->viaje_idViaje= $idAViajeRecienGuardada;
            $rutasViajes->horaSalida= $request->horaSalida;
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
        $viajes=viajes::all();
        $rutasViajes=rutasViajes::all();
        foreach($viajes as $viaje){
            
        }
        return view('rutas',['viajes'=>$viajes]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Viajes  $viajes
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('viajes#formViajes', compact('id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Viajes  $viajes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Viajes $viajes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Viajes  $viajes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Viajes $viajes)
    {
        //
    }
}
