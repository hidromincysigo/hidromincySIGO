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
        Schema::create('manifold', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->comment('nombre del manifold');
            $table->unsignedBigInteger('id_tipo_manifold');
            $table->unsignedBigInteger('cant_bridas');
            $table->unsignedBigInteger('cant_monometro');
            $table->unsignedBigInteger('cant_valvulas');
            $table->unsignedBigInteger('cant_tuberias');
            $table->unsignedBigInteger('operatividad');
            $table->unsignedBigInteger('id_infraestructura');
            $table->unsignedBigInteger('id_fabricante');

            $table->foreign('id_fabricante')->references('id')->on('fabricante');
            $table->foreign('id_infraestructura')->references('id')->on('infraestructura');

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
        Schema::dropIfExists('manifold');
    }
};