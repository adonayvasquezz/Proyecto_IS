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

    // Solo usuarios autenticados pueden acceder a las rutas de este controlador
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // Se recibe y muestra la informacion del usuario en la vista perfil
        $user = User::find(Auth::user()->id);
        $persona = User::find(Auth::user()->id)->perfil;

        return view('perfil', ['user'=>$user, 'persona'=>$persona]);
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
        // Se recibe y muestra la informacion actual de perfil antes de editarla en un formulario.
        $user = User::find(Auth::user()->id);
        $persona = User::find(Auth::user()->id)->perfil;

        // Se crea el usuario tambien en la tabla personas para que ya exista al momento de
        // agregar mas informacion de contacto
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

        // Actualiza la informacion de contacto en la tabla personas
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
       /*  $pnombre = $request->pnombre;
        $snombre = $request->snombre;
        $papellido = $request->papellido;
        $sapellido = $request->sapellido;
        $direccion = $request->direccion;
        $telefono = $request->telefono;
        $correo = $request->correo; */

       /*  $procedimiento = DB::select('call sp_actualizar_persona(?,?,?,?,?,?,?,?)',
                        array($id,$pnombre,$snombre,$papellido,$sapellido,$direccion,$telefono,$correo)); */

        //  Actualiza la tabla users con los datos que se acaban de ingresar
        //  en la tabla Personas
        $user = User::find($id);
        $user->name = $request->pnombre;
        $user->email = $request->correo;
        $user-> save();

       /*  $persona = User::find(Auth::user()->id)->perfil;
        return view('perfil', ['user'=>$user, 'persona'=>$persona]); */

        return redirect('perfil')->with('success', 'Informacion actualizada');

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
