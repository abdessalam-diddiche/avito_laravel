<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignkeyIdcityIntoCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('announces', function (Blueprint $table) {
            $table->unsignedBigInteger('id_city');

            $table->foreign('id_city')
      ->references('id')->on('cities')
      ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('announces', function (Blueprint $table) {
            $table->dropForeign(['id_city']);
        });
    }
}
