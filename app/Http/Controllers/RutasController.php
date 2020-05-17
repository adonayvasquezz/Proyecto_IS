<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Rutas;
use Illuminate\Support\Facades\DB;


class RutasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'ciudadInicio' => 'required',
            'ciudadFin' => 'required',
            'duracion' => 'required',
            'precio' => 'required'

        ],[
            'ciudadInicio.required' => 'Seleccione una ciudad',
            'ciudadFin.required' => 'Seleccione una ciudad',
            'duracion.required' => 'Campo obligatorio',
            'precio.required' => 'Campo obligatorio'
        ]);
        if($request->ciudadInicio==$request->ciudadFin){
            return redirect('rutas')->with('alert', 'Ciudad de Inicio y Fin deben ser diferentes');
        }else{
             $Rutas= new rutas();
        $Rutas->lugarInicio = $request->ciudadInicio;
        $Rutas->lugarFin = $request->ciudadFin;
        $Rutas->duracion= $request->duracion;
        $Rutas->precio= $request->precio;
        $Rutas-> save();
        return redirect('rutas')->with('alert2', 'Ruta agregada correctamente');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ciudad = DB::table('lugarRutas')->get();

        $Rutas =Rutas::find($id);

        $cA= DB::table('rutas')
        ->join('lugarRutas as lr', 'lr.idLugar', '=', 'rutas.lugarInicio')
        ->join('lugarRutas as lr1', 'lr1.idLugar', '=', 'rutas.lugarFin')
        ->select('rutas.lugarInicio as idInicio','rutas.lugarFin as idFin','lr.nombre as ciudadInicio','lr1.nombre as ciudadFin')
        ->where('rutas.idruta',$id)
        ->get();
        // dd($cA);
      
        return view('editarRuta',['ciudades'=>$ciudad, 'Rutas'=>$Rutas,'cA'=>$cA]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idruta)
    {
        $this->validate($request, [
            'ciudadInicio' => 'required',
            'ciudadFin' => 'required',
            'duracion' => 'required',
            'precio' => 'required'

        ],[
            'ciudadInicio.required' => 'Seleccione una ciudad',
            'ciudadFin.required' => 'Seleccione una ciudad',
            'duracion.required' => 'Campo obligatorio',
            'precio.required' => 'Campo obligatorio'
        ]);
        if($request->ciudadInicio==$request->ciudadFin){
            return redirect('rutas')->with('alert', 'Ciudad de Inicio y Fin deben ser diferentes');
        }else{
        $Rutas =rutas::find($idruta);
        $Rutas->lugarInicio = $request->ciudadInicio;
        $Rutas->lugarFin = $request->ciudadFin;
        $Rutas->duracion= $request->duracion;
        $Rutas->precio= $request->precio;
        $Rutas->save();
        return redirect('rutas')->with('alert2', 'Ruta editada correctamente');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idruta)
    {
        if(
            DB::table('rutaviajes')
        ->where('rutaviajes.ruta_idRuta', $idruta)
        ->select('rutaviajes.*')
        ->exists()
        ){
            return redirect('rutas')->with('alert', 'Ruta asociada a un viaje, no se puede borrar en este momento');
        }else {
        $Rutas =rutas::find($idruta);
        $Rutas-> delete();
        // Flash('El usuario'. $lugarRutas->nombre .'ha sido eliminado correctamente')->error;
        return redirect('rutas')->with('alert', 'Ruta eliminada!');
        }
    }
}
