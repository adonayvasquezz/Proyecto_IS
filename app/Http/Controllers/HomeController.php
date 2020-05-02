<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\Auth;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        return view('home');
    }

    public function perfil()
    {

        $user = User::find(Auth::user()->id);
        $persona = User::find(Auth::user()->id)->perfil;

        return view('perfil', ['user'=>$user, 'persona'=>$persona]);
    }


    public function ventas()
    {
        return view('ventas');
    }

    public function viajes()
    {
        return view('viajes');
    }

    public function rutas()
    {
        return view('rutas');
    }

    public function administracion()
    {
        return view('administracion');
    }

    public function administracion_post(Request $request)
    {
        $name = $request->nombre;
        $email = $request->correo;


        $users = User::orderBy('id','DESC')
            ->name($name)
            ->email($email)
            ->get();

        return view('administracion', ['users'=>$users]);

    }
}
