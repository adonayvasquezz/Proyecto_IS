<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    public $timestamps = false;

    protected $primaryKey = 'idpersona';
    protected $fillable = ['pnombre', 'snombre', 'papellido', 'sapellido','identidad', 'nacimiento', 'direccion','telefono','correo'];


     /**
     * Las Categorias que pertenecen a mis videos.
     */
    public function user()
    {

        return $this->belongsToMany('App\Users', 'idPersona');
    }

}
