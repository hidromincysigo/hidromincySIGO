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
        // Schema::create('tipo_tension_tablero', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('tipo_tension_tablero');
        //     $table->softDeletes();
        //     $table->timestamps();
        // });
        Schema::create('tableros', function (Blueprint $table) {
            $table->id();
            $table->unsignedDecimal('ancho');
            $table->unsignedDecimal('alto');
            $table->unsignedDecimal('profundidad');
            $table->unsignedDecimal('aislante');
            $table->unsignedDecimal('capacidad');
            $table->unsignedBigInteger('id_infraestructura');
            $table->unsignedBigInteger('id_fabricante');
            $table->unsignedBigInteger('id_tipo_tension');
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
        // Schema::dropIfExists('tipo_tension_tablero');
        Schema::dropIfExists('tableros');
    }
};
