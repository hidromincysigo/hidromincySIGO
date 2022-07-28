<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fuentes', function (Blueprint $table) {
            $table->id();        
            $table->bigInteger('reg');
            $table->string('nombre');
            $table->integer('tipo');

            $table->unsignedBigInteger('estado_id');
            $table->unsignedBigInteger('municipio_id');
            $table->unsignedBigInteger('parroquia_id');
            $table->unsignedBigInteger('ciudades_id');
            
            $table->longText('desc_ubicacion');
            
            $table->string('utm_a');
            $table->string('utm_b');
            $table->string('proposito');
            $table->string('foto');
            $table->string('propietario');
            $table->string('constructora');
            $table->string('cronologia');

            $table->foreign('estado_id')->references('id')->on('estado');
            $table->foreign('municipio_id')->references('id')->on('municipio');
            $table->foreign('parroquia_id')->references('id')->on('parroquia');
            $table->foreign('ciudades_id')->references('id')->on('ciudades');





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
        Schema::dropIfExists('fuentes');
    }
};
