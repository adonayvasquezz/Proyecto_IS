<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Persona;

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
            $nuevaPersona->codigoPersona = $id;
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
        $perfil = Persona::find($id);

        $perfil->pnombre = $request->pnombre;
        $perfil->snombre = $request->snombre;
        $perfil->papellido = $request->papellido;
        $perfil->sapellido = $request->sapellido;
        $perfil->direccion = $request->direccion;
        $perfil->telefono = $request->telefono;
        $perfil->correoElectronico = $request->correo;
        $perfil -> save();

        $user = User::find($id);
        $user->name = $request->pnombre;
        $user->email = $request->correo;
        $user-> save();

        return redirect()->route('home');
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
