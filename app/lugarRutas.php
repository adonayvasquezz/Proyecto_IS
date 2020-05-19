<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// Modelo de la tabla LugarRutas
class lugarRutas extends Model
{
    protected $table='lugarRutas';
    public $timestamps = false;
    protected $primaryKey = 'idLugar';
    protected $fillable = ['nombre'];
    //
}
