<?php

/*namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
*/
namespace App\Http\Controllers;

use App\Rutas;
use App\lugarRutas;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\DB;

class lugarRutasController extends Controller
{

    public function index()
    {

        //$datos['Lugares']=LugarRutas::paginate(1);
        return view('/home');
        //
    }

    public function create(request $request)
    {
        
        $this->validate($request, [
            'nombre' =>'required'
        ],[
            'nombre.required' => 'Campo obligatorio'
        ]);

        
        if(
            DB::table('lugarrutas')
        ->where('lugarrutas.nombre', $request->nombre)
        ->select('lugarrutas.*')
        ->exists()
        ){
        return redirect('rutas')->with('alert', 'Esta ciudad ya ha sido registrada');
        }else {
        $lugarRutas= new lugarRutas();
        $lugarRutas->nombre= $request->nombre;
        $lugarRutas-> save();
        return redirect('rutas')->with('alert2', 'Lugar agregado correctamente');;
        }
        //
    }
    //
    public function show(lugarRutas $lugarRutas)
    {
        return view('rutas');
        //
    }

    public function read(request $request){
        $rutas= DB::table('rutas')
        ->join('lugarRutas as lr', 'lr.idLugar', '=', 'rutas.lugarInicio')
        ->join('lugarRutas as lr1', 'lr1.idLugar', '=', 'rutas.lugarFin')
        ->select('rutas.*','lr.nombre as ciudadInicio','lr1.nombre as ciudadFin')
        ->orderBy('rutas.idRuta', 'asc')
        ->paginate(5);
        // dd($rutas);

        $ciudad=lugarRutas::all();
        
        return view('rutas',['ciudades'=>$ciudad, 'rutas'=>$rutas]);
    }

    public function edit($id)
    {
        $lugarRutas =lugarRutas::find($id);
        return view('editarLugar', compact('lugarRutas', 'id'))->with('alert2', 'Lugar editado correctamente');
    }

    public function destroy($id)
    {
        

        if(
            DB::table('rutas')
        ->join('lugarRutas as lr', 'lr.idLugar', '=', 'rutas.lugarInicio')
        ->join('lugarRutas as lr1', 'lr1.idLugar', '=', 'rutas.lugarFin')
        ->where('rutas.lugarInicio', $id)
        ->orWhere('rutas.lugarFin', $id)
        ->select('rutas.*')
        ->exists()
        ){
            return redirect('rutas')->with('alert', 'Lugar asociado a una ruta, no se puede borrar en este momento');
        }else {
            $lugarRutas =lugarRutas::find($id);
            $lugarRutas-> delete();
            return redirect('rutas')->with('alert', 'Lugar eliminado');
        }
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nombre' => 'required'

        ],[
            'nombre.required' => 'Campo obligatorio'
        ]);
        $lugarRutas =lugarRutas::find($id);
        $lugarRutas->nombre=$request->nombre;
        $lugarRutas->save();
        return redirect('rutas')->with('alert2', 'Lugar editado correctamente');
    }

}
