<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdopcionesTable extends Migration
{
    public function up()
    {
        Schema::create('adopciones', function (Blueprint $table) {
            $table->id();
            $table->timestamp('fecha_adopcion');
            $table->string('estado_animal');
            $table->text('comentario')->nullable();
            $table->unsignedBigInteger('animal_id');
            $table->unsignedBigInteger('usuario_id');
            $table->timestamps();

            $table->foreign('animal_id')->references('id')->on('animals')->onDelete('cascade');
            $table->foreign('usuario_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('adopciones');
    }
}
