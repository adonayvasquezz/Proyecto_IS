<?php
// Clases y archivos necesarios
namespace App\Http\Controllers;
use App\Log;
use App\User;
use Illuminate\Support\Facades\Auth; 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Rutas;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;


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
     * Metodo utilizado para insertar una nueva ruta en la tabla
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validacion de campos vacios
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
        // Valida que la ciudad de inicio y fin sean diferentes en una ruta
        if($request->ciudadInicio==$request->ciudadFin){
            return redirect('rutas')->with('warning', 'Ciudad de Inicio y Fin deben ser diferentes');
        }else{
        // Si cumple las validaciones se crea el nuevo registro en la tabla
             $Rutas= new rutas();
        $Rutas->lugarInicio = $request->ciudadInicio;
        $Rutas->lugarFin = $request->ciudadFin;
        $Rutas->duracion= $request->duracion;
        $Rutas->precio= $request->precio;
        $Rutas-> save();
        // Se añade la accion a la bitacora de cambios
        $usuarioAccion = User::find(Auth::user()->id);
        $logs = new Log();
        $logs->action = 'Agrego la ruta: '.$Rutas->lugarInicio.'-'.$Rutas->lugarFin;
        $logs->user = $usuarioAccion->id;
        $logs-> save();
        return redirect('rutas')->with('success', 'Ruta agregada correctamente');
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
     * Metood que carga el registro a editar.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Obtiene toda la informacion necesaria para editar y lo retorna a la vista Editar Ruta
        $ciudad = DB::table('lugarRutas')->get();

        $Rutas =Rutas::find($id);

        $cA= DB::table('rutas')
        ->join('lugarRutas as lr', 'lr.idLugar', '=', 'rutas.lugarInicio')
        ->join('lugarRutas as lr1', 'lr1.idLugar', '=', 'rutas.lugarFin')
        ->select('rutas.lugarInicio as idInicio','rutas.lugarFin as idFin','lr.nombre as ciudadInicio','lr1.nombre as ciudadFin')
        ->where('rutas.idruta',$id)
        ->get();
    
      
        return view('editarRuta',['ciudades'=>$ciudad, 'Rutas'=>$Rutas,'cA'=>$cA]);
    }

    /**
     * Metodo que actualiza el registro en la tabla Rutas
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idruta)
    {
        // Validacion de campos vacios
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
        // Valida que la ciudad de inicio y fin sean diferentes en una ruta
        if($request->ciudadInicio==$request->ciudadFin){
            return redirect('rutas')->with('warning', 'Ciudad de Inicio y Fin deben ser diferentes');
        }else{
        // Si cumple las validaciones se actualiza el registro en la tabla Rutas
        $Rutas =rutas::find($idruta);
        $Rutas->lugarInicio = $request->ciudadInicio;
        $Rutas->lugarFin = $request->ciudadFin;
        $Rutas->duracion= $request->duracion;
        $Rutas->precio= $request->precio;
        $Rutas->save();
        // Se añade la accion a la bitacora de cambios
        $usuarioAccion = User::find(Auth::user()->id);
        $logs = new Log();
        $logs->action = 'Edito la ruta con id: '.$idruta;
        $logs->user = $usuarioAccion->id;
        $logs-> save();

        return redirect('rutas')->with('success', 'Ruta editada correctamente');
        }
    }

    /**
     * Metodo utilizado para eliimnar un registro en la tabla Rutas
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idruta)
    {
        // Valida que no exitsta alguna relacion del registro en otra tabla
        if(
            DB::table('rutaviajes')
        ->where('rutaviajes.ruta_idRuta', $idruta)
        ->select('rutaviajes.*')
        ->exists()
        ){
            return redirect('rutas')->with('warning', 'Ruta asociada a un viaje, no se puede borrar en este momento');
        }else {
        // Si cumple las validaciones elimina el registro.
        $Rutas =rutas::find($idruta);
        $Rutas-> delete();
        // Se añade la accion a la bitacora de cambios
        $usuarioAccion = User::find(Auth::user()->id);
        $logs = new Log();
        $logs->action = 'Elimino la ruta con id: '.$idruta;
        $logs->user = $usuarioAccion->id;
        $logs-> save();
        return redirect('rutas')->with('success', 'Ruta eliminada');
        }
    }
}
