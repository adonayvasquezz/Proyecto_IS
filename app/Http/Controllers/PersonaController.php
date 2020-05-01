<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Persona;
use DB;
use App\Http\Controllers\Controller;

class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = User::find(Auth::user()->id);
        $persona = User::find(Auth::user()->id)->perfil;

        return view('perfil', ['user'=>$user, 'persona'=>$persona]);

       /*  $procedimiento = DB::select('call new_procedure()');

        return $procedimiento; */
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find(Auth::user()->id);
        $persona = User::find(Auth::user()->id)->perfil;
        if (empty($persona)) {
            $nuevaPersona = new Persona;
            $nuevaPersona->idPersona = $id;
            $nuevaPersona->pnombre = $user->name;
            $nuevaPersona->save();
          }

        $persona = User::find(Auth::user()->id)->perfil;
        //$persona = Persona::where('codigoPersona',$id)->first();

        return view('perfil-editar', compact('persona', 'id', 'user'));
        //return $id;
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

        // Actualizar los datos de una tabla con la forma estandar de laravel

        $perfil = Persona::find($id);
        $perfil->pnombre = $request->pnombre;
        $perfil->snombre = $request->snombre;
        $perfil->papellido = $request->papellido;
        $perfil->sapellido = $request->sapellido;
        $perfil->identidad = $request->identidad;
        $perfil->nacimiento = $request->nacimiento;
        $perfil->direccion = $request->direccion;
        $perfil->telefono = $request->telefono;
        $perfil->correo = $request->correo;
        $perfil -> save();



        //  Metodo de actualizar informacion con procedimientos almacenados
        $pnombre = $request->pnombre;
        $snombre = $request->snombre;
        $papellido = $request->papellido;
        $sapellido = $request->sapellido;
        $direccion = $request->direccion;
        $telefono = $request->telefono;
        $correo = $request->correo;

       /*  $procedimiento = DB::select('call sp_actualizar_persona(?,?,?,?,?,?,?,?)',
                        array($id,$pnombre,$snombre,$papellido,$sapellido,$direccion,$telefono,$correo)); */

        //  Actualiza la tabla users con los datos que se acaban de ingresar
        //  en la tabla Personas
        $user = User::find($id);
        $user->name = $request->pnombre;
        $user->email = $request->correo;
        $user-> save();


        $persona = User::find(Auth::user()->id)->perfil;
        return view('perfil', ['user'=>$user, 'persona'=>$persona]);

        //return redirect()->route('home');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
