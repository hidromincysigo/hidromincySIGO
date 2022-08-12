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
        Schema::create('acueductos', function (Blueprint $table) {
            $table->id();
	        $table->string('nombre')->comment('nombre acueducto');
            $table->unsignedBigInteger('estado')->comment('id estado');
            $table->unsignedDecimal('capacidad_distribucion');
            $table->unsignedDecimal('capacidad_modificada');
	       // $table->foreign('estado')->references('id')->on('estados');
            $table->foreign('estado')->references('id')->on('estados');

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
        Schema::dropIfExists('acueducto');
    }
};
