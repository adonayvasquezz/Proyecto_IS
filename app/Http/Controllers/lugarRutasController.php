<?php

/*namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
*/
namespace App\Http\Controllers;

use App\lugarRutas;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 

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
        $ciudad=lugarRutas::all();
        return view('rutas',['ciudades'=>$ciudad]);
    }
/*
    public function destroy($idLugar){
        lugarRutas::destroy($idLugar);
        return redirect('rutas');
    }
    */
    public function destroy($idLugar)
    {
        $Lugar = LugarRutas::find($idLugar);
        
        $Lugar->delete();
 
        return redirect('rutas');
    }

}
