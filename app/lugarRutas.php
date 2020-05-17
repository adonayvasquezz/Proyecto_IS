<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class lugarRutas extends Model
{
    protected $table='lugarRutas';
    public $timestamps = false;
    protected $primaryKey = 'idLugar';
    protected $fillable = ['nombre'];
    //
}
