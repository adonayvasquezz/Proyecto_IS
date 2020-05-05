<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\emailConfirmated;


class MailController extends Controller
{
    public function store()
    {
        $msj= Request()->validate([
            'name'=>'required',
            'email'=>'required|email',
            'message'=>'required|min:4',
            'subject'=>'required'
        ]);

    Mail::to('etranss.contacto@gmail.com')->send(new emailConfirmated($msj));
    // return new emailConfirmated($msj);
    return view('index');

    // return 'Mensaje enviado';


    }

}
