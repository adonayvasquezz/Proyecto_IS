<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rutas extends Model
{

    protected $table='rutas';
    public $timestamps = false;
    protected $primaryKey = 'idruta';
    protected $fillable = ['lugarInicion','lugarFin','duracion','precio'];
}
