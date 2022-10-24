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
        Schema::create('tipo_interruptor', function (Blueprint $table) {
            $table->id();
            $table->string('tipo_interruptor');
            $table->softDeletes();
            $table->timestamps();
        });
        Schema::create('tipo_arranque', function (Blueprint $table) {
            $table->id();
            $table->string('tipo_arranque');
            $table->softDeletes();
            $table->timestamps();
        });
        Schema::create('motores', function (Blueprint $table) {
            $table->id();
            $table->unsignedDecimal('potencia');
            $table->unsignedDecimal('amperaje');
            $table->unsignedDecimal('tension');
            $table->unsignedDecimal('rpm');
            $table->unsignedDecimal('capacidad_amperio');
            $table->unsignedDecimal('contactor');
            $table->unsignedDecimal('rele_termico');
            $table->unsignedDecimal('temperatura');
            $table->unsignedBigInteger('id_tipo_motor');
            $table->unsignedBigInteger('id_tipo_interruptor');
            $table->unsignedBigInteger('id_tipo_arranque');
            $table->unsignedBigInteger('id_infraestructura');
            $table->unsignedBigInteger('id_fabricante');
            $table->string('supervisor_fase');
            $table->unsignedBigInteger('operatividad');
            $table->boolean('en_uso');
            $table->Integer('grupo');

            $table->foreign('id_infraestructura')->references('id')->on('infraestructura');
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
        Schema::dropIfExists('tipo_interruptor');
        Schema::dropIfExists('tipo_arranque');
        Schema::dropIfExists('motores');
    }
};
