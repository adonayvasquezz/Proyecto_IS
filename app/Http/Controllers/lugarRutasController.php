<?php

// Importaciones necesarias
namespace App\Http\Controllers;
use App\Log;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Rutas;
use App\lugarRutas;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
// Controlador del formulario LugarRutas
class lugarRutasController extends Controller
{
// Metodo que carga la vista
    public function index()
    {
        return view('/home');
     
    }


// Metodo que se utiliza para crear un nuevo registro en la tabla lugarRutas
    public function create(request $request)
    {
        // Validacion de campos vacios
        $this->validate($request, [
            'nombre' =>'required'
        ],[
            'nombre.required' => 'Campo obligatorio'
        ]);

        // Validacion de registros duplicados 
        if(
            DB::table('lugarrutas')
        ->where('lugarrutas.nombre', $request->nombre)
        ->select('lugarrutas.*')
        ->exists()
        ){
        return redirect('rutas')->with('warning', $request->nombre.' ya esta agregado');
        }else {
        // Si cumple las validaciones se crea el nuevo registro en la tabla
        $lugarRutas= new lugarRutas();
        $lugarRutas->nombre= $request->nombre;
        $lugarRutas-> save();
        // Se añade la accion a la bitacora de cambios
        $usuarioAccion = User::find(Auth::user()->id);
        $logs = new Log();
        $logs->action = 'Agrego el lugar con id: '.$lugarRutas->idLugar.' ,  nombre: '.$request->nombre;
        $logs->user = $usuarioAccion->id;
        $logs-> save();
        return redirect('rutas')->with('success', 'Lugar agregado correctamente');
        }
        //
    }
    // Muestra la vista
    public function show(lugarRutas $lugarRutas)
    {
        return view('rutas');
        
    }
// Metodo que lee y carga los datos de la BD
    public function read(request $request){
    // Craga todo los datos necesarios de la BD en la vista y los retorna
        $rutas= DB::table('rutas')
        ->join('lugarRutas as lr', 'lr.idLugar', '=', 'rutas.lugarInicio')
        ->join('lugarRutas as lr1', 'lr1.idLugar', '=', 'rutas.lugarFin')
        ->select('rutas.*','lr.nombre as ciudadInicio','lr1.nombre as ciudadFin')
        ->orderBy('rutas.idRuta', 'asc')
        ->paginate(5);
        $ciudad=lugarRutas::all();
        return view('rutas',['ciudades'=>$ciudad, 'rutas'=>$rutas]);
    }
// Metodo que carga los datos a editar
    public function edit($id)
    {
    // Obtiene los datos que se quieren editar y los retorna a la vista Editar Lugar
        $lugarRutas =lugarRutas::find($id);
        return view('editarLugar', compact('lugarRutas', 'id'));
    }
// Metodo utilizado para eliminar
    public function destroy($id)
    {
        // Valida que no exitsta alguna relacion del registro en otra tabla
        if(
            DB::table('rutas')
        ->join('lugarRutas as lr', 'lr.idLugar', '=', 'rutas.lugarInicio')
        ->join('lugarRutas as lr1', 'lr1.idLugar', '=', 'rutas.lugarFin')
        ->where('rutas.lugarInicio', $id)
        ->orWhere('rutas.lugarFin', $id)
        ->select('rutas.*')
        ->exists()
        ){
            return redirect('rutas')->with('warning', 'Lugar asociado a una ruta, no se puede borrar en este momento');
        }else {
        // Si cumple las validaciones elimina el registro.
            $lugarRutas =lugarRutas::find($id);
            $lugarRutas-> delete();
            // Se añade la accion a la bitacora de cambios
            $usuarioAccion = User::find(Auth::user()->id);
            $logs = new Log();
            $logs->action = 'Elimino el lugar con id: '.$id.' ,  nombre '.$lugarRutas->nombre;
            $logs->user = $usuarioAccion->id;
            $logs-> save();

            return redirect('rutas')->with('success', 'Lugar eliminado');
        }
    }

// Metodo utilizado para actualizar un registro en la tabla LugarRutas.
    public function update(Request $request, $id)
    {
        // Validacion de campos vacios.
        $this->validate($request, [
            'nombre' => 'required'

        ],[
            'nombre.required' => 'Campo obligatorio'
        ]);
        // Validacion de registros duplicados
        if(
            DB::table('lugarrutas')
        ->where('lugarrutas.nombre', $request->nombre)
        ->select('lugarrutas.*')
        ->exists()
        ){
        return redirect('rutas')->with('warning', $request->nombre.' ya esta agregado');
        }else{
        // si cumple las validaciones, actualiza el registr en la tabla.
        $lugarRutas =lugarRutas::find($id);
        $lugarRutas->nombre=$request->nombre;
        $lugarRutas->save();
        // Se añade la accion a la bitacora de cambios
        $usuarioAccion = User::find(Auth::user()->id);
        $logs = new Log();
        $logs->action = 'Edito el lugar con id: '.$id.' ,  nombre '.$lugarRutas->nombre;
        $logs->user = $usuarioAccion->id;
        $logs-> save();

        return redirect('rutas')->with('success', 'Lugar editado correctamente');
        }
    }

}
