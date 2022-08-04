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
        Schema::create('toma_rio', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->comment('nombre toma rio');
            $table->unsignedBigInteger('estado');
            $table->unsignedBigInteger('municipio');  
            $table->unsignedBigInteger('parroquia'); 
            $table->string('sector')->comment('Por definir');
            $table->unsignedBigInteger('coordenadas')->comment('coordenadas');
            $table->foreign('coordenadas')->references('id')->on('ubicacion_geografica');
            $table->foreign('estado')->references('id')->on('estados');
            $table->foreign('municipio')->references('id')->on('municipios');
            $table->foreign('parroquia')->references('id')->on('parroquias');
            $table->softDeletes();
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
        Schema::dropIfExists('table_toma_rio');
    }
};
