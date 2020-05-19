<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class VentasController extends Controller
{
    public function index()
    {
        $origenes = DB::select(" SELECT DISTINCT lr.nombre, lr.idLugar as id
        from lugarrutas as lr 
        inner join rutas as r 
        on lr.idLugar = r.lugarInicio");

        
        return view('ventas',['origenes'=>$origenes]);
    }


    public function send_http_request(Request $request)
    {
        switch ($request->input('tipo')) {
            case 1:
                $origen_temp = $request->input('orig');
                $destinos = DB::select(" SELECT DISTINCT lugarrutas.nombre, lugarrutas.idLugar as id from (SELECT * from rutas WHERE rutas.lugarInicio = $origen_temp) as r inner join lugarrutas on lugarrutas.idLugar = r.lugarFin");
                return response()->json([
                    'success'=>$destinos
                ]);
                break;
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


                    case 5:
                        $idviaje = $request->input('idviaje');
                        $idruta = $request->input('idruta');
                        $fecha = $request->input('fecha');
                        $asientos = $request->input('asientos');
                        for($i = 0; $i < count($asientos); ++$i){
                           DB::insert("insert into boletos ( numeroasiento, idruta, idviaje, fecha) VALUES ( ?, ?, ?, ?)",[$asientos[$i],$idruta,$idviaje,$fecha]);
                        }
                        
                        return response()->json([
                            'success'=>[$idviaje,
                            $idruta,
                            $fecha,
                            $asientos]
                        ]);
                        break;


        }


            

    }

}
