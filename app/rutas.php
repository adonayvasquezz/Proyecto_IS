<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// Modelo de la tabla rutas
class Rutas extends Model
{

    protected $table='rutas';
    public $timestamps = false;
    protected $primaryKey = 'idruta';
    protected $fillable = ['lugarInicion','lugarFin','duracion','precio'];
}
