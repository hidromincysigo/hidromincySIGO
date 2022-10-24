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
        Schema::create('valvulas', function (Blueprint $table) {
            $table->id();
            $table->unsignedDecimal('diametro');
            $table->unsignedDecimal('presion_nominal');
            $table->unsignedBigInteger('id_tipo_valvula');
            $table->unsignedBigInteger('accionamiento');
            $table->unsignedDecimal('fc');
            $table->unsignedBigInteger('id_estacion_bombeo');
            $table->unsignedBigInteger('id_fabricante');
            $table->unsignedBigInteger('operatividad');
            $table->boolean('en_uso');

            $table->foreign('accionamiento')->references('id')->on('tipo_accionamiento_valvula');
            $table->foreign('operatividad')->references('id')->on('operatividad');
            $table->foreign('id_tipo_valvula')->references('id')->on('tipo_valvulas');
            $table->foreign('id_estacion_bombeo')->references('id')->on('estacion_bombeo');
            $table->foreign('id_fabricante')->references('id')->on('fabricante');
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
        Schema::dropIfExists('valvulas');
    }
};
