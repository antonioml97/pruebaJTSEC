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
        Schema::create('actividades_incidencias', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->unsignedBigInteger('actividades_id');
            $table->unsignedBigInteger('incidencias_id');


            $table->foreign('actividades_id')->references('id')->on('actividades') ->onDelete('cascade');
            $table->foreign('incidencias_id')->references('id')->on('incidencias') ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('actividades_incidencias');
    }
};
