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
        Schema::create('proyectos_usuarios', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->unsignedBigInteger('proyectos_id');
            $table->unsignedBigInteger('usuarios_id');


            $table->foreign('proyectos_id')->references('id')->on('proyectos')->onDelete('cascade');
            $table->foreign('usuarios_id')->references('id')->on('users')->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proyectos_usuarios');
    }
};
