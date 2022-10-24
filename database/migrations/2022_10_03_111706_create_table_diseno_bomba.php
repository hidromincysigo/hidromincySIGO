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
        Schema::create('diseno_bomba', function (Blueprint $table) 
        {
            $table->id();
            $table->unsignedBigInteger('id_equipo');
            $table->string('marca');
            $table->string('Modelo');
            $table->unsignedBigInteger('tipo');
            $table->unsignedDecimal('altura');
            $table->unsignedBigInteger('nro_etapas');
            $table->unsignedBigInteger('rotacion');
            $table->unsignedDecimal('caudal');
            $table->unsignedDecimal('presion');
            $table->unsignedDecimal('rpm');
            $table->unsignedDecimal('peso');
            $table->unsignedDecimal('diametro_succion');
            $table->unsignedDecimal('diametro_descarga');
            $table->unsignedBigInteger('tipo_sello');
            $table->string('rodamiento_a');
            $table->string('rodamiento_b');
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
        Schema::dropIfExists('diseno_bomba');
    }
};