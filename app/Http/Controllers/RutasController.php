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
        $Rutas= new Rutas();
        $Rutas->lugarInicio = $request->ciudadInicio;
        $Rutas->lugarFin = $request->ciudadFin;
        $Rutas->duracion= $request->duracion;
        $Rutas->precio= $request->precio;
        $Rutas-> save();
        return redirect('rutas');
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
        return view('editarRuta',['ciudades'=>$ciudad, 'Rutas'=>$Rutas]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
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
        $Rutas =Rutas::find($id);
        $Rutas->lugarInicio = $request->ciudadInicio;
        $Rutas->lugarFin = $request->ciudadFin;
        $Rutas->duracion= $request->duracion;
        $Rutas->precio= $request->precio;
        $Rutas->save();
        return redirect('rutas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Rutas =Rutas::find($id);
        $Rutas-> delete();
        // Flash('El usuario'. $lugarRutas->nombre .'ha sido eliminado correctamente')->error;
        return redirect('rutas');
    }
}
