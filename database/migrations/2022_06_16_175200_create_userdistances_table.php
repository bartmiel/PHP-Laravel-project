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
        Schema::create('user_distances', function (Blueprint $table) {
            $table->integer('userid')->unsigned();
            $table->foreign('userid')->references('userid')->on('users')->onDelete('cascade');
            $table->integer('distanceid')->unsigned();
            $table->foreign('distanceid')->references('distanceid')->on('distances')->onDelete('cascade');
            $table->dateTime('creationdate');
            $table->dateTime('updatedate');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('userdistances');
    }
};
