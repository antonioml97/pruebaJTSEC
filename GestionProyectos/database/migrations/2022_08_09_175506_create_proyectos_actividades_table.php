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
        Schema::create('proyectos_actividades', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->unsignedBigInteger('proyectos_id');
            $table->unsignedBigInteger('actividades_id');


            $table->foreign('proyectos_id')->references('id')->on('proyectos') ->onDelete('cascade');
            $table->foreign('actividades_id')->references('id')->on('actividades') ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proyectos_actividades');
    }
};
