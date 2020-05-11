<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Empleado extends Model
{
    use HasRoles;
    //public $table = "empleados";

    public $timestamps = false;

    protected $primaryKey = 'idempleado';
    protected $fillable = ['fechainicio', 'idpersona', 'idcargo'];

}
