<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToAlberguesTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('albergue_id')->nullable()->after('password');
            $table->foreign('albergue_id')->references('id')->on('albergues')->onDelete('set null');
        });

        Schema::table('albergues', function (Blueprint $table) {
            $table->unsignedBigInteger('encargado_id')->nullable()->after('telefono');
            $table->foreign('encargado_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::table('albergues', function (Blueprint $table) {
            $table->dropForeign(['encargado_id']);
            $table->dropColumn('encargado_id');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['albergue_id']);
            $table->dropColumn('albergue_id');
        });
    }
}
