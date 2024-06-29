<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeguimientosTable extends Migration
{
    public function up()
    {
        Schema::create('seguimientos', function (Blueprint $table) {
            $table->id();
            $table->string('estado_seguimiento');
            $table->text('observaciones')->nullable();
            $table->date('fecha');
            $table->unsignedBigInteger('adopcion_id');
            $table->unsignedBigInteger('animal_id');
            $table->unsignedBigInteger('usuario_id');
            $table->timestamps();

            $table->foreign('adopcion_id')->references('id')->on('adopciones')->onDelete('cascade');
            $table->foreign('animal_id')->references('id')->on('animals')->onDelete('cascade');
            $table->foreign('usuario_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('seguimientos');
    }
}
