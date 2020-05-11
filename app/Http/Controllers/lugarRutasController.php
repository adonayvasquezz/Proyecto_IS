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
            'nombre' => 'required'

        ],[
            'nombre.required' => 'Campo obligatorio'
        ]);
        $lugarRutas= new lugarRutas();
        $lugarRutas->nombre= $request->nombre;
        $lugarRutas-> save();
        return redirect('rutas');
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
        ->join('lugarRutas as lr', 'lr.id', '=', 'rutas.lugarInicio')
        ->join('lugarRutas as lr1', 'lr1.id', '=', 'rutas.lugarFin')
        ->select('rutas.*','lr.nombre as ciudadInicio','lr1.nombre as ciudadFin')
        ->orderBy('rutas.id', 'asc')
        ->get();

        $ciudad=lugarRutas::all();
        
        return view('rutas',['ciudades'=>$ciudad, 'rutas'=>$rutas]);
    }

    public function edit($id)
    {
        $lugarRutas =lugarRutas::find($id);
        return view('editarLugar', compact('lugarRutas', 'id'));
    }

    public function destroy($id)
    {
        $lugarRutas =lugarRutas::find($id);
        $lugarRutas-> delete();

        // Flash('El usuario'. $lugarRutas->nombre .'ha sido eliminado correctamente')->error;
        return redirect('rutas');
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
        return redirect('rutas');
    }

}
