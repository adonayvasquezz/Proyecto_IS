<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\emailConfirmated;


class MailController extends Controller
{
    public function store()
    {
        // Validacion de campos vacios
        $msj= Request()->validate([
            'name'=>'required',
            'email'=>'required|email',
            'message'=>'required|min:4',
            'subject'=>'required'
        ]);
// Envia el mensaje obtenido en la clase emailConfirmated al correo seleccionado
    Mail::to('etranss.contacto@gmail.com')->send(new emailConfirmated($msj));
    return view('index');




    }

}
