<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{

    protected $primaryKey = 'codigoPersona';
    protected $fillable = ['pnombre', 'snombre', 'papellido', 'sapellido','direccion','telefono','correoElectronico'];


     /**
     * Las Categorias que pertenecen a mis videos.
     */
    public function user()
    {

        return $this->belongsToMany('App\Users', 'codigoPersona');
    }

}
