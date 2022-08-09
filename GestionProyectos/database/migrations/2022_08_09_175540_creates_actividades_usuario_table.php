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
        Schema::create('actividades_usuario', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->unsignedBigInteger('actividades_id');
            $table->unsignedBigInteger('usuario_id');
            $table->string('rol');

            $table->foreign('actividades_id')->references('id')->on('actividades') ->onDelete('cascade');
            $table->foreign('usuario_id')->references('id')->on('users') ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('actividades_usuario');
    }
};
