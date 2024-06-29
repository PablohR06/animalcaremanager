<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donaciones', function (Blueprint $table) {
            $table->id();
            $table->decimal('monto', 8, 2);
            $table->timestamp('fecha');
            $table->unsignedBigInteger('albergue_id');
            $table->unsignedBigInteger('usuario_id');
            $table->timestamps();

            $table->foreign('albergue_id')->references('id')->on('albergues')->onDelete('cascade');
            $table->foreign('usuario_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('donaciones');
    }
}
