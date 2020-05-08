<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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
        // Se busca la informacion del usuario autenticado, en las tablas users y personas
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

    public function empleados()
    {
        return view('empleados');
    }

    public function empleados_buscar(Request $request)
    {
        // Se reciben los parametros de busqueda, si vienen vacios se hace una busqueda general
        $name = $request->nombre;
        $email = $request->correo;

        // Se guarda en el arreglo users los registros que coinciden con los
        // parametros de busqueda
        $users = User::orderBy('id','ASC')
            ->name($name)
            ->email($email)
            ->get();

        return view('empleados', ['users'=>$users]);
        //return $users;

    }

    public function empleados_registro(Request $request)
    {
        // Se recibe el id del usuario seleccionado en la vista busqueda
        $id_empleado = $request->idbeta;

        // Se obtienen todos los cargos para llenarlos en el select del formulario
        $cargos = DB::select("SELECT * FROM cargo");

        // Se busca la informacion del usuario seleccionado, en las tablas users y personas
        $persona = User::find($id_empleado)->perfil;
        $user = User::find($id_empleado);

        return view('agregar-empleado', ['persona'=>$persona ,'user'=>$user, 'cargos'=>$cargos]);

    }

    public function empleados_registrado(Request $request)
    {

        $fechainicio=$request->fecha_inicio;
        $idpersona=$request->idpersona;
        $idcargo=$request->cargo;

        // El ingreso de las variables en el array debe ser en el mismo orden como fue creado el SP
        $procedimiento = DB::select('call sp_agregar_empleado(?,?,?)',
            array($fechainicio,$idpersona,$idcargo));

        return $request;

    }

}
