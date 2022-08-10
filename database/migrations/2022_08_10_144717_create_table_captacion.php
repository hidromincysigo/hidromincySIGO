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
        Schema::create('captacion', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tipo_fuente');
            $table->unsignedBigInteger('fuente');
            $table->unsignedBigInteger('acueducto');
            $table->unsignedDecimal('cuota');
            $table->unsignedDecimal('extraccion');
            $table->string('observacion');
            $table->foreign('tipo_fuente')->references('id')->on('tipo_fuentes');
            $table->foreign('acueducto')->references('id')->on('acueductos');
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
        Schema::dropIfExists('table_captacion');
    }
};
