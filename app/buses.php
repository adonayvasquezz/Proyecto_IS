<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class buses extends Model
{
    //
    protected $table='buses';
    protected $primaryKey = 'idbus';
    public $timestamps = false;
}
