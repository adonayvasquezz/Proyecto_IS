<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->bigIncrements('codigoPersona')->unsigned();
            $table->foreign('codigoPersona')->references('id')->on('users');
            $table->string('pnombre');
            $table->string('snombre');
            $table->string('papellido');
            $table->string('sapellido');
            $table->string('direccion');
            $table->string('telefono');
            $table->string('correoElectronico');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personas');
    }
}
