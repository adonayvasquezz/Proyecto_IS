<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Log;
use App\User;
use Illuminate\Support\Facades\Auth;

class VentasController extends Controller
{
    public function index()
    {
        // devuelve a la vista ventas, los lugares que se pueden seleccionar como origenes
        $origenes = DB::select(" SELECT DISTINCT lr.nombre, lr.idLugar as id
        from lugarrutas as lr 
        inner join rutas as r 
        on lr.idLugar = r.lugarInicio");

        
        return view('ventas',['origenes'=>$origenes]);
    }

    // funcion que se encarga de las peticiones ajax
    public function send_http_request(Request $request)
    {
        // se revisa primero que tipo de peticion es, para ver que procedimiento hacer
        switch ($request->input('tipo')) {
            //el primer tipo es el que se encarga de devolver los destinos que le corresponden a cada origen
            case 1:
                $origen_temp = $request->input('orig');
                $destinos = DB::select(" SELECT DISTINCT lugarrutas.nombre, lugarrutas.idLugar as id from (SELECT * from rutas WHERE rutas.lugarInicio = $origen_temp) as r inner join lugarrutas on lugarrutas.idLugar = r.lugarFin");
                return response()->json([
                    'success'=>$destinos
                ]);
                break;
            // el segundo tipo devuelve la informacion de la ruta con origen y destino correspondientes
            case 2:
                $origen_temp = $request->input('orig');
                $destino_temp = $request->input('desti');
                $destinos = DB::select("SELECT rv.ruta_idruta, rv.viaje_idviaje,rv.horaSalida,r.duracion, r.precio 
                FROM (select * from rutas WHERE lugarInicio = $origen_temp and lugarFin =$destino_temp) as r 
                INNER join rutaviajes as rv on rv.ruta_idruta = r.idruta");
                
                return response()->json([
                    'success'=>$destinos
                ]);
                break;
            // el tercero devuelve la cantidad de asientos disponibles en el dia y hora seleccionados
            case 3:
                $viaje_temp = $request->input('viaje');
                $ruta_temp = $request->input('ruta');
                $fecha_temp=$request->input('fecha');
                $disponibles = DB::select("select COUNT(*) as cantidad from boletos  
                WHERE boletos.idviaje = $viaje_temp and boletos.idruta = $ruta_temp and boletos.fecha = '$fecha_temp'");
                $capacidad = DB::select("select capacidad from buses 
                INNER JOIN viaje on viaje.idbus = buses.idbus
                where viaje.idviaje = $viaje_temp");
                return response()->json([
                    'success'=>[$capacidad,$disponibles]
                ]);
                break;
            // el cuarto se encarga de devolver el arreglo de asientos que estan ocupados, para que se muestren en el bus
            case 4:
                $viaje_temp = $request->input('viaje');
                $ruta_temp = $request->input('ruta');
                $fecha_temp=$request->input('fecha');
                $ocupados = DB::select("select boletos.numeroasiento from boletos  
                WHERE boletos.idviaje = $viaje_temp and boletos.idruta = $ruta_temp and boletos.fecha = '$fecha_temp'");
                return response()->json([
                    'success'=>$ocupados
                ]);
                break;

            // el quinto se encarga de guardar el boleto correspondiente y dejar el log de la accion
            case 5:
                $idviaje = $request->input('idviaje');
                $idruta = $request->input('idruta');
                $fecha = $request->input('fecha');
                $asientos = $request->input('asientos');
                $origen_temp = $request->input('origen');
                $destino_temp = $request->input('destino');
                for($i = 0; $i < count($asientos); ++$i){
                    DB::insert("insert into boletos ( numeroasiento, idruta, idviaje, fecha) VALUES ( ?, ?, ?, ?)",[$asientos[$i],$idruta,$idviaje,$fecha]);
                }
                $usuarioAccion = User::find(Auth::user()->id);
                $logs = new Log();
                $logs->action =  'Compro '.(count($asientos)).' boletos desde '.$origen_temp.' hasta '.$destino_temp.' para el dia '.$fecha;
                $logs->user = $usuarioAccion->id;
                $logs->save();
                return 0;
                break;


        }


            

    }

}
