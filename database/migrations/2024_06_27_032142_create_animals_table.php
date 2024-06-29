<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnimalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animals', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('sexo');
            $table->string('tamano');
            $table->string('foto')->nullable();
            $table->string('edad');
            $table->string('comentario')->nullable();
            $table->boolean('estado_esterilizacion');
            $table->boolean('estado_chip');
            $table->string('estado_salud');
            $table->string('estadoanimal');
            $table->date('fecha_registro');
            $table->string('especie');
            $table->unsignedBigInteger('albergue_id');
            $table->timestamps();

            $table->foreign('albergue_id')->references('id')->on('albergues')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('animals');
    }
}

